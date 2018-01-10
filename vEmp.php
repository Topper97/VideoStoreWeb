<?php
  session_start();
  $eid=$_POST['eid'];
  if ($eid!="")
  {
    //set up Data base connection
    $DB_HOST='localhost';
    $DB_USER='cbeau738';
    $DB_PASS='Qu7rutru';
    $DB_NAME='bookstore_cbeau738';

    $db = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME) or die("conecting with data base");
    $getEmp="select * from Emp where eid=$eid";
    $res=$db->query($getEmp) or die("getting employee $db->error");
    $numR=$res->num_rows;
    if ($numR!=0)
    {
      $emp=$res->fetch_assoc();

      $_SESSION['eid']=$eid;
      $_SESSION['fname']=$emp['fname'];
      $_SESSION['lname']=$emp['lname'];
      $_SESSION['passwd']=$emp['passwd'];
      $_SESSION['address']=$emp['address'];
      $_SESSION['city']=$emp['city'];
      $_SESSION['state']=$emp['state'];
      $_SESSION['zip']=$emp['zip'];
      $_SESSION['email']=$emp['email'];
      $_SESSION['phone']=$emp['phone'];

      include "vEmpP.php";
    }
    else {
      $hold=$eid;
      include "vEmpP.php";
      echo "No employee exists with an ID of $hold";
    }
  }
  else {
    include "vEmpP.php";
    echo "No employee ID entered";
  }
?>