
  
  <?php $__env->startSection('frontend-content'); ?>    
	<section id="content">
       
		<section class="features inner instructors _v2">
			<div class="container">
				<div class="section-title">
					<h3><?php echo e(trans('instructorsshow.Instructors_List')); ?></h3>
					<p><?php echo e(trans('instructorsshow.Instructors_p')); ?></p>
				</div>

				<div class="row">
				<?php $__currentLoopData = $instructorAppointData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<div class="col-md-4 col-sm-6 col-xs-12">
						<?php if($data->group_id == '1'): ?>
							<div class="card hoverable bg-warning padding-20">
						<?php else: ?>
							<div class="card hoverable bg-danger padding-20">
						<?php endif; ?>
							<?php $img_url = 'images/icon/'.$data->group_icon; ?>
							<img src="<?php echo e(asset($img_url)); ?>" class="img-responsive" alt="">
							
							<h4><?php echo e($data->name); ?></h4>
							
							<?php if($data->group_lang_id == '1'): ?>
								<label class="text-warning"><?php echo e(trans('instructorsshow.Language')); ?>: English</label>
							<?php else: ?>
								<label class="text-warning"><?php echo e(trans('instructorsshow.Language')); ?>: العربية</label>
							<?php endif; ?>
							
							</label>
							<?php if($data->total): ?>
								<span>available sessions :<?php echo e($data->total); ?></span>
								<p><?php echo e($data->group_des); ?></p>
								<a href="/program/appointments/<?php echo e($data->id); ?>/" class="btn btn-warning btn-border-warning btn-round waves-effect" style="width: 70%"><?php echo e(trans('instructorsshow.available_sessions')); ?></a>
							<?php else: ?>
								<span>available sessions :0</span>
								<p><?php echo e($data->group_des); ?></p>
								<a href="" class="btn btn-round btn-warning btn-border-warning waves-effect" disabled style="width: 70%"><?php echo e(trans('instructorsshow.available_sessions')); ?></a>
							<?php endif; ?>
							</div>
					</div>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</div>
			</div>
		</section>

    </section>
	
  <?php $__env->stopSection(); ?>  
	
<?php echo $__env->make('layouts/front-layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>