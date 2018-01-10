<?php
//get Vars
  $value=$_POST['value'];
  $key=$_POST['key'];

  //set up Data base connection
  $DB_HOST='localhost';
  $DB_USER='cbeau738';
  $DB_PASS='Qu7rutru';
  $DB_NAME='bookstore_cbeau738';

  $db = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME) or die("conecting with data base");
  $admin="select * from Emp where eid=0";
  $query=$db->query($admin);
  $admin=$query->fetch_assoc();
  $pass=$admin['passwd'];

  if ($key == $pass && $value!="")
  {
    //movieInfo
    $delete="delete from MovieInfo where code=$value";
    $res=$db->query($delete) or die("deleting $db->error");
    //genre
    $delete="delete from MovieGenre where code=$value";
    $res=$db->query($delete) or die("deleting $db->error");
    //directs
    $delete="delete from Directs where code=$value";
    $res=$db->query($delete) or die("deleting $db->error");
    //Produces
    $delete="delete from Produces where code=$value";
    $res=$db->query($delete) or die("deleting $db->error");
    //Acts
    $delete="delete from Acts where code=$value";
    $res=$db->query($delete) or die("deleting $db->error");

    include "vMovieP.php";
    echo "The movie was deleted";
  }
  else
  {
    include "vMovieP.php";
    echo "The movie was not deleted the password was incorrect or no data was entered";
  }
  $db->close();
?>