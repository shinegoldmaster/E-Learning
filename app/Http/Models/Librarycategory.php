<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Librarycategory extends Model
{
    protected $table = "librarycategory";
	
	/** AdminContrlloer@libraryCategoryManagement
     * Get library category list by order param and sort
     * @param : sort 0- default other - order by sort param
     * @Return: Get library category list by order param and sort
     */ 
	static public function getLibrarycategoryList($sort, $pageCount){
		
		if($sort == 'title') $orderCondition = 'cat_name';
		else if($sort == 'date')  $orderCondition = 'created_at';	
		else $orderCondition = 'id';
		
		$items = Librarycategory::orderby($orderCondition)
				->paginate($pageCount);
		
		return $items;
	}
	
	/** MainController@quranPageManagement
     * Get library category list by order param and sort
     * @param : sort 0- default other - order by sort param
     * @Return: Get library category list by order param and sort
     */ 
	static public function getQuranCategoryData(){
		
		$items = Librarycategory::orderby($orderCondition)
				->paginate($pageCount);
		
		return $items;
	}
	
	
}
