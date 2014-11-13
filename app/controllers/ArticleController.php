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
				//未写完
			}
		}
		if($submit == "编辑"){
			foreach($article_num as $num){
				$article = DB::table('article')->select('*')->where('num','=',$num)->get();
				return View::make('admin/edit',array('article'=>$article));
			}
		}



	}
}
?>
