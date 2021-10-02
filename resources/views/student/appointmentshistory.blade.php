
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
						@if($errors->any())							
						<section class="widget-title">
							<div class="alert alert-success">
								<p class="text-center">
									{{$errors->first()}}								
								</p>
							</div>
						</section>						
						@endif
                        <!-- Page Content-->
						<div id="section-3">
							<div class="section-title bg-blue">
								<h3>{{trans('student.Appointments_History')}}</h3>
							</div>

							@if(!$bookedHistory)
							<div class="messages-container" style="height: 100%">
								<div class="widget eboss no-padding no-margin">
									<div class="disable-overlay">
										<div class="disable-body">
											<div class="display-table">
												<div class="display-cell">
													<p class="text-center">
														{{trans('student.There_NO_History')}}
													</p>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							@else
							
							
							<!-- Content of appointment history -->
							<div class="row">
								<form method="GET" action="/student/appointments-history" accept-charset="UTF-8" class="form-horizontal bordered">
								{{ csrf_field() }}
								
									<div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1">
										<div class="input-field col-md-4">
											<input name="afrom" id="afrom" class="datepicker picker__input homework_from"  tabindex="-1"  type="text">
											<label for="icon_prefix">{{trans('student.From')}}</label>
										</div>
										<div class="input-field col-md-4">
											<input name="ato" id="ato" class="datepicker picker__input homework_to"  tabindex="-1" type="text">
											<label for="icon_prefix">{{trans('student.To')}}</label>
										</div>
										<div class="input-field col-md-4">
											<button type="submit" class="btn btn-blue btn-block waves-effect text-white">{{trans('student.Search')}}</button>
										</div>
									</div>
								
								</form>
							</div>

							
							<div class="time-history">
								<div class="section-title bg-blue">
									<!--h3>أحدث المواعيد</h3-->
									<h3>{{trans('student.Appointments_List')}}</h3>
								</div>

								<ul class="list-unstyled no-margin no-padding">
									@foreach($bookedHistory as $item)
									<li class="time-item col-md-6 col-sm-6 col-xs-12">
										<div class="media hoverable">
											<div class="media-left">
												<i class="fa fa-microphone media-object"></i>
											</div>
											<div class="media-body">
												<h4>{{$item->session_title}}</h4>

												<h5>{{$item->name}}</h5>
												<p><i class="fa fa-clock-o"></i>{{$item->session_time}}</p>
												
												@if($item->status == 0)
													<a href="#" data-toggle="modal" data-target="#app_{{$item->id}}" class="btn waves-effect">{{trans('student.Cancel')}} </a>
												@elseif($item->status == 1)
													<label for="canceled">{{trans('student.Reserved')}} </label>
												@elseif($item->status == 2)
													<label for="canceled">{{trans('student.Cancelled')}} </label>
												@else
													<label for="canceled">{{trans('student.Attended')}} </label>
												@endif
											</div>
										</div>
									</li>     

										@if($item->status == 0)
										<div class="modal fade in" id="app_{{$item->id}}" role="dialog" style="display: none; ">
											<div class="modal-dialog">
												<!-- Modal content-->
												<form method="POST" action="/student/appointment-cancel" accept-charset="UTF-8" class="form-horizontal bordered">
												{{ csrf_field() }}
												<input name="bookId" value="{{$item->id}}" type="hidden">
												
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal">×</button>
														<h4 class="modal-title">{{trans('student.Reason_canceling_appointment')}} :
															{{$item->session_time}}
														</h4>
													</div>
													<div class="modal-body">
														<textarea id="reason" name="reason" placeholder="Reason for canceling appointment"></textarea>
													</div>
													<div class="modal-footer">
														<button id="close" class="btn btn-danger" data-dismiss="modal">{{trans('student.Close')}}</button>
														<div id="forget-password" class="options">
															<a>
																<button type="submit" class="btn btn-info waves-effect waves-light">{{trans('student.Ok')}}</button>
															</a>
														</div>
													</div>
												</div>
												</form>
											</div>
										</div>
										@endif
										
									@endforeach        											
								</ul>
							</div>
							@endif   
						</div>
                    </div>
					<div class="text-center">
					{{$bookedHistory->links()}}
					</div>
                </div>
            </div>

        </div>
    </div>
</section>
	
  @stop  
	