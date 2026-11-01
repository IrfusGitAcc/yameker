<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table ='carts';

    protected $primaryKey = 'cart_id';

    protected $fillable = [
        'user_id',
        'product_id',
        'quantity',
        'price',
        'discount',
        'coupon_code',
        'status',
        'session_id',
        
    ];

    public function product() {
        return $this->belongsTo(Product::class, 'product_id');
    }
    
    public function user(){
        return $this->belongsTo(AppUser::class, 'user_id');
    }


}
