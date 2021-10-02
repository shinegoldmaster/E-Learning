<?php


Route::get('/abc', 'HomeController@abc');

/***************************************************************/
/***************** Start Frontend Router ***********************/
/***************************************************************/
Route::get('/', 'MainController@index');
Route::get('/main', 'MainController@index');
Route::get('/about', 'MainController@getAboutUsPageData');
Route::get('/program', 'MainController@getInitialProgramList');
Route::get('/program/instructor/{id}', 'MainController@instructorsShow');
Route::get('/program/appointments/{id}', 'MainController@appointments');
Route::get('/news', 'MainController@getNewsData');
Route::get('/news/details/{id}', 'MainController@newsDetail');
Route::get('/help', 'MainController@helpPage');
Route::get('/stats', 'MainController@getStatsPageData');
Route::get('/voicechat', function () {
    return view('layouts/voicechat');
});

Route::get('/librarys', function () {
    return view('library/library');
});
Route::get('/librarys/get-item/{id}', 'MainController@getLibraryItem');
Route::get('/librarys/play-audio/{id}', 'MainController@playLibraryAudio');

Route::get('/quran', 'MainController@quranPageManagement');
Route::get('/quran/{id}', 'MainController@quranPageManagement');
Route::get('/quran/get-subcategory/{id}', 'MainController@getQuranSubcategory');
Route::get('/quran/get-item/{id}', 'MainController@getQuranItem');
Route::get('/quran/play-audio/{id}', 'MainController@playQuranAudio');


/************** Start Admin Dashboard Router *******************/

Route::group(['middleware' => ['web', 'auth', 'admin'], 'prefix' => 'admin'], function () {

    Route::get('/dashboard', 'AdminController@index');
    /////////////////////////// user management////////////////
    Route::get('/usermanagement', 'AdminController@userManagement');
    Route::get('/usermanagement/show-user/{id}', 'AdminController@showUserList');
    Route::post('/user-delete', 'AdminController@userDelete');
    Route::post('/user-update', 'AdminController@userUpdate');

///////////////////////// category management////////////////
    Route::get('/categorymanagement', 'AdminController@categoryManagement');
    Route::post('/category-delete', 'AdminController@categoryDelete');
    Route::post('/category-edit-save', 'AdminController@categoryEditSave');
    Route::post('/category-new-save', 'AdminController@categoryNewSave');
    Route::get('/categorymanagement/category-edit/{id}', 'AdminController@categoryEdit');
    Route::get('/categorymanagement/category-new', 'AdminController@categoryNew');

    /////////////////////// subcategory management////////////////
    Route::get('/subcategorymanagement', 'AdminController@subcategoryManagement');
    Route::post('/subcategory-delete', 'AdminController@subcategoryDelete');
    Route::post('/subcategory-edit-save', 'AdminController@subcategoryEditSave');
    Route::post('/subcategory-new-save', 'AdminController@subcategoryNewSave');
    Route::get('/subcategorymanagement/subcategory-edit/{id}', 'AdminController@subcategoryEdit');
    Route::get('/subcategorymanagement/subcategory-new', 'AdminController@subcategoryNew');

    //////// assign subcategory VS instructor management/////////
    Route::get('/assignsubcategory', 'AdminController@assignManagement');
    Route::post('/update-subcategorytime', 'AdminController@updateSubcategoryTime');
    Route::post('/assign-subcategory-delete', 'AdminController@deleteAssignSubcategory');
    Route::post('/assign-subcategory-insturctor', 'AdminController@assignSubcategoryAndInstructory');

    /////////////////////////// appointment management////////////////
    Route::get('/appointmentmanagement', 'AdminController@appointmentsManagement');
    Route::post('/appointment-delete', 'AdminController@deleteappointment');
    Route::post('/appointment-register', 'AdminController@registerappointment');

    /////////////////////////// news management////////////////
    Route::get('/newsmanagement', 'AdminController@newsManagement');
    Route::post('/news-delete', 'AdminController@newsDelete');
    Route::post('/news-edit-save', 'AdminController@newsEditSave');
    Route::post('/news-new-save', 'AdminController@newsNewSave');
    Route::get('/newsmanagement/news-edit/{id}', 'AdminController@newsEdit');
    Route::get('/newsmanagement/news-new', 'AdminController@newsNew');

    /////////////////////////// Message management////////////////
    Route::get('/messagemanagement', 'AdminController@messageManagement');
    Route::post('/messagemanagement', 'AdminController@messageManagement');

    /////////////////////// library management////////////////
    Route::get('/librarymanagement', 'AdminController@libraryManagement');
    Route::get('/quranmenu', 'AdminController@quranMenuManagement');
    Route::post('/library/quranmenu-delete', 'AdminController@quranMenuDelete');
    Route::post('/library/quranmenu-edit-save', 'AdminController@quranMenuEditSave');
    Route::post('/library/quranmenu-new-save', 'AdminController@quranMenuNewSave');

    Route::get('/librarycategory', 'AdminController@libraryCategoryManagement');
    Route::post('/library/librarycategory-delete', 'AdminController@libraryCategoryDelete');
    Route::post('/library/librarycategory-edit-save', 'AdminController@libraryCategoryEditSave');
    Route::post('/library/librarycategory-new-save', 'AdminController@libraryCategoryNewSave');

    Route::get('/librarysubcategory', 'AdminController@librarySubCategoryManagement');
    Route::post('/library/librarysubcategory-delete', 'AdminController@librarySubCategoryDelete');
    Route::post('/library/librarysubcategory-edit-save', 'AdminController@librarySubCategoryEditSave');
    Route::post('/library/librarysubcategory-new-save', 'AdminController@librarySubCategoryNewSave');


    Route::get('/libraryitems', 'AdminController@libraryItemsManagement');
    Route::post('/libraryitems-delete', 'AdminController@libraryItemsDelete');
    Route::post('/libraryitems-edit-save', 'AdminController@libraryItemsEditSave');
    Route::post('/libraryitems-new-save', 'AdminController@libraryItemsNewSave');
    Route::get('/libraryitems/libraryitems-edit/{id}', 'AdminController@libraryItemsEdit');
    Route::get('/libraryitems/libraryitems-new', 'AdminController@libraryItemsNew');
});


