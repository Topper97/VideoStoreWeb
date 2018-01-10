<?php  //php file for aemployee.html
	//get data from form
	$eid=$_POST['id'];
	$fname=$_POST['first'];
	$lname=$_POST['last'];
	$passwd=$_POST['password'];
	$address=$_POST['street'];
	$city=$_POST['city'];
	$state=$_POST['state'];
	$zip=$_POST['zip'];
	$email=$_POST['email'];
	$phone=$_POST['ephone1'].$_POST['ephone2'].$_POST['ephone3'];
	//allow for NULL
  $address = ($address=="" ? 'NULL' : "'$address'");
	$city = ($city=="" ? 'NULL' : "'$city'");
	$state = ($state=="" ? 'NULL' : "'$state'");
	$zip = ($zip=="" ? 'NULL' : $zip);
	$email= ($email=="" ? 'NULL' : "'$email'");
	$phone = ($phone=="" ? 'NULL' : "'$phone'");

	//set up connection to database
	$DB_HOST='localhost';
	$DB_USER='cbeau738';
	$DB_PASS='Qu7rutru';
	$DB_NAME='bookstore_cbeau738';

	$db = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME) or die("conecting with data base");
	//check to see if employee exists
	$exists="Select * from Emp where eid=$eid";
	$res=$db->query($exists) or die("Failed getting employee $db->error");
	$numRow=$res->num_rows;
	if ($numRow==0)
	{
		//create employee
		$employee="INSERT INTO Emp VALUES ($eid,'$fname','$lname','$passwd',$address,$city,$state,$zip,$email,$phone)";

		$res=$db->query($employee) or die("Failed to insert employee $db->error");
		include "aemployeeP.php";
		echo "Employee created";
	}
	else
	{
		include "aemployeeP.php";
		echo "An employee with that ID already exists please try again";
	}
	$db->close();


?>