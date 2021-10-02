<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Http\Models\Group;

class Session extends Model
{
    protected $table = "session";
	
	/** AdminController@subcategoryManagement
     * Get session list by order param and sort
     * @param : sort 0- default other - order by sort param
     * @Return:  news_id, imageData by news_id, newsData by news_id
     */ 
	static public function getSessionList($sort, $pageCount){
		
		if($sort == 'title') $orderCondition = 'session.session_title';
		else if($sort == 'date')  $orderCondition = 'session.created_at';
		else if($sort == 'category')  $orderCondition = 'group.group_name';
		else $orderCondition = 'session.id';
		
		$items = DB::table('session')
				->leftjoin('group', 'session.category_id', '=', 'group.id')
				->select('session.*', 'group.group_name')
				->orderby($orderCondition)
				->paginate($pageCount);
		
		return $items;
	}
	
	
	
	
	
}
