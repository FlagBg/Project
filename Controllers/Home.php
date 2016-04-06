<?php
/**
 * 
 * @brief	class that is the base entry point for the web;
 * 
 * @details it works as requested from the index.php;
 *
 */
class Home
{	
	public function __construct()
	{
		
	}
	
	public function renderView()
	{
		$form	= file_get_contents( __DIR__ . '/../Views/Home.html' );
		
		var_dump($form);
		print( $form );
	}
}
