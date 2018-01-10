<?php
  @session_start();
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
    function formMovie()
    {

      //get data from form
      var title=document.getElementById ("title").value;
      var year=document.getElementById ("year").value;
      var genre=document.getElementById ("genre").value;
      var stars=document.getElementById ("stars").value;
      var rating=document.getElementById ("rating").value;
      var director=document.getElementById ("director").value;
      var producer=document.getElementById ("producer").value;
      var cast=document.getElementById ("cast").value;

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
          <form action="vMovie.php" method="post">
            <fieldset>
              <table style="width:100%">
                  <tr>
                    <td><lable>Enter the code of the movie you wish to view:</td>
                    <td><input type="text" name="code" id="code" value=<?php echo @$_SESSION['code']?>><br>
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
          <form action="uMovie.php" method="post" onsubmit="return formMovie()">
              <fieldset id="movie">
		          <table style="width:100%">
		              <tr>
			                 <th colspan="2"><lable>Update A Movie</label></th>
		              </tr>
		              <tr>
			                 <td><lable>Title:</lable></td>
			                 <td><input type="text" name="title" id="title" value="<?php echo @$_SESSION['title']?>" required></td>
		              </tr>
		              <tr>
			                 <td><lable>Year Released:</lable></td>
			                 <td><input type="text" name="year" id="year" value="<?php echo @$_SESSION['year']?>"></td>
		              </tr>
		              <tr>
			                 <td><lable>Genre:</lable></td>
			                 <td><input type="text" name="genre" id="genre" value="<?php echo @$_SESSION['genre']?>"></td>
		              </tr>
		              <tr>
			                 <td><lable>Stars:</lable></td>
			                 <td><input type="text" name="stars" id="stars" value="<?php echo @$_SESSION['starRating']?>"></td>
		              </tr>
                  <tr>
			                 <td><lable>Rating:</lable></td>
			                 <td><input type="text" name="rating" id="rating" value="<?php echo @$_SESSION['imdbRating']?>"></td>
		              </tr>
                  <tr>
			                 <td><lable>Director(s):</lable></td>
			                 <td><textarea name="director" id="director" readonly><?php echo @$_SESSION['directors']?></textarea></td>
		              </tr>
                  <tr>
			                 <td><lable>Producer(s):</lable></td>
			                 <td><textarea name="producer" id="producer" readonly><?php echo @$_SESSION['producers']?></textarea></td>
		              </tr>
                  <tr>
			                 <td><lable>Leading Cast:</lable></td>
					             <td><textarea name="cast" id="cast" readonly><?php echo @$_SESSION['actors']?></textarea></td>

		              </tr>
		              <tr>
			                 <td><input type="submit" name="Create" value="Update"></td>
		              </tr>
	           </table>
           </fieldset>
           </form>
        </td>
        <td></td>
      </tr>
      <?php
      @$code=$_SESSION['code'];
      if($login=="admin")
      {
        echo"<tr>
          <td></td>
          <td>
            <form action='deleteM.php' method='post'>
              <fieldset id='delete'>
                <table style='width:100%''>
                    <tr>
                      <td><lable>To delete the current movie enter your password:</td>
                      <td><input type='password' name='key' id='key' value=''><br>
                          <input type='hidden' name='value' id='value' value='$code'>
                        <input type='submit' name='look' value='Delete'>
                      </td>
                    </tr>
                </table>
              </fieldset>
            </form>
          </td>
          <td></td>
        <tr>";
      }
      ?>
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
  $_SESSION['Mcode']=$_SESSION['code'];
  $_SESSION['code']="";
  $_SESSION['title']="";
  $_SESSION['year']="";
  $_SESSION['genre']="";
  $_SESSION['starRating']="";
  $_SESSION['imdbRating']="";
  $_SESSION['directors']="";
  $_SESSION['producers']="";
  $_SESSION['actors']="";
?>