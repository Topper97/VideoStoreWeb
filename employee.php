<?php //General longin.php
	session_start();
	//get data
	$User=$_POST['eUser'];
	$password=$_POST['epassword'];
	//set up to connection to database
	$DB_HOST='localhost';
	$DB_USER='cbeau738';
	$DB_PASS='Qu7rutru';
	$DB_NAME='bookstore_cbeau738';

	$db = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME) or die("conecting with data base");
	//get info from database
	$login="Select * from Emp where eid=$User";
	$res=$db->query($login) or die("Failed to get user $db->error");
	$emp=$res->fetch_assoc();
	$dUser=$emp["eid"];
	$dPass=$emp["passwd"];
	//check entered vs database
	if ($User!=$dUser || $password!=$dPass)
	{
		include 'login.html';
		echo "The username or password does not match any current employee.";
	}
	else
	{
		$_SESSION['login']="emp";
		include 'employeeP.php';
	}

	$db->close();
?>
