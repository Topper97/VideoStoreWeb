<?php
  session_start();
  @$login=$_SESSION['login'];
  if ($login=="admin")
    include "adminH.html";
  else if($login=="emp")
    include "empH.html";
  else
    include "noneH.html";
?>

<!DOCTYPE html>

<!--
     Name:         Chris Beaudoin
     Project1:     Designing Web Page
     Purpose:	   Home Page for video store
     URL:          http://unixweb.kutztown.edu/~cbeau738/Project/Phase2/homePage.html
     Course:       CSC 242 - Spring 2017
     Due Date:     Feb. 27, 2017
     Other:        Embedded style sheet used by this page homePage.html
		               External style sheet styles.css
     Extra Credit: When checking data any feild that has incorrect data will be turned red on submit.
                   Will turn back to white if corrected upon hitting submit again or clear.
-->

<html>
   <head>
      <title>Video Store</title>
	  <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <style type="text/css">
      table{width: 100%;}
      td{width: 33%;}
      p{color:#2E2E2E;}
    </style>
   </head>
   <body>
     <table id="layout">
       <!--<tr>
         <td style="text-align:left"><img src="../Images/Movie-Reel.png" alt="movie reel"/></td>
         <th class="title">Gus's Video</th>
         <td style="text-align:right"><img src="../Images/Movie-Reel.png" alt="movie reel"/></td>
      </tr>
      <tr>
        <th><h2>Home</h2></th>
        <th><h2><a href="search.html">Search Invetory</a></h2></th>
        <th><h2><a href="login.php">Login</a></h2></th>
      </tr>-->
      <tr>
        <td><p>Our Mission is to provide an easy way to<br> search for movies you wish to purchase.</p></td>
        <td><img src="../Images/rogueOne.jpeg" alt="New Release"></td>
        <td><p>Click on the <a href="searchP.php">Search Invetory</a> link to look at what<br>
            we have in stock, or if you are an employee <a href="login.php">Login</a>.</p></td>
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
