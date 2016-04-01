<?php

include_once '../Models/UsersModel.php';

class DeleteUser
{
	protected $userData;
	
	public function __construct()
	{
		//print "hi"; die();	
		if( !empty( $_POST ) )
		{
			$this->userdata = array(
					'username' => $_POST['username'],
					'password' => md5(trim($_POST['password'])),
					'role_id' => $_POST['role_id'],
					'fname' => $_POST['fname'],
					'lname' => $_POST['lname'],
					'age' => $_POST['age'],
			);
		}
	}
	
	public function create(){
		$userModel = new UsersModel();
	
		$userModel->dropUser( $this->userData );
	}
	
	/**
	 * @brief again we taking the datas from the html form and create the user;
	 * 
	 * @details this time redirecting into userEdit.html form
	 * 
	 * @return boolean true/false; 
	 */
	
	public function renderForm()
	{
		$form = file_get_contents(__DIR__. '/../Views/userEdit.html');
		
		print ( $form );
		

	}
}	print_r( $this->userData);
