<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <title>E-Commerce</title>
		<meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
         <!-- Styles And Fonts  -->
         <link rel="stylesheet" href="{{asset('frontend/css/all.min.css')}}">
         <link rel="stylesheet" href="{{asset('frontend/css/master.css')}}">
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <link rel="stylesheet" href="{{asset('frontend/css/styles.css')}}">
        
    <link rel="stylesheet" href="{{ url('css/main.css') }}">
    <link rel="stylesheet" href="{{ url('css/app.css') }}">
    <link rel="stylesheet" href="{{ url('css/mohamed.css') }}">
    <link rel="stylesheet" href="{{ url('css/toastr.min.css') }}">
    <link rel="stylesheet" href="{{ url('css/login.css') }}">

        <link rel="stylesheet" href="{{asset('frontend/css/media.css')}}">
		<link rel="stylesheet" href="{{asset('frontend/css/pro-details.css')}}">
		<script src="http://code.jquery.com/jquery-latest.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
            <script src="{{asset('js/jquery.bxSlider.js')}}"></script>
           

    </head>