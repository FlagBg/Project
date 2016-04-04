<?php
/**
 * 
 * @Brief users create an object user, because we have users;
 * 
 * 
 *
 */
class User
{
	/**
	 * 
	 * @param 	string $firstName;
	 * @param 	string $lastName; unknown
	 * @param 	int    $age;
	 */
	protected $firstName;
	
	/**
	 * @var	string $lastName
	 */
	protected $lastName;
	protected $age;
	protected $id;
	
	
	/**
	 * @brief	creating object, using function __construct;
	 * 
	 * @param 	string $firstName
	 * @param 	string $lastName
	 * @param 	int    $age
	 */
	public function __construct( $id, $firstName, $lastName, $age)
	{
		$this->id			= $id;
		$this->firstName 	= $firstName;
		$this->lastName 	= $lastName;
		$this->age 			= $age;
	}
	
	
	/**
	 * @param	string $firstName
	 *
	 * return	string $this->firstName;
	 */
	public function setFirstName()
	{
		$this->firstName = $firstName;
	}
	
	/**
	 * @return	string $this->firstName
	 */
	public function getFirstName()
	{
		return $this->firstName;
	}
	
	/**
	 * @param string $lastName
	 * 
	 * @return string $this->lastName = LastName;
	 */
	public function setLastName()
	{
		$this->lastName = lastName;
	}
	
	public function setId()
	{
		$this->id = $id;
	}
	
	/**
	 * return string;
	 */
	public function getLastName()
	{
		return $this->lastName;
	}
	
	/**
	 * return int age;
	 */
	public function setAge()
	{
		$this->age = $age;
	}
	
	public function getAge()
	{
		return $this->age;
	}
	
	/**
	 * @brief	Get user id
	 * 
	 * @return	int
	 */
	public function getId()
	{
		return $this->id;
	}
	
}