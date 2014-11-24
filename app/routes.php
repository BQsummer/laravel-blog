<?php

Route::get('/test/{num?}', function()
{
	return date("ymd");
	// $a = explode("/",URL::full());
	// $l = count($a);
	// return $a[$l-1];
	// $t = date('Y-m-d H:i:s');
	// return $t;
	//return $email = Auth::user()->name;
	//return $t = time();
	//return $password = Hash::make('123456');
});

//controller
Route::post('article','LoginController@check');
Route::post('post_success',"EditController@edit");
Route::post('post_img','EditController@image');
Route::post('link_article','ArticleController@index');
Route::post('settings','SettingsController@index');

//index
Route::get('/', function()
{
	return View::make('index');
});

Route::get('/content', function()
{
	return View::make('content');
});


//admin
Route::get('/article',array('before'=>'auth','as'=>'article',function()
{
	$msg_count = DB::table('reply')->where('is_read','=','0')->count();
	$exist = DB::table('article')->where('deleted','=','0')->count();
	$deleted = DB::table('article')->where('deleted','=','1')->count();
	$articles = DB::table('article')->select('id','num','title','author','created_at','updated_at','lebal','tags','reply_num','deleted')->paginate(6);
	return View::make('/admin/article',array('exist'=>$exist,'deleted'=>$deleted,'articles'=>$articles,'msg_count'=>$msg_count));
}));

Route::get('/edit/{article_num?}', array('before'=>'auth','as'=>'edit',function($article_num = NULL)
{
	$msg_count = DB::table('reply')->where('is_read','=','0')->count();
	if($article_num){
		$article = DB::table('article')->select('*')->where('num',$article_num)->get();
		return View::make('admin/edit',array('article'=>$article,'msg_count'=>$msg_count));
	}
	return View::make('admin/edit',array('article'=>NULL,'msg_count'=>$msg_count));
}));

Route::get('/settings',array('before'=>'auth','as'=>'settings',function()
{
	$settings = DB::table('settings')->select('*')->where('id','1')->get();
	$msg_count = DB::table('reply')->where('is_read','=','0')->count();
	return View::make('admin/settings',array('msg_count'=>$msg_count,'settings'=>$settings));
}));

Route::get('/reply',array('before'=>'auth','as'=>'reply',function()
{
	$replies = DB::table('reply')->select('*')->paginate(6);
	$msg_count = DB::table('reply')->where('is_read','=','0')->count();
	$approve = DB::table('reply')->where('is_approve','=','0')->count();
	$delete = DB::table('reply')->where('is_deleted','=','1')->count();
	$num = DB::table('reply')->count();
	return View::make('admin/reply',array('msg_count'=>$msg_count,'replies'=>$replies,'approve'=>$approve,'delete'=>$delete,'num'=>$num));
}));

//login
Route::get('/login', function()
{
	return View::make('/login',array('err'=>'0'));
});