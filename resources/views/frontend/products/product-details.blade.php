@extends('frontend.layouts.main')
@section('content')
<link rel="stylesheet" href="{{asset('frontend/css/pro-details.css')}}">
<div class="wrapper row">
            <div class="container">
                <!--all product details section-->
                <div class="content col-lg-9">
                    <!--product card with images and few info-->
                    <div class="product-card row">
                        <!--product image part-->
                        <div class="pro-img col-4">
                            <img class="main-img" src="{{url('frontend/images',$product->featured_image)}}" alt="product-image">
                            <div class="image-gallery">
                                <img src="images/1.jpg" alt="#">
                                <img src="images/1.jpg" alt="#">
                                <img src="images/pro1.jpg" alt="#">
                            </div>
                            <h5>share this product</h5>
                            <div class="social">
                                <i class="fa fa-facebook"></i>
                                <i class="fa fa-twitter"></i>
                            </div>
                        </div>
                        <!--product few details part-->
                        <div class="few-details col-8">
                            <h4>{{$product->description}}<i class="fa fa-heart-o"></i></h4>
                            
                            <p>Brand: <a href="#">{{$product->category['name']}}</a> | <a href="#">similar products of this brand</a></p>
                            <div class="rating-star">
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star-o"></span>
                                <a href="#">(5 ratings)</a>
                            </div><hr>
                            <p class="price">EGP {{$product->price}}</p>
                            <span class="price-before">EGP {{$product->old_price}}</span><span class="discount">{{$product->prencent}}</span>
                            <a href="{{url('cart/addItem',$product->id)}}"><button class="btn btn-block"><i class="fa fa-cart-plus" aria-hidden="true"></i>add to cart</button></a>
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
                    <!--Most popular products-->
                    <div class="most-popular">
                        <h4>most popular</h4><hr>
                        <div class="most-popular-products row">
                            <div class="col-lg-2 col-md-4 col-sm-6">
                                <div class="card">
                                    <img src="{{url('frontend/images',$product->image)}}">
                                    <div class="info">
                                        <h6>description of this product</h6>
                                        <p>EGP 1000</p><p class="before">EGP 1350</p>
                                        <span class="discount-percentage">-20%</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-4 col-sm-6">
                                <div class="card">
                                    <img src="images/pro1.jpg">
                                    <div class="info">
                                        <h6>description of this product</h6>
                                        <p>EGP 1000</p><p class="before">EGP 1350</p>
                                        <span class="discount-percentage">-20%</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-4 col-sm-6">
                                <div class="card">
                                    <img src="images/pro1.jpg">
                                    <div class="info">
                                        <h6>description of this product</h6>
                                        <p>EGP 1000</p><p class="before">EGP 1350</p>
                                        <span class="discount-percentage">-20%</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-4 col-sm-6">
                                <div class="card">
                                    <img src="images/pro1.jpg">
                                    <div class="info">
                                        <h6>description of this product</h6>
                                        <p>EGP 1000</p><p class="before">EGP 1350</p>
                                        <span class="discount-percentage">-20%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--feedback section-->
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
                                <div class="rating-count">
                                    <p>5
                                        <span class="fa fa-star checked"></span>200
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
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
        <div class="container">
            <div class="most-popular">
                <h4>more items from this seller</h4><hr>
                <div class="most-popular-products row">
                    <div class="col-lg-2 col-md-4 col-sm-6">
                        <div class="card">
                            <img src="images/pro1.jpg">
                            <div class="info">
                                <h6>description of this product</h6>
                                <p>EGP 1000</p><p class="before">EGP 1350</p>
                                <span class="discount-percentage">-20%</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-6">
                        <div class="card">
                            <img src="images/pro1.jpg">
                            <div class="info">
                                <h6>description of this product</h6>
                                <p>EGP 1000</p><p class="before">EGP 1350</p>
                                <span class="discount-percentage">-20%</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-6">
                        <div class="card">
                            <img src="images/pro1.jpg">
                            <div class="info">
                                <h6>description of this product</h6>
                                <p>EGP 1000</p><p class="before">EGP 1350</p>
                                <span class="discount-percentage">-20%</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-6">
                        <div class="card">
                            <img src="images/pro1.jpg">
                            <div class="info">
                                <h6>description of this product</h6>
                                <p>EGP 1000</p><p class="before">EGP 1350</p>
                                <span class="discount-percentage">-20%</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-6">
                        <div class="card">
                            <img src="images/pro1.jpg">
                            <div class="info">
                                <h6>description of this product</h6>
                                <p>EGP 1000</p><p class="before">EGP 1350</p>
                                <span class="discount-percentage">-20%</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Most popular products-->
        <div class="container">
            <div class="most-popular">
                <h4>recently viewed</h4><hr>
                <div class="most-popular-products row">
                    <div class="col-lg-2 col-md-4 col-sm-6">
                        <div class="card">
                            <img src="images/pro1.jpg">
                            <div class="info">
                                <h6>description of this product</h6>
                                <p>EGP 1000</p><p class="before">EGP 1350</p>
                                <span class="discount-percentage">-20%</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-6">
                        <div class="card">
                            <img src="images/pro1.jpg">
                            <div class="info">
                                <h6>description of this product</h6>
                                <p>EGP 1000</p><p class="before">EGP 1350</p>
                                <span class="discount-percentage">-20%</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-6">
                        <div class="card">
                            <img src="images/pro1.jpg">
                            <div class="info">
                                <h6>description of this product</h6>
                                <p>EGP 1000</p><p class="before">EGP 1350</p>
                                <span class="discount-percentage">-20%</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-6">
                        <div class="card">
                            <img src="images/pro1.jpg">
                            <div class="info">
                                <h6>description of this product</h6>
                                <p>EGP 1000</p><p class="before">EGP 1350</p>
                                <span class="discount-percentage">-20%</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-6">
                        <div class="card">
                            <img src="images/pro1.jpg">
                            <div class="info">
                                <h6>description of this product</h6>
                                <p>EGP 1000</p><p class="before">EGP 1350</p>
                                <span class="discount-percentage">-20%</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-6">
                        <div class="card">
                            <img src="images/pro1.jpg">
                            <div class="info">
                                <h6>description of this product</h6>
                                <p>EGP 1000</p><p class="before">EGP 1350</p>
                                <span class="discount-percentage">-20%</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

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