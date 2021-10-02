  
  <?php $__env->startSection('frontend-content'); ?>    

  
  <section id="content">
        <!--===== Start Instructors-list ======-->
	<section class="features inner instructors">
		<div class="container">
			<div class="section-title">
				<h3>List appointments</h3>
				<?php $__currentLoopData = $instructorInfo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $info): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<p>Available appointments for instructor <?php echo e($info->name); ?> at <?php echo e($info->group_name); ?></p>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</div>

			<div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="tab-content card-panel">
                        <ul class="list-unstyled no-margin no-padding">
                            <?php $__currentLoopData = $avaliableappointments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<li class="time-item col-md-4 col-sm-6 col-xs-12">
                                <div class="media hoverable">
                                    <div class="media-left">
                                       <i class="fa fa-microphone media-object"></i>
                                    </div>
                                    <div class="media-body">
                                        <h4><?php echo e($data->session_title); ?></h4>
                                        <p><i class="fa fa-clock-o"></i><?php echo e($data->session_time); ?></p>	
										
										<form method="POST" action="/student/join" accept-charset="UTF-8">
											<?php echo e(csrf_field()); ?>

											<input name="appointmentId" value="<?php echo e($data->id); ?>" type="hidden">
                                             <?php if(Auth::check()): ?>               
												<button type="submit" class="btn btn-xs btn-warning pull-right">join now</button>
											<?php else: ?>
												<button type="submit" class="btn btn-xs btn-warning pull-right" disabled>join now</button>
											<?php endif; ?>
                                        </form>                    
									</div>
                                </div>
							</li>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					    </ul>
					</div>
				</div>
			</div>
		</div>
    
    <div class="text-center"> 
	</div>
    
	</section>
</section>
	
  <?php $__env->stopSection(); ?>  
	
<?php echo $__env->make('layouts/front-layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>