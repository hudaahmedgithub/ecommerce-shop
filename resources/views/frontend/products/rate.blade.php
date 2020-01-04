<div class="pro-cards row " id="showLow">
						@foreach($products as $product)
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="card">
                                <img src="{{url('frontend/images',$product->product['featured_image'])}}">
                                <span>{{$product->product['name']}}</span>
                                <hr>
                                <div class="info">
                                    <h6>{{$product->product['description']}}</h6>
                                    <p class="price">EGP   {{$product->product['price']}}</p><p class="before">EGP {{$product->product['before_price']}}   </p>
                                    <span class="discount-percentage">-20%</span>
                                </div>
                                <a href="{{url('product-details',$product->product_id)}}"><button type="button" class="btn bg-primary">buy now</button></a>
                            </div>
                        </div>
                     @endforeach
                        <hr>
						
