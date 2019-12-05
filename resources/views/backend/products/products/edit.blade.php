@extends('backend.layouts.base')

@section('nav-title')
{{ __('public.products_title') }}
@endsection

@section('page-title')
{{ __('public.products_title') }}
@endsection

@section('content')
<div id="wrapper">
    <div class="main-content">
        <div class="row small-spacing">
            <!-- /.col-lg-12 col-xs-12 -->
            <div class="col-lg-12 col-xs-12">
                <div class="box-content">

                    <div class="clearfix">
                        <h4 class="box-title pull-right">{{ __('public.edit_products_title') }}</h4>
                        <!-- /.bo-title -->
                    </div>

                    <form action="{{ route('admin.products.update', [$product->id]) }}" method="POST" id="formProduct" enctype="multipart/form-data">
                        @csrf
                        @method("PUT")

                        <input type="hidden" name="_images_table" value="image">

                        <div class="row">
                            @foreach (config('translatable.locales') as $locale)
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="name">{{ __('public.product.name') . '(' . $locale . ')' }}</label>
                                    <input type="text" class="form-control" value="{{ $product->translate($locale)->name }}" name="{{ $locale }}[name]">
                                </div>
                            </div>
                            @endforeach

                            <div class="form-group col-md-2">
                                <label for="quantity">{{ __('public.product.quantity') }}</label>
                                <input type="number" class="form-control" value="{{ $product->quantity }}" name="quantity" value="0">
                            </div>
                        </div>

                        <div class="row"> 
                            <div class="form-group col-md-3">
                                <label for="country_id">{{ __('public.product.country') }}</label>
                                <select name="country_id" class="form-control">
                                    @foreach ($countries as $country)
                                        <option value="{{ $country->id }}" @if($product->country->translate(app()->getLocale())->name == $country->name) selected @endif>{{ $country->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="category_id">{{ __('public.product.category') }}</label>
                                <select name="category_id" class="form-control">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" @if($product->category->translate(app()->getLocale())->name == $category->name) selected @endif>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="currency">{{ __('public.product.currency') }}</label>
                                <select name="currency_id" class="form-control" id="currency">
                                    @foreach ($currencies as $currency)
                                    <option value="{{ $currency->id }}" @if($product->currency->translate(app()->getLocale())->name == $currency->name) selected @endif>{{ $currency->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="price">{{ __('public.product.price') }}</label>
                                <input type="number" class="form-control" value="{{ $product->price }}" name="price" value="0">
                            </div>
                        </div>

                        <div class="row">

                            @foreach (config('translatable.locales') as $locale)
                            <div class="form-group col-md-6">
                                <label for="description">{{ __('public.product.description') . '(' . $locale . ')' }}</label>
                                <textarea rows="4" class="form-control" name="{{ $locale }}[description]">{{ $product->translate($locale)->description }}</textarea>
                            </div>
                            @endforeach

                        </div>

                        <div class="row">

                            @foreach (config('translatable.locales') as $locale)
                            <div class="form-group col-md-6">
                                <label for="shipping_info">{{ __('public.product.shipping_info') . '(' . $locale . ')' }}</label>
                                <textarea rows="4" class="form-control" name="{{ $locale }}[shipping_info]">{{ $product->translate($locale)->shipping_info }}</textarea>
                            </div>
                            @endforeach

                        </div>

                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="featured_image">{{ __('public.product.featured_image') }}</label>
                                <input id="featured_image" type="file" name="featured_image" class="form-control">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="image">{{ __('public.product.images') }}</label>
                                <input type="file" id="image" name="image[]" accept="image/*" multiple max="15">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-12">
                                <div id="progressBar" class="progress-bar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%">0%</div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <input type="submit" class="btn btn-primary" value="{{ __('public.save') }}">
                            </div>
                        </div>

                    </form>

                </div>
                <!-- /.box-content -->
            </div>
            <!-- /.col-lg-12 col-xs-12 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.main-content -->
</div>
<!--/#wrapper -->
@endsection

@push('style')
<link rel="stylesheet" href="{{ url('css/imageuploadify.min.css') }}">
@endpush

@push('script')
<script type="text/javascript" src="{{ url('js/imageuploadify.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('input[name="image[]"]').imageuploadify();
    });

    $('#formProduct').on('submit', function(e) {
        e.preventDefault();

        let form = $(this);
        let url  = form.attr('action');
        let data = new FormData(form[0]);

        $.ajax({
            url: url,
            type: 'POST',
            data: data,
            processData: false,
            contentType: false,
            xhr: function() {
                var xhr = new window.XMLHttpRequest();
                xhr.upload.addEventListener("progress", function(evt) {
                    if (evt.lengthComputable) {
                        var percentComplete = evt.loaded / evt.total;
                        percentComplete = parseInt(percentComplete * 100);
                        $('#progressBar').text(percentComplete + '%');
                        $('#progressBar').css('width', percentComplete + '%');
                    }
                }, false);

                return xhr;
            },
            success: function(response) {
                $('#custom-message').show();
                $('#custom-message ul').empty();
                $('#custom-message').addClass('custom-message-success');
                $('#custom-message ul').append(`<li>${response.message}</li>`);
                form[0].reset();
                //window.location.reload();
            },
            error: function(response) {
                $('#custom-message').show();
                $('#custom-message ul').empty();
                $('#custom-message').addClass('custom-message-error');

                $.each(response.responseJSON.errors, function(key, value) {
                    if (Array.isArray(value)) {
                        $.each(value, function(k, v) {
                            $('#custom-message ul').append(`<li>${v}</li>`);
                        });
                    } else {
                        $('#custom-message ul').append(`<li>${value}</li>`);
                    }
                });

                $('#progressBar').text('0%');
                $('#progressBar').css('width', '0%');
            }
        });
    });
</script>
@endpush
