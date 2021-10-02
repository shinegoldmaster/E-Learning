<?php $__env->startSection('instructor-dashboard'); ?>        
	     					
<section class="profile">
    <div class="container">
        <div class="section-title">
            <h3><?php echo e(trans('instructor.instructor_Dashboard')); ?></h3>
        </div>

        <div class="row">
            <!-- sub-main -->
            <div class="col-md-3 col-sm-12">				
				<?php echo $__env->make('instructor.instructor-leftmenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>	
			</div>
            <div class="col-md-9 col-sm-9 col-xs-12">
                <div class="student-section-content card hoverable">
                    <div class="tab-content">
                        <!-- Page Content-->
						<div id="section-1" class="features inner _v2">

						<div class="section-title bg-blue">
							<h3><?php echo e(trans('instructor.Booking_List')); ?></h3>
						</div>
						
						<?php if(count($joinlists)==0): ?>
						<div class="messages-container" style="height: 100%">
							<div class="widget eboss no-padding no-margin">
								<div class="disable-overlay">
									<div class="disable-body">
										<div class="display-table">
											<div class="display-cell">
												<p class="text-center">
													<?php echo e(trans('instructor.There_NO_booked_History')); ?>

												</p>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<?php else: ?>
						<div class="row">
							<form method="GET" action="/instructor/programs-show" accept-charset="UTF-8" class="form-horizontal bordered" role="form">
							<?php echo e(csrf_field()); ?>

								<div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1">
									<div class="input-field col-md-4">
										<input name="afrom" id="afrom" class="datepicker picker__input homework_from"  tabindex="-1"  type="text">
										<label for="icon_prefix"><?php echo e(trans('instructor.From')); ?></label>
									</div>
									<div class="input-field col-md-4">
										<input name="ato" id="ato" class="datepicker picker__input homework_to"  tabindex="-1" type="text">
										<label for="icon_prefix"><?php echo e(trans('instructor.To')); ?></label>
									</div>
									<div class="input-field col-md-4">
										<button type="submit" class="btn btn-danger bg-danger btn-block waves-effect text-white"><?php echo e(trans('instructor.Search')); ?></button>
									</div>
								</div>
							</form>
						</div>
						
						
						<div class="padding-right-20 padding-left-20 text-center">
							<table class="table table-bordered table-responsive">
								<thead>
									<tr>										
										<td>#</td>
										<th><?php echo e(trans('instructor.Time')); ?></th>
										<th><?php echo e(trans('instructor.Action')); ?> </th>								
									</tr>
								</thead>
								<tbody>
									<?php $__currentLoopData = $joinlists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									
									<tr>
										<form method="POST" action="/instructor/join" accept-charset="UTF-8" class="form-horizontal bordered" role="form">
										<?php echo e(csrf_field()); ?>						
											<td><?php echo e($key+1); ?></td>
											<td><?php echo e($list->session_time); ?></td>
											<input name = "bookedId" value="<?php echo e($list->id); ?>"  type="hidden" />
											<td><button type="submit" class="btn btn-xs btn-warning pull-right"><?php echo e(trans('instructor.join_now')); ?></button>
											</td>	
										</form>	
									</tr>
								
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</tbody>
							</table>
							
						</div>
						
						<?php endif; ?>
							
						</div>

                    </div>
					<div class="text-center">
					<?php echo e($joinlists->links()); ?>

					</div>
                </div>
            </div>

        </div>
    </div>
</section>
	
  <?php $__env->stopSection(); ?>  
	
<?php echo $__env->make('layouts/instructor-dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>