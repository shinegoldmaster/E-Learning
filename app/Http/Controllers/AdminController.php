<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Models\News;
use App\Http\Models\Newsdetail;
use App\Http\Models\Group;
use App\Http\Models\Message;
use App\Http\Models\Appointment;
use App\Http\Models\Homework;
use App\Http\Models\Book;
use App\Http\Models\Session;
use App\Http\Models\Setting;
use App\Http\Models\Joins;
use App\Http\Models\Joinbooking;
use App\Http\Models\Quranmenu;
use App\Http\Models\Librarycategory;
use App\Http\Models\Librarysubcategory;
use App\Http\Models\Libraryitems;
use App\User;
use Auth;
use Redirect;
use Input, Validator,View, DB;

class AdminController extends Controller
{

    /*
	* Admin Dashboard show Action
	* @param : no
	* @return: check login and return logined admin's info
	*/
	public function index(){

		$user = new User();
		$news = new News();
		$category = new Group();
		$studentCount = $user -> getUserCountByStatus(0);
		$instructorCount = $user -> getUserCountByStatus(1);
		$moderatorCount = $user -> getUserCountByStatus(2);
		$totalNewsCount = $news -> TotalCountNews();
		$totalCategoryCount = $category -> groupCount();
		$totalAppointmentCount = Appointment::count();
		return view('/admin/admin', compact('studentCount', 'instructorCount', 'moderatorCount', 'totalNewsCount', 'totalCategoryCount', 'totalAppointmentCount'));
	}

	/*//////////////////// User Action ////////////////////*/

	/*
	* Get User's list beside admin
	* @param : no
	* @return: check login and return user lists, studentcount, instructorCount, moderatorCount
	*/
	public function userManagement(){

		$adminid = Auth::user()->id;

		$user = new User();
		if(isset($_GET['sort'])){
			$getSortParam = $_GET['sort'];
		}else{
			$getSortParam = "id";
		}
		if(isset($_GET['direction'])){
			$getDirection = $_GET['direction'];
		}else{
			$getDirection = "ASC";
		}
		$userList = $user -> getUserListBesideAdmin($adminid,  $getSortParam, $getDirection, 10);
		$studentCount = $user -> getUserCountByStatus(0);
		$instructorCount = $user -> getUserCountByStatus(1);
		$moderatorCount = $user -> getUserCountByStatus(2);

		return view('/admin/user/usermanagement', compact('userList','studentCount', 'instructorCount', 'moderatorCount'));

	}

	/*
	* Get User Update
	* @param : user id and user status
	* @return: check login and update user
	*/
	public function userUpdate(Request $request){

		$userId = $request -> userid;
		$user = User::find($userId);
		$user -> status = $request -> userstatus;
		$user -> save();
		return Redirect::back()->withErrors(['Updated successfully.']);
	}

	/*
	* Get User Delete
	* @param : user id
	* @return: check login and delete user
	*/
	public function userDelete(Request $request){

		$userId = $request -> userid;
		$user = User::find($userId);
		$user -> delete();
		return Redirect::back()->withErrors(['Delete successfully.']);

	}


	/*
	* Get Student list By Status
	* @param : Status 0-student 1-instructor 2-moderator
	* @return: check login and student list by status and own type
	*/
	public function showUserList($id){

		$user = new User();
		if(isset($_GET['sort'])){
			$getSortParam = $_GET['sort'];

		}else{
			$getSortParam = "id";
		}
		if(isset($_GET['direction'])){
			$getDirection = $_GET['direction'];
		}else{
			$getDirection = "ASC";
		}

		$userList = $user -> getUserListByStatus($id, $getSortParam, $getDirection, 10);

		if($id == 0)
			$userType = "student";
		else if($id == 1)
			$userType = "instructor";
		else
			$userType = "moderator";
		return view('/admin/user/showuserlistbystatus', compact('userType', 'userList','id'));

	}

	/*///////// category == group == program list //////////*/

	/*
	* Get category list
	* @param : no
	* @return: check login and return category lists
	*/
	public function categoryManagement(){

		$category = new Group();
		$categoryList = $category -> getGroupDataByUserID('-1');

		$totalCategoryCount = $category -> groupCount();

		return view('/admin/category/categorymanagement', compact('categoryList','totalCategoryCount'));

	}

