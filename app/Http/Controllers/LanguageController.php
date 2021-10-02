<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;
use Redirect;
use App\Http\Requests;

class LanguageController extends Controller
{
    public function index($lang){
		
		Session::put('locale', $lang);		
		return Redirect::back();
	}
}
