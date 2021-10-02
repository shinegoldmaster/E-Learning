

<?php $__env->startSection('instructor-dashboard'); ?>        
<style>
	.no-border, .no-border td{
		border: none !important;
	}	
	.mt-0{
		margin-top: 0 !important;
	}
	.mb-0{
		margin-bottom: 0 !important;
	}
</style>     					
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
					  <div id="section-1" class="features inner">

						<div class="section-title mb-0">
							<?php 
								$refNum ="";
								$materialName = "";
								if(count($followData)>0){
									$refNum = $followData[0]->ref_num;
									$materialName = $followData[0]->group_name;
								}
								
							?>
							<table class="text-right no-border table table-responsive">
							  <tbody>
								<tr>
								  <td><?php echo e(trans('instructor.FollowUp_Paper')); ?></td>
								  <td>
								  <td colspan="2">#<?php echo e($refNum); ?></td>
								</tr>
								<tr>
								  <td><?php echo e(trans('instructor.Student_Name')); ?>:</td>
								  <td><?php echo e($studentName->name); ?></td>
								  <td><?php echo e(trans('instructor.Month_Name')); ?>:</td>
								  <td><?php echo e($currentMonth); ?></td>						  
								</tr>
								<tr>
								  <td colspan="2"><strong><?php echo e(trans('instructor.Material_Name')); ?></strong></td>
								  <td colspan="2"><strong><?php echo e($materialName); ?></strong></td>
								</tr>
							  </tbody>
							</table>
							
						</div>
						
						 
						
						<div class="padding-right-20 padding-left-20 text-center">
						<?php if($errors->any()): ?>							
						<section class="widget-title">
							<div class="alert alert-success">
								<p class="text-center"><?php echo e($errors->first()); ?>						
								</p>
							</div>
						</section>						
						<?php endif; ?>
							<table class="mt-0 table table-bordered table-responsive">
								<thead>
									<tr>
										<th style="width:20px" rowspan="2"><?php echo e(trans('instructor.Notes')); ?></th>
										<th rowspan="2"><?php echo e(trans('instructor.Grade')); ?></th>
										<th colspan="2"><?php echo e(trans('instructor.Review')); ?></th>	
										<th rowspan="2"><?php echo e(trans('instructor.Grade')); ?></th>
										<th colspan="2"><?php echo e(trans('instructor.Memorize')); ?></th>				
										<th rowspan="2"><?php echo e(trans('instructor.Date')); ?></th>
										<th rowspan="2"><?php echo e(trans('instructor.Day')); ?></th>
										<th rowspan="2"><?php echo e(trans('instructor.Instructor_Name')); ?></th>
										<th rowspan="2"><?php echo e(trans('instructor.Group_Section_Name')); ?></th>
										<th rowspan="2"><?php echo e(trans('instructor.Action')); ?></th>
									</tr>
									<tr>
										
										<th><?php echo e(trans('instructor.To')); ?></th>
										<th><?php echo e(trans('instructor.From')); ?></th>
										<th><?php echo e(trans('instructor.')); ?></th>
										<th><?php echo e(trans('instructor.From')); ?></th>
										
									</tr>
								</thead>
								<tbody>
									<?php if($followData -> count() > 0): ?>
									  <?php $__currentLoopData = $followData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									    <form action="/instructor/followupdate" method="POST" class="form-horizontal bordered" role="form">
										<?php echo e(csrf_field()); ?>	
										  <input name = "followid" value="<?php echo e($data->id); ?>"  type="hidden" />
										  <tr>
											  <td><input type="text" name="notes" value="<?php echo e($data->notes); ?>"></td>
											  <td><input type="text" name="grade_from" value="<?php echo e($data->grade_from); ?>"></td>
											  <td><input type="text" name="review_to" value="<?php echo e($data->review_to); ?>"></td>
											  <td><input type="text" name="review_from" value="<?php echo e($data->review_from); ?>"></td>
											  <td><input type="text" name="grade_to" value="<?php echo e($data->grade_to); ?>"></td>
											  <td><input type="text" name="memorize_to" value="<?php echo e($data->memorize_to); ?>"></td>
											  <td><input type="text" name="memorize_from" value="<?php echo e($data->memorize_from); ?>"></td>
											  <td style="line-height:4;"><span><?php echo e($data->date_name); ?></span></td>
											  <td style="line-height:4;"><span><?php echo e($data->week_name); ?></span></td>
											  <td><input type="text" name="iname" value="<?php echo e($data->iname); ?>"></td>
											  <td><input type="text" name="group_section" value="<?php echo e($data->group_section); ?>"></td>
										  
										  
											  <td style="line-height:4;"><button type="submit" class="btn bg-info waves-effect"><?php echo e(trans('instructor.update')); ?></button></td>
										
										  </tr>
										</form>
									  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									<?php else: ?>
									<tr>
									  <td colspan="20" class="text-center"><?php echo e(trans('instructor.There_is_No_Data')); ?>!</td>
									</tr>
									<?php endif; ?>
								</tbody>
							</table>
						</div>
					  </div>

                    </div>
					<div class="text-center">
					
					</div>
                </div>
            </div>

        </div>
    </div>
</section>	
  <?php $__env->stopSection(); ?>  
	
<?php echo $__env->make('layouts/instructor-dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>