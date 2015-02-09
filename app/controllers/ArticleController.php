<?php

class  ArticleController extends BaseController {

	public function index(){
		$article_num = Input::get('article_num');
		$submit = Input::get('mysubmit');

		if($submit == "删除"){
			foreach ($article_num as $num) {
				$article = Edit::where('num','=',$num)->update(array('deleted'=>1));
				return  Redirect::back();
			}
		}
		if($submit == "查看"){
			foreach($article_num as $num){
				//var_dump($num);
				$pre_article = DB::table('article')->select('id','num','title','author')->where('num','<',$num)->orderBy('num', 'desc')->first();
				$replies = DB::table('reply')->where('article_num','=',$num)->where('is_sub_reply','=',0)->get();
				$sub_replies = DB::table('reply')->where('article_num','=',$num)->where('is_sub_reply','=',1)->get();
				$article = DB::table('article')->where('num','=',$num)->get();
				return View::make('content',array('pre_article'=>$pre_article,'article'=>$article,'replies'=>$replies,'sub_replies'=>$sub_replies));
			}
		}
		if($submit == "编辑"){
			foreach($article_num as $num){
				$article = DB::table('article')->select('*')->where('num','=',$num)->get();
				$msg_count = DB::table('reply')->where('is_read','=','0')->count();
				return View::make('admin/edit',array('article'=>$article,'msg_count'=>$msg_count));
			}
		}



	}
}
?>
