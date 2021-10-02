<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Models\Group;
use App\Http\Models\Listprograms;
use App\Http\Models\Appointment;

class AboutusController extends Controller
{
    /**
     * get initial Data of about us page
     * @Param : no
     * @Return : user, group, program and appointment count and Array programlist data
     */
    public function index(){
		
		$user  			= new User();
		$group 			= new Group();
		$programlist 	= new Listprograms();
		$appointment 	= new Appointment();
		
		$studentCount 		= $user -> getStudentsCount();
		$countryCount 		= $user -> getStudentsCountByCountry();
		$programCount 		= $group -> groupCount();
		$appointmentCount  	= $appointment -> appointmentCount();
				
		
		return view('/frontend/about', compact('studentCount', 'countryCount', 'programCount', 'appointmentCount'));
	}
}
