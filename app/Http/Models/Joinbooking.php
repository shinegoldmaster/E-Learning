<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Http\Models\Meeting;


class Joinbooking extends Model
{
    protected $table = "joinbooking";	
	
	/*  StudentController@voiceRoom
	* get  currently available booked and joined data
	* @param : student id, from, to, pageCount
	* @return: currently available booked and joined data
	*/
	static public function getStudentAvaliableVoiceRoomData($id){
		
		$data =Joinbooking::leftJoin('book', 'joinbooking.book_id', '=', 'book.id')
					->leftJoin('appointment', 'book.appointment_id' ,'=', 'appointment.id')
					->leftJoin('join', 'appointment.join_id', '=', 'join.id')
					->leftJoin('session', 'join.session_id' ,'=', 'session.id')
					->leftJoin('users', 'join.instructor_id' ,'=', 'users.id')
					->leftJoin('group', 'session.category_id', '=', 'group.id')
					->select('joinbooking.*', 'session.session_title', 'users.name', 'appointment.session_time', 'appointment.convert_time', 'group.group_name')
					->where('book.student_id', '=', $id)	
					->where('joinbooking.jstatus', '=', '0')	
					->orderby('appointment.session_time')
					->first();
	if($data != null)	 
		if($data->zoom){
			$meeting = Meeting::where('uuid', $data->zoom)->first();
			if(isset($meeting)){
				$data->zoomdetails = $meeting;
			}
		}					
		
		
		return $data;
	}
	/*  StudentController@voiceRoom
	* get  currently available booked and joined data
	* @param : student id, from, to, pageCount
	* @return: currently available booked and joined data
	*/
	static public function getInstructorAvaliableVoiceRoomData($id){
		
		$data = Joinbooking::leftjoin('book', 'joinbooking.book_id', '=', 'book.id')
							->leftjoin('appointment', 'book.appointment_id' ,'=', 'appointment.id')
							->leftjoin('join', 'appointment.join_id', '=', 'join.id')
							->leftjoin('session', 'join.session_id' ,'=', 'session.id')
							->leftjoin('users', 'book.student_id' ,'=', 'users.id')
							->leftjoin('group', 'session.category_id', '=', 'group.id')
							->select('joinbooking.*', 'session.session_title', 'users.name', 'appointment.session_time', 'appointment.convert_time', 'group.group_name')
							->where('join.instructor_id', '=', $id)	
							->where('joinbooking.jstatus', '=', '0')
							->orderby('appointment.session_time')->first();
	if($data != null)
		if($data->zoom){
			$meeting = Meeting::where('uuid', $data->zoom)->first();
			if(isset($meeting)){
				$data->zoomdetails = $meeting;
			}
		}
		return $data;
	}
	
	/*  StudentController@voiceRoom
	* get  available Instructor Id
	* @param : student_id
	* @return: available Instructor ID
	*/
	static public function getAvailableInstructorId($id){	
		 
		$data = Joinbooking::leftjoin('book', 'joinbooking.book_id', '=', 'book.id')
					->leftJoin('appointment', 'book.appointment_id' ,'=', 'appointment.id')
					->leftJoin('join', 'appointment.join_id', '=', 'join.id')		
					->leftJoin('users', 'join.instructor_id' ,'=', 'users.id')
					->select('users.id')
					->where('book.student_id', '=', $id)						
					->where('joinbooking.jstatus', '=', '0')						
					->first();
	
		return $data;
	}
	
	
	
	
	/*  InstructorController@joinedHistory
	* get  booked join List
	* @param : instructor id, from, to, pageCount
	* @return: booked join list
	*/
	static public function getBookedJoinHistory($id,$from, $to, $pageCount){	
		
		$history = DB::table('joinbooking')
					->leftjoin('book', 'joinbooking.book_id', '=', 'book.id')
					->leftjoin('appointment', 'book.appointment_id' ,'=', 'appointment.id')
					->leftjoin('join', 'appointment.join_id', '=', 'join.id')
					->leftjoin('session', 'join.session_id' ,'=', 'session.id')
					->leftjoin('users', 'join.instructor_id' ,'=', 'users.id')
					->select('joinbooking.*', 'session.session_title', 'users.name', 'appointment.session_time')
					->where('join.instructor_id', '=', $id)		
					->where('appointment.session_time', '>', $from)
					->where('appointment.session_time', '<', $to)
					->orderby('appointment.session_time')
					->paginate($pageCount);
										
		return $history;
	}
	
	/*  InstructorController@getAvailableAppointmentData
	* get  booked join List
	* @param : instructor id
	* @return: booked join list
	*/
	static public function getAvailableAppointDataByInsturctorID($id){	
		
		$data = DB::table('joinbooking')
					->leftjoin('book', 'joinbooking.book_id', '=', 'book.id')
					->leftjoin('appointment', 'book.appointment_id' ,'=', 'appointment.id')
					->leftjoin('join', 'appointment.join_id', '=', 'join.id')
					->leftjoin('session', 'join.session_id' ,'=', 'session.id')
					->leftjoin('users', 'book.student_id' ,'=', 'users.id')
					->select('joinbooking.id', 'session.session_title', 'users.name', 'appointment.session_time')
					->where('join.instructor_id', '=', $id)		
					->where('joinbooking.jstatus', '=', '2')						
					->orderby('joinbooking.id')
					->get();
							
		return $data;
	}
	
	/*  InstructorController@voiceRoom
	* get  available student_id
	* @param : instructor_id
	* @return: available student_id
	*/
	static public function getAvailableStudentId($id){	
		
		$data = DB::table('joinbooking')
					->leftjoin('book', 'joinbooking.book_id', '=', 'book.id')
					->leftjoin('appointment', 'book.appointment_id' ,'=', 'appointment.id')
					->leftjoin('join', 'appointment.join_id', '=', 'join.id')		
					->leftjoin('users', 'book.student_id' ,'=', 'users.id')
					->select('users.id')
					->where('join.instructor_id', '=', $id)						
					->where('joinbooking.jstatus', '=', '0')						
					->first();
							
		return $data;
	}
	
}
