@extends('backend.layouts.base')

@section('content')
<div id="wrapper">
    <div class="main-content">
        <div class="row small-spacing">
            <!-- /.col-lg-12 col-xs-12 -->
            <div class="col-lg-12 col-xs-12">
                <div class="box-content">

                    <div class="clearfix">
                        <h4 class="box-title pull-right">{{ __('public.edit_roles_title') }}</h4>
                        <!-- /.bo-title -->
                    </div>

                    <form action="{{ route('admin.roles.update', [$role->id]) }}" method="POST" id="formRole">
                        {{csrf_field()}}
                        @method("PUT")

                     

                        <div class="row">
                          
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="name">{{ __('public.role.name') }}</label>
                                    <input type="text" class="form-control" value="{{ $role->name }}" name="name">
                                </div>
                            </div>
                                <div class="col-md-5">
                                <div class="form-group">
                                    <label for="email">{{ __('public.role.email') }}</label>
                                    <input type="text" class="form-control" value="{{ $role->email }}" name="email">
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

    $('#formRole').on('submit', function(e) {
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
