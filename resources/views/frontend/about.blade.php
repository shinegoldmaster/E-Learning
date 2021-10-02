
  @extends('layouts/front-layout')
  @section('frontend-content')   
	<section id="content">

		<section class="home-about _v2 _about"> <!--===== Start About Section ======-->
			<div class="container">
				<div class="row">


					<div class="col-md-6 col-md-offset-3 col-sm-2 col-sm-offset-2 col-xs-12">
						<div class="view overlay">
							<img src="{{ asset('images/about/about-img.jpg') }}" class="img-responsive" alt="">
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<label for="heading" class="label">{{trans('frontend.Maqraa_ALHARAMEEN')}}</label>
							<p>{{trans('frontend.about_us_des1')}}</p>
							<p>
								{{trans('frontend.about_us_des2')}}
							</p>
						</div>
					</div>
				</div>
			</div>
		</section><!--===== End About Section ======-->
		<div class="manager _v2">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="section-title _v2">
							<h3>{{trans('frontend.General_Superviso_Maqraa')}}</h3>
						</div>
						<div class="row">
							<div class="col-md-12 col-xs-12">
								<div class="manager-img">
									<img src="{{ asset('images/homepage/home_page_face.JPG') }}" class="img-responsive img-circle" alt="">
									<h4>{{trans('frontend.Prof_Abdul_Rahman_AlSudais')}}</h4>
									<label for="">{{trans('frontend.His_Excellency_the_President')}}</label>

								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="section-title _v2">
							<h3>{{trans('frontend.The_Executing_Agency')}}</h3>
						</div>
						<div class="management">
							<img src="{{ asset('images/homepage/home_page_logo.png') }}" class="img-responsive" alt="">
							<h4>{{trans('frontend.Department_affairs_Qurans_books')}}</h4>
						</div>
					</div>

				</div>
			</div>
		</div>
		
		<!--===== Start Sample Video ======-->
		<div class="simpe-video _v2">
			<div class="container">
				<div class="section-title">
					<h3>{{trans('frontend.Simplification_Video')}}<a href="https://www.youtube.com/embed/gROkQeFJj94" class="lightbox"><i class="fa fa-play"></i></a> {{trans('frontend.For_Al_Maqraa')}}</h3>
				</div>
			</div>
		</div>
		<!--===== End Sample Video ======-->
		
		<!--==== Start Charts Section =====-->
		<section class="charts-apps _v2">
			<div class="container">
				<div class="section-title _v2">
					<h3>{{trans('frontend.Statics')}}</h3>
				</div>
				<div class="row chart-box-v2" >
					<div class="col-md-3 col-sm-6 col-xs-12">
						<div class="chart-box">
							<i class="fa fa-mortar-board"></i>
							<h4>{{trans('frontend.Students_Count')}}</h4>
							<h5>{{$studentCount}}</h5>
						</div>
					</div>
					<div class="col-md-3 col-sm-6 col-xs-12">
						<div class="chart-box">
							<i class="fa fa-flag"></i>
							<h4>{{trans('frontend.Country_Count')}}</h4>
							<h5>{{$countryCount[0]->total}}</h5>
						</div>
					</div>
					<div class="col-md-3 col-sm-6 col-xs-12">
						<div class="chart-box">
							<i class="fa fa-microphone"></i>
							<h4>{{trans('frontend.Programs_Count')}}</h4>
							<h5>{{$programCount}}</h5>
						</div>
					</div>
					<div class="col-md-3 col-sm-6 col-xs-12">
						<div class="chart-box">
							<i class="fa fa-clock-o"></i>
							<h4>{{trans('frontend.Appointments_Count')}}</h4>
							<h5>{{$appointmentCount}}</h5>
						</div>
					</div>
				</div>
				<div class="row margin-top-30 text-center">
					<div class="col-md-12 more-charts">
						<a href="/stats/" class="btn bg-info waves-effect btn-blue btn-round">{{trans('frontend.more_stats')}}</a>
					</div>
				</div>
			</div>
		</section>
		
		
		
	</section>	
	
  @stop  
	