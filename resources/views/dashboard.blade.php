@extends("layouts.app")

		@section("wrapper")
		<div class="page-wrapper">
			<div class="page-content">
				<div class="row row-cols-1 row-cols-lg-4">
					<div class="col">
						<div class="card radius-10 overflow-hidden bg-gradient-cosmic">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<p class="mb-0 text-white">Total Users</p>
										<h5 class="mb-0 text-white">{{$users_records}}</h5>
									</div>
									<div class="ms-auto text-white"><i class='bx bx-user font-30'></i>
									</div>
								</div>
								<div class="progress bg-white-2 radius-10 mt-4" style="height:4.5px;">
									<div class="progress-bar bg-white" role="progressbar" style="width: 46%"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="col">
						<div class="card radius-10 overflow-hidden bg-gradient-burning">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<p class="mb-0 text-white">Total Income</p>
										<h5 class="mb-0 text-white"></h5>
									</div>
									<div class="ms-auto text-white"><i class='bx bx-wallet font-30'></i>
									</div>
								</div>
								<div class="progress bg-white-2 radius-10 mt-4" style="height:4.5px;">
									<div class="progress-bar bg-white" role="progressbar" style="width: 72%"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="col">
						<div class="card radius-10 overflow-hidden bg-gradient-Ohhappiness">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<p class="mb-0 text-white">Total Oders</p>
										<h5 class="mb-0 text-white"></h5>
									</div>
									<div class="ms-auto text-white"><i class='bx bx-bulb font-30'></i>
									</div>
								</div>
								<div class="progress bg-white-2 radius-10 mt-4" style="height:4.5px;">
									<div class="progress-bar bg-white" role="progressbar" style="width: 68%"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="col">
						<div class="card radius-10 overflow-hidden bg-gradient-moonlit">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<p class="mb-0 text-white">Comments</p>
										<h5 class="mb-0 text-white"></h5>
									</div>
									<div class="ms-auto text-white"><i class='bx bx-chat font-30'></i>
									</div>
								</div>
								<div class="progress  bg-white-2 radius-10 mt-4" style="height:4.5px;">
									<div class="progress-bar bg-white" role="progressbar" style="width: 66%"></div>
								</div>
							</div>
						</div>
					</div>
				</div><!--end row-->
				
				
			
				
			</div>
		</div>
		@endsection
		
	@section("script")
	<script src="assets/plugins/apexcharts-bundle/js/apexcharts.min.js"></script>
	<script src="assets/js/index3.js"></script>
	<script>
		new PerfectScrollbar('.best-selling-products');
		new PerfectScrollbar('.recent-reviews');
		new PerfectScrollbar('.support-list');
	</script>
	<script>
		$("html").attr("class","color-sidebar sidebarcolor3 color-header headercolor1");
	</script>
	@endsection