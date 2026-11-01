@foreach( $users as $index=> $user)
    <tr>
        <td><input type="checkbox"  scope="row" class="admin-checkbox" value="{{ $user->user_id }}"></td>
        <td>{{ $index + 1 }}</td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->phone }}</td>
        <td>{{ $user->created_at}}</td>
        <td>
            <div class="action_btns d-flex">
                <button type="button" class="action_btn mr_10 far fa-edit edit-admin-btn" 
                    data-bs-toggle="modal" data-bs-target="#editCustomerModal">
                    
                   
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