@extends('backend.layouts.base')

@section('nav-title')
{{ __('public.sliders_title') }}
@endsection

@section('page-title')
{{ __('public.sliders_title') }}
@endsection

@section('content')
<div id="wrapper">
    <div class="main-content">
        <div class="row small-spacing">
            <!-- /.col-lg-6 col-xs-12 -->
            <div class="col-lg-12 col-xs-12">
                <div class="box-content">

                    <div class="clearfix">
                        <h4 class="box-title pull-right">{{ __('public.sliders_title') }}</h4>
                        <!-- /.bo-title -->
                        <button class="btn btn-primary waves-effect waves-light pull-left" id="btnAdd">
                            {{ __('public.add_sliders_title') }}
                        </button>
                    </div>

                    <div class="table-responsive table-purchases">
                        <table class="table table-striped margin-bottom-10" id="table">
                            <thead>
                                <tr>
                                    <th style="width: 5%">#</th>
                                    <th>{{ __('public.slider.name') }}</th>
                                    <th>{{ __('public.slider.description') }}</th>
                                    <th>{{ __('public.slider.url') }}</th>
                                    <th>{{ __('public.slider.active') }}</th>
                                    <th>{{ __('public.slider.controls') }}</th>
                                </tr>
                            </thead>
                            <tbody id="tbody">

                                @if($sliders->count() > 0)
                                @php $i = 1; @endphp

                                @foreach($sliders as $slider)

                                <tr id="tr-{{ $slider->id }}">
                                    <td>{{ $i }}</td>
                                    <td>{{ $slider->name }}</td>
                                    <td>{{ $slider->description }}</td>
                                    <td>{{ $slider->url }}</td>
                                    <td>{{ __('public.' . $slider->active) }}</td>
                                    <td>
                                        <button id="btnEdit" data-id="{{ $slider->id }}" class="btn btn-xs btn-success p-0"><i class="mdi mdi-pencil"></i></button>
                                        <button id="btnDelete" data-id="{{ $slider->id }}" class="btn btn-xs btn-danger p-0"><i class="mdi mdi-delete"></i></button>
                                    </td>
                                </tr>

                                @php $i++; @endphp

                                @endforeach
                                @else
                                <tr>
                                    <td colspan="7" class="alert alert-danger p-3">{{ __('public.no_sliders_registered') }}</td>
                                </tr>
                                @endif

                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="7">{{ $sliders->links() }}</td>
                                </tr>
                            </tfoot>
                        </table>
                        <!-- /.table -->
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.box-content -->
            </div>
            <!-- /.col-lg-6 col-xs-12 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.main-content -->
</div>
<!--/#wrapper -->

<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel-1">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel-1">{{ __('public.add_sliders_title') }}</h4>
			</div>
			<div class="modal-body">
                <form name="formPlace" action="{{ route('admin.sliders.store') }}" enctype="multipart/form-data" method="POST" id="formPlace">
                    @csrf
                    <div id="update"></div>

                    @foreach (config('translatable.locales') as $locale)
                    <div class="form-group">
                        <label for="{{ $locale }}[name]">{{ __('public.slider.name') . "($locale)" }}</label>
                        <input required type="text" id="{{ $locale }}[name]" name="{{ $locale }}[name]" class="form-control">
                    </div>
                    @endforeach

                    @foreach (config('translatable.locales') as $locale)
                    <div class="form-group">
                        <label for="{{ $locale }}[description]">{{ __('public.slider.description') . "($locale)" }}</label>
                        <textarea required type="text" id="{{ $locale }}[description]" name="{{ $locale }}[description]" class="form-control"></textarea>
                    </div>
                    @endforeach

                    <div class="form-group">
                        <label for="image">{{ __('public.slider.image') }}</label>
                        <input type="file" accept="image/*" id="image" name="image" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="url">{{ __('public.slider.url') }}</label>
                        <input required type="url" id="url" name="url" class="form-control">
                    </div>
             
                    <div class="form-group">
                        <label>{{ __('public.slider.active') }}</label>
                        <select name="active" id="active" class="form-control">
                            <option value="yes">{{ __('public.yes') }}</option>
                            <option value="no">{{ __('public.no') }}</option>
                        </select>
                    </div>
			</div>
			<div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-sm waves-effect waves-light">{{ __('public.save') }}</button>
                </form>
                <button type="button" class="btn btn-default btn-sm waves-effect waves-light" data-dismiss="modal">{{ __('public.close') }}</button>
			</div>
		</div>
	</div>
