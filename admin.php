<?php //Admin longin.php
	session_start();
	//get data
	$User=$_POST['aUser'];
	$password=$_POST['apassword'];
	//set up connection to database
	if ($User!=0)
	{
		include 'login.php';
		echo "The username or password does not match any current administrator.";
	}
	else {

		$DB_HOST='localhost';
		$DB_USER='cbeau738';
		$DB_PASS='Qu7rutru';
		$DB_NAME='bookstore_cbeau738';

		$db = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME) or die("conecting with data base");
		//get info from data base
		$login="Select * from Emp where eid=$User";
		$res=$db->query($login) or die("Failed to get user $db->error");
		$emp=$res->fetch_assoc();
		$dUser=$emp["eid"];
		$dPass=$emp["passwd"];
		//check username and login
		if ($password!=$dPass)
		{
			include 'login.php';
			echo "The username or password does not match any current administrator.";
		}
		else
		{
			$_SESSION['login']="admin";
			include 'adminP.php';
		}

		$db->close();
	}
?>



