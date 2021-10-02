  
  <?php $__env->startSection('frontend-content'); ?>   
	<section id="content">
    <!--===== Start Quran Section ======-->
        <section class="profile quran-library">
            <div class="container">
                <div class="section-title">
                    <h3><?php echo e(trans('library.Quran_Library')); ?></h3>
                </div>
                <div class="row">
                    <div class="col-md-3 col-sm-3">
                        
						<div class="student-section">
							<ul class="nav nav-tabs quranmenu active">   
								<?php $__currentLoopData = $quranmenudata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								  <?php if($active == 0): ?>
								    <?php if($key == 0): ?>
									  <li class="active">
								    <?php else: ?>
									  <li>
								    <?php endif; ?>
								  <?php else: ?>
									<?php if($active == $data->id): ?>
										<li class="active">
								    <?php else: ?>
									  <li>
								    <?php endif; ?>
								  <?php endif; ?>
										<a data-toggle="tab" class="waves-effect" href="#<?php echo e($data->id); ?>">
											<?php echo e($data->menu_name); ?>

										</a>
									</li>
								  
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</ul>
						</div>                        
						
                    </div>

                    <div class="col-md-9 col-sm-9 col-xs-12">
                        <div class="student-section-content card">
                            <div class="tab-content">
							<?php $__currentLoopData = $quranmenudata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							   <?php if($active == 0): ?>
								 <?php if($key == 0): ?>
									<div id="<?php echo e($data->id); ?>" class="tab-pane fade in active">
								 <?php else: ?>
									<div id="<?php echo e($data->id); ?>" class="tab-pane fade">
								 <?php endif; ?>
                               <?php else: ?>
								 <?php if($active == $data->id): ?>
									<div id="<?php echo e($data->id); ?>" class="tab-pane fade in active">
								 <?php else: ?>
									<div id="<?php echo e($data->id); ?>" class="tab-pane fade">
								 <?php endif; ?>
							   <?php endif; ?>
									<div class="section-title bg-blue">
										<h3><?php echo e($data->menu_name); ?></h3>
									</div>
									<div class="library-item">
										<ul class="list-unstyled no-margin no-padding">
											<div class="no-margin no-padding row">
											<?php if($qurancategorydata->count() > 0): ?>
											<?php $__currentLoopData = $qurancategorydata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<?php if($list->menu_id == $data->id): ?>
												<li class="col-md-4 col-sm-6 col-xs-12">
													<div class="card hoverable" data-toggle="tooltip" title="" data-original-title="">
														<a href="/quran/get-subcategory/<?php echo e($list->id); ?>">
															<img src="<?php echo e(asset('images/library/shiekh.png')); ?>" class="img-responsive align-center" alt="">
														</a>
														<a class="text-overflow" href="/quran/get-subcategory/<?php echo e($list->id); ?>"><?php echo e($list->cat_name); ?></a>
													</div>
												</li>
												<?php endif; ?>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
											<?php else: ?>
											<li class="col-md-12 col-sm-12 col-xs-12">
												<?php echo e(trans('library.There_is_no_Data')); ?>!
											</li>
											<?php endif; ?>
											</div>
										</ul>
									</div>
								</div>
								
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>   
							</div>
                        </div>
                    </div>
					
                </div>
            </div>
        </section>

    <!--===== End Quran Section ======-->

    </section>
	
  <?php $__env->stopSection(); ?>  
	
<?php echo $__env->make('layouts/front-layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>