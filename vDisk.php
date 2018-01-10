<?php
  @session_start();
  $dnum=$_POST['dnum'];
  if($dnum!="")
  {
    //$_SESSION['eid']=$eid;
    //set up Data base connection
    $DB_HOST='localhost';
    $DB_USER='cbeau738';
    $DB_PASS='Qu7rutru';
    $DB_NAME='bookstore_cbeau738';

    $db = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME) or die("conecting with data base");
    $getDisk="select * from Disks where dnum=$dnum";
    $res=$db->query($getDisk) or die("getting disk $db->error");
    $numR=$res->num_rows;
    if ($numR!=0)
    {
      $rec=$res->fetch_assoc();
      $_SESSION['dnum']=$dnum;
      $_SESSION['price']=$rec['price'];
      $_SESSION['format']=$rec['format'];
      if ($_SESSION['format']=="Blu")
        $_SESSION['format']="Blueray";
      $_SESSION['status']=$rec['status'];
      if ($_SESSION['status']=="A")
        $_SESSION['status']="Available";
      elseif ($_SESSION['status']=="S")
        $_SESSION['status']="Sold";
      elseif ($_SESSION['status']=="N")
        $_SESSION['status']="Not Available";
      elseif ($_SESSION['status']=="L")
        $_SESSION['status']="Lost";
      elseif ($_SESSION['status']=="B")
        $_SESSION['status']="Bad Media";       

      $movies="select * from DiskMovies where dnum=$dnum";
      $res=$db->query($movies) or die("getting movies $db->error");
      $numR=$res->num_rows;
      $rec=$res->fetch_assoc();
      $codes=$rec['code'];
      $numR--;
      while($numR>0)
      {
        $rec=$res->fetch_assoc();
        $code=$rec['code'];
        $codes="$codes, $code";
        $numR--;
      };
      $_SESSION['codes']=$codes;
      include "vDiskP.php";
    }
    else {
      $hold=$dnum;
      include "vDiskP.php";
      echo "No disk exists with a number of $hold";
    }
  }
  else {
    include "vDiskP.php";
    echo "No disk number entered";
  }
?>