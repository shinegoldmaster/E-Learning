<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Group extends Model
{
    protected $table = "group";
	
	/** AdminController@groupmanagement & MainController@index & MainController@getAboutUsPageData
     * get group count
     * @Param : no
     * @Return : group count number
     */
	public function groupCount(){
		return Group::count();
	}
	
	/** AdminController@groupmanagement, MainController@getInitialProgramList
     * get group data by user id
     * @Param : user id    if(-1): all 
     * @Return : Group data
     */
	Static public function getGroupDataByUserID($id){
		if($id == '-1')
			$groupData = Group::get();
		else
			$groupData = Group::where('id', '=' , $id)->get();
		return $groupData;
	}
	
	/** MainController@getStatsPageData
     * get Students count by country
     * @Param : no
     * @Return : student count number by country
     */
	static public function getStuendtsByCountry(){
		$sql = "SELECT tbl2.name, tbl1.total FROM (SELECT u.country, COUNT(u.country) AS total FROM users AS u WHERE u.status = '0' GROUP BY country) AS tbl1 LEFT JOIN country AS tbl2 ON tbl1.country = tbl2.country_id";
		return DB::select($sql);
	}
	
	/** MainController@getStatsPageData
     * get program count by language and group
     * @Param : no
     * @Return : program count by language and group
     */
	static public function getProgramCountByLangAndGroup(){
		$sql = "SELECT tbl2.name, tbl1.total FROM (SELECT group_lang_id, COUNT(group_lang_id) AS total FROM `group` GROUP BY group_lang_id) AS tbl1 RIGHT JOIN `language` AS tbl2 ON tbl1.group_lang_id = tbl2.id
		UNION 
		SELECT group_name, COUNT(group_name) FROM `group` GROUP BY id";
		return DB::select($sql);
	}
	
	
	/** studentController@instructorShow
     * get instructor and appoint data 
     * @Param : no
     * @Return : program count by language and group
     */
	static public function getInstructorAndAppointDataByGroupId($id){
		$currentTime = date('Y-m-d h:i');		
		$sql = "SELECT u.* , g.group_icon , g.group_des, g.group_lang_id, t.total 
		FROM (SELECT `id`, `name`, group_id FROM users WHERE group_id = '".$id."' AND `status` = '1') AS u
		LEFT JOIN `group` AS g ON u.group_id = g.id
		LEFT JOIN (SELECT j.instructor_id, COUNT(a.id) AS total  FROM appointment AS a
		LEFT JOIN `join` AS j ON a.join_id = j.id
		WHERE a.session_time > '".$currentTime."' AND a.id NOT IN (SELECT appointment_id FROM `book`) AND a.status = 0
		GROUP BY a.join_id) AS t 
		ON u.id = t.instructor_id";
		return DB::select($sql);
	}
	
	/** studentController@appointments
     * get instructor's info
     * @Param : no
     * @Return : get insttructor info
     */
	static public function getInstructorInfo($id){
		$sql = "SELECT u.name, g.group_name FROM users AS u
				LEFT JOIN `group` AS g ON u.group_id = g.id
				WHERE u.id = '".$id."'";
		return DB::select($sql);
	}
	
	
	
	
}
