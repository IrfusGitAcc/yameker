<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    protected $primaryKey = 'order_id';

    protected $table = 'orders';
    protected $fillable = [
        'user_id',
        'session_id',
        'order_number',
        'status',
        'payment_status',
        'payment_method',
        'shipping_address_id',
        'billing_address_id',
        'subtotal',
        'tax_amount',
        'shipping_cost',
        'discount_amount',
        'total_amount',
        'coupon_code',
        'note',
        'placed_at',
        'shipped_at',
        'delivered_at',
        'cancelled_at',
    ];

    protected $dates = [
        'placed_at',
        'shipped_at',
        'delivered_at',
        'cancelled_at',
    ];

    // Relationships
    public function user()
    {
        return $this->belongsTo(AppUser::class); 
    }

    public function shippingAddress() 
    {
        return $this->belongsTo(Customer::class, 'shipping_address_id','customer_id');
    }

    public function billingAddress()
    {
        return $this->belongsTo(Customer::class, 'billing_address_id','customer_id');
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class, 'order_id', 'order_id')->with('product');
    }

    public function shipment()
    {
        return $this->hasOne(Shipment::class, 'order_id', 'order_id');
    }
}
