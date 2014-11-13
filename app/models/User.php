<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	protected $table = 'users';

	protected $timestamp = TRUE;

	protected $hidden = array('password', 'remember_token');

	public function getRememberToken()
	{
		return $this->remember_token;
	}

	
	public function setRememberToken($value)
	{
		$this->remember_token = $value;
	}

	
	public function getRememberTokenName()
	{
		return 'remember_token';
	}

	
	public function getReminderEmail()
	{
		return $this->email;
	}

	public function getAuthIdentifier()
	{
		return $this->id;
	}

	
	public function getAuthPassword()
	{
		return $this->password;
	}

}