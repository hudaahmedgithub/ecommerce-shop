@extends('backend.layouts.base')

@section('content')

   <div id="wrapper">
    <div class="main-content">
        <div class="row small-spacing">
            <!-- /.col-lg-6 col-xs-12 -->
            <div class="col-lg-12 col-xs-12">
                <div class="box-content">

                    <div class="clearfix">
                        <h4 class="box-title pull-right">{{ __('public.users_title') }}</h4>
                        <!-- /.bo-title -->
                        <button class="btn btn-primary waves-effect waves-light pull-left" id="btnAdd">
                            {{ __('public.user.add') }}
                        </button>
                    </div>

<div class="table-responsive table-purchases">
                        <table class="table table-striped margin-bottom-10" id="table">
                            <thead>
                                <tr>
                                    <th style="width: 5%">#</th>
                                    <th>{{ __('public.user.name') }}</th>
                                    <th>{{ __('public.user.email') }}</th>
                                    <th>{{ __('public.user.active') }}</th>
                                    <th>{{ __('public.user.controls') }}</th>
                                </tr>
                            </thead>
                            <tbody id="tbody">

                                @if($users->count() > 0)
                                @php $i = 1; @endphp

                                @foreach($users as $user)

                                <tr id="tr-{{ $user->id }}">
									@if(Auth::guard('admin')->user()->hasRole('sub admin'))
									yes
									@endif
									
                                    <td>{{ $i }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @if(app()->getLocale() == 'ar')
                                            {{ $user->active == 'no' ? 'لا' : 'نعم' }}
                                        @else
                                            {{ ucfirst($user->active) }}
                                        @endif
                                    </td>
                                    <td>
                                        <button id="btnInfo" data-id="{{ $user->id }}" class="btn btn-xs btn-info p-0"><i class="mdi mdi-eye"></i></button>
                                        <button id="btnEdit" data-id="{{ $user->id }}" class="btn btn-xs btn-success p-0"><i class="mdi mdi-pencil"></i></button>
                                        <button id="btnDelete" data-id="{{ $user->id }}" class="btn btn-xs btn-danger p-0"><i class="mdi mdi-delete"></i></button>
                                    </td>
                                </tr>

                                @php $i++; @endphp

                                @endforeach
                                @else
                                <tr>
                                    <td colspan="5" class="alert alert-danger p-3">{{ __('public.no_users_registered') }}</td>
                                </tr>
                                @endif

                            </tbody>
                            <tfoot>
                                <tr>
									<!--links-->
                                    <td colspan="5"></td>
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
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel-1">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel-1">{{ __('public.user.add') }}</h4>
			</div>
			<div class="modal-body">
                <form 
			action="{{ route('admin.users.store') }}" method="POST" id="formUser">
                    @csrf
                    <div id="update"></div>

                    {{-- Name --}}
                    <div class="row">
                  
                        <div class="form-group col-md-6">
                            <label for="name">{{ __('public.user.name') }}</label>
                            <input type="text" id="name" name="name"  class="form-control">
                        </div>
                   
                    </div>

                    {{-- Email --}}
                    <div class="row">
                       
                        <div class="form-group col-md-6">
                            <label for="email">{{ __('public.user.email') }}</label>
                            <input id="email" name="email"  class="form-control">
                        </div>
                       
                    </div>
	<div class="form-group">
         <label>@lang('site.permissions')</label>
              <div class="nav-tabs-custom">
               @php
                   $models = ['users'];
                    $maps = ['create', 'read', 'update', 'delete'];
                    @endphp
<ul class="nav nav-tabs">
           
       </ul>

       <div class="tab-content">

           @foreach ($models as $index=>$model)

             <div class="tab-pane {{ $index == 0 ? 'active' : '' }}" id="{{ $model }}">

             @foreach ($roles as $index=>$role)
             <input type="checkbox" name="roles[]" value="{{$role}}">
                    @endforeach

                 </div>

         @endforeach

                </div><!-- end of tab content -->
                                
           </div><!-- end of nav tabs -->
                            
</div>

                    <div class="form-group">
                        <label for="active">{{ __('public.user.active') }}</label>
                        <select id="active" name="active" class="form-control">
                            <option value="yes">{{ __('public.user.yes') }}</option>
                            <option value="no">{{ __('public.user.no') }}</option>
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
                            <th>{{ __('public.user.name') }}</th>
                            <td id="preview-name"></td>
                        </tr>
                        <tr>
                            <th>{{ __('public.user.email') }}</th>
                            <td id="preview-email"></td>
                        </tr>
                        <tr>
                            <th>{{ __('public.user.active') }}</th>
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

@push('script')
<script>
    $('#btnAdd').on('click', function() {

        if ($('#update').next().attr('name') == '_method') {
            $('#update').next().remove();
        }

        $('#formUser').attr('action', "{{ url('/') }}/admin/users");
        $('#addModal').modal('show');
    });

    $(document).on('click', '#btnInfo', function() {
        let id      = $(this).data('id');
        let action  = "{{ url('/') }}/admin/users/"+id;

        $.ajax({
            url: action,
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                let data = response.data;
                let modal = $('#showModal');

                modal.find('#preview-name').html(data.name);
                modal.find('#preview-email').html(data.email);
                modal.find('#preview-active').html(data.active);
                modal.find('#preview-message').html(data.message);

                modal.modal('show');
            }
        })
    });

    $('#formUser').on('submit', function(e) {
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
                                    <td>${response.data.email}</td>
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
                                    <td>${response.data.email}</td>
                                    <td>${response.data.active}</td>

                                    <td>
                                        <button id="btnInfo" data-id="${response.data.id}" class="btn btn-xs btn-info p-0"><i class="mdi mdi-eye"></i></button>
                                        <button id="btnEdit" data-id="${response.data.id}" class="btn btn-xs btn-success p-0"><i class="mdi mdi-pencil"></i></button>
                                        <button id="btnDelete" data-id="${response.data.id}" class="btn btn-xs btn-danger p-0"><i class="mdi mdi-delete"></i></button>
                                    </td>
                                </tr>`);
                }

                $('#addModal').modal('hide');

                $('#formUser').find('#name').val('');

                $('#formUser').trigger("reset");
            },
            error: function(response) {
                //
            }
        });
    });

    $(document).on('click', '#btnEdit', function() {
        let form    = $('#formUser');
        let id      = $(this).data('id');
        let action  = "{{ url('/') }}/admin/users/"+id;

        $.ajax({
            url: action + '/edit',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                if (response.type === 'success') {

                    let data = response.data;

                    form.attr('action', action);
                    form.find('#active').val(data.active);

                    $.each(data.translations, function(key, value) {
                        
                            form.find('#name').val(value.name);
                            form.find('#email').val(value.email);
                        
                    });

                    if (form.find('#update').next().attr('name') != '_method') {
                        form.find('#update').after('{{ method_field('PUT') }}');
                    }

                    $('#addModal').modal('show');
                }
            }
        })
    });
$('#formProperty').on('submit', function(e) {
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
                if (response.type == 'store') {
                    $('#tbody').append(`<tr id="tr-${response.data.id}">
                                    <td>${++rows}</td>
                                    <td>${response.data.name}</td>
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
                                    <td>
                                        <button id="btnEdit" data-id="${response.data.id}" class="btn btn-xs btn-success p-0"><i class="mdi mdi-pencil"></i></button>
                                        <button id="btnDelete" data-id="${response.data.id}" class="btn btn-xs btn-danger p-0"><i class="mdi mdi-delete"></i></button>
                                    </td>
                                </tr>`);
                }

                $('#addModal').modal('hide');

                $('#formProperty').find('#name').val('');
            },
            error: function(response) {
                //
            }
        });
    });
    $(document).on('click', '#btnDelete', function() {
        let form    = $('#formProperty');
        let id      = $(this).data('id');
        let action  = "{{ url('/') }}/admin/users/"+id;

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


@endsection
