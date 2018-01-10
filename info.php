<?php
  session_start();
  include "adminH.html";

  $mid=$_GET['mid'];
  //set up connection database
	$DB_HOST='localhost';
	$DB_USER='cbeau738';
	$DB_PASS='Qu7rutru';
	$DB_NAME='bookstore_cbeau738';

	$db = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME) or die("conecting with data base");

  $getMovie="select * from MovieInfo where code=$mid";
  $res=$db->query($getMovie)or die ("getting movie $db->error");
  $movie=$res->fetch_assoc();
  echo "<br>".$movie['title']."<br>Code: ".$movie['code']."<br>Year: ".$movie['year']."<br>Stars: ".$movie['starRating']."<br>IMDB Rating: ".$movie['imdbRating']."<br><br>";
  ?>