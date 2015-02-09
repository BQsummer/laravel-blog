<?php

class LoginController extends BaseController {

	

	public function check()
	{
		
		$name= Input::get('name');
		$password= Input::get('password');
		$creden = [
			'email' => $name,
			'password' => $password, 
		];

		if(Auth::attempt($creden,true)){
			Auth::login(Auth::user(), true);
			$name = Auth::user()->name;
			$msg_count = DB::table('reply')->where('is_read','=','0')->count();
			$exist = DB::table('article')->where('deleted','=','0')->count();
			$deleted = DB::table('article')->where('deleted','=','1')->count();
			$articles = DB::table('article')->select('id','num','title','author','created_at','updated_at','lebal','tags','reply_num','deleted')->paginate(6);
 			return Redirect::to('admin\article',array('test' =>'1','msg_count'=>$msg_count,'exist'=>$exist,'deleted'=>$deleted,'articles'=>$articles,'authName'=>$name));
		}
		else{
			$creden = [
				'name' => $name,
				'password' => $password, 
			];
			if(Auth::attempt($creden,true)){
				Auth::login(Auth::user(), true);
				$name = Auth::user()->name;
				$msg_count = DB::table('reply')->where('is_read','=','0')->count();
				$exist = DB::table('article')->where('deleted','=','0')->count();
				$deleted = DB::table('article')->where('deleted','=','1')->count();
				$articles = DB::table('article')->select('id','num','title','author','created_at','updated_at','lebal','tags','reply_num','deleted')->paginate(6);
	 			return Redirect::to('admin\article',array('test' =>'1','msg_count'=>$msg_count,'exist'=>$exist,'deleted'=>$deleted,'articles'=>$articles,'authName'=>$name));
			}
			else{
				return View::make('login')->with('err','1');
			}
		}
	}

	public function logout() 
	{
		Auth::logout();
		return View::make('login')->with('err','0');
	}

	
	
}