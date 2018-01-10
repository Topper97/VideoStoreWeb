<?php //General longin.php
  @session_start();
	//get data
	$dnum=$_POST['disk'];
	$code=$_POST['code'];
	$price=$_POST['price'];//NULL
	$format=$_POST['format'];
	$status=$_POST['status'];
	//allow for price to be NULL
	$price= ($price=="" ? 'NULL' : $price);


	$_SESSION['dnum']=$dnum;
	$_SESSION['codes']=$code;
	if($price=='NULL')
		$_SESSION['price']="";
	else
		$_SESSION['price']=$price;
	$_SESSION['format']=$format;
	$_SESSION['status']=$status;
	//set up Data base connection
	$DB_HOST='localhost';
	$DB_USER='cbeau738';
	$DB_PASS='Qu7rutru';
	$DB_NAME='bookstore_cbeau738';

	$db = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME) or die("conecting with data base");
	//check if movie exists
	$movie=movieExist();
	if($movie)
	{
		//create a new disk
		$disk="insert into Disks values ($dnum,$price,'$format','$status')";
		$res=$db->query($disk) or die("creating disk $db->error");

		$codes=explode(',',$code);
		for ($idx=0;$idx<count($codes);$idx++)
		{
			//add move to that disk
			$movie="insert into DiskMovies values ($dnum,$codes[$idx])";
			$res=$db->query($movie) or die ("adding movie to disk $db->error");
		}
		include "diskP.php";
		echo "Disk created";
	}
	//if movie doesnt exist send to create that movie
	else {
		include "diskP.php";
		echo "Disk not created<br>Movie does not exist, Please create the movie and try again.";
	}
	$db->close();

	//checks to see if the movie code is in the system returns true if found
	function movieExist()
	{
		//get data
		$code=$_POST['code'];
		//connect to database
		$DB_HOST='localhost';
		$DB_USER='cbeau738';
		$DB_PASS='Qu7rutru';
		$DB_NAME='bookstore_cbeau738';

		$db = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME) or die("conecting with data base");
		$allThere=true;
		$codes=explode(',',$code);
		for ($idx=0;$idx<count($codes);$idx++)
		{
			//check if movie exists
			$find="select * from MovieInfo where code=$codes[$idx]";
			$res=$db->query($find) or die("getting MovieInfo $db->error");
			$numR=$res->num_rows;
			if($numR==0)
			{
				$allThere=false;
			}
		}
		return $allThere;
		$db->close();
	}
?>
