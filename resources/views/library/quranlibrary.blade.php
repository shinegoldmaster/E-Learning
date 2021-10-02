
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
								@foreach($quranmenudata as $key=>$data)
								  @if($active == 0)
								    @if($key == 0)
									  <li class="active">
								    @else
									  <li>
								    @endif
								  @else
									@if($active == $data->id)
										<li class="active">
								    @else
									  <li>
								    @endif
								  @endif
										<a data-toggle="tab" class="waves-effect" href="#{{$data->id}}">
											{{$data->menu_name}}
										</a>
									</li>
								  
								@endforeach
							</ul>
						</div>                        
						
                    </div>

                    <div class="col-md-9 col-sm-9 col-xs-12">
                        <div class="student-section-content card">
                            <div class="tab-content">
							@foreach($quranmenudata as $key => $data)
							   @if($active == 0)
								 @if($key == 0)
									<div id="{{$data->id}}" class="tab-pane fade in active">
								 @else
									<div id="{{$data->id}}" class="tab-pane fade">
								 @endif
                               @else
								 @if($active == $data->id)
									<div id="{{$data->id}}" class="tab-pane fade in active">
								 @else
									<div id="{{$data->id}}" class="tab-pane fade">
								 @endif
							   @endif
									<div class="section-title bg-blue">
										<h3>{{$data->menu_name}}</h3>
									</div>
									<div class="library-item">
										<ul class="list-unstyled no-margin no-padding">
											<div class="no-margin no-padding row">
											@if($qurancategorydata->count() > 0)
											@foreach($qurancategorydata as $list)
												@if($list->menu_id == $data->id)
												<li class="col-md-4 col-sm-6 col-xs-12">
													<div class="card hoverable" data-toggle="tooltip" title="" data-original-title="">
														<a href="/quran/get-subcategory/{{$list->id}}">
															<img src="{{ asset('images/library/shiekh.png') }}" class="img-responsive align-center" alt="">
														</a>
														<a class="text-overflow" href="/quran/get-subcategory/{{$list->id}}">{{$list->cat_name}}</a>
													</div>
												</li>
												@endif
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
								
                            @endforeach   
							</div>
                        </div>
                    </div>
					
                </div>
            </div>
        </section>

    <!--===== End Quran Section ======-->

    </section>
	
  @stop  
	