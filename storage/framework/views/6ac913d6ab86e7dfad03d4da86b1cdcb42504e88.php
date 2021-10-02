  
  <?php $__env->startSection('student-dashboard'); ?>        
	     
					
<section class="profile">
    <div class="container">
        <div class="section-title">
            <h3><?php echo e(trans('student.Student_Dashboard')); ?></h3>
        </div>
		<?php if($errors->any()): ?>							
		<section class="widget-title">
			<div class="alert alert-success">
				<p class="text-center">
					<?php echo e($errors->first()); ?>								
				</p>
			</div>
		</section>						
		<?php endif; ?>
        <div class="row">
            <!-- sub-main -->
            <div class="col-md-3 col-sm-12">				
				<?php echo $__env->make('student.student-leftmenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>	
			</div>
			
			
			<div class="col-md-9 col-sm-9 col-xs-12">
                <div class="student-section-content card hoverable">
                    <div class="tab-content">
                        <!-- Page Content-->
                        
						<!--===== Start Instructors-list ======-->
						<section class="features inner">
							
							<div class="section-title bg-blue">
								<?php $__currentLoopData = $instructorInfo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $info): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<h3>Available appointments for instructor <?php echo e($info->name); ?> at <?php echo e($info->group_name); ?></h3>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</div>

							<div class="row">
								<div class="col-md-12 col-sm-12">
									<ul class="list-unstyled no-margin no-padding">
										<?php $__currentLoopData = $avaliableappointments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<li class="time-item col-md-6 col-sm-3 col-xs-12">
											<div class="media hoverable">
												<div class="media-left">
													<i class="fa fa-microphone media-object"></i>
												</div>
												<div class="media-body">
													<h4><?php echo e($data->session_title); ?> </h4>
													<p><i class="fa fa-clock-o"></i><?php echo e($data->session_time); ?></p>
													<form method="POST" action="/student/join" accept-charset="UTF-8">
														<?php echo e(csrf_field()); ?>

														<input name="appointmentId" value="<?php echo e($data->id); ?>" type="hidden">			
														<button type="submit" class="btn btn-xs btn-blue pull-right"><?php echo e(trans('student.join_now')); ?></button>
													</form>
																						</div>
											</div>
										</li>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									</ul>

								</div>
							</div>
						</section>
					</div>
				</div>
			</div>
			<div class="text-center">
			<?php echo e($avaliableappointments->links()); ?>

			</div>
		</div>
		
    </div>
</section>
	
	
  <?php $__env->stopSection(); ?>  
	
<?php echo $__env->make('layouts/student-dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>