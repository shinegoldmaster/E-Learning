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
						<div id="section-1" class="features inner">

						<div class="section-title bg-blue">
							<h3><?php echo e(trans('instructor.Student_List')); ?></h3>
						</div>
						
						<?php if($studentList -> count()==0): ?>
						<div class="messages-container" style="height: 100%">
							<div class="widget eboss no-padding no-margin">
								<div class="disable-overlay">
									<div class="disable-body">
										<div class="display-table">
											<div class="display-cell">
												<p class="text-center">
													<?php echo e(trans('instructor.There_is_no_owned_students')); ?>

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
										<td style="width:20px">#</td>
										<th><?php echo e(trans('instructor.Name')); ?></th>
										<th><?php echo e(trans('instructor.Date')); ?> </th>	
										<th><?php echo e(trans('instructor.country')); ?></th>
										<th><?php echo e(trans('instructor.Gender')); ?></th>
										<th><?php echo e(trans('instructor.Age')); ?></th>
									</tr>
								</thead>
								<tbody>
								  <?php $__currentLoopData = $studentList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									  <tr>			
										<td><?php echo e($key+1); ?></td>
										<td><a href ="/instructor/followup/<?php echo e($list->id); ?>"><strong><?php echo e($list->name); ?></strong></a></td>
										<td><?php echo e($list->created_at); ?></td>
										<td><?php echo e($list->cname); ?></td>
										<td><?php echo e($list->gname); ?></td>
										<td><?php echo e($list->age); ?></td>		
									  </tr>
								  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</tbody>
							</table>
							
						</div>
						
						<?php endif; ?>
							
						</div>

                    </div>
					<div class="text-center">
					<?php echo e($studentList->links()); ?>

					</div>
                </div>
            </div>

        </div>
    </div>
</section>	
  <?php $__env->stopSection(); ?>  
	
<?php echo $__env->make('layouts/instructor-dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>