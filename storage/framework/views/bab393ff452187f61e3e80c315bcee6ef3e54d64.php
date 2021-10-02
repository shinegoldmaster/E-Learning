  
  <?php $__env->startSection('frontend-content'); ?>      					
	
	<script src="<?php echo e(asset('js/jssor.slider-25.0.7.min.js')); ?>" type="text/javascript"></script>		
	<script type="text/javascript">
			jQuery(document).ready(function ($) {

			   var jssor_1_options = {
				  $AutoPlay: 1,
				  $SlideWidth: 640,
                  $Cols: 2,
				  $Align: 170,
				  $ArrowNavigatorOptions: {
					$Class: $JssorArrowNavigator$
				  },
				  $BulletNavigatorOptions: {
					$Class: $JssorBulletNavigator$
				  }
				};

				var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

				/*#region responsive code begin*/
				/*remove responsive code if you don't want the slider scales while window resizing*/
				function ScaleSlider() {
					var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
					if (refSize) {
						//refSize = Math.min(refSize, 980);
						jssor_1_slider.$ScaleWidth(refSize);
					}
					else {
						window.setTimeout(ScaleSlider, 30);
					}
				}
				ScaleSlider();
				$(window).bind("load", ScaleSlider);
				$(window).bind("resize", ScaleSlider);
				$(window).bind("orientationchange", ScaleSlider);
				/*#endregion responsive code end*/



			});
		</script>
	<!-- start content -->
	<section id="content">       
		<!--===== Start About Section ======-->
		<section class="home-about _v2 rlt">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-sm-6 col-xs-12 <?php if(config('app.locale')  != 'en'): ?> pull-right <?php endif; ?>">
						<div class="view overlay">
							<img src="<?php echo e(asset('images/homepage/about-img.jpg')); ?>" class="img-responsive" alt="" width="767" height="400">
						</div>
					</div>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<label for="heading" class="label"><?php echo e(trans('frontend.Maqraa_ALHARAMEEN')); ?></label>
						<p><?php echo e(trans('frontend.about_us_des1')); ?></p>
						<p>
							<?php echo e(trans('frontend.about_us_des2')); ?>

						</p>
						<a href="/about" class="btn waves-effect waves-light btn-round"><?php echo e(trans('frontend.See_More')); ?></a>
					</div>
				</div>
			</div>
		</section>
		<!--===== End About Section ======-->
		<!--===== Start News Slider ======-->
		<div class="slider-news _v2">
			<div class="container">
				<div class="section-title _v2">
					<h3><?php echo e(trans('frontend.al_maqraa_news')); ?></h3>
				</div>
			</div>

			<div id="jssor_1" style="position:relative;margin:0 auto;top:0px;left:0px;width:980px;height:380px;overflow:hidden;visibility:hidden;">
				<!-- Loading Screen -->
				<div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:980px;height:380px;overflow:hidden;">
					<div>
						<img data-u="image" src="<?php echo e(asset('images/slider/slider1.jpg')); ?>" />
					</div>
					<div>
						<img data-u="image" src="<?php echo e(asset('images/slider/slider2.jpg')); ?>" />
					</div>
					<div>
						<img data-u="image" src="<?php echo e(asset('images/slider/slider3.jpg')); ?>" />
					</div>
					<div>
						<img data-u="image" src="<?php echo e(asset('images/slider/slider4.jpg')); ?>" />
					</div>
					<div>
						<img data-u="image" src="<?php echo e(asset('images/slider/slider5.jpg')); ?>" />
					</div>
				</div>
				<!-- Bullet Navigator -->
				<!--div data-u="navigator" class="jssorb051" style="position:absolute;bottom:12px;right:12px;" data-autocenter="1" data-scale="0.5" data-scale-bottom="0.75">
					<div data-u="prototype" class="i" style="width:16px;height:16px;">
						<svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
							<circle class="b" cx="8000" cy="8000" r="5800"></circle>
						</svg>
					</div>
				</div>
				<!-- Arrow Navigator -->
				<div data-u="arrowleft" class="jssora051" style="width:65px;height:65px;top:0px;left:45px;" data-autocenter="2" data-scale="0.75" data-scale-left="0.75">
					<svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
						<polyline class="a" points="11040,1920 4960,8000 11040,14080 "></polyline>
					</svg>
				</div>
				<div data-u="arrowright" class="jssora051" style="width:65px;height:65px;top:0px;right:45px;" data-autocenter="2" data-scale="0.75" data-scale-right="0.75">
					<svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
						<polyline class="a" points="4960,1920 11040,8000 4960,14080 "></polyline>
					</svg>
				</div>
			</div>

		</div>
		<!--===== End News Slider ======-->

		<div class="manager _v2">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="section-title _v2">
							<h3><?php echo e(trans('frontend.General_Superviso_Maqraa')); ?></h3>
						</div>
						<div class="row">
							<div class="col-md-12 col-xs-12">
								<div class="manager-img">
									<img src="<?php echo e(asset('images/homepage/home_page_face.JPG')); ?>" class="img-responsive img-circle" alt="">
									<h4><?php echo e(trans('frontend.Prof_Abdul_Rahman_AlSudais')); ?></h4>
									<label for=""><?php echo e(trans('frontend.His_Excellency_the_President')); ?></label>

								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="section-title _v2">
							<h3><?php echo e(trans('frontend.The_Executing_Agency')); ?></h3>
						</div>
						<div class="management">
							<img src="<?php echo e(asset('images/homepage/home_page_logo.png')); ?>" class="img-responsive" alt="">
							<h4><?php echo e(trans('frontend.Department_affairs_Qurans_books')); ?></h4>
						</div>
					</div>

				</div>
			</div>
		</div>
		
		<!--==== Start Charts Section =====-->
		<section class="charts-apps _v2">
			<div class="container">
				<div class="section-title _v2">
					<h3><?php echo e(trans('frontend.Statics')); ?></h3>
				</div>
				<div class="row chart-box-v2" >
					<div class="col-md-3 col-sm-6 col-xs-12">
						<div class="chart-box">
							<i class="fa fa-mortar-board"></i>
							<h4><?php echo e(trans('frontend.Students_Count')); ?></h4>
							<h5><?php echo e($studentCount); ?></h5>
						</div>
					</div>
					<div class="col-md-3 col-sm-6 col-xs-12">
						<div class="chart-box">
							<i class="fa fa-flag"></i>
							<h4><?php echo e(trans('frontend.Country_Count')); ?></h4>
							<h5><?php echo e($countryCount[0]->total); ?></h5>
						</div>
					</div>
					<div class="col-md-3 col-sm-6 col-xs-12">
						<div class="chart-box">
							<i class="fa fa-microphone"></i>
							<h4><?php echo e(trans('frontend.Programs_Count')); ?></h4>
							<h5><?php echo e($programCount); ?></h5>
						</div>
					</div>
					<div class="col-md-3 col-sm-6 col-xs-12">
						<div class="chart-box">
							<i class="fa fa-clock-o"></i>
							<h4><?php echo e(trans('frontend.Appointments_Count')); ?></h4>
							<h5><?php echo e($appointmentCount); ?></h5>
						</div>
					</div>
				</div>
				<div class="row margin-top-30 text-center">
					<div class="col-md-12 more-charts">
						<a href="/stats/" class="btn bg-info waves-effect btn-blue btn-round"><?php echo e(trans('frontend.more_stats')); ?></a>
					</div>
				</div>
			</div>
		</section>
		
		<!--===== Start Sample Video ======-->
		<div class="simpe-video _v2">
			<div class="container">
				<div class="section-title">
					<h3><?php echo e(trans('frontend.Simplification_Video')); ?><a href="https://www.youtube.com/embed/gROkQeFJj94" class="lightbox"><i class="fa fa-play"></i></a> <?php echo e(trans('frontend.For_Al_Maqraa')); ?></h3>
				</div>
			</div>
		</div>
		<!--===== End Sample Video ======-->
		
		<!--===== Start Features ======-->
		<section class="features _v2">
			<div class="container">
				
				<div class="row">
					<div class="col-md-4 col-sm-4 col-xs-12">
						<div class="card hoverable bg-info padding-20">
							<img src="<?php echo e(asset('images/homepage/feature-icon-1.png')); ?>" class="img-responsive" alt="" width="50" height="45">
							<h4><?php echo e(trans('frontend.Direct_Instruction')); ?></h4>
							<p><?php echo e(trans('frontend.The_ability_directly_teachers')); ?></p>
						</div>
					</div>
					<div class="col-md-4 col-sm-4 col-xs-12">
						<div class="card hoverable bg-warning padding-20">
							<img src="<?php echo e(asset('images/homepage/feature-icon-2.png')); ?>" class="img-responsive" alt="" width="50" height="45">
							<h4><?php echo e(trans('frontend.Intervuew')); ?></h4>
							<p><?php echo e(trans('frontend.Having_interview_level_learners')); ?></p>
						</div>
					</div>
					<div class="col-md-4 col-sm-4 col-xs-12">
						<div class="card hoverable bg-danger padding-20">
							<img src="<?php echo e(asset('images/homepage/feature-icon-3.png')); ?>" class="img-responsive" alt="" width="50" height="45">
							<h4><?php echo e(trans('frontend.Multi_levels')); ?></h4>
							<p><?php echo e(trans('frontend.There_levels_academic_learners')); ?></p>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!--===== End Features ======-->
		
		<!--===== Start How It Work ======-->
		<section class="how-work _v2 text-center">
			<div class="container">
				<div class="section-title _v2">
					<h3><?php echo e(trans('frontend.How_Al_Maqraa_work')); ?></h3>
				</div>
				<div class="row">
					<div class="col-md-3 col-sm-3 col-xs-12">
						<div class="circle">
							<div class="circle-icon">
								<i class="fa fa-sign-in"></i>
							</div>
							<h4><?php echo e(trans('frontend.First_Register')); ?></h4>
						</div>
					</div>
					<div class="col-md-3 col-sm-3 col-xs-12">
						<div class="circle">
							<div class="circle-icon">
								<i class="fa fa-clock-o"></i>
							</div>
							<h4><?php echo e(trans('frontend.Then_Choose_suitable_dates')); ?></h4>
						</div>
					</div>
					<div class="col-md-3 col-sm-3 col-xs-12">
						<div class="circle">
							<div class="circle-icon">
								<i class="fa fa-volume-up"></i>
							</div>
							<h4><?php echo e(trans('frontend.Listen_Carefuly')); ?></h4>
						</div>
					</div>
					<div class="col-md-3 col-sm-3 col-xs-12">
						<div class="circle">
							<div class="circle-icon last">
								<img src="<?php echo e(asset('images/homepage/user-icon.png')); ?>" class="img-responsive" alt="" width="50" height="88">
							</div>
							<h4><?php echo e(trans('frontend.Repeat_after_Sheikh')); ?></h4>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!--===== End How It Work ======-->
				<section class="times _v2">
			<div class="container">
				<div class="section-title _v2">
					<h3><?php echo e(trans('frontend.Available_Appointments')); ?></h3>
				</div>
				<div class="row">
					<div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-12">
						<ul class="nav nav-tabs tabs-2" data-tabs="tabs">
							<li class="active">
									<a data-toggle="tab" href="#individual_programs">
									<i class="fa fa-user"></i>
									<?php echo e(trans('frontend.individual_programs')); ?>

								</a>
							</li>
							<li>
								<a data-toggle="tab" href="#collective_programs">
									<img src="<?php echo e(asset('images/homepage/people.png')); ?>" class="img-responsive" alt="" width="35" height="35">
									<?php echo e(trans('frontend.collective_programs')); ?>

								</a>
							</li>
						</ul>
					</div>
				</div>

				<div class="row">
					<div class="tab-content">
						<div id="individual_programs" class="tab-pane active">
							<ul class="list-unstyled no-margin no-padding">
							<?php $__currentLoopData = $appointmentData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<li class="col-md-4 col-sm-6 col-xs-12">
									<div class="media hoverable">
										<div class="media-left">
											<i class="fa fa-microphone media-object"></i>
										</div>
										<div class="media-body">
											<h4>
												<a><?php echo e($data->session_title); ?></a>
											 
											</h4>
											<p><i class="fa fa-clock-o"></i><?php echo e($data->session_time); ?></p>											
											<div class="btn-wrapper" data-toggle="tooltip" data-placement="top" title="">
												
													<form method="POST" action="/student/join" accept-charset="UTF-8">
														<?php echo e(csrf_field()); ?>

														<input name="appointmentId" value="<?php echo e($data->id); ?>" type="hidden">
													<?php if(Auth::check()): ?>     	
														<button type="submit" class="btn btn-xs btn-warning "><?php echo e(trans('instructorsshow.join_now')); ?></button>
													<?php else: ?>
														<button type="submit" class="btn btn-xs btn-warning " disabled="disabled"><?php echo e(trans('instructorsshow.join_now')); ?></button>
													<?php endif; ?>
													</form>
												
											</div>
										</div>
									</div>
								</li>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</ul>
						</div>

						<div id="collective_programs" class="tab-pane">
							<ul class="list-unstyled no-margin no-padding">
							</ul>
						</div>

					</div>
				</div>

				<div class="all-time text-center margin-top-25">
					<a href="/program/" class="btn bg-danger btn-round waves-effect"><?php echo e(trans('frontend.all_appointment')); ?></a>
				</div>
				

			</div>
		</section>

			</section>
	<!-- end content -->

	<?php $__env->stopSection(); ?>  
	
<?php echo $__env->make('layouts/front-layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>