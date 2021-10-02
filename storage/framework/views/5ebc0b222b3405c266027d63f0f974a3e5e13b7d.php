  
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
                                <div id="section-9">
									<div class="send-msg">
										<div class="section-title bg-blue">
											<h3><?php echo e(trans('student.Messages')); ?></h3>
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
										<div class="padding-20">
											<div class="row">
												<form method="POST" action="/student/sendmessage" accept-charset="UTF-8" class="form-horizontal bordered">
												<?php echo e(csrf_field()); ?>

												<div class="col-md-8 col-md-offset-2 col-sm-12">
													<div class="row">
														<div class="col-md-12">
														
														   <div class="box">						  
															  <select class="wide" id="receiver" name="receiver" required>									
																	<option value="" selected><?php echo e(trans('student.Receiver')); ?></option>
																	
																	<?php $__currentLoopData = $recipienterlist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
																		<option value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>
																	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
																
															  </select>
															  <script>
																$('#receiver').niceSelect();
															  </script>
														  </div>
															 
														</div>
													</div>
													<div class="row">                            

															<div class="col-md-12">
																<div class="input-field">
																	<textarea name="msg" id="msg" class="materialize-textarea" required=""></textarea>

																	<label for="textarea1"><?php echo e(trans('student.Msg')); ?></label>
																</div>
															</div>

													</div>
													<div class="row text-center">
														<button type="submit" class="btn bg-blue waves-effect"><i class="fa fa-send"></i> <?php echo e(trans('student.Send')); ?></button>
														<a class="btn bg-danger waves-effect margin-bottom-30" style="color: #ffffff;" type="cancel" onclick="history.back(-1)"><i class="fa fa-ban" aria-hidden="true"></i> <?php echo e(trans('student.Cancel')); ?></a>
													</div>
												</div></form>
												
											</div>
										</div>
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