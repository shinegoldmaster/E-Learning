<div class="header-line-top">
    <div class="container">
        <div class="row">
            <div class="col-md-4 top-header-social">
                <ul>
                    <li>
                        <a class="" href="https://www.facebook.com/Maqraa1" target="_blank"><i class="fa fa-facebook"></i></a>
                    </li>
                    <li>
                        <a class="" href="https://twitter.com/Maqraa1" target="_blank"><i class="fa fa-twitter"></i></a>
                    </li>
                    <li>
                        <a class="" href="https://www.youtube.com/user/Maqraa" target="_blank"><i class="fa fa-youtube-play"></i></a>
                    </li>


                </ul>
            </div>

            <div class="col-md-4 top-header-contact-us-phones">
                @if(config('app.locale')  == 'en')
                    <span><i class="fa fa-phone" aria-hidden="true"></i> {{trans ('global.contact_us') }} +212661652138 / +212661652138 </span>
                @else
                    <span>   +212661652138 / +212661652138  {{trans ('global.contact_us') }} <i class="fa fa-phone" aria-hidden="true"></i> </span>
                @endif
            </div>
        </div>

    </div>

</div>