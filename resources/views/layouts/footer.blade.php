<footer id="footer" class="_v2">
    <div class="top-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="section-title">
                        <h5>{{trans ('global.about_us') }}</h5>
                    </div>
                    <p>{{trans ('global.footer_detail') }}</p>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="section-title">
                        <h5>{{trans ('global.sitemap') }}</h5>
                    </div>
                    <ul class="list-unstyled no-margin no-padding col-md-6 col-sm-6">
                        <li><a href="/">{{trans ('global.main') }}</a></li>
                        <li><a href="/about">{{trans ('global.about_us') }}</a></li>
                        <li><a href="/program">{{trans ('global.list_programs') }}</a></li>
                    </ul>
                    <ul class="list-unstyled no-margin col-md-6 col-sm-6">
                        <li><a href="/quran">{{trans ('global.quran_libaray') }}</a></li>
                        <li><a href="/librarys">{{trans ('global.library') }}</a></li>
                        <li><a href="/news">{{trans ('global.news') }}</a></li>
                    </ul>
                </div>
                <div class="col-md-2 col-sm-6 col-xs-12">
                    <div class="section-title">
                        <h5>{{trans ('global.follow_us') }}</h5>
                    </div>
                    <div class="social">
                        <a class="btn-floating fb-bg waves-effect waves-light" href="https://www.facebook.com/Maqraa1" target="_blank"><i class="fa fa-facebook"></i></a>
                        <a class="btn-floating tw-bg waves-effect waves-light" href="https://twitter.com/Maqraa1" target="_blank"><i class="fa fa-twitter"></i></a>
                        <a class="btn-floating yt-bg waves-effect waves-light" href="https://www.youtube.com/user/Maqraa" target="_blank"><i class="fa fa-youtube"></i></a>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12 subscribe">
                    <div class="section-title">
                        <h5>{{trans ('global.mailing_list') }}</h5>
                        <p>{{trans ('global.put_email_news_about') }}</p>
                    </div>
                    <form action="" method="post" accept-charset="utf-8" class="form-inline special-form">
                        <div class="input-group input-round-group round-right">
                            @if(config('app.locale')  == 'en')
                                <input type="email" id="mce-EMAIL" name="EMAIL" required class="form-control default-input" placeholder="{{trans('instructorsshow.Enter_email_address')}}">
                                <span class="input-group-btn">
														<button class="btn btn-warning" type="submit">{{trans ('global.send') }}</button>
													</span>

                            @else
                                <span class="input-group-btn">
													<button class="btn btn-warning" type="submit">{{trans ('global.send') }}</button>
												</span>
                                <input type="email" id="mce-EMAIL" name="EMAIL" required class="form-control default-input" placeholder="{{trans('instructorsshow.Enter_email_address')}}">
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="bottom-footer">
        <div class="container text-center">
            <p>© {{trans ('global.all_rights_reserved') }}<span> {{trans ('global.to_maqraa_al_harameen') }} </span>2017.</p>
        </div>
    </div>
</footer>