<?php include "adminH.html"; ?>
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
    function formClear()
    {
      //confirmation
      var confirm =window.confirm("Are you sure you want to clear this data?");
      if (confirm==false)
        return false;

      //reset background color
      document.getElementById("ephone1").style.background="white";
      document.getElementById("ephone2").style.background="white";
      document.getElementById("ephone3").style.background="white";
      document.getElementById("zip").style.background="white";
      document.getElementById("email").style.background="white";
      return true;
    }
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
      //confirmation
      var confirm =window.confirm("Are you sure you want to create this employee?");
      if (confirm==false || checkInfo()==false)
        return false;
      //trasfer values from form
      /*var eid=document.getElementById ("id").value;
      var first=document.getElementById ("first").value;
      var last=document.getElementById ("last").value;
      var password=document.getElementById ("password").value;
      var address=document.getElementById ("street").value + " " + document.getElementById ("city").value + ", " + document.getElementById ("state").value + "  " + document.getElementById ("zip").value;
      var email=document.getElementById ("email").value;
      var phone=document.getElementById("ephone1").value + document.getElementById("ephone2").value + document.getElementById("ephone3").value;
      //output*/
      //window.alert("Employee Created");
      //document.write("Employee ID: " + eid + "<br>Name: " + first + " " + last + "<br>Password: " + password + "<br>Address: " + address + "<br>Email Address: " + email +"<br>Phone Number: " + phone);
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
          <form onsubmit="return formEmployee()" onreset="return formClear()" action="aemployee.php" method="post">
              <fieldset id="movie">
		          <table style="width:100%">
		              <tr>
			                 <th colspan="2"><lable>Create An Employee</label></th>
		              </tr>
                  <tr>
			                 <th colspan="2"><lable>* indicates a required field</label></th>
		              </tr>
		              <tr>
			                 <td><lable>*Employee ID:</lable></td>
			                 <td><input type="text" name="id" id="id" value="" required></td>
		              </tr>
		              <tr>
			                 <td><lable>*First Name:</lable></td>
			                 <td><input type="text" name="first" id="first" value="" required></td>
		              </tr>
		              <tr>
			                 <td><lable>*Last Name:</lable></td>
			                 <td><input type="text" name="last" id="last" value="" required></td>
		              </tr>
		              <tr>
			                 <td><lable>*Password:</lable></td>
			                 <td><input type="password" name="password"  id="password" value="" required></td>
		              </tr>
		              <tr>
			                 <td><lable>Address:</lable></td>
			                 <td><input type="text" name="street" id="street" placeholder="Street"><input type="text" name="city" id="city" placeholder="City"><br>
						                <input type="text" name="state" id="state" placeholder="State"><input type="text" name="zip" id="zip" placeholder="Zip Code"></td>
		              </tr>
                  <tr>
			                 <td><lable>Email Address:</lable></td>
			                 <td><input type="text" name="email" id="email" value=""></td>
		              </tr>
                  <tr>
			                 <td><lable>Phone Number:</lable></td>
			                 <td><input type="text" name="ephone1" id="ephone1" value="" size="3"><label> -</label>
					     <input type="text" name="ephone2" id="ephone2" value="" size="3"><label> -</label>
					     <input type="text" name="ephone3" id="ephone3" value="" size="4"></td>
		              </tr>
		              <tr>
			                 <td><input type="submit" name="Create" value="Create"></td>
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
