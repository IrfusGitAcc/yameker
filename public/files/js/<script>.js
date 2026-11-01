<script>
    $(document).ready(function () {
        function updateTotalPrice() {
            const unitPrice = parseFloat($('.total-price').data('price'));
            const quantity = parseInt($('.quantity-product').val()) || 1;

            if (quantity === 1) {
                $('.total-price').text('AED ' + unitPrice.toFixed(2));
            } else {
                const total = (unitPrice * quantity).toFixed(2);
                $('.total-price').text('AED ' + total);
            }
        }

        $('.btn-increase').on('click', function (e) {
            e.preventDefault();
            const input = $(this).closest('.wg-quantity').find('input.quantity-product');
            let val = parseInt(input.val()) || 1;
            
            updateTotalPrice();
        });

        $('.btn-decrease').on('click', function (e) {
            e.preventDefault();
            const input = $(this).closest('.wg-quantity').find('input.quantity-product');
            let val = parseInt(input.val()) || 1;
            if (val > 1) {
                
                updateTotalPrice();
            }
        });

        $('.quantity-product').on('input', function () {
            this.value = this.value.replace(/[^0-9]/g, '');
            if (this.value === '' || parseInt(this.value) < 1) {
                this.value = 1;
            }
            updateTotalPrice();
        });

        updateTotalPrice();
    });
</script>

<script>
$(document).ready(function () {
    // ✅ Global CSRF setup
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // ✅ Add to cart button
    $('.btn-add-to-cart').on('click', function (e) {
        e.preventDefault();

        let productId = $(this).data('product-id');
        let quantity = $('.quantity-product').val();
        let size = $('input[name="size1"]:checked').val();

        $.ajax({
            url: '{{ route("cart.store") }}',
            method: 'POST',
            data: {
                product_id: productId,
                quantity: quantity,
                size: size
            },
            success: function (response) {
                if (response.success) {
                    $('#shoppingCart .wrap').html(response.html);
                    $('#shoppingCart').modal('show');
                }
            },
            error: function (xhr) {
                console.error(xhr.responseText);
                alert('Something went wrong.');
            }
        });
    });
});
</script>