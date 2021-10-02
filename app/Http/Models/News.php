<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class News extends Model
{
    protected $table = "news";	
	
	 
	/** MainController@getNewsData  , AdminContrlooer@newsManagement
     * initial Data on News page
     * @param : pagination counter
     * @Return : Array News data by pagenation count
     */
	public function getNewsData($id){
		return News::paginate($id);
	}
	
	 /** AdminContrlooer@newsManagement
     * total news count
     * @param : no
     * @Return : return total news count
     */
	public function TotalCountNews(){
		return News::count();
	}
	
	 
	/** MainController@newsDetail, AdminContrlooer@newsEdit
     * Get news detail data by news_id
     * @param : news_id
     * @Return:  news_id, imageData by news_id, newsData by news_id
     */ 
	public function getNewsDetailData($id){
		$items = News::where('id', '=', $id)->get();
		return $items;
	}
	
	
	
	
}
