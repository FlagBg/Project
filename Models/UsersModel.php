<?php

include_once 'Database.php';
include_once '../helpers/User.php';
//include_once 'Login.php';

/**
 * 
 * @brief 	class usermodel is representing the model of the nvc
 * 			takes the values in the database and create it as an object
 * 			
 * 			
 * @param	boolean $db
 *
 */
class UsersModel {
	
	/**
	 * 
	 * @var boolean $db;
	 */
	protected $db;
	
	//const DEFAULT_ROLE_ID = 1;
	
	
	/**
	 * create object 
	 * 
	 * param	string $this->db;
	 *
	 */
	public function __construct()
	{
		$this->db = Database::getInstance();
	}
	
	/**
	 * @brief	create object login() that takes all the values from 
	 * 			the database and return it as statement	
	 * 
	 * 
	 * 
	 * @param 	string  $username
	 * @param	string  $password
	 * @param 	string  sql;
	 * @param	string	stm;
	 * @param	string $result as array();
	 */
	public function login( $username, $password )
	{
		//malka prerabotka
		/*
		 * public function login ( $login )
		 * {
		 * 		$login = array( $login['username'], $login['$password'] );
		 * 
		 *  	$sql   = 'SELECT * FROM users WHERE username = ? AND password = ?';
		 * 
		 * 		$stmt = $this->db->prepare( $sql );
		 * 		
		 * 		$result = $stmt->execute( array( $login ) 
		 * 				if ( $result ) 
		 * 					{ $rows = stmt->fetchAll(PDO::FETCH_ASSOC);
		 * 					{ $user	= array_pop( $rows );
		 * 
		 */
		$sql	= '
			SELECT * FROM users
			WHERE username = ? AND password = ?
		';
		
		$stmt	= $this->db->prepare( $sql );
		//statement;
		
		$result	= $stmt->execute( array( $username, $password ) );
		
		if ( $result )
		{
			if( $stmt->rowCount() > 0 )
			{
				$rows		= $stmt->fetchAll(PDO::FETCH_ASSOC);
				$user		= array_pop( $rows ); 
				//var_dump( $rows );die(); //vadi mi cialoto arrays!!!
				//var_dump( $user );die(); // tozi put izvadi vsi4ko... три пъти нищо не вади!
				//print_r("hi");
				//var_dump( $user );//die();
				
				return new User( $user['id'], $user['fname'], $user['lname'], $user['age'] );
								//$user['username'], $user['id'] ); just in case; 
				//var_dump($user);die();
				//return $user;
				//var_dump( $user );die('hi');
				//$userObj	= User($user['fname'], $user['lname'], $user['age']);
				//$userObj->setId( $user['id'] );
				

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
	
 	public function userEdit( $userData )
 	{
//     kak si go predstavyam . ... edna tablica, koyato vzima dannite za usera.... otdyasno stoyt edni buton4eta
//		koito kato natisna da promenyam poleto, koeto promenyam, inache vsi4ko drugo da si stoi
//		kak e logi4no tova da raboti.... tryabva sigurno da se opishat cialostni zayavki... ima nyakakuv nachin;
//		sega shte napravya deleteUser, zashtoto mislya che e lesno!
 		$sql	= '
				UPDATE `users` SET `id`=[value-1],
 				`username`=,
				`password`=,
				`role_id`=,
 				`fname`=,
 				`lname`=[value-6],
 				`age`=[value-7]
				';
 		
 		$stmt 	= $this->db->prepare( $sql );
		
 		$result = $stmt->execute( $userData );
		
	}
	
	/**
	 * @brief	Get user data
	 * 
	 * @return	array
	 */
	public function getUserData( $userId )
	{
		$sql	= 'SELECT * FROM users WHERE id = ?';
		
		$stmt 	= $this->db->prepare( $sql );
		
		$result = $stmt->execute( array( $userId ) );
		
		$userData	= array();
		if( $result )
		{
			$userData	= $stmt->fetch(PDO::FETCH_ASSOC);
		}
		
		return $userData;
	}
	
	/**
	 * @brief 		function createUser that insert datas in the db, it works with sql query and assiciative array;
	 * 
	 * @details		when is called it takes the params from the db it is doing the query INSERT
	 * 
	 * @param 		array $userData
	 * 
	 * @return 		void
	 * 
	 */	public function createUser( $userData )
	{
		//$sql = 'INSERT INTO users($userData[''],...'
		//$sql = 'INSERT INTO users(username,password,role_id,fname,lname,age) VALUES (username=?,password=?,role_id=?,fname=?,lname=?,age=?)';
		//$sql = 'INSERT INTO users($userData['username'], $userData['password'],$userData['role_id'],
		
		//$userData['role_id'] = self::DEFAULT_ROLE_ID; //just in case removing the javascript and put default role!
		
		$sql = 'INSERT INTO users (username,password,role_id,fname,lname,age) VALUES (?, ?, ?, ?, ?, ?)';
		
		$userData = array($userData['username'], $userData['password'], $userData['role_id'],$userData['fname'], $userData['lname'], $userData['age']);
		
		
		
		/*
		$userData = array($userData['id'])
		$waarde = mysql_insert_id($this->db);
		*/
		
		
		
		/* $sql	= '
			INSERT INTO users
			SET username = ?,
				password = ?,
				role_id	= ?,
				fname = ?,
				lname = ?,
				age = ?
		'; */
		//print_r($userData);;
		$stmt	=  $this->db->prepare( $sql );
		$result	= $stmt->execute( $userData );
		
		return $result;
		//var_dump( $result );die();
	}
	
	public function dropUser( $userData )
	{
		print "delete";
		/*
		$sql = '
				DELETE FROM users WHERE id=?
				';
		
				$stmt = $this->db->prepare( $sql );
				
				$result = $stmt->execute( $userData);
		*/
		//shte si vikna dannite ot UserEdit i tam edin button delete!
	}
	
}

