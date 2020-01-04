@extends('frontend.layouts.main')
@section('content')
<link rel="stylesheet" href="{{asset('frontend/css/pro-details.css')}}">
<div class="wrapper row">
            <div class="container">
                <!--all product details section-->
                <div class="content col-lg-9">
                    <!--product card with images and few info-->
                    <div class="product-card row" >
                        <!--product image part-->
                        <div class="pro-img col-4">
                            <img class="main-img" src="{{url('frontend/images',$product->featured_image)}}" alt="product-image">
							
                            <div id="">
								@foreach($images as $img)
								<a href="#" id=""> <img src="{{url('frontend/images',$img->path)}}" alt="#" width="50px" height="70px" ></a>
                              @endforeach  
                            </div>
							
                            <h5>share this product</h5>
                            <div class="social">
                                <i class="fa fa-facebook"></i>
                                <i class="fa fa-twitter"></i>
                            </div>
                        </div>
                        <!--product few details part-->
                        <div class="few-details col-8">
                            <h4>{{$product->name}}</h4>
                             <h5>{{$product->description}}</h5>
                            <p>Brand: <a  data-id={{$product->category_id}}>{{$product->category['name']}}</a> | <a href="#">similar products of this brand</a></p>
                            <div class="rating-star">
						@foreach($rate as $rating)
						  @for($i=0;$i<$rating->rate;$i++)
								<span class="fa fa-star checked"></span>
                                <a href="#"></a>
							@endfor
								({{($rating->rate)}} ratings)
                          @endforeach
                            </div>
								<hr>
                            <p class="price" >EGP {{$product->price}}</p>
                            <span class="price-before">EGP {{$product->before_price}}</span><span class="discount">{{$product->prencent}}</span>
							<input type="hidden" value="{{$product->name}}" id="name" name="name">
							<input type="hidden" value="{{$product->price}}" id="price" name="price">
                            <a href="{{url('cart/addItem',$product->id)}}"><button class="btn btn-block" id="addCart" data-id="{{$product->id}}"><i class="fa fa-cart-plus" aria-hidden="true" ></i>add to cart</button></a>
                        </div>
                    </div>
                    <!--product-details section-->
                    <div class="product-details">
                        <h4>product details</h4><hr>
                        <div class="general-details">
                            <h6>5.5-inch HD Screen</h6>
                            <p>The device features a 5.5-inch display of 1280x720 resolution. It is powered by a Quad-core chipset, an 8MP back camera, 2-megapixel front-facing camera, 8GB of expandable internal storage, and a 2,800mAh battery.</p>
                            <h6>Quad Core - Powerful Technology</h6>
                            <p>Do more faster with its Quad Core Processor. The quad-core system packs incredible performance with impressive energy efficiency for exceptional multi-tasking. It delivers you higher performance for demanding applications. Now you can do many processes at once.</p>
                        </div>
                        <div class="technical-specification">
                            <h4>technical-specification</h4>
                            <h6>Display</h6>
                            <ul>
                                <li>
                                    <h6>Display Size:</h6><p>5.5 inches</p>
                                </li>
                                <li>
                                    <h6>Display Resolution:</h6><p>1280 x 720 pixels</p>
                                </li>
                                <li>
                                    <h6>Display Type:</h6><p>IPS capacitive touchscreen, 16M colors</p>
                                </li>
                            </ul>
                            <h6>Memory</h6>
                            <ul>
                                <li>
                                    <h6>System Memory:</h6><p>1 GB RAM</p>
                                </li>
                                <li>
                                    <h6>Internal Memory:</h6><p>8 GB ROM</p>
                                </li>
                                <li>
                                    <h6>Card Slot:</h6><p>microSD, up to 64 GB</p>
                                </li>
                            </ul>
                            <h6>Display</h6>
                            <ul>
                                <li>
                                    <h6>Display Size:</h6><p>5.5 inches</p>
                                </li>
                                <li>
                                    <h6>Display Resolution:</h6><p>1280 x 720 pixels</p>
                                </li>
                                <li>
                                    <h6>Display Type:</h6><p>IPS capacitive touchscreen, 16M colors</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!--specification section-->
                    <div class="specification">
                        <h4>specification</h4><hr>
                        <div class="card">
                            <div class="card-header">KEY FEATURES</div>
                            <div class="card-body text-dark">
                                <ul>
                                    <li>5.5-inch HD IPS Touch Screen</li>
                                    <li>8 GB Storage, MicroSD up to 64 GB</li>
                                    <li>8MP Back Camera, 2MP Front Camera</li>
                                    <li>Quad-core 1.3 GHz CPU, 1 GB RAM</li>
                                    <li>Li-ion 2800 mAh Battery, Dual SIM</li>
                                    <li>Android OS, v6.0 (Marshmallow)</li>
                                </ul>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">KEY FEATURES</div>
                            <div class="card-body text-dark">
                                <ul>
                                    <li>5.5-inch HD IPS Touch Screen</li>
                                    <li>8 GB Storage, MicroSD up to 64 GB</li>
                                    <li>8MP Back Camera, 2MP Front Camera</li>
                                    <li>Quad-core 1.3 GHz CPU, 1 GB RAM</li>
                                    <li>Li-ion 2800 mAh Battery, Dual SIM</li>
                                    <li>Android OS, v6.0 (Marshmallow)</li>
                                </ul>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">KEY FEATURES</div>
                            <div class="card-body text-dark">
                                <ul>
                                    <li>5.5-inch HD IPS Touch Screen</li>
                                    <li>8 GB Storage, MicroSD up to 64 GB</li>
                                    <li>8MP Back Camera, 2MP Front Camera</li>
                                    <li>Quad-core 1.3 GHz CPU, 1 GB RAM</li>
                                    <li>Li-ion 2800 mAh Battery, Dual SIM</li>
                                    <li>Android OS, v6.0 (Marshmallow)</li>
                                </ul>
                            </div>
                        </div>
                    </div>
              
                    <div class="feedback">
                        <h4>customer feedback<span>see all<i class="fa fa-angle-right"></i></span></h4><hr>
                        <div class="row">
                            <div class="col-lg-3">
                                <h5>Product Ratings</h5>
                                <div class="rating-box">
                                    <p>4.0 / 5</p>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star-o"></span>
                                    <p>286 ratings</p>
                                </div>
				@foreach($rate as $rating)
                                <div class="rating-count">
                                    <p>{{$rating->rate}}
                                        <span class="fa fa-star checked"></span>
										
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" style="width: 80%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </p>
                                    <p>4
                                        <span class="fa fa-star checked"></span>78
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" style="width: 70%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </p>
                                    <p>3
                                        <span class="fa fa-star checked"></span>36
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" style="width: 60%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </p>
                                    <p>2
                                        <span class="fa fa-star checked"></span>25
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" style="width: 40%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </p>
                                    <p>1
                                        <span class="fa fa-star checked"></span>20
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" style="width: 20%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </p>
                                </div>
				@endforeach
                            </div>
                            <div class="col-lg-9">
                                
                            </div>
                        </div>
                    </div>
                </div>
                <aside class="col-lg-3">
                    <div class="delivery">
                        <h4>delivery & returns</h4><hr>
                        <div class="delivery-info">
                            <i class="fa fa-truck"></i>
                            <div>
                                <h6>Delivery Information</h6>
                                <p>Delivered by Tuesday 22 Oct</p>
                            </div>
                            <i class="fa fa-truck"></i>
                            <div>
                                <h6>Delivery Information</h6>
                                <p>Delivered by Tuesday 22 Oct</p>
                            </div>
                            <i class="fa fa-truck"></i>
                            <div>
                                <h6>Delivery Information</h6>
                                <p>Delivered by Tuesday 22 Oct</p>
                            </div>
                        </div>
                    </div>
                    <div class="seller-info">
                        <a href="#"><h4>seller information<i class="fa fa-angle-right"></i></h4></a><hr>
                        <h6>Safico Trading Consignment Marketplace</h6>
                        <p>Seller Score: 86%</p>
                    </div>
                    <div class="have-to-sell">
                        <a href="#"><h6>Have one to sell?<i class="fa fa-angle-right"></i></h6></a>
                        <p>Click here to list your product</p>
                    </div>
                </aside>
            </div>
        </div>
        <!--Most popular products-->
       
			 <!-----------------Top selling items---------------------->
        <div class="top-selling">
            <div class="container">
                <div class="top-items">
                    <h4>top selling</h4><hr>
                    <div class="most-popular-products row">
					
                 @foreach($reservations  as $product)
							
                        <div class="col-lg-2 col-md-4 col-sm-6">
						@foreach($product->products as $proRes)
                            <div class="card">
                                <img src="{{url('frontend/images',$proRes->featured_image)}}">
                                <div class="info">
                                    <h6>{{$proRes->description}}</h6>
                                    <p>EGP {{$proRes->price}}</p><p class="before"></p>
                                    <span class="discount-percentage">-20%</span>
                                </div>
                            </div>
					@endforeach
                        </div>
						
                        	@endforeach
                        </div>
                     
                    </div>
                </div>
            </div>
        </div>

        <!----------------------Recently viewed-------------------->
        
      

        <!--Most popular products-->
        <div class="container">
            <div class="most-popular">
                <h4>recently viewed</h4><hr>
                <div class="most-popular-products row">
                   
                       	@foreach($products as $product)	
						
                        <div class="col-lg-2 col-md-4 col-sm-6">
						
                            <div class="card">
                                <img src="{{url('frontend/images',$product->featured_image)}}" width="150px" height="150px">
                                <div class="info">
                                    <h6>{{$product->description}}</h6>
                                    <p >EGP {{$product->price}}</p><p class="before">EGP {{$product->before_price}}</p>
                                    <span class="discount-percentage">-20%</span>
                                </div>
                            </div>
						
                        </div>
							
                        	@endforeach
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

/*$(document).on('click','#addCart',function(e){
			e.preventDefault();
			 name=$('#name').val();
		     price=$('#price').val();
	         id=$(this).data('id');
		    console.log(id,name,price);
		
	     $.get('/cart/addItem',{id:id},function(data){
			 console.log(data.data);
		 })
    })*/
});
</script>


 @endsection