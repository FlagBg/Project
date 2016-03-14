<?php

//$controller	 = isset($_GET['controller']) ? $_GET['controller'] : '';

if(isset($_GET['controller']))
{
	$controller	= $_GET['controller'];
}
else
{
	$controller	= '';
}

if ( $controller !== '' )
{
	if($controller == 'login')
	{
		include __DIR__ . '/../Controllers/login.php';

		$login	= new Login();
		$login->renderLoginForm();
	}
	/**
	 * pokazvame v koi controller getva in!
	 */
	elseif($controller == 'loginUser')
	{
		include __DIR__ . '/../Controllers/login.php';
		
		if(! empty( $_POST ) && isset( $_POST['action'] ) && $_POST['action'] == 'login')
		{
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
			
			$login->isloggedIn();
		}
	}
	elseif($controller == 'userEdit')
	{
		include __DIR__ . '/../Controllers/UserEdit.php';
		
		$userEdit	= new UserEdit();
		$userEdit->renderForm();
	}
	elseif($controller == 'userEditPost')
	{
		include __DIR__ . '/../Controllers/UserEdit.php';
	
		$userEdit	= new UserEdit();
		
	}
	elseif($controller == 'userCreate')
	{
		include __DIR__ . '/../Controllers/UserCreate.php';
	
		$userCreate	= new UserCreate();
		$userCreate->renderForm();
	
	}
	
}






// include_once 'Electromer.php';
// include_once 'InterfaceElectromer.php';
// include_once 'Users.php';
// include_once 'Admin.php';


// $el = new Electromer(33, 22);

// //print "The price for the Day tariff is: " . $el->priceDayRateValue();
// print "The price for the Night tariff is: " .$el->priceNightRateValue();
// //print $el;


// $admin = new Admin('Ivan', 'Ivanov', 22, 'admin', '3');
// print " My first Name is: " . $admin->getFirstName() . " ";
// print "I am  usertype: " . $admin->getType() . " ";
// print "My level of persmission is " . $admin->getPermissionLevel() . " ";
// print "My age is: " . $admin->getAge() . " ";

