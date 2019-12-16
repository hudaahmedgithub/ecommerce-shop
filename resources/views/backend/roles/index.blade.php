@extends('backend.layouts.base')

@section('nav-title')
{{ __('public.roles_title') }}
@endsection

@section('page-title')
{{ __('public.roles_title') }}
@endsection

@section('content')
<div id="wrapper">
    <div class="main-content">
        <div class="row small-spacing">
            <!-- /.col-lg-6 col-xs-12 -->
            <div class="col-lg-12 col-xs-12">
                <div class="box-content">

                    <div class="clearfix">
                        <h4 class="box-title pull-right">{{ __('public.roles_title') }}</h4>
                        <!-- /.bo-title -->
                        <button class="btn btn-primary waves-effect waves-light pull-left" id="btnAdd">
                            {{ __('public.role.add') }}
                        </button>
                    </div>

                    <div class="table-responsive table-purchases">
                        <table class="table table-striped margin-bottom-10" id="table">
                            <thead>
                                <tr>
                                    <th style="width: 5%">#</th>
                                    <th>{{ __('public.role.name') }}</th>
                                    <th>{{ __('public.role.guard_name') }}</th>
                                    <th>{{ __('public.role.active') }}</th>
                                    <th>{{ __('public.role.controls') }}</th>
                                </tr>
                            </thead>
                            <tbody id="tbody">

                                @if($roles->count() > 0)
                                @php $i = 1; @endphp

                                @foreach($roles as $role)

                                <tr id="tr-{{ $role->id }}">
                                    <td>{{ $i }}</td>
                                    <td>{{ $role->name }}</td>
                                    <td>{{ $role->guard_name }}</td>
                                    <td>
                                        @if(app()->getLocale() == 'ar')
                                            {{ $role->active == 'no' ? 'لا' : 'نعم' }}
                                        @else
                                            {{ ucfirst($role->active) }}
                                        @endif
                                    </td>
                                    <td>
                                        <button id="btnInfo" data-id="{{ $role->id }}" class="btn btn-xs btn-info p-0"><i class="mdi mdi-eye"></i></button>
                                        <button id="btnEdit" data-id="{{ $role->id }}" class="btn btn-xs btn-success p-0"><i class="mdi mdi-pencil"></i></button>
                                        <button id="btnDelete" data-id="{{ $role->id }}" class="btn btn-xs btn-danger p-0"><i class="mdi mdi-delete"></i></button>
                                    </td>
                                </tr>

                                @php $i++; @endphp

                                @endforeach
                                @else
                                <tr>
                                    <td colspan="5" class="alert alert-danger p-3">{{ __('public.no_roles_registered') }}</td>
                                </tr>
                                @endif

                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="5">{{ $roles->links() }}</td>
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
				<h4 class="modal-title" id="myModalLabel-1">{{ __('public.role.add') }}</h4>
			</div>
			<div class="modal-body">
                <form action="{{ route('admin.roles.store') }}" method="POST" id="formRole">
                    @csrf
                    <div id="update"></div>

                    {{-- Name --}}
                    <div class="row">
                       
                        <div class="form-group col-md-6">
                            <label for="name">{{ __('public.role.name')  }}</label>
                            <input type="text" id="name" name="name" class="form-control">
                        </div>
                        
                    </div>

                    {{-- guard_name --}}
                    <div class="row">
                       
                        <div class="form-group col-md-6">
                            <label for="guard_name">{{ __('public.role.guard_name') }}</label>
                            <input id="guard_name" name="guard_name" class="form-control">
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

<div class="modal fade" id="showModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel-1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel-1">{{ __('public.place.add') }}</h4>
                </div>
                <div class="modal-body">
                    <table class="table">
                        <tr>
                            <th>{{ __('public.role.name') }}</th>
                            <td id="preview-name"></td>
                        </tr>
                        <tr>
                            <th>{{ __('public.role.guard_name') }}</th>
                            <td id="preview-guard"></td>
                        </tr>
                        <tr>
                            <th>{{ __('public.role.active') }}</th>
                            <td id="preview-active"></td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
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

        $('#formRole').attr('action', "{{ url('/') }}/admin/roles");
        $('#addModal').modal('show');
    });

    $(document).on('click', '#btnInfo', function() {
        let id      = $(this).data('id');
        let action  = "{{ url('/') }}/admin/roles/"+id;

        $.ajax({
            url: action,
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                let data = response.data;
                let modal = $('#showModal');

                modal.find('#preview-name').html(data.name);
                modal.find('#preview-guard').html(data.guard_name);
                modal.find('#preview-active').html(data.active);
                modal.find('#preview-message').html(data.message);

                modal.modal('show');
            }
        })
    });

    $('#formRole').on('submit', function(e) {
        e.preventDefault();

        let form        = $(this);
        let url         = form.attr('action');
        let method      = $('#update input').val();
        let data        = form.serialize();
        var rows        = $('#table tbody tr').length;

        $.ajax({
            url: url,
            type: 'POST',
            data: data,
            dataType: 'json',
            success: function(response) {
                if (response.message == 'Record Created Successfully') {
                    $('#tbody').append(`<tr id="tr-${response.data.id}">
                                    <td>${++rows}</td>
                                    <td>${response.data.name}</td>
                                    <td>${response.data.guard_name}</td>
                                    <td>${response.data.active}</td>

                                    <td>
                                        <button id="btnInfo" data-id="${response.data.id}" class="btn btn-xs btn-info p-0"><i class="mdi mdi-eye"></i></button>
                                        <button id="btnEdit" data-id="${response.data.id}" class="btn btn-xs btn-success p-0"><i class="mdi mdi-pencil"></i></button>
                                        <button id="btnDelete" data-id="${response.data.id}" class="btn btn-xs btn-danger p-0"><i class="mdi mdi-delete"></i></button>
                                    </td>
                                </tr>`);
                } else {
                    var num = $(`#tr-${response.data.id}`).children('td').html();

                    $(`#tr-${response.data.id}`).replaceWith(`<tr id="tr-${response.data.id}">
                                    <td>${num}</td>
                                    <td>${response.data.name}</td>
                                    <td>${response.data.guard_name}</td>
                                    <td>${response.data.active}</td>

                                    <td>
                                        <button id="btnInfo" data-id="${response.data.id}" class="btn btn-xs btn-info p-0"><i class="mdi mdi-eye"></i></button>
                                        <button id="btnEdit" data-id="${response.data.id}" class="btn btn-xs btn-success p-0"><i class="mdi mdi-pencil"></i></button>
                                        <button id="btnDelete" data-id="${response.data.id}" class="btn btn-xs btn-danger p-0"><i class="mdi mdi-delete"></i></button>
                                    </td>
                                </tr>`);
                }

                $('#addModal').modal('hide');

                $('#formRole').find('#name').val('');

                $('#formRole').trigger("reset");
            },
            error: function(response) {
                //
            }
        });
    });

    $(document).on('click', '#btnEdit', function() {
        let form    = $('#formRole');
        let id      = $(this).data('id');
        let action  = "{{ url('/') }}/admin/roles/"+id;

        $.ajax({
            url: action + '/edit',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                if (response.type === 'success') {

                    let data = response.data;

                    form.attr('action', action);
                    form.find('#active').val(data.active);

                    $.each(data, function(key, value) {
                        
                            form.find('#name-ar').val(value.name);
                            form.find('#guard_name-ar').val(value.guard_name);
                      
                    });

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
        let action  = "{{ url('/') }}/admin/roles/"+id;

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
