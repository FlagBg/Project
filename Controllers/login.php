<?php

include_once '../Models/UsersModel.php';

class Login
{
	protected $username;
	protected $password;
	protected $loggedIn = false;
	protected $user;
	
	public function __construct()
	{
	}
	
	public function login( $username, $password )
	{
		$password = md5( trim( $password ) );
		//die( $password ); 
		$userModel = new UsersModel();
		
		if( $this->user = $userModel->login($username, $password))
		{
			$this->loggedIn = true;
		}
	}

	public function isloggedIn(){
		
		if( $this->loggedIn )
		{
			echo "user is loged in";
			var_dump($this->user->getAge());
			print_r( $this->user);
			
		}else
		{
			echo "Invalid login parameterss";
		}
	}
	
	public function renderLoginForm()
	{
		$form	= file_get_contents( __DIR__ . '/../Views/Login.html' );
		
		print( $form );
	}
}
