  
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
                        <div id="section-10">
							<div class="homework-history">							  				<?php if($errors->any()): ?>							
								<section class="widget-title">
									<div class="alert alert-success">
										<p class="text-center">
											<?php echo e($errors->first()); ?>								
										</p>
									</div>
								</section>						
								<?php endif; ?>
								<div class="section-title bg-blue">
									<h3><?php echo e(trans('student.Messages_History')); ?></h3>
								</div>
								<?php if(!$messagehistory): ?>
								<div class="messages-container" style="height: 100%">
									<div class="widget eboss no-padding no-margin">
										<div class="disable-overlay">
											<div class="disable-body">
												<div class="display-table">
													<div class="display-cell">
														<p class="text-center">
															<?php echo e(trans('student.There_NO_received_messages')); ?>

														</p>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<?php else: ?>
								
								
								<div class="row">
									<form method="POST" action="/student/msgs-history" accept-charset="UTF-8" class="form-horizontal bordered" role="form">
									<?php echo e(csrf_field()); ?>

										<div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1">
											<div class="input-field col-md-4">
												<input name="afrom" id="afrom" class="datepicker picker__input homework_from"  tabindex="-1"  type="text">
												<label for="icon_prefix"><?php echo e(trans('student.From')); ?></label>
											</div>
											<div class="input-field col-md-4">
												<input name="ato" id="ato" class="datepicker picker__input homework_to"  tabindex="-1" type="text">
												<label for="icon_prefix"><?php echo e(trans('student.To')); ?></label>
											</div>
											<div class="input-field col-md-4">
												<button type="submit" class="btn btn-blue btn-block waves-effect text-white"><?php echo e(trans('student.Search')); ?></button>
											</div>
										</div>
									</form>
								</div>
								
								<div class="padding-right-20 padding-left-20 text-center">
									<table class="table table-bordered table-responsive">
										<thead>
											<tr>
												<td>#</td>
												<th><?php echo e(trans('student.Message_Subject')); ?>  </th>
												<th><?php echo e(trans('student.Message')); ?> </th>
												<th><?php echo e(trans('student.Receiver')); ?> </th>
												<th><?php echo e(trans('student.Date')); ?> </th>
											</tr>
										</thead>
										<tbody>
										<?php $__currentLoopData = $messagehistory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<tr>
												<td><?php echo e($item->id); ?></td>
												<td><?php echo e($item->title); ?></td>
												<td><a href="#" class="btn btn-blue" data-toggle="modal" data-target="#msg_<?php echo e($item->id); ?>"><?php echo e(trans('student.Show_Message')); ?></a></td>
												<td><?php echo e($item->name); ?></td>
												<td><label for="">
														<?php echo e($item->created_at); ?>

													</label>
												</td>
											</tr>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										</tbody>
									</table>
									<?php $__currentLoopData = $messagehistory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<div class="modal fade" id="msg_<?php echo e($data->id); ?>" role="dialog" style="display: none;">
										<div class="modal-dialog">
											
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal">×</button>
													<h4 class="modal-title"><?php echo e(trans('student.Message')); ?></h4>
												</div>
												<div class="modal-body">
													<p><?php echo e($data->contents); ?></p>
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-danger" data-dismiss="modal"><?php echo e(trans('student.Close')); ?></button>
												</div>
											</div>
										</div>
									</div>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</div>
									<div class="text-center"><?php echo e($messagehistory->links()); ?></div>
								<?php endif; ?>
								
							</div>
							
							
							
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
</section>
	
  <?php $__env->stopSection(); ?>  
	
<?php echo $__env->make('layouts/student-dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>