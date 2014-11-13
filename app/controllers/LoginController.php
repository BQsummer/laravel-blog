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
 			return View::make('admin\article',array('test' =>'1' ));
		}
		else{
			$creden = [
				'name' => $name,
				'password' => $password, 
			];
			if(Auth::attempt($creden,true)){
				Auth::login(Auth::user(), true);
	 			return View::make('admin\article',array('test' =>'1' ));
			}
			else{
				return View::make('login')->with('err','1');
			}
		}
	}

	
	
}