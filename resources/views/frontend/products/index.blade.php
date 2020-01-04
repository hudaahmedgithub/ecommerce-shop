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
                                {{ $products->links() }}
                            </ul>
                        </nav>

                        <!--top price progress-->
                        <div class="po-count">
                            <p>EGP <span>{{$min}}</span></p>
                            <input type="range" class="custom-range" min="0" max="1000" step="1" id="customRange2">
                            <p>EGP <span>{{$max}}</span></p>
                        </div>
						<button type="button" class="btn btn-info" id="btnFind" style="margin-left:-30px;">Search </button>
                        <!--select category -->
                        <div class="select-category">
                            <select id="selectProduct">
                                
                                <option value="1">new in</option>
                                <option value="2">lowest price</option>
                                <option value="3">heighest price</option>
                                <option value="4">best rating</option>
                            </select>
                        </div>
						
                    </div>
                    <!--End of Select category section-->

                    <!--Start of Products card section-->
					<div id="searchProduct">
					<div id="showProduct">
					<div id="showLow">
                    <div class="pro-cards row showLow" id="showProducts">
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
						</div>	
						
                        <!--bottom pagination-->
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                               {{ $products->links() }}
                               
                            </ul>
                        </nav>
                    </div>
                    <!--End of Products card section-->
                </div>
				</div>
				</div>
                <!-- End of content section-->

                <!--Start of aside section-->
                <aside class="col-md-3">

                    <!--home & office category -->
                    <div class="home-office">
                        <h4>home & office</h4>
                        <ul>
							@foreach($categories as $cat)
                            <li><a  id="one" class="btn btn-link" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample"  data-id={{$cat->id}} >{{$cat->name}}</a>
								
							<div  id="getData">
                       </div>
							</li>
							
							@endforeach
                            
                        </ul>
                        <hr>
                    </div>

                    <!--Brands selector -->
                    <div class="brand" >
                        <form class="form-inline" id="searchCategory" >
						
                            <input class="col-md-8 form-control" type="search" placeholder="Search brand" aria-label="Search" name="search" id="searchCat">
							<button type="submit" class="col-md-4 btn btn-info"> search</button>
                           
                        </form>
                        <ul >
							<li><input type="checkbox" id="allProducts">كل المنتجات</li>
							<div id="cat">
							@foreach($products as $pro)
                            <li><input type="checkbox" id="categoryList" data-id="{{$pro->id}}">{{$pro->name}}</li>
							@endforeach
							</div>	
                        </ul>
                    </div>
  
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
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

		<!-- Latest compiled and minified CSS -->
<script type="text/javascript">

	$(document).ready(function(){
		$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
 });
	$(document).on('click','#btnFind',function(){
		value=$('#selectProduct').val();
		
	$.post('/low',{value:value},function(response){
	console.log(response);
	$('.showLow').html(response);

});	
});
		
$(document).on('click','#categoryList',function(){
	id=$(this).data('id');
$.get('/category',{id:id},function(response){
	
	$('#showProduct').html(response);

});
});
$(document).on('click','#allProducts',function(){

$.get('/allProducts',function(response){	$('#showProducts').html(response);
 });
});
$('#searchCategory').submit(function(e){
	e.preventDefault();
search=$('#searchCat').val();
$.post('/getCategory',{search:search},function(data){
		console.log(data.data);
		$('#cat').html('');
		   $('#cat').append("<li>"
							 +"<input type='checkbox' id='categoryList' data-id="+data.data.id+">"
							 +data.data.name+"</li>");
	});
});
$(document).on('click','#one',function(){
	id=$(this).data('id');
	console.log(id);
	$.get('/getSide',{id:id},function(response)
		 {
		console.log(response);
		
		$('#getData').html(response);
	});
});
			
$('#searchAll').submit(function(e){
	e.preventDefault();
search=$('#search').val();
	
$.post('/getSearch',{search:search},function(response){
	console.log(response);
	
	$('#searchProduct').html(response);
	});
});
	});
</script>
        <!-- Start Pre Footer -->
@endsection