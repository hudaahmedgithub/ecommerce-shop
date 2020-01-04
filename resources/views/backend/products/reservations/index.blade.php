@extends('backend.layouts.base')

@section('nav-title')
{{ __('public.reservations_title') }}
@endsection

@section('page-title')
{{ __('public.reservations_title') }}
@endsection

@section('content')
@push('style')
<style>
    .modal-backdrop{
        z-index: 1;
    }
    .modal-dialog{
        -webkit-box-shadow: 0 19px 38px rgba(0,0,0,0.30), 0 15px 12px rgba(0,0,0,0.22);
        -moz-box-shadow: 0 19px 38px rgba(0,0,0,0.30), 0 15px 12px rgba(0,0,0,0.22);
        box-shadow: 0 19px 38px rgba(0,0,0,0.30), 0 15px 12px rgba(0,0,0,0.22);
    }
    .info_header{
        background-color: #1d84df;
        color: #fff;
        padding: 5px;
        text-align: center;
        margin-top: 0;
    }
    .info_box{
        padding: 3px;
    }
    .info_container table tr td {
        padding: 5px;
    }
    .info_box th{
        text-align: center !important;
        border: 1px solid #ddd
    }
</style>
@endpush


<div id="wrapper">
    <div class="main-content">
        <div class="row small-spacing">
            <!-- /.col-lg-6 col-xs-12 -->
            <div class="col-lg-12 col-xs-12">
                <div class="box-content">

                    <div class="clearfix">
                        <h4 class="box-title pull-right">{{ __('public.reservations_title') }}</h4>
                    </div>

                    <div class="table-responsive table-purchases">
                        <table class="table table-striped margin-bottom-10" id="table">
                            <thead>
                                <tr>
                                    <th style="width: 5%">#</th>
                                    <th>{{ __('public.reservations.name') }}</th>
                                    <th>{{ __('public.reservations.status') }}</th>
                                    <th>{{ __('public.reservations.controls') }}</th>
                                </tr>
                            </thead>
                            <tbody id="tbody">

                                @if($reservations->count() > 0)
                                @php $i = 1; @endphp

                                @foreach($reservations as $property)
                                <tr id="tr-{{ $property->id }}">
                                    <td>{{ $i }}</td>
                                    <td>{{ $property->user->name }}</td>
                                    <td>
                                        @if ($property->status == 'pending')
                                            <h5 class='badge bg-danger'>pending</h5>
                                        @elseif($property->status == 'scheduled')
                                            <h5 class='badge bg-info'>scheduled</h5>
                                        @else 
                                            <h5 class='badge bg-success'><b>success</b></h5>
                                        @endif
                                    </td>
                                    <td>
                                        @method('DELETE')
                                        <button id="btnEdit" data-id="{{ $property->id }}" class="btn btn-xs btn-success p-0"><i class="mdi mdi-pencil"></i></button>
                                        <button id="btnDelete" data-action="{{ route('admin.reservations.destroy', ['id' => $property->id]) }}" data-id="{{ $property->id }}" class="btn btn-xs btn-danger p-0"><i class="mdi mdi-delete"></i></button>
                                        <button id="btnInfo" data-toggle="modal" data-target="#InfoModal-{{ $property->id }}" data-id="{{ $property->id }}" class="btn btn-xs btn-info p-0"><i class="mdi mdi-help"></i></button>
                                    </td>
                                    <td id="modalBox_{{ $property->id }}">
                                        <!-- Info Modal -->
                                        <div class="modal fade" style="top: 59px;" id="InfoModal-{{ $property->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel-1">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        <h4 class="modal-title" id="myModalLabel-1">{{ __('public.reservations.info') }}</h4>
                                                    </div>
                                                    <div class="modal-body" dir='ltr'>

                                                        <div class="row">
                                                            <div class="col-md-6 info_container">
                                                                <h4 class='info_header'>Order Info</h4>
                                                                <div class="info_box">
                                                                    <table class="table">
                                                                        <tr>
                                                                            <td>Order Number</td>
                                                                            <td>{{ $property->id }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Order Date</td>
                                                                            <td>{{ $property->created_at }}</td>
                                                                        </tr>
                                                                    </table>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6 info_container">
                                                                <h4 class='info_header'>User Info</h4>
                                                                <div class="info_box">
                                                                    <table class="table">
                                                                        <tr>
                                                                            <td>Name :</td>
                                                                            <td>{{ $property->user->name }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Email :</td>
                                                                            <td>{{ $property->user->email }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Address :</td>
                                                                            <td>{{ $property->user->country .' - '. $property->user->city  .' - '. $property->user->address }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Phone :</td>
                                                                            <td>{{ $property->user->phone }}</td>
                                                                        </tr>
                                                                    </table>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-12 info_container">
                                                                <h4 class='info_header'>Products Info</h4>
                                                                <div class="info_box">
                                                                    <table class="table text-center">
                                                                        <tr>
                                                                            <th>Name</th>
                                                                            <th>quantity</th>
                                                                            <th>Price</th>
                                                                        </tr>

                                                                        @foreach ($property->getProducts( $property->id ) as $item)
                                                                            <tr>
                                                                                <td>
                                                                                    {{ $item->name }}
                                                                                </td>
                                                                                <td>
                                                                                    {{ $item->productQuantity }}
                                                                                </td>
                                                                                <td>
                                                                                    {{ $item->price . " " . $item->currency_name }}
                                                                                </td>
                                                                            </tr>
                                                                        @endforeach
                                                                        
                                                                    </table>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-12 info_container">
                                                                <h4 class='info_header'>Cart Info</h4>
                                                                <div class="info_box">
                                                                    <div class="row">
                                                                        <div class="col-md-8 info_container">
                                                                                <h4 class='info_header'>Payment Info</h4>
                                                                                <div class="info_box">
                                                                                <table class="table">
                                                                                    <tr>
                                                                                        <td>Payment Method</td>
                                                                                        <td>{{ $property->reservation_info($property->id)[0]->payment_method  }}</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>Payment Id</td>
                                                                                        <td>{{ $property->reservation_info($property->id)[0]->payment_id  }}</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>Payment Cart</td>
                                                                                        <td>{{ $property->reservation_info($property->id)[0]->payment_cart  }}</td>
                                                                                    </tr>
                                                                                </table>
                                                                                </div>
                                                                        </div>

                                                                        <div class="col-md-4 info_container">
                                                                            <h4 class='info_header'>Price Info</h4>
                                                                            <div class="info_box">
                                                                            <table class="table">
                                                                                <tr>
                                                                                    <td>Total</td>
                                                                                    <td>{{ $property->reservation_info($property->id)[0]->total  }}</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Subtotal</td>
                                                                                    <td>{{ $property->reservation_info($property->id)[0]->subtotal  }}</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Currency</td>
                                                                                    <td>{{ $property->reservation_info($property->id)[0]->currency  }}</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Tax</td>
                                                                                    <td>{{ $property->reservation_info($property->id)[0]->tax  }}</td>
                                                                                </tr> 
                                                                                <tr>
                                                                                    <td>Discount</td>
                                                                                    <td>{{ $property->reservation_info($property->id)[0]->discount  }}</td>
                                                                                </tr> 
                                                                                <tr>
                                                                                    <td>Shipping</td>
                                                                                    <td>{{ $property->reservation_info($property->id)[0]->shipping  }}</td>
                                                                                </tr> 
                                                                            </table>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                   
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 info_container">
                                                                <h4 class='info_header'>Payer Info</h4>
                                                                <div class="info_box">
                                                                    <table class="table">
                                                                        <tr>
                                                                            <td>Payer Name</td>
                                                                            <td>{{ $property->reservation_info($property->id)[0]->shipping_recipient_name }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Payer Email</td>
                                                                            <td>{{ $property->reservation_info($property->id)[0]->payer_email  }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Shipping Site</td>
                                                                            <td>{{ $property->reservation_info($property->id)[0]->shipping_country_code ." - ". $property->reservation_info($property->id)[0]->shipping_state ." - ". $property->reservation_info($property->id)[0]->shipping_city }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Shipping Line</td>
                                                                            <td>{{ $property->reservation_info($property->id)[0]->shipping_line1  }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Shipping Postal Code</td>
                                                                            <td>{{ $property->reservation_info($property->id)[0]->shipping_postal_code  }}</td>
                                                                        </tr>
                                                                    </table>
                                                                </div>
                                                            </div>

                                                                
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                            
                                                        <button type="button" class="btn btn-default btn-sm waves-effect waves-light" data-dismiss="modal">{{ __('public.close') }}</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                                @php $i++; @endphp
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="5" class="alert alert-danger p-3">{{ __('public.no_reservations_registered') }}</td>
                                </tr>
                                @endif

                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="5">{{ $reservations->links() }}</td>
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

<!-- Edit Modal -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel-1">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel-1">{{ __('public.reservations.edit') }}</h4>
			</div>
			<div class="modal-body">
                <form action='' method="POST" id="formPlace">
                    @csrf
                    <div id="update"></div>

                    <div class="form-group">
                        <label>{{ __('public.reservations.status') }}</label>
                        <select name="status" id="status" class="form-control">
                            <option value="success">success</option>
                            <option value="scheduled">scheduled</option>
                            <option value="pending">pending</option>
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

    $(document).on('click', '#btnEdit', function() {
        let form    = $('#formPlace');
        let id      = $(this).data('id');
        let action  = "{{ url('/') }}/admin/reservations/"+id;
        let statusAction = "{{ url('/') }}/admin/reservations/status/"+id;

        $.ajax({
            url: action + '/edit',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
             
                if (response.message === 'Record Founded Successfully') {

                    let status = response.data.status;
                    form.attr('action', statusAction);
                    form.find("select[name=status]").val(status);
                    $('#addModal').modal('show');
                   
                }
            }
        });
    });

    $('#formPlace').on('submit', function(e) {
        e.preventDefault();

        let form        = $(this);
        let url         = form.attr('action');
        let data        = form.serialize();
        var rows        = $('#table tbody tr').length;

        
        
        $.ajax({
            url: url,
            type: 'POST',
            data: data,
            dataType: 'json',
            success: function(response) {

                var num = $(`#tr-${response.id}`).children('td').html();
                var thisModal = $("#modalBox_"+response.id).html();
                                
                if ( response.status == 'success' ){
                    resStatus = "<h5 class='badge bg-success'><b>success</b></h5>";
                } else if ( response.status == 'scheduled' ) {
                    resStatus = "<h5 class='badge bg-info'>scheduled</h5>";
                } else {
                    resStatus = "<h5 class='badge bg-danger'>pending</h5>";
                }
                
                $(`#tr-${response.id}`).replaceWith(`<tr id="tr-${response.id}">
                        <td>${num}</td>
                        <td>${response.name}</td>
                        <td>${resStatus}</td>
                        <td>
                            <button id="btnEdit" data-id="${response.id}" class="btn btn-xs btn-success p-0"><i class="mdi mdi-pencil"></i></button>
                            <button id="btnDelete" data-id="${response.id}" class="btn btn-xs btn-danger p-0"><i class="mdi mdi-delete"></i></button>
                            <button id="btnInfo" data-toggle="modal" data-target="#InfoModal-${response.id}" data-id="${response.id}" class="btn btn-xs btn-info p-0"><i class="mdi mdi-help"></i></button>
                        </td>
                        <td id="modalBox_${response.id}">
                            ${thisModal}
                        </td>
                    </tr>`);
         
                $('#addModal').modal('hide');

                $('#formPlace').find('#status').val('');
            },
            error: function(response) {
                //
            }
        });
    });
 

    $('#btnAdd').on('click', function() {

        if ($('#update').next().attr('name') == '_method') {
            $('#update').next().remove();
        }

        $('#formProperty').attr('action', "{{ url('/') }}/admin/reservations");
        $('#addModal').modal('show');
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
        let action  = "{{ url('/') }}/admin/reservations/"+id;

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
