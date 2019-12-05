@extends('backend.layouts.base')

@section('nav-title')
{{ __('public.admins_trashed_title') }}
@endsection

@section('page-title')
{{ __('public.admins_trashed_title') }}
@endsection

@section('content')
<div id="wrapper">
    <div class="main-content">
        <div class="row small-spacing">
            <!-- /.col-lg-6 col-xs-12 -->
            <div class="col-lg-12 col-xs-12">
                <div class="box-content">

                    <div class="clearfix">
                        <h4 class="box-title" style="display: inline">{{ __('public.admins_trashed_title') }}</h4>
                        <!-- /.box-title -->
                    </div>

                    <div class="table-responsive table-purchases">
                        <table class="table table-striped margin-bottom-10">
                            <thead>
                                <tr>
                                    <th style="width: 5%">#</th>
                                    <th>{{ __('public.admin.image') }}</th>
                                    <th>{{ __('public.admin.name') }}</th>
                                    <th>{{ __('public.admin.email') }}</th>
                                    <th>{{ __('public.admin.controls') }}</th>
                                </tr>
                            </thead>
                            <tbody>

                                @if($admins->count() > 0)
                                @php $i = 1; @endphp

                                @foreach($admins as $admin)

                                <tr>
                                    <td>{{ $i }}</td>
                                    <td><img class="avatar" src="{{ url('assets/images/avatar-sm-1.jpg') }}" alt=""></td>
                                    <td>{{ $admin->name }}</td>
                                    <td>{{ $admin->email }}</td>
                                    <td>
                                        <div class="clearfix">
                                            <form class="pull-right" method="POST" action="{{ route('admin.admins.force', ['id' => $admin->id]) }}">
                                                @csrf
                                                <button class="btn btn-xs btn-danger p-0"><i class="mdi mdi-delete"></i></button>
                                            </form>
                                            <form class="pull-right" method="POST" action="{{ route('admin.admins.restore', ['id' => $admin->id]) }}">
                                                @csrf
                                                <button class="btn btn-xs btn-success p-0"><i class="mdi mdi-backup-restore"></i></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>

                                @php $i++; @endphp

                                @endforeach
                                @else
                                <tr>
                                    <td colspan="5" class="alert alert-danger p-3">{{ __('public.no_admins_registered') }}</td>
                                </tr>
                                @endif

                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="5">{{ $admins->links() }}</td>
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