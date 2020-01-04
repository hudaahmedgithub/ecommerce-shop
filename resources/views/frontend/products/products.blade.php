<div class="pro-cards row " id="showProducts">
						@foreach($products as $product)
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="card">
                                <img src="{{url('frontend/images',$product->featured_image)}}">
                                <span>{{$product->name}}</span>
                                <hr>
                                <div class="info">
                                    <h6>{{$product->description}}</h6>
                                    <p class="price">EGP   {{$product->price}}</p><p class="before">EGP {{$product->before_price}}   </p>
                                    <span class="discount-percentage">-20%</span>
                                </div>
                                <a href="{{url('product-details',$product->id)}}"><button type="button" class="btn bg-primary">buy now</button></a>
                            </div>
                        </div>
                     @endforeach
                        <hr>
						
