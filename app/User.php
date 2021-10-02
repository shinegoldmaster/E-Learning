<?php

namespace App;


use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;


class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','firstname','lastname','gender','language','password','age','country','phone','skype','whatsapp','soma','line','viber','notes','status', 'group_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token','phone','skype','whatsapp','soma','line','viber','notes','status', 'group_id',
    ];
	
	/********* Main(frontend) Controller ********************/
	
	/** MainController@getAboutUsPageData &  MainController@index(homepage)
     * get Students count by country
     * @Param : no
     * @Return : student count number
     */
	public function getStudentsCountByCountry(){
		//return User::where('status', '=', 0)->groupBy('country')->get();	
		$sql ="SELECT COUNT(DISTINCT country) AS total FROM users WHERE STATUS = '0'";
		return DB::select($sql);
	}
	
	
	
	/**  MainController@getAboutUsPageData &  MainController@index(homepage)
     * get student count
     * @Param : no
     * @Return : student count
     */
	public function getStudentsCount(){
		return User::where('status', '=', '0')
					->count();		
	}
	
	/*************** Student Controller ************************/
	
	/** StudentController@getRecipienterData
     * get Recipienter list
     * @Param : 
     * @Return : Recipienter list(id, name)
     */
	static public function getAvailableInstructorListForSendMessage($id){
		$instructorListSql = "SELECT t.id, t.name FROM (SELECT j.instructor_id  FROM book AS b 
			LEFT JOIN appointment AS a ON b.appointment_id = a.id
			LEFT JOIN `join` AS j ON a.join_id = j.id
			LEFT JOIN users AS u ON j.instructor_id = u.id			
			WHERE b.student_id = '".$id."'
			GROUP BY j.instructor_id) AS t1
			LEFT JOIN users AS t ON t1.instructor_id = t.id";
		return DB::select($instructorListSql)		;
	}
	
	/** StudentController@studentInfoShow & InstructorController@instructorInfoShow
     * get user info by id
     * @Param : id
     * @Return : user's info
     */
	public function getUserInfoById($id){
		return User::where('id', '=', $id)
					->get();		
	}
	
	/************* Instructor Controller **********************/
	
	
	/** InstructorController@getRecipienterData
     * get Recipienter list
     * @Param : instructor id
     * @Return : relative student list(id, name)
     */
	static public function getAvailableStudentListForSendMessage($id){
		$sql = "SELECT t.id, t.name FROM (SELECT b.student_id  FROM book AS b 
			LEFT JOIN appointment AS a ON b.appointment_id = a.id
			LEFT JOIN `join` AS j ON a.join_id = j.id
			LEFT JOIN users AS u ON j.instructor_id = u.id			
			WHERE j.instructor_id = '".$id."'
			GROUP BY student_id) AS t1
			LEFT JOIN users AS t ON t1.student_id = t.id
			";
		
		return DB::select($sql);		
	}
		
	/** InstructorController@getOwnStudentList
     * get Own Student list
     * @Param : instructor id
     * @Return : Own Student list(id, name)
     */
	static public function getOwnStudentList($id, $pageCount){
		$list = DB::table('book')
					->leftjoin('appointment', 'book.appointment_id' ,'=', 'appointment.id')
					->leftjoin('join', 'appointment.join_id', '=', 'join.id')					
					->leftjoin('users', 'book.student_id' ,'=', 'users.id')
					->leftjoin('group', 'users.group_id' ,'=', 'group.id')
					->leftjoin('country', 'users.country' ,'=', 'country.country_id')
					->select('users.*', 'group.group_name as gname', 'country.name as cname')
					->groupBy('users.id')
					->where('join.instructor_id', '=', $id)
					->paginate($pageCount);
		return $list;
	}
		
	
	
	/*************** Admin Controller ************************/
	/** AdminController@userManagement
     * get user count by status
     * @Param : status 0-student 1-instructor 2-moderator
     * @Return : user count by status
     */
	public function getUserCountByStatus($status){
		return User::where('status', '=', $status)
					->count();		
	}
	
	/** AdminController@userManagement
     * get user list
     * @Param : status 0-student 1-instructor 2-moderator
     * @Return : user list
     */
	public function getUserListByStatus($status, $sortCondition, $direction, $pageCount){
		return User::where('status', '=', $status)
					->orderBy($sortCondition , $direction)
					->paginate($pageCount);		
	}
	
	/** AdminController@userManagement
     * get user list beside admin
     * @Param : admin id
     * @Return : user's list
     */
	public function getUserListBesideAdmin($id, $sortCondition, $direction, $pageCount){
		
		return User::where('id', '!=', $id)
					->orderBy($sortCondition , $direction)
					->paginate($pageCount);		
	}
		
	
	
	
	
}
