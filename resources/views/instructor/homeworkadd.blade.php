
  @extends('layouts/instructor-dashboard')
  @section('instructor-dashboard')        
	           
	<link href="{{ asset('css/voicerecord/voice-record.css') }}" rel="stylesheet" />				
	<script src="https://cdn.webrtc-experiment.com/RecordRTC.js"></script>
    <script src="https://cdn.webrtc-experiment.com/gif-recorder.js"></script>
    <script src="https://cdn.webrtc-experiment.com/getScreenId.js"></script>  
    <script src="https://cdn.webrtc-experiment.com/gumadapter.js"></script>       
					
	
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
                            
    
    <div id="section-5" class="add-homework">
		
        <div class="section-title bg-blue">
            <h3>{{trans('instructor.Add_Homework')}}</h3>
        </div>
		@if($errors->any())
			<div class="error">{{$errors->first()}}</div>
		@endif
        <div class="row">
            <form method="POST" action="/instructor/homeworks-add" accept-charset="UTF-8" id="" class="form-horizontal bordered add-homeworks" autocomplete="off" enctype="multipart/form-data">
			{{ csrf_field() }}
            <div class="col-md-10 col-md-offset-1">
                <div class="input-field">
                    <div class="box">						  
					  <select class="wide" id="appointment" name="appointment" required>									
							<option value="" selected>{{trans('instructor.Appointment')}}</option>
							
							@foreach($appointmentData as $item)
								<option value="{{$item->id}}">{{$item->session_time}} : {{$item->name}}</option>
							@endforeach
						
					  </select>
					  <script>
						$('#appointment').niceSelect();
					  </script>
				    </div>                    
                </div>

                
				<div id="inputMethod" class="row" style="margin-top: 90px" hidden="">
					<div class="col-md-6 col-sm-6 col-xs-6">
						<label for="inputMethod" class="sm-label">{{trans('instructor.Input_Method')}}:</label>
					</div>
					<div class="col-md-6 col-sm-6 col-xs-6">
						<input id="fileUpload" name="inputMethod" checked="" value="file" type="radio">
						<label for="fileUpload" class="sm-label">{{trans('instructor.File_Upload')}}</label>
						<input id="recordHomework" name="inputMethod" value="record" type="radio">
						<label for="recordHomework" class="sm-label">{{trans('instructor.Voice_Record')}}</label>
					</div>
				</div>
				<div class="row">
					<div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-12">
						<div id="fileUpload-section" class="file-field input-field" hidden="">
							<div class="file-field input-field col-md-12">
								<div id="fileDiv" class="btn waves-effect bg-warning btn-default btn-block waves-light">
									<span id="browse"><i class="fa fa-link"></i>{{trans('instructor.Browse')}} </span>
									<input id="homework-file" value="" accept="audio/mp3" name="homework_file" type="file">
								</div>
							</div>
							<div id="clear" class="file-field input-field col-md-3" hidden="">
								<div class="btn waves-effect bg-danger btn-block waves-light">
									<span><i class="fa fa-recycle"></i>{{trans('instructor.Clear')}}</span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
				  <div id="recording-section" class="file-field input-field" hidden="">
					<section class="recordrtc">
						<h2 class="header">
							<select class="recording-media">
								<option value="record-audio">{{trans('instructor.Audio')}}</option>                   
							</select>
							<select class="media-container-format">          
							</select>
						</h2>
						<div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-12">
							<button id="record-start-button" class="custom-button-record">{{trans('instructor.Start_Recording')}}</button>
						</div>
						
						<br>
						<video controls muted></video>
						<div class="hidden-div" style="text-align: center; display:none !important; height:0px !important" >               
							<button id="save-to-disk">{{trans('instructor.Save_To_Disk')}}</button>
							<button id="open-new-tab">{{trans('instructor.Open_New_Tab')}}</button>
							<button id="upload-to-server">{{trans('instructor.Upload_To_Server')}}</button>
							<input id ="voice-record-input" type="text" value="" name="voicerecordinput" style="height: 0;border: none;margin: 0;padding: 0;" />
						</div>
					</section>
				  </div>
				  
				  
				</div>
				<div class="input-field">
					<textarea id="notes" name="notes" class="materialize-textarea" required=""></textarea>
					<label for="notes">{{trans('instructor.Notes')}}</label>
				</div>
				<div class="row text-center">
					<button type="submit" class="btn btn-blue waves-effect"><i class="fa fa-send"></i> {{trans('instructor.Send')}}</button>
					<a class="btn bg-danger waves-effect margin-bottom-30" style="color: #ffffff;" type="cancel" onclick="history.back(-1)"><i class="fa fa-ban" aria-hidden="true"></i> {{trans('instructor.Cancel')}}</a>
				</div>
				
				
					
                </div>
            </form></div>
            
        </div>
    </div>
                    </div>
                </div>
            </div>

        </div>
    
</section>
	<script  src="{{ asset('js/voice-record.js') }}" type="text/javascript"></script>		
	
    <script>
        window.useThisGithubPath = 'muaz-khan/RecordRTC';
    </script>
    <script src="https://cdn.webrtc-experiment.com/commits.js" async></script>
  @stop  
	