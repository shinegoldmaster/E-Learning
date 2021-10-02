

  @extends('layouts/student-dashboard')
  @section('student-dashboard')        

  <script src="{{ asset('js/aplayer/audio.min.js') }}"></script>        
  <script>
      audiojs.events.ready(function() {
        audiojs.createAll();
      });
  </script>				
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
                            
						<div id="section-6">
							<div class="homework-history">
								<div class="section-title bg-blue">
									<h3>{{trans('student.Homework_History')}}</h3>
								</div>
								
								
								
								<div class="row">
									<form method="POST" action="/student/homework-history" accept-charset="UTF-8" class="form-horizontal bordered">
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
								
								@if(!$homeworkhistorydata)
								<div class="messages-container" style="height: 100%">
									<div class="widget eboss no-padding no-margin">
										<div class="disable-overlay">
											<div class="disable-body">
												<div class="display-table">
													<div class="display-cell">
														<p class="text-center">
															{{trans('student.There_is_NO_HomeWork')}}.
														</p>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								@else
									
								<div class="padding-right-20 padding-left-20 text-center">
									<table class="table table-bordered table-responsive">
										<thead>
											<tr>
												<td>#</td>
												<th>{{trans('student.Appointment')}} </th>
												<th>{{trans('student.Homework')}} </th>                      
												<th>{{trans('student.Status')}} </th>
											</tr>
										</thead>
										<tbody>
										@foreach($homeworkhistorydata as $item)
											<tr>
												<td>{{$item->id}}</td>
												<td>{{$item->appoint}}</td>
												<td>
													<a href="#" class="btn bg-warning" data-toggle="modal" data-target="#my_homework_{{$item->id}}">{{trans('student.Read')}}</a>
												</td>
												<td>
													@if($item->status == 0)
														<label>{{trans('student.Pending')}}</label>
													@else 
														<label>{{trans('student.Completed')}}</label>	
													@endif
												</td>
											</tr>
										@endforeach	
														   
										</tbody>
									</table>
									@foreach($homeworkhistorydata as $item)
									<div class="modal fade" id="my_homework_{{$item->id}}" role="dialog">
										<div class="modal-dialog">
											<!-- Modal content-->
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal">×</button>
													<h4 class="modal-title">{{trans('student.View')}}</h4>
												</div>
												<div class="modal-body">
													
													
													<table class="table table-bordered">
														<tbody>
														<tr>
															<td>{{trans('student.instructor')}}</td>
															<td>{{$item->iname}}</td>
														</tr>
														<tr>
															<td>{{trans('student.Appointment')}}</td>
															<td>{{$item->appoint}}</td>
														</tr>
														<tr>
															<td>{{trans('student.Maqraa')}}</td>
															<td>{{$item->gname}}</td>
														</tr>
														<tr>
															<td>{{trans('student.Homework')}}</td>
															
															<td>
																
																<div id="jp_container_314" class="jp_container_1">
																	<button class="common-class btn bg-info waves-effect jp-play" id="play-button" onclick="openAudioPlayer({{$item->id}}, 0)">{{trans('student.Play')}}</button>
																	<button id="close-button" onclick="pauseAudionPlayer()" class="btn bg-warning waves-effect jp-pause" style="display: none;">{{trans('student.Pause')}}</button>
																</div>
																				</td>
														</tr>
														<tr>
															<td>{{trans('student.Sent')}}</td>
															<td>{{$item->updated_at}}</td>
														</tr>
														<tr>
															<td>{{trans('student.Notes')}}</td>
															<td>{{$item->contents}}</td>
														</tr>
														<tr>
															<td>{{trans('student.Instructor_notes')}}</td>
															<td>{{trans('student.No_notes')}}</td>
														</tr>
														</tbody>
													</table>
											
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-danger" data-dismiss="modal">{{trans('student.Close')}}</button>
												</div>
											</div>
										</div>
									</div>
									@endforeach
									
								</div>
								@endif
							</div>
							<div class="pagination">  </div>
						</div>
	
	                </div>
                </div>
            </div>
        </div>
    </div>
</section>

	<script  src="{{ asset('js/aplayer/custom.js') }}" type="text/javascript">	</script>
	
  @stop  
	