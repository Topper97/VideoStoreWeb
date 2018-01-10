<?php
  include "adminH.html";

  //set up connection database
	$DB_HOST='localhost';
	$DB_USER='cbeau738';
	$DB_PASS='Qu7rutru';
	$DB_NAME='bookstore_cbeau738';

	$db = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME) or die("conecting with data base");

  $disks="select * from Disks;";
  $res=$db->query($disks);
  $diskR=$res->num_rows;
  $totalMovies=0;
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
     <table style="align:center" border="6" frame="below">
       <tr>
         <th colspan="2">Stock Report</th>
       </tr>
       <tr>
         <th>Disk ID</th>
         <th><table><tr><td>Movie Code</td><td>Movie Title</td></tr></table></th>
       <tr>
      <?php
      for ($idx=0;$idx<$diskR;$idx++)
      {
        //get disk number
        $dnums=$res->fetch_assoc();
        $dnum=$dnums['dnum'];
        //get movies on disk
        $movies="select * from DiskMovies where dnum=$dnum";
        $result=$db->query($movies);
        $movieR=$result->num_rows;
        $totalMovies+=$movieR;
        $allMovies="<table>";
        for ($i=0;$i<$movieR;$i++)
        {
          $movie=$result->fetch_assoc();
          $movieCode=$movie['code'];
          $themovie="select * from MovieInfo where code=$movieCode";
          $output=$db->query($themovie) or die("getting movie info $db->error");
          $title=$output->fetch_assoc();
          $allMovies="$allMovies <tr>";
          $theTitle=$title['title'];
          $allMovies="$allMovies <td>$movieCode</td><td><a href='info.php?mid=$movieCode' target='_blank'>$theTitle</a></td>";
          $allMovies="$allMovies</tr>";
        }
        $allMovies="$allMovies </table>";
        //print
        echo "<tr>
                <td>$dnum</td>
                <td>$allMovies</td>
              </tr>  ";
      }
      echo "<tr>
              <td>Total: $diskR</td>
              <td>Total: $totalMovies</td>
            </tr>  ";
       ?>
     </table>
  </body>
</html>