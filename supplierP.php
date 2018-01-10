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
     Purpose:	   Displays my profile
     URL:          http://unixweb.kutztown.edu/~cbeau738/Project/Phase2/asupplier.html
     Course:       CSC 242 - Fall 2017
     Due Date:     Feb. 27, 2017
     Other:	   feilds with an error turn red untill fixed or the form is cleared
-->

<html>
   <head>
      <title>Video Store</title>
	  <meta charset="utf-8">
    <script type="text/javascript">
    <!--
    function formClear()
    {
      //confirmation
      var confirm =window.confirm("Are you sure you want to clear this data?");
      if (confirm==false)
        return false;

      return true;
    }
    function formSupplier()
    {
      //confirmation
      var confirm=window.confirm("Create Supplier?")
      if (confirm==false)
        return false;
      //transfer data from form
      var name = document.getElementById("name").value;

      //output
      //window.alert("Supplier Created");
      //document.write("Name: " + name + "<br>Phone Number: " + phone);
      return true;
    }
    -->
    </script>
	<style type="text/css">
		table{width:100%;}
	  </style>
    <link rel="stylesheet" type="text/css" href="styles.css">
   </head>
   <body>
    <table id="content">
      <tr>
        <td></td>
        <td style="width:600px">
          <form action="supplier.php" method="post" onsubmit="return formSupplier()" onreset="return formClear()">
              <fieldset id="movie">
		          <table style="width:100%">
		              <tr>
			                 <th colspan="2"><lable>Create A Supplier</label></th>
		              </tr>
                  <tr>
			                 <th colspan="2"><lable>* indicates a required field</label></th>
		              </tr>
		              <tr>
			                 <td><lable>*Supplier Name:</lable></td>
			                 <td><input type="text" name="name" id="name" value="" required></td>
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
