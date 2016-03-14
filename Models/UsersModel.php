<?php

include_once 'Database.php';
include_once '../helpers/User.php';
//include_once 'Login.php';

class UsersModel {
	
	protected $db;
	
	public function __construct()
	{
		$this->db = Database::getInstance();
	}
	
	public function login( $username, $password )
	{
		$sql	= '
			SELECT * FROM users
			WHERE username = ? AND password = ?
		';
		
		$stmt	= $this->db->prepare( $sql );
		
		$result	= $stmt->execute( array( $username, $password ) );
		
		if ( $result )
		{
			if( $stmt->rowCount() > 0 )
			{
				$rows	= $stmt->fetchAll(PDO::FETCH_ASSOC);
				$user	= array_pop( $rows );
				
				return new User($user['fname'], $user['lname'], $user['age']);
		
			}
			else
			{
				return false;
			}
		}
		else
		{
			return false;
		}
	}
	
// 	public function userUpdate( $userData )
// 	{
// 		$sql	= '
// 				UPDATE `users` SET `id`=[value-1],
// 				`username`=[value-2],
// 				`password`=[value-3],
// 				`role_id`=[value-4],
// 				`fname`=[value-5],
// 				`lname`=[value-6],
// 				`age`=[value-7]
// 				'
// 		$stmt 	= $this->db->prepare( $sql );
		
// 		$result = $stmt->execute( $userData );
		
	}
	
	
	public function createUser( $userData )
	{
		$sql	= '
			INSERT INTO users
			SET username = ?,
				password = ?,
				role_id	= ?,
				fname = ?,
				lname = ?,
				age = ?
		';
		
		$stmt	= $this->db->prepare( $sql );
		
		$result	= $stmt->execute( $userData );
	}
	
	
}

