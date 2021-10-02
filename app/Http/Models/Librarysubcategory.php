<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Librarysubcategory extends Model
{
    protected $table = "librarysubcategory";
	
	/** AdminContrlloer@libraryCategoryManagement
     * Get library sub category list by order param and sort
     * @param : sort 0- default other - order by sort param
     * @Return: Get library sub category by order param and sort
     */ 
	static public function getLibrarySubcategoryList($sort, $pageCount){
		
		if($sort == 'title') $orderCondition = 'sub_cat_name';
		else if($sort == 'date')  $orderCondition = 'created_at';	
		else $orderCondition = 'id';
		
		$items = Librarysubcategory::orderby($orderCondition)
				->paginate($pageCount);
		
		return $items;
	}
	
	/**
     * Get librarysubcategory list by search string
     * @param : search string
     * @Return:  Get librarysubcategory list by search string
     */ 
	static public function getSubcategoryListBySearchString($str){
		$search_sql = "SELECT l.* FROM librarysubcategory AS l
						LEFT JOIN librarycategory AS c ON l.cat_id = c.id
						WHERE c.cat_name LIKE CONCAT('%', '".$str."', '%') AND c.types = '0'";
		return DB::select($search_sql);
		
	}
	
	/**
     * Get librarysubcategory list
     * @param :  no
     * @Return:  Get librarysubcategory list by search string
     */ 
	static public function getLibrarySubCategoryData(){
		$sql = "SELECT l.* FROM librarysubcategory AS l
						LEFT JOIN librarycategory AS c ON l.cat_id = c.id
						WHERE c.types = '0'";
		return DB::select($sql);
		
	}
	
	
	
}
