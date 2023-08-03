<?php

	$con=mysqli_connect('localhost','root','','mca');
	if(!$con)
	{
		die("Connection error..");
	} 
	$sql="DELETE FROM ad_product WHERE id=".$_GET['id'];
	echo $sql;
	$result=mysqli_query($con,$sql);
	if($result === FALSE)
	{
		$_SESSION['result']="Delete book unsuccessfully..";
		header("location:ad_book.php");
	}
	else
	{
		$_SESSION['result']="Delete book successfully..";
		header("location:ad_book.php");
	}
?>