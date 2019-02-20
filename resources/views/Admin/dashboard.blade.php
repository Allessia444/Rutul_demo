@extends('Admin.layouts.index')
@section('content')
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
				<h4 class="mb-30">Pie Chart</h4>
				<div class="row">
					<div class="col-sm-12 col-md-8 col-lg-9 xs-mb-20">
							<div id="chart5"></div>
					</div>
					<div class="col-sm-12 col-md-4 col-lg-3">
						<h5 class="mb-30 weight-500">Top Campaign Performance</h5>
						<div class="mb-30">
							<p class="mb-5 font-18">John Campaign</p>
							<div class="progress border-radius-0" style="height: 10px;">
								<div class="progress-bar bg-orange" role="progressbar" style="width: 40%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
							</div>
						</div>
						<div class="mb-30">
							<p class="mb-5 font-18">Jane Campaign</p>
							<div class="progress border-radius-0" style="height: 10px;">
								<div class="progress-bar bg-light-orange" role="progressbar" style="width: 50%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
							</div>
						</div>
						<div class="mb-30">
							<p class="mb-5 font-18">Johnny Campaign</p>
							<div class="progress border-radius-0" style="height: 10px;">
								<div class="progress-bar bg-light-purple" role="progressbar" style="width: 70%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
							</div>
						</div>
						<div class="mb-30 font-18">
							<p class="mb-5">Daniel Campaign</p>
							<div class="progress border-radius-0" style="height: 10px;">
								<div class="progress-bar bg-light-green" role="progressbar" style="width: 80%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
			

		</div>
	</div>	
@endsection
@section('script')
<script src="src/plugins/highcharts-6.0.7/code/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-3d.js"></script>
<script src="src/plugins/highcharts-6.0.7/code/highcharts-more.js"></script>
<script>
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
</script>
@endsection