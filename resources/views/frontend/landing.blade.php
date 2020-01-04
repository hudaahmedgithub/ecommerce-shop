@extends('frontend.layouts.base')

@section('content')

<!-- Start Upper content wrap -->
<div class="container">
    <div class="row">

        {{-- Sidebar Section --}}
        {{-- @include('frontend.landing.sections.sidebar') --}}

        <!-- Main Content -->
        <div class="col-sm-9">

            {{-- Slider --}}
            {{-- @include('frontend.landing.sections.slider') -}}

            {{-- Daily Deals --}}
            {{-- @include('frontend.landing.sections.daily_deals') --}}

            {{-- Egypt Items --}}
            {{-- @include('frontend.landing.sections.russia') --}}

            {{-- Russia Items --}}
            {{-- @include('frontend.landing.sections.egypt') --}}

        </div> <!-- Main Content -->

    </div> <!-- Upper content row -->
</div> <!-- End Upper content wrap -->

@endsection
