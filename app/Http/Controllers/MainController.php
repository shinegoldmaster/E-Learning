<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Models\Group;
use App\Http\Models\Message;
use App\Http\Models\Appointment;
use App\Http\Models\Homework;
use App\Http\Models\Book;
use App\Http\Models\Joins;
use App\Http\Models\Joinbooking;
use App\Http\Models\News;
use App\Http\Models\Newsdetail;
use App\Http\Models\Setting;
use App\Http\Models\Session;
use App\Http\Models\Quranmenu;
use App\Http\Models\Librarycategory;
use App\Http\Models\Librarysubcategory;
use App\Http\Models\Libraryitems;
use App\User;
use Auth;
use Redirect;

class MainController extends Controller
{
	//-------------- Homepage Management ----------//
	/**
     * get initial Data of Homepage
     * @Param : no
     * @Return : user, group, program and appointment count and Array programlist data
     */
    public function index(){
		
		$user  			= new User();
		$group 			= new Group();			
		
		$studentCount 		= $user -> getStudentsCount();		
		$countryCount 		= $user -> getStudentsCountByCountry();
		
		$programCount 		= $group -> groupCount();
		$appointmentCount  	= Appointment::count();
		$appointmentData	= Appointment::getAppointmentList('id', 9);
		
		
		return view('/frontend/homepage', compact('studentCount', 'countryCount', 'programCount', 'appointmentCount', 'appointmentData'));
	}
	
	
	/**
     * get initial data of program list page
     * @Param : no
     * @Return : check login and return group data
     */
	public function getInitialProgramList(){
		
		$group = new Group();
		
		if (Auth::check()){
			$userId = Auth::user() -> group_id;			
			$programData 	= $group -> getGroupDataByUserID($userId);	
		}else{
			$programData  	= $group -> getGroupDataByUserID('-1');		
		}
		
		return view('/frontend/listprograms', compact('programData'));
		
	}
	
	/*
	* get instructor Action
	* @param : no
	* @return: check login and return logined user's info
	*/
	public function instructorsShow($id){
		
				
		$instructorAppointData = Group:: getInstructorAndAppointDataByGroupId($id);				
		
		return view('/frontend/instructorsshow', compact('instructorAppointData'));				
	}
	
	/*
	* appointment Action
	* @param : id- instructor id
	* @return: check login and return available appoint
	*/
	public function appointments($id){
		
		$avaliableappointments = Appointment::getAppointmentByInstructorId($id, 10);
		
		$instructorInfo = Group::getInstructorInfo($id);		
		return view('/frontend/appointments', compact('instructorInfo', 'avaliableappointments'));
							
	}
	
	//-------------- News Management ----------//
	
	/**
     * initial Data on News page
     * @param : no
     * @Return : Array News data by pagenation count
     */
	 public function getNewsData(){
		
		$news = new News();
		$newsData = $news -> getNewsData(3);
		return view('/frontend/news', compact('newsData')); 
	 }
	 
	 
	/**
     * Get news detail data by news_id
     * @param : news_id
     * @Return:  news_id, imageData by news_id, newsData by news_id
     */  
    public function newsDetail($id){
		
		$news 		= new News();
		$newsdetail = new Newsdetail();
		
        $index			 = $id;
		$newsDetailData  = $news -> getNewsDetailData($id);
		$imageData		 = $newsdetail -> getNewsImageSliderData($id);
		
        return view('/frontend/newsdetails', compact('index', 'newsDetailData', 'imageData'));
        
    }
	
	//-------------- Script.js  Management ----------//
	
	/**	  script.js
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
	
	
	/**	  script.js
	 * When user register, get country list
	 * @Param: no
	 * @Return: country list array : script.js 's "getCountry()" function's ajax result
	 */
    public function getCountryDataForUpdateStudent(){
		
		if (Auth::check()){
			$userId = Auth::id();
			
			$user = User::find($userId);
		
			 $result = DB::table('country')->select('country_id as id', 'name')->get();		
			 $data['status'] = 1;
			 $data['msg']    			  = "success";
			 $data['data']    			  = $result;
			 $data['ussercountryid']      = $user -> country;
			 return response()->json($data, 200); 
		}else return false;
		

	}
	
	/**	  script.js
	 * get library category list
	 * @Param: no
	 * @Return: get library category list
	 */
    public function getCategoryList(){
		 $result = Librarycategory::select('id', 'cat_name')
									->where('types', '=', '0')
									->get();		
		 $data['status'] = 1;
		 $data['msg']    = "success";
		 $data['data']    = $result;
		 return response()->json($data, 200); 

	}
	
