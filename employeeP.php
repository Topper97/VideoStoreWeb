<?php include "empH.html"; ?>
<!DOCTYPE html>

<!--
     Name:         Chris Beaudoin
     Project1:     Designing Web Page
     Purpose:	   Tell the employee they have logged in and give them the menu to chose from
     URL:          http://unixweb.kutztown.edu/~cbeau738/Project/Phase2/employee.html
     Course:       CSC 242 - Fall 2017
     Due Date:     Feb. 27, 2017
-->

<html>
   <head>
      <title>Video Store</title>
	  <meta charset="utf-8">
	<style type="text/css">
		table{width:100%;}
	  </style>
    <link rel="stylesheet" type="text/css" href="styles.css">
   </head>
   <body>

     <table id="content">
	     <tr>
		       <td><h3>You are logged in as an employee please select the action you wish to preform.<h3></td>
	     </tr>
	     <tr>
		       <td><lable><h3>Username: <?php echo $User?> &nbsp&nbsp&nbsp Password: <?php echo $password?><h3></lable></td>
    	</tr>
	    <tr>
	    </tr>
	    <tr>
		      <td>Contact Us:</td>
	   </tr>
	   <tr>
		     <td>Phone: (123) 856-3342 &nbsp&nbsp&nbsp USPS Mail: 143 Malbarry Rd, Boondocks PA &nbsp&nbsp&nbsp Email: <a href="mailto:example@kutztown.edu">example@kutztown.edu</a></td>
	   </tr>
	   <tr>
		     <td>This secries of webpages is project and not an actual store's inventory.</td>
	   </tr>
    </table>

   </body>
</html>