	/*
	* Show category by id
	* @param : category id
	* @return: check login and Show category by group_id
	*/
	public function categoryEdit($id){

		$category = new Group();
		$categoryData = $category -> getGroupDataByUserID($id);
		$index			 = $id;

		return view('/admin/category/categorydetails', compact('index', 'categoryData'));

	}

	/*
	* category Delete Action
	* @param : group id
	* @return: check login and delete category
	*/
	public function categoryDelete(Request $request){

		$categoryid = $request -> categoryid;
		$category = Group::find($categoryid);
		$category -> delete();
		return Redirect::back()->withErrors(['Delete successfully.']);

	}

	/*
	* category Edit-Save Action
	* @param : category id
	* @return: check login and Update edited category
	*/
	public function categoryEditSave(Request $request){

		$uploadimage = $request->categoryicon;

		$categoryid = $request -> categoryid;
		$category = Group::find($categoryid);

		if($uploadimage){
			$file_name = time(). '.'. $uploadimage->getClientOriginalExtension();

			$uploadimage->move(public_path('images/icon'), $file_name);

			$category -> group_icon = $file_name;
		}

		$category -> group_name = $request -> categoryname;
		$category -> group_des = $request -> categorydes;
		$category -> group_lang_id = $request -> categorylanguage;
		$category -> save();
		return redirect('/admin/categorymanagement')->withErrors('Succsssfully Update!');

	}

	/*
	* category Add-New-Save Action
	* @param : Submitted Form
	* @return: check login and Add new category
	*/
	public function categoryNewSave(Request $request){

		$uploadimage = $request->categoryicon;

		if(!$uploadimage){
			return Redirect::back()->withErrors(['Group icon must be upload!']);
		}else{
			if(!$request -> categoryname){
				return Redirect::back()->withErrors(['Group Name must be Entered!']);
				exit;
			}
			$file_name = time(). '.'. $uploadimage->getClientOriginalExtension();

			$uploadimage->move(public_path('images/icon'), $file_name);

			$category = new Group();
			$category -> group_name = $request -> categoryname;
			$category -> group_des = $request -> categorydes;
			$category -> group_lang_id = $request -> categorylanguage;
			$category -> group_icon = $file_name;
			$category -> save();
			return redirect('/admin/categorymanagement')->withErrors('Succsssfully Add!');
		}
	}

	/*
	* Show new category Action
	* @param : category id
	* @return: check login and Show new category
	*/
	public function categoryNew(){

		return view('admin/category/addnewcategory');
	}


	/*///////// sub category == course == session //////////*/

	/*
	* Get sub category list
	* @param : no
	* @return: check login and return category lists
	*/
	public function subcategoryManagement(){

		if(isset($_GET['sort'])){
			$getSortParam = $_GET['sort'];
		}else{
			$getSortParam = 'default';
		}

		$subcategoryList = Session::getSessionList($getSortParam, 10);
		$totalsubcategoryCount = Session::count();

		return view('/admin/subcategory/subcategorymanagement', compact('subcategoryList','totalsubcategoryCount'));
	}

	/*
	* Show subCategory by id
	* @param : subCategory id
	* @return: check login and Show subCategory by subCategory_id
	*/
	public function subcategoryEdit($id){

		$subcategoryData 	= Session::find($id);

		$index			 	= $id;
		$categorylist 		= Group::orderby('id')->get();
		return view('/admin/subcategory/subcategorydetails', compact('index', 'categorylist', 'subcategoryData'));

	}

	/*
	* subCategory Delete Action
	* @param : subCategory id
	* @return: check login and delete subCategory
	*/
	public function subcategoryDelete(Request $request){

		$subcategoryid = $request -> subcategoryid;
		$subcategory = Session::find($subcategoryid);
		$subcategory -> delete();
		return Redirect::back()->withErrors(['Delete successfully.']);
	}

	/*
	* subCategory Edit-Save Action
	* @param : subCategory id
	* @return: check login and Update edited subCategory
	*/
	public function subcategoryEditSave(Request $request){

		$subcategoryid = $request -> subcategoryid;
		$subcategory = Session::find($subcategoryid);

		$subcategory -> session_title = $request -> subcategorytitle;
		$subcategory -> category_id = $request -> categoryid;
		$subcategory -> notes = $request -> subcategorydes;
		$subcategory -> save();
		return redirect('/admin/subcategorymanagement')->withErrors('Succsssfully Update!');
	}

