

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
                        <div id="section-10">
							<div class="homework-history">							  				@if($errors->any())							
								<section class="widget-title">
									<div class="alert alert-success">
										<p class="text-center">
											{{$errors->first()}}								
										</p>
									</div>
								</section>						
								@endif
								<div class="section-title bg-blue">
									<h3>{{trans('student.Messages_History')}}</h3>
								</div>
								@if(!$messagehistory)
								<div class="messages-container" style="height: 100%">
									<div class="widget eboss no-padding no-margin">
										<div class="disable-overlay">
											<div class="disable-body">
												<div class="display-table">
													<div class="display-cell">
														<p class="text-center">
															{{trans('student.There_NO_received_messages')}}
														</p>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								@else
								
								
								<div class="row">
									<form method="POST" action="/student/msgs-history" accept-charset="UTF-8" class="form-horizontal bordered" role="form">
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
								
								<div class="padding-right-20 padding-left-20 text-center">
									<table class="table table-bordered table-responsive">
										<thead>
											<tr>
												<td>#</td>
												<th>{{trans('student.Message_Subject')}}  </th>
												<th>{{trans('student.Message')}} </th>
												<th>{{trans('student.Receiver')}} </th>
												<th>{{trans('student.Date')}} </th>
											</tr>
										</thead>
										<tbody>
										@foreach($messagehistory as $item)
											<tr>
												<td>{{$item->id}}</td>
												<td>{{$item->title}}</td>
												<td><a href="#" class="btn btn-blue" data-toggle="modal" data-target="#msg_{{$item->id}}">{{trans('student.Show_Message')}}</a></td>
												<td>{{$item->name}}</td>
												<td><label for="">
														{{$item->created_at}}
													</label>
												</td>
											</tr>
										@endforeach
										</tbody>
									</table>
									@foreach($messagehistory as $data)
									<div class="modal fade" id="msg_{{$data->id}}" role="dialog" style="display: none;">
										<div class="modal-dialog">
											
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal">×</button>
													<h4 class="modal-title">{{trans('student.Message')}}</h4>
												</div>
												<div class="modal-body">
													<p>{{$data->contents}}</p>
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-danger" data-dismiss="modal">{{trans('student.Close')}}</button>
												</div>
											</div>
										</div>
									</div>
									@endforeach
								</div>
									<div class="text-center">{{ $messagehistory->links() }}</div>
								@endif
								
							</div>
							
							
							
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
</section>
	
  @stop  
	