@extends('frontend.layouts.main')
@section('content')
<link rel="stylesheet" href="css/shopping-cart.css">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
 <script>
        $(document).ready(function(){
            <?php for($i=1;$i<20;$i++){?>
$('#upCart<?php echo $i;?>').on('change keyup', function(){
                var newqty = $('#upCart<?php echo $i;?>').val();
                var rowId = $('#rowId<?php echo $i;?>').val();
                var proId = $('#proId<?php echo $i;?>').val();
                if(newqty <=0){ alert('enter only valid qty') }
                else {
                    $.ajax({
                        type: 'get',
                        dataType: 'html',
                        url: '<?php echo url('/cart/update');?>/'+proId,
                        data: "qty=" + newqty + "& rowId=" + rowId + "& proId=" + proId,
                        success: function (response) {
                            console.log('true');
                            $('#updateDiv').html(response);
                        }
                    });
                }
            });
            <?php } ?>
	$(document).on('click','#deleteCart',function(){
	id=$(this).data('id');
		console.log(id);
	$.get('cart/remove',{id:id},function(){
		console.log('sdfghj');
		alert('do you want to delete');
		$('#dataCart').html('');
		$('#cart_items').show();
	  
	})
})
        });
    </script>
    <?php if ($cartItems->isEmpty()) { ?>
    <br>
    <br>
    <br>
    <section id="cart_items">
        <div class="container">
            <div align="center">  <img src="{{asset('frontend/images/empty.jpg')}}"/>
			<br>
				<br>
			
			</div>
        </div>
    </section> <!--/#cart_items-->
<?php } else { ?>
    <br>
    <br>
  @if(session('status'))
                            <div class="alert alert-success">
                                {{session('status')}}
                            </div>
                        @endif
                        @if(session('error'))

                            <div class="alert alert-danger">
                                {{session('error')}}
                            </div>
                        @endif
	<div id="dataCart">
        <div class="shopping-cart">
            <div class="container">
			
                <div class="row">
					<?php $count =1;
					?> 
					@foreach($cartItems as $key=>$cart)
					 
                    <div class="col-md-8">
                        <h4>shopping cart (<?php echo $count;?>)</h4>
                        <div class="cart"style="background:#fff">
							<p style="float:right;background:#0bf;color:#fff;font-size:13px" class="badge">total:<?php $row=Cart::get($cart->id);
							echo $row->quantity*$cart->price;?> </p>
                            <img src="{{url('frontend/images',$cart->attributes->featured_image)}}" alt="cart image" width="100px" height="100px">
                            <div class="info"style="float:right;margin-right:270px">
                                <h5>{{$cart->name}}</h5>
								
                               <div class="select-quantity">
								   <span class="price"> EGP <?php echo $cart->price?></span>
								   <p></p>
                                    <form action="{{url('/cart/update')}}/{{$cart->id}}" method="post" role="form"style="float:right;margin-left:130px;margin-top:-50px">

                                  <input type="hidden" name="_method" value="PUT">
                                   <input type="hidden" name="_token" value="{{csrf_token()}}">
                                   <input type="hidden" name="proId" value="{{$cart->id}}"/>
                                   <input type="number" size="2" value="{{$cart->quantity}}" name="qty" 
                                    autocomplete="off" style="text-align:center; max-width:50px; "  MIN="1" MAX="1000">
                                        <input type="submit" class="btn btn-primary" value="Update" styel="margin:5px">
                                    </form>
<!--</div>-->
								</div>
								
                                <p class="order-now"style="float:right;color:red">order now, only {{$cart->attributes->stock}} left on stock!</p>
                                <div class="clear"></div>
								
                                <p>color: {{$cart->attributes->color}}</p>
							
                            </div>
                           <a  id="deleteCart" data-id="{{$cart['id']}}"> <i class="fa fa-trash"></i>delete </a>
                        </div>
						</div>
		</div>
								
				<?php $count++;?>
                    
       	@endforeach 
			    <?php } ?>
				</div>
                    <div class="col-md-4 right-side">
                        <div class="total-cost">
						<p>Total Price: {{Cart::getTotal()}}</p>
                          
                            <span class="price"></span>
                        </div>
						
                        <a href="{{url('check-out')}}"><button class="btn btn-block bg-success">proceed to checkout</button></a>
                        <button class="btn btn-block coupon">add coupon</button>
			
                    </div>
			
                </div>
            </div>

        </div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script><script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript">

	$(document).ready(function(){
		$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).on('click','#addReview',function(e){
			e.preventDefault();
			var name=$('#name').val();
		    var price=$('#price').val();
		    var rate=$('#rate').val();
			var comment=$('#comment').val();
			var product_id=$('#product_id').val();
		
	     $.post('/store-review',{email:email,password:password,rate:rate,comment:comment,product_id:product_id},function(data){
			 $('#email').val('');
             $('#password').val('');
             $('#rate').val('0');
             $('#comment').val('');
             $('#product_id').val('');
			 
		 })
    })
});
</script>
@endsection