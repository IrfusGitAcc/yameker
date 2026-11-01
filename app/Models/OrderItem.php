<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $primaryKey = 'ordered_item_id';

    protected $table  = 'order_items';

    protected $fillable =[ 'order_id','product_id','quantity','price','size','color'];

    // 🔁 Each order item belongs to an order
    public function order(){

        return $this->belongsTo(Order::class);
    }

    
    // 🔁 Each order item belongs to a product
    public function product(){

        return $this->belongsTo(Product::class, 'product_id');
    }



}
