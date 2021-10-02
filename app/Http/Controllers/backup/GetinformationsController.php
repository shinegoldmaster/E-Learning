<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use Auth;

class GetinformationsController extends Controller
{
	/**	  
	 * When user register, get country list
	 * @Param: no
	 * @Return: country list array : script.js 's "getCountry()" function's ajax result
	 */
    public function getCountryData(){
		 $result = DB::table('country')->select('country_id as id', 'name')->get();		
		 $data['status'] = 1;
		 $data['msg']    = "success";
		 $data['data']    = $result;
		 return response()->json($data, 200); 

	}
	
	/**	  
	 * When user register, get country list
	 * @Param: no
	 * @Return: country list array : script.js 's "getCountry()" function's ajax result
	 */
    public function getCountryDataForUpdateStudent(){
		
		if (Auth::check()){
			$userId = Auth::id();	
		}
		$user = User::find($userId);
		
		 $result = DB::table('country')->select('country_id as id', 'name')->get();		
		 $data['status'] = 1;
		 $data['msg']    			  = "success";
		 $data['data']    			  = $result;
		 $data['ussercountryid']      = $user -> country;
		 return response()->json($data, 200); 

	}
	
}
