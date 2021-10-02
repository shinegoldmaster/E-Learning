<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Http\Models\Group;
use App\Http\Models\Message;
use App\Http\Models\Appointment;
use App\Http\Models\Homework;
use App\User;
use Auth;
use Redirect;

class Book extends Model
{
	protected $table = "book";
	
	/*  studentController@appointments
	* get  Check booking status by student id
	* @param : student id
	* @return: currently booked status 0- not booked 1- booked
	*/
	static public function checkBookingStatusByUserid($id){		
		$count = Book::where('status', '=', '0')
					->where('student_id', '=', $id)
					->count();
		return $count;
		
	}
	
	/*  studentController@appointmentHistory
	* get  get booked history
	* @param : student id
	* @return: booked data
	*/
	static public function getBookedHistoryByStudentId($id,$from, $to, $pageCount){		
		
		$history = DB::table('book')
					->leftjoin('appointment', 'book.appointment_id' ,'=', 'appointment.id')
					->leftjoin('join', 'appointment.join_id', '=', 'join.id')
					->leftjoin('session', 'join.session_id' ,'=', 'session.id')
					->leftjoin('users', 'join.instructor_id' ,'=', 'users.id')
					->select('book.*', 'session.session_title', 'users.name', 'appointment.session_time')
					->where('book.student_id', '=', $id)
					->where('appointment.session_time', '>', $from)
					->where('appointment.session_time', '<', $to)		
					->orderby('book.status')
					->orderby('appointment.session_time')
					->paginate($pageCount);
										
		return $history;
	}
	
	
	/*   studentController@appointments
	* get  appointment list for add homework
	* @param : appointment time
	* @return: appointment list for add homework
	*/
	static public function getAppointmentListForAddHomework($id){		
		
		$sql = "SELECT book.*, `session`.session_title, appointment.session_time, users.name FROM book 
				LEFT JOIN appointment ON book.appointment_id = appointment.id
				LEFT JOIN `join` ON appointment.join_id = `join`.id
				LEFT JOIN `session` ON `join`.session_id = `session`.id
				LEFT JOIN users ON `join`.instructor_id = users.id
				WHERE book.status = '3' AND book.student_id = '".$id."'
				ORDER BY book.id";
		return DB::select($sql);
	}
	
	
	
	/*  InstructorController@index
	* get  available Jion List
	* @param : instructor id
	* @return: available join list
	*/
	static public function getBookedHistoryByInstructorId($id,$from, $to, $pageCount){	
		
		$history = DB::table('book')
					->leftjoin('appointment', 'book.appointment_id' ,'=', 'appointment.id')
					->leftjoin('join', 'appointment.join_id', '=', 'join.id')
					->leftjoin('session', 'join.session_id' ,'=', 'session.id')
					->leftjoin('users', 'join.instructor_id' ,'=', 'users.id')
					->select('book.*', 'session.session_title', 'users.name', 'appointment.session_time')
					->where('join.instructor_id', '=', $id)
					->where('book.status', '=', '0')
					->where('appointment.session_time', '>', $from)
					->where('appointment.session_time', '<', $to)
					->whereRaw("(book.id NOT IN (SELECT book_id FROM `joinbooking`) )")	
					->orderby('appointment.session_time')
					->paginate($pageCount);
										
		return $history;
	}
	
	
}
