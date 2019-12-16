@extends('Frontend.layouts.main')
@section('content')
  <link rel="stylesheet" href="{{asset('fronted/css/checkout.css')}}">

        <div class="check-out">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 check-details">
                        <h4>checkout</h4>
                        <div class="address-details">
                            <h5><i class="fa fa-check-circle" aria-hidden="true"></i>1.address details</h5>
                            <div class="address-form">
                                <form action="#">
                                    <div class="form-group name">
                                        <label for="first">first name *</label>
                                        <input type="text" class="form-control" name="first-name" id="first">
                                    </div>
                                    <div class="form-group name" style="margin-left: 2%;">
                                        <label for="last">last name *</label>
                                        <input type="text" name="last-name" id="last" class="form-control">
                                    </div>
                                    <div class="form-group phone">
                                        <label for="phone">mobile phone number *</label>
                                        <span class="st-num">+20</span>
                                        <input type="tel" name="phone" id="phone" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="address">St.name/Building number/Apartment number *</label>
                                        <textarea class="form-control" rows="5" id="address"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="state">State/Region *</label>
                                        <select class="form-control" id="state">
                                            <option>Cairo</option>
                                            <option>Giza</option>
                                            <option>Minia</option>
                                            <option>Alexandria</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="city">city *</label>
                                        <select class="form-control" id="city">
                                            <option>Maghagha</option>
                                            <option>Banimazar</option>
                                            <option>Matay</option>
                                            <option>Minia</option>
                                        </select>
                                    </div>
									@include('frontend.cart.paypal')
                                    
                                </form>
                            </div>
                        </div>
                        <div class="delivery-method">   
                            <h5><i class="fa fa-check-circle" aria-hidden="true"></i>2.delivery method</h5>
                            <div class="methods">
                                <h6>How do you want your order delivered?</h6>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="optradio">Door Delivery.
                                        <p>Delivered by Thursday 24 Oct for <span style="color: rgb(20, 129, 218);">EGP 12</span></p>
                                        <p>Get delivered at your door step !</p>
                                    </label>
                                </div><hr>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="optradio">Pickup Station
                                        <p>Available for pick up from Thursday 24 Oct</p>
                                        <p>Online payment only</p>
                                        <a href="#">SELECT PICKUP STATION</a>
                                    </label>
                                </div>
                                <div class="card w-100">
                                    <div class="card-header">SHIPMENT DETAILS</div>
                                    <div class="card-body text-dark">
                                        <h5 class="card-title">Shipment 1 of 1</h5>
                                        <p class="card-text">1xConcentrate Antibacterial Fabric Softener – 1L Delivered by Thursday 24 Oct</p>
                                    </div>
                                </div>
                                <p class="text-center" style="color: #ccc;">You will be able to add a voucher in the next step</p>
                                <button class="btn btn-block bg-primary">proceed to next step</button>
                            </div>         
                        </div>
                        <div class="payment-method">
                            <h5><i class="fa fa-check-circle" aria-hidden="true"></i>3.payment method</h5>
                            <div class="methods">
                                <h6>How do you want to pay for your order?</h6>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="optradio">
                                        <i class="fa fa-money" aria-hidden="true"></i>Cash On Delivery
                                        <p>If you select Cash On Delivery, you can pay for your package when our Delivery Associates bring it to your door step or when you pick it up at one of our Pickup Stations</p>
                                        <ol>
                                            <li>We only accept Egyptian Pound</li>
                                            <li>Because our Delivery Agents do not handle petty cash, we would appreciate that you have the exact amount for payment</li>
                                            <li>Payment must be made before unsealing an electronic item such as a phone or laptop. Once the seal is broken the item can only be returned or rejected if it is damaged, defective or has missing parts. If you change your mind, an unsealed item can no longer be returned.</li>
                                        </ol>
                                    </label>
                                </div><hr>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="optradio">
                                        <i class="fa fa-cc-mastercard" aria-hidden="true"></i>Pay with your Mobile Wallet “VCN”
                                    </label>
                                </div><hr>
                                <p>Do you have a voucher?</p>
                                <input type="text" name="voucher" id="voucher" placeholder="Enter coupon code here">
                                <button class="btn">add voucher</button><hr>
                                <button class="btn btn-block">confirm order</button>
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="your-order">
                            <h4>your order</h4><hr>
							@foreach($carts as $cart)
                            <div class="card">
                                <img src="{{url('frontend/images',$cart->image)}}" width="200px"height="200px">
                                <div class="info">
                                    <h6>{{$cart->name}}</h6>
                                    <p>EGP {{$cart->quantity}}</p>
                                    <p>QUA {{$cart->qty}}</p>
                                </div>
                            </div>
                            <hr>
                           @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection