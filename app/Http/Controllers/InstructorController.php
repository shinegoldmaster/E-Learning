<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Models\Group;
use App\Http\Models\Message;
use App\Http\Models\Appointment;
use App\Http\Models\Homework;
use App\Http\Models\Book;
use App\Http\Models\Joins;
use App\Http\Models\Joinbooking;
use App\Http\Models\Followup;
use App\Http\Models\Meeting;
use App\User;
use Auth;
use View;
use Redirect;
use App\Service\ZoomAPI;

class InstructorController extends Controller
{
	
	
	public function countMessage(){
		
		$userId = Auth::user()->id;			
		$myMessageCount = Message::where('to', '=', $userId)->count();		
		View::share('myMessageCount', $myMessageCount);
	}
	
    public function index(Request $request){

		$userType = Auth::user()->status;
		if($userType == '1' || $userType == '3'){
			$this -> countMessage();
			$userId = Auth::user()->id;	
			
			$afrom = "1990-01-01";
			$ato = "2120-01-01";
			if($request -> afrom) $afrom = $request -> afrom;
			if($request -> ato) $ato = $request -> ato;
			
			$joinlists = Book::getBookedHistoryByInstructorId($userId, $afrom, $ato, 10);	
			
			return view('/instructor/instructor', compact('joinlists'));
		}else{
			
			return view('/layouts/404');
		}
		
	
	}
	
	
	/*
	* appointment join Action
	* @param : id- instructor id
	* @return: check login and register join and return status(seccess or error)
	*/
	public function bookedJoin(Request $request){

		$userType = Auth::user()->status;
		if($userType == '1' || $userType == '3'){
			$this -> countMessage();	
			$userId = Auth::id();			
			$bookedId = $request -> bookedId;
			
			$join = new Joinbooking();
			$join -> book_id = $bookedId;
			$join -> jstatus = 0;
		
			if(Auth::user()->zoom){
				$zoomapi  = new ZoomAPI();
				$data['userId'] = Auth::user()->zoom;
				$data['meetingType']  = 1;
				$data['meetingTopic'] = "Quran Reciting";
				$response = $zoomapi->createAMeeting($data);
				$meeting = new Meeting();
				$meeting->start_url  = $response->start_url;
				$meeting->invite_url = $response->join_url;
				$meeting->uuid       = $response->uuid;
				$meeting->save();
				$join ->zoom = $meeting->uuid;
			}
			$join -> save();
			
			
			$book  = Book::find($join ->book_id);
			$appointment  = Appointment::find($book->appointment_id);
			$appointment->status = 3;
			$appointment->save();
			

			return redirect('/instructor/joined-history')->withErrors('Joined');
		}else{
			return view('/layouts/404');
		}
	}
	
	/*
	* appointment cancel Action
	* @param : id- instructor id
	* @return: check login and return available appoint
	*/
	public function bookedjoinCancel(Request $request){

		$userType = Auth::user()->status;
		if($userType == '1' || $userType == '3'){
			$this -> countMessage();
			$bookedjoinId = $request -> bookedjoinid;		
			$joinedbook =  Joinbooking::find($bookedjoinId);		
			$joinedbook -> notes = $request -> reason;
			$joinedbook -> jstatus = 1;	
			$bookedId = $joinedbook -> book_id;
			$joinedbook -> save();		
				
			$book = Book::find($bookedId);
			$book->status = 2;
			$book->notes = $request->reason;
			$book->save();
				
			
			return Redirect::back()->withErrors(['The appointment has been Cancelled successfully.']);		
		}else{
			
			return view('/layouts/404');
		}		
				
		
	}
	
	/*
	* booked join history Action
	* @param : id- instructor id
	* @return: check login and return available appoint
	*/
	public function joinedHistory(Request $request){

		$userType = Auth::user()->status;
		if($userType == '1' || $userType == '3'){
			$this -> countMessage();
			$userId = Auth::id();	
			$afrom = "1990-01-01";
			$ato = "2120-01-01";
			if($request -> afrom) $afrom = $request -> afrom;
			if($request -> ato) $ato = $request -> ato;
			
			$joinededHistory = Joinbooking::getBookedJoinHistory($userId, $afrom, $ato, 10);		
			return view('/instructor/bookedjoinhistory', compact('joinededHistory'));
		}else{
			
			return view('/layouts/404');
		}
			
		
	}
	
	
	/*
	* instructor info show Action
	* @param : no
	* @return: check login and return logined user's info
	*/
	public function instructorInfoShow(){

		$userType = Auth::user()->status;
		if($userType == '1' || $userType == '3'){
			$this -> countMessage();	
			$userId = Auth::id();			
			
			$user = new User();
			$instructorInfo = $user ->getUserInfoById($userId);		
			
			return view('/instructor/instructorinfoshow', compact('instructorInfo'));

		}else{
			
			return view('/layouts/404');
		}
			
	}
	
	/*
	* instructor info update Action
	* @param Posted user Data
	* @return: success or error
	*/
	public function instructorInfoUpdate(){

		$userType = Auth::user()->status;
		if($userType == '1' || $userType == '3'){
			$this -> countMessage();		
			$userId = Auth::id();	
			
			$user = User::find($userId);
			if($_POST['newpass'] && $_POST['renewpass']){
				if($_POST['newpass'] == $_POST['renewpass']){
					$user -> password = bcrypt($_POST['newpass']);
				}else{
					$error = "New Password must be same Re-Enter Password!";				
					return Redirect::back()->withErrors($error);
					
				}			
			}		
			
			$user -> firstname 	= $_POST['first_name1'];
			$user -> lastname 	= $_POST['last_name1'];
			$user -> name 		= $_POST['username'];
			$user -> email 		= $_POST['email1'];		
			$user -> gender 	= $_POST['gender'];
			$user -> language 	= $_POST['language'];
			$user -> age 		= $_POST['age1'];
			$user -> country 	= $_POST['country1'];
			$user -> phone 		= $_POST['phone1'];
			$user -> skype 		= $_POST['skype1'];
			$user -> status 	= $_POST['user-status2'];
			$user -> notes 		= $_POST['notes1'];
			$user -> group_id 	= $_POST['gender'];
			
			$user -> whatsapp 	= $_POST['cwhatsapp'];
			$user -> soma 		= $_POST['csoma'];
			$user -> line 		= $_POST['cline'];
			$user -> viber 		= $_POST['cviber'];
			
			$user -> save();
				
			return Redirect::back()->withErrors(['Succsssfully Updated!']);

		}else{
			
			return view('/layouts/404');
		}
	}
	
	/**************** Homework Action *************/
	
	/*
	* register Homework Action
	* @param Posted message data, recently appointment, from-logined
	* @return: success or error
	*/
	
	public function addHomework(Request $request){

		
		$userType = Auth::user()->status;
		if($userType == '1' || $userType == '3'){
			$this -> countMessage();	
			if($request -> appointment == ""){
				return Redirect::back()->withErrors(['Appointment must be select!']);
				exit;
			}		
			$homework = new Homework();
			
			if(($request -> inputMethod )== 'file'){
				$uploadsong = $request->homework_file;
				if(!$uploadsong){
					return Redirect::back()->withErrors(['Homework voice must be upload!']);
					exit;
				}else{
					$file_name = time(). '.'. $uploadsong->getClientOriginalExtension();
					$uploadsong->move(public_path('audio/homework'), $file_name);	
					$homework -> homework_data 	= $file_name;

				}
			}else{
				$homework -> homework_data 	= $request -> voicerecordinput;
			}
			
			$homework -> book_id = $request -> appointment;			
			$homework ->contents = $request -> notes;
			$homework -> status	= 0;
			
			$homework -> save();	
			return Redirect::back()->withErrors(['Succsssfully Sent!']);

		}else{
			
			return view('/layouts/404');
		}
		
	}
	
	/* 
	* get recently appointment data
	* @param : no
	* @return: check login and return recently appointment data(time:instructor-name)
	*/
	public function getAvailableAppointmentData(){

		$userType = Auth::user()->status;
		if($userType == '1' || $userType == '3'){
			$this -> countMessage();
			$userId = Auth::id();				
			$appointmentData = Joinbooking::getAvailableAppointDataByInsturctorID($userId);		
			return view('/instructor/homeworkadd', compact('appointmentData'));
			

		}else{
			
			return view('/layouts/404');
		}
	}
	
	/* 
	* Get Homework Audion data by homework_id
	* @param : homework_id
	* @return: check login and return Homework Audio Url 
	*/
	public function showHomeworkAudio($id){

		$userType = Auth::user()->status;
		if($userType == '1' || $userType == '3'){
			$this -> countMessage();
			$homework = Homework::find($id);
			$audio_data = $homework -> homework_data;
			$audio_src = 'audio/homework/'.$audio_data;	
			
			return view('instructor/showhomeworkaudio', compact('audio_src'));
		}else{
			
			return view('/layouts/404');
		}
		
				
	}

	
	/* 
	* Homework show Action
	* @param : no
	* @return: check login and return logined user's info
	*/
	public function showHomeworkHistory(Request $request){

		$userType = Auth::user()->status;
		if($userType == '1' || $userType == '3'){
			$this -> countMessage();
			$userId = Auth::id();
			$afrom = "1990-01-01";
			$ato = "2120-01-01";
			if($request -> afrom) $afrom = $request -> afrom;
			if($request -> ato) $ato = $request -> ato;
			
			$homeworkhistorydata = Homework:: getHomeworkHistoryDataByInstructorID($userId, $afrom, $ato, 10);
			
			return view('/instructor/homeworkhistory', compact('homeworkhistorydata'));
				

		}else{
			
			return view('/layouts/404');
		}
	}
	
	/**************** Messages Action *************/
	
	/*
	* register message Action
	* @param Posted message data, to, from-logined
	* @return: success or error
	*/
	public function sendMessages(Request $request){

		$userType = Auth::user()->status;
		if($userType == '1' || $userType == '3'){
			$this -> countMessage();	
			$from = Auth::id();	
			//var_dump($request->receiver);exit;
			if(!$request->receiver){			
				$error = "Please, select receiver!";			
				return Redirect::back()->withErrors($error);
				exit;
			}		
			
			$message = new Message();
			$message -> to 		= $request->receiver;
			$message -> from 	= $from;
			
			$msg    			= $request->msg;
			$replacedMsg 		= str_replace(',', ' ', $msg);
			$title 				= substr($replacedMsg, 0, 7) . "...";
			$message ->contents = $replacedMsg;
			$message -> title	= $title;
			
			$message -> save();
		
			return redirect('/instructor/msgs-history')->withErrors('Succsssfully Sent!');
		}else{
			
			return view('/layouts/404');
		}
		
	}
	
	/* 
	* get Recipienter Data = get instructor list
	* @param : no
	* @return: check login and return logined instructor list(id, name)
	*/
	public function getRecipienterList(){

		$userType = Auth::user()->status;
		if($userType == '1' || $userType == '3'){
			$this -> countMessage();	
			$userId = Auth::id();
			$recipienterlist = User::getAvailableStudentListForSendMessage($userId);
			
			return view('/instructor/msgsend', compact('recipienterlist'));
				
		}else{
			
			return view('/layouts/404');
		}
			
	}
	
		/* 
	* Message show Action
	* @param : no
	* @return: check login and return logined user's info
	*/
	public function showMessageHistory(Request $request){

		$userType = Auth::user()->status;
		if($userType == '1' || $userType == '3'){
			$this -> countMessage();
			$userId = Auth::id();
			$afrom = "1990-01-01";
			$ato = "2120-01-01";
			if($request -> afrom) $afrom = $request -> afrom;
			if($request -> ato) $ato = $request -> ato;		
			
			$messagehistory = Message::getSendMessageHistoryDataByUserID($userId, $afrom, $ato, 10);
			
			return view('/instructor/sendmsgshistory', compact('messagehistory'));
				
		}else{
			
			return view('/layouts/404');
		}
		
	}
	
	
	/* 
	* Message show Action
	* @param : no
	* @return: check login and return logined user's info
	*/
	public function showReceivedMessageHistory(Request $request){

		$userType = Auth::user()->status;
		if($userType == '1' || $userType == '3'){
			$this -> countMessage();
			$userId = Auth::id();
			$afrom = "1990-01-01";
			$ato = "2120-01-01";
			if($request -> afrom) $afrom = $request -> afrom;
			if($request -> ato) $ato = $request -> ato;				
			
			$messagehistory = Message:: getReceivedMessageHistoryDataByUserID($userId, $afrom, $ato, 10);
			
			return view('/instructor/receivemsgshistory', compact('messagehistory'));
					
		}else{
			
			return view('/layouts/404');
		}
		
	}
	
	/**************** Voice Room Action *************/
	
	/* 
	* Voice Room Action
	* @param : no
	* @return: currently available booked and joined data
	*/
	public function voiceRoom(){

		$userType = Auth::user()->status;
		if($userType == '1' || $userType == '3'){
			$this -> countMessage();
			$userId = Auth::id();
			$currentTime	= strtotime(date('Y-m-d H:i:s'));
			$currentDate	= date('d/m H:i');
			$voiceroomdata = Joinbooking:: getInstructorAvaliableVoiceRoomData($userId);
			$studentId = Joinbooking::getAvailableStudentId($userId);
			
			return view('/instructor/voiceroom', compact('voiceroomdata','currentTime', 'currentDate', 'userId', 'studentId'));
				
		}else{
			
			return view('/layouts/404');
		}
		
	}
	
	/* 
	* Voice Room End Action
	* @param : joinbookingid
	* @return: Change joinbooking's jstatus = 2(completed) and book's status = 3(attended)
	*/
	public function voiceRoomEnd(Request $request){

		$userType = Auth::user()->status;
		if($userType == '1' || $userType == '3'){
			$this -> countMessage();
			$userId = Auth::id();
			$joinbookingid 	= $request -> joinbookingid;		
			
			$joinbooking = Joinbooking::find($joinbookingid);
			$joinbooking -> jstatus = 2;
			$bookid = $joinbooking -> book_id;
			$joinbooking -> save();
			
			$this -> saveFollowup($userId, $joinbookingid);
			
			$book = Book::find($bookid);
			$book -> status = 3;
			$book -> notes = "Finished...";
			$book -> save();
			return redirect('/instructor/joined-history');	
		}else{
			
			return view('/layouts/404');
		}
		
	}
	
