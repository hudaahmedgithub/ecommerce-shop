@extends('frontend.layouts.main')
@section('content')
<link rel="stylesheet" href="css/shopping-cart.css">
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
                            console.log(response);
                            $('#updateDiv').html(response);
                        }
                    });
                }
            });
            <?php } ?>
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
        <div class="shopping-cart">
            <div class="container">
                <div class="row">
					  <?php $count =1;?>
					@foreach($cartItems as $cart)
                    <div class="col-md-8">
                        <h4>shopping cart ( {{$cart->id}} )</h4>
                        <div class="cart"style="background:#fff">
                            <img src="{{url('frontend/images',$cart->featured_image)}}" alt="cart image" width="100px" height="100px">
                            <div class="info"style="float:right;margin-right:270px">
                                <h5>{{$cart->name}}</h5>
								
                               <div class="select-quantity">
								   <span class="price"> EGP</span>
								   
                                    <form action="{{url('cart/update',$cart->id)}}" method="post" role="form"style="float:right;margin-left:130px">

                                        <input type="hidden" name="_method" value="PUT">
                                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                                        <input type="hidden" name="proId" value="{{$cart->id}}"/>
                                        <input type="number" size="2" value="{{$cart->qty}}" name="qty" id="upCart<?php echo $count;?>"
                                       autocomplete="off" style="text-align:center; max-width:50px; "  MIN="1" MAX="1000">
                                        <input type="submit" class="btn btn-primary" value="Update" styel="margin:5px">
                                    </form>
<!--</div>-->
								</div>
                                <p class="store-name">sold by: <span>shopping center name</span></p>
                                <p class="order-now"style="float:right;color:red">order now, only {{$cart->stock}} left on stock!</p>
                                <div class="clear"></div>
                                <p>condition: <span>new</span></p>
                                <p>color: <span>blue</span></p>
                            </div>
                            <hr>
                            <a href="#" class="save">save for later</a>
                            <a href="{{url('/cart/remove')}}/{{$cart->id}}" class="delete">delete</a>
                        </div>
                    </div>
					 @endforeach 
     
                    <div class="col-md-4 right-side">
                        <div class="total-cost">
                            <p>total: </p>
                            <span class="price">{{Cart::getTotal()}} EGP</span>
                        </div>
                        <a href="{{url('check-out')}}"><button class="btn btn-block bg-success">proceed to checkout</button></a>
                        <button class="btn btn-block coupon">add coupon</button>
						
				<?php $count++;?>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
<br>
<br>
<br>
<br>

        <!-- Start Pre Footer -->
      <section class="pre-footer">
            <div class="container">
              <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                  <h4> Quick Links</h4>
                  <ul class="ula">
                    <li><a href="">about us <i class="fas fa-long-arrow-alt-right" aria-hidden="true"></i></a> </li>
                    <li><a href="">Faq <i class="fas fa-long-arrow-alt-right" aria-hidden="true"></i></a> </li>
                    <li><a href="">Help <i class="fas fa-long-arrow-alt-right" aria-hidden="true"></i></a> </li>
                    <li><a href="">My account <i class="fas fa-long-arrow-alt-right" aria-hidden="true"></i></a> </li>
                    <li><a href="">Create account <i class="fas fa-long-arrow-alt-right" aria-hidden="true"></i></a> </li>
                    <li><a href="">Contacts<i class="fas fa-long-arrow-alt-right" aria-hidden="true"></i></a> </li>
    
                  </ul>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <h4> Categories</h4>
                    <ul class="ula">
                      <li><a href="">Shops <i class="fas fa-long-arrow-alt-right" aria-hidden="true"></i></a> </li>
                      <li><a href="">Hotels <i class="fas fa-long-arrow-alt-right" aria-hidden="true"></i></a> </li>
                      <li><a href="">Restaurant <i class="fas fa-long-arrow-alt-right" aria-hidden="true"></i></a> </li>
                      <li><a href="">Bars <i class="fas fa-long-arrow-alt-right" aria-hidden="true"></i></a> </li>
                      <li><a href="">Events <i class="fas fa-long-arrow-alt-right" aria-hidden="true"></i></a> </li>
                      <li><a href="">Fitness <i class="fas fa-long-arrow-alt-right" aria-hidden="true"></i></a> </li>
    
                    </ul>
                  </div>
                  <div class="col-lg-3 col-md-6 col-sm-6">
                      <h4> Contacts</h4>
                      <ul class="ula">
                        <li><a href=""><i class="fas fa-home" aria-hidden="true"></i>97845 Baker st. 567
                          Los Angeles - US </a> </li>
                        <li><a href=""><i class="fas fa-headphones-alt" aria-hidden="true"></i>01015683986 </a> </li>
                        <li><a href=""> <i class="far fa-envelope" aria-hidden="true"></i>medhatashour19@gmail.com</a> </li>
                      </ul>
                    </div>
    
                    <div class="col-lg-3 col-md-6 col-sm-6">
                      <h4> Keep in touch</h4>
                      <ul class="ula">
                        <li>
                          <input type="email" placeholder="your email"><button class=" cclr">submit</button>
                        </li>
                        <li class="spli follow">
                          <h5>Follow Us</h5>
                          <ul>
                            <li class="spli"><i class="scl fab fa-facebook-f" aria-hidden="true"></i></li>
                            <li class="spli"><i class="scl fab fa-twitter" aria-hidden="true"></i></li>
                            <li class="spli"><i class="scl fab fa-google-plus-g" aria-hidden="true"></i></li>
                            <li class="spli"><i class="scl fab fa-pinterest-p" aria-hidden="true"></i></li>
                            <li class="spli"><i class="scl fab fa-instagram" aria-hidden="true"></i></li>
    
                          </ul>
                        </li>
    
                      </ul>
                    </div>
    
              </div>
            </div>
          </section>
          <!-- End Pre footer -->
    @endsection