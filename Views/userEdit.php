<!DOCTYPE HTML>
<html>
	<head>
	<title>UserEdit</title>
	</head>

<body>
	<h3>EditUsername</h3>
	<form action="index.php?controller=UserEdit" method="post">
		<label for="username">Username:</label><input type="text" id="username" value="<?= $this->userData['username'] ?>"><br>
		<label for="typeUser">typeUser:</label><input type="text" id="role_id" value="<?php echo $this->userData['role_id'] ?>"><br>
		<label for="FirstName">FirstName</label><input type="text" id="fname" value="<?php echo $this->userData['fname'] ?>"><br>
		<label for="LastName" >Last</label><input type="text" id="lname" value="<?php echo $this->userData['lname'] ?>"><br>
		<label for="Age"      >Age</label><input type ="text" id="age" value="<?php echo $this->userData['age'] ?>"><br>
			
		<input type="submit" name="submit" value="Update">
		
		<button type="submit" value="remove" name="op">Remove</button>
		<div><a href="index.php?controller=userDrop">DeleteUser</a></div>
	</form>
	<a href="index.php?controller=logout">Logout</a>
</body>
</html>

<!-- ami tryabva kato natisna submit da go pratya kym controllera edit i ottam da opravya zayavkata i da izpulni komandata shte stane ama dali