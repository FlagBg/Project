<?php

class Home
{
	public function __construct()
	{
		
	}
	
	public function renderView()
	{
		$form	= file_get_contents( __DIR__ . '/../Views/Home.html' );
		
		print( $form );
	}
}
