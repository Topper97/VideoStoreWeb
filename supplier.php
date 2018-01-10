<?php
	//get data
	$sname=$_POST['name'];
	//set up database connection
	$DB_HOST='localhost';
	$DB_USER='cbeau738';
	$DB_PASS='Qu7rutru';
	$DB_NAME='bookstore_cbeau738';

	$db = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME) or die("conecting with data base");
	//create new supplier
	$supplier="insert into Suppliers values('$sname')";
	$res =$db->query($supplier) or die("Failed to create supplier $db->error");
	include "supplierP.php";
	echo "Supplier created";
	$db->close();
?>
