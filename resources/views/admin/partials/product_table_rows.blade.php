@foreach($products as $index => $product)
    <tr>
       <td><input type="checkbox" class="admin-checkbox" value="{{ $product->product_id }}"></td>
       <td>{{ $index + 1 }}</td>
       <!-- Product Column: Image + Name + Sizes -->
       <td>
           <div style="display: flex; align-items: flex-start; gap: 5px;">
               <img src="{{ asset('public/assets/img/' . $product->image) }}" alt="Image"
                    style="width: 56px; height: 56px; object-fit: cover; flex-shrink: 0;">
               <div style="flex: 1;">
                   <div style="font-weight: bold; font-size: 13px; max-width: 150px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;" title="{{ $product->name }}">
                       {{ $product->name }}
                   </div>
                   <div style="margin-top: 4px;">
                       @foreach(json_decode($product->size, true) ?? [] as $size)
                           <span style="background-color: #000;  color: #fff; padding: 2px 6px; margin: 1px 3px 1px 0; border-radius: 3px; font-size: 11px; display: inline-block;">
                               {{ $size }}
                           </span>
                       @endforeach
                   </div>
               </div>
           </div>
       </td>
       <!-- Price -->
       <td >{{ $product->price }}</td>
       <!-- Color -->
       <td>
           @php
               $colors = json_decode($product->colors, true);
           @endphp
       
           @if(!empty($colors) && is_array($colors))
               @foreach($colors as $color)
                   <span style="background-color: #000; color: #fff; padding: 2px 6px; margin: 1px 3px 1px 0; border-radius: 3px; font-size: 11px; display: inline-block;">
                       {{ $color }}
                   </span>
               @endforeach
           @else
               <span style="color: #999;">No Color</span>
           @endif
       </td>
       <!-- Stock -->
       <td >{{ $product->sku ?? 'N/A' }}</td>
       <!-- Category -->
       <td >{{ $product->category->category_name ?? 'No Category' }}</td>
       <!-- Dealer -->
       <td >Yameker</td>
       <!-- Action -->
       <td >
           <div class="d-flex justify-content-start" style="gap: 5px;">
               <a href="{{ route('edit.product', $product->product_id) }}" class="action_btn">
                   <i class="far fa-edit"></i>
               </a>
               <form action="{{ route('delete.product', $product->product_id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this product?');">
                   @csrf
                   @method('DELETE')
                   <button type="submit" class="action_btn">
                       <i class="fas fa-trash"></i>
                   </button>
               </form>
           </div>
       </td>
   </tr>
@endforeach