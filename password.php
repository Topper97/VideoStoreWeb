<?php
	//get data
	$eid=$_POST['name'];
	$passwd=$_POST['change'];

	//set up connection to database
	$DB_HOST='localhost';
	$DB_USER='cbeau738';
	$DB_PASS='Qu7rutru';
	$DB_NAME='bookstore_cbeau738';

	$db = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME) or die("conecting with data base");
	//get info from database
	$login="Select * from Emp where eid=$eid";
	$res=$db->query($login) or die("Failed to get user $db->error");
	$emp=$res->fetch_assoc();
	$dname=$emp["eid"];
	//change password
	if ($eid==$dname)
	{
		$change="update Emp set passwd='$passwd' where eid=$eid";
		$res=$db->query($change) or die("Failed to change password $db->error");
		include "passwordP.php";
		echo "Password changed";
	}
	else
	{
		include 'passwordP.php';
		echo "Employee ID does not match any in the system.";
	}

	$db->close();

?>


