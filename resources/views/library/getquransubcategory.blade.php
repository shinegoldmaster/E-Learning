
  @extends('layouts/front-layout')
  @section('frontend-content')   
	<section id="content">
    <!--===== Start Quran Section ======-->
        <section class="profile quran-library">
            <div class="container">
                <div class="section-title">
                    <h3>{{trans('library.Quran_Library')}}</h3>
                </div>
                <div class="row">
                    <div class="col-md-3 col-sm-3">
                        
						<div class="student-section">
							<ul class="nav nav-tabs quranmenu active">
							  @if($quranmenudata -> count() > 0)
								@foreach($quranmenudata as $key=>$data)
								<li>
								  <a href="/quran/{{$data->id}}">
											{{$data->menu_name}}
										</a>
									</li>
								  
								@endforeach
							  @else
								<li class="active">
									{{trans('library.There_is_no_Menu')}}!
								</li>
							  @endif
							</ul>
						</div>                        
						
                    </div>

                    <div class="col-md-9 col-sm-9 col-xs-12">

                        <div class="student-section-content card">

                            <div class="tab-content">
                                <div>
                                    <div class="section-title bg-blue">
                                        <h3>{{$categoryname->cat_name}}</h3>
                                    </div>
                                    <div class="library-item">
                                        <ul class="list-unstyled no-margin no-padding">
										  	
											<div class="no-margin no-padding row">
											@if($quransubcategorydata->count() > 0)
												@foreach($quransubcategorydata as $data)
												<li class="col-md-6 col-sm-6 col-xs-12">
													<div class="card hoverable">
														<a href="/quran/get-item/{{$data->id}}"><img src="{{ asset('images/library/book.png') }}" class="img-responsive align-center" alt=""></a>
														<a href="/quran/get-item/{{$data->id}}">{{$data->sub_cat_name}}</a>
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
        </section>

    <!--===== End Quran Section ======-->

    </section>
	
  @stop  
	