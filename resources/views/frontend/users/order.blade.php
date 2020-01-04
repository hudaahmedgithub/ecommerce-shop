
<div class="user-home">
            <div class="container">
                <div class="row">
                    <!---------------------Start of aside ------------------->
                    <aside class="col-md-3">
                        <div>
                            <ul>
                                <li class=""><a  href="{{route('profile')}}"><i class="fa fa-user-o" style="background:#fff"></i>my account</a></li>
                                <li><a class="active btn btn-link" id="order" style="background:#ccc"><i class="fa fa-hand-o-right"></i>orders</a></li>
                               
                                
                            </ul>
                            <button><a href="{{url('/logout')}}">log out</a></button>
                        </div>
                    </aside>
                    <!--------------------End of asid ------------------------------>
                    <!-------------------Start of account overview section--------------->
                  <!-------------------Start of Orders section---------------------->
                    <div class="orders col-md-9">
                        <h4>orders</h4>
                        <div class="order-item">
							@foreach($orders as $order)
                            <div class="card">
                                <div class="card-header row">
									
                                    <div class="col-4">
						
                                        <p>Shipment 1 of 1 </p>
                                        <p>Ready for shipping</p>
										
                                    </div>
                                    <div class="col-4">
                                        <p>Courier: admin@gmail.com</p>
                                        <p><i class="fa fa-phone">0101234567</i></p>
                                    </div>
                                    <div class="col-4">
                                        <p>Tracking # </p>
                                        <p>125648562</p>
                                    </div>
                                </div>
								<div class="card-body">
                                    <ul class="progressbar">
								@if($order->status=="pending")
                                 <li class="active">order placed<br>(22 oct 2019)</li>
								<li >order confirmed<br>(22 oct 2019)</li>
								<li>payment to shipping</li>
								<li>your product is ready</li>
                                <li>Arriving (26 oct 2019)<br>To (27 oct 2019)</li>
                                  @elseif($order->status=="scheduled")   <li >order placed<br>(22 oct 2019)</li>
								<li class="active" >order confirmed<br>{{\Carbon\Carbon::parse($order->created_at)->format('d M Y')}}</li>
								<li>payment to shipping</li>
								<li>your product is ready</li>
                                    <li>Arriving (26 oct 2019)<br>To (27 oct 2019)</li>
									@else
									<li >order placed<br>(22 oct 2019)</li>
								   <li >order confirmed<br>(22 oct 2019)</li>
								  <li class="active" >payment to shipping</li>
								   <li>your product is ready</li>
                                    <li>Arriving (26 oct 2019)<br>To (27 oct 2019)</li>
									@endif
                                   
                                    </ul>
                                </div>
								<hr>
								@foreach($order->products as $res)
							 <div class="product-card">
                                    <img src="{{url('frontend/images',$res->featured_image)}}" alt="cart image">
                                    <h5>{{$res->description}}</h5>
                                    <p>QTY {{$res->quantity}}</p>
								 <p>Price {{$res->price}}  
									 LE</p>
                                </div>
								@endforeach
                            </div>
                        </div>
						 @endforeach
					</div>
                
                    <!-------------------Start of Details section---------------------->
                   
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
	

$(document).on('click','#profile',function(){
$.get('/profile',function(response){
    $('#homeList').show();
	
	$('.orderList').hide;
	
	});
});
});
	