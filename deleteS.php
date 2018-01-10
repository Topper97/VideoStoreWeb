<?php
//get Vars
  $value=$_POST['value'];
  $key=$_POST['key'];
  $item=$_POST['item'];
  $col=$_POST['col'];
  $url=$_POST['url'];

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
    $delete="delete from $item where $col='$value'";
    $res=$db->query($delete) or die("deleting $db->error");

    include "$url";
    echo "$item was deleted";
  }
  else
  {
    include "$url";
    echo "$item was not deleted the password was incorrect or no data was entered";
  }
  $db->close();
?>