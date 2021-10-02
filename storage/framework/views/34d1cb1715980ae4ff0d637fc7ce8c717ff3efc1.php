  
  <?php $__env->startSection('frontend-content'); ?>   
	<section id="content">
        <section class="news"><!--===== Start News Section ======-->
			<div class="container">
				<div class="section-title">
					<h3><?php echo e(trans('frontend.al_maqraa_news')); ?></h3>
				</div>
				<ul class="list-unstyled.no-margin.no-padding">
					<?php $__currentLoopData = $newsData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<li class="col-md-4 col-sm-4 col-xs-12">
						  <!--Image Card-->
						  <div class="card hoverable border-bottom-info text-center">
							<div class="card-image">
							
								<?php $img_url = 'images/news/thumb/'.$data->thumb; ?>
								
								<div class="view overlay hm-cyan-light z-depth-1">
									<img src="<?php echo e(asset($img_url)); ?>" alt="<?php echo e($data->title); ?>">
									<a href="/news/details/<?php echo e($data->id); ?>">
										<div class="mask waves-effect"></div>
									</a>
								</div>
							</div>
							<div class="card-content">
								<h4><a title="<?php echo e($data->title); ?>" href="/news/details/<?php echo e($data->id); ?>" class="text-info news-title"><?php echo e($data->title); ?></a></h4>
								<p><?php echo e($data->des); ?></p>
								<a href="/news/details/<?php echo e($data->id); ?>" class="btn btn-blue waves-effect waves-light"><?php echo e(trans('frontend.See_More')); ?></a>
							</div>
						  </div>
						  <!--Image Card-->
						</li>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>	
				</ul>
				<div class="col-md-12 col-sm-12 col-xs-12 text-center">
					<?php echo e($newsData->links()); ?>

				</div>
				
				
			</div>
		</section><!--===== End News Section ======-->
    </section>
	
  <?php $__env->stopSection(); ?>  
	
<?php echo $__env->make('layouts/front-layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>