@extends('frontend.layouts.main')
@section('content')
    <!-- Start Main Content -->

    <main>

   @if(Session::has('error'))
            <div class="alert alert-danger alert-block">
	            <button type="button" class="close" data-dismiss="alert"></button>	
                   <strong>{!! session('error')!!}</strong>
            </div>
            
            @endif
            
     @if(Session::has('success'))
            <div class="alert alert-success alert-block">
	            <button type="button" class="close" data-dismiss="alert"></button>	
                   <strong>{!! session('success')!!}</strong>
            </div>
            
            @endif
	<!-- Start Header -->
      <section class="header">
        <div class="container">
         <div class="row">
           <div class="col-md-8">
             <!-- Carousel Content -->
             <div class="bd-example">
              <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                  <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                  <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                  <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                  <div class="carousel-inner">
        @foreach($sliders as $key => $slider)
        <div class="carousel-item {{$key == 0 ? 'active' : '' }}">
            <img src="{{url('frontend/images', $slider->image)}}" class="d-block w-100"  alt="..."> 
        </div>
        @endforeach
                </div>

              </div>
				 </div></div>
			 </div>
           <!-- Aside Content -->
           <div class="col-md-4">
             <div class="card" style="width: 17rem;">
              <ul class="list-group list-group-flush">
                <li class="list-group-item"><img src="{{asset('frontend/images/icons/get-money.svg')}}" class="side-icon">Save your money</li>
                <li class="list-group-item"><img src="{{asset('frontend/images/icons/credit-card.svg')}}" class="side-icon">Pay with Credits</li>
                <li class="list-group-item"><img src="{{asset('frontend/images/icons/time-passing.svg')}}" class="side-icon">Fast Delivery</li>
              </ul>
            </div>
           </div></div></div>
      </section>
      <!-- End Header -->

      <!-- Start About -->
      <section class="about">
        <div class="container">
          <div class="row">
            <div class="col-md-7 content-box">
              <h1>Da Alfredo Italian Restaurant</h1>
              <span class="firm-location"><i class="fas fa-map-marker-alt"></i> &nbsp;438 Rush Green Road, Romford</span>
              <p>Per consequat adolescens ex, cu nibh commune temporibus vim, ad sumo viris eloquentiam sed. Mea appareat omittantur eloquentiam ad, nam ei quas oportere democritum. Prima causae admodum id est, ei timeam inimicus sed. Sit an meis aliquam, cetero inermis vel ut. An sit illum euismod facilisis, tamquam vulputate pertinacia eum at.</p>
              <p>Cum et probo menandri. Officiis consulatu pro et, ne sea sale invidunt, sed ut sint blandit efficiendi. Atomorum explicari eu qui, est enim quaerendum te. Quo harum viris id. Per ne quando dolore evertitur, pro ad cibo commune.</p>
              <h3>Amenities</h3>
              <div class="row">
                <div class="col-md-6">
                  <ul class="list-unstyled features">
                    <li><i class="fas fa-check-circle" aria-hidden="true"></i>Dolorem mediocritatem</li>
                    <li><i class="fas fa-check-circle" aria-hidden="true"></i>Mea appareat</li>
                    <li><i class="fas fa-check-circle" aria-hidden="true"></i>Prima causae</li>
                    <li><i class="fas fa-check-circle" aria-hidden="true"></i>Singulis indoctum</li>
                      </ul>
                    </div>
                    <div class="col-md-6">
                  <ul class="list-unstyled features">
                    <li><i class="fas fa-check-circle" aria-hidden="true"></i>Timeam inimicus</li>
                    <li><i class="fas fa-check-circle" aria-hidden="true"></i>Oportere democritum</li>
                    <li><i class="fas fa-check-circle" aria-hidden="true"></i>Cetero inermis</li>
                    <li><i class="fas fa-check-circle" aria-hidden="true"></i>Pertinacia eum</li>
                  </ul>
              </div>
              </div>
              <div class="open">
                <div class="ribon">
                  NOW OPEN
                </div>
                <i class="far fa-clock" aria-hidden="true"></i>
                <h4 style="display: inline-block;margin-left: 14px;">Opening Hours</h4>
                <div class="row">
                  <div class="col-md-6">
                    <ul class="list-unstyled timing">
                      <li>Monday <span>9 AM - 5 PM</span> </li>
                      <li>Tuesday <span>9 AM - 5 PM</span></li>
                      <li>Wednesday <span>9 AM - 5 PM</span></li>
                      <li>Thursday <span>9 AM - 5 PM</span></li>
                    </ul>
                  </div>
                  <div class="col-md-6">
                      <ul class="list-unstyled timing">
                        <li>Saturday <span>9 AM - 5 PM</span></li>
                        <li>Sunday <span>9 AM - 5 PM</span></li>
                        <li>Friday <span>closed</span></li>

                      </ul>
                    </div>
                </div>
              </div>
            </div>

            <div class="col-md-4 offset-md-1">
              <div class="box">
                <div class="mainbx">
                  <div class="header">
                    <h4>Search Now</h4>
                  </div>
                  <div class="in-a">
                  <input type="text" placeholder="Search" style="width: 268px;border: unset;padding: 7px;padding-left: 10px">
                  <i class="fas fa-search text-secondary" aria-hidden="true"></i>
                </div>
                <div class="in-a">
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Brand <span>1</span>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 36px, 0px);">
                          <a class="dropdown-item" href="#">Action</a>
                          <a class="dropdown-item" href="#">Another action</a>
                          <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                      </div>
                </div>
                
                    
                      <div class="progress-price">
                          <h4>price</h4>
                          <input type="range" class="custom-range" min="0" max="1000" step="1" id="customRange2">
                          <p>EGP <span>0</span></p><p>EGP <span>1000</span></p>
                          
                      </div>
                        <!--div class="in-a">
                        <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Time
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 36px, 0px);">
                          <a class="dropdown-item" href="#">Action</a>
                          <a class="dropdown-item" href="#">Another action</a>
                          <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                      </div>
                  </div-->
                <button class="mybtn cclr">Purchase</button>
                <button class="lstbtn"><i class="fas fa-heart" aria-hidden="true"></i> Add to Wishlist</button>
                <div class="small"> <small>no money gained in this project</small> </div>
                </div>
            </div>
            </div>
          </div>
        </div>
      </section>
      <!-- End About -->

      <!-- Start Products View -->
      <section class="products">
        <div class="container">
        <div class="row">
          <div class="col-md-7 content-box">
            <div class="bx2">
              <h4>Starters</h4>
              <div class="row">
                <div class="col-md-5">
                  <ul class="list-unstyled">
					  @foreach($productsOnly as $product)
                    <li>
                      <div class="img">
                        <img src="{{url('frontend/images',$product->featured_image)}}" width="100px" height="100px">
                      </div>
                      <h6>{{$product->name}}<span> ${{$product->price}} </span></h6>
                      <p>Brand/{{$product->category['name']}} </p>
                    </li>
					<br>
                       @endforeach
                      </ul>
                    </div>

                </div>
            </div>
          </div>
        </div>
       </div>
      </section>
      <!-- End Products -->
      <br>
      <br>


      <!-- Start Location -->
      <section class="location content-box">
        <div class="container">
          <div class="row">
            <div class="">
              <h4>Location</h4>
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14026.38559056169!2d30.811370275381154!3d28.491699019574796!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x145b06b569ca46eb%3A0xa344992a2c76e19e!2z2KjZhtmKINmF2LLYp9ix2Iwg2YXYr9mK2YbYqSDYqNmG2Yog2YXYstin2LHYjCDYqNmG2Ykg2YXYstin2LHYjCDYp9mE2YXZhtmK2Kc!5e0!3m2!1sar!2seg!4v1570984818216!5m2!1sar!2seg" width="620px" height="450px" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
            </div>
          </div>
        </div>
      </section>
      <!-- End Location -->

      <!-- Start Review -->
      <section class="review">
        <div class="container">
          <div class="row">
            <div class="col-md-7 content-box">
              <div class="bx4">
              <br>
              <br>
              <h4>Reviews</h4>
              <div class="row">
                <div class="col-lg-3">
                  <div class="green-box cclr color-a">
                    <strong>8.5</strong>
                    <h6>Superb</h6>
                    <p>based on 4 reviews</p>
                  </div>
                </div>
                <div class="col-lg-9">

                  <div class="progress">
                    <div class="progress-bar cclr color-a" role="progressbar" style="width: 85%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <div class="progress">
                    <div class="progress-bar cclr color-a" role="progressbar" style="width: 95%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <div class="progress">
                    <div class="progress-bar cclr color-a" role="progressbar" style="width: 65%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <div class="progress">
                    <div class="progress-bar cclr color-a" role="progressbar" style="width: 25%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <div class="progress">
                      <div class="progress-bar cclr color-a" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
              </div>
     
	<div id="data">
		@foreach($comments as $comment)
		
		        <div class="review" >
                <div class="img">
                  <img src="{{url('frontend/images',$comment->user['image'])}}" width="80px" height="80px">
                </div>
                <div class="txt" style="margin-top:-30px">

					<p>product name:{{$comment->product->name}} </p>
					<div class="stars" style="margin-top:-15px">
					  @for($i=0;$i<($comment->rate);$i++)
                      <i class="fas fa-star" aria-hidden="true"></i>
					  @endfor
                  </div>
                  <span>{{$comment->user['first_name']}} – {{$comment->created_at->diffForHumans()}}</span>
				 <p>{{$comment->comment}}</p>
                </div>
              </div>
		@endforeach
		</div>
		<div class="st" style="margin-top:-140px;margin-left:120px;margin-bottom:40px"></div>
		<br><br><br><br><br><br>
	</div>
  
            <div class="bx5">
              
              <h3>Leave a Review</h3>
              <form >
				  
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="inputEmail4">Email</label>
                      <input type="email" class="form-control" id="email" placeholder="Email" name="email">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="inputPassword4">Password</label>
                      <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputAddress">Address</label>
                    <input type="text" class="form-control" id="address" placeholder="1234 Main St" name="address">
                  </div>
				  <div class="form-group col-md-6">
                      <label for="rate">Rate</label>
                     <select name="rate" id="rate">
						  <option value="0">0</option>
						  <option value="1">1</option>
						  <option value="2">2</option>
						  <option value="3">3</option>
						  <option value="4">4</option>
						  <option value="5">5</option>
					  </select>
                    </div>
				  <div class="form-group col-md-6">
                      <label for="product">Product</label>
                     <select name="product_id" id="product_id">
						 @foreach($products as $product)
						 <option value="{{$product->id}}">{{$product->name}}</option>
						 @endforeach
					  </select>
				  </div>
                  <div class="form-group">
                    <label for="inputAddress2">Your Review</label>
                    <textarea style="width: 100%; height:150px; border-radius: 8px;border-color:rgb(206, 212, 218);" name="comment" id="comment"></textarea>
                  </div>

              <button type="submit" class="cclr btn btn-primary search-btn" id="addReview">Submit</button>
                </form>
            </div>
            </div>
          </div>
        </div>
		  </div>
      </section>
      <!-- End review -->
