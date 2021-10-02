  
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
						<?php if($errors->any()): ?>							
						<section class="widget-title">
							<div class="alert alert-success">
								<p class="text-center">
									<?php echo e($errors->first()); ?>								
								</p>
							</div>
						</section>						
						<?php endif; ?>
                        <!-- Page Content-->
						<div id="section-3">
							<div class="section-title bg-blue">
								<h3><?php echo e(trans('instructor.Appointments_History')); ?></h3>
							</div>

							<?php if(count($joinededHistory) == 0): ?>
								
							<div class="messages-container" style="height: 100%">
								<div class="widget eboss no-padding no-margin">
									<div class="disable-overlay">
										<div class="disable-body">
											<div class="display-table">
												<div class="display-cell">
													<p class="text-center">
														<?php echo e(trans('instructor.There_NO_History')); ?>

													</p>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<?php else: ?>
							
							
							<!-- Content of appointment history -->
							<div class="row">
								<form method="POST" action="/instructor/joined-history" accept-charset="UTF-8" class="form-horizontal bordered">
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
											<button type="submit" class="btn btn-blue btn-block waves-effect text-white"><?php echo e(trans('instructor.Search')); ?></button>
										</div>
									</div>
								</form>
							</div>

							
							<div class="time-history">
								<div class="section-title bg-blue">
									<h3><?php echo e(trans('instructor.Joined_List')); ?></h3>
								</div>

								<ul class="list-unstyled no-margin no-padding">
									<?php $__currentLoopData = $joinededHistory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<li class="time-item col-md-6 col-sm-6 col-xs-12">
										<div class="media hoverable">
											<div class="media-left">
												<i class="fa fa-microphone media-object"></i>
											</div>
											<div class="media-body">
												<h4><?php echo e($item->session_title); ?></h4>

												<h5><?php echo e($item->name); ?></h5>
												<p><i class="fa fa-clock-o"></i><?php echo e($item->session_time); ?></p>
												
												<?php if($item->jstatus == 0): ?>
													<a href="#" data-toggle="modal" data-target="#joined_<?php echo e($item->id); ?>" class="btn waves-effect"><?php echo e(trans('instructor.Cancel')); ?></a>
												<?php elseif($item->jstatus == 1): ?>
													<label for="canceled"><?php echo e(trans('instructor.Cancelled')); ?></label>
												<?php else: ?>
													<label for="canceled"><?php echo e(trans('instructor.Completed')); ?></label>
												<?php endif; ?>
											</div>
										</div>
									</li>   


									<?php if($item->jstatus == 0): ?>
									<div class="modal fade in" id="joined_<?php echo e($item->id); ?>" role="dialog" style="display: none; ">
										<div class="modal-dialog">
											<!-- Modal content-->
											<form method="POST" action="/instructor/joined-cancel" accept-charset="UTF-8" class="form-horizontal bordered">
											<?php echo e(csrf_field()); ?>

											<input name="bookedjoinid" value="<?php echo e($item->id); ?>" type="hidden">
											
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal">×</button>
													<h4 class="modal-title"><?php echo e(trans('instructor.Reason_canceling_appointment')); ?> :
														<?php echo e($item->session_time); ?>

													</h4>
												</div>
												<div class="modal-body">
													<textarea id="reason" name="reason" placeholder="Reason for canceling appointment"></textarea>
												</div>
												<div class="modal-footer">
													<button id="close" class="btn btn-danger" data-dismiss="modal"><?php echo e(trans('instructor.Close')); ?></button>
													<div id="forget-password" class="options">
														<a>
															<button type="submit" class="btn btn-blue waves-effect waves-light"><?php echo e(trans('instructor.Ok')); ?></button>
														</a>
													</div>
												</div>
											</div>
											</form>
										</div>
									</div>
									<?php endif; ?>
									
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>        											
								</ul>
							</div>
							
							<?php endif; ?>   
						</div>
						
						<div class="col-md-12 col-sm-12 col-xs-12 text-center">
								<?php echo e($joinededHistory->links()); ?>

						</div>
                    </div>
                </div>
            </div>

        

        </div>
    </div>
</section>
	
  <?php $__env->stopSection(); ?>  
	
<?php echo $__env->make('layouts/instructor-dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>