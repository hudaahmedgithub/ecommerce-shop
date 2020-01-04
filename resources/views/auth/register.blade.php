@extends('frontend.layouts.main')

@section('content')
    
<div class="user_login">

        <!-- Register The User -->
        <div class="container _Register">
            <h1 class="text-center">Register New Account</h1>
    
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active">
                    <a href="#generalInfo" role="tab" data-toggle="tab">
                        <i class="fa fa-address-book"></i>
                    </a>
                </li>
                <li role="presentation">
                    <a href="#OptionalInfo" role="tab" data-toggle="tab">
                        <i class="fa fa-pencil"></i>
                    </a>
                </li>
                <li role="presentation">
                    <a href="#completeTask" role="tab" data-toggle="tab">
                        <i class="fa fa-check"></i>
                    </a>
                </li>
            </ul>
    
            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="generalInfo">
    
                    <div class="row">
                        <form action="{{ route('register') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="col-lg-8 col-md-8 col-sm-12">
    
                                <div class="form-group">
                                    <div class="input-group">
                                        <label class="input-group-addon" for="usr_name">
                                            <i class="fa fa-user"></i>
                                        </label>
                                        <input name="name" class="form-control" id="usr_name" required type="text" placeholder="Your Name">
                                    </div>
                                </div>

                                @error('name')
                                    <div class="invalid-feedback alert alert-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
    
                                <div class="form-group">
                                    <div class="input-group">
                                        <label class="input-group-addon" for="usr_email">
                                            <i class="fa fa-envelope"></i>
                                        </label>
                                        <input name="email" class="form-control" id="usr_email" required type="email" placeholder="Your Email">
                                    </div>
                                </div>

                                @error('email')
                                    <div class="invalid-feedback alert alert-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                                
                                <div class="form-group">
                                        <div class="input-group">
                                            <label class="input-group-addon" for="usr_phone">
                                                <i class="fa fa-phone"></i>
                                        </label>
                                        <input name="phone" class="form-control" id="usr_phone" required type="text" placeholder="Your phone">
                                    </div>
                                </div>

                                @error('phone')
                                    <div class="invalid-feedback alert alert-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
    
                                <div class="form-group">
                                    <div class="input-group">
                                        <label class="input-group-addon" for="usr_pass">
                                            <i class="fa fa-lock"></i>
                                        </label>
                                        <input name="password" class="form-control" id="usr_pass" required type="password" placeholder="Your Password">
                                    </div>
                                </div>

                                @error('password')
                                    <div class="invalid-feedback alert alert-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
    
                                <div class="form-group">
                                    <div class="input-group">
                                        <label class="input-group-addon" for="usr_confirm_pass">
                                            <i class="fa fa-key"></i>
                                        </label>
                                        <input name="password_confirmation" class="form-control" id="usr_confirm_pass" required type="password" placeholder="Confirm The Password">
                                    </div>
                                </div>

                                @error('password_confirmation')
                                    <div class="invalid-feedback alert alert-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
    
                            </div>
    
                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <div class="img_wrapper">
                                    <input name="image" type="file" required id="img_Profile_chooser" accept='image/*' onchange='openFile(event)'>
                                    <img src="/imgs/usr.png" alt="user image" class="Img_input_Wrapper_Upload" id='Img_input_Wrapper'>
                                </div>
                            </div>

                            @error('image')
                                <div class="invalid-feedback alert alert-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
    
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <button class="btn btn-success">
                                    <i class="fa fa-plus"></i> Create New Account</button>
                            </div>
    
                        </form>
    
                    </div>
    
                    <div class="bottomBar">
                        <a class="btn btn-primary btnNext">Next</a>
                    </div>
    
                </div>
                <div role="tabpanel" class="tab-pane" id="OptionalInfo">
                    <div class="bottomBar">
                        <a class="btn btn-primary btnPrevious">Previous</a>
                        <a class="btn btn-primary btnNext">Next</a>
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane" id="completeTask">
    
                    <div class="bottomBar">
                        <a class="btn btn-primary btnPrevious">Previous</a>
                    </div>
                </div>
            </div>
    
        </div>
        <!-- Register The User -->
    
    </div>

    @endsection