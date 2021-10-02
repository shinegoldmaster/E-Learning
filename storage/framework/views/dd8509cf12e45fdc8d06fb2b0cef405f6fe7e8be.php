

  
  <?php $__env->startSection('student-dashboard'); ?>        
	     
					
<section class="profile">
    <div class="container">
        <div class="section-title">
            <h3><?php echo e(trans('student.Student_Dashboard')); ?></h3>
        </div>

        <div class="row">
            <!-- sub-main -->
            <div class="col-md-3 col-sm-12">				
				<?php echo $__env->make('student.student-leftmenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>	
			</div>
			
			
			<div class="col-md-9 col-sm-9 col-xs-12">
                <div class="student-section-content card hoverable">

                    <div class="tab-content">
                        <!-- Page Content-->                        
						<div id="section-1" class="features inner _v2">
							<div class="section-title bg-blue">
								<h3><?php echo e(trans('student.instructor')); ?></h3>
							</div>
							<ul class="list-unstyled no-margin no-padding">							
								<?php $__currentLoopData = $instructorAppointData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								
								
								<li class="col-md-4 col-sm-6 col-xs-12">
								<?php if($data->group_id == '1'): ?>
									<div class="card hoverable bg-warning padding-20">
								<?php else: ?>
									<div class="card hoverable bg-danger padding-20">
								<?php endif; ?>
									<?php $img_url = 'images/icon/'.$data->group_icon; ?>
									<img src="<?php echo e(asset($img_url)); ?>" class="img-responsive" alt="">
									
									<h4><?php echo e($data->name); ?></h4>
									
									<?php if($data->group_lang_id == '1'): ?>
										<label class="text-warning"><?php echo e(trans('student.Language')); ?>: English</label>
									<?php else: ?>
										<label class="text-warning"><?php echo e(trans('student.Language')); ?>: العربية</label>
									<?php endif; ?>
									

									<?php if($data->total): ?>
										<span><?php echo e(trans('student.available_sessions')); ?> :<?php echo e($data->total); ?></span>
										<p><?php echo e($data->group_des); ?></p>
										<?php if($data->group_id == 1): ?>
											<a href="/student/appointments/<?php echo e($data->id); ?>/"  class="btn btn-warning btn-border-warning btn-round" style="width: 40%"><?php echo e(trans('student.available_sessions')); ?></a>
										<?php elseif($data->group_id == 2): ?>
											<a href="/student/appointments/<?php echo e($data->id); ?>/"  class="btn btn-danger btn-border-danger btn-round" style="width: 40%"><?php echo e(trans('student.available_sessions')); ?></a>
										<?php else: ?>
											<a href="/student/appointments/<?php echo e($data->id); ?>/"  class="btn btn-blue btn-border-blue btn-round" style="width: 40%"><?php echo e(trans('student.available_sessions')); ?></a>
										<?php endif; ?>

										
									<?php else: ?>
										<span><?php echo e(trans('student.available_sessions')); ?> :0</span>
										<p><?php echo e($data->group_des); ?></p>
										<?php if($data->group_id == 1): ?>
											<a href="#" onclick="return false" disabled class="btn btn-warning btn-border-warning btn-round" style="width: 40%"><?php echo e(trans('student.available_sessions')); ?></a>
										<?php elseif($data->group_id == 2): ?>
											<a href="#" onclick="return false" disabled class="btn btn-danger btn-border-danger btn-round" style="width: 40%"><?php echo e(trans('student.available_sessions')); ?></a>
										<?php else: ?>
											<a href="#" onclick="return false" disabled class="btn btn-blue btn-border-blue btn-round" style="width: 40%"><?php echo e(trans('student.available_sessions')); ?></a>
										<?php endif; ?>

										
									<?php endif; ?>
									</div>

								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>				
							</ul>
						</div>
                    </div>
                </div>
            </div>          
        </div>
    </div>
</section>
	
	
  <?php $__env->stopSection(); ?>  
	
<?php echo $__env->make('layouts/student-dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>