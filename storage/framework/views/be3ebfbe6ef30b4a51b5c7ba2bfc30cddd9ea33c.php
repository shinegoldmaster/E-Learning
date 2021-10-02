  
  <?php $__env->startSection('frontend-content'); ?>

	<section id="content">
        <!--===== Start Programs-Content ======-->
		<section class="features inner _v2">
			<div class="container">
				<div class="section-title">
					<h3><?php echo e(trans('frontend.List_programs')); ?></h3>
				</div>
				<div class="row">

					<?php $__currentLoopData = $programData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


					<div class="col-md-4 col-sm-6 col-xs-12">
						<?php if($data->id == 1): ?>
							<div class="card hoverable bg-warning padding-20">
						<?php elseif($data->id == 2): ?>
                            <div class="card hoverable bg-danger padding-20">
						<?php else: ?>
							<div class="card hoverable bg-info padding-20">
						<?php endif; ?>
							<?php $img_url = 'images/icon/'.$data->group_icon; ?>
							<img src="<?php echo e(asset($img_url)); ?>" class="img-responsive" alt="">
							<h4><?php echo e($data->group_name); ?></h4>

							<?php if($data->group_lang_id == '1'): ?>
								<label class="text-warning">English</label>
							<?php else: ?>
								<label class="text-warning">العربية</label>
							<?php endif; ?>

							<p> <?php echo e($data->group_des); ?></p>
                                <?php if($data->id == 1): ?>
							        <a href="/program/instructor/<?php echo e($data->id); ?>" class="btn btn-warning btn-border-warning btn-round" style="width: 40%"><?php echo e(trans('frontend.Instructors')); ?></a>
                                <?php elseif($data->id == 2): ?>
                                    <a href="/program/instructor/<?php echo e($data->id); ?>" class="btn btn-danger btn-border-danger btn-round" style="width: 40%"><?php echo e(trans('frontend.Instructors')); ?></a>
                                <?php else: ?>
                                    <a href="/program/instructor/<?php echo e($data->id); ?>" class="btn btn-blue btn-border-blue btn-round" style="width: 40%"><?php echo e(trans('frontend.Instructors')); ?></a>
                                <?php endif; ?>

                            </div>
						</div>

						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

					</div>
				</div>
			</div>
		</section>
		<!--===== End Programs-Content ======-->
     </section>

  <?php $__env->stopSection(); ?>
	
<?php echo $__env->make('layouts/front-layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>