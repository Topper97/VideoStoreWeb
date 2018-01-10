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
     Purpose:	     Create a purchase record once logged in as an admin
     URL:          http://unixweb.kutztown.edu/~cbeau738/Project/Phase2/arecord.html
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
    function formRecord()
    {

      //get data from form
      var date=document.getElementById("date").value;
      var supplier=document.getElementById("supplier").value;
      var data=document.getElementById("data").value;
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
          <form action="vRecord.php" method="post">
            <fieldset id="mid">
              <table style="width:100%">
                  <tr>
                    <td><lable>Enter the purchase number for the record you wish to view:</td>
                    <td><input type="text" name="num" id="num" value=<?php echo @$_SESSION['num']?>><br>
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
          <form action="uRecord.php" method="post" onsubmit="formRecord()">
              <fieldset id="movie">
		          <table style="width:100%">
		              <tr>
			                 <th colspan="2"><lable>View Purchase Record</label></th>
		              </tr>
		              <tr>
			                 <td><lable>Date:</lable></td>
			                 <td><input type="text" name="date" id="date" value="<?php echo @$_SESSION['date']?>" placeholder="YYYY-MM-DD"></td>
		              </tr>
		              <tr>
			                 <td><lable>Supplier:</lable></td>
			                 <td><input type="text" name="supplier" id="supplier" value="<?php echo @$_SESSION['supplier']?>" required readonly></td>
		              </tr>

		              <tr>
			                 <td><lable>Disk Number(s):</lable></td>
			                 <td><input type="text" name="data" id="data" value="<?php echo @$_SESSION['dnums']?>" required readonly></td>
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
      @$num=$_SESSION['num'];
      if($login=="admin")
      {
        echo"<tr>
          <td></td>
          <td>
            <form action='delete2.php' method='post'>
              <fieldset id='delete'>
                <table style='width:100%''>
                    <tr>
                      <td><lable>To delete the current record enter your password:</td>
                      <td><input type='password' name='key' id='key' value=''><br>
                          <input type='hidden' name='item' id='item' value='Purchase'><input type='hidden' name='col' id='col' value='pno'>
                          <input type='hidden' name='url' id='url' value='vRecordP.php'><input type='hidden' name='value' id='value' value='$num'>
                          <input type='hidden' name='item2' id='item2' value='PurchDetails'>
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
  $_SESSION['Knum']=$_SESSION['num'];
  $_SESSION['num']="";
  $_SESSION['date']="";
  $_SESSION['dnums']="";
  $_SESSION['supplier']="";
?>