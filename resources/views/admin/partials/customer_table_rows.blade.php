@foreach( $customers as $index=> $customer)
    <tr>
        <td><input type="checkbox"  scope="row" class="admin-checkbox" value="{{ $customer->customer_id }}"></td>
        <td>{{ $index + 1 }}</td>
        <td>{{ $customer->first_name }}{{ $customer->last_name}}</td>
        <td>{{ $customer->email }}</td>
        <td>{{ $customer->phone }}</td>
        <td>
            <span class="badge bg-success text-white text-center d-inline-block" 
                  style="min-width: 80px; padding: 4px 8px; border-radius: 5px;">
                {{ $customer->type }}
            </span>
        </td>
        <td>{{ $customer->address}}</td>
        <td>
            <div class="action_btns d-flex">
                <button type="button" class="action_btn mr_10 far fa-edit edit-admin-btn" data-bs-toggle="modal" data-bs-target="#editCustomerModal"
                    data-id          = "{{ $customer->customer_id }}"
                    data-first_name  = "{{ $customer->first_name }}" 
                    data-last_name   = "{{ $customer->last_name }}"
                    data-email       = "{{ $customer->email }}"
                    data-phone       = "{{ $customer->phone }}"
                    data-address     = "{{ $customer->address }}"
                    data-city        = "{{ $customer->city }}">
                </button>
                <form action="" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="action_btn" onclick="return confirm('Are you sure you want to delete this user?');">
                        <i class="fas fa-trash"></i>
                    </button>
                </form>
            </div>
        </td>
   </tr>
@endforeach