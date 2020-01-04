@extends('frontend.layouts.main')
@section('content')

  <link rel="stylesheet" href="{{asset('frontend/css/user-home.css')}}">
<div class="details">
                       
	</div>
<div class="orderList">
             
</div>
<div id="homeList">
<!-- Button trigger modal -->
<!-- Modal -->
	<div class="modal fade" id="addressModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close pull-left" data-dismiss="modal" aria-label="Close" ><span aria-hidden="true" style="margin-right:440px">&times;</span></button>
        <h4 class="modal-title text-center" id="myModalLabel"style="margin-left:-660px;margin-right:30px">Complete Information</h4>
      </div>
      <div class="modal-body">
                            <label for="first">first name</label>
                            <input type="text" class="form-control" name="first_name" id="first" value="{{$user->first_name}}">
                         
                            <label for="last">last name</label>
                            <input type="text" name="last" id="last" class="form-control" value="{{$user->last_name}}">
                            <label for="email">e-mail</label>
                           <p>{{$user->email}}</p>
                             <label for="phone">prefix</label>
									
                                    <span class="st-num">+20</span>
                                    <input type="tel" name="phone" id="phone" class="form-control" placeholder="phone number (optional)" value="{{$user->phone}}">
									<label for="gender">gender (optional)</label>
                                    <select class="form-control" id="gender"name="gender">
                                        <option>Male</option>
                                        <option>Female</option>
                                    </select>
							
                                    <label for="about">About(optional)</label>
                                    <input type="about" name="about" id="about" class="form-control" value="{{$user->about}}">
		</div>
      <div class="modal-footer">
		  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		 <button type="button" class="btn btn-primary" data-id="{{$user->id}}" id="saveDetails" >save</button>
		</div></div></div></div>
	
	<!--  -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close pull-left" data-dismiss="modal" aria-label="Close" ><span aria-hidden="true" style="margin-right:440px">&times;</span></button>
        <h4 class="modal-title text-center" id="myModalLabel"style="margin-left:-660px;margin-right:30px">Change Password</h4>
      </div>
      <div class="modal-body">

		<label>Current Password</label>
		<input type="password" name="oldPassword"
	    id="oldPassword" class="form-control">
		<label>New Password</label>
		<input type="password" name="newPassword"
	    id="newPassword" class="form-control">
		<input type="hidden" name="id"
	    id="id" class="form-control" value="{{$user->id}}">
      </div>
      <div class="modal-footer">
		  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		 <button type="button" class="btn btn-primary" id="update" data-id="{{$user->id}}">Update</button>
		
		
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="myAddress" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title pull-right" id="myModalLabel">Change Address</h4>
      </div>
      <div class="modal-body">

		
		<label>Address</label>
		<input type="text" name="address"
	    id="address" class="form-control" value="{{$user->address}}">
		<label>Country</label>
		<input type="text" name="country"
	    id="country" class="form-control" value="{{$user->country}}">
		<label>City</label>
		<input type="text" name="city"
	    id="city" class="form-control" value="{{$user->city}}">
		  
		<input type="hidden" name="id"
	    id="id" class="form-control" value="{{$user->id}}">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        
		 <button type="button" class="btn btn-primary" id="updateAddress" data-id="{{$user->id}}">Update Address</button>
		
		
      </div>
    </div>
  </div>
</div>

 <div class="user-home">
            <div class="container">
                <div class="row">
                    <!---------------------Start of aside ------------------->
                    <aside class="col-md-3">
                        <div>
                            <ul>
                                <li class="active"><a  href="#"><i class="fa fa-user-o"></i>my account</a></li>
                                <li><a class="btn btn-link" id="order" data-id="{{$user->id}}"><i class="fa fa-hand-o-right"></i>orders</a></li>
                               
                                <li><a id="details"  data-id="{{$user->id}}">details</a></li>
                                
                            </ul>
                            <button>@auth
              
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class='fa fa-sign-out'></i> @lang('login.logout') ?
                    </a>
               
            @endauth</button>
                        </div>
                    </aside>
                    <!--------------------End of asid ------------------------------>
                    <!-------------------Start of account overview section--------------->
                    <section class="account-overview col-md-9 active">
                        <h4>account overview</h4>
                        <div class="card">
							<div class="card-header">account details<button data-toggle="modal" data-target="#myModal" class="btn btn-link pull-right"><i class="fa fa-pencil"></i></button></div>
                            <div class="card-body" id="dataUpdate">
							<div id="passData">	
								</div>
							   <p> Name : {{$user->first_name}}</p>
                               <p>Email : {{$user->email}}</p>
								
							
								<h6><button class="btn btn-link" data-toggle="modal" data-target="#myModal">change password</button></h6>
                            </div>
                        </div>
						    <div class="card">
                            <div class="card-header">address book</div>
                            <div class="card-body" >
								<div id="addAddress" data-id={{$user->id}}>
								<div id="oldAddress">
									<p>Address is: {{$user->address}}</p>
									<p>Country is: {{$user->country}}</p>
									<p>City is: {{$user->city}}</p>
									</div>
									<h6><button class="btn btn-link" data-toggle="modal" data-target="#myAddress">add default address</button></h6>
								
								</div>
								
                                
                            </div>
                        </div>
						 <div class="card">
                            <div class="card-header">Details book</div>
                            <div class="card-body" >
								<div data-id={{$user->id}}>
									 <div id="infoUser">
								<div id="oldInfoUser">
																			<p>First Name is: {{$user->first_name}}</p>
