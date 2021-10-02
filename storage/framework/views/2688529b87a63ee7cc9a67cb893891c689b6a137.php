<footer id="footer" class="_v2">
    <div class="top-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="section-title">
                        <h5><?php echo e(trans ('global.about_us')); ?></h5>
                    </div>
                    <p><?php echo e(trans ('global.footer_detail')); ?></p>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="section-title">
                        <h5><?php echo e(trans ('global.sitemap')); ?></h5>
                    </div>
                    <ul class="list-unstyled no-margin no-padding col-md-6 col-sm-6">
                        <li><a href="/"><?php echo e(trans ('global.main')); ?></a></li>
                        <li><a href="/about"><?php echo e(trans ('global.about_us')); ?></a></li>
                        <li><a href="/program"><?php echo e(trans ('global.list_programs')); ?></a></li>
                    </ul>
                    <ul class="list-unstyled no-margin col-md-6 col-sm-6">
                        <li><a href="/quran"><?php echo e(trans ('global.quran_libaray')); ?></a></li>
                        <li><a href="/librarys"><?php echo e(trans ('global.library')); ?></a></li>
                        <li><a href="/news"><?php echo e(trans ('global.news')); ?></a></li>
                    </ul>
                </div>
                <div class="col-md-2 col-sm-6 col-xs-12">
                    <div class="section-title">
                        <h5><?php echo e(trans ('global.follow_us')); ?></h5>
                    </div>
                    <div class="social">
                        <a class="btn-floating fb-bg waves-effect waves-light" href="https://www.facebook.com/Maqraa1" target="_blank"><i class="fa fa-facebook"></i></a>
                        <a class="btn-floating tw-bg waves-effect waves-light" href="https://twitter.com/Maqraa1" target="_blank"><i class="fa fa-twitter"></i></a>
                        <a class="btn-floating yt-bg waves-effect waves-light" href="https://www.youtube.com/user/Maqraa" target="_blank"><i class="fa fa-youtube"></i></a>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12 subscribe">
                    <div class="section-title">
                        <h5><?php echo e(trans ('global.mailing_list')); ?></h5>
                        <p><?php echo e(trans ('global.put_email_news_about')); ?></p>
                    </div>
                    <form action="" method="post" accept-charset="utf-8" class="form-inline special-form">
                        <div class="input-group input-round-group round-right">
                            <?php if(config('app.locale')  == 'en'): ?>
                                <input type="email" id="mce-EMAIL" name="EMAIL" required class="form-control default-input" placeholder="<?php echo e(trans('instructorsshow.Enter_email_address')); ?>">
                                <span class="input-group-btn">
														<button class="btn btn-warning" type="submit"><?php echo e(trans ('global.send')); ?></button>
													</span>

                            <?php else: ?>
                                <span class="input-group-btn">
													<button class="btn btn-warning" type="submit"><?php echo e(trans ('global.send')); ?></button>
												</span>
                                <input type="email" id="mce-EMAIL" name="EMAIL" required class="form-control default-input" placeholder="<?php echo e(trans('instructorsshow.Enter_email_address')); ?>">
                            <?php endif; ?>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="bottom-footer">
        <div class="container text-center">
            <p>© <?php echo e(trans ('global.all_rights_reserved')); ?><span> <?php echo e(trans ('global.to_maqraa_al_harameen')); ?> </span>2017.</p>
        </div>
    </div>
</footer>