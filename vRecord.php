<?php
  session_start();
  $num=$_POST['num'];
  if($num!="")
  {
    //set up Data base connection
    $DB_HOST='localhost';
    $DB_USER='cbeau738';
    $DB_PASS='Qu7rutru';
    $DB_NAME='bookstore_cbeau738';

    $db = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME) or die("conecting with data base");
    $getRecord="select * from Purchase where pno=$num";
    $res=$db->query($getRecord) or die("getting Record $db->error");
    $numR=$res->num_rows;
    if ($numR!=0)
    {
      $rec=$res->fetch_assoc();
      $_SESSION['num']=$num;
      $_SESSION['date']=$rec['pdate'];
      $_SESSION['supplier']=$rec['sname'];

      $disks="select * from PurchDetails where pno=$num";
      $res=$db->query($disks) or die("getting disks $db->error");
      $numR=$res->num_rows;
      $rec=$res->fetch_assoc();
      $dnums=$rec['dnum'];
      $numR--;
      while($numR>0)
      {
        $rec=$res->fetch_assoc();
        $dnum=$rec['dnum'];
        $dnums="$dnums, $dnum";
        $numR--;
      };
      $_SESSION['dnums']=$dnums;
      include "vRecordP.php";
    }
    else {
      $hold=$num;
      include "vRecordP.php";
      echo "No record exists with a number of $hold";
    }
  }
  else {
    include "vRecordP.php";
    echo "No record number entered";
  }
?>