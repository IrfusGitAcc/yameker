@foreach($orders as $index => $order)
    <tr>
        <td><input type="checkbox" class="admin-checkbox" value="{{ $order->order_id }}"></td>
        <td>{{ $index + 1 }}</td>
        <td>{{ $order->order_number }}</td>
        <td>
            <div class="text-truncate" style="max-width: 180px;">
                <strong>{{ $order->shippingAddress->first_name ?? '' }} {{ $order->shippingAddress->last_name ?? '' }}</strong><br>
                {{ $order->shippingAddress->email ?? '' }}<br>
                {{ $order->shippingAddress->phone ?? '' }}
            </div>
        </td>
        <td class="text-truncate" style="max-width: 200px;">
            {{ $order->shippingAddress->address ?? '' }}
        </td>
        <td>AED{{ $order->total_amoun ?? '' }}</td>
        <td>{{ ucfirst($order->payment_method) ?? '' }}</td>
        @php
            $paymentStatusClass = match($order->payment_status) {
                'paid' => 'bg-success text-white',
                'failed' => 'bg-danger text-white',
                'unpaid' => 'bg-warning text-dark',
                'refunded' => 'bg-secondary text-white',
                default => 'bg-light text-dark'
            };
            $orderStatusClass = match($order->status) {
                'delivered' => 'bg-success text-white',
                'pending' => 'bg-danger text-white',
                'shipped' => 'bg-warning text-dark',
                'processing' => 'bg-secondary text-white',
                default => 'bg-light text-dark'
            };
        @endphp
        <td><span class="badge {{ $paymentStatusClass }}">{{ ucfirst($order->payment_status) }}</span></td>
        <td><span class="badge {{ $orderStatusClass }}">{{ ucfirst($order->status) }}</span></td>
        <td>{{ \Carbon\Carbon::parse($order->placed_at)->format('F j, Y') }}</td>
        <td>
            <div class="action_btns d-flex justify-content-center gap-1">
                <a href="javascript:void(0);" 
                    class="action_btn" 
                      data-bs-toggle="modal" 
                     data-bs-target="#orderModal-{{ $order->order_id }}">
                        <i class="fas fa-eye"></i>
                </a>
                <form action="{{ route('admin.orders.cancel', $order->order_id) }}" method="POST" onsubmit="return confirm('Cancel this order?');">
                    @csrf
                    <button type="submit" class="action_btn" title="Cancel">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </form>
            </div>
        </td>
    </tr>
@endforeach