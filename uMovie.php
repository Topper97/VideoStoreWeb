<?php  //php file for aemployee.html
  @session_start();
	//get data from form
	$code=$_SESSION['Mcode'];
	$title=$_POST['title'];
	$year=$_POST['year'];
	$stars=$_POST['stars'];
	$imdb=$_POST['rating'];
	$genre=$_POST['genre'];

	//allow for NULL
  $year = ($year=="" ? 'NULL' : "'$year'");
	$stars = ($stars=="" ? 'NULL' : "'$stars'");
	$imdb = ($imdb=="" ? 'NULL' : "'$imdb'");



	//set up connection to database
	$DB_HOST='localhost';
	$DB_USER='cbeau738';
	$DB_PASS='Qu7rutru';
	$DB_NAME='bookstore_cbeau738';

	$db = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME) or die("conecting with data base");
  //update information
  $update="update MovieInfo set title='$title', year=$year, starRating=$stars, imdbRating=$imdb where code=$code";
  $res=$db->query($update) or die ("updating $db->error");

  if($genre!="")
  {
    $check="select * from MovieGenre where code=$code";
    $result=$db->query($check);
    $numR=$result->num_rows;
    if ($numR==0)
    {
      $genreQ="insert into MovieGenre values ($code,'$genre')";
      $res=$db->query($genreQ) or die("adding Genre $db->error");
    }
    else{
      $ugenre="update MovieGenre set genre='$genre' where code=$code";
      $query=$db->query($ugenre) or die ("update genre $db->error");
    }
  }
  else{
    $dgenre="delete from MovieGenre where code=$code";
    $query=$db->query($dgenre) or die ("delete genre $db->error");
  }
  if ($res)
  {
    include "vMovieP.php";
    echo "Movie Updated";
  }


?>