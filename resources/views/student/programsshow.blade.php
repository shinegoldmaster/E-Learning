

  @extends('layouts/student-dashboard')
  @section('student-dashboard')        
	     
					
<section class="profile">
    <div class="container">
        <div class="section-title">
            <h3>{{trans('student.Student_Dashboard')}}</h3>
        </div>

        <div class="row">
            <!-- sub-main -->
            <div class="col-md-3 col-sm-12">				
				@include('student.student-leftmenu')	
			</div>
            <div class="col-md-9 col-sm-9 col-xs-12">
                <div class="student-section-content card hoverable">
                    <div class="tab-content">
                        <!-- Page Content-->
						<div id="section-1" class="features inner">

						<div class="section-title bg-blue">
							<h3>{{trans('student.List_programs')}}</h3>
						</div>

							<ul class="list-unstyled no-margin no-padding">
								@foreach($programData as $data)
								<li class="col-md-4 col-sm-6 col-xs-12">
									@if($data->id == '1')
										<div class="card hoverable bg-warning padding-20">
									@else
										<div class="card hoverable bg-danger padding-20">
									@endif
										<?php $img_url = 'images/icon/'.$data->group_icon; ?>
										<img src="{{ asset($img_url) }}" class="img-responsive" alt="">
										<h4>{{$data->group_name}}</h4>
										
										@if($data->group_lang_id == '1')
											<label class="text-warning">English</label>
										@else
											<label class="text-warning">العربية</label>
										@endif
										
										<p> {{$data->group_des}}</p>
										<a href="/student/instructors-show" class="btn waves-effect" style="width: 40%">{{trans('student.instructor')}}</a>
										</div>
									</div>
								</li>
								@endforeach
							</ul>
						</div>

                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
	
	
  @stop  
	