
  @extends('layouts/front-layout')
  @section('frontend-content')  
  
  <script src="{{ asset('js/aplayer/audio.min.js') }}"></script>
  <script>
      audiojs.events.ready(function() {
        audiojs.createAll();
      });
  </script>	
  <style>
	.library-button{
		min-width:150px !important;
	}
	.jp_container_1{
		margin-top:5px;
	}
	.o3{
		opacity: 0.3;
	}
  </style>
  
	<section id="content">
    <!--===== Start Quran Section ======-->
        <section class="profile quran-library">
            <div class="container">
                <div class="section-title">
                    <h3> {{trans('library.Librarys')}}</h3>
                </div>
                <div class="row">
                   
                    <div class="col-md-12 col-sm-12 col-xs-12">

                        <div class="student-section-content card">

                            <div class="tab-content">
                                <div>
                                    <div class="section-title bg-blue">
                                        <h3>{{$subcategoryname->sub_cat_name}}</h3>
                                    </div>
									
                                    <div class="library-item">
                                        <ul class="list-unstyled no-margin no-padding">
                                            <div class="no-margin no-padding row">
												
											@if($quranitemdata->count() > 0)												
												@foreach($quranitemdata as $list)				
												  <li class="col-md-3 col-sm-4 col-xs-12">
                                                    <div class="card hoverable" data-toggle="tooltip" title="" data-original-title="Surah Al-Fatihah ( The Opening )">
                                                        <a href="#"><img src="{{ asset('images/library/book.png') }}" class="img-responsive align-center" alt=""></a>
                                                        <span class="text-overflow">{{$list->item_name}} </span>
														@if($list->mp3_link)
															<div id="jp_container_514" class="jp_container_1">
																<a class="library-button common-class btn bg-info waves-effect jp-play" id="play-button" onclick="openAudioPlayer({{$list->id}})"><i class="fa fa-play"></i>{{trans('library.Play')}}</a>
																<a id="close-button" onclick="pauseAudionPlayer()" class="library-button btn bg-warning waves-effect jp-pause" style="display: none;">{{trans('library.Pause')}}</a>
															</div>
														@else
															<div class="jp_container_1">
																<a class="library-button o3 common-class btn bg-info waves-effect jp-play" id="play-button" disabled ><i class="fa fa-play"></i>{{trans('library.Play')}}</a>
																
															</div>
														@endif
														@if($list->pdf_link)
															
															<div class="jp_container_1">
																<a class="library-button common-class btn bg-info waves-effect jp-play" href="<?php echo 'http://'.$_SERVER['HTTP_HOST'];?>/library/pdf/{{$list->pdf_link}}"><i class="fa  fa-file-pdf-o"></i>{{trans('library.Download')}}</a>
																
															</div>
														@else
															<div class="jp_container_1">
																<a class="library-button o3 common-class btn bg-info waves-effect jp-play" href="#" disabled><i class="fa  fa-file-pdf-o"></i>{{trans('library.Download')}}</a>
																
															</div>
														@endif
														@if($list->ms_link)
															<div class="jp_container_1">
																<a class="library-button common-class btn bg-info waves-effect jp-play"  href="<?php echo 'http://'.$_SERVER['HTTP_HOST'];?>/library/ms/{{$list->ms_link}}"><i class="fa fa-cloud-download"></i>{{trans('library.Download')}}</a>
																
															</div>
														@else
															<div class="jp_container_1">
																<a class="library-button o3 common-class btn bg-info waves-effect jp-play" href="#" disabled><i class="fa  fa-cloud-download"></i>{{trans('library.Download')}}</a>
																
															</div>
														@endif
													</div>
												   </li>
												@endforeach
											@else
											<li class="col-md-12 col-sm-12 col-xs-12">
												{{trans('library.There_is_no_Data')}}!
											</li>
											@endif
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
	<script  src="{{ asset('js/aplayer/library-audio-play.js') }}" type="text/javascript">	</script>
  @stop  
	