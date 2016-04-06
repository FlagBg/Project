<?php

session_start();

include '../utils/UrlHelper.php';

/*
session_start();
if (!isset($_SESSION['op'])) {
  $_SESSION['op'] = 0;
} else {
  $_SESSION['op']++;
}

var_dump( $_SESSION['count'] );
var_dump( $_SESSION[ 'op'] );

if( !$_SESSION['count']) 
//unset($_SESSION['op']);
exit;

if ( ! isset( $_SESSION['id'] ) )
{
	echo "Not logged in";
	// if login request
		// do login
			// if success
				// $_SESSION['id'] = userId
				// redirect to welcome page
			// else
				// show error
	// else
		// display login page
}
else
{
	// the user is logged in
	// show the requested page
}


*/

//$controller	 = isset($_GET['controller']) ? $_GET['controller'] : '';
//the code underneath === $controller up.!
//Is Controller is set up and exists, as shows the path and the name of 
//controller that we request;

error_reporting( E_ALL );
ini_set( 'display_errors', '1' );

if(isset($_GET['controller']))
{
	$controller	= $_GET['controller'];
}
//if controller = empty(if not get!)
else
{
	$controller	= '';
	
	//ne sum podal else case /..... toest.....
	//http://www.electromer.com/?controller=login
}
error_log(print_r($controller, true), 3, 'D:\log.txt');
//if get controller and exists and not empty and equal ot
if ( $controller !== '' )
{	
	//take controller -> 'login' and take it from __DIR__
	if($controller == 'login')
	{
		/**
		 * @brief	login.php is a controller where we have class Login
		 * with object $login( $username, $password, $loggedIn=False and
		 * an $user(var that checked if(loggedIn is true)and print) the form
		 * from the view(Login.html);
		 * 
		 * var	$login as object requesting function renderLoginForm
		 */
		
		include __DIR__ . '/../Controllers/Login.php';

		$login	= new Login();
		
		if ( $login->isLoggedIn() )
		{ // print('hi'); die('asdfafds');
			//header( 'index.php?controller=userEdit' );//NB!!! HOME !!!
			exit();		
			
			UrlHelper::redirect( 'index.php?controller=userEdit' );
		}
		else
		{
			$login->renderLoginForm();
		}
	}
	elseif( $controller == 'logout' )
	{
		include __DIR__ . '/../Controllers/Login.php';
		
		$login	= new Login();
		$login->logout();
		
		UrlHelper::redirect( 'index.php?controller=login' );
	}
	/**
	 * pokazvame v koi controller getva in!
	 */
	
	elseif($controller == 'loginUser')
	{
		/**
		 * brief	elseif condition if not from the form $_POST is not empty and isset in 'action'
		 * 			trim the text in username and code in password; than create an object $login()
		 * 			and request public function loggedIn() that prints everything for the User!
		 */
		include __DIR__ . '/../Controllers/Login.php';
		
		if(! empty( $_POST ) && isset( $_POST['action'] ) && $_POST['action'] == 'login')
		{//tova tuk otkade go vze????
			$username	= '';
			if( isset($_POST['username']) )
			{
				$username	= trim($_POST['username']);
			}
			
			$password	= '';
			if( isset($_POST['password']) )
			{
				$password	= trim($_POST['password']);
			}
			
			$login	= new Login();
			$login->login( $username, $password );
			//print "hi"; die();
			if( $login->isloggedIn() )
			//dotuk raboti, natatyk ne raboti? why?
			{
				//header( 'Location: index.php?controller=userEdit' );
				//exit();
				
				UrlHelper::redirect( 'index.php?controller=userEdit' );
				//die('logged in');

			}
			else
			{
				print_r( 'Error on login' );
				//print('hi'); die();
				$login->renderLoginForm();
				//UrlHelper::redirect('index.php?controller=Login.php');
				
				$homeController->renderView();
				//var_dump( $homeController); die();
				exit;
			}
		}
	}
	elseif($controller == 'userEdit')
	{
		include __DIR__ . '/../Controllers/UserEdit.php';
		
		$userEdit	= new UserEdit();
		
		if( ! empty( $_POST ) )
		{
			$userEdit->userEdit();
		}
		
		$userEdit->renderForm();
	}
	elseif($controller =='userDelete')//elseif($controller == 'userDelete')
	{
		include __DIR__ . '/../Controllers/UserEdit.php';
		
		$userDelete	= new UserEdit();
		
		if( ! empty( $_POST ) )
		{
			
			var_dump($userDelete);
			$userDelete->userDelete();
			//print('asdfdasfasfas'); die();
		}
		
		//$userDelete->renderForm();
		//die();//dobavka mine! // promenih $userEdit na 4userDelete
	}
	elseif($controller == 'userCreate')
	{
		include __DIR__ . '/../Controllers/UserCreate.php';
	
		$userCreate	= new UserCreate();
		$userCreate->renderForm();
		
		if ( $_POST )
		{
			//var_dump( $userCreate->create() ); die();
			$result	= $userCreate->create();//ei tuk dava greshkata!!!
			
			if ( $result )
			{
				UrlHelper::redirect( 'index.php?controller=login' );
				//ÒÎÂÀ ÒÓÊ ÃÐÅØÍÎ ËÈ Å???
			}
		}
	}
	else
	{
		//die('fff');
		UrlHelper::redirect( 'index.php?controller=' );
		//TOVA AKO NAPISHA: UrlHelper::redirect( 'index.php?conctroller=Home';
	}
	
	//slagam si edin controllerDrop! shte trie! NOT HERE!!!! NEEDS TO BE IN OTHER PLACE!
/* 	elseif($controller== 'dropUser')
	{
		include__DIR__ . '/../Controllers/UserDrop.php';
		
		$userDrop = new UserDrop();
		$userDrop->renderForm();
		
		
	} */
}
else
{
	include __DIR__ . '/../Controllers/Home.php';
	
	$homeController	= new Home();
	$homeController->renderView();
}



/*
 * //$user_ip = $_SERVER['REMOTE_ADDR'];

//$string = 'my ip is:' . $user_ip;

function echo_ip()
{
	$user_ip = $_SERVER['REMOTE_ADDR'];
	//global $user_ip;
	$string = 'my ip is:' . $user_ip;
	echo $string;
}

echo_ip();
*/

