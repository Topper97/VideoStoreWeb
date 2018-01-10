<?php
  @session_start();
  $name=$_POST['name'];

  if ($name!="")
  {

    //set up Data base connection
    $DB_HOST='localhost';
    $DB_USER='cbeau738';
    $DB_PASS='Qu7rutru';
    $DB_NAME='bookstore_cbeau738';

    $db = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME) or die("conecting with data base");
    $getSup="select * from Suppliers where sname='$name'";
    $res=$db->query($getSup) or die("getting supplier $db->error");
    $numR=$res->num_rows;
    if ($numR!=0)
    {
      $_SESSION['name']=$name;

      include "vSupplierP.php";
    }
    else {
      $hold=$name;
      include "vSupplierP.php";
      echo "No Supplier with name $hold exists";
    }
  }
  else {
    include "vSupplierP.php";
    echo "No Supplier entered";
  }
?>