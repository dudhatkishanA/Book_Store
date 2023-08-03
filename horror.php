<?php include 'cl_navigation.php'; 
session_start();
 ?> 
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>SHOW BOOK</title>
	<link rel="stylesheet" type="text/css" href="style1.css">
</head>
<body style="background-image: url('images/image1.jpg'); ">

	<div class="wrapper">
		<div class="sidebar">
			<ul>
				<li><a href="cl_show_book.php">All BOOK</li>
				<li><a href="drama.php">DRAMA</a></li>
				<li><a href="horror.php">HORROR</a></li>
				<li><a href="mystery.php">MYSTERY</a></li>
				<li><a href="romance.php">ROMANCE</a></li>
				<li><a href="science.php">SCIENCE FICTION</a></li>
			</ul>
		</div>
	</div>
	<div class="info">
	<?php
	$con=mysqli_connect('localhost','root','','mca');
	if(!$con)
	{
		die("Connection failed..");
	} 
	$sql="SELECT * FROM ad_product WHERE book_type='horror'";
	//echo $sql;
	$result=mysqli_query($con,$sql);?>
	<center><br><br><br><h1>HORROR</h1></center>
	<table style="margin-left:15%; margin-top: 5%;">
		<tr><?php
		while($row=mysqli_fetch_array($result))
		{?>
	 		<td>
				<table align="center" width="300">
					<tr>
						<td align="center"><img src="<?php echo $row['book_image'];?>" height="200" width="180" style="border-radius: 5px;"></td>
						</tr>
					<tr>
						<td align="center"><?php echo $row['book_title']?></td>
					</tr>
					<tr>
						<td align="center"><?php echo "&#8377; ".$row['book_price']?></td>
					</tr>
					<tr>
						<td align="center"><a href="add_cart.php?id=<?php echo $row['id'];?>">+ ADD TO CART</a>
						</td>
					</tr>
				</table>
			</td><?php 
		}?>
	</tr>
	</table>
</div>
</body>
</html>


