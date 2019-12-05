@extends('backend.layouts.base')

@section('nav-title')
{{ __('public.properties_title') }}
@endsection

@section('page-title')
{{ __('public.properties_title') }}
@endsection

@section('content')
<div id="wrapper">
    <div class="main-content">
        <div class="row small-spacing">
            <!-- /.col-lg-6 col-xs-12 -->
            <div class="col-lg-12 col-xs-12">
                <div class="box-content">

                    <div class="clearfix">
                        <h4 class="box-title pull-right">{{ __('public.properties_title') }}</h4>
                        <!-- /.bo-title -->
                        <a class="btn btn-primary waves-effect waves-light pull-left" href="{{ route('admin.properties.create') }}">
                            {{ __('public.property.add') }}
                        </a>
                    </div>

                    <div class="table-responsive table-purchases">
                        <table class="table table-striped margin-bottom-10" id="table">
                            <thead>
                                <tr>
                                    <th style="width: 5%">#</th>
                                    <th>{{ __('public.property.name') }}</th>
                                    <th>{{ __('public.property.controls') }}</th>
                                </tr>
                            </thead>
                            <tbody id="tbody">

                                @if($properties->count() > 0)
                                @php $i = 1; @endphp

                                @foreach($properties as $property)

                                <tr id="tr-{{ $property->id }}">
                                    <td>{{ $i }}</td>
                                    <td>{{ $property->name }}</td>
                                    <td>
                                        @method('DELETE')
                                        <button id="btnEdit" data-id="{{ $property->id }}" class="btn btn-xs btn-success p-0"><i class="mdi mdi-pencil"></i></button>
                                        <button id="btnDelete" data-action="{{ route('admin.properties.destroy', ['id' => $property->id]) }}" data-id="{{ $property->id }}" class="btn btn-xs btn-danger p-0"><i class="mdi mdi-delete"></i></button>
                                    </td>
                                </tr>

                                @php $i++; @endphp

                                @endforeach
                                @else
                                <tr>
                                    <td colspan="5" class="alert alert-danger p-3">{{ __('public.no_properties_registered') }}</td>
                                </tr>
                                @endif

                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="5">{{ $properties->links() }}</td>
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

@endsection

@push('script')
<script>
    $('#btnAdd').on('click', function() {
        
        if ($('#update').next().attr('name') == '_method') {
            $('#update').next().remove();
        }
        
        $('#formProperty').attr('action', "{{ url('/') }}/admin/properties");
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
        let action  = "{{ url('/') }}/admin/properties/"+id;

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