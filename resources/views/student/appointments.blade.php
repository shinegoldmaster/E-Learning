

  @extends('layouts/student-dashboard')
  @section('student-dashboard')        
	     
					
<section class="profile">
    <div class="container">
        <div class="section-title">
            <h3>{{trans('student.Student_Dashboard')}}</h3>
        </div>
		@if($errors->any())							
		<section class="widget-title">
			<div class="alert alert-success">
				<p class="text-center">
					{{$errors->first()}}								
				</p>
			</div>
		</section>						
		@endif
        <div class="row">
            <!-- sub-main -->
            <div class="col-md-3 col-sm-12">				
				@include('student.student-leftmenu')	
			</div>
			
			
			<div class="col-md-9 col-sm-9 col-xs-12">
                <div class="student-section-content card hoverable">
                    <div class="tab-content">
                        <!-- Page Content-->
                        
						<!--===== Start Instructors-list ======-->
						<section class="features inner">
							
							<div class="section-title bg-blue">
								@foreach($instructorInfo as $info)
								<h3>Available appointments for instructor {{$info->name}} at {{$info->group_name}}</h3>
								@endforeach
							</div>

							<div class="row">
								<div class="col-md-12 col-sm-12">
									<ul class="list-unstyled no-margin no-padding">
										@foreach($avaliableappointments as $data)
										<li class="time-item col-md-6 col-sm-3 col-xs-12">
											<div class="media hoverable">
												<div class="media-left">
													<i class="fa fa-microphone media-object"></i>
												</div>
												<div class="media-body">
													<h4>{{$data->session_title}} </h4>
													<p><i class="fa fa-clock-o"></i>{{$data->session_time}}</p>
													<form method="POST" action="/student/join" accept-charset="UTF-8">
														{{ csrf_field() }}
														<input name="appointmentId" value="{{$data->id}}" type="hidden">			
														<button type="submit" class="btn btn-xs btn-blue pull-right">{{trans('student.join_now')}}</button>
													</form>
																						</div>
											</div>
										</li>
										@endforeach
									</ul>

								</div>
							</div>
						</section>
					</div>
				</div>
			</div>
			<div class="text-center">
			{{$avaliableappointments->links()}}
			</div>
		</div>
		
    </div>
</section>
	
	
  @stop  
	