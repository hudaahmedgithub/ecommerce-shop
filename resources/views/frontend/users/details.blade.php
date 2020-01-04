
<link rel="stylesheet" href="{{asset('frontend/css/user-home.css')}}">
<div class="user-home">
            <div class="container">
                <div class="row">
                    <!---------------------Start of aside ------------------->
                    <aside class="col-md-3">
                        <div>
                            <ul>
                                <li class=""><a  href="#"><i class="fa fa-user-o"></i>my account</a></li>
                                <li><a class="active btn btn-link" id="order"><i class="fa fa-hand-o-right"></i>orders</a></li>
                               
                                
                            </ul>
                            <button><a href="#">log out</a></button>
                        </div>
                    </aside>
<div class="details col-md-9" style="background:#fff">
  <h4>details</h4> <div class="details-form">
<form  class="row">
	
	<input type="hidden" name="id" value="{{$user->id}}">
                                <div class="form-group col-md-6">
                                    <label for="first">first name</label>
                                    <input type="text" class="form-control" name="first-name" id="first" value="{{$user->first_name}}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="last">last name</label>
                                    <input type="text" name="last_name" id="last_name" @if($user->last_name) value="{{$user->last_name}}" @endif class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label for="email">e-mail</label>
                                    <p>{{$user->email}}</p>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="phone">prefix</label>
									@if($user->phone)
                                    <span class="st-num">+20</span>
                                    <input type="tel" name="phone" id="phone" class="form-control" placeholder="phone number (optional)" value="{{$user->phone}}">
									@else
									<span class="st-num">+20</span>
                                    <input type="tel" name="phone" id="phone" class="form-control" placeholder="phone number (optional)">
									@endif
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="gender">gender (optional)</label>
                                    <select class="form-control" id="gender"name="gender">
                                        <option>Male</option>
                                        <option>Female</option>
                                    </select>
									
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="about">About(optional)</label>
                                    <input type="about" name="about" id="about" class="form-control"@if($user->about) value="{{$user->about}}" @endif>
                                </div>
                                <button class="btn btn-block bg-primary" data-id="{{$user->id}}" id="saveDetails" >save</button>
                            </form>
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
$(document).on('click','#saveDetails',function(e){
	e.preventDefault();
	id=$(this).data('id');
	last_name=$('#lastName').val();
	gender=$('#gender').val();
	about=$('#about').val();
	phone=$('#phone').val();
	//console.log(id,last_name,gender,about,phone);
   $.post('/saveDetails',{id:id,last_name:last_name,about:about,gender:gender},function(){
	   $('#lastName').val('');
	   $('#gender').val('');
	   $('#about').val('');
	   $('#phone').val('');
	   console.log('true');
   });
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
	
    $('#homeList').hide();
	$('.details').html(response);
	$('.details').show();
	});
});
$(document).on('click','#saveDetails',function(e){
	e.preventDefault();
	id=$(this).data('id');
	last_name=$('#last_name').val();
	gender=$('#gender').val();
	about=$('#about').val();
	phone=$('#phone').val();
//console.log(id,last_name,gender,about,phone);
   $.post('/saveDetails',{id:id,last_name:last_name,about:about,phone:phone},function(){
	   $('#last_name').val('');
	   $('#about').val('');
	   $('#phone').val('');
	   console.log('true');
   });
});
});

</script>	
