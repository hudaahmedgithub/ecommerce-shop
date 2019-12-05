@extends('backend.layouts.app')

@section('content-app')

    @include('backend.layouts.sidebar')

    @include('backend.layouts.navbar')

    @yield('content')
@endsection

@push('style')
<!-- Material Design Icon -->
<link rel="stylesheet" href="{{ url('assets/fonts/material-design/css/materialdesignicons.css') }}">
<!-- mCustomScrollbar -->
<link rel="stylesheet" href="{{ url('assets/plugin/mCustomScrollbar/jquery.mCustomScrollbar.min.css') }}">
@endpush

@push('script')
<script src="{{ url('assets/plugin/nprogress/nprogress.js') }}"></script>
<script src="{{ url('assets/plugin/waves/waves.min.js') }}"></script>
<script src="{{ url('assets/plugin/mCustomScrollbar/jquery.mCustomScrollbar.concat.min.js') }}"></script>

@endpush