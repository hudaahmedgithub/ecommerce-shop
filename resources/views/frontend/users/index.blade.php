@extends('frontend.layouts.main')
@section('content')

  <link rel="stylesheet" href="{{asset('frontend/css/user-home.css')}}">

<!-- Button trigger modal -->
<!-- Modal -->
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
	    id="address" class="form-control">
		<label>Phone</label>
		<input type="tel" name="phone"
	    id="phone" class="form-control">
		<label>City</label>
		<input type="text" name="city"
	    id="city" class="form-control">
		  
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
                                <li class="active"><a data-value=".account-overview" href="#"><i class="fa fa-user-o"></i>my account</a></li>
                                <li><a data-value=".orders" href="#orders"><i class="fa fa-hand-o-right"></i>orders</a></li>
                               
                                <li><a data-value=".details" href="#">details</a></li>
                                <li><a data-value=".address-book" href="#">address book</a></li>
                                <li><a data-value=".ch-password" href="#">change password</a></li>
                                <li class="divider"><a data-value=".newsletter" href="#">newsletter preferences</a></li>
                            </ul>
                            <button><a href="#">log out</a></button>
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
                               <p> Name : {{$user->name}}</p>
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
									<p>Phone is: {{$user->phone}}</p>
									<p>City is: {{$user->city}}</p>
									</div>
									<h6><button class="btn btn-link" data-toggle="modal" data-target="#myAddress">add default address</button></h6>
								
								</div>
								
                                
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">newsletter preferences</div>
                            <div class="card-body">
                                <p>You are currently not subscribed to any of our newsletters.</p>
                                <h6><a href="#">edit newsletter preferences</a></h6>
                            </div>
                        </div>
                    </section>
                    <!-------------------End of account overview section--------------->
                    <!-------------------Start of Orders section---------------------->
                    <section class="orders col-md-9" id="orders">
                        <h4>orders</h4>
                        <div class="order-item">
                            <div class="card">
                                <div class="card-header row">
                                    <div class="col-4">
                                        <p>Shipment 1 of 1</p>
                                        <p>Ready for shipping</p>
                                    </div>
                                    <div class="col-4">
                                        <p>Courier: mystore.com</p>
                                        <p><i class="fa fa-phone">01235568254</i></p>
                                    </div>
                                    <div class="col-4">
                                        <p>Tracking # </p>
                                        <p>125648562</p>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <ul class="progressbar">
                                        <li class="active">order placed<br>(22 oct 2019)</li>
                                        <li>order confirmed<br>(22 oct 2019)</li>
                                        <li>payment to shipping</li>
                                        <li>your product is ready</li>
                                        <li>Arriving (26 oct 2019)<br>To (27 oct 2019)</li>
                                    </ul>
                                </div><hr>
                                <div class="product-card">
                                    <img src="images/pro1.jpg" alt="cart image">
                                    <h5>description of this product</h5>
                                    <p>QTY 1</p>
                                </div>
                            </div>
                        </div>
                    </section>
                 
                    <!-------------------Start of Details section---------------------->
                    <section class="details col-md-9">
                        <h4>details</h4>
                        <div class="details-form">
                            <form action="#" class="row">
                                <div class="form-group col-md-6">
                                    <label for="first">first name</label>
                                    <input type="text" class="form-control" name="first-name" id="first">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="last">last name</label>
                                    <input type="text" name="last-name" id="last" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label for="email">e-mail</label>
                                    <p>saidomar155@yahoo.com</p>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="phone">prefix</label>
                                    <span class="st-num">+20</span>
                                    <input type="tel" name="phone" id="phone" class="form-control" placeholder="phone number (optional)">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="gender">gender (optional)</label>
                                    <select class="form-control" id="gender">
                                        <option>Male</option>
                                        <option>Female</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="date">Birthday(optional)</label>
                                    <input type="date" name="birthday" id="date" class="form-control">
                                </div>
                                <button class="btn btn-block bg-primary">save</button>
                            </form>
                        </div>
                    </section>
                    <!--------------------End of Details section----------------------->
                    <!-------------------Start of Address book section---------------------->
                    <section class="address-book col-md-9">
                        <h4>address book</h4>

                        <div class="card">
                            <div class="card-body">
                                <p>{{$user->name}}</p>
                                <p>24242</p>
                                <p>{{$user->address}}</p>
                                <p>{{$user->phone}}</p>
                            </div>
                            <div class="card-footer">set as default<a href="#"><i class="fa fa-pencil"></i></a></div>
                        </div>
                    </section>
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
                    <section class="newsletter col-md-9">
                        <h4>newsletter preferences</h4>
                        <div class="row">
                            <div class="col-md-7">
                                <div class="card">
                                    <div class="card-header">preferred language<a href="#"><i class="fa fa-pencil"></i></a></div>
                                    <div class="card-body">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" value="">English
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" value="">Arabic
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="card">
                                    <div class="card-header">subscribe to</div>
                                    <div class="card-body">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" value="">daily newsletters for her
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" value="">daily newsletters for him
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" value="" disabled>i don't want to recieve daily newletters
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!--------------------End of Newsletter section----------------------->
                </div>
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

$(document).on('click','#showAddress',function(){
	
	id=$(this).data('id');
	
   $.get('/read',{id:id},function(data){
		
		  $('#addAddress').append(
			         "<p>"+data.data.address+"</p>"
		             +"<p>"+data.data.phone+"</p>"
	                 +"<p>"+data.data.city+"</p>");
		});
		
	});


$(document).on('click','#edit',function(){
	
 id=$(this).data('id');
 name=$(this).parent().parent().find('#ename').text();
 email=$(this).parent().parent().find('#eemail').text();

	$('#name').val(name);
    $('#email').val(email);
    $('#btnAdd').hide();
	$('#update').attr('data-id',$(this).data('id'));
	$('#update').show();
  });
		

$(document).on('click','#updateAddress',function(e){
	e.preventDefault();
	  id=$(this).data('id');
      address=$('#address').val();
	  phone=$('#phone').val();
	  city=$('#city').val();
	
   $.post('/editAddress',{id:id,address:address,phone:phone,city:city},function(data){
	  
	    $('#address').val('');
		$('#phone').val('');
	   $('#city').val('');
	   var datas= 
		    "<p> Address is :"+data.data.address+"   </p>"
	        +"<p> Phone is :"+data.data.phone+"</p>"
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
	 /* id=$(this).data('id');
      oldPassword=$('#oldPassword').val();
	  newPassword=$('#newPassword').val();
	$.post('/postEdit',{id:id,oldPassword:oldPassword,newPassword:newPassword},function(){
	    $('#update').show();
	    $('#oldPassword').val('');
		$('#newPassword').val('');
	});
  });*/
$(document).on('click','#delete',function(){
	id=$(this).data('id');
	$.post('postDelete',{id:id},function(){
		alert('do you want to delete');
		$('#data').html('');
	 
	})
})
});
</script>	


@endsection
