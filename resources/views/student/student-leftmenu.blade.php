<div class="student-section _v2">
	<div class="card hoverable student-img text-center">
		<img src="{{ asset('images/student/student-img-2.png') }}" class="img-responsive align-center img-circle" alt="">
		<h4>{{ Auth::user()->name }} </h4>
	</div>
	<ul class="nav nav-tabs">
		<li><a href="/student/voice-room" class=" waves-effect">
				<i class="fa fa-microphone"></i>
				<span>{{trans('student.Voice_Room')}}</span>
			</a>
		</li>

		<li><a href="/student/programs-show" class=" waves-effect">
				<i class="fa fa-microphone"></i>
				<span>{{trans('student.Take_appointment')}}</span>
			</a>
		</li>

		<li><a href="/student/appointments-history" class="waves-effect">
				<i class="fa fa-history"></i>
				<span>{{trans('student.Appointments_History')}}</span>
			</a>
		</li>

		<li><a href="/student/homework-add" class="waves-effect">
				<i class="fa fa-plus"></i>
				<span>{{trans('student.Add_Homework')}}</span>
			</a>
		</li>

		<li><a href="/student/homework-history" class="waves-effect">
				<i class="fa fa-book"></i>
				<span>{{trans('student.Homework_History')}}</span>
			</a>
		</li>

		<li><a href="/student/msg-send" class="waves-effect">
				<i class="fa fa-send"></i>
				<span>{{trans('student.Send_Msg')}}</span>
			</a>
		</li>

		<li><a href="/student/msgs-history" class="waves-effect">
				<i class="fa fa-envelope"></i>
				<span>{{trans('student.Messages_History')}}</span>
			</a>
		</li>

		<li><a href="/student/msgs-received" class="waves-effect">
				<i class="fa fa-inbox"></i>
				<span class="badge">{{$myMessageCount}}</span>
				<span>{{trans('student.Received_Messages')}}</span>
			</a>
		</li>

	</ul>
</div>