
@extends('layouts/student-dashboard')
@section('student-dashboard')    	
<link href="{{ asset('css/realtimechat/voiceroomtextchat.css') }}" rel="stylesheet">	
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
				<div class="section-title bg-blue">
					<h3>{{trans('student.Voice_Room')}}</h3>
				</div>
					@if(!isset($voiceroomdata))
					<div class="messages-container" style="height: 100%">
						<div class="widget eboss no-padding no-margin">
							<div class="disable-overlay">
								<div class="disable-body">
									<div class="display-table">
										<div class="display-cell">
											<p class="text-center">
												{{trans('student.There_is_NO_Joined_History')}}!
											</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					@else
					<style>
						#messagecountstudent{
							position: absolute;
							top: 20px;
							right: 30px;
							width: 35px;
							height: 20px;
							background: red;
							border-radius: 50%;
							z-index: 50;
							color: white;
							display:none;
						}
					</style>
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
                        <div id="section-1">
						
						
							<div class="section-title bg-green">
								
								<span>{{$voiceroomdata->group_name}}</span>
								<span>{{$voiceroomdata->session_title}} </span>
								<?php $timediff = $voiceroomdata->convert_time - $currentTime;
								//$timediff = 5;
								?>				
								<input class="oldcountdiff" type="hidden" value="{{$timediff}}" />
										
								<input class="countdiff" type="hidden" value="{{$timediff}}" />			
								<input class="countdiff1" type="hidden" value="{{$voiceroomdata->convert_time}}" />			
								<input class="countdiff2" type="hidden" value="{{$currentTime}}" />			
							</div>
							<div class="student-room padding-20">
								<div class="timer-bar" id="timer-bar" style="">
									
								</div>

								<div class="panel no-border">
									<div class="row">
										<div class="col-md-3 col-sm-4 col-xs-12">
										<div id="messagecountstudent"></div>
										<input id="defaultMsgCountStudent" value="" type="hidden">
											<label for="">
												<i class="fa fa-user"></i>
												{{trans('student.instructor')}}
											</label>
											<a class="instructor_195 btn bg-success waves-effect" title="Online">
												{{$voiceroomdata->name}}
											</a>
											<a class="chat-box-open btn bg-warning  waves-effect" title="Chat now">
												<i class="fa fa-comments"></i>
											</a>
										</div>

										<div class="col-md-4 col-sm-4 col-xs-12">
											<label for=""><i class="fa fa-calendar"></i>{{trans('student.Appointment')}}</label>
											<span>
												{{$voiceroomdata->session_time}}
											</span>
										</div>

										<div class="col-md-5 col-sm-4 col-xs-12">
											<label for=""><i class="fa fa-clock-o"></i>{{trans('student.Time_Now')}}</label>
											<span>
											<i class="fa fa-clock-o fa-right"></i>
												{{trans('student.according_to_local_time')}}
												<time>
												{{$currentDate}}
											</time>
											</span>
											
										</div>
									</div>
								</div>
								
								<div class="panel no-border session-content hide">
									<div class="raw clearfix">
										<div class="col-sm-12 text-left" style="margin-top: 20px;" data-services-button="">

											@if($voiceroomdata->zoomdetails !== null)
												<a href="{{$voiceroomdata->zoomdetails->invite_url}}" target="_blank" class="btn bg-warning">
													<i class="fa fa-zoom"></i>
													{{trans('instructor.zoom')}} 
												</a>
											@endif
											
											@if(0)
											<a href="http://go.teamviewer.com/v11/m47713368" target="_blank" class="btn bg-warning">
												<i class="fa fa-zoom"></i>
												teamviewer
											</a>
											@endif
												
												
										</div>
										
										<div class="col-sm-12 text-left" style="margin-top: 20px;" data-services-button="">
													{{trans('instructor.please_use_zoom')}} 
										</div>
										
										
									</div>
								</div>
								
								<div class="card bg-info">
									<h4 id="callStatus">{{trans('student.Ready')}}</h4>
									<input name="afrom" id="afrom" class="datepicker picker__input homework_from"  tabindex="-1"  type="hidden">
									<input name="afrom" id="afrom" class="datepicker picker__input homework_to"  tabindex="-1"  type="hidden">
									<?php  if($_SERVER['SERVER_PORT'] == '80'){
										$protocal = "http://";
									}else{
										$protocal = "https://";
									};  ?>
									<iframe style="width: 100%;" src=" <?php 
									
									
									
									echo $protocal.$_SERVER['HTTP_HOST'];?>/voicechat?number={{$userId}}&receiverid={{$instructorId->id}}"></iframe>
									
									

									<div class="connect-counter">
										<h6>مدة الإتصال</h6>
										<p id="callStopWatch"></p>
									</div>

								</div>
							</div>
						</div>
						
						<!-- start chat    -->
						<div class="container chat-container">
							 <div class="row">
							  <div class="panel panel-primary" style="background-color: #f5f5f5;">
							   <div class="panel-heading" id="accordion">
									<span class="fa fa-user"></span> <span class="user-name">{{$voiceroomdata->name}}</span>
									
									<div class="btn-group pull-right">					 
									 <a type="button" class="chat-box-close btn-default btn-xs">
									  <i class="fa fa-close"></i>
									 </a>
									</div>
								  
								   <div class="btn-group pull-right" style="margin-right:5px;">
									 <a type="button" id="chat-box-min-max" class="btn-warning  btn-xs" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
									  <i class="fa fa-minus"></i>
									 </a>					 
									</div>
							   </div>
							   <div class="panel-collapse collapse" id="collapseOne">
								
								<div id="chat-body" class="panel-body">
								 <ul id="chat-contents" class="chat">
								 </ul>
								</div>
								<div class="panel-footer">
								 <form id="form-chat" action="#"> 
								 {{ csrf_field() }}
								  <div class="input-group">
								   <input id="send-message" type="text" class="input-sm" placeholder="Type your message here..." />
								 
								   <input type="hidden" id="reciever_id" value="{{$instructorId->id}}" />			
								   <input type="hidden" id="my_name" value="{{ Auth::user()->name }}" />					  
								   <input type="hidden" id="receiver_name" value="{{$voiceroomdata->name}}" />					  
								     <span class="input-group-btn">
									<input type="button" class="btn btn-warning btn-sm" id="btn-chat" value="Send"  />
								   </span>
								  </div>
								 </form>
								</div>
							   </div>
							  </div>
							 </div>
						</div>
						<!--  end chat    -->
						
						<a href="#" data-toggle="modal" data-target="#time_up_alert"  id="time_alret_button" style="display:none;"></a>
						
						<div class="modal fade in" id="time_up_alert" role="dialog" style="display: none; ">
							<div class="modal-dialog">					
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">×</button>
										<h4 class="modal-title">{{trans('student.Time_Up')}}!
										</h4>
									</div>
									<div class="modal-body text-center">
										<span>{{trans('student.Time_left_10_minutes')}}!<br>
										{{trans('student.Please_ready')}}!</span>
									</div>
									<div class="modal-footer">									
										<button id="close" class="btn btn-danger" data-dismiss="modal">{{trans('student.OK')}}</button>
										
									</div>
								</div>								
							</div>
						</div>
					
                    </div>
					@endif
                </div>
            </div>
			
        </div>
    </div>
	
	<script  src="{{ asset('js/voicechat/student.js') }}" type="text/javascript">	</script>
	<script  src="{{ asset('js/realtimechat/voiceroomtextchatforstuednt.js') }}" type="text/javascript">	</script>
</section>
	
  @stop  
	