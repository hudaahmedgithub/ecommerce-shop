<div  id="getData">
	@foreach($data as $product)
	<p><a href="{{route('product-details',$product->id)}}">{{$product->name}}</a></p>
	@endforeach
        </div>