@extends('frontend.layouts.main')
@section('content')
@if(Session::has('flash_message_error'))
            <div class="alert alert-error alert-block">
	            <button type="button" class="close" data-dismiss="alert">×</button>	
                   <strong>{!! session('flash_message_error')!!}</strong>
            </div>
            
            @endif
          @if(Session::has('flash_message_success'))
            <div class="alert alert-success alert-block">
	            <button type="button" class="close" data-dismiss="alert">×</button>	
                   <strong>{!! session('flash_message_success')!!}</strong>
            </div>
            
            @endif

<div class="contact-us message_us mt-5 " id="contact_with_us" dir="rtl">
    <header class="p-4">
        <h3>تواصل معنا</h3>
        <div style="max-width: 100px">
            <hr style="border: 1px solid #fc0">
        </div>
    </header>
    <div class="container wow bounceInUp">
        <div class="row">
            <div class="col-sm-6">
                <p>
                    <i class="fa fa-send fa-2x mr-2"></i> بني مزار - شارع المحطة - بجوار برج الفيروز
                </p>
                <p>
                    <i class="fa fa-envelope fa-2x mr-2"></i> email@gmail.com
                </p>
                <p>
                    <i class="fa fa-phone fa-2x mr-2"></i> 01021567789
                </p>
            </div>

	    		<div class="col-sm-6">
	    			<div class="contact-form">
				    	<form action="{{url('/pages/contact/')}}"id="main-contact-form" class="contact-form row" name="contact-form" method="post">{{ csrf_field() }}
				            <div class="form-group col-md-6">
				                <input type="text" name="name" class="form-control" required="required" placeholder="الاسم">
				            </div>
				            <div class="form-group col-md-6">
				                <input type="email" name="email" class="form-control" required="required" placeholder="الايميل">
				            </div>
                            
                            <div class="form-group col-md-12">
				                <input type="tel" name="phone" class="form-control" required="required" placeholder="التليفون">
				            </div>
                            
				            
				            <div class="form-group col-md-12">
				                <textarea name="message" id="message" required="required" class="form-control" rows="8" placeholder="اكتب رسالتك"></textarea>
				            </div>                        
				            <div class="form-group col-md-12">
				                <input style="background-color: #D48806" type="submit" name="submit" class="btn btn-primary pull-right" value="ارسل">
				            </div>
				        </form>
	    			</div>
	    		</div>
	    	
    			</div>    			
	    	</div>  


@endsection