<p>Last Name is: {{$user->last_name}}</p>
<p>Phone is: {{$user->phone}}</p>
<p>About You is: {{$user->about}}</p>
<p>Gender You is: {{$user->gender}}</p>
									</div>
									</div>
									<h6><button class="btn btn-link" data-toggle="modal" data-target="#addressModal"data-id="{{$user->id}}">add details about you</button></h6>
								
								</div>
								
                                
                            </div>
                        </div>
                    
                        
                    </section>
                    <!-------------------End of account overview section--------------->
                    <!-------------------Start of Orders section---------------------->
					
                    <!-------------------Start of Details section---------------------->
                
                    <!--------------------End of Address book section----------------------->
                    <!-------------------Start of change password section---------------------->
                    <section class="ch-password col-md-9">
                        <h4>change password</h4>
                        <form action="#" class="row">
                            <input class="col-md-7" type="password" name="current-pass" id="current-password" placeholder="current password">
                            <input class="col-md-7" type="password" name="new-pass" id="new-password" placeholder="new password">
                            <input class="col-md-7" type="password" name="retype-new" id="retype-new-password" placeholder="retype new password">
                            <button class="col-md-7 btn btn-primary" type="submit">submit</button>
                        </form>
                    </section>
                    <!--------------------End of change password section----------------------->
                    <!-------------------Start of Newsletter section---------------------->
                    
                    <!--------------------End of Newsletter section----------------------->
                </div>
            </div>
        </div>
</div>
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
                                    <p>EGP {{$proRes->price}}</p><p class="before">EGP {{$proRes->before_price}}</p>
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
        
        <div class="top-selling">
            <div class="container">
                <div class="top-items">
                    <h4>recently viewed</h4><hr>
                    <div class="most-popular-products row">
						@foreach($products as $product)	
                        <div class="col-lg-2 col-md-4 col-sm-6">
						
                            <div class="card">
                                <img src="{{url('frontend/images',$product->featured_image)}}">
                                <div class="info">
                                    <h6>{{$product->description}}</h6>
                                    <p>EGP {{$product->price}}</p><p class="before">EGP {{$product->before_price}}</p>
                                    <span class="discount-percentage">-20%</span>
                                </div>
                            </div>
						
                        </div>
                        	@endforeach
                    </div>
                </div>
            </div>
        </div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
		<!-- Latest compiled and minified CSS -->
<script type="text/javascript">

	$(document).ready(function(){
		$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).on('click','#showAddress',function(){
	
	id=$(this).data('id');
	
   $.get('/read',{id:id},function(data){
		
		  $('#addAddress').append(
			         "<p>"+data.data.address+"</p>"
		             +"<p>"+data.data.country+"</p>"
	                 +"<p>"+data.data.city+"</p>");
		});
		
	});

$(document).on('click','#updateAddress',function(e){
	e.preventDefault();
	  id=$(this).data('id');
      address=$('#address').val();
	  country=$('#country').val();
	  city=$('#city').val();
	
   $.post('/editAddress',{id:id,address:address,country:country,city:city},function(data){
	
	    $('#address').val('');
		$('#country').val('');
	   $('#city').val('');
	   var datas= 
		    "<p> Address is :"+data.data.address+"</p>"
	        +"<p> Country is :"+data.data.country+"</p>"
	        +"<p> City is :"+data.data.city+"</p>";
			$('#addAddress').append(datas);
			$('#oldAddress').hide();
    });
  });
$(document).on('click','#update',function(){
	
        let id      = $(this).data('id');
	    let oldPassword=$('#oldPassword').val();
	    let newPassword=$('#newPassword').val();
        let action  = "{{ url('/') }}/passEdit";
        $.ajax({
            url: action,
            type: 'POST',
            dataType: 'json',
			data:{id:id,oldPassword:oldPassword,newPassword:newPassword},
            success: function(response) {
				 if (response.message === 'Edited Successfully') {
					 alert('your password changed');
					 $('#update').show();
	                 $('#oldPassword').val('');
		             $('#newPassword').val('');
				}
			},
            error: function(response) {
                alert('current password error');
            }
			
		});
});
	

$(document).on('click','#order',function(){
id=$(this).data('id');
	
$.get('/order',{id:id},function(response){
    $('#homeList').hide();
	
	$('.orderList').html(response);
	
	});
});
$(document).on('click','#details',function(){
	id=$(this).data('id');

  $.get('/details',{id:id},function(response){
	  console.log('true');
    $('#homeList').hide();
	$('.details').html(response);
	$('.details').show();
	});
});
$(document).on('click','#saveDetails',function(e){
	//e.preventDefault();
	  id=$(this).data('id');
	  first=$('#first').val();
      last=$('#last').val();
	  phone=$('#phone').val();
	  gender=$('#gender').val();
	  about=$('#about').val();
	
    $.post('/saveDetails',{id:id,first:first,last:last,about:about,phone:phone,gender:gender},function(data){
	   $('#first').val('');
	   $('#last').val('');
	   $('#about').val('');
	   $('#phone').val('');
	    var datas=
			"<p> First Name is :"+data.data.first+"</p>"
			+"<p> Last Name is :"+data.data.last+"</p>"
	        +"<p> Phone is :"+data.data.phone+"</p>"
	        +"<p> Abou you is :"+data.data.about+"</p>"
	        +"<p> Gender is :"+data.data.gender+"</p>";
			$('#infoUser').append(datas);
			$('#oldInfoUser').hide();
});
	});
		});
	
</script>	


@endsection