</main>
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
			var email=$('#email').val();
		    var password=$('#password').val();
		    var rate=$('#rate').val();
			var comment=$('#comment').val();
			var product_id=$('#product_id').val();
		
	     $.post('/store-review',{email:email,password:password,rate:rate,comment:comment,product_id:product_id},function(data){
			 $('#email').val('');
             $('#password').val('');
             $('#rate').val('0');
             $('#comment').val('');
             $('#product_id').val('');
	var sstr='';
		var datas="<div class='review'>"+
				 "<div class='img'>"+
                '<img src="{{asset('frontend/images')}}/'+data.img+'" width="80" height="80" id="feature_img">'
				+"</div>"
                +"<div class='txt'>"
					+"<p> product name:"+data.product+"</p>"+
				"<span>"+data.name +'&nbsp;'+'&nbsp;'+"</span>"+
				"<span style='margin-top:7px;margin-bottom:7px'>"+data.created_at+"</span>"+
                "<p>"+data.data.comment+"</p>"+
                "</div>"
				
             + "</div>";
		for (i = 0; i < data.data.rate; i++) {
			  sstr += '<i class="fas fa-star" aria-hidden="true" ></i>';}
			 $('.st').append(sstr);
	
			 $('#data').append(datas);
		
		 });
		});
	
  });

</script>

@endsection