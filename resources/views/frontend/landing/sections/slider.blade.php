<!-- Start Popular Items Carousel -->
<div id="carousel-popular" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        @php $i = 0; @endphp
        @foreach ($slider as $item)
            <li data-target="#carousel-popular" data-slide-to="{{ $i }}" class="{{ $i == 0 ? 'active' : '' }}"></li>

            @php $i++ @endphp
        @endforeach
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">

        @php $i = 0; @endphp
        @foreach ($slider as $item)
            <div class="item {{ $i == 0 ? 'active' : '' }}">
                <img src="{{ Storage::url($item->image) }}" alt="{{ $item->name }}">
                <div class="carousel-caption">
                    <h3>{{ $item->name }}</h3>
                    <p>
                        {{ Str::limit($item->description, 300) }}
                    </p>
                    <a href="{{ $item->url }}" class="btn btn-danger">Lets Go !</a>
                </div>
            </div>

            @php $i++ @endphp
        @endforeach

    </div> <!-- End Popular Items Carousel -->

</div>


