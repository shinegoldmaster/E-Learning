
  
  <?php $__env->startSection('frontend-content'); ?>  
  
  <script src="<?php echo e(asset('js/aplayer/audio.min.js')); ?>"></script>
  <script>
      audiojs.events.ready(function() {
        audiojs.createAll();
      });
  </script>	
  
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
                                        <h3><?php echo e($subcategoryname->sub_cat_name); ?></h3>
                                    </div>
									
                                    <div class="library-item">
                                        <ul class="list-unstyled no-margin no-padding">
                                            <div class="no-margin no-padding row">
												
											<?php if($quranitemdata->count() > 0): ?>											<?php $__currentLoopData = $quranitemdata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>				
												  <li class="col-md-3 col-sm-4 col-xs-12">
                                                    <div class="card hoverable" data-toggle="tooltip" title="" data-original-title="Surah Al-Fatihah ( The Opening )">
                                                        <a href=""><img src="<?php echo e(asset('images/library/book.png')); ?>" class="img-responsive align-center" alt=""></a>
                                                        <span class="text-overflow"><?php echo e($list->item_name); ?> </span>
                                                        <div id="jp_container_514" class="jp_container_1">
															<a class="common-class btn bg-info waves-effect jp-play" id="play-button" onclick="openAudioPlayer(<?php echo e($list->id); ?>)"><i class="fa fa-play"></i><?php echo e(trans('library.Play')); ?></a>
															<a id="close-button" onclick="pauseAudionPlayer()" class="btn bg-warning waves-effect jp-pause" style="display: none;"><?php echo e(trans('library.Pause')); ?></a>
														</div>
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
            </div>
        </section>

    <!--===== End Quran Section ======-->

    </section>
	<script  src="<?php echo e(asset('js/aplayer/quran-audio-play.js')); ?>" type="text/javascript">	</script>
  <?php $__env->stopSection(); ?>  
	
<?php echo $__env->make('layouts/front-layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>