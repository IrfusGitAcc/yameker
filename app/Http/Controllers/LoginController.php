<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Str;


use App\Models\User;
use App\Models\AppUser;
use App\Models\Category;
use App\Models\Cart;

class LoginController extends Controller
{
    public function loginForm(){
        return view('auth.login-form');
    }

    public function login(Request $request){

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
    
         if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/admin');
        }
    
        Log::debug('Login failed', ['credentials' => $credentials]);
        return back()->withErrors([
            'email' => 'Invalid credentials',
        ]);
    }
    public function logout(Request $request){

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login.form'); // Redirect to login page after logout
    }

    public function appUserStore(Request $request) {

        Log::info('Register Input:', $request->all());
    
        try {
            $request->validate([
                'first_name' => 'required|string|max:255',
                'last_name'  => 'required|string|max:255',
                'email'      => 'required|string|email|max:255|unique:appusers,email',
                'password'   => 'required|string|min:8',
            ]);
    
            $user = AppUser::create([
                'name'     => $request->first_name . ' ' . $request->last_name,
                'email'    => $request->email,
                'password' => Hash::make($request->password),
            ]);
    
            Log::info('User created:', $user->toArray());
    
            // ðŸ›’ Migrate cart from guest session to user
            Cart::where('session_id', session()->getId())
                ->whereNull('user_id')
                ->where('status', 'active')
                ->update([
                    'user_id'    => $user->user_id,
                    'session_id' => null, // optional
                ]);
    
            Auth::login($user);
    
            // If registration was from guest checkout â†’ send them to login modal
            if ($request->from_page === 'guest') {
                return redirect()->route('guest.login')
                    ->with('message', 'Registered successfully. Please log in.')
                    ->with('open_modal', 'login');
            }
    
            // Default â†’ go home, but show login modal
            return redirect('/')
                ->with('open_modal', 'login')
                ->with('message', 'Account created successfully. Please log in.');
        } catch (\Exception $e) {
            Log::error('User creation failed: ' . $e->getMessage());
            return back()
                ->withErrors(['register' => 'Something went wrong while creating your account.'])
                ->with('open_modal', 'register');
        }
    }
    
    public function appUserLogin(Request $request){

        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);
    
        $user = AppUser::where('email', $request->email)->first();
    
        if (!$user) {
            return back()
                ->withErrors(['email' => 'User not found.'])
                ->with('open_modal', 'login');
        }
    
        if (!Hash::check($request->password, $user->password)) {
            return back()
                ->withErrors(['password' => 'Password mismatch.'])
                ->with('open_modal', 'login');
        }
    
        // ðŸ›’ Migrate guest cart to logged-in user
        Cart::where('session_id', $request->session()->getId())
            ->whereNull('user_id')
            ->where('status', 'active')
            ->update([
                'user_id'    => $user->user_id,
                'session_id' => null,
            ]);
    
        Auth::login($user);
        $request->session()->regenerate();
    
        // Redirect logic
        if ($request->from_page === 'guest') {
            return redirect()->route('view.cart');
        }
    
        return redirect()->intended('/');
    }

    
    
    public function appUserLogout(Request $request){

        Auth::logout(); // logs out the current user regardless of guard (default web)
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    
        return redirect('/'); // or wherever you want to send them after logout
    }

    public function sendResetLink(Request $request){

        $request->validate(['email' => 'required|email']);
        
        $status = Password::sendResetLink(
            $request->only('email')
        );
        
        return $status === Password::RESET_LINK_SENT
            ? back()->with(['status' => __($status)])
            : back()->withErrors(['email' => __($status)]);
    }
    
    public function showResetForm(Request $request, $token = null){

        $categories = Category::all();
        
        return view('auth.password-reset')->with(
            ['token' => $token, 'email' => $request->query('email'), 'categories' => $categories]
        );
    }
    
    public function resetPassword(Request $request){
        
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
        ]);
    
        Log::info("Reset request:", $request->only('email', 'token'));
    
        // Check if user exists
        $user = \App\Models\AppUser::where('email', $request->email)->first();
        if (!$user) {
            Log::warning("No AppUser found with email: " . $request->email);
        }
    
        // Debug token row
        $tokenRow = DB::table('password_reset_tokens')->where('email', $request->email)->first();
        if ($tokenRow) {
            if (Hash::check($request->token, $tokenRow->token)) {
                Log::info("Token matches for email: " . $request->email);
            } else {
                Log::error("Token mismatch for email: " . $request->email);
            }
        }
    
        $status = Password::broker('users')->reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                Log::info("Resetting password for user: " . $user->email);
    
                $user->forceFill([
                    'password' => Hash::make($password),
                ])->save();
            }
        );
    
        Log::info("Password reset status: " . $status);
    
        return $status == Password::PASSWORD_RESET
            ? redirect()->route('login')->with('status', __($status))
            : back()->withErrors(['email' => [__($status)]]);
    }


    public function guestLogin(){
        $categories = Category::all();
        return view('auth.guest-login',compact('categories'));
    }
    public function guestRegister(){
        $categories = Category::all();
        return view('auth.guest-register',compact('categories'));
    }
    
    



    
}

