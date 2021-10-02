<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Followup extends Model
{
     protected $table = "followup";	
	 
		
	/*  self function
	* get relative followup data with joinbooking_id
	* @param :  joinbooking_id
	* @return: relative followup data with joinbooking_id
	*/
	static public function getRelateFollowData($id){	
		
		$data = DB::table('joinbooking')
					->leftjoin('book', 'joinbooking.book_id', '=', 'book.id')
					->leftjoin('appointment', 'book.appointment_id' ,'=', 'appointment.id')
					->leftjoin('join', 'appointment.join_id', '=', 'join.id')
					->leftjoin('session', 'join.session_id' ,'=', 'session.id')
					->select('book.student_id', 'appointment.session_time', 'session.category_id')
					->where('joinbooking.id', '=', $id)	
					->first();
										
		return $data;
	}
	
	/*  self function
	* get relative followup data with joinbooking_id
	* @param :  joinbooking_id
	* @return: relative followup data with joinbooking_id
	*/
	static public function getFollowUpData($id, $month){	
		
		$data = DB::table('followup')
					->leftjoin('joinbooking', 'followup.joinbooking_id', '=', 'joinbooking.id')
					->leftjoin('book', 'followup.student_id' ,'=', 'book.id')
					->leftjoin('group', 'followup.material_id', '=', 'group.id')
					->leftjoin('users as u1', 'followup.instructor_id' ,'=', 'u1.id')
					->leftjoin('users as u2', 'followup.student_id' ,'=', 'u2.id')
					->select('followup.*', 'group.group_name', 'u1.name as iname', 'u2.name as sname')
					->where('followup.student_id', '=', $id)	
					->where('followup.month_name', '=', $month)	
					->get();
										
		return $data;
	}
	
}

