	/*
	* subCategory Add-New-Save Action
	* @param : Submitted Form
	* @return: check login and Add new subCategory
	*/
	public function subcategoryNewSave(Request $request){

		if(!$request -> subcategorytitle){
			return Redirect::back()->withErrors(['Subcategory Title must be Entered!']);
			exit;
		}

		if($request -> subcategorycategory == 0){
			return Redirect::back()->withErrors(['Subcategory  must be select Category!']);
			exit;
		}


		$subcategory = new Session();
		$subcategory -> session_title = $request -> subcategorytitle;
		$subcategory -> notes = $request -> subcategorydes;
		$subcategory -> category_id = $request -> subcategorycategory;

		$subcategory -> save();
		return redirect('/admin/subcategorymanagement')->withErrors('Succsssfully Add!');
	}

	/*
	* Show new subCategory Action
	* @param : subCategory id
	* @return: check login and Show new subCategory
	*/
	public function subCategoryNew(){

		$categorylist = Group::orderby('id')->get();
		return view('admin/subcategory/addnewsubcategory', compact('categorylist'));
	}

	/*//// Assignment Instructor VS Subcategory Action ///////*/

	/*
	* Get Join list and assignment instructor VS subcategory
	* @param : no
	* @return: return Join list and assignment instructor VS subcategory
	*/
	public function assignManagement(){

		$instructorList = User::where('status', '=', '1')->get();
		$subcategoryList = Session::get();
		$instructorCount = User::where('status', '=', '1')->count();
		$subcategoryCount = Session::count();
		$subcategoryTime = Setting::where('setting_field', '=', 'session_process_time')->first();
		$joinCount = Joins::count();

		if(isset($_GET['sort'])){
			$getSortParam = $_GET['sort'];
		}else{
			$getSortParam = 'default';
		}
		$joinList = Joins::getJoinListSubcategoryAndInstructor($getSortParam, 10);

		return view('/admin/subcategory/assignsubcategoryvsinstructor', compact('instructorList','subcategoryList','instructorCount','subcategoryCount','subcategoryTime','joinList', 'joinCount'));
	}

	/*
	* update Subcategory(session) time Action
	* @param : subCategory id
	* @return: check login and Update edited subCategory
	*/
	public function updateSubcategoryTime(Request $request){

		$settingId = $request -> settingid;
		$setting = Setting::find($settingId);
		$setting -> setting_value = $request -> settingvalue;
		$setting -> save();
		return redirect('/admin/assignsubcategory')->withErrors('Succsssfully Update!');
	}

	/*
	* Assign subCategory Delete Action
	* @param : join id
	* @return: check login and delete subCategory
	*/
	public function deleteAssignSubcategory(Request $request){

		$assignid = $request -> assignid;
		$join = Joins::find($assignid);
		$join -> delete();
		return Redirect::back()->withErrors(['Delete successfully.']);
	}

	/*
	* Assign insturcot and session Action
	* @param : Post data
	* @return: check login and save assign (join table)
	*/
	public function assignSubcategoryAndInstructory(Request $request){

		$subcategoryid = $request -> subcategoryfield;
		$instructorid = $request -> instructorfield;
		if($instructorid == 0 || $subcategoryid == 0){
			return Redirect::back()->withErrors(['Please, Select Instructor and Subcategory!']);
			exit;
		}
		$existSubcategoryJoined = Joins::checkSubcategoryJoined($subcategoryid);
		if($existSubcategoryJoined != 0){
			return Redirect::back()->withErrors(['This subCategory already was joined!']);
			exit;
		}
		$existInsturctorJoined = Joins::checkInstructoryJoined($subcategoryid);
		if($existInsturctorJoined != 0){
			return Redirect::back()->withErrors(['This Instructor already was joined!']);
			exit;
		}

		$join = new Joins();
		$join -> session_id = $subcategoryid;
		$join -> instructor_id = $instructorid;
		$join -> save();
		return redirect('/admin/assignsubcategory')->withErrors('Succsssfully Update!');
	}

	/*//// Appointments Management Action ///////*/


