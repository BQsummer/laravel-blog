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
			$article = Edit::where('num','=',$article_num)->first();
			$article->title = $title;
			$article->author = $author;
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
			$ext = 'jpg';
			$time = time();
			$name = $time.'.'.$ext;
			$destinationPath = public_path().'/storage/uploads/article_image';
			Input::file('upload')->move($destinationPath,$name);
			return "{{ URL::asset('upload/".$name."' )}}";
		}
	}
}