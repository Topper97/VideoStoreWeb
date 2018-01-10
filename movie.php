<?php //General longin.php
	//get data
	$title=$_POST['title'];
	$year=$_POST['year'];
	$starRating=$_POST['stars'];
	$imdbRating=$_POST['rating'];
	//Allow for Null values
	$year = ($year=="" ? 'NULL' : $year);
	$starRating = ($starRating=="" ? 'NULL' : $starRating);
	$imdbRating = ($imdbRating=="" ? 'NULL' : $imdbRating);
	//Set up connection to database
	$DB_HOST='localhost';
	$DB_USER='cbeau738';
	$DB_PASS='Qu7rutru';
	$DB_NAME='bookstore_cbeau738';

	$db = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME) or die("conecting with data base");
	//create new movie
	$movie="insert into MovieInfo (title,year,starRating,imdbRating) values ('$title',$year,$starRating,$imdbRating)";
	$res=$db->query($movie) or die ("Failed to insert Movie $db->error");
	//get new movies code
	$codeQ="select max(code) mcode from MovieInfo";
	$holdCode=$db->query($codeQ) or die ("Failed to get movie code $db->error");
	$line=$holdCode->fetch_assoc();
	$code=$line["mcode"];
	//add genre
	$genre=$_POST['genre'];
	if ($genre!=""){
	$genreQ="insert into MovieGenre values ($code,'$genre')";
	$res=$db->query($genreQ) or die("adding Genre $db->error");
	}
	//add Director(s)
	$dName=$_POST['director'];

	if ($dName!=""){
		$directors=explode(",",$dName);
		for ($idx=0;$idx<count($directors);$idx++)
		{
			$position="Directors";
			$pid=addPerson(trim($directors[$idx]),$position);
			$directs="insert into Directs values ($code,$pid)";
			$res=$db->query($directs) or die("adding to Directs $db->error");
		}
	}

	//add Producer(s)
	$pName=$_POST['producer'];
	if($pName!=""){
		$producers=explode(",",$pName);
		for ($idx=0;$idx<count($producers);$idx++)
		{
			$position="Producers";
			$pid=addPerson(trim($producers[$idx]),$position);
			$produces="insert into Produces values ($code,$pid)";
			$res=$db->query($produces) or die("adding to Produces $db->error");
		}
	}
	//add Actor(s)
	$aName=$_POST['cast'];
	if ($aName!=""){
		$actors=explode(",",$aName);
		for ($idx=0;$idx<count($actors);$idx++)
		{
			$position="Actors";
			$pid=addPerson($actors[$idx],$position);
			$acts="insert into Acts values ($code,$pid)";
			$res=$db->query($acts) or die("adding to Acts $db->error");
		}
	}
	include "movieP.php";
	echo "Movie created";
	$db->close();


	//Creates a new person and returns their ID or returns ID of existing person
	function addPerson($pname,$position)
	{
		$DB_HOST='localhost';
		$DB_USER='cbeau738';
		$DB_PASS='Qu7rutru';
		$DB_NAME='bookstore_cbeau738';

		$db = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME) or die("conecting with data base $db->error");

		//check if person exists
		$find="select * from MoviePersons";
		$res=$db->query($find) or die("getting MoviePersons $db->error");
		$numR=$res->num_rows;
		for ($idx=0;$idx<$numR;$idx++)
		{																																						//search not working
			$person=$res->fetch_assoc();
			$dperson=$person["pname"];
			if (trim($pname)==trim($dperson))
			{
				return $person["pid"];
			}
		}

		//add new person if not found
		$nPerson="insert into MoviePersons (pname) values ('$pname')";
		$res=$db->query($nPerson) or die("creating person $db->error");
		$personID="select max(pid) meid from MoviePersons";
		$holdCode=$db->query($personID) or die("get MoviePersons id $db->error");
		$line=$holdCode->fetch_assoc();
		$pid=$line["meid"];
		//make director,producter,actor
		$makeNew="insert into $position values ($pid)";
		$res=$db->query($makeNew) or die("adding position $db->error");
		return $pid;

		$db->close();
	}
?>
