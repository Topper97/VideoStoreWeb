<?php
	//get data
	$title=$_POST['title'];
	$code=$_POST['code'];
	$year=$_POST['year'];
	$genre=$_POST['genre'];
	$person=$_POST['person'];
	//set up connection database
	$DB_HOST='localhost';
	$DB_USER='cbeau738';
	$DB_PASS='Qu7rutru';
	$DB_NAME='bookstore_cbeau738';

	$db = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME) or die("conecting with data base");
	//create query
	$query="select * from MovieInfo where ";
	$num=0;
	//title
	if ($title!=""){
		if($num>0){
			$query=$query." and title like '%$title%'";
		}
		else {
			$query=$query." title like '%$title%'";
			$num=1;
		}
	}
	//movie code
	if ($code!=""){
		if($num>0){
			$query=$query." and code=$code";
		}
		else {
			$query=$query." code=$code";
			$num=1;
		}
	}
	//year
	if ($year!=""){
		if($num>0){
			$query=$query." and year=$year";
		}
		else {
			$query=$query." year=$year";
			$num=$num+1;
		}
	}
	//genre
	if ($genre!=""){
		if($num>0){
			$getGenre="select * from MovieGenre where genre='$genre'";
			$res=$db->query($getGenre) or die ("Failed to get Genre $db->error");
			$numR=$res->num_rows;
			for ($idx=0;$idx<$numR;$idx++)
			{
				$line=$res->fetch_assoc();
				$code=$line['code'];
				if ($idx==0)
				{
					$query=$query." and (code=$code";
				}
				else {
					$query=$query." or code=$code";
				}
			}
			$query=$query.")";
		}
		else {
			$getGenre="select * from MovieGenre where genre='$genre'";
			$res=$db->query($getGenre) or die ("Failed to get Genre $db->error");
			$numR=$res->num_rows;
			for ($idx=0;$idx<$numR;$idx++)
			{
				$line=$res->fetch_assoc();
				$code=$line['code'];
				if ($idx==0)
				{
					$query=$query." (code=$code";
				}
				else {
					$query=$query." or code=$code";
				}
			}
			$query=$query.")";
			$num=$num+1;
		}
	}
	//Director/producer/actor
	if ($person!=""){
		$checkP="select * from MoviePersons where pname='$person'";
		$res=$db->query($checkP) or die("finding person $db->error");
		$movie="";
		$line=$res->fetch_assoc();
		$pid=$line["pid"];
		//Director
		$director="select * from Directors where pid=$pid";
		$dresult=$db->query($director) or die("finding director $db->error");
		if ($dresult)
		{
			$directs="select * from Directs where pid=$pid";
			$final=$db->query($directs) or die("searching Directs $db->error");
			$numRow=$final->num_rows;
			for($index=0;$index<$numRow;$index++)
			{
				$line=$final->fetch_assoc();
				$code=$line["code"];
				if ($movie=="")
					$movie="code=$code";
				else {
					$movie=$movie." or code=$code";
				}
			}
		}
		//Producer
		$producer="select * from Producers where pid=$pid";
		$presult=$db->query($producer) or die("finding Producers $db->error");
		if ($presult)
		{
			$produces="select * from Produces where pid=$pid";
			$final=$db->query($produces) or die("searching Produces $db->error");
			$numRow=$final->num_rows;
			for($index=0;$index<$numRow;$index++)
			{
				$line=$final->fetch_assoc();
				$code=$line["code"];
				if ($movie=="")
					$movie="code=$code";
				else {
					$movie=$movie." or code=$code";
				}
			}
		}
		//Actor
		$actor="select * from Actors where pid=$pid";
		$aresult=$db->query($actor) or die("finding actor $db->error");
		if ($aresult)
		{
			$acts="select * from Acts where pid=$pid";
			$final=$db->query($acts) or die("searching acts $db->error");
			$numRow=$final->num_rows;
			for($index=0;$index<$numRow;$index++)
			{
				$line=$final->fetch_assoc();
				$code=$line["code"];
				if ($movie=="")
					$movie="code=$code";
				else {
					$movie=$movie." or code=$code";
				}
			}
		}


		if($num>0){
			$query=$query." and ($movie)";
		}
		else {
			$query=$query." ($movie)";
			$num=$num+1;
		}
	}
	//run query
	if($query != "select * from MovieInfo where ")
	{
	$res=$db->query($query) or die("serching in MovieInfo $db->error");
	include 'searchP.php';
	$numR=$res->num_rows;
	echo "Search compleated:<br>";
	if($numR==0)
	{
		echo "No results found please try again";
	}
	else
	{
		while ($row=$res->fetch_assoc()){
		echo $row['title']."<br>Code: ".$row['code']." Year: ".$row['year']." Stars: ".$row['starRating']." IMDB Rating: ".$row['imdbRating']."<br><br>";
		}
	}
}
else {
	include "searchP.php";
}
		$db->close();
?>
