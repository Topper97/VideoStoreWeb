<?php //General longin.php
	//get data
	$dnum=$_POST['disk'];
	$code=$_POST['code'];
	$price=$_POST['price'];
	$format=$_POST['format'];
	$status=$_POST['status'];
	//allow for Null
	$price= ($price=="" ? 'NULL' : $price);
	//set up database connection
	$DB_HOST='localhost';
	$DB_USER='cbeau738';
	$DB_PASS='Qu7rutru';
	$DB_NAME='bookstore_cbeau738';

	$db = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME) or die("conecting with data base");
	//Check if the movie already exists
	$movie=movieExist();
	if($movie)
	{
		//create a new disk
		$disk="insert into Disks values ($dnum,$price,'$format','$status')";
		$res=$db->query($disk) or die("creating disk $db->error");

		//add move to that disk
		$movie="insert into DiskMovies values ($dnum,$code)";
		$res=$db->query($movie) or die ("adding movie to disk $db->error");
		include "edisk.html";
		echo "Disk created";
	}
	//if movie doesnt exist send to create movie
	else {
		include "emovie.html";
		echo "Disk not created<br>Movie does not exist, Please create the movie and try again.";
	}
	$db->close();

	//checks to see if the movie code is in the system returns true if found
	function movieExist()
	{
		//get data
		$code=$_POST['code'];
		//set up connection to database
		$DB_HOST='localhost';
		$DB_USER='cbeau738';
		$DB_PASS='Qu7rutru';
		$DB_NAME='bookstore_cbeau738';

		$db = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME) or die("conecting with data base");

		//check if movie exists
 	 	$find="select * from MovieInfo";
 	 	$res=$db->query($find) or die("getting MovieInfo $db->error");
 	 	$numR=$res->num_rows;
 	 	for ($idx=0;$idx<$numR;$idx++)
 	 	{																																						//search not working
 		 	$disk=$res->fetch_assoc();
 		 	$dcode=$disk["code"];
 		 	if (trim($code)==trim($dcode))
 		 	{
 			 	return true;
 		 	}
 	 	}
 	 	return false;

		$db->close();
	}
?>
