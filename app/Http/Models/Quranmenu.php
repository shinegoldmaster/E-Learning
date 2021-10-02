<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Quranmenu extends Model
{
    protected $table = "quranmenu";
	
	/** AdminContrlloer@quranMenuManagement
     * Get quranmenu list by order param and sort
     * @param : sort 0- default other - order by sort param
     * @Return: Get quranmenu list by order param and sort
     */ 
	static public function getQuranmenuList($sort, $pageCount){
		
		if($sort == 'title') $orderCondition = 'menu_name';
		else if($sort == 'date')  $orderCondition = 'created_at';	
		else $orderCondition = 'id';
		
		$items = Quranmenu::orderby($orderCondition)
				->paginate($pageCount);
		
		return $items;
	}
	
}
