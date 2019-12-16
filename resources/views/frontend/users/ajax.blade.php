@extends('frontend.layouts.main')
@section('content')
<link rel="stylesheet" href="{{ url('assets/plugin/mCustomScrollbar/jquery.mCustomScrollbar.min.css') }}">

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
	<label>Name</label>
		<input type="text" name="name" id="name"class="form-control">
		<label>Email</label>
		<input type="email" name="email"
	    id="email" class="form-control">
		<label>Password</label>
		<input type="password" name="password"
	    id="password" class="form-control">
		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="btnAdd">Add item</button>
		 <button type="button" class="btn btn-primary" id="update" style="display:none;">Update</button>
		
		
      </div>
    </div>
  </div>
</div>


<button  class="btn btn-xs btn-success p-0" style="margin-top:20px" data-toggle="modal" data-target="#myModal"><i class="mdi mdi-eye"></i>show model</button>
<div class="row col-md-8">
	<form>
		<label>Name</label>
		<input type="text" name="name" id="name"class="form-control">
		<label>Email</label>
		<input type="email" name="email"
	    id="email" class="form-control">
		<label>Password</label>
		<input type="password" name="password"
	    id="password" class="form-control">
		<button type="submit" class="btn btn-success">edit</button>
	</form>
</div>

<center>
<table class="table table-hover col-md-8 bg-white">
	<thead>
	   <tr>
		   <td>ID</td>
		   <td>Name</td>
		   <td>Email</td>
		</tr>
	
	</thead>
	<tbody id="data">
		 
	</tbody>

</table>
</center>
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
      name=$('#name').val();
	  email=$('#email').val();
   $.post('/postEdit',{id:id,name:name,email:email},function(){
	   $('#update').show();
	    $('#name').val('');
		$('#email').val('');
		$('#password').val('');
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






