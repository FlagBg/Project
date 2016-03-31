<?php

include_once '../Models/UsersModel.php';

/**
 * 
 * @brief this class create user! it is using constructor and connection with the database!
 * 
 * @details: it works with inherit singleton database connection; and passing the cription using md5;
 * 
 * 
 *
 */

class UserCreate
{
	/**
	 * 
	 * @var Connection $userData;
	 */
	protected $userData;	
	
	/**
	 * @brief	
	 */
	public function __construct()
	{
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
	
	/**
	 * @brief 	this function create the model,
	 * 
	 * @param 	$this->userData;$this
	 * 
	 * $return	$user->userData	
	 * 
	 */
	public function create()
	{ 
		$userModel = new UsersModel();
	
		$userModel->createUser( $this->userData );
		var_dump( $userModel ); die("hi");
	}
	
	/**
	 * @brief	class that is colling the html form that creating the user;
	 * 
	 * @details	it has an address that shows the html path we are calling it;
	 * 
	 * @return	boolean true/false;$this
	 * 
	 */
	public function renderForm()
	{
		$form	= file_get_contents( __DIR__ . '/../Views/createUser.html' );
	
		print( $form );
	}
	//print "notHi";var_dump( $this->userData);die();
}


