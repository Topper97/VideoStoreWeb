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
    function formSupplier()
    {

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
        <tr>
          <td></td>
          <td>
            <form action="vSupplier.php" method="post">
              <fieldset>
                <table style="width:100%">
                    <tr>
                      <td><lable>Enter the name of the supplier you wish to view:</td>
                      <td><input type="text" name="name" id="name" value=<?php echo @$_SESSION['name']?>><br>
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
          <form action="uSupplier.php" method="post" onsubmit="return formSupplier()">
              <fieldset id="movie">
		          <table style="width:100%">
		              <tr>
			                 <th colspan="2"><lable>Edit A Supplier</label></th>
		              </tr>
		              <tr>
			                 <td><lable>Supplier Name:</lable></td>
			                 <td><input type="text" name="name" id="name" value="<?php echo @$_SESSION['name']?>" required></td>
		              </tr>
			                 <td><input type="submit" name="look" value="Update"></td>
		              </tr>
	           </table>
           </fieldset>
           </form>
        </td>
        <td></td>
      </tr>
      <?php
      @$name=$_SESSION['name'];
      if($login=="admin")
      {
        echo"<tr>
          <td></td>
          <td>
            <form action='deleteS.php' method='post'>
              <fieldset id='delete'>
                <table style='width:100%''>
                    <tr>
                      <td><lable>To delete the current supplier enter your password:</td>
                      <td><input type='password' name='key' id='key' value=''><br>
                          <input type='hidden' name='item' id='item' value='Suppliers'><input type='hidden' name='col' id='col' value='sname'>
                          <input type='hidden' name='url' id='url' value='vSupplierP.php'><input type='hidden' name='value' id='value' value='$name'>
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
  @$_SESSION['oName']=$_SESSION['name'];
  $_SESSION['name']="";
?>
