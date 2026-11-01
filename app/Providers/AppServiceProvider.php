<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Cart;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Notifications\Messages\MailMessage;
use App\Models\Wishlist;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('*', function () {
        Cart::whereNull('user_id')
            ->where('status', '!=', 'checked_out')
            ->where('created_at', '<=', Carbon::now()->subDay())
            ->update(['status' => 'abandoned']);
        });
        
        view()->composer('*', function ($view) {
            $cartCount = Cart::where('user_id', Auth::id())
                     ->orWhere('session_id', session()->getId())
                     ->count();
            $view->with('cart_count', $cartCount);
        });
        
        View::composer('*', function ($view) {
            $userId = Auth::id();
            $sessionId = session()->getId();

            $cartCount = Cart::where('status', 'active')
                ->when($userId, function ($query) use ($userId) {
                    return $query->where('user_id', $userId);
                }, function ($query) use ($sessionId) {
                    return $query->where('session_id', $sessionId)->whereNull('user_id');
                })
                ->sum('quantity');

            $wishlistCount = Wishlist::when($userId, function ($query) use ($userId) {
                    return $query->where('user_id', $userId);
                }, function ($query) use ($sessionId) {
                    return $query->where('session_id', $sessionId)->whereNull('user_id');
                })
                ->count();

            $view->with('globalCartCount', $cartCount)->with('globalWishlistCount', $wishlistCount);
        });

        ResetPassword::toMailUsing(function ($notifiable, string $token) {
            $resetUrl = url(route('password.reset', [
                'token' => $token,
                'email' => $notifiable->getEmailForPasswordReset(),
            ], false));
    
            return (new MailMessage)
                ->subject('Reset Password Notification')
                ->line('You are receiving this email because we received a password reset request for your account.')
                ->action('Reset Password', $resetUrl)
                ->line('If you did not request a password reset, no further action is required.');
        });
    }
}
