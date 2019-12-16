@extends('frontend.layouts.main')
@section('content')
<link rel="stylesheet" href="{{ url('assets/fonts/material-design/css/materialdesignicons.css') }}">
<!-- mCustomScrollbar -->
<link rel="stylesheet" href="{{ url('assets/plugin/mCustomScrollbar/jquery.mCustomScrollbar.min.css') }}">
  <link rel="stylesheet" href="{{asset('frontend/css/user-home.css')}}">

<!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title pull-right" id="myModalLabel">Change Password</h4>
      </div>
      <div class="modal-body">

		<label>Password</label>
		<input type="password" name="oldPassword"
	    id="oldPassword" class="form-control">
		<label>Password</label>
		<input type="password" name="newPassword"
	    id="newPassword" class="form-control">
		<input type="hidden" name="id"
	    id="id" class="form-control" value="{{$user->id}}">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="btnAdd"style="display:none;">Add item</button>
		 <button type="button" class="btn btn-primary" id="update" data-id="{{$user->id}}">Update</button>
		
		
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
                                <li><a data-value=".orders" href="#"><i class="fa fa-hand-o-right"></i>orders</a></li>
                                <li><a data-value=".reviews" href="#"><i class="fa fa-hand-o-right"></i>pending reviews</a></li>
                                <li><a data-value=".credit" href="#"><i class="fa fa-credit-card"></i>your credit</a></li>
                                <li class="divider"><a data-value=".save-items" href="#"><i class="fa fa-heart-o"></i>saved items</a></li>
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
                            <div class="card-body">
                                <p>{{$user->name}}</p>
                                <p>{{$user->email}}</p>
								<p>{{$user->password}}</p>
								<h6><button class="btn btn-link" data-toggle="modal" data-target="#myModal">change password</button></h6>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">address book</div>
                            <div class="card-body">
                                <p>Your default shipping address:</p>
                                <p>No default shipping address available</p>
                                <h6><a href="#">add default address</a></h6>
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
                    <section class="orders col-md-9">
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
                    <!--------------------End of Orders section----------------------->
                    <!-------------------Start of pending reviews section---------------------->
                    <section class="reviews col-md-9">
                        <h4>reviews</h4>
                    </section>
                    <!--------------------End of pending reviews section----------------------->
                    <!-------------------Start of Credit section---------------------->
                    <section class="credit col-md-9">
                        <h4>your credit</h4>
                    </section>
                    <!--------------------End of Credit section----------------------->
                    <!-------------------Start of Save items section---------------------->
                    <section class="save-items col-md-9">
                        <h4>save items</h4>
                        <div class="saved">
                            <img src="images/pro1.jpg" alt="cart image">
                            <div class="info">
                                <h5>description of this product</h5>
                                <p>EGP 230 <span class="discount">-10%</span></p>
                                <p class="after">EGP 207</p>
                            </div>
                            <div class="buttons">
                                <button class="btn btn-primary" type="button">buy now</button><br>
                                <button class="btn remove" type="button"><i class="fa fa-trash"></i>remove</button>
                            </div>
                        </div>
                    </section>
                    <!--------------------End of Save items section----------------------->
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
                                <p>Said Omar</p>
                                <p>24242</p>
                                <p>minia - maghagha</p>
                                <p>+20 1272691223</p>
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
function load(){
	$.get('/read',function(data){
		
		$.each(data,function(key,val){
		  $('#data').append("<tr>"
							   +"<td>"+val.id+"</td>"
							   +"<td id='ename'>"+val.name+"</td>"
							   +"<td id='eemail'>"+val.email+"</td>"
							   +"<td>"
							   +"<button class='btn btn-info' id='edit' data-id="+val.id+" data-toggle='modal' data-target='#myModal'>Edit</button>"+
							   "</td>"
							   +"<td>"
							   +"<button class='btn btn-danger' id='delete' data-id="+val.id+">Delete</button>"+
							   "</td>"+
							   
							 "</tr>");
		});
		
	});
	}
	load();
		$(document).on('click','#btnAdd',function(e){
			e.preventDefault();
			var name=$('#name').val();
		    var email=$('#email').val();
		    var password=$('#password').val();
			
	     $.post('/post',{name:name,email:email,password:password},function(data){
			 $('#btnAdd').show();
			 $('#name').val('');
			 $('#email').val('');
			 $('#password').val('');
			var datas="<tr>"       
							   +"<td>"+data.id+"</td>"
							   +"<td id='ename'>"+data.data.name+"</td>"
							   +"<td id='eemail'>"+data.data.email+"</td>"
							   +"<td>"
							   +"<button class='btn btn-info' id='edit' data-id="+data.id+" data-toggle='modal' data-target='#myModal'>Edit</button>"+
							   "</td>"
							   +"<td>"
							   +"<button class='btn btn-danger' id='delete' data-id="+data.id+">Delete</button>"+
							   "</td>"+
							   
						"</tr>";
			 $('#data').append(datas);
			 
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
$(document).on('click','#update',function(){
	
	  id=$(this).data('id');
      oldPassword=$('#oldPassword').val();
	  newPassword=$('#newPassword').val();
	
   $.post('/postEdit',{id:id,oldPassword:oldPassword,newPassword:newPassword},function(){
	   $('#update').show();
	    $('#oldPassword').val('');
		$('#newPassword').val('');
	   $('#data').html('');
	   load();
	   
    });
  });
$(document).on('click','#delete',function(){
	id=$(this).data('id');
	$.post('postDelete',{id:id},function(){
		alert('do you want to delete');
		$('#data').html('');
	   load();
	})
})
});
</script>	


@endsection
