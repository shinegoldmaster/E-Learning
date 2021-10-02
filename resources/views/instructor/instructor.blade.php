
@extends('layouts/instructor-dashboard')
@section('instructor-dashboard')        
	     					
<section class="profile">
    <div class="container">
        <div class="section-title">
            <h3>{{trans('instructor.instructor_Dashboard')}}</h3>
        </div>

        <div class="row">
            <!-- sub-main -->
            <div class="col-md-3 col-sm-12">				
				@include('instructor.instructor-leftmenu')	
			</div>
            <div class="col-md-9 col-sm-9 col-xs-12">
                <div class="student-section-content card hoverable">
                    <div class="tab-content">
                        <!-- Page Content-->
						<div id="section-1" class="features inner _v2">

						<div class="section-title bg-blue">
							<h3>{{trans('instructor.Booking_List')}}</h3>
						</div>
						
						@if(count($joinlists)==0)
						<div class="messages-container" style="height: 100%">
							<div class="widget eboss no-padding no-margin">
								<div class="disable-overlay">
									<div class="disable-body">
										<div class="display-table">
											<div class="display-cell">
												<p class="text-center">
													{{trans('instructor.There_NO_booked_History')}}
												</p>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						@else
						<div class="row">
							<form method="GET" action="/instructor/programs-show" accept-charset="UTF-8" class="form-horizontal bordered" role="form">
							{{ csrf_field() }}
								<div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1">
									<div class="input-field col-md-4">
										<input name="afrom" id="afrom" class="datepicker picker__input homework_from"  tabindex="-1"  type="text">
										<label for="icon_prefix">{{trans('instructor.From')}}</label>
									</div>
									<div class="input-field col-md-4">
										<input name="ato" id="ato" class="datepicker picker__input homework_to"  tabindex="-1" type="text">
										<label for="icon_prefix">{{trans('instructor.To')}}</label>
									</div>
									<div class="input-field col-md-4">
										<button type="submit" class="btn btn-danger bg-danger btn-block waves-effect text-white">{{trans('instructor.Search')}}</button>
									</div>
								</div>
							</form>
						</div>
						
						
						<div class="padding-right-20 padding-left-20 text-center">
							<table class="table table-bordered table-responsive">
								<thead>
									<tr>										
										<td>#</td>
										<th>{{trans('instructor.Time')}}</th>
										<th>{{trans('instructor.Action')}} </th>								
									</tr>
								</thead>
								<tbody>
									@foreach($joinlists as $key=> $list)
									
									<tr>
										<form method="POST" action="/instructor/join" accept-charset="UTF-8" class="form-horizontal bordered" role="form">
										{{ csrf_field() }}						
											<td>{{$key+1}}</td>
											<td>{{$list->session_time}}</td>
											<input name = "bookedId" value="{{$list->id}}"  type="hidden" />
											<td><button type="submit" class="btn btn-xs btn-warning pull-right">{{trans('instructor.join_now')}}</button>
											</td>	
										</form>	
									</tr>
								
									@endforeach
								</tbody>
							</table>
							
						</div>
						
						@endif
							
						</div>

                    </div>
					<div class="text-center">
					{{$joinlists->links()}}
					</div>
                </div>
            </div>

        </div>
    </div>
</section>
	
  @stop  
	