	/*
	* Get Join list and assignment instructor VS subcategory
	* @param : no
	* @return: return Join list and assignment instructor VS subcategory
	*/
	public function appointmentsManagement(){

		$joinList  = Joins::getJoinAndInstructorList();
		$instructorCount = User::where('status', '=', '1')->count();
		 
		$appointmentCount = Appointment::count();
		$defaulttieminteval = Setting::where('setting_field', '=', 'session_process_time')->first();
		$timeInterval = $defaulttieminteval -> setting_value;

		if(isset($_GET['sort'])){
			$getSortParam = $_GET['sort'];
		}else{
			$getSortParam = 'default';
		}
		$appointmentList = Appointment::getAppointmentList($getSortParam, 10);

		return view('/admin/appointment/appointmentmanagement', compact('joinList', 'instructorCount','appointmentCount','appointmentList', 'timeInterval'));
	}

		/*
	* Assign subCategory Delete Action
	* @param : join id
	* @return: check login and delete subCategory
	*/
	public function deleteappointment(Request $request){

		$appointmentid = $request -> appointmentid;
		$appointment = Appointment::find($appointmentid);
		$appointment -> delete();
		return Redirect::back()->withErrors(['Delete successfully.']);
	}

	/*
	* Assign insturcot and session Action
	* @param : Post data
	* @return: check login and save assign (join table)
	*/
	public function registerappointment(Request $request){

		$joinid = $request -> joinid;
		$sessiondate = $request -> sessiondate;
		$selectTimes = $request -> multipleselectedvalue;
		if($joinid == 0){
			return Redirect::back()->withErrors(['Please, Select Instructor!']);
			exit;
		}
		if(!$sessiondate){
			return Redirect::back()->withErrors(['Please, Select Date!']);
			exit;
		}
		if(!$selectTimes){
			return Redirect::back()->withErrors(['Please, Select Time!']);
			exit;
		}

		$selectTimesArray = explode(',', $selectTimes);
		$count = count($selectTimesArray);
		$addCount = 0;
		for($i = 0; $i < $count; $i++){
			$addedDate = $sessiondate . ' '. $selectTimesArray[$i];
			$convertTime = strtotime($addedDate);

			$confirmAppointment = Appointment:: checkConfirmAppointment($joinid, $addedDate);

			if($confirmAppointment == 0){
				$appointment = new Appointment();
				$appointment->join_id = $joinid;
				$appointment->session_time = $addedDate;
				$appointment->convert_time = $convertTime;
				$appointment->save();
				$addCount++;
			}
		}
		if($addCount == $count){
			return redirect('/admin/appointmentmanagement')->withErrors('Succsssfully All Appointments Register!');
			exit;
		}

		if($addCount == 0){
			return redirect('/admin/appointmentmanagement')->withErrors('Fail All Appointments Register!');
			exit;
		}

		return redirect('/admin/appointmentmanagement')->withErrors('Succsssfully some Appointments Register!');
	}

	/*//////////////////// News Action ////////////////////*/

	/*
	* Get News list
	* @param : no
	* @return: check login and return news lists
	*/
	public function newsManagement(){

		$news = new News();
		$newsList = $news -> getNewsData(15);

		$totalNewsCount = $news -> TotalCountNews();

		return view('/admin/news/newmanagement', compact('newsList','totalNewsCount'));
	}

	/*
	* Show News by id
	* @param : news id
	* @return: check login and Show News by News_id
	*/
	public function newsEdit($id){
		if(!Auth::check()) {
			 return redirect('/');
		}
		$news 		= new News();
		$newsdetail = new Newsdetail();

		$index			 = $id;
		$newsDetailData  = $news -> getNewsDetailData($id);
		$imageData		 = $newsdetail -> getNewsImageSliderData($id);

		return view('/admin/news/newsdetails', compact('index', 'newsDetailData', 'imageData'));
	}

	/*
	* News Delete Action
	* @param : news id
	* @return: check login and delete news
	*/
	public function newsDelete(Request $request){

		$newsId = $request -> newsid;
		News::find($newsId) -> delete();
		Newsdetail::where('news_id', '=', $newsId)->delete();
		return Redirect::back()->withErrors(['Delete successfully.']);
	}

