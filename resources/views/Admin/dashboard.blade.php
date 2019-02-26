@extends('Admin.layouts.index')

@section('content')
@if(Auth::user()->role=="admin")
<div class="main-container">
	<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
		<div class="row clearfix progress-box">
			<div class="col-lg-4 col-md-6 col-sm-12 mb-30">
				<div class="bg-white pd-20 box-shadow border-radius-5 height-100-p">
					<div class="project-info clearfix">
						<div class="project-info-left">
							<div class="icon box-shadow bg-blue text-white">
								<i class="fa fa-briefcase"></i>
							</div>
						</div>
						<div class="project-info-right">
							<span class="no text-blue weight-500 font-24">{!!  App\User::count() !!}</span>
							<p class="weight-400 font-18">Users</p>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-6 col-sm-12 mb-30">
				<div class="bg-white pd-20 box-shadow border-radius-5 height-100-p">
					<div class="project-info clearfix">
						<div class="project-info-left">
							<div class="icon box-shadow bg-light-green text-white">
								<i class="fa fa-handshake-o"></i>
							</div>
						</div>
						<div class="project-info-right">
							<span class="no text-light-green weight-500 font-24">{!! App\Project::count() !!}</span>
							<p class="weight-400 font-18">Projects</p>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-6 col-sm-12 mb-30">
				<div class="bg-white pd-20 box-shadow border-radius-5 height-100-p">
					<div class="project-info clearfix">
						<div class="project-info-left">
							<div class="icon box-shadow bg-light-orange text-white">
								<i class="fa fa-list-alt"></i>
							</div>
						</div>
						<div class="project-info-right">
							<span class="no text-light-orange weight-500 font-24">{!! App\Client::count() !!}</span>
							<p class="weight-400 font-18">Clients</p>
						</div>
					</div>
				</div>
			</div>
		</div>


		<div class="bg-white pd-20 box-shadow border-radius-5 mb-30">
			<div class="bg-white pd-20 box-shadow border-radius-5 height-100-p">
				<div id="chart4"></div>
			</div>
		</div>

	</div>
</div>	
@else
<div class="main-container">
	<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
		<div class="row clearfix progress-box">
			<div class="col-lg-4 col-md-6 col-sm-12 mb-30">
				<div class="bg-white pd-20 box-shadow border-radius-5 height-100-p">
					<div class="project-info clearfix">
						<div class="project-info-left">
							<div class="icon box-shadow bg-blue text-white">
								<i class="fa fa-briefcase"></i>
							</div>
						</div>
						<div class="project-info-right">
							<span class="no text-blue weight-500 font-24">{!! App\Blog::where('user_id',Auth::user()->id)->count() !!}</span>
							<p class="weight-400 font-18">Blogs</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>	
	@endif
	@endsection

	@section('script')
	<script src="src/plugins/highcharts-6.0.7/code/highcharts.js"></script>
	<script src="https://code.highcharts.com/highcharts-3d.js"></script>
	<script src="src/plugins/highcharts-6.0.7/code/highcharts-more.js"></script>
	<script type="text/javascript">
		$('document').ready(function(){
			Highcharts.chart('chart4', {
				chart: {
					type: 'column'
				},
				title: {
					text: 'Monthly Users Count'
				},
				subtitle: {
					text: 'Source: WorldClimate.com'
				},
				xAxis: {
					categories: [
					'Jan',
					'Feb',
					'Mar',
					'Apr',
					'May',
					'Jun',
					'Jul',
					'Aug',
					'Sep',
					'Oct',
					'Nov',
					'Dec'
					],
					crosshair: true
				},
				yAxis: {
					min: 0,
					title: {
						text: 'No of Users'
					}
				},
				tooltip: {
					headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
					pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
					'<td style="padding:0"><b>{point.y:.1f}user</b></td></tr>',
					footerFormat: '</table>',
					shared: true,
					useHTML: true
				},
				plotOptions: {
					column: {
						pointPadding: 0.2,
						borderWidth: 0
					}
				},
				series: {!! $data !!}
			});
		});
	</script>
<!-- <script>
	$('document').ready(function(){

		Highcharts.chart('chart5', {
			title: {
				text: 'Pie point CSS'
			},
			xAxis: {
				categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
			},
			series: [{
				type: 'pie',
				allowPointSelect: true,
				keys: ['name', 'y', 'selected', 'sliced'],
				data: [
				['January', 8.33, false],
				['February', 8.33, false],
				['March', 8.33, false],
				['April', 8.33, false],
				['May', 8.33, false],
				['June', 8.33, false],
				['July', 8.33, false],
				['August', 8.33, false],
				['sep', 8.33, false],
				['Octomber', 8.33, false],
				['Nov', 8.33, false],
				['Dec', 8.33, false]
				],
				showInLegend: true
			}]
		});

	});
</script> -->
@endsection