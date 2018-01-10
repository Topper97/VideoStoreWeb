<?php  //php file for aemployee.html
	//get data from form
	$dnum=$_POST['disk'];
	$codes=$_POST['code'];
	$price=$_POST['price'];
	$format=$_POST['format'];
	$status=$_POST['status'];
		//allow for NULL
  $price = ($price=="" ? 'NULL' : "'$price'");

	//set up connection to database
	$DB_HOST='localhost';
	$DB_USER='cbeau738';
	$DB_PASS='Qu7rutru';
	$DB_NAME='bookstore_cbeau738';

	$db = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME) or die("conecting with data base");
  //update information
  $update="update Disks set price=$price, format='$format', status='$status' where dnum=$dnum";
  $res=$db->query($update) or die ("updating $db->error");
  if ($res)
  {
    include "vDiskP.php";
    echo "Disk Updated";
  }
?>