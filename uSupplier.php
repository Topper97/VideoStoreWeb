<?php
    @session_start();
    $oName=$_SESSION['oName'];
    $name=$_POST['name'];
    if($name!="")
    {
    //$_SESSION['eid']=$eid;
    //set up Data base connection
    $DB_HOST='localhost';
    $DB_USER='cbeau738';
    $DB_PASS='Qu7rutru';
    $DB_NAME='bookstore_cbeau738';

    $db = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME) or die("conecting with data base");
    $update="update Suppliers set sname='$name' where sname='$oName'";
    $res=$db->query($update) or die("updating supplier $db->error");

    $update="update  Purchase set sname='$name' where sname='$oName'";
    $res=$db->query($update) or die("updating records $db->error");
    if ($res)
    {
      include "vSupplierP.php";
      echo "Supplier Updated";
    }
    }
    else {
      include "vSupplierP.php";
      echo "Supplier can not have no name";
    }
?>