<?php
  @session_start();
  include "adminH.html";
?>

<!DOCTYPE html>

<!--
     Name:         Chris Beaudoin
     Project1:     Designing Web Page
     Purpose:	   Create an employee after logged in as admin
     URL:          http://unixweb.kutztown.edu/~cbeau738/Project/Phase2/aemployee.html
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
    function checkInfo()
    {
      //if there is a problem with a field it will turn red
      //reset background color
      document.getElementById("ephone1").style.background="white";
      document.getElementById("ephone2").style.background="white";
      document.getElementById("ephone3").style.background="white";
      document.getElementById("zip").style.background="white";
      document.getElementById("email").style.background="white";
      var message="";
      //Check to see if phone number is numeric
      var phone=document.getElementById("ephone1").value + document.getElementById("ephone2").value + document.getElementById("ephone3").value;
      if(phone!="")
      {
        phone=parseFloat(phone);
        if (isNaN(phone))
        {
          message+="The Phone number must be numeric\n";
          document.getElementById("ephone1").style.background="red";
          document.getElementById("ephone2").style.background="red";
          document.getElementById("ephone3").style.background="red";
        }
      }
      //Check to see if zip code is numeric
      var zip=document.getElementById("zip").value;
      if (zip!="")
      {
        zip=parseFloat(zip);
        if (isNaN(zip))
        {
          message+="The zip code must be numeric\n";
          document.getElementById("zip").style.background="red";
        }
      }
      //Check for @ and . in email address
      var at=false;var dot=false;
      var email=document.getElementById ("email").value;
      if (email!="")
      {
        var length=email.length;
        for (var idx=length;idx>0;idx--)
        {
          if (email.substring(idx-1,idx)=='@')
            at=true;
          if (email.substring(idx-1,idx)=='.')
            dot=true;
        }
        if (at==false || dot==false)
        {
          message+="The Email address you have entered is not vaild\n"
          document.getElementById("email").style.background="red";
        }
      }

      if (message=="")
        return true;

      //show errors
      window.alert(message);
      return false;
    }
    function formEmployee()
		{

        return true;
    }
    -->
    </script>
   </head>
   <body>
    <table id="content">
      <tr>
        <td></td>
        <td>
          <form action="vEmp.php" method="post">
            <fieldset>
              <table style="width:100%">
                  <tr>
                    <td><lable>Enter the ID of the employee you wish to view:</td>
                    <td><input type="text" name="eid" id="eid" value=<?php echo @$_SESSION['eid']?>><br>
                      <input type="submit" name="look" value="View">
                    </td>
                  </tr>
              </table>
            </fieldset>
          </form>
        </td>
        <td></td>
      </tr>
      <tr>
        <td></td>
        <td style="width:600px">

          <form onsubmit="return formEmployee()" action="uEmp.php" method="post">
              <fieldset id="emp">
		          <table style="width:100%">
		              <tr>
			                 <th colspan="2"><lable>Edit An Employee</label></th>
		              </tr>
		              <tr>
			                 <td><lable>Employee ID:</lable></td>
			                 <td><input type="text" name="id" id="id" value="<?php echo @$_SESSION['eid']?>" required readonly></td>
		              </tr>
		              <tr>
			                 <td><lable>First Name:</lable></td>
			                 <td><input type="text" name="first" id="first" value="<?php echo @$_SESSION['fname']?>" required></td>
		              </tr>
		              <tr>
			                 <td><lable>Last Name:</lable></td>
			                 <td><input type="text" name="last" id="last" value="<?php echo @$_SESSION['lname']?>" required></td>
		              </tr>
		              <tr>
			                 <td><lable>Password:</lable></td>
			                 <td><input type="password" name="password"  id="password" value="<?php echo @$_SESSION['passwd']?>" required></td>
		              </tr>
		              <tr>
			                 <td><lable>Street:<br>City:<br>State:<br>Zip Code:</lable></td>
			                 <td><input type="text" name="street" id="street" value="<?php echo @$_SESSION['address']?>"><input type="text" name="city" id="city" value="<?php echo @$_SESSION['city']?>"><br>
						                <input type="text" name="state" id="state" value="<?php echo @$_SESSION['state']?>"><input type="text" name="zip" id="zip" value="<?php echo @$_SESSION['zip']?>"></td>
		              </tr>
                  <tr>
			                 <td><lable>Email Address:</lable></td>
			                 <td><input type="text" name="email" id="email" value="<?php echo @$_SESSION['email']?>"></td>
		              </tr>
                  <tr>
			                 <td><lable>Phone Number:</lable></td>
			                 <td><input type="text" name="ephone1" id="ephone1" value="<?php echo @$_SESSION['phone']?>" size="10">
		              </tr>
		              <tr>
			                 <td><input type="submit" name="Update" value="Update"></td>
		              </tr>
	           </table>
           </fieldset>
           </form>
        </td>
        <td></td>
      </tr>
      <tr>
        <td></td>
        <td>
          <form action="delete.php" method="post">
            <fieldset id="delete">
              <table style="width:100%">
                  <tr>
                    <td><lable>To delete the current employee enter your password:</td>
                    <td><input type="password" name="key" id="key" value=""><br>
                        <input type="hidden" name="item" id="item" value="Emp"><input type="hidden" name="col" id="col" value="eid">
                        <input type="hidden" name="url" id="url" value="vEmpP.php"><input type="hidden" name="value" id="value" value="<?php echo $_SESSION['eid']?>">
                      <input type="submit" name="look" value="Delete">
                    </td>
                  </tr>
              </table>
            </fieldset>
          </form>
        </td>
        <td></td>
      <tr>
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
<?php
  $_SESSION['eid']="";
  $_SESSION['fname']="";
  $_SESSION['lname']="";
  $_SESSION['passwd']="";
  $_SESSION['address']="";
  $_SESSION['city']="";
  $_SESSION['state']="";
  $_SESSION['zip']="";
  $_SESSION['email']="";
  $_SESSION['phone']="";
?>
