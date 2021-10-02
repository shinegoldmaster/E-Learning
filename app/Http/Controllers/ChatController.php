<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class ChatController extends Controller{

    public function __construct(){
		
        $this->middleware('auth');
		
    }
	
	public function index($opt, $reciever_id, Request $request){
		
		$user_id = Auth::user()->id;		
		$message = $request->message;

		if($opt == 'send'){
			
			$rlt = $this->addMessage($user_id, $reciever_id, $message);
		}else if($opt == 'get'){		
			$msgs = $this->getContents($user_id, $reciever_id);
			$now = time();
			
			$rlt = ['msgs'=>$msgs, 'time'=>$now];
		}else{
			$msgs = $this->countMessage($user_id, $reciever_id);
			$now = time();
			
			$rlt = ['count'=>$msgs, 'time'=>$now];
		}
		
		return $rlt;
	}
	
	public function addMessage($user_id, $reciever_id, $message){
		
		$status = 0;
		$time = time();
		$now = date("Y-m-d H:i:s");
		
		$status = DB::table('chat')->insertGetId([
			'sender_id'		=> $user_id,
			'receiver_id'	=> $reciever_id,
			'contents'		=> $message,
			'chat_time'		=> $time,
			'created_at'	=> $now,			
		]);
		
		return $status;
	}
	
	
	public function getContents($user_id, $reciever_id){
		
		$condition = "(sender_id = '".$user_id."' AND receiver_id = '".$reciever_id."' ) OR ( sender_id = '".$reciever_id."' AND receiver_id = '".$user_id."' )";	
		
		$msgs = DB::table('chat')
				->whereRaw($condition)
				->orderBy('chat_time', 'asc')
				->get();
		
		return $msgs;
		
	}
	
	public function countMessage($user_id, $reciever_id){
		
		$condition = "(sender_id = '".$user_id."' AND receiver_id = '".$reciever_id."' ) OR ( sender_id = '".$reciever_id."' AND receiver_id = '".$user_id."' )";	
		
		$msgs = DB::table('chat')
				->whereRaw($condition)
				->count();
		
		return $msgs;
		
	}
	
	
}
