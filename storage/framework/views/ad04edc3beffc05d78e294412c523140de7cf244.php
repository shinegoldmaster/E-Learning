  
  <?php $__env->startSection('instructor-dashboard'); ?>        
	<script src="<?php echo e(asset('js/aplayer/audio.min.js')); ?>"></script>        
  <script>
      audiojs.events.ready(function() {
        audiojs.createAll();
      });
  </script>     
					
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
                            
						<div id="section-6">
							<div class="homework-history">
								<div class="section-title bg-blue">
									<h3><?php echo e(trans('instructor.Homework_History')); ?></h3>
								</div>
								
								<?php if(!$homeworkhistorydata): ?>
								<div class="messages-container" style="height: 100%">
									<div class="widget eboss no-padding no-margin">
										<div class="disable-overlay">
											<div class="disable-body">
												<div class="display-table">
													<div class="display-cell">
														<p class="text-center">
															<?php echo e(trans('instructor.There_is_NO_HomeWork')); ?>.
														</p>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<?php else: ?>
								
								<div class="row">
									<form method="POST" action="/instructor/homework-history" accept-charset="UTF-8" class="form-horizontal bordered">
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
								
								<div class="padding-right-20 padding-left-20 text-center">
									<table class="table table-bordered table-responsive">
										<thead>
											<tr>
												<td>#</td>
												<th><?php echo e(trans('instructor.Appointment')); ?> </th>
												<th><?php echo e(trans('instructor.HomeWork')); ?> </th>                      
												<th><?php echo e(trans('instructor.Status')); ?> </th>
											</tr>
										</thead>
										<tbody>
										<?php $__currentLoopData = $homeworkhistorydata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<tr>
												<td><?php echo e($item->id); ?></td>
												<td><?php echo e($item->appoint); ?></td>
												<td>
													<a href="#" class="btn bg-blue" data-toggle="modal" data-target="#my_homework_<?php echo e($item->id); ?>"><?php echo e(trans('instructor.Read')); ?></a>
												</td>
												<td>
													<?php if($item->status == 0): ?>
														<label><?php echo e(trans('instructor.Pending')); ?></label>
													<?php else: ?> 
														<label><?php echo e(trans('instructor.Completed')); ?></label>	
													<?php endif; ?>
												</td>
											</tr>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>	
														   
										</tbody>
									</table>
									<?php $__currentLoopData = $homeworkhistorydata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<div class="modal fade" id="my_homework_<?php echo e($item->id); ?>" role="dialog">
										<div class="modal-dialog">
											<!-- Modal content-->
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal">×</button>
													<h4 class="modal-title"><?php echo e(trans('instructor.View')); ?></h4>
												</div>
												<div class="modal-body">
													
													
													<table class="table table-bordered">
														<tbody>
														<tr>
															<td><?php echo e(trans('instructor.Student')); ?></td>
															<td><?php echo e($item->iname); ?></td>
														</tr>
														<tr>
															<td><?php echo e(trans('instructor.Appointment')); ?></td>
															<td><?php echo e($item->appoint); ?></td>
														</tr>
														<tr>
															<td><?php echo e(trans('instructor.Maqraa')); ?></td>
															<td>مقرأة وسط العلمية - رجال</td>
														</tr>
														<tr>
															<td><?php echo e(trans('instructor.Homework')); ?></td>
															
															<td>
																<div id="jp_container_314" class="jp_container_1">
																	<button class="common-class btn bg-blue waves-effect jp-play" id="play-button" onclick="openAudioPlayer(<?php echo e($item->id); ?>, 1)"><?php echo e(trans('instructor.Play')); ?></button>
																	<button id="close-button" onclick="pauseAudionPlayer()" class="btn bg-blue waves-effect jp-pause" style="display: none;"><?php echo e(trans('instructor.Pause')); ?></button>
																</div>
																				</td>
														</tr>
														<tr>
															<td><?php echo e(trans('instructor.Sent')); ?></td>
															<td><?php echo e($item->updated_at); ?></td>
														</tr>
														<tr>
															<td><?php echo e(trans('instructor.Notes')); ?></td>
															<td><?php echo e($item->contents); ?></td>
														</tr>
														<tr>
															<td><?php echo e(trans('instructor.Student_notes')); ?></td>
															<td><?php echo e(trans('instructor.No_notes')); ?></td>
														</tr>
														</tbody>
													</table>
											
													
													
													
													
													
													
													
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-danger" data-dismiss="modal"><?php echo e(trans('instructor.Close')); ?></button>
												</div>
											</div>
										</div>
									</div>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									
								</div>
								<?php endif; ?>
								
								
								
								
							</div>
							<div class="pagination">  </div>
						</div>
	
	                </div>
                </div>
            </div>
        </div>
    </div>
</section>
	<script  src="<?php echo e(asset('js/aplayer/custom.js')); ?>" type="text/javascript">	</script>
  <?php $__env->stopSection(); ?>  
	
<?php echo $__env->make('layouts/instructor-dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>