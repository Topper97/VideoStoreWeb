<?php
  session_start();
  $_SESSION['login']="none";
  include "noneH.html";
?>
<!DOCTYPE html>

<!--
     Name:         Chris Beaudoin
     Project1:     Designing Web Page
     Purpose:	   Login as an Adminsitrator or Employee
     URL:          http://unixweb.kutztown.edu/~cbeau738/Project/Phase2/login.html
     Course:       CSC 242 - Fall 2017
     Due Date:     Feb. 27, 2017
-->

<html>
   <head>
    <title>Video Store</title>
	  <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <script type="text/javascript">
    <!--
    function formELogin()
    {
      //get data from form
      var name=document.getElementById("eUser").value;
      var password=document.getElementById("epassword").value;
      //commented out becauseing going to another page
      //document.write("Username: " + name + "<br>Password: " + password);
      return true;
    }
    function formALogin()
    {
      //get data from form
      var name=document.getElementById("aUser").value;
      var password=document.getElementById("apassword").value;
      //commented out becauseing going to another page
      //document.write("Username: " + name + "<br>Password: " + password);
      return true;
    }
    -->
    </script>
   </head>
   <body>
    <table style="width:100%">
      <tr>
        <td><form name="emplyee" action="employee.php" method="post" onsubmit="return formELogin()">
          <fieldset>
          <lable><h3>Employee Login</h3></lable><br><br>
          <lable>Employee ID:&nbsp</label><input type="text" name="eUser" value="" required><br><br>
          <lable>Password:&nbsp</label><input type="password" name="epassword" value="" required><br><br>
          <input type="submit" name="elogin" value="Login">
          <input type="reset" name="ereset" value="Cancel">
	  </feildset>
        </form></td>
        <td><form id="admin" name="admin" action="admin.php" method="post" onsubmit="return formALogin()">
          <fieldset>
          <lable><h3>Adminsitrator Login</h3></lable><br>
          <label id="message"></label><br>
          <lable>Employee ID:&nbsp</label><input type="text" name="aUser" value="" required><br><br>
          <lable>Password:&nbsp</label><input type="password" name="apassword" value="" required><br><br>
          <input type="submit" name="alogin" value="Login">
          <input type="reset" name="areset" value="Cancel">
        </fieldset>
        </form></td>
      </tr>
      <tr>
        <td colspan="3">Contact Us:</td>
      </tr>
      <tr>
        <td colspan="3">Phone: (123) 856-3342 &nbsp&nbsp&nbsp USPS Mail: 143 Malbarry Rd, Boondocks PA &nbsp&nbsp&nbsp Email: <a href="mailto:example@kutztown.edu">example@kutztown.edu</a></td>
      </tr>
      <tr>
        <td colspan="3">This secries of webpages is project and not an actual store's inventory.</td>
      </tr>
    </table>

   </body>
</html>
