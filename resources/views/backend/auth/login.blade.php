@extends('backend.layouts.app')

@section('page-title')
تسجيل الدخول للوحة التحكم
@endsection

@section('content-app')
<div id="single-wrapper">
    <form action="{{ route('admin.login') }}" class="frm-single" method="POST">
        @csrf

        <div class="inside">
            <div class="title"><strong>{{ __('login.control_panel') }}</strong></div>
            <!-- /.title -->
            <div class="frm-title">{{ __('login.login') }}</div>
            <!-- /.frm-title -->
            <div class="frm-input has-error">
                <input type="email" name="email" placeholder="{{ __('login.email') }}" class="frm-inp form-control" value="{{ old('email') }}"><i class="fa fa-user frm-ico"></i>

                @error('email')
                <span class="text-danger" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <!-- /.frm-input -->
            <div class="frm-input">
                <input type="password" name="password" placeholder="{{ __('login.password') }}" class="frm-inp form-control"><i class="fa fa-lock frm-ico"></i>

                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <!-- /.frm-input -->
            <div class="clearfix margin-bottom-20">
                <div class="pull-left">
                    <div class="checkbox primary">
                        <input type="checkbox" name="remember" id="rememberme" {{ old('remember') ? 'checked' : '' }}>
                        <label for="rememberme">{{ __('login.remember') }}</label>
                    </div>
                    <!-- /.checkbox -->
                </div>
                <!-- /.pull-left -->
                <div class="pull-right"><a href="" class="a-link"><i class="fa fa-unlock-alt"></i>{{ __('login.forget_password') }}</a></div>
                <!-- /.pull-right -->
            </div>
            <!-- /.clearfix -->
            <button type="submit" class="frm-submit">{{ __('login.login') }}<i class="fa fa-arrow-circle-right"></i></button>

            <div class="frm-footer"><a href="http://4soft-eg.com">4soft-eg.com</a> © {{ date('Y') }}.</div>
            <!-- /.footer -->
        </div>
        <!-- .inside -->
    </form>
    <!-- /.frm-single -->
</div>
<!--/#single-wrapper -->
@endsection