	/**	  script.js
	 * get subcagetory data by categroid and search string
	 * @Param: flag= 0: search by id categroid 0- all !0 - where flag = 1: search by string
	 * @Return: subcagetory data by categroid : script.js 's "searchSubcategoryData()" function's ajax result
	 */
    public function getSubcategoryListBySearch($flag, $id){
		if($flag == 1){
			$result = Librarysubcategory::getSubcategoryListBySearchString($id);
		}else{
			if($id == '0'){
				$result = Librarysubcategory::getLibrarySubCategoryData();					
			}else{
				$result = Librarysubcategory::where('cat_id', '=', $id)->get();
			}
		}
		
				
		 $data['status'] = 1;
		 $data['msg']    = "success";
		 $data['data']    = $result;
		 return response()->json($data, 200); 

	}
	
	//-------------- Stats page Management ----------//
	/**
     * get initial data of stats page
     * @Param : no
     * @Return : student count by country,  appointment by status, program count by lang and Group
     */
    public function getStatsPageData(){		
		
		$stuedntsCountByCountry 		= Group:: getStuendtsByCountry();			
		$getAllAppointments 			= Appointment::getAppointmentsByStatus();
		$getProgramCountByLangAndGroup 	= Group:: getProgramCountByLangAndGroup();		
		
		
		return view('/frontend/stats', compact('stuedntsCountByCountry', 'getAllAppointments', 'getProgramCountByLangAndGroup'));
	}
	
	//-------------- About US Page Management ----------//
	/**
     * get initial Data of about us page
     * @Param : no
     * @Return : user, group, program and appointment count and Array programlist data
     */
    public function getAboutUsPageData(){
		
		$user  			= new User();
		$group 			= new Group();				
		
		$studentCount 		= $user -> getStudentsCount();
		$countryCount 		= $user -> getStudentsCountByCountry();		
		$programCount 		= $group -> groupCount();
		$appointmentCount  	= Appointment::count();
				
		
		return view('/frontend/about', compact('studentCount', 'countryCount', 'programCount', 'appointmentCount'));
	}
	
	//-------------- Help page Management ----------//
	/**
     * Help page
     * @Param : no
     * @Return : Help page
     */
    public function helpPage(){				
		return view('frontend/help');		
	}
	
	//-------- Quran Library  Management --------//
	
	/**
     * get initial Quran page Data
     * @Param : no
     * @Return : Quranmenu data and qurancategory data
     */
    public function quranPageManagement($id = 0){
		
		$quranmenudata = Quranmenu::orderby('id')->get();
		
		$qurancategorydata = Librarycategory::orderby('menu_id')->get();
		$active = $id;
		return view('library/quranlibrary', compact('quranmenudata', 'qurancategorydata', 'active'));
	}
	
	/**
     * get quran subcategory with relation to quran category
     * @Param : cagetory_id
     * @Return : quran subcategory with relation to quran category
     */
    public function getQuranSubcategory($id){
		$quranmenudata = Quranmenu::orderby('id')->get();
		$categoryname = Librarycategory::where('id', '=', $id)->first();
		$quransubcategorydata = Librarysubcategory::where('cat_id', '=', $id)->orderby('cat_id')->get();
		
		return view('library/getquransubcategory', compact('quranmenudata', 'quransubcategorydata', 'categoryname'));
	}
	
	/**
     * get quran item with relation to quran sub category
     * @Param : subcagetory_id
     * @Return : quran item with relation to quran subcategory
     */
    public function getQuranItem($id){
		$quranmenudata = Quranmenu::orderby('id')->get();
		$subcategoryname = Librarysubcategory::where('id', '=', $id)->first();
		$quranitemdata = Libraryitems::where('sub_cat_id', '=', $id)->orderby('sub_cat_id')->get();
		
		return view('library/getquranitem', compact('quranmenudata', 'quranitemdata', 'subcategoryname'));
	}
	
	/* 
	* Play Quran Audion  item_id
	* @param : item_id
	* @return: check login and return Quran Audio Url 
	*/
	public function playQuranAudio($id){
		
		$items = Libraryitems::find($id);
		$audio_data = $items -> mp3_link;
		$audio_src = 'library/mp3/'.$audio_data;	
		
		return view('library/playquranaudio', compact('audio_src'));
				
	}
	
	//--------  Librarys  Management --------//
	
	/**
     * get libaray item with relation to libaray sub category
     * @Param : subcagetory_id
     * @Return : libaray item with relation to libaray subcategory
     */
    public function getLibraryItem($id){
		$quranmenudata = Quranmenu::orderby('id')->get();
		$subcategoryname = Librarysubcategory::where('id', '=', $id)->first();
		$quranitemdata = Libraryitems::where('sub_cat_id', '=', $id)->orderby('sub_cat_id')->get();
		
		return view('library/getlibraryitem', compact('quranmenudata', 'quranitemdata', 'subcategoryname'));
	}
	
	/* 
	* Play libaray Audion  item_id
	* @param : item_id
	* @return: check login and return libaray Audio Url 
	*/
	public function playLibraryAudio($id){
		
		$items = Libraryitems::find($id);
		$audio_data = $items -> mp3_link;
		$audio_src = 'library/mp3/'.$audio_data;	
		
		return view('library/playlibraryaudio', compact('audio_src'));
				
	}
	
	
}
