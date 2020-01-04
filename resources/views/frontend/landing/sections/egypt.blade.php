<!-- New-items -->
<div class="daily-deals new-items">
    <div class="box-title">
        <h3>
            <span>egypt products</span>
        </h3>

    </div>
    <div class="row">

            @forelse ($egyptProducts as $item)
                <!-- Box -->
                <div class="col-xs-6 col-sm-6 col-md-4">
                    <div class="media">
                        <div class="item-bottom">
                            <a href="#" class="addtoCart">
                                <i class="fa fa-eye fa-fw"></i>
                                <span>{{ $item->viewed }}</span>
                            </a>
                            <form action="{{ route('cart.update', ['id' => $item->id]) }}" method="POST" class="updateCart">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="_id" value='{{ $item->id }}'>
                                <input type="hidden" name="_name" value='{{ $item->name }}'>
                                <input type="hidden" name="_price" value='{{ $item->price . " ". $item->currency_name }}'>
                                <input type="hidden" name="_imgSrc" value='{{ Storage::url($item->featured_image) }}'>
                                <input type="hidden" name="quantity" value='1'>
                                <a href="javascript:void(0)" class="addtoCart addtoCartButton">
                                    <i class="fa fa-cart-plus fa-fw"></i>
                                    <span>add to cart</span>
                                </a>
                            </form>
                        </div>
                        <a class="media-left" href="{{ route('products.show', ['id' => $item->id]) }}">
                            <img src="{{ Storage::url($item->featured_image) }}" alt="{{ $item->name }}">
                        </a>
                        <div class="media-body">
                            <p class="price">{{ $item->price . ' ' . $item->currency_name }} </p>
                            <h4 class="media-heading">
                                <a href="{{ route('products.show', ['id' => $item->id]) }}"> {{ Str::limit($item->name, 30) }} </a>
                            </h4>
                        </div>
                    </div>
                </div>
            @empty
                <div class="text-center">
                    <img src="{{ asset('imgs/no-items.jpg') }}" alt="no items">
                    <h2><b>No Items Yet !</b></h2>
                </div>
            @endforelse

    </div>
</div> <!-- New-items -->
