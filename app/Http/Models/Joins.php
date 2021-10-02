<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Joins extends Model
{
    protected $table = "join";
	
	/** admincontroller@assignManagement
     * Get join list between instructor and session(subcategory)
     * @param : sort 0- default other - order by sort param
     * @Return:  Join list
     */ 
	static public function getJoinListSubcategoryAndInstructor($sort, $pageCount){		
		if($sort == 'ctitle') $orderCondition = 'session.session_title';
		else if($sort == 'date')  $orderCondition = 'join.created_at';
		else if($sort == 'iname')  $orderCondition = 'users.name';
		else $orderCondition = 'join.id';
		
		$items = DB::table('join')
				->leftjoin('session', 'join.session_id', '=', 'session.id')
				->leftjoin('users', 'join.instructor_id', '=', 'users.id')
				->select('join.*', 'session.session_title', 'users.name')
				->orderby($orderCondition)
				->paginate($pageCount);
		
		return $items;
	}
		
	/**admincontroller@assignSubcategoryAndInstructory
     * Get join status by session_id
     * @param :  session_id
     * @Return:  Return status 1- already joined 0- no joined
     */ 
	static public function checkInstructoryJoined($id){		
		
		$items = Joins::where('instructor_id', '=', $id)		
						->count();		
		return $items;		
	}
	
	/**admincontroller@assignSubcategoryAndInstructory
     * Get join status by insturctor_id 
     * @param : instructor_id
     * @Return:  Return status 1- already joined 0- no joined
     */ 
	static public function checkSubcategoryJoined($id){		
		
		$items = Joins::where('session_id', '=', $id)		
						->count();		
		return $items;		
	}
	
	/**admincontroller@appointmentsManagement
     * Get join and insturctor info list
     * @param : no
     * @Return:  join and insturctor info list
     */ 
	static public function getJoinAndInstructorList(){		
		
		$items = DB::table('join')
					->leftjoin('users', 'join.instructor_id', '=', 'users.id')
					->select('join.*', 'users.name')
					->where('users.status', '=', '1')
					->get();
		return $items;		
	}
	
}