/************ Start Student Dashboard Router *******************/
Route::group(['middleware' => ['web', 'auth', 'student'], 'prefix' => 'student'], function () {
    Route::get('/', 'StudentController@index');
    Route::get('/student-info-show', 'StudentController@studentInfoShow');
    Route::post('info-update', 'StudentController@studentInfoUpdate');

    /////////////////////////// booking and voice room////////////////
    Route::get('/programs-show', 'StudentController@index');
    Route::get('/instructors-show', 'StudentController@instructorsShow');
    Route::get('/appointments/{id}', 'StudentController@appointments');
    Route::get('/show-homework-audio/{id}', 'StudentController@showHomeworkAudio');
    Route::post('/join', 'StudentController@appointmentBooking');
    Route::post('/appointment-cancel', 'StudentController@appointmentCancel');
    Route::get('/appointments-history', 'StudentController@appointmentHistory');
    Route::get('/voice-room', 'StudentController@voiceRoom');

    /////////////////////////// homework management////////////////
    Route::get('/homework-add', 'StudentController@getAvailableAppointmentDataForAddHomework');
    Route::post('/homeworks-add', 'StudentController@addHomework');
    Route::get('/homework-history', 'StudentController@showHomeworkHistory');
    Route::post('/homework-history', 'StudentController@showHomeworkHistory');

    /////////////////////////// msg management////////////////
    Route::get('/msg-send', 'StudentController@getRecipienterList');
    Route::post('/sendmessage', 'StudentController@sendMessages');
    Route::get('/msgs-history', 'StudentController@showSendMessageHistory');
    Route::post('/msgs-history', 'StudentController@showSendMessageHistory');
    Route::get('/msgs-received', 'StudentController@showReceivedMessageHistory');
    Route::post('/msgs-received', 'StudentController@showReceivedMessageHistory');
});


/********* Start Instructor Dashboard Router *******************/

Route::group(['middleware' => ['web', 'auth', 'instructor'], 'prefix' => 'instructor'], function () {

    Route::get('/', 'InstructorController@index');
    Route::get('/instructor-info-show', 'InstructorController@instructorInfoShow');
    Route::post('info-update', 'InstructorController@instructorInfoUpdate');

	////////////////////// Join the zoom us ///////////////////////
	Route::get('/integrate/zoom/request', 'InstructorController@zoomrequest')->name('instructorzoomrequest');
	Route::get('/integrate/zoom/check', 'InstructorController@zoomcheck')->name('instructorzoomcheck');
	
	
    ////////////////////// joinbooking management////////////////
    Route::post('/join', 'InstructorController@bookedJoin');
    Route::get('/voice-room', 'InstructorController@voiceRoom');
    Route::post('/voice-room-end', 'InstructorController@voiceRoomEnd');
    Route::get('/programs-show', 'InstructorController@index');
    Route::get('/joined-history', 'InstructorController@joinedHistory');
    Route::post('/joined-cancel', 'InstructorController@bookedjoinCancel');
    Route::get('/show-homework-audio/{id}', 'InstructorController@showHomeworkAudio');

    ////////////////////// homework management////////////////
    Route::get('/homework-add', 'InstructorController@getAvailableAppointmentData');
    Route::post('/homeworks-add', 'InstructorController@addHomework');
    Route::get('/homework-history', 'InstructorController@showHomeworkHistory');
    Route::post('/homework-history', 'InstructorController@showHomeworkHistory');

    ////////////////////// message management////////////////
    Route::get('/msg-send', 'InstructorController@getRecipienterList');
    Route::post('/sendmessage', 'InstructorController@sendMessages');
    Route::get('/msgs-history', 'InstructorController@showMessageHistory');
    Route::post('/msgs-history', 'InstructorController@showMessageHistory');
    Route::get('/msgs-received', 'InstructorController@showReceivedMessageHistory');
    Route::post('/msgs-received', 'InstructorController@showReceivedMessageHistory');

    ////////////////////// follow up management////////////////
    Route::get('/show-student-list', 'InstructorController@getOwnStudentList');
    Route::get('/followup/{id}', 'InstructorController@getFollowUpData');
    Route::post('/followupdate', 'InstructorController@updateFollowUpDate');

});

/***************************************************************/
/************** Language Processing Router *********************/
/***************************************************************/

Route::post('/language/{locale}', array(
    'MiddlewareGroup' => 'LanguageSwitcher',
    'uses' => 'LanguageController@index'
));
/***************************************************************/
/*********************** Start Cron  Router *********************/
/***************************************************************/
Route::get('/cron/time-status-manage', 'CronController@timeManageByCron');

/***************************************************************/
/*********************** Start Chat  Router *********************/
/***************************************************************/
Route::post('/chat/{option}/{id}', 'ChatController@index');

/***************************************************************/
/******************* Start Ajax and js Router ********************/
/***************************************************************/
Route::post('/getcountry', 'MainController@getCountryData');
Route::post('/getcountryforupdatestudent', 'MainController@getCountryDataForUpdateStudent');
Route::post('/getcategorylist', 'MainController@getCategoryList');
Route::post('/searchSubcategoryData/{flag}/{id}', 'MainController@getSubcategoryListBySearch');


/***************************************************************/
/*********************** Start Auth Router *********************/
/***************************************************************/
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
