  
  <?php $__env->startSection('frontend-content'); ?>     
	<link href="<?php echo e(asset('css/main1.css')); ?>" rel="stylesheet">	
	
	<section class="features inner">
		<div class="container">
			<div class="section-title _v2">
				<h3><?php echo e(trans('frontend.help_page')); ?></h3>
				<p><?php echo e(trans('frontend.Maqraa_easy_handle_improve_reading')); ?><br>
					<?php echo e(trans('frontend.Al_Maqraa_working_Saturday')); ?></p>
			</div>
		</div>

		<div class="row">

			<section class="">
				<div class="container">
					<div class="block text-center">
					
						<div class="section-title _v2">
					        	<h3><?php echo e(trans('frontend.First_Register_in_Al_Maqraa')); ?></h3>
				        	</div>
						<ul class="help-list">
							<li>
								<p><strong><?php echo e(trans('frontend.help1_1')); ?></strong></p>
								<span class="arrow"></span>
								<figure class="img-container"><img src="<?php echo e(asset('images/help/shot1.png')); ?>" alt=""></figure>
							</li>
							<li>
								<p><strong><?php echo e(trans('frontend.help1_2')); ?></strong></p>
								<span class="arrow"></span>
								<figure class="img-container"><img src="<?php echo e(asset('images/help/shot2.png')); ?>" alt=""></figure>
							</li>
							<li>
								<p><strong><?php echo e(trans('frontend.help1_3')); ?></strong></p>
							</li>
						</ul>

						
						<div class="section-title _v2">
					        	<h3><?php echo e(trans('frontend.Second_Book_appointment')); ?></h3>
				        	</div>
				        	
						<ul class="help-list">
							<li>
								<p><strong><?php echo e(trans('frontend.help2_1')); ?></strong></p>
								<figure class="img-container"><img src="<?php echo e(asset('images/help/shot3.png')); ?>" alt=""></figure>
							</li>
							<li>
								<p><strong><?php echo e(trans('frontend.help2_2')); ?></strong></p>
								<figure class="img-container"><img src="<?php echo e(asset('images/help/shot4.png')); ?>" alt=""></figure>
							</li>
							<li>
								<p><strong><?php echo e(trans('frontend.help2_3')); ?></strong></p>
								<figure class="img-container"><img src="<?php echo e(asset('images/help/shot5.png')); ?>" alt=""></figure>
							</li>
							<li>
								<p><strong><?php echo e(trans('frontend.help2_4')); ?></strong></p>
								<figure class="img-container"><img src="<?php echo e(asset('images/help/shot6.png')); ?>" alt=""></figure>
							</li>
						</ul>
						


						
						
						<div class="section-title _v2">
					        	<h3><?php echo e(trans('frontend.Third_recitation')); ?></h3>
				        	</div>
						
						<ul class="help-list">
							<li>
								<p><strong><?php echo e(trans('frontend.help3_1')); ?></strong></p>
								<figure class="img-container"><img src="<?php echo e(asset('images/help/shot7.png')); ?>" alt=""></figure>
							</li>
							<li>
								<p><strong><?php echo e(trans('frontend.help3_2')); ?></strong></p>
								<figure class="img-container plus-space"><img src="<?php echo e(asset('images/help/shot8.png')); ?>" alt=""></figure>

								<p><strong><?php echo e(trans('frontend.help3_3')); ?></strong></p>
								<figure class="img-container plus-space"><img src="<?php echo e(asset('images/help/shot9.png')); ?>" alt=""></figure>

                                <p><strong>٤- التأكد من سماحية الميكرفون للمتصفح</strong></p>
								<figure class="img-container plus-space"><img src="<?php echo e(asset('images/help/shot10.png')); ?>" alt=""></figure>

                                <div class="alert alert-danger" style="max-width: 770px; width: 100%; margin-left: auto; margin-right: auto;">
                                    <p><strong class="icon-left"><?php echo e(trans('frontend.Important_note')); ?></strong><?php echo e(trans('frontend.You_stay_receive_instructor_calls')); ?></p>
								</div>
                            </li>
						</ul>
					</div>
				</div>
			</section>
			
		</div>
	</section>
	
  <?php $__env->stopSection(); ?>  
	
<?php echo $__env->make('layouts/front-layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>