<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\News;
use App\Http\Models\Newsdetail;

class NewsController extends Controller
{
	/**
     * initial Data on News page
     * @param : no
     * @Return : Array News data by pagenation count
     */
	 public function index(){
		
		$news = new News();
		$newsData = $news -> getNewsData(3);
		return view('/frontend/news', compact('newsData')); 
	 }
	 
	 
	/**
     * Get news detail data by news_id
     * @param : news_id
     * @Return:  news_id, imageData by news_id, newsData by news_id
     */  
    public function detail($id){
		
		$news 		= new News();
		$newsdetail = new Newsdetail();
		
        $index			 = $id;
		$newsDetailData  = $news -> getNewsDetailData($id);
		$imageData		 = $newsdetail -> getNewsImageSliderData($id);
		
        return view('/frontend/newsdetails', compact('index', 'newsDetailData', 'imageData'));
        
    }
}
