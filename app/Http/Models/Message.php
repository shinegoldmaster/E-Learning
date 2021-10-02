<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Message extends Model
{
     protected $table = "messages";
	 
	 /** StudendController@showMessageHistory
     * get message data by user id
     * @Param : user id    
     * @Return : send message data by userid
     */
	static public function getSendMessageHistoryDataByUserID($id,$from, $to, $pageCount){
		
		$messageData = DB::table('messages')					
					->leftJoin('users', 'messages.to', '=', 'users.id')
					->select('messages.*', 'users.name')
					->where('messages.from', '=', $id)
					->where('messages.created_at', '>', $from)
					->where('messages.created_at', '<', $to)
					->orderby('messages.created_at')
					->paginate($pageCount);
						  
		return $messageData;
	}
	
	/** StudendController@showMessageHistory
     * get received message data by user id
     * @Param : user id    
     * @Return :  received message data by userid
     */
	static public function getReceivedMessageHistoryDataByUserID($id,$from, $to, $pageCount){
		
		$messageData = DB::table('messages')					
					->leftJoin('users', 'messages.to', '=', 'users.id')
					->select('messages.*', 'users.name')
					->where('messages.to', '=', $id)
					->where('messages.created_at', '>', $from)
					->where('messages.created_at', '<', $to)
					->orderby('messages.created_at')
					->paginate($pageCount);
						  
		return $messageData;
	}
	
	
	/** AdminController@showMessageHistory
     * get all message data 
     * @Param :  
     * @Return :  received all message
     */
	static public function getMessageList($sortCondition, $direction,$from, $to, $pageCount){
		
		$where = '1';
		if($from != 0)
				$where = 'messages.from = "'.$from.'" OR messages.to = "'.$from.'"';
		if($to != 0)
			$where = 'messages.from = "'.$to.'" OR messages.to = "'.$to.'"';			
		if($from != 0 && $to != 0)
			$where = 'messages.from IN ('.$from.', '.$to.') OR messages.to IN ('.$from.', '.$to.')';
		
				
					
		$messageData = DB::table('messages')					
					->leftJoin('users as u1', 'messages.from', '=', 'u1.id')
					->leftJoin('users as u2', 'messages.to', '=', 'u2.id')
					->select('messages.*', 'u1.name as sname', 'u2.name as rname')	
					->whereRaw($where)
					->orderby($sortCondition, $direction)
					->paginate($pageCount);
						  
		return $messageData;
	}
	
	
}
