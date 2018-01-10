<?php
  session_start();
  $login=$_SESSION['login'];
  if($login=="emp")
    include "empH.html";
  else
    include "adminH.html";
?>
<!DOCTYPE html>

<!--
     Name:         Chris Beaudoin
     Project1:     Designing Web Page
     Purpose:	   Change any employee's password
     URL:          http://unixweb.kutztown.edu/~cbeau738/Project/Phase2/apassword.html
     Course:       CSC 242 - Fall 2017
     Due Date:     Feb. 27, 2017
     Other:	   feilds with an error turn red untill fixed or the form is cleared

-->

<html>
   <head>
    <title>Video Store</title>
	  <meta charset="utf-8">
	  <style type="text/css">
		   table{width:100%;}
	  </style>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <script type="text/javascript">
    <!--
    function formClear()
    {
      //confirmation
      var confirm =window.confirm("Are you sure you want to clear this data?");
      if (confirm==false)
        return false;

      //reset background color
      document.getElementById("confirm").style.background="white";
      return true;
    }
    function checkPassword()
    {
      //if there is a problem with a field it will turn red
      //reset background color
      document.getElementById("confirm").style.background="white";
      //get data from form
      var change=document.getElementById("change").value;
      var confirm=document.getElementById("confirm").value;
      var message="";
      //make sure the new password is the same as the confirmation
      if(change!=confirm)
      {
        message+="The confirmation password is not the same as your new password\n";
        document.getElementById("confirm").style.background="red";
      }

      if (message=="")
      {
        return true;
      }
      //show errors
      window.alert(message);
      return false;
    }
    function formPassword()
    {
      //confirmation
      var confirm =window.confirm("Are you sure you want to change you the password?");
      if (confirm==false || checkPassword()==false)
        return false;
      //get data from form
      var user=document.getElementById("name").value;
      var change=document.getElementById("change").value;
      var confirm=document.getElementById("confirm").value;
      //output
      //window.alert("Password Changed")
      //document.write("Username: " + user + "<br>New Password: " + change);
      return true;
    }
    -->
    </script>
   </head>
   <body>
    <table id="content">
      <tr>
        <td></td>
        <td style="width:600px">
          <form action="password.php" method="post" onsubmit="return formPassword()" onreset="return formClear()">
              <fieldset id="movie">
		          <table style="width:100%">
		              <tr>
			                 <th colspan="2"><lable>Reset Password</label></th>
		              </tr>
                  <tr>
                      <th colspan="2"><lable>All fields are required</label></th>
                  </tr>
		              <tr>
			                 <td><lable>Employee ID:</lable></td>
			                 <td><input type="text" name="name" id="name" value="" required></td>
		              </tr>
		              <tr>
			                 <td><lable>New Password:</lable></td>
			                 <td><input type="text" name="change" id="change" value="" required></td>
		              </tr>
		              <tr>
			                 <td><lable>Confirm New Password:</lable></td>
			                 <td><input type="text" name="confirm" id="confirm" value="" required></td>
		              </tr>
		              <tr>
			                 <td><input type="submit" name="Create" value="Change"></td>
			                 <td><input type="reset" name="Clear" value="Cancel"></td>
		              </tr>
	           </table>
           </fieldset>
           </form>
        </td>
        <td></td>
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