	/*
	* News Edit-Save Action
	* @param : Submitted Form
	* @return: check login and News Updated
	*/
	public function newsEditSave(Request $request){

		$input = $request->all();
		$images = array();
		if($uploadImages = $request->file('newsimages')){
			foreach($uploadImages as $uploadimage){
				$file_name = time(). '.'. $uploadimage->getClientOriginalExtension();
				$uploadimage->move(public_path('images/news/details'), $file_name);
				sleep(1);
				$images[] = $file_name;
			}
		}

		$newsId = $request -> newsid;
		$news = News::find($newsId);
		if($images){
			$news -> thumb = $images[0];
		}
		$news -> title = $request -> newstitle;
		$news -> des = $request -> newsdes;
		$news -> save();


		if($images){
			Newsdetail::where('news_id', '=', $newsId)->delete();
			foreach($images as $image){
				$newsdetail = new Newsdetail();
				$newsdetail -> news_id = $newsId;
				$newsdetail -> img_url = $image;
				$newsdetail -> save();
			}
		}


		return redirect('/admin/newsmanagement')->withErrors('Succsssfully Add!');
	}

	/*
	* News Add-New-Save Action
	* @param : Submitted Form
	* @return: check login and New News Save
	*/
	public function newsNewSave(Request $request){

		$input = $request->all();
		$images = array();
		if($uploadImages = $request->file('newsimages')){
			foreach($uploadImages as $uploadimage){
				$file_name = time(). '.'. $uploadimage->getClientOriginalExtension();
				$uploadimage->move(public_path('images/news/details'), $file_name);
				sleep(1);
				$images[] = $file_name;
			}
		}

		if(!$images){
			return Redirect::back()->withErrors(['News image(s) must be upload!']);
			exit;
		}
		if(!$request -> newstitle){
			return Redirect::back()->withErrors(['News Title must be Entered!']);
			exit;
		}

		$news = new News();
		$news -> title = $request -> newstitle;
		$news -> des = $request -> newsdes;
		$news -> thumb = $images[0];
		$news -> save();
		$lastInsertedId = $news->id;
		foreach($images as $image){
			$newsdetail = new Newsdetail();
			$newsdetail -> news_id = $lastInsertedId;
			$newsdetail -> img_url = $image;
			$newsdetail -> save();
		}

		return redirect('/admin/newsmanagement')->withErrors('Succsssfully Add!');
	}

	/*
	* News New Action
	* @param : no
	* @return: check login and Open New window
	*/
	public function newsNew(){

		return view('admin/news/addnewnews');
	}

	/*//////////////////// Message Action ////////////////////*/

	/*
	* Get Message Content
	* @param : Status 0-student 1-instructor 2-moderator
	* @return: check login and student list by status and own type
	*/
	public function messageManagement(){

		$user = new User();
		$studentCount = $user -> getUserCountByStatus(0);
		$instructorCount = $user -> getUserCountByStatus(1);
		$instructorList = User::where('status', '=', '1')->get();
		$studentList = User::where('status', '=', '0')->get();
		if(isset($_GET['instructorid'])){
			$instructorid = $_GET['instructorid'];
		}else{
			$instructorid = 0;
		}

		if(isset($_GET['studentid'])){
			$studentid = $_GET['studentid'];
		}else{
			$studentid = 0;
		}

		if(isset($_GET['sort'])){
			$getSortParam = $_GET['sort'];
		}else{
			$getSortParam = "id";
		}

		if(isset($_GET['direction'])){
			$getDirection = $_GET['direction'];
		}else{
			$getDirection = "ASC";
		}

		$messageList = Message::getMessageList($getSortParam, $getDirection, $instructorid, $studentid, 10);
		$messageCount = Message::count();

		return view('/admin/message/messagemanage', compact('instructorCount', 'studentCount','instructorList', 'studentList', 'messageList', 'messageCount'));

	}



	/*///////// Library Mangement //////////*/

	/*
	* Get quran menu, category, subcategory, items count
	* @param : no
	* @return: check login and return quran menu, category, subcategory, items count
	*/
	public function libraryManagement(){

		$totalQuranMenuCount = Quranmenu::count();
		$totalLibraryCategoryCount = Librarycategory::count();
		$totalLibrarySubcategoryCount = Librarysubcategory::count();
		$totalLibraryItemsCount = Libraryitems::count();

		return view('/admin/library/librarymanagement', compact('totalQuranMenuCount','totalLibraryCategoryCount','totalLibrarySubcategoryCount','totalLibraryItemsCount'));
	}

