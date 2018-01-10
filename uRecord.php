<?php
    @session_start();
    $num=$_SESSION['Knum'];
    $date=$_POST['date'];

    $date = ($date=="" ? 'NULL' : "'$date'");
    //set up Data base connection
    $DB_HOST='localhost';
    $DB_USER='cbeau738';
    $DB_PASS='Qu7rutru';
    $DB_NAME='bookstore_cbeau738';

    $db = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME) or die("conecting with data base");
    $update="update Purchase set pdate=$date where pno='$num'";
    $res=$db->query($update) or die("updating supplier $db->error");
    if ($res)
    {
      include "vRecordP.php";
      echo "Record Updated";
    }

?>