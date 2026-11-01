<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Auth\Passwords\CanResetPassword;

class AppUser extends Authenticatable implements CanResetPasswordContract
{
    use HasFactory, Notifiable, CanResetPassword;

    protected $primaryKey = 'user_id';

    protected $table = 'appusers';

    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'name',	
        'email',
        'phone',	
        'avatar',
        'email_verified_at',
        'password',	
        'remember_token',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class, 'user_id');
    }

    public function customer()
    {
        return $this->hasOne(Customer::class, 'user_id');
    }
    
    public function cart()
    {
        return $this->hasMany(Cart::class,'user_id');
    }
}
