@extends('frontend.layouts.main')
@section('content')
        <div class="row home-page">
            <div class="container">
                <!--Start of content section-->
                <div class="col-md-9 content">
                    <!--Start of Heading section-->
                    <div class="heading text-center">
                        <h4>shop home & office essentials</h3>
                        <p><span>29556</span>products found</p>
                    </div>
                    <!--End of Heading section-->
                    <!--Start of Select category section-->
                    <div class="category">
                        <!-- top pagination -->
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="page-item"><a class="page-link" href="#"><i class="fa fa-angle-left"></i></a></li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#"><i class="fa fa-angle-right"></i></a></li>
                            </ul>
                        </nav>

                        <!--top price progress-->
                        <div class="po-count">
                            <p>EGP <span>0</span></p>
                            <input type="range" class="custom-range" min="0" max="1000" step="1" id="customRange2">
                            <p>EGP <span>1000</span></p>
                        </div>

                        <!--select category -->
                        <div class="select-category">
                            <select class="custom-select">
                                <option selected>most popular</option>
                                <option value="1">new in</option>
                                <option value="2">lowest price</option>
                                <option value="3">heighest price</option>
                                <option value="3">best rating</option>
                            </select>
                        </div>
                    </div>
                    <!--End of Select category section-->

                    <!--Start of Products card section-->
					
                    <div class="pro-cards row">
						@foreach($products as $product)
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="card">
                                <img src="{{url('frontend/images',$product->featured_image)}}">
                                <span>{{$product->name}}</span>
                                <hr>
                                <div class="info">
                                    <h6>{{$product->description}}</h6>
                                    <p class="price">EGP   {{$product->price}}</p><p class="before">EGP {{$product->old_price}}   </p>
                                    <span class="discount-percentage">-20%</span>
                                </div>
                                <a href="{{url('product-details',$product->id)}}"><button type="button" class="btn bg-primary">buy now</button></a>
                            </div>
                        </div>
                     
                        <hr>

                        <!--bottom pagination-->
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="page-item"><a class="page-link" href="#"><i class="fa fa-angle-left"></i></a></li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#"><i class="fa fa-angle-right"></i></a></li>
                            </ul>
                        </nav>
                    </div>
                    <!--End of Products card section-->
                </div>
                <!-- End of content section-->

                <!--Start of aside section-->
                <aside class="col-md-3">

                    <!--home & office category -->
                    <div class="home-office">
                        <h4>home & office</h4>
                        <ul>
                            <li><a href="#"><i class="fa fa-angle-right"></i>home & kitchen</a></li>
                            <li><a href="#"><i class="fa fa-angle-right"></i>tools & home improvment</a></li>
                            <li><a href="#"><i class="fa fa-angle-right"></i>office products</a></li>
                            <li><a href="#"><i class="fa fa-angle-right"></i>home & furniture</a></li>
                            <li><a href="#"><i class="fa fa-angle-right"></i>arts, crafts & sewing</a></li>
                        </ul>
                        <hr>
                    </div>

                    <!--Brands selector -->
                    <div class="brand">
                        <form class="form-inline">
                            <input class="form-control" type="search" placeholder="Search brand" aria-label="Search">
                            <i class="fa fa-search"></i>
                        </form>
                        <ul>
							@foreach($categories as $cat)
                            <li><a href="{{url('category',$cat->id)}}"><input type="checkbox" {{ $cat->id == $product->category_id ? 'checked' : '' }}>{{$cat->name}}</a></li>
							
                           @endforeach
                        </ul>
                    </div>
  @endforeach
                    <!--Range of prices-->
                    <div class="progress-price">
                        <h4>price</h4>
                        <input type="range" class="custom-range" min="0" max="1000" step="1" id="customRange2">
                        <p>EGP <span>0</span></p><p>EGP <span>1000</span></p>
                        
                    </div>
                    <hr>

                    <!-- Seller score progress-bar -->
                    <div class="progress-section">
                        <h4>seller score</h4>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: 80%" aria-valuenow="4.0" aria-valuemin="0" aria-valuemax="5">4.0</div>
                        </div>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: 60%" aria-valuenow="3.0" aria-valuemin="0" aria-valuemax="5">3.0</div>
                        </div>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: 40%" aria-valuenow="2.0" aria-valuemin="0" aria-valuemax="5">2.0</div>
                        </div>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: 20%" aria-valuenow="1.0" aria-valuemin="0" aria-valuemax="5">1.0</div>
                        </div>
                        <hr>
                    </div>
                    
                    <!--discount list-->
                    <div class="discount">
                        <h4>discount</h4>
                        <a href="#">50% off or more</a>
                        <a href="#">40% off or more</a>
                        <a href="#">30% off or more</a>
                        <a href="#">20% off or more</a>
                        <a href="#">10% off or more</a>
                    </div>
                </aside>
                <!--End of aside section-->
            </div>
        </div>

        <!-- Start Pre Footer -->
@endsection