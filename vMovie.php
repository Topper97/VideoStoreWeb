<?php
  @session_start();
    $code=$_POST['code'];
    if($code!="")
    {
    //$_SESSION['eid']=$eid;
    //set up Data base connection
    $DB_HOST='localhost';
    $DB_USER='cbeau738';
    $DB_PASS='Qu7rutru';
    $DB_NAME='bookstore_cbeau738';

    $db = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME) or die("conecting with data base");
    $getMovie="select * from MovieInfo where code=$code";
    $res=$db->query($getMovie) or die("getting movie $db->error");
    $numR=$res->num_rows;
    if ($numR!=0)
    {
      $movie=$res->fetch_assoc();

      $_SESSION['code']=$code;
      $_SESSION['title']=$movie['title'];
      $_SESSION['year']=$movie['year'];
      $_SESSION['starRating']=$movie['starRating'];
      $_SESSION['imdbRating']=$movie['imdbRating'];
      //genre
      $genre="select * from MovieGenre where code=$code";
      $res=$db->query($genre);
      $movie=$res->fetch_assoc();
      $_SESSION['genre']=$movie['genre'];

      //directors
      $direct="select * from Directs where code=$code";
      $res=$db->query($direct);
      $numR=$res->num_rows;
      $row=$res->fetch_assoc();
      $pid=$row['pid'];
      $directors="";
      if($pid!="")
      {
      $people="select * from MoviePersons where pid=$pid";
      $query=$db->query($people);
      $person=$query->fetch_assoc();
      $directors=$person['pname'];
      $numR--;
      while ($numR>0)
      {
        $row=$res->fetch_assoc();
        $pid=$row['pid'];
        $people="select * from MoviePersons where pid=$pid";
        $query=$db->query($people);
        $person=$query->fetch_assoc();
        $dir=$person['pname'];
        $directors="$directors, $dir";
        $numR--;
      }
      }
      $_SESSION['directors']=$directors;

      //producers
      $direct="select * from Produces where code=$code";
      $res=$db->query($direct);
      $numR=$res->num_rows;
      $row=$res->fetch_assoc();
      $pid=$row['pid'];
      $directors="";
      if($pid!="")
      {
      $people="select * from MoviePersons where pid=$pid";
      $query=$db->query($people);
      $person=$query->fetch_assoc();
      $directors=$person['pname'];
      $numR--;
      while ($numR>0)
      {
        $row=$res->fetch_assoc();
        $pid=$row['pid'];
        $people="select * from MoviePersons where pid=$pid";
        $query=$db->query($people);
        $person=$query->fetch_assoc();
        $dir=$person['pname'];
        $directors="$directors, $dir";
        $numR--;
      }
      }
      $_SESSION['producers']=$directors;

      //actors
      $direct="select * from Acts where code=$code";
      $res=$db->query($direct);
      $numR=$res->num_rows;
      $row=$res->fetch_assoc();
      $pid=$row['pid'];
      $directors="";
      if($pid!="")
      {
      $people="select * from MoviePersons where pid=$pid";
      $query=$db->query($people);
      $person=$query->fetch_assoc();
      $directors=$person['pname'];
      $numR--;
      while ($numR>0)
      {
        $row=$res->fetch_assoc();
        $pid=$row['pid'];
        $people="select * from MoviePersons where pid=$pid";
        $query=$db->query($people);
        $person=$query->fetch_assoc();
        $dir=$person['pname'];
        $directors="$directors, $dir";
        $numR--;
      }
      }
      $_SESSION['actors']=$directors;


      include "vMovieP.php";
    }
    else {
      include "vMovieP.php";
      echo "No movies exists with a code of $code";
    }
  }
  else {
    include "vMovieP.php";
    echo "No movie code entered";
  }
?>