<?php
session_start();
if(!empty($_POST))
{
	$price=$_POST['txt_price'];
	//echo $price;
	$q=$_POST['txt_qty'];
	$id=$_POST['id'];
	//$tprice=$price*$q;
	$con=mysqli_connect('localhost','root','','mca');
	if(!$con)
	{
		die("Connection Failed.."); 
	}
	$sql="UPDATE cl_product set book_price =(($q)*(SELECT book_price from ad_product where id=$id)),qty='$q' Where id=".$id;
	//echo $sql;
	$result=mysqli_query($con,$sql);
	if($result===FALSE)
	{
		$_SESSION['result']="Failed Product updation..";
		header("location:cl_update_cart.php");
	}
	else
	{
		header("location:add_cart_show.php");
	}
}
else
{
	header("location:add_cart_show.php");
}
?>
