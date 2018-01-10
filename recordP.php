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
    function formClear()
    {
      //confirmation
      var confirm =window.confirm("Are you sure you want to clear this data?");
      if (confirm==false)
        return false;

      return true;
    }
    function formRecord()
    {
      //confirmation
      var confirm =window.confirm("Are you sure you want to create this Purchase Record?");
      if (confirm==false)
        return false;
      //get data from form
      var date=document.getElementById("date").value;
      var supplier=document.getElementById("supplier").value;
      var data=document.getElementById("data").value;
      //output
      //window.alert("Purchase Record Created");
      //document.write("Purchase Number: " + pnum + "<br>Date: " + date + "<br>Supplier: " + supplier + "<br>Data: " + data);
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
          <form action="record.php" method="post" onsubmit="formRecord()" onreset="return formClear()">
              <fieldset id="movie">
		          <table style="width:100%">
		              <tr>
			                 <th colspan="2"><lable>Create Purchase Record</label></th>
		              </tr>
                  <tr>
			                 <th colspan="2"><lable>* indicates a required field</label></th>
		              </tr>
		              <tr>
			                 <td><lable>Date:</lable></td>
			                 <td><input type="text" name="date" id="date" value="<?php echo @$_SESSION['date']?>" placeholder="YYYY-MM-DD"></td>
		              </tr>
		              <tr>
			                 <td><lable>*Supplier:</lable></td>
			                 <td><input type="text" name="supplier" id="supplier" value="<?php echo @$_SESSION['supplier']?>" required></td>
		              </tr>
                  <tr>
					              <td colspan="2"><lable>Seperate disk numbers with a comma</lable></td>
			            </tr>
		              <tr>
			                 <td><lable>*Disk Number(s):</lable></td>
			                 <td><input type="text" name="data" id="data" value="<?php echo @$_SESSION['data']?>" required></td>
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
