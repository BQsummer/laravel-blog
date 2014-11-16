<?php

class  SettingsController extends BaseController {

	public function index(){
		$title = Input::get('title');
		$description = Input::get('description');
		$keyword = Input::get('keyword');
		$is_reply = Input::get('is_reply');
		$is_approve = Input::get('is_approve');

		if($is_reply == NULL){
			$is_reply = 0;
		}
		if($is_approve == NULL){
			$is_approve = 0;
		}

		DB::table('settings')->where('id','1')->update(array('title'=>$title,'description'=>$description,'keyword'=>$keyword,'is_approve'=>$is_approve,'is_reply'=>$is_reply));

		if (Input::hasFile('my_head_portrait')){
			$file = Input::file('my_head_portrait');
			$ext = 'jpg';
			$name = 'myHeadPortrait.'.$ext;
			$destinationPath = public_path().'/storage/uploads/head_portrait';
			Input::file('my_head_portrait')->move($destinationPath,$name);
		}

		if (Input::hasFile('others_head_portrait')){
			$file = Input::file('others_head_portrait');
			$ext = 'jpg';
			$name = 'othersHeadPortrait.'.$ext;
			$destinationPath = public_path().'/storage/uploads/head_portrait';
			Input::file('others_head_portrait')->move($destinationPath,$name);
		}

		
		return Redirect::back();
	}
}
?>