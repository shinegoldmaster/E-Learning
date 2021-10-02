<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Homework extends Model
{
    protected $table = "homework";
	
	/** StudentController@showHomeworkHistory
     * get homework history data by user id and range Date
     * @Param : student id    
     * @Return : homework history data by userid
     */
	static public function getHomeworkHistoryDataByStudentID($id, $from, $to, $pageCount){
		
		
		$homeworkHistory = DB::table('homework')
			->leftjoin('book', 'homework.book_id', '=', 'book.id')
			->leftjoin('appointment', 'book.appointment_id', '=', 'appointment.id')
			->leftjoin('join', 'appointment.join_id', '=', 'join.id')
			->leftjoin('users', 'book.student_id', '=', 'users.id')
			->leftjoin('users AS u', 'join.instructor_id', '=', 'u.id')
			->leftjoin('group', 'users.group_id', '=', 'group.id')
			->select('homework.*','u.name AS iname', 'users.name AS sname', 'appointment.session_time AS appoint', 'group.group_name AS gname')
			->where('book.student_id', '=', $id)
			->where('homework.created_at', '>', $from)
			->where('homework.created_at', '<', $to)
			->paginate($pageCount);
			
		return $homeworkHistory;
	}
	
	/** InstructorController@showHomeworkHistory
     * get homework history data by user id and range Date
     * @Param : user id    
     * @Return : homework history data by userid
     */
	static public function getHomeworkHistoryDataByInstructorID($id, $from, $to, $pageCount){
		
		
		$homeworkHistory = DB::table('homework')
			->leftjoin('book', 'homework.book_id', '=', 'book.id')
			->leftjoin('appointment', 'book.appointment_id', '=', 'appointment.id')
			->leftjoin('join', 'appointment.join_id', '=', 'join.id')
			->leftjoin('users', 'book.student_id', '=', 'users.id')
			->leftjoin('users AS u', 'book.student_id', '=', 'u.id')
			->leftjoin('group', 'users.group_id', '=', 'group.id')
			->select('homework.*','u.name AS iname', 'users.name AS sname', 'appointment.session_time AS appoint', 'group.group_name AS gname')
			->where('join.instructor_id', '=', $id)
			->where('homework.created_at', '>', $from)
			->where('homework.created_at', '<', $to)
			->paginate($pageCount);
		return $homeworkHistory;
	}
}
