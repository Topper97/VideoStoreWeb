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
     Purpose:	   Create a movie once logged in as an admin
     URL:          http://unixweb.kutztown.edu/~cbeau738/Project/Phase2/amovie.html
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
    function formMovie()
    {
      //confirm create movie
      var confirm =window.confirm("Are you sure you want to create this movie?");
      if (confirm==false)
        return false;
      //get data from form
      var title=document.getElementById ("title").value;
      var year=document.getElementById ("year").value;
      var genre=document.getElementById ("genre").value;
      var stars=document.getElementById ("stars").value;
      var rating=document.getElementById ("rating").value;
      var director=document.getElementById ("director").value;
      var producer=document.getElementById ("producer").value;
      var cast=document.getElementById ("cast").value;
      //display data in document
      //window.alert("Movie Created");
      //document.write("Title: " + title + "<br>Year Realeased: " + year + "<br>Number of Stars: " + stars + "<br>Rating: " + rating + "Director(s): " + director + "<br>Producer(s): " + producer + "<br>Leading Cast: " + cast);
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
          <form action="movie.php" method="post" onsubmit="return formMovie()" onreset="return formClear()">
              <fieldset id="movie">
		          <table style="width:100%">
		              <tr>
			                 <th colspan="2"><lable>Create A Movie</label></th>
		              </tr>
                  <tr>
			                 <th colspan="2"><lable>* indicates a required field</label></th>
		              </tr>
		              <tr>
			                 <td><lable>*Title:</lable></td>
			                 <td><input type="text" name="title" id="title" value="" required></td>
		              </tr>
		              <tr>
			                 <td><lable>Year Released:</lable></td>
			                 <td><input type="text" name="year" id="year" value=""></td>
		              </tr>
		              <tr>
			                 <td><lable>Genre:</lable></td>
			                 <td><input type="text" name="genre" id="genre" value=""></td>
		              </tr>
		              <tr>
			                 <td><lable>Stars:</lable></td>
			                 <td><input type="text" name="stars" id="stars" value=""></td>
		              </tr>
                  <tr>
			                 <td><lable>Rating:</lable></td>
			                 <td><input type="text" name="rating" id="rating" value=""></td>
		              </tr>
                  <tr>
			                 <td><lable>Director(s):</lable></td>
			                 <td><textarea name="director" id="director"></textarea></td>
		              </tr>
                  <tr>
			                 <td><lable>Producer(s):</lable></td>
			                 <td><textarea name="producer" id="producer"></textarea></td>
		              </tr>
                  <tr>
			                 <td><lable>Leading Cast:</lable></td>
					 <td><textarea name="cast" id="cast"></textarea></td>

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
