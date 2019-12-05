@extends('backend.layouts.base')

@section('nav-title')
{{ __('public.add_properties_title') }}
@endsection

@section('page-title')
{{ __('public.add_properties_title') }}
@endsection

@section('content')
<div id="wrapper">
    <div class="main-content">
        <div class="row small-spacing">
            <!-- /.col-lg-12 col-xs-12 -->
            <div class="col-lg-12 col-xs-12">
                <div class="box-content">

                    <div class="clearfix">
                        <h4 class="box-title pull-right">{{ __('public.add_properties_title') }}</h4>
                        <!-- /.bo-title -->
                    </div>

                    <form action="{{ route('admin.properties.store') }}" method="POST" id="formProperty" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label for="name">{{ __('properties.name') }}</label>
                                    <input type="text" class="form-control" name="name">
                                </div>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="status">{{ __('properties.status') }}</label>
                                <select name="status" class="form-control">
                                    <option value="for_rent">{{ __('properties.for_rent') }}</option>
                                    <option value="for_sale">{{ __('properties.for_sale') }}</option>
                                </select>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="type">{{ __('properties.type') }}</label>
                                <select name="type_id" class="form-control">
                                    @foreach($types as $type)
                                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                        
                        <div class="row">

                            <div class="form-group col-md-3">
                                <label for="place">{{ __('properties.place') }}</label>
                                <select name="place_id" class="form-control">
                                    @foreach($places as $place)
                                    <option value="{{ $place->id }}">{{ $place->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-9">

                                <div class="form-group">
                                    <label for="address">{{ __('properties.address') }}</label>
                                    <input type="text" class="form-control" name="address">
                                </div>

                            </div>

                        </div>

                        <div class="row">

                            <div class="form-group col-md-4">
                                <label for="currency">{{ __('properties.currency') }}</label>
                                <select name="currency_id" class="form-control">
                                    @foreach($currencies as $currency)
                                    <option value="{{ $currency->id }}">{{ $currency->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-4">

                                <div class="form-group">
                                    <label for="price">{{ __('properties.price') }}</label>
                                    <input type="number" class="form-control" name="price" value="0">
                                </div>

                            </div>

                            <div class="form-group col-md-4">
                                <label for="payment_way">{{ __('properties.payment_way') }}</label>
                                <select name="payment_way" class="form-control">
                                    <option value="cach">{{ __('properties.cach') }}</option>
                                    <option value="installment">{{ __('properties.installment') }}</option>
                                </select>
                            </div>

                        </div>

                        <div class="row">

                            <div class="form-group col-md-4">
                                <label for="measure">{{ __('properties.measure') }}</label>
                                <select name="measure_id" class="form-control">
                                    @foreach($measures as $measure)
                                    <option value="{{ $measure->id }}">{{ $measure->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-4">

                                <div class="form-group">
                                    <label for="area">{{ __('properties.area') }}</label>
                                    <input type="number" class="form-control" name="area" value="0">
                                </div>

                            </div>

                            <div class="form-group col-md-4">
                                <label for="phone">{{ __('properties.phone') }}</label>
                                <input type="text" name="phone" class="form-control">
                            </div>

                        </div>

                        <div class="row">

                            <div class="form-group col-md-6">
                                <label for="discription">{{ __('properties.discription') }}</label>
                                <textarea rows="4" class="form-control" name="discription"></textarea>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="services">{{ __('properties.services') }}</label>
                                <textarea rows="4" class="form-control" name="services"></textarea>
                            </div>

                        </div>

                        <div class="row">

                            <div class="form-group col-md-6">
                                <label for="attaches">{{ __('properties.attaches') }}</label>
                                <textarea rows="4" class="form-control" name="attaches"></textarea>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="notes">{{ __('properties.notes') }}</label>
                                <textarea rows="4" class="form-control" name="notes"></textarea>
                            </div>

                        </div>

                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="image">{{ __('properties.image') }}</label>
                                <input type="file" name="image[]" class="form-control" multiple max="15">
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

@push('script')
<script>
    
    $('#formProperty').on('submit', function(e) {
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