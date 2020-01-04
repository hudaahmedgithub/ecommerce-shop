@extends('backend.layouts.base')

@section('nav-title')
{{ __('public.users_trashed_title') }}
@endsection

@section('page-title')
{{ __('public.users_trashed_title') }}
@endsection

@section('content')
<div id="wrapper">
    <div class="main-content">
        <div class="row small-spacing">
            <!-- /.col-lg-6 col-xs-12 -->
            <div class="col-lg-12 col-xs-12">
                <div class="box-content">

                    <div class="clearfix">
                        <h4 class="box-title" style="display: inline">{{ __('public.users_trashed_title') }}</h4>
                        <!-- /.box-title -->
                    </div>

                    <div class="table-responsive table-purchases">
                        <table class="table table-striped margin-bottom-10">
                            <thead>
                                <tr>
                                    <th style="width: 5%">#</th>
                                    <th>{{ __('public.user.image') }}</th>
                                    <th>{{ __('public.user.name') }}</th>
                                    <th>{{ __('public.user.email') }}</th>
                                    <th>{{ __('public.user.controls') }}</th>
                                </tr>
                            </thead>
                            <tbody>

                                @if($users->count() > 0)
                                @php $i = 1; @endphp

                                @foreach($users as $user)

                                <tr>
                                    <td>{{ $i }}</td>
                                    <td><img class="avatar" src="{{ url('assets/images/avatar-sm-1.jpg') }}" alt=""></td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        <div class="clearfix">
                                            <form class="pull-right" method="POST" action="{{ route('admin.users.force', ['id' => $user->id]) }}">
                                                @csrf
                                                <button class="btn btn-xs btn-danger p-0"><i class="mdi mdi-delete"></i></button>
                                            </form>
                                            <form class="pull-right" method="POST" action="{{ route('admin.users.restore', ['id' => $user->id]) }}">
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
                                    <td colspan="5" class="alert alert-danger p-3">{{ __('public.no_users_registered') }}</td>
                                </tr>
                                @endif

                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="5">{{ $users->links() }}</td>
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