<?php
class  PostController extends BaseController {
	public function post(){
		$author= Input::get('author');
		$email= Input::get('email');
		$post_format= Input::get('post_format');
		$post_num= Input::get('post_num');
		$comment= Input::get('comment');
		$article_num = Input::get('article_num');
		$to_author = Input::get('to_author');
		
		$new_reply = new Reply;
		$new_reply->author = $author;
		$new_reply->email = $email;
		$new_reply->article_num = $article_num;

		if($post_format == 2 || $post_format == 3){
			DB::table('reply')->where('id','=',$post_num)->update(array('has_sub_reply'=>1));
			$new_reply->is_sub_reply = 1;
			$new_reply->main_reply = $post_num;
		}
		else{
			$new_reply->is_sub_reply = 0;
			$new_reply->main_reply = 0;
		}
		if($post_format == 3){
			$new_reply->content = "回复 <cite class='fn'>".$to_author."</cite>:<br>".$comment;
		}
		else{
			$new_reply->content = $comment;
		}
		$new_reply->is_read = 0;
		$new_reply->is_approved = 1;
		$new_reply->is_deleted = 0;
		if($post_format == 2){
			$new_reply->has_sub_reply = 1;
		}
		else{
			$new_reply->has_sub_reply =0;
		}

		$new_reply->save();
		$reply_count = DB::table('article')->where('num','=',$article_num)->select('reply_num')->get();
		$reply_count = json_decode(json_encode($reply_count),true);
		$reply_count = $reply_count[0]["reply_num"] + 1;
		DB::table('article')->where('num','=',$article_num)->update(array('reply_num'=>$reply_count));
		return  Redirect::back();

	}
}
?>