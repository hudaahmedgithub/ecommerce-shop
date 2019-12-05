@extends('backend.layouts.base')

@section('page-title')
الصفحة الرئيسية
@endsection

@section('content')
<div id="wrapper">
	<div class="main-content">
		<div class="row" style="margin-bottom: 20px">
		
			<div class="col-md-6">
				<!-- Product & Order & Category Analytics -->
				<canvas id="productElementsChart"></canvas>
			</div>

			<div class="col-md-6">
				<!-- Admins & Users & Contacts Analytics -->
				<canvas id="userAnalyticsChart"></canvas>
			</div>

		</div>

		<div class="row small-spacing">
			<div class="col-lg-3 col-md-6 col-xs-12">
				<div class="box-content bg-success text-white">
					<div class="statistics-box with-icon">
						<i class="ico small menu-icon mdi mdi-ticket"></i>
						<p class="text text-white">Coupons</p>
						<h2 class="counter">{{ get_count('coupons') }}</h2>
					</div>
				</div>
				<!-- /.box-content -->
			</div>
			<!-- /.col-lg-3 col-md-6 col-xs-12 -->
			<div class="col-lg-3 col-md-6 col-xs-12">
				<div class="box-content bg-info text-white">
					<div class="statistics-box with-icon">
						<i class="ico small fa fa-usd"></i>
						<p class="text text-white">Currencies</p>
						<h2 class="counter">{{ get_count('currencies') }}</h2>
					</div>
				</div>
				<!-- /.box-content -->
			</div>
			<!-- /.col-lg-3 col-md-6 col-xs-12 -->
			<div class="col-lg-3 col-md-6 col-xs-12">
				<div class="box-content bg-danger text-white">
					<div class="statistics-box with-icon">
                        <i class="ico small fa fa-globe"></i>
						<p class="text text-white">Countries</p>
						<h2 class="counter">{{ get_count('countries') }}</h2>
					</div>
				</div>
				<!-- /.box-content -->
			</div>
			<!-- /.col-lg-3 col-md-6 col-xs-12 -->
			<div class="col-lg-3 col-md-6 col-xs-12">
				<div class="box-content bg-warning text-white">
					<div class="statistics-box with-icon">
						<i class="ico small menu-icon mdi mdi-message-text"></i>
						<p class="text text-white">Reviews</p>
						<h2 class="counter">{{ get_count('reviews') }}</h2>
					</div>
				</div>
				<!-- /.box-content -->
			</div>
			<!-- /.col-lg-3 col-md-6 col-xs-12 -->
		</div>
		<!-- .row -->

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
    var ctxproductElements = document.getElementById('productElementsChart').getContext('2d');
	var labels = ["Categories", "Products", "Orders"];
	var datasets_label = "Product Analytics";
	var bgColor = ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"];
	var title = 'احصائيات الاصناف والمنتجات والطلبات';
	var data = [{{ get_count('categories') }}, {{ get_count('products') }}, {{ get_count('reservations') }}];
	sam.loadDoughnutChart(ctxproductElements, labels, data, datasets_label, bgColor, title);

	var ctxuserAnalyticsChart = document.getElementById('userAnalyticsChart').getContext('2d');
	var labels = ["Admins", "Users"];
	var datasets_label = "User Analytics";
	var bgColor = ["#8e5ea2","#3cba9f"];
	var title = 'اعداد المسئولين والمستخدمين';
	var data = [{{ get_count('admins') }}, {{ get_count('users') }}];
	sam.loadDoughnutChart(ctxuserAnalyticsChart, labels, data, datasets_label, bgColor, title);

</script>
@endpush

@push('style')
<style>
.custom-icon {
    font-size: 50px;
    color: grey;
    position: absolute;
    top: 30px;
    left: 10px;
}
</style>
@endpush
