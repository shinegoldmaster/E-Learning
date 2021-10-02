
   	@extends('layouts/front-layout')
	@section('frontend-content')   
	<script src="{{ asset('js/jssor.slider-25.0.7.min.js') }}" type="text/javascript"></script>		
	<script type="text/javascript">
			jQuery(document).ready(function ($) {

				var jssor_1_options = {
				  $AutoPlay: 1,
				  $SlideWidth: 640,
				  $Cols: 2,
				  $Align: 170,
				  $ArrowNavigatorOptions: {
					$Class: $JssorArrowNavigator$
				  },
				  $BulletNavigatorOptions: {
					$Class: $JssorBulletNavigator$
				  }
				};

				var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

				/*#region responsive code begin*/
				/*remove responsive code if you don't want the slider scales while window resizing*/
				function ScaleSlider() {
					var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
					if (refSize) {
						//refSize = Math.min(refSize, 980);
						jssor_1_slider.$ScaleWidth(refSize);
					}
					else {
						window.setTimeout(ScaleSlider, 30);
					}
				}
				ScaleSlider();
				$(window).bind("load", ScaleSlider);
				$(window).bind("resize", ScaleSlider);
				$(window).bind("orientationchange", ScaleSlider);
				/*#endregion responsive code end*/
			});
		</script>
	
	
	
	<section id="content">
        <div class="news-details">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="/main">{{trans('frontend.main')}}</a></li>
                    <li><a href="/news/">{{trans('frontend.news')}}</a></li>
                    <li class="active">{{$index}}</li>
                </ol>
                <div class="card-panel text-center hoverable">
					@foreach($newsDetailData as $data)
                    <div class="section-title inner news-detail-title">
                        <h3>{{$data->title}}</h3>
                    </div>
                    <div class="info">
                        <span><i class="fa fa-clock-o"></i>{{$data->created_at}}</span>
                    </div>					
					
                    <section class="example">
                        <article class="content">
                            <div id="rev_slider_30_1_wrapper" class="rev_slider_wrapper fullwidthbanner-container" data-alias="media-carousel-autoplay30" style="margin: 0px auto; background-color: rgb(38, 41, 43); padding: 0px; height: 405px; overflow: visible;">
							
								<div id="jssor_1" style="position:relative;margin:0 auto;top:0px;left:0px;width:980px;height:380px;overflow:hidden;visibility:hidden;">
									<!-- Loading Screen -->				
									<div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:980px;height:380px;overflow:hidden;">				
									
										@foreach($imageData as $item)
										<?php $img = 'images/news/details/'.$item->img_url; ?>										
										<div>
											<img class="text-center" src="{{asset($img) }}" ></img>
										</div>

										@endforeach
									</div>
									
									<div data-u="arrowleft" class="jssora051" style="width:65px;height:65px;top:0px;left:45px;" data-autocenter="2" data-scale="0.75" data-scale-left="0.75">
										<svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
											<polyline class="a" points="11040,1920 4960,8000 11040,14080 "></polyline>
										</svg>
									</div>
									<div data-u="arrowright" class="jssora051" style="width:65px;height:65px;top:0px;right:45px;" data-autocenter="2" data-scale="0.75" data-scale-right="0.75">
										<svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
											<polyline class="a" points="4960,1920 11040,8000 4960,14080 "></polyline>
										</svg>
									</div>
								</div>
								
                            </div>
                              
                        </article>
                    </section>

                    <div class="news-text">
                        <p></p><p><strong>{{$data->des}}</strong></p><p></p>

                        <div class="share-article text-center">
                            <label for="heading">{{trans('frontend.You_can_share_social_media_networks')}}</label>
                            <a href="https://www.facebook.com/Maqraa1" onclick="return fbs_click()" target="_blank" class="btn-sm-full fb-bg rectangle waves-effect waves-light"><i class="fa fa-facebook"> </i>Facebook</a>
                            <a title="Click to share this post on Twitter" target="_blank" href="https://twitter.com/Maqraa1" class="btn-sm-full tw-bg rectangle waves-effect waves-light"><i class="fa fa-twitter"> </i>Twitter</a>
                        </div>
                    </div>
					@endforeach
                </div>
            </div>
        </div>
    </div>
</div>    </section>
	
  @stop  
	