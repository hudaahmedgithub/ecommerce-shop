@extends('backend.layouts.base')

@section('nav-title')
{{ __('public.coupons_title') }}
@endsection

@section('page-title')
{{ __('public.coupons_title') }}
@endsection

@section('content')
<div id="wrapper">
    <div class="main-content">
        <div class="row small-spacing">
            <!-- /.col-lg-6 col-xs-12 -->
            <div class="col-lg-12 col-xs-12">
                <div class="box-content">

                    <div class="clearfix">
                        <h4 class="box-title pull-right">{{ __('public.coupons_title') }}</h4>
                        <!-- /.bo-title -->
                        <button class="btn btn-primary waves-effect waves-light pull-left" id="btnAdd">
                            {{ __('public.coupon.add') }}
                        </button>
                    </div>

                    <div class="table-responsive table-purchases">
                        <table class="table table-striped margin-bottom-10" id="table">
                            <thead>
                                <tr>
                                    <th style="width: 5%">#</th>
                                    <th>{{ __('public.coupon.type') }}</th>
                                    <th>{{ __('public.coupon.amount') }}</th>
                                    <th>{{ __('public.coupon.code') }}</th>
                                    <th>{{ __('public.coupon.duration') }}</th>
                                    <th>{{ __('public.coupon.multi_times_count') }}</th>
                                    <th>{{ __('public.coupon.expires_at') }}</th>
                                    <th>{{ __('public.coupon.controls') }}</th>
                                </tr>
                            </thead>
                            <tbody id="tbody">

                                @if($coupons->count() > 0)
                                @php $i = 1; @endphp

                                @foreach($coupons as $coupon)

                                <tr id="tr-{{ $coupon->id }}">
                                    <td>{{ $i }}</td>
                                    <td>{{ $coupon->type }}</td>
                                    <td>{{ $coupon->amount }}</td>
                                    <td>{{ $coupon->code }}</td>
                                    <td>{{ $coupon->duration }}</td>
                                    <td>{{ $coupon->multi_times_count }}</td>
                                    <td>{{ $coupon->expires_at }}</td>

                                    <td style="display: flex">
                                        <button id="btnEdit" data-id="{{ $coupon->id }}" class="btn btn-xs btn-success p-0"><i class="mdi mdi-pencil"></i></button>
                                        <button id="btnDelete" data-id="{{ $coupon->id }}" class="btn btn-xs btn-danger p-0"><i class="mdi mdi-delete"></i></button>
                                    </td>
                                </tr>

                                @php $i++; @endphp

                                @endforeach
                                @else
                                <tr>
                                    <td colspan="9" class="alert alert-danger p-3">{{ __('public.no_coupons_registered') }}</td>
                                </tr>
                                @endif

                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="5">{{ $coupons->links() }}</td>
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
				<h4 class="modal-title" id="myModalLabel-1">{{ __('public.coupon.add') }}</h4>
			</div>
			<div class="modal-body">
                <form action="{{ route('admin.coupons.store') }}" method="POST" id="formcoupon">
                    @csrf
                    <div id="update"></div>

                    {{-- Type --}}
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="type">{{ __('public.coupon.type') }}</label>
                            <select class='form-control' required name="type">
                                <option value="percentage">{{ __('public.coupon.percentage') }}</option>
                                <option value="flat_rate">{{ __('public.coupon.flat_rate') }}</option>
                            </select>
                        </div>

                    {{-- Duration --}}
                        <div class="form-group col-md-6">
                            <label for="duration">{{ __('public.coupon.duration') }}</label>
                            <select class='form-control' required name="duration">
                                <option value="once">{{ __('public.coupon.once') }}</option>
                                <option value="multi_times">{{ __('public.coupon.multi_times') }}</option>
                            </select>
                        </div>
                    </div>

                    {{-- Multi_times_count --}}
                    <div class="form-group" id='multi_times'>
                        <label for="multi_times_count">{{ __('public.coupon.multi_times_count') }}</label>
                        <input type="text" id="multi_times_count" required name="multi_times_count" value='1' class="form-control">
                    </div>

                    {{-- Amount --}}
                    <div class="form-group">
                        <label for="amount">{{ __('public.coupon.amount') }}</label>
                        <input type="text" name="amount" required class="form-control">
                    </div>

                    {{-- Code --}}
                    <div class="form-group">
                        <label for="code">{{ __('public.coupon.code') }}</label>
                        <input type="text" name="code" required class="form-control">
                    </div>

                    {{-- Expires_at --}}
                    <div class="form-group">
                        <label for="code">{{ __('public.coupon.expires_at') }}</label>
                        <input type="date" name="expires_at" required class="form-control">
                    </div>

        <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-sm waves-effect waves-light">{{ __('public.save') }}</button>
                </form>
                <button type="button" class="btn btn-default btn-sm waves-effect waves-light" data-dismiss="modal">{{ __('public.close') }}</button>
			</div>
		</div>
	</div>
