<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Models\Group;

class ListprogramsController extends Controller
{
	/**
     * get initial data of program list page
     * @Param : no
     * @Return : check login and return group data
     */
	public function index(){
		
		$group = new Group();
		
		if (Auth::check()){
			$userId = Auth::id();			
			$programData 	= $group -> getGroupDataByUserID($userId);		
			
		}else{
			$programData  	= $group -> getGroupDataByUserID('-1');
			
		}
		
		return view('/frontend/listprograms', compact('programData'));
		
	}
	
    
   
}