	//--------------- Quranmenu Management ----------//
	/*
	* Get Quranmenu list
	* @param : no
	* @return: check login and return Quranmenu list and count
	*/
	public function quranMenuManagement(){

		if(isset($_GET['sort'])){
			$getSortParam = $_GET['sort'];
		}else{
			$getSortParam = 'default';
		}

		$quranmeunList = Quranmenu::getQuranmenuList($getSortParam, 10);
		$totalQuranMenuCount = Quranmenu::count();

		return view('/admin/library/quranmenumanagement', compact('quranmeunList','totalQuranMenuCount'));
	}

	/*
	* quranMenu Add-New-Save Action
	* @param : Submitted Form
	* @return: check login and Add new quranMenu
	*/
	public function quranMenuNewSave(Request $request){

		if(!$request -> quranmenuname){
			return Redirect::back()->withErrors(['Quranmenu Title must be Entered!']);
			exit;
		}
		$quranmenu = new Quranmenu();
		$quranmenu -> menu_name = $request -> quranmenuname;

		$quranmenu -> save();
		return redirect('/admin/quranmenu')->withErrors('Succsssfully Add!');
	}

	/*
	* quranMenu Delete Action
	* @param : quranMenu id
	* @return: check login and delete quranMenu
	*/
	public function quranMenuDelete(Request $request){

		$quranmenuid = $request -> quranmenuid;
		$quranmenu = Quranmenu::find($quranmenuid);
		$quranmenu -> delete();
		return Redirect::back()->withErrors(['Delete successfully.']);
	}

	/*
	* quranMenu Edit-Save Action
	* @param : quranMenu id
	* @return: check login and Update edited quranMenu
	*/
	public function quranMenuEditSave(Request $request){

		$quranmenuid = $request -> quranmenuid;
		$quranmenu = Quranmenu::find($quranmenuid);

		$quranmenu -> menu_name = $request -> quranmenuname;

		$quranmenu -> save();
		return redirect('/admin/quranmenu')->withErrors('Succsssfully Update!');
	}

	//--------------- Library Category Management ----------//
	/*
	* Get Library Category list
	* @param : no
	* @return: check login and return Library Category list and count
	*/
	public function libraryCategoryManagement(){

		if(isset($_GET['sort'])){
			$getSortParam = $_GET['sort'];
		}else{
			$getSortParam = 'default';
		}

		$libraryCategoryList = Librarycategory::getLibrarycategoryList($getSortParam, 10);
		$totalLibraryCategoryCount = Librarycategory::count();
		$quranmenudata = Quranmenu::orderby('id')->get();
		return view('/admin/library/categorymanagement', compact('libraryCategoryList','totalLibraryCategoryCount', 'quranmenudata'));
	}

	/*
	* Library Category Add-New-Save Action
	* @param : Submitted Form
	* @return: check login and Add new Library Category
	*/
	public function libraryCategoryNewSave(Request $request){

		if(!$request -> categoryname){
			return Redirect::back()->withErrors(['Librarycategory Title must be Entered!']);
			exit;
		}
		//var_dump($request -> categorytypes);exit;
		if($request -> categorytypes == '-1'){
			return Redirect::back()->withErrors(['Librarycategory Type must be Selected!']);
			exit;
		}else{
			$librarycategory = new Librarycategory();

			if($request -> categorytypes == '0'){
				$librarycategory -> menu_id = 0;

			}else{

				if(!$request -> menuid){
					return Redirect::back()->withErrors(['Menu must be Selected!']);
					exit;
				}
				$librarycategory -> menu_id = $request -> menuid;

			}
			$librarycategory -> cat_name = $request -> categoryname;
			$librarycategory -> types = $request -> categorytypes;
			$librarycategory -> save();
			return redirect('/admin/librarycategory')->withErrors('Succsssfully Add!');

		}

	}

	/*
	* Library Category Delete Action
	* @param : Library Category id
	* @return: check login and delete Library Category
	*/
	public function libraryCategoryDelete(Request $request){

		$categoryid = $request -> categoryid;
		$librarycategory = Librarycategory::find($categoryid);
		$librarycategory -> delete();
		return Redirect::back()->withErrors(['Delete successfully.']);
	}

