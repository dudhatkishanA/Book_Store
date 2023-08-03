<?php
session_start();
if(!empty($_POST))
{
	$title=$_POST['txt_title'];
	$price=$_POST['txt_price'];
	$author=$_POST['txt_author'];
	$type=$_POST['txt_type'];

	$basefile = 'uploads/'.basename($_FILES['file_image']['name']);
	//echo $basefile;
	if(move_uploaded_file($_FILES['file_image']['tmp_name'],$basefile))
	{
		$con=mysqli_connect('localhost','root','','mca');
		if(!$con)
		{
			die("Connection Failed..");
		}
		$sql="INSERT INTO ad_product (book_title,book_price,book_author,book_type,book_image) values('$title','$price','$author','$type','$basefile')";
		$result=mysqli_query($con,$sql);
		if($result===FALSE)
		{
			$_SESSION['result']="Failed Product addition..";
			header("location:ad_book.php");
		}
		else
		{
			$_SESSION['result']="Add the new Product..";
			$_SESSION['logged_in']=TRUE;
			header("location:ad_book.php");
		}
	} 
}
else
{
	header("location:ad_book.php");
}
?>