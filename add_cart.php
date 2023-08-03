<?php include 'valid_user.php';?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Add CART</title>
</head>
<body>
	<?php
	$cid=$_SESSION['cid'];
	$con=mysqli_connect('localhost','root','','mca');
	if(!$con)
	{
		die("Connection error");
	} 
	$sql="SELECT * FROM ad_product WHERE id=".$_GET['id'];
	$result=mysqli_query($con,$sql);
	while($row=mysqli_fetch_array($result))
	{
		$query="INSERT into cl_product(id,book_title,book_price,book_author,book_img,cust_id) values('".$row["id"]."','".$row["book_title"]."','".$row["book_price"]."','".$row["book_author"]."','".$row["book_image"]."','".$cid."')";
		$ans=mysqli_query($con,$query);
		if(!$ans)
		{
		}
		else
		{
			header("location:cl_show_book.php");
		}

		
	}?>
</body>
</html>