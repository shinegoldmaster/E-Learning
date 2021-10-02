<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Newsdetail extends Model
{
    protected $table = "newsdetail";	
	
	
    /**  MainController@newsDetail, AdminContrlooer@newsEdit
     * get news images data by news_id
     * @Param : news_id
     * @Return : Array images url by news_id
     */
	public function getNewsImageSliderData($id){
		$items = Newsdetail::where('news_id', '=', $id)->get();
		return $items;
	}
}
