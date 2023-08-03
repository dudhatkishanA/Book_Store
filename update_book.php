<?php
session_start();
if(!empty($_POST))
{
	$title=$_POST['txt_title'];
	$price=$_POST['txt_price'];
	$author=$_POST['txt_author'];
	$type=$_POST['txt_type'];
	$id=$_POST['id'];

	if(!empty($_FILES))
	{
		$basefile = 'uploads/'.basename($_FILES['file_image']['name']);
		//echo $basefile;
		move_uploaded_file($_FILES['file_image']['tmp_name'],$basefile);
	}
	
	$con=mysqli_connect('localhost','root','','mca');
	if(!$con)
	{
		die("Connection Failed..");
	}
	$sql="UPDATE  ad_product SET book_title='$title',book_price='$price',book_author='$author',book_type='$type' where id=".$id;
	$result=mysqli_query($con,$sql);
	if($result===FALSE)
	{
		$_SESSION['result']="Failed Product updation..";
		header("location:edit_book.php");
	}
	else
	{
		$_SESSION['result']="Update the Product..";
		header("location:ad_book.php");
	}
}
else
{
	header("location:ad_book.php");
}
?>