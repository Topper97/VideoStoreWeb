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
     Purpose:	   Search in Video Store Invetory
     URL:          http://unixweb.kutztown.edu/~cbeau738/Project/Phase2/search.html
     Course:       CSC 242 - Fall 2017
     Due Date:     Feb. 27, 2017
-->

<html>
   <head>
    <title>Video Store</title>
	  <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <script tyep="text/javascript">
    <!--
    function formClear()
    {
      //confirmation
      var confirm =window.confirm("Are you sure you want to clear this data?");
      if (confirm==false)
        return false;

      return true;
    }
    function formSearch()
    {
      //Confirmation
      /*var confirm =window.confirm("Are you sure you want to compleat this search?");
      if (confirm==false)
        return false;*/

      //read data from form
      var title=document.getElementById ("title").value;
      var code=document.getElementById ("code").value;
      var year=document.getElementById ("year").value;
      var genre=document.getElementById ("genre").value;
      var person=document.getElementById ("person").value;
      //output
      //window.alert("search submitted");
      //document.write("Title: " + title + "<br>Movie Code: " + code + "<br>Year: " + year + "<br>Genre: " + genre + "<br>Person: " + person);
      return true;
    }
    -->
    </script>
   </head>
   <body>
    <table  id="content">
      <tr>
        <td></td>
        <td style="background-image:url(../Images/reelTicket.png);height:550px;background-repeat:no-repeat;width:600px;background-position:center">
          <form action="search.php" method="post" onsubmit="return formSearch()" onreset="return formClear()">
		        <table style="width:100%">
		            <tr>
			               <th colspan="2" ><lable><h3>Search By:</h3></label></th>
		            </tr>
		            <tr>
			               <th colspan="2"><lable>Select one or more the the options listed below</label></th>
		            </tr>
		            <tr>
			               <td><lable>Title:</lable></td>
			               <td><input type="text" name="title" id="title" value=""></td>
		            </tr>
		            <tr>
			               <td><lable>Movie Code:</lable></td>
			               <td><input type="text" name="code" id="code" value=""></td>
		            </tr>
		            <tr>
			               <td><lable>Year:</lable></td>
			               <td><input type="text" name="year" id="year" value=""></td>
		            </tr>
		            <tr>
			               <td><lable>Genre:</lable></td>
			               <td><input type="text" name="genre" id="genre" value=""></td>
		            </tr>
		            <tr>
			               <td><lable>Person:</lable></td>
			               <td><input type="text" name="person" id="person" value=""></td>
		            </tr>
		            <tr>
			               <td><input type="submit" name="search" value="Search"></td>
			               <td><input type="reset" name="Clear" value="Cancel"></td>
		           </tr>
			</table>
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
