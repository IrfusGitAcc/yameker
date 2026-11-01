<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shipment extends Model
{
    protected $primaryKey= 'shipment_id';

    protected $table ='shipments';

     protected $fillable = [
        'order_id',
        'tracking_number',
        'eco_awb',
        'status',
        'api_payload',
        'api_response',
    ];

    protected $casts = [
        'api_payload' => 'array',
        'api_response' => 'array',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id', 'order_id');
    }
}
