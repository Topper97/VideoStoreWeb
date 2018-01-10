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
    function formClear()
    {
      //confirmation
      var confirm =window.confirm("Are you sure you want to clear this data?");
      if (confirm==false)
        return false;

      return true;
    }
    function formDisk()
		{
      //Confirmation
      var confirm =window.confirm("Are you sure you want to create this disk?");
      if (confirm==false)
        return false;
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
        <td style="width:600px">
          <form name="diskf" action="disk.php" method="post" onsubmit="return formDisk()" onreset="return formClear()">
              <fieldset id="movie">
		          <table style="width:100%">
		              <tr>
			                 <th colspan="2"><lable>Create A Disk</label></th>
		              </tr>
                  <tr>
                       <th colspan="2"><lable>* indicates a required field</label></th>
                  </tr>
		              <tr>
			                 <td><label>*Disk Number:</label></td>
			                 <td><input type="text" name="disk" id="disk" value="<?php echo @$_SESSION['dnum']?>" required></td>
		              </tr>
			            <tr>
					              <td colspan="2"><lable>Seperate movie codes with a comma</lable></td>
			            </tr>
		              <tr>
			                 <td><lable>*Movie Code(s):</lable></td>
			                 <td><input type="text" name="code" id="code" value="<?php echo @$_SESSION['codes']?>" required>
		              </tr>
		              <tr>
			                 <td><lable>Purchase Price:</lable></td>
			                 <td><input type="text" name="price" id="price" value="<?php echo @$_SESSION['price']?>"><br></td>
		              </tr>
		              <tr>
			                 <td><lable>*Format:</lable></td>
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
                    <td><lable>*Status:</lable></td>
                    <td> <select name="status" id="status" required>
                         <option value="<?php echo @$_SESSION['status']?>"><?php echo @$_SESSION['status']?> </option>
                         <option value="Available">Available</option>
                         <option value="Not Available">Not Available</option>
                         <option value="Lost">Lost</option>
                         <option value="Sold">Sold</option>
                         <option value="Bad Media">Bad Media</option>
                       </select>
		              </tr>
		              <tr>
			                 <td><input type="submit" name="Create" value="Create"></td>
			                 <td><input type="reset" name="Clear" value="Clear"></td>
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