	public function saveFollowup($uid, $jid){

		$userType = Auth::user()->status;
		if($userType == '1' || $userType == '3'){
			$this -> countMessage();
			$data 	= Followup::getRelateFollowData($jid);
			
			$time 			= $data -> session_time;
			$category_id 	= $data -> category_id;
			$student_id 	= $data -> student_id;
			
			
			$seconds    				= strtotime($time);
			$dates 						= date('Y-m-d', $seconds);
			$weeks 						= date('l', $seconds);
			$months 					= date('m');
			$ref_num 					= "198805141110" + date('Ym');
		
			$follow 					= new Followup();
			$follow -> ref_num  		= $ref_num;
			$follow -> instructor_id 	= $uid;
			$follow -> joinbooking_id 	= $jid;
			$follow -> material_id 		= $category_id;		
			$follow -> student_id 		= $student_id;
			
			$follow -> date_name 			= $dates;
			$follow -> week_name 			= $weeks;
			$follow -> month_name 		= $months;
			
			$follow -> save();
		}else{
			
			return view('/layouts/404');
		}
		
		
	}
	/**************** Follow up Action *************/
	
	/* 
	* get Own Student list
	* @param : no
	* @return: Own Student List
	*/
	public function getOwnStudentList(){

		$userType = Auth::user()->status;
		if($userType == '1' || $userType == '3'){
			$this -> countMessage();
			$userId = Auth::id();
			$studentList = User::getOwnStudentList($userId, 10);
			
			return view('/instructor/showstudentlist', compact('studentList'));
				
		}else{
			
			return view('/layouts/404');
		}
		
	}
	
	/* 
	* get Follow up data
	* @param : student_id
	* @return: Follow up data
	*/
	public function getFollowUpData($id){

		$userType = Auth::user()->status;
		if($userType == '1' || $userType == '3'){
			$this -> countMessage();
			$userId = Auth::id();
			$studentName = User::where('id', '=', $id)->first();
			$currentMonth = date('m');
			
			$followData = Followup::getFollowUpData($id, $currentMonth);
			//var_dump($followData);exit;
			return view('/instructor/showfollowup', compact('studentName', 'currentMonth', 'followData'));
		}else{
			
			return view('/layouts/404');
		}
		
			
	}
	
	/* 
	* Update Followup Data
	* @param : Form data
	* @return: Follow up data
	*/
	public function updateFollowUpDate(Request $request){

		$userType = Auth::user()->status;
		if($userType == '1' || $userType == '3'){
			$this -> countMessage();
			$followid = $request -> followid;
			$followup = Followup::find($followid);
			$followup->notes = $request->notes;
			$followup->grade_from = $request->grade_from;
			$followup->review_to = $request->review_to;
			$followup->review_from = $request->review_from;
			$followup->grade_to = $request->grade_to;
			$followup->memorize_to = $request->memorize_to;
			$followup->memorize_from = $request->memorize_from;
			//$followup->iname = $request->iname;
			$followup->group_section = $request->group_section;
			$followup -> save();		
			return Redirect::back()->withErrors(['Succsssfully Updated!']);	
		}else{
			
			return view('/layouts/404');
		}
		
	}
	
	
	public function zoomrequest(Request $request){
		$userType = Auth::user()->status;
		if($userType == '1'){
			$email = Auth::user()->email;
			$zoomapi  = new ZoomAPI();
			$data = array();
			 
			$data['userEmail'] = $email;
			$data['userType']  = 1;
			$response  = $zoomapi->createAUser($data);
			return redirect('/instructor/instructor-info-show')->withErrors(['Succsssfully Sent!']);
		}
		else
			return view('/layouts/404');
	}
	
	public function zoomcheck(Request $request){
		$userType = Auth::user()->status;
		if($userType == '1'){
			$zoomapi  = new ZoomAPI();
			$response = $zoomapi->listUsers();
			if($response->users !== null){
				$users = $response->users;
				foreach($users as $user){
					if($user->email == Auth::user()->email){
						$useritem  = User::find(Auth::user()->id);
						$useritem->zoom = $user->id;
						$useritem->save();
						return redirect('/instructor/instructor-info-show')->withErrors(['Verified.']);
					}
				}
			}
			return redirect('/instructor/instructor-info-show')->withErrors(['Not Verified']);
		}
		else
			return view('/layouts/404');
	}
	
	
	
}