</div>


<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg"  id="showModal">
    <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel-1">{{ __('public.place.add') }}</h4>
                </div>
                <div class="modal-body">
                    <table class="table">
                        <tr>
                            <th>{{ __('public.coupon.code') }}</th>
                            <td id="preview-code"></td>
                        </tr>
                        <tr>
                            <th>{{ __('public.coupon.type') }}</th>
                            <td id="preview-type"></td>
                        </tr>
                        <tr>
                            <th>{{ __('public.coupon.amount') }}</th>
                            <td id="preview-amount"></td>
                        </tr>
                        <tr>
                            <th>{{ __('public.coupon.duration') }}</th>
                            <td id="preview-duration"></td>
                        </tr>
                        <tr>
                            <th>{{ __('public.coupon.multi_times_count') }}</th>
                            <td id="preview-multi_times_count"></td>
                        </tr>
                        <tr>
                            <th>{{ __('public.coupon.expires_at') }}</th>
                            <td id="preview-expires_at"></td>
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

        $('#formcoupon').attr('action', "{{ url('/') }}/admin/coupons");

        $("#multi_times").hide();


        $('#addModal').modal('show');
    });

    $(document).on('click', 'select[name=duration]', function() {
            if( $(this).val() == "once"){
                $("#multi_times").hide();
            }else{
                $("#multi_times").show();
            }
    });

    $('#formcoupon').on('submit', function(e) {
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
                                    <td>${response.data.type}</td>
                                    <td>${response.data.amount}</td>
                                    <td>${response.data.code}</td>
                                    <td>${response.data.duration}</td>
                                    <td>${response.data.multi_times_count}</td>
                                    <td>${response.data.expires_at}</td>

                                    <td style='display: flex'>
                                        <button id="btnEdit" data-id="${response.data.id}" class="btn btn-xs btn-success p-0"><i class="mdi mdi-pencil"></i></button>
                                        <button id="btnDelete" data-id="${response.data.id}" class="btn btn-xs btn-danger p-0"><i class="mdi mdi-delete"></i></button>
                                    </td>
                                </tr>`);
                } else {
                    var num = $(`#tr-${response.data.id}`).children('td').html();

                    $(`#tr-${response.data.id}`).replaceWith(`<tr id="tr-${response.data.id}">
                                    <td>${num}</td>
                                    <td>${response.data.type}</td>
                                    <td>${response.data.amount}</td>
                                    <td>${response.data.code}</td>
                                    <td>${response.data.duration}</td>
                                    <td>${response.data.multi_times_count}</td>
                                    <td>${response.data.expires_at}</td>

                                    <td style='display: flex'>
                                        <button id="btnEdit" data-id="${response.data.id}" class="btn btn-xs btn-success p-0"><i class="mdi mdi-pencil"></i></button>
                                        <button id="btnDelete" data-id="${response.data.id}" class="btn btn-xs btn-danger p-0"><i class="mdi mdi-delete"></i></button>
                                    </td>
                                </tr>`);
                }

                $('#addModal').modal('hide');

                $('#formcoupon').trigger("reset");
            },
            error: function(response) {
                //
            }
        });
    });

    $(document).on('click', '#btnEdit', function() {
        let form    = $('#formcoupon');
        let id      = $(this).data('id');
        let action  = "{{ url('/') }}/admin/coupons/"+id;

        $.ajax({
            url: action + '/edit',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                if (response.type === 'success') {

                    let data = response.data;

                    form.attr('action', action);
                    form.find('#active').val(data.active);

                    form.attr('action', action);
                    form.find('select[name=type]').val(data.type);
                    form.find('input[name=amount]').val(data.amount);
                    form.find('input[name=code]').val(data.code);
                    form.find('select[name=duration]').val(data.duration);
                    form.find('input[name=multi_times_count]').val(data.multi_times_count);
                    form.find('input[name=expires_at]').val(data.expires_at);


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
        let action  = "{{ url('/') }}/admin/coupons/"+id;

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
