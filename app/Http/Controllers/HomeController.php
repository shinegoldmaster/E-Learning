<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Service\ZoomAPI;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
		$account_type = Auth::user()->status;		
		if($account_type == 3){
			return redirect()->action('AdminController@index');			
		}else if($account_type == 2){
			return redirect()->action('StudentController@index');			
		}else if($account_type == 1){
			return redirect()->action('InstructorController@index');			
		}else{
			return redirect()->action('StudentController@index');			
		}        
    }
	
	public function abc(){
		$zoomapi  = new ZoomAPI();
				/*
		$data = array();
		$data['userEmail'] = "danw.py@hotmail.com";
		dd($zoomapi->checkAuser($data));
		
		
		exit;

		$data = array();
		$data['userEmail'] = "dan.py@hotmail.com";
		$data['userType']  = 1;
		dd($zoomapi->createAUser($data));
	*/
	
	 
		$data['userId'] = "Qm5FgcqkTwC_GSPPBUuRfQ";
		$data['meetingType']  = 1;
		$data['meetingTopic'] = "Hello";
		$response = $zoomapi->listUsers();
		
		dd($response);
		
		
	}
}
