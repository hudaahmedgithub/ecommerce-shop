<script>
    $(document).on('click', '.addtoCartButton', function(e) {
        $(this).parent('form').submit();
    });

    $(document).on('click', '.cart_open', function(e) {
        window.location.assign("{{ route('cart.index') }}");
    });



@if ( \Auth::check() )
    $(document).on('submit', '#promo', function(e) {
        e.preventDefault();
        var url     = $(this).attr('action');
        var data    = $(this).serialize();

        $.ajax({
            url: url,
            type: 'POST',
            data: data,
            dataType: 'json',
            error: function(response) {
                $('#_loader').hide();
                toastr.error(response.responseJSON.data);               
            },
            beforeSend: function() {
                $('#_loader').show();
            },
            success: function(response) {
                $('#_loader').hide();
                $('._subtotal').text(response.subtotal);
                toastr.success(response.message);
                var code = $("#promo input[name=code]").val();
                $("form#promo").replaceWith(`
                    <h4><b>You Using ${code} Coupon</b></h4>
                `);

            }
        });

    });
@endif


    
    {{-- Update the cart --}}
    $(document).on('submit', '#updateCart, .updateCart', function(e) {
        e.preventDefault();
        var url     = $(this).attr('action');
        var data    = $(this).serialize();
        var _id     = $(this).find('input[name=_id]').val();
        var _price  = $(this).find('input[name=_price]').val();
        var _name   = $(this).find('input[name=_name]').val();
        var _img    = $(this).find('input[name=_imgSrc]').val();
        var _quantity = $(this).find('input[name=quantity]').val();
        var _relative = $(this).find('input[name=relative]').val() ? 'ok' : 'no';

        $.ajax({
            url: url,
            type: 'POST',
            data: data,
            dataType: 'json',
            error: function(response) {
                $('#_loader').hide();
                toastr.error("Error, Please try again");
            },
            beforeSend: function() {
                $('#_loader').show();
            },
            success: function(response) {
                $('#_loader').hide();
                toastr.success(response.message);
                $('._cartCount').text(response.count);
                $('._subtotal').text(response.subtotal);
                $('.total').text(response.total);
                $('#_totallyPrice-'+_id).text(response.price);
                if($('#__itemsBox #_item-'+_id).length == 0) {

                    $('#__itemsBox').prepend(`
                        <!-- start item -->
                        <li id="_item-${_id}">
                            <a href="{{ url('products') }}/${_id}" class="product-img">
                                <img src="${_img}" alt="${_name}" width="50" height="50">
                            </a>
                            <!-- start product-details -->
                            <div class="product-info">
                                (<b class='badge' style='background: gold;'><span class='_quantity-info'>${_quantity}</span>x</b>)
                                <a href="{{ url('products') }}/${_id}" class="product-name">${_name}</a>
                                <h3 class="product-price">${_price}</h3>
                            </div>
                            <div class="product-controls">
                                <a href="javascript:void(0)" class="_deleteCart" data-id="${_id}"> <i class="fa fa-trash"></i> </a>
                                <a href="{{ url('products') }}/${_id}"> <i class="fa fa-eye"></i> </a>
                            </div> <!-- end product-details -->
                        </li> <!-- end item -->
                    `);

                } else {

                        var quantity_info = $('#__itemsBox #_item-'+_id).find("._quantity-info");
                        quantity_info.text( response.quantity );
                    
                } //else
            } // response Success
        });

    });


    {{-- Remove Item from the Cart --}}
    $(document).on('click', '._deleteCart, #deleteCart', function(e) {
        e.preventDefault();
        
        var id = $(this).data('id');
        var data = {
            _method: 'DELETE'
        };

        swal({
            title: "Are you sure?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    url: '{{ url("cart/") }}/'+id,
                    type: 'POST',
                    data: data,
                    dataType: 'json',
                    error: function(response) {
                        //console.log(response.responseJSON);
                        $('#_loader').hide();
                        toastr.error("Error, Please try again");
                    },
                    beforeSend: function() {
                        $('#_loader').show();
                    },
                    success: function(response) {
                        $('#_loader').hide();
                        toastr.success(response.message);
                        $('._cartCount').text(response.count);
                        $('._subtotal').text(response.subtotal);
                        $('.total').text(response.total);
                        $("#_item-"+id).remove();
                        @if(Route::currentRouteName() == 'cart.index')
                            var row = $(`#tr-${id}`);
                            var li = $(`#li-${id}`);
                            row.remove();
                            li.remove();
                        @endif
                    }
                });
            }
        });
    });
</script>
