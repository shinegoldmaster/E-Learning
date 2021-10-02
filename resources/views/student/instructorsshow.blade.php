

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
						<div id="section-1" class="features inner _v2">
							<div class="section-title bg-blue">
								<h3>{{trans('student.instructor')}}</h3>
							</div>
							<ul class="list-unstyled no-margin no-padding">							
								@foreach($instructorAppointData as $data)
								
								
								<li class="col-md-4 col-sm-6 col-xs-12">
								@if($data->group_id == '1')
									<div class="card hoverable bg-warning padding-20">
								@else
									<div class="card hoverable bg-danger padding-20">
								@endif
									<?php $img_url = 'images/icon/'.$data->group_icon; ?>
									<img src="{{ asset($img_url) }}" class="img-responsive" alt="">
									
									<h4>{{$data->name}}</h4>
									
									@if($data->group_lang_id == '1')
										<label class="text-warning">{{trans('student.Language')}}: English</label>
									@else
										<label class="text-warning">{{trans('student.Language')}}: العربية</label>
									@endif
									

									@if($data->total)
										<span>{{trans('student.available_sessions')}} :{{$data->total}}</span>
										<p>{{$data->group_des}}</p>
										@if($data->group_id == 1)
											<a href="/student/appointments/{{$data->id}}/"  class="btn btn-warning btn-border-warning btn-round" style="width: 40%">{{trans('student.available_sessions')}}</a>
										@elseif($data->group_id == 2)
											<a href="/student/appointments/{{$data->id}}/"  class="btn btn-danger btn-border-danger btn-round" style="width: 40%">{{trans('student.available_sessions')}}</a>
										@else
											<a href="/student/appointments/{{$data->id}}/"  class="btn btn-blue btn-border-blue btn-round" style="width: 40%">{{trans('student.available_sessions')}}</a>
										@endif

										{{-- <a href="/student/appointments/{{$data->id}}/" class="btn waves-effect" style="width: 70%">{{trans('student.available_sessions')}}</a> --}}
									@else
										<span>{{trans('student.available_sessions')}} :0</span>
										<p>{{$data->group_des}}</p>
										@if($data->group_id == 1)
											<a href="#" onclick="return false" disabled class="btn btn-warning btn-border-warning btn-round" style="width: 40%">{{trans('student.available_sessions')}}</a>
										@elseif($data->group_id == 2)
											<a href="#" onclick="return false" disabled class="btn btn-danger btn-border-danger btn-round" style="width: 40%">{{trans('student.available_sessions')}}</a>
										@else
											<a href="#" onclick="return false" disabled class="btn btn-blue btn-border-blue btn-round" style="width: 40%">{{trans('student.available_sessions')}}</a>
										@endif

										{{-- <a href="#" class="btn waves-effect" disabled style="width: 70%">{{trans('student.available_sessions')}}</a> --}}
									@endif
									</div>

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
	