
  @extends('layouts/front-layout')
  @section('frontend-content')    

  
  <section id="content">
        <!--===== Start Instructors-list ======-->
	<section class="features inner instructors">
		<div class="container">
			<div class="section-title">
				<h3>List appointments</h3>
				@foreach($instructorInfo as $info)
				<p>Available appointments for instructor {{$info->name}} at {{$info->group_name}}</p>
				@endforeach
			</div>

			<div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="tab-content card-panel">
                        <ul class="list-unstyled no-margin no-padding">
                            @foreach($avaliableappointments as $data)
							<li class="time-item col-md-4 col-sm-6 col-xs-12">
                                <div class="media hoverable">
                                    <div class="media-left">
                                       <i class="fa fa-microphone media-object"></i>
                                    </div>
                                    <div class="media-body">
                                        <h4>{{$data->session_title}}</h4>
                                        <p><i class="fa fa-clock-o"></i>{{$data->session_time}}</p>	
										
										<form method="POST" action="/student/join" accept-charset="UTF-8">
											{{ csrf_field() }}
											<input name="appointmentId" value="{{$data->id}}" type="hidden">
                                             @if (Auth::check())               
												<button type="submit" class="btn btn-xs btn-warning pull-right">join now</button>
											@else
												<button type="submit" class="btn btn-xs btn-warning pull-right" disabled>join now</button>
											@endif
                                        </form>                    
									</div>
                                </div>
							</li>
							@endforeach
					    </ul>
					</div>
				</div>
			</div>
		</div>
    
    <div class="text-center"> 
	</div>
    
	</section>
</section>
	
  @stop  
	