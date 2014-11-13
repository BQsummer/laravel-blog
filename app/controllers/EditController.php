<?php

class  EditController extends BaseController {

	public function edit(){

		$title= Input::get('title');
		$author = Auth::user()->name;
		$lebal= Input::get('lebal');
		$content = Input::get('editor');
		$tag = Input::get('tag');
		

		$article_num = Input::get('article_num');
		if($article_num == 'edit'){
			$article = new Edit;
			$article->num = time();
			$article->title = $title;
			$article->author = $author;
			$article->content = $content;
			$article->tags = $tag;
			$article->lebal = $lebal;
			$article->save();
			return  Redirect::back();
		}
		else{
			$article = Edit::where('num','=',$article_num);
			$article->title = $title;
			$article->auther = $auther;
			$article->content = $content;
			$article->tags = $tag;
			$article->lebal = $lebal;
			$article->save();
			return  Redirect::back();
		}
		

		

		
		}
	

	public function image(){

		if (Input::hasFile('upload')){
			$file = Input::file('upload');
			$hz = 'jpg';
			$time = time();
			$name = $time.'.'.$hz;
			$destinationPath = public_path();
			Input::file('upload')->move('upload',$name);
			return "{{ URL::asset('upload/".$name."' )}}";
		}
	}
}