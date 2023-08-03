<?php
	$con=mysqli_connect('localhost','root','','mca');
	if(!$con)
	{
		die("Connection error..");
	} 
	$sql="DELETE FROM cl_reg WHERE cust_id=".$_GET['id'];
	//echo $sql;
	$result=mysqli_query($con,$sql);
	if($result === FALSE)
	{
		header("location:ad_show_user.php");
	}
	else
	{
		header("location:ad_show_user.php");
	}
?>