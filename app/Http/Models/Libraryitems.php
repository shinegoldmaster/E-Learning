<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Libraryitems extends Model
{
    protected $table = "libraryitems";
	
	/** AdminContrlloer@libraryItemsManagement
     * Get quranmenu list by order param and sort
     * @param : sort 0- default other - order by sort param
     * @Return: Get quranmenu list by order param and sort
     */ 
	static public function getLibraryItemsList($sort, $pageCount){
		
		if($sort == 'title') $orderCondition = 'item_name';
		else if($sort == 'type')  $orderCondition = 'sub_cat_id';	
		else if($sort == 'date')  $orderCondition = 'created_at';	
		else $orderCondition = 'id';
		
		$items = Libraryitems::orderby($orderCondition)
				->paginate($pageCount);
		
		return $items;
	}
}
