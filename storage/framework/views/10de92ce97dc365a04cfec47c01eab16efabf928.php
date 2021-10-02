<div class="student-section">
	<div class="card hoverable student-img text-center">
		<img src="<?php echo e(asset('images/student/student-img-2.png')); ?>" class="img-responsive align-center img-circle" alt="">
		<h4><?php echo e(Auth::user()->name); ?> </h4>
	</div>
	<ul class="nav nav-tabs">
		<li><a href="/instructor/voice-room" class=" waves-effect">
				<i class="fa fa-microphone"></i>
				<span><?php echo e(trans('instructor.Voice_Room')); ?></span>
			</a>
		</li>

		<li><a href="/instructor/programs-show" class=" waves-effect">
				<i class="fa fa-microphone"></i>
				<span><?php echo e(trans('instructor.Take_Booked_List')); ?></span>
			</a>
		</li>

		<li><a href="/instructor/joined-history" class="waves-effect">
				<i class="fa fa-history"></i>
				<span><?php echo e(trans('instructor.Joined_History')); ?></span>
			</a>
		</li>

		<li><a href="/instructor/homework-add" class="waves-effect">
				<i class="fa fa-plus"></i>
				<span><?php echo e(trans('instructor.Add_Homework')); ?></span>
			</a>
		</li>

		<li><a href="/instructor/homework-history" class="waves-effect">
				<i class="fa fa-book"></i>
				<span><?php echo e(trans('instructor.Homework_History')); ?> </span>
			</a>
		</li>

		<li><a href="/instructor/msg-send" class="waves-effect">
				<i class="fa fa-send"></i>
				<span><?php echo e(trans('instructor.Send_Msg')); ?></span>
			</a>
		</li>

		<li><a href="/instructor/msgs-history" class="waves-effect">
				<i class="fa fa-envelope"></i>
				<span><?php echo e(trans('instructor.Messages_History')); ?> </span>
			</a>
		</li>

		<li><a href="/instructor/msgs-received" class="waves-effect">
				<i class="fa fa-inbox"></i>
				<span class="badge"><?php echo e($myMessageCount); ?></span>
				<span><?php echo e(trans('instructor.Received_Messages')); ?> </span>
			</a>
		</li>
		<li><a href="/instructor/show-student-list" class="waves-effect">
				<i class="fa fa-user"></i>				
				<span><?php echo e(trans('instructor.Show_Student_List')); ?></span>
			</a>
		</li>

	</ul>
</div>