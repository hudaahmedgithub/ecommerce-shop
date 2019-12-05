@extends('backend.layouts.base')

@section('nav-title')
{{ __('public.reservations_title') }}
@endsection

@section('page-title')
{{ __('public.reservations_title') }}
@endsection

@section('content')

<div id="wrapper">
	<div class="main-content">
		<div class="row" style="margin-bottom: 20px">
		
			<div class="col-sm-12">
				<!-- Product & Order & Category Analytics -->
				<canvas id="orderChart"></canvas>
			</div>

		</div>

		<!-- /.row -->
		<footer class="footer">
			<ul class="list-inline">
				<li>2016 © NinjaAdmin.</li>
				<li><a href="#">Privacy</a></li>
				<li><a href="#">Terms</a></li>
				<li><a href="#">Help</a></li>
			</ul>
		</footer>
	</div>
	<!-- /.main-content -->
</div><!--/#wrapper -->

@endsection

@push('script')
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<script src="{{ asset('js/sam.js') }}"></script>

<script>
    var ctx = document.getElementById('orderChart').getContext('2d');
    var labels = [
        '0',
        'January',
        'February',
        'March',
        'April',
        'May',
        'June',
        'July',
        'August',
        'September',
        'October',
        'November',
        'December',
    ];

    var datasets = [
        { // For all orders
            fill: false,
            label: 'All Orders',
            data: sam.fillTheMissedMonthes({!! $orders !!}, true),
            backgroundColor: 'rgb(255, 99, 132)',
            borderColor: 'rgb(255, 99, 132)',
            borderWidth: 3
        },
        { // for pending orders
            fill: false,
            label: 'Pending Orders',
            data: sam.fillTheMissedMonthes({!! $pending !!}, true),
            backgroundColor: 'rgb(54, 162, 235)',
            borderColor: 'rgb(54, 162, 235)',
            borderWidth: 3
        },
        { // for scheduled orders
            fill: false,
            label: 'Scheduled Orders',
            data: sam.fillTheMissedMonthes({!! $scheduled !!}, true),
            backgroundColor: 'rgb(255, 205, 86)',
            borderColor: 'rgb(255, 205, 86)',
            borderWidth: 3
        },
        { // for success orders
            fill: false,
            label: 'Success Orders',
            data: sam.fillTheMissedMonthes({!! $success !!}, true),
            backgroundColor: 'rgb(75, 192, 192)',
            borderColor: 'rgb(75, 192, 192)',
            borderWidth: 3
        }
    ];

    var title = 'Count of Orders per Month';

    sam.loadMultiLineChart(ctx, labels, datasets, title);

</script>
@endpush