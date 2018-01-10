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
     Purpose:	   Create a disk once logged in as an admin
     URL:          http://unixweb.kutztown.edu/~cbeau738/Project/Phase2/adisk.html
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
    function formDisk()
		{
      //trasfer values from form
      var disk=document.getElementById ("disk").value;
      var code=document.getElementById ("code").value;
      var price=document.getElementById("price").value;
      var format=document.getElementById("format").value;
      var status=document.getElementById("status").value;
      //output
      //window.alert("Disk Created");
      //document.write("Disk Number: " + disk + "<br>Movie Code: " + code + "<br>Purchase Price: $" + price + "<br>Format: " + format + "<br>Status: " + status);
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
          <form action="vDisk.php" method="post">
            <fieldset>
              <table style="width:100%">
                  <tr>
                    <td><lable>Enter the number for the disk you wish to view:</td>
                    <td><input type="text" name="dnum" id="dnum" value=<?php echo @$_SESSION['dnum']?>><br>
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
          <form name="diskf" action="uDisk.php" method="post" onsubmit="return formDisk()">
              <fieldset id="movie">
		          <table style="width:100%">
		              <tr>
			                 <th colspan="2"><lable>Update A Disk</label></th>
		              </tr>
		              <tr>
			                 <td><label>Disk Number:</label></td>
			                 <td><input type="text" name="disk" id="disk" value="<?php echo @$_SESSION['dnum']?>" readonly></td>
		              </tr>
		              <tr>
			                 <td><lable>Movie Code(s):</lable></td>
			                 <td><input type="text" name="code" id="code" value="<?php echo @$_SESSION['codes']?>" required readonly>
		              </tr>
		              <tr>
			                 <td><lable>Purchase Price:</lable></td>
			                 <td><input type="text" name="price" id="price" value="<?php echo @$_SESSION['price']?>"><br></td>
		              </tr>
		              <tr>
			                 <td><lable>Format:</lable></td>
			                 <td><select name="format" id="format" required>
                            <option value="<?php echo @$_SESSION['format']?>"><?php echo @$_SESSION['format']?></option>
                            <option value="DVD">DVD</option>
                            <option value="Blueray">Blueray</option>
                            <option value="4K">4K</option>
                            <option value="3D">3D</option>
                          </select>
                       </td>
		              </tr>
		              <tr>
                    <td><lable>Status:</lable></td>
                    <td> <select name="status" id="status" required>
                         <option value="<?php echo @$_SESSION['status']?>"><?php echo @$_SESSION['status']?></option>
                         <option value="Available">Available</option>
                         <option value="Not Available">Not Available</option>
                         <option value="Lost">Lost</option>
                         <option value="Sold">Sold</option>
                         <option value="Bad Media">Bad Media</option>
                       </select>
		              </tr>
		              <tr>
			                 <td><input type="submit" name="Create" value="Update"></td>

		              </tr>
	           </table>
           </fieldset>
           </form>
        </td>
        <td></td>
        <?php
        @$dnum=$_SESSION['dnum'];
        if($login=="admin")
        {
          echo"<tr>
            <td></td>
            <td>
              <form action='delete2.php' method='post'>
                <fieldset id='delete'>
                  <table style='width:100%''>
                      <tr>
                        <td><lable>To delete the current disk enter your password:</td>
                        <td><input type='password' name='key' id='key' value=''><br>
                            <input type='hidden' name='item' id='item' value='Disks'><input type='hidden' name='col' id='col' value='dnum'>
                            <input type='hidden' name='url' id='url' value='vDiskP.php'><input type='hidden' name='value' id='value' value='$dnum'>
                            <input type='hidden' name='item2' id='item2' value='DiskMovies'>
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

<?php
  $_SESSION['dnum']="";
  $_SESSION['codes']="";
  $_SESSION['price']="";
  $_SESSION['format']="";
  $_SESSION['status']="";
?>
