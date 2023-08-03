<?php
session_start();
 
	$con=mysqli_connect('localhost','root','','mca');
	if(!$con)
	{
		die("Connection error..");
	} 
	$sql="DELETE FROM cl_product WHERE id=".$_GET['id'];
	echo $sql;
	$result=mysqli_query($con,$sql);
	if($result === FALSE)
	{
		header("location:add_cart_show.php");
	}
	else
	{
		header("location:add_cart_show.php");
	}
?>
