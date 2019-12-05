@extends('backend.layouts.base')

@section('nav-title')
{{ __('بريد التواصل الخاص') }}
@endsection

@section('page-title')
{{ __('بريد التواصل الخاص') }}
@endsection

@section('content')
<div id="wrapper">
    <div class="main-content">
        <div class="row small-spacing">
            <!-- /.col-lg-6 col-xs-12 -->
            <div class="col-lg-12 col-xs-12">
                <div class="box-content">

                    <div class="clearfix">
                        <h4 class="box-title pull-right">{{ 'بريد التواصل الخاص' }}</h4>
                        <!-- /.bo-title -->
                        <button class="btn btn-primary waves-effect waves-light pull-left" id="btnAdd">
                            {{ __('public.place.add') }}
                        </button>
                    </div>

                    <div class="table-responsive table-purchases">
                        <table class="table table-striped margin-bottom-10">
							<thead>
								<tr>
                                    <th style="width: 5%">#</th>
									<th>اسم العميل</th>
									<th>رقم التليفون</th>
									<th>الرسالة</th>
                                    <th>ادوات التحكم</th>
								</tr>
							</thead>
							<tbody>
                                @if($contacts->count() > 0)
                                
                                @php $i = 1; @endphp

                                @foreach ($contacts as $contact)
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ $contact->name }}</td>
                                        <td>{{ $contact->phone }}</td>
                                        <td>{{ Str::limit($contact->message, 100) }}</td>
                                        <td>
                                            <button id="btnInfo" data-id="{{ $contact->id }}" class="btn btn-xs btn-info p-0"><i class="mdi mdi-eye"></i></button>
                                            <button id="btnDelete" data-id="{{ $contact->id }}" class="btn btn-xs btn-danger p-0"><i class="mdi mdi-delete"></i></button>
                                        </td>
                                    </tr>
                                    
                                    @php $i++; @endphp

                                @endforeach

                                @else
                                <tr>
                                    <td colspan="5" class="alert alert-danger p-3">{{ __('public.no_places_registered') }}</td>
                                </tr>
                                @endif
							</tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="5">{{ $contacts->links() }}</td>
                                </tr>
                            </tfoot>
						</table>
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
				<h4 class="modal-title" id="myModalLabel-1">{{ __('public.place.add') }}</h4>
			</div>
			<div class="modal-body">
                <table class="table">
                    <tr>
                        <th>اسم العميل</th>
                        <td id="preview-name"></td>
                    </tr>
                    <tr>
                        <th>البريد الالكترونى</th>
                        <td id="preview-email"></td>
                    </tr>
                    <tr>
                        <th>رقم التليفون</th>
                        <td id="preview-phone"></td>
                    </tr>
                    <tr>
                        <th>الرسالة</th>
                        <td id="preview-message"></td>
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
        
        $('#formPlace').attr('action', "{{ url('/') }}/admin/places");
        $('#addModal').modal('show');
    });

    $(document).on('click', '#btnInfo', function() {
        let id      = $(this).data('id');
        let action  = "{{ url('/') }}/admin/contacts/"+id;

        $.ajax({
            url: action,
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                let data = response.data;
                let modal = $('#addModal');

                modal.find('#preview-name').html(data.name);
                modal.find('#preview-email').html(data.email);
                modal.find('#preview-phone').html(data.phone);
                modal.find('#preview-message').html(data.message);
                
                modal.modal('show');
            }
        })
    });

    $(document).on('click', '#btnDelete', function() {
        let form    = $('#formProperty');
        let id      = $(this).data('id');
        let action  = "{{ url('/') }}/admin/places/"+id;

        $.ajax({
            url: action,
            type: 'POST',
            data: {
                '_method': 'DELETE'
            },
            success: function(response) {
                if (response.message === 'Deleted Successfully') {
                    
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