</div>



@endsection

@push('script')
<script>
    $('#btnAdd').on('click', function() {

        if ($('#update').next().attr('name') == '_method') {
            $('#update').next().remove();
        }

        $('#formPlace').attr('action', "{{ url('/') }}/admin/sliders");
        $('#addModal').modal('show');
    });

    $('#formPlace').on('submit', function(e) {
        e.preventDefault();

        let form        = $(this);
        let url         = form.attr('action');
        let method      = $('#update input').val();
        var form_data = new FormData(form[0]);
        var rows        = $('#table tbody tr').length;

        $.ajax({
            url: url,
            type: 'POST',
            data: form_data,
            dataType: 'json',
            processData: false,
            contentType: false,
            success: function(response) {
                if (response.message == 'Record Created Successfully') {
                    $('#tbody').append(`<tr id="tr-${response.data.id}">
                                    <td>${++rows}</td>
                                    <td>${response.data.name}</td>
                                    <td>${response.data.description}</td>
                                    <td>${response.data.url}</td>
                                    <td>${response.data.active}</td>
                                    <td>
                                        <button id="btnEdit" data-id="${response.data.id}" class="btn btn-xs btn-success p-0"><i class="mdi mdi-pencil"></i></button>
                                        <button id="btnDelete" data-id="${response.data.id}" class="btn btn-xs btn-danger p-0"><i class="mdi mdi-delete"></i></button>
                                    </td>
                                </tr>`);
                } else {
                    var num = $(`#tr-${response.data.id}`).children('td').html();

                    $(`#tr-${response.data.id}`).replaceWith(`<tr id="tr-${response.data.id}">
                                    <td>${num}</td>
                                    <td>${response.data.name}</td>
                                    <td>${response.data.description}</td>
                                    <td>${response.data.url}</td>
                                    <td>${response.data.active}</td>
                                    <td>
                                        <button id="btnEdit" data-id="${response.data.id}" class="btn btn-xs btn-success p-0"><i class="mdi mdi-pencil"></i></button>
                                        <button id="btnDelete" data-id="${response.data.id}" class="btn btn-xs btn-danger p-0"><i class="mdi mdi-delete"></i></button>
                                    </td>
                                </tr>`);
                }

                $('#addModal').modal('hide');

                form.trigger("reset")
            },
            error: function(response) {
                //
            }
        });

    });

    $(document).on('click', '#btnEdit', function() {
        let form    = $('#formPlace');
        let id      = $(this).data('id');
        let action  = "{{ url('/') }}/admin/sliders/"+id;

        $.ajax({
            url: action + '/edit',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                if (response.message === 'Record Founded Successfully') {

                    let data = response.data;

                    form.attr('action', action);

                    $.each(data.translations, function(index, el) {
                        form.find(`input[name='${el.locale}[name]']`).val(el.name);
                        form.find(`textarea[name='${el.locale}[description]']`).val(el.description);
                    });

                    form.find("input[name=url]").val(data.url);
                    form.find("select[name=active]").val(data.active);
  
                    if (form.find('#update').next().attr('name') != '_method') {
                        form.find('#update').after('{{ method_field('PUT') }}');
                    }

                    $('#addModal').modal('show');
                }
            }
        })
    });

    $(document).on('click', '#btnDelete', function() {
        let form    = $('#formProperty');
        let id      = $(this).data('id');
        let action  = "{{ url('/') }}/admin/sliders/"+id;

        $.ajax({
            url: action,
            type: 'POST',
            data: {
                '_method': 'DELETE'
            },
            success: function(response) {
                if (response.message === 'Record Deleted Successfully') {

                    $('#tr-'+id).remove();

                    $('#custom-message').show();
                    $('#custom-message ul').empty();
                    $('#custom-message').addClass('custom-message-success');
                    $('#custom-message ul').append(`<li>${response.message}</li>`);
                }
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
            }
        })
    });
</script>
@endpush
