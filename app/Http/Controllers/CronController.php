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
use App\User;
use Auth;
use Redirect;;

class CronController extends Controller
{
	/*    Cron job 
	* Auto appointment Status management Action
	* @param : 
	* @return: compare between session_time and current time change status   0-unjoined 1-joined 2-time pass
	* curren time > session_time : no change(0,1)
	* curren time < session_time : 2
	*/
	public function timeManageByCron(){
		
		$appointData = Appointment::where('status', '=', '0')
									->get();
		foreach($appointData as $row){
			if(!$this -> compareTime($row -> session_time)){
				$appointId = $row->id;
				$appoint = Appointment::find($appointId);
				$appoint -> status = 2;
				$appoint -> notes = "Time Over";
				$appoint -> save();
				
				$this -> bookStatusManage($appointId);
			}
		}
		
	}
	
	/*    Cron job 
	* Auto booking Status management Action
	* @param : appointment_id
	* @return: 
	*/
	public function bookStatusManage($aid){
		
		$bookData = Book::where('status', '=', '0')
						->where('appointment_id', '=', $aid)
						->get();
		foreach($bookData as $row){
			$bookid = $row->id;
			$book = Book::find($bookid);
			$book -> status = 2;
			$book -> notes = "Time Over";
			$book -> save();
			
			$this -> joinbookingStatusManage($bookid);
			
		}
	}
	
	/*    Cron job 
	* Auto joinbooking Status management Action
	* @param : book_id
	* @return: 
	*/
	public function joinbookingStatusManage($bid){
		
		$joinbookData = Joinbooking::where('jstatus', '=', '0')
						->where('book_id', '=', $bid)
						->get();
		foreach($joinbookData as $row){
			$joinbookid = $row->id;
			$joinbook = Joinbooking::find($joinbookid);
			$joinbook -> jstatus = 1;
			$joinbook -> notes = "Time Over";
			$joinbook -> save();			
		}
	}
	
	/*  self funtion
	* Compare time current time and param time
	* @param : param time
	* @return: compare between session_time and current time change 
	* curren time > session_time : return true(1)
	* curren time <= session_time : return false(0)
	*/
	protected function compareTime($date){
		$currentTime = strtotime(date('Y-m-d H:i:s'));
		$paramTime = strtotime($date);
		$timeDiff =  $paramTime - $currentTime ;
		if($timeDiff > 0) return true;
		else return false;
		
	}
}
