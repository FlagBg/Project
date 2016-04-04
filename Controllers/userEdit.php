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
	 * @var	int $userId
	 */
	protected $userId;
	
	/**
	 * @var	array $userData
	 */
	protected $userData;
	
	/**
	 * @var	\UsersModel
	 */
	protected $userEditModel;
	
	/**
	 * @brief get the object from the form if not empty
	 */
	public function __construct()
	{
		$this->userEditModel = new UsersModel();
		
		$this->userId	= $_SESSION['user_id'];
	}
	
	/**
	 * @brief create model from the post and overwrite it
	 * 
	 * @param	$this->userData
	 * 
	 * @return 	$this->user->userData;
	 */
	public function userEdit()//dobavka Pit!
	{
		$userData = array(
			$_POST['username'],
			$_POST['role_id'],
			$_POST['fname'],
			$_POST['lname'],
			$_POST['age']
		);
		
		$this->userEditModel->userEdit( $this->userId, $userData );
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
		$this->getUserData();
		
		$form	= include ( __DIR__ . '/../Views/userEdit.php' );
		
		print( $form );
	}
	
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	/**
	 * @brief	function that is putting the values into the form according to userId'
	 * 
	 * @param	int 	userId
	 */
	protected function getUserData()
	{
		$this->userData	= $this->userEditModel->getUserData( $this->userId );
	
	
	
	}
}