
  
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
							  <?php if($quranmenudata -> count() > 0): ?>
								<?php $__currentLoopData = $quranmenudata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<li>
								  <a href="/quran/<?php echo e($data->id); ?>">
											<?php echo e($data->menu_name); ?>

										</a>
									</li>
								  
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							  <?php else: ?>
								<li class="active">
									<?php echo e(trans('library.There_is_no_Menu')); ?>!
								</li>
							  <?php endif; ?>
							</ul>
						</div>                        
						
                    </div>

                    <div class="col-md-9 col-sm-9 col-xs-12">

                        <div class="student-section-content card">

                            <div class="tab-content">
                                <div>
                                    <div class="section-title bg-blue">
                                        <h3><?php echo e($categoryname->cat_name); ?></h3>
                                    </div>
                                    <div class="library-item">
                                        <ul class="list-unstyled no-margin no-padding">
										  	
											<div class="no-margin no-padding row">
											<?php if($quransubcategorydata->count() > 0): ?>
												<?php $__currentLoopData = $quransubcategorydata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<li class="col-md-6 col-sm-6 col-xs-12">
													<div class="card hoverable">
														<a href="/quran/get-item/<?php echo e($data->id); ?>"><img src="<?php echo e(asset('images/library/book.png')); ?>" class="img-responsive align-center" alt=""></a>
														<a href="/quran/get-item/<?php echo e($data->id); ?>"><?php echo e($data->sub_cat_name); ?></a>
													</div>
												</li>
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

                            </div>
                        </div>
                    </div>
				
				
            </div>
        </section>

    <!--===== End Quran Section ======-->

    </section>
	
  <?php $__env->stopSection(); ?>  
	
<?php echo $__env->make('layouts/front-layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>