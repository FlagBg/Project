<?php

include_once '../Models/UsersModel.php';

/**
 *  
 * @brief   Class that create users; It is using constructor and connection with the db;
 * 
 * @details	works same, inherit sigleton design pattern connection and take the datas from the form. 
 *
 */
class UserEdit
{
	/**
	 * 
	 * @var Connection $userData;
	 */
	protected $userData;
	
	/**
	 * @brief get the object from the form if not empty
	 */
	public function __construct()
	{
		if( !empty( $_POST ) )
		{
			$this->userData = array(
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
	 * @brief create model from the post and overwrite it
	 * 
	 * @param	$this->userData
	 * 
	 * @return 	$this->user->userData;
	 */
	public function userEdit()
	{
		$userEdit = new UsersModel();
		
		$userEdit->editUser( $this->userData );
	}
	/**
	 * @brief	function that is getting the html values;
	 * 
	 * @details	get the form
	 * 
	 * @return boolean true/false
	 */
	public function renderForm()
	{
		$form	= file_get_contents( __DIR__ . '/../Views/userEdit.html' );
		
		print( $form );
	}
	
}