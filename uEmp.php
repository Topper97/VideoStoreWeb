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
	$phone=$_POST['ephone1'];
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
  //update information
  $update="update Emp set fname='$fname', lname='$lname', passwd='$passwd', address=$address, city=$city, state=$state, zip=$zip, email=$email, phone=$phone where eid=$eid";
  $res=$db->query($update) or die ("updating $db->error");
  if ($res)
  {
    include "vEmpP.php";
    echo "Employee Updated";
  }
?>