<?php 
include 'cl_navigation.php';?>
<?php
	$status=$_POST['rdo_pay'];
	//echo Your bill is.$status;
	if($status=="panding")
	{
		$s="panding";
	}
	else
	{
		$s="Completed";
	}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<!-- <body style="background-image:linear-gradient(rgba(0,0,0,0.1),rgba(0,0,0,0.8)),url('images/thank.jpg'); height: 0vh; background-size: cover;"> -->
<body style="margin-top:20%;">
	<center><h1> THANK YOU FOR VISITING ME & HAPPY SHOPPING</h1>
	<a href="loged_out.php">LOG OUT</a></center>
	<?php
	$con=mysqli_connect('localhost','root','','mca');
	$sql="SELECT * FROM cl_product";
	$result=mysqli_query($con,$sql);
	while($row=mysqli_fetch_array($result))
	{
		$query="INSERT INTO cl_bill (book_title,book_qty,book_price,status) values ('".$row['book_title']."','".$row['qty']."','".$row['book_price']."','".$s."')";
		$ans=mysqli_query($con,$query);
		if($ans===FALSE)
		{
			header("location:cl_show_bill.php");
		}
		else
		{

		}
		$delete="DELETE FROM cl_product";
		$del=mysqli_query($con,$delete);
	} 
	?>
</body>
</html>
