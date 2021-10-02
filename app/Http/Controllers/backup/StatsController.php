<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\Group;
use App\Http\Models\Appointment;


class StatsController extends Controller
{
	/**
     * get initial data of stats page
     * @Param : no
     * @Return : student count by country,  appointment by status, program count by lang and Group
     */
    public function index(){		
		
		$group 			= new Group();
		$appointment 	= new Appointment();
		
		$stuedntsCountByCountry 		= $group -> getStuendtsByCountry();			
		$getAllAppointments 			= $appointment -> getAppointmentsByStatus();
		$getProgramCountByLangAndGroup 	= $group -> getProgramCountByLangAndGroup();		
		
		
		return view('/frontend/stats', compact('stuedntsCountByCountry', 'getAllAppointments', 'getProgramCountByLangAndGroup'));
	}
}
