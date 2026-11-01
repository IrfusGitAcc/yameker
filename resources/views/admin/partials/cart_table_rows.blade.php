@foreach( $carts as $index=> $cart)
    <tr>
        <td><input type="checkbox"  scope="row" class="admin-checkbox" value="{{ $cart->cart_id }}"></td>
        <td>{{ $index + 1 }}</td>
        <td>
            <div class="d-flex">
                <img src="{{ asset('public/assets/img/' . $cart->product->image) }}" alt="Image" style="width:56px; height:56px;">
                <ul style="margin-left: 25px;">
                    <li> {{ $cart->product->name }}</li>
                    <li> {{ $cart->size }}</li>
                </ul>
            </div>
        </td>
        <td>
            <ul style="list-style: none; padding: 0; margin: 0;">
                @if($cart->user)
                    <li><strong> {{ $cart->user->name }}</strong></li>
                    <li> {{ $cart->user->email }} </li>
                @else
                    <li><strong> Guest</strong></li>
                    <li> Not Available </li>
                @endif
            </ul>
        </td>
        <td>{{ $cart->quantity }}</td>
        <td> AED{{ number_format($cart->price, 2) }}</td>
        <td> AED{{ number_format($cart->price * $cart->quantity, 2) }}</td>
        @php
          $statusClass = match($cart->status) {
           'active'       => 'bg-success text-white',     // green
           'abandoned'    => 'bg-danger text-white',      // red
             'checked_out'  => 'bg-warning text-dark',      // orange
            default        => 'bg-secondary text-white'    // fallback
          };
        @endphp
        <td>
           <a href="#" class="status_btn badge {{ $statusClass }}">
               {{ ucfirst($cart->status) }}
           </a>
        </td>
        <td>
            <div class="action_btns d-flex">
                <form action="{{route('cart.destroy', $cart->cart_id)}}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="action_btn" onclick="return confirm('Are you sure you want to delete this cart?');">
                        <i class="fas fa-trash"></i>
                    </button>
                </form>
            </div>
        </td>
   </tr>
@endforeach