	/*
	* Library Category Edit-Save Action
	* @param : Library Category id
	* @return: check login and Update edited Library Category
	*/
	public function libraryCategoryEditSave(Request $request){

		$categoryid = $request -> categoryid;

		$librarycategory = Librarycategory::find($categoryid);

		if($request -> categorytypes == '0'){
			$librarycategory -> menu_id = 0;
		}else{
			if(!$request -> menuid){
				return Redirect::back()->withErrors(['Meun must be Selected!']);
				exit;
			}
			$librarycategory -> menu_id = $request -> menuid;
		}

		$librarycategory -> cat_name = $request -> categoryname;
		$librarycategory -> types = $request -> categorytypes;
		$librarycategory -> save();
		return redirect('/admin/librarycategory')->withErrors('Succsssfully Update!');


	}


	//-------------- Library Sub Category Management ----------//
	/*
	* Get Library Sub Category list
	* @param : no
	* @return: check login and return Library Sub Category list and count
	*/
	public function librarySubCategoryManagement(){

		if(isset($_GET['sort'])){
			$getSortParam = $_GET['sort'];
		}else{
			$getSortParam = 'default';
		}

		$librarySubCategoryList = Librarysubcategory::getLibrarySubcategoryList($getSortParam, 10);
		$totalSubCategoryCount = Librarysubcategory::count();
		$categoryList = Librarycategory::orderby('id')->get();
		return view('/admin/library/subcategorymanagement', compact('librarySubCategoryList','totalSubCategoryCount', 'categoryList'));
	}

	/*
	* Library Sub Category Add-New-Save Action
	* @param : Submitted Form
	* @return: check login and Add new Library Sub Category
	*/
	public function librarySubCategoryNewSave(Request $request){
		if(!Auth::check()) {
			 return redirect('/');
		}
		if(!$request -> subcategoryname){
			return Redirect::back()->withErrors(['Sub category Title must be Entered!']);
			exit;
		}
		$librarysubcategory = new Librarysubcategory();
		$librarysubcategory -> sub_cat_name = $request -> subcategoryname;
		$librarysubcategory -> cat_id = $request -> categorytypes;
		$librarysubcategory -> save();
		return redirect('/admin/librarysubcategory')->withErrors('Succsssfully Add!');
	}

	/*
	* LibrarySub Sub Category Delete Action
	* @param : Library Sub Category id
	* @return: check login and delete Library Sub Category
	*/
	public function librarySubCategoryDelete(Request $request){

		$subcategoryid = $request -> subcategoryid;
		$librarysubcategory = Librarysubcategory::find($subcategoryid);
		$librarysubcategory -> delete();
		return Redirect::back()->withErrors(['Delete successfully.']);
	}

	/*
	* Library Sub Category Edit-Save Action
	* @param : Library Sub Category id
	* @return: check login and Update edited Library Sub Category
	*/
	public function librarySubCategoryEditSave(Request $request){

		$subcategoryid = $request -> subcategoryid;

		$sublibrarycategory = Librarysubcategory::find($subcategoryid);
		$sublibrarycategory -> sub_cat_name = $request -> subcategoryname;
		$sublibrarycategory -> cat_id = $request -> categorytypes;
		$sublibrarycategory -> save();
		return redirect('/admin/librarysubcategory')->withErrors('Succsssfully Update!');


	}


	//-------------- Library Items Management ----------//
	/*
	* Get Items Category list
	* @param : no
	* @return: check login and return Library Items list and count
	*/
	public function libraryItemsManagement(){

		if(isset($_GET['sort'])){
			$getSortParam = $_GET['sort'];
		}else{
			$getSortParam = 'default';
		}

		$libraryitemsList = Libraryitems::getLibraryItemsList($getSortParam, 10);
		$totalItemsCount = Libraryitems::count();
		$subcategoryList = Librarysubcategory::orderby('id')->get();
		return view('/admin/library/itemmanagement', compact('libraryitemsList','totalItemsCount', 'subcategoryList'));
	}

