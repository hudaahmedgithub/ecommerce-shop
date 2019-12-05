@extends('backend.layouts.base')

@section('nav-title')
{{ __('public.reviews_title') }}
@endsection

@section('page-title')
{{ __('public.reviews_title') }}
@endsection

@push('style')
    <style>
        .comment_img{
            max-width: 50px;
            height: 50px;
            margin: 0 5px;
            border-radius: 50%;
        }
        ._comment_box .media-body{
            background-color: #eee;
            padding: 10px;
            border-radius: 20px 0;
            border: 1px solid #c0c0c0;
            box-shadow: inset -2px 0px 0px #c0c0c0;
        }
        ._user{
            font-size: 15px;
            font-weight: bold;
        }
    </style>
@endpush

@section('content')
<div id="wrapper">
    <div class="main-content">
        <div class="row small-spacing">
            <!-- /.col-lg-6 col-xs-12 -->
            <div class="col-lg-12 col-xs-12">
                <div class="box-content">

                    <div class="clearfix">
                        <h4 class="box-title pull-right">{{ __('public.reviews_title') }}</h4>
                        
                    </div>

                    <div class="table-responsive table-purchases">
                        <table class="table table-striped margin-bottom-10" id="table">
                            <thead>
                                <tr>
                                    <th style="width: 5%">#</th>
                                    <th>{{ __('public.property.name') }}</th>
                                    <th>{{ __('public.property.product') }}</th>
                                    <th>{{ __('public.property.rate') }}</th>
                                    <th>{{ __('public.property.reply') }}</th>
                                    <th>{{ __('public.property.comment') }}</th>
                                    <th>{{ __('public.property.controls') }}</th>
                                </tr>
                            </thead>
                            <tbody id="tbody">

                                @if($reviews->count() > 0)
                                @php $i = 1; @endphp

                                @foreach($reviews as $property)

                                <tr id="tr-{{ $property->id }}">
                                    <td>{{ $i }}</td>
                                    <td>{{ $property->user->name }}</td>
                                    <td>{{ $property->rate }}</td>
                                    <td>{{ $property->product->name }}</td>
                                    <td>
                                        @if( $property->parent !== 0 )
                                            <i class='label label-info'>Reply</i>
                                        @else
                                            <i class='label label-success'>Comment</i>
                                        @endif
                                    </td>
                                    <td>{{ Str::limit($property->comment, 20) }}</td>
                                    <td>
                                        @method('DELETE')
                                        <button id="btnEdit"
                                            data-toggle="modal"
                                            data-target="#addModal"
                                            data-img='{{ Storage::url($property->user->image) }}'
                                            data-name='{{ $property->user->name }}'
                                            data-comment="{{ $property->comment }}"
                                            data-id="{{ $property->id }}"
                                            data-product-id="{{ $property->product->id  }}"
                                            class="btn-edit btn btn-xs btn-success p-0">
                                            <i class="mdi mdi-eye"></i>
                                        </button>
                                        <button id="btnDelete" data-action="{{ route('admin.reviews.destroy', ['id' => $property->id]) }}" data-id="{{ $property->id }}" class="btn btn-xs btn-danger p-0"><i class="mdi mdi-delete"></i></button>
                                    </td>
                                </tr>

                                @php $i++; @endphp

                                @endforeach
                                @else
                                <tr>
                                    <td colspan="9" class="alert alert-danger p-3">{{ __('public.no_reviews_registered') }}</td>
                                </tr>
                                @endif

                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="9">{{ $reviews->links() }}</td>
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
				<h4 class="modal-title" id="myModalLabel-1">{{ __('public.review.reply') }}</h4>
			</div>

			<div class="modal-body">

            <div class="replyBox">
            <div class="media _comment_box">
                    <div class="media-left">
                        <a href="#">
                            <img class="media-object comment_img" src="{{ asset('imgs/usr.png') }}">
                        </a>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading _user">...</h4>
                        <span class='_comment'>...</span>
                    </div>
                </div>
            </div>



            <br>

            <form action="" method="POST" id="formPlace">
                @csrf
                <div id="update"></div>
                <input type="hidden" name='product_id' value=''>
                <div class="input-group">
                    <div class="input-group-addon">
                        <input type="hidden" name="parent" value="0">
                        <button type="submit" class="btnOf_comment btn btn-primary btn-sm waves-effect waves-light">
                            REPLY <i class='mdi mdi-send'></i>
                        </button></label></div>
                        <textarea rows="4" id='WriteComment' class="form-control" name="comment"></textarea>
                </div>
            </form>

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
$(function () {

        $(document).on('click', '.btnOf_comment', function(e) {
                e.preventDefault();

                var data = {
                    product_id: $('input[name=product_id]').val(),
                    comment:  $('textarea[name=comment]').val(),
                    rate:  5,
                    parent: $('input[name=parent]').val()
                };

                var rows        = $('#table tbody tr').length;

                if(data.rate !== undefined && data.comment !== ""){
                    $.ajax({
                        url: "{{ route('reviews.store') }}",
                        type: 'POST',
                        data: data,
                        dataType: 'json',
                        error: function(response) {
                            console.error("There Is Some Thing Wrong, Try Again");
                        },
                        success: function(response) {
                            var replyOrComment = '';

                            if(response.review.parent !== 0){
                                replyOrComment = "<i class='label label-info'>Reply</i>";
                            }else{
                                replyOrComment = "<i class='label label-success'>Comment</i>";
                            }

                            console.log(
                                $('#tbody').append(`<tr id="tr-${response.review.id}">
                                    <td>${++rows}</td>
                                    <td>${response.user}</td>
                                    <td>${response.review.product_id}</td>
                                    <td>${response.review.rate}</td>
                                    <td>
                                        ${replyOrComment}
                                    </td>
                                    <td>${response.review.comment}</td>
                                    <td>
                                        @method('DELETE')
                                        <button id="btnEdit"
                                            data-toggle="modal"
                                            data-target="#addModal"
                                            data-img='${response.review.user.image}'
                                            data-name='${response.user}'
                                            data-comment="${response.review.comment}"
                                            data-id="${response.review.id}}"
                                            data-product-id="${response.review.product_id}"
                                            class="btn-edit btn btn-xs btn-success p-0">
                                            <i class="mdi mdi-eye"></i>
                                        </button>
                                        <button id="btnDelete" data-id="${response.review.id}" class="btn btn-xs btn-danger p-0"><i class="mdi mdi-delete"></i></button>
                                    </td>
                                </tr>`)
                            );
                            
                            $('#addModal').modal('hide');
                        }
                    });
                }else{
                }
                
            });



    $('#addModal').on('show.bs.modal', function(e) {
        
        var target  = e.relatedTarget,
            form    = $('#formPlace'),
            id      = $(target).data('id'),
            action  = "{{ url('/') }}/admin/review/"+id,
            comment = $(target).data('comment'),
            name    = $(target).data('name'),
            imgSrc  = $(target).data('img'),
            name    = $(e.relatedTarget).data('name'),
            productId = $(target).data('product-id');

        // Set User Name
        $(e.currentTarget).find('._user').text(name);

        $(this).find('input[name=parent]').val($(target).data('id'))

        // Set User Image
        if(imgSrc === ''){
            $(e.currentTarget).find('.comment_img').attr("src", "{{ asset('imgs/usr.png') }}");
        }else{
            $(e.currentTarget).find('.comment_img').attr("src", imgSrc);
        }

        // Set User Comment
        $(e.currentTarget).find('._comment').text(comment);
        $(e.currentTarget).find('input[name=product_id]').val(productId);
    });



    $('#btnAdd').on('click', function() {

        if ($('#update').next().attr('name') == '_method') {
            $('#update').next().remove();
        }

        $('#formProperty').attr('action', "{{ url('/') }}/admin/reviews");
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
        let action  = "{{ url('/') }}/admin/reviews/"+id;

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

});
</script>
@endpush
