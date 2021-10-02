  
  <?php $__env->startSection('student-dashboard'); ?>        

  <script src="<?php echo e(asset('js/aplayer/audio.min.js')); ?>"></script>        
  <script>
      audiojs.events.ready(function() {
        audiojs.createAll();
      });
  </script>				
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
                            
						<div id="section-6">
							<div class="homework-history">
								<div class="section-title bg-blue">
									<h3><?php echo e(trans('student.Homework_History')); ?></h3>
								</div>
								
								
								
								<div class="row">
									<form method="POST" action="/student/homework-history" accept-charset="UTF-8" class="form-horizontal bordered">
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
								
								<?php if(!$homeworkhistorydata): ?>
								<div class="messages-container" style="height: 100%">
									<div class="widget eboss no-padding no-margin">
										<div class="disable-overlay">
											<div class="disable-body">
												<div class="display-table">
													<div class="display-cell">
														<p class="text-center">
															<?php echo e(trans('student.There_is_NO_HomeWork')); ?>.
														</p>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<?php else: ?>
									
								<div class="padding-right-20 padding-left-20 text-center">
									<table class="table table-bordered table-responsive">
										<thead>
											<tr>
												<td>#</td>
												<th><?php echo e(trans('student.Appointment')); ?> </th>
												<th><?php echo e(trans('student.Homework')); ?> </th>                      
												<th><?php echo e(trans('student.Status')); ?> </th>
											</tr>
										</thead>
										<tbody>
										<?php $__currentLoopData = $homeworkhistorydata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<tr>
												<td><?php echo e($item->id); ?></td>
												<td><?php echo e($item->appoint); ?></td>
												<td>
													<a href="#" class="btn bg-warning" data-toggle="modal" data-target="#my_homework_<?php echo e($item->id); ?>"><?php echo e(trans('student.Read')); ?></a>
												</td>
												<td>
													<?php if($item->status == 0): ?>
														<label><?php echo e(trans('student.Pending')); ?></label>
													<?php else: ?> 
														<label><?php echo e(trans('student.Completed')); ?></label>	
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
													<h4 class="modal-title"><?php echo e(trans('student.View')); ?></h4>
												</div>
												<div class="modal-body">
													
													
													<table class="table table-bordered">
														<tbody>
														<tr>
															<td><?php echo e(trans('student.instructor')); ?></td>
															<td><?php echo e($item->iname); ?></td>
														</tr>
														<tr>
															<td><?php echo e(trans('student.Appointment')); ?></td>
															<td><?php echo e($item->appoint); ?></td>
														</tr>
														<tr>
															<td><?php echo e(trans('student.Maqraa')); ?></td>
															<td><?php echo e($item->gname); ?></td>
														</tr>
														<tr>
															<td><?php echo e(trans('student.Homework')); ?></td>
															
															<td>
																
																<div id="jp_container_314" class="jp_container_1">
																	<button class="common-class btn bg-info waves-effect jp-play" id="play-button" onclick="openAudioPlayer(<?php echo e($item->id); ?>, 0)"><?php echo e(trans('student.Play')); ?></button>
																	<button id="close-button" onclick="pauseAudionPlayer()" class="btn bg-warning waves-effect jp-pause" style="display: none;"><?php echo e(trans('student.Pause')); ?></button>
																</div>
																				</td>
														</tr>
														<tr>
															<td><?php echo e(trans('student.Sent')); ?></td>
															<td><?php echo e($item->updated_at); ?></td>
														</tr>
														<tr>
															<td><?php echo e(trans('student.Notes')); ?></td>
															<td><?php echo e($item->contents); ?></td>
														</tr>
														<tr>
															<td><?php echo e(trans('student.Instructor_notes')); ?></td>
															<td><?php echo e(trans('student.No_notes')); ?></td>
														</tr>
														</tbody>
													</table>
											
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-danger" data-dismiss="modal"><?php echo e(trans('student.Close')); ?></button>
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
	
<?php echo $__env->make('layouts/student-dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>