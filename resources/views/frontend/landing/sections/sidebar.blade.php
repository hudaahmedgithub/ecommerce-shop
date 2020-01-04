<div class="col-sm-3">
    <div class="side-div" style="margin-top: 20%;">
        <div class="list-group">
            <h3>
                <i class="fa fa-diamond"></i> Categories
            </h3>
            @foreach ($categories as $category)
                <a href="{{ route('category.show', $category->id) }}" class="list-group-item clearfix">
                    <span class="pull-left">{{ $category->name }}</span>
                </a>
            @endforeach
        </div>
    </div>
    <aside class="side-navs">
        <!-- Filter By row -->
        <div class="row">
            <div class="col-xs-12">
                <div class="side-div">
                    <div class="list-group">
                        <h3>
                            <i class="fa fa-filter"></i> Country
                        </h3>
                        @forelse ($countries as $country)
                            <a href="{{ route('country.show', ['id' => $country->id]) }}" class="list-group-item clearfix">
                                <span class="pull-left">{{ $country->name }}</span>
                            </a>
                        @empty

                        @endforelse
                    </div>
                </div>
            </div>
        </div> <!-- Filter By row -->

        <!-- Filter By Price row -->
        <div class="row">
            <div class="col-xs-12">
                <div class="side-div">
                    <div class="filter-price">
                        <h3>
                            <i class="fa fa-money"></i> Price
                        </h3>

                        <form action="{{ route('price.show') }}" method="GET">
                            <div class="center">
                                <div class="average">
                                    <div>Filter By price</div>
                                    <hr>
                                </div>

                                <input type="number" name="money_min" step="any" required class="form-control" placeholder="from $0">
                                <br>
                                <input type="number" name="money_max" step="any" required class="form-control" placeholder="to $1000">

                                <button class="btn btn-danger btn-block">Filter</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div> <!-- Filter By Price row  -->
        </div>
    </aside>
</div>
