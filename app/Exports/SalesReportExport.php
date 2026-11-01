<?php

namespace App\Exports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SalesReportExport implements FromCollection, WithHeadings
{
    protected $orders;

    public function __construct($orders)
    {
        $this->orders = $orders;
    }

    public function collection()
    {
        return $this->orders->map(function ($order) {
            return [
                $order->order_number,
                optional($order->billingAddress)->first_name . ' ' . optional($order->billingAddress)->last_name,
                $order->total_amount,
                $order->created_at->format('Y-m-d'),
            ];
        });
    }

    public function headings(): array
    {
        return ['Order Number', 'Customer', 'Total Amount (AED)', 'Order Date'];
    }
}
