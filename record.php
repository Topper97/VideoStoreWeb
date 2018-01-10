<?php //General longin.php
  @session_start();
	//get data
	$pdate=$_POST['date'];
	$sname=$_POST['supplier'];
	$dnum=$_POST['data'];
	//set date
	$pdate = ($pdate=="" ? 'NULL' : $pdate);

	$_SESSION['data']=$dnum;
	$_SESSION['supplier']=$sname;
	if($pdate=='NULL')
		$_SESSION['date']="";
	else
		$_SESSION['date']=$pdate;

	$DB_HOST='localhost';
	$DB_USER='cbeau738';
	$DB_PASS='Qu7rutru';
	$DB_NAME='bookstore_cbeau738';

	$db = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME) or die("conecting with data base");

	//check if disk exists
	$isOld=checkDisk();
	if ($isOld)
	{
		//check if supplier exists
		$supplier=checkSupplier();
		if($supplier)
		{
			//create Purchase
			$purchase="insert into Purchase (pdate, sname) values ('$pdate', '$sname')";
			//echo $purchase;

			$res=$db->query($purchase) or die("creating purchase $db->error");
			//get purchase Number
			$code="select max(pno) mpno from Purchase";
			$holdCode=$db->query($code) or die ("Failed to get purchase code $db->error");
			$line=$holdCode->fetch_assoc();
			$pno=$line["mpno"];
			//link data with purchase
			$dnums=explode(',',$dnum);
			for ($idx=0;$idx<count($dnums);$idx++)
			{
				$details="insert into PurchDetails values ($pno,$dnums[$idx])";
				$res=$db->query($details) or die("linking purchase details $db->error");
			}
			include "recordP.php";
			echo "Purchase record created";
			$db->close();
		}
		//if supplier doesnt exist send to create supplier
		else {
			include 'recordP.php';
			echo "Purchase record not created, supplier not in the system.<br>Please create the supplier and try again";

		}
	}
	//if disk doesnt exist send to create disk
	else
	{
		include 'recordP.php';
		echo "Purchase record not created, disk number not in the system.<br>Please create the disk and try again";
	}

	//check to see if disk is already created returns True if finds the disk
	function checkDisk()
	{
		//get data
		$dnum=$_POST['data'];
		//connect to database
		$DB_HOST='localhost';
		$DB_USER='cbeau738';
		$DB_PASS='Qu7rutru';
		$DB_NAME='bookstore_cbeau738';

		$db = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME) or die("conecting with data base");

		//check if disk exists
		$allThere=true;
		$dnums=explode(',',$dnum);
		for ($idx=0;$idx<count($dnums);$idx++)
		{
			$find="select * from Disks where dnum=$dnums[$idx]";
			$res=$db->query($find) or die("getting Disks $db->error");
			$numR=$res->num_rows;
			if ($numR==0)
			{
				$allThere=false;
			}
		}
		return $allThere;
		$db->close();
	}
	function checkSupplier()
	{
		$sname=$_POST['supplier'];

	 $DB_HOST='localhost';
	 $DB_USER='cbeau738';
	 $DB_PASS='Qu7rutru';
	 $DB_NAME='bookstore_cbeau738';

	 $db = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME) or die("conecting with data base");

	 //check if supplier exists
	 $find="select * from Suppliers";
	 $res=$db->query($find) or die("getting Suppliers $db->error");
	 $numR=$res->num_rows;
	 for ($idx=0;$idx<$numR;$idx++)
	 {																																						//search not working
		 $disk=$res->fetch_assoc();
		 $dname=$disk["sname"];
		 if (trim($sname)==trim($dname))
		 {
			 return true;
		 }
	 }
	 return false;
	 $db->close();
	}
?>