	/*
	* Library Items Add-New-Save Action
	* @param : Submitted Form
	* @return: check login and Add new Library Items
	*/
	public function libraryItemsNewSave(Request $request){

		if(!$request -> itemname){
			return Redirect::back()->withErrors(['Item Name must be Entered!']);
			exit;
		}
		if($request -> subcategorytypes == 0){
			return Redirect::back()->withErrors(['Sub category must be Entered!']);
			exit;
		}
		$libraryitems = new Libraryitems();
		$mp3_link = 0;
		$pdf_link = 0;
		$ms_link = 0;
		$uploadmp3 = $request->mp3_link;
		$uploadpdf = $request->pdf_link;
		$uploadms = $request->ms_link;

		if($uploadmp3){
			$mp3_link = time(). '.'. $uploadmp3->getClientOriginalExtension();
			$uploadmp3->move(public_path('library/mp3'), $mp3_link);
		}

		if($uploadpdf){
			$pdf_link = time(). '.'. $uploadpdf->getClientOriginalExtension();
			$uploadpdf->move(public_path('library/pdf'), $pdf_link);
		}

		if($uploadms){
			$ms_link = time(). '.'. $uploadms->getClientOriginalExtension();
			$uploadms->move(public_path('library/ms'), $ms_link);
		}


		$libraryitems -> item_name = $request -> itemname;
		$libraryitems -> sub_cat_id = $request -> subcategorytypes;
		$libraryitems -> mp3_link = $mp3_link;
		$libraryitems -> pdf_link = $pdf_link;
		$libraryitems -> ms_link = $ms_link;
		$libraryitems -> save();
		return redirect('/admin/libraryitems')->withErrors('Succsssfully Add!');
	}

	/*
	* LibrarySub Items Delete Action
	* @param : Library Items id
	* @return: check login and delete Library Items
	*/
	public function libraryItemsDelete(Request $request){

		$itemid = $request -> itemid;
		$libraryitems = Libraryitems::find($itemid);
		$libraryitems -> delete();
		return Redirect::back()->withErrors(['Delete successfully.']);
	}

	/*
	* Library Items Edit-Save Action
	* @param : Library Items id
	* @return: check login and Update edited Library Items
	*/
	public function libraryItemsEditSave(Request $request){

		$itemid = $request -> itemid;


		if(!$request -> itemname){
			return Redirect::back()->withErrors(['Item Name must be Entered!']);
			exit;
		}
		if($request -> subcategorytypes == 0){
			return Redirect::back()->withErrors(['Sub category must be Entered!']);
			exit;
		}
		$libraryitems = Libraryitems::find($itemid);

		$uploadmp3 = $request->mp3_link;
		$uploadpdf = $request->pdf_link;
		$uploadms = $request->ms_link;

		if($uploadmp3){
			$mp3_link = time(). '.'. $uploadmp3->getClientOriginalExtension();
			$uploadmp3->move(public_path('library/mp3'), $mp3_link);
			$libraryitems -> mp3_link = $mp3_link;
		}

		if($uploadpdf){
			$pdf_link = time(). '.'. $uploadpdf->getClientOriginalExtension();
			$uploadpdf->move(public_path('library/pdf'), $pdf_link);
			$libraryitems -> pdf_link = $pdf_link;
		}

		if($uploadms){
			$ms_link = time(). '.'. $uploadms->getClientOriginalExtension();
			$uploadms->move(public_path('library/ms'), $ms_link);
			$libraryitems -> ms_link = $ms_link;
		}


		$libraryitems -> item_name = $request -> itemname;
		$libraryitems -> sub_cat_id = $request -> subcategorytypes;



		$libraryitems -> save();
		return redirect('/admin/libraryitems')->withErrors('Succsssfully Update!');


	}

	/*
	* Show new Items Action
	* @param :
	* @return: check login and Show new Items
	*/
	public function libraryItemsNew(){

		$subcategorylist = Librarysubcategory::orderby('id')->get();
		return view('admin/library/addnewlibraryitems', compact('subcategorylist'));
	}

	/*
	* Show Edit Items Action
	* @param : Items id
	* @return: check login and Show new Items
	*/
	public function libraryItemsEdit($id){

		$index = $id;
		$itemdata = Libraryitems::where('id', '=', $id)->get();
		$subcategorylist = Librarysubcategory::orderby('id')->get();
		return view('admin/library/libraryitemdetails', compact('index', 'subcategorylist', 'itemdata'));
	}



}
