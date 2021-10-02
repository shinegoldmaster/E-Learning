<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Appointment extends Model
{
    protected $table = "appointment";
	
	/* MainController@getStatsPageData
	* get  appointment data by status
	* @param : no
	* @return: available, reserved, cancelled, attended :status return data
	*/
	static public function getAppointmentsByStatus(){
		$statusSql = "SELECT COUNT(*) AS total, `status` FROM appointment GROUP BY `status` ORDER BY `status`";
		return DB::select($statusSql);
	}
	
	/*  studentController@appointments
	* get  appointment list by instructor_id
	* @param : instructor_id, pageCount
	* @return: appointment list by instructor_id
	*/
	static public function getAppointmentByInstructorId($id, $pageCount){		
		
		$currentTime = date('Y-m-d H:i:s');
		
		
		$list =  DB::table('appointment')
					->leftjoin('join', 'appointment.join_id', '=', 'join.id')
					->leftjoin('session', 'join.session_id' ,'=', 'session.id')
					->leftjoin('users', 'join.instructor_id' ,'=', 'users.id')
					->select('appointment.*', 'session.session_title', 'users.name')
					->where('join.instructor_id', '=', $id)
					->where('appointment.session_time', '>', $currentTime)
					->whereRaw("(appointment.id NOT IN (SELECT appointment_id FROM `book`) )")				
					->where('appointment.status', '=', '0')
					->orderby('appointment.session_time')
					->paginate($pageCount);
		return $list;
		/*var_dump($data);exit;
		$sql = "SELECT a.*, s.session_title, u.name FROM appointment AS a
				LEFT JOIN `join` AS j ON a.join_id = j.id
				LEFT JOIN `session` AS s ON j.session_id = s.id
				LEFT JOIN users AS u ON j.instructor_id = u.id
				WHERE j.instructor_id = '".$id."' AND a.session_time > '".$currentTime."' AND a.id NOT IN (SELECT appointment_id FROM `book`) AND a.status = 0
				ORDER BY a.session_time";
		
		return DB::select($sql);*/
		
	}
	
	/*  adminController@appointmentsManagement
	* get  appointment list
	* @param : appointment order and pagination
	* @return: appointment List
	*/
	static public function getAppointmentList($sort, $pageCount){
		
		if($sort == 'ctitle') $orderCondition = 'session.session_title';
		else if($sort == 'time')  $orderCondition = 'appointment.session_time';
		else if($sort == 'iname')  $orderCondition = 'users.name';
		else $orderCondition = 'appointment.id';
		$items = DB::table('appointment')
					->leftjoin('join', 'appointment.join_id', '=' ,'join.id')
					->leftjoin('session', 'join.session_id', '=' ,'session.id')
					->leftjoin('users', 'join.instructor_id', '=' ,'users.id')
					->select('appointment.*', 'session.session_title', 'users.name')
					->orderby($orderCondition)
					->paginate($pageCount);
		
		return $items;
	}
	
	/*  adminController@registerappointment
	* get  Check exist appointment with join_id and session_time
	* @param : join_id, session_time 
	* @return: Check exist appointment with join_id and session_time and return 1- exist 0- no exist
	*/
	static public function checkConfirmAppointment($joinid, $stime){
		
		$time = strtotime($stime);		
		$count = Appointment::where('convert_time', '=', $time)		
					->where('join_id', '=', $joinid)
					->count();	
			
		return $count;
	}
	
	
}
