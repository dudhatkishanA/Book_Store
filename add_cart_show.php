<?php 
 session_start();
include 'cl_navigation.php';
// $_SESSION['id']=$_GET['id'];
	$con=mysqli_connect('localhost','root','','mca');
	if(!$con)
	{
		die("Connection error");
	} 
	$sql="SELECT DISTINCT* FROM cl_product";
	$result=mysqli_query($con,$sql);
	$no=1;
	$qty=1;
	$gtotal=0;

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title> Add to cart</title>
</head>
<body >
	<form method="post" style="margin-top:10%; margin-left: 30%;">
	<h1 style="margin-left:24%;"> <font color="brown">Your Cart </font></h1> <br> <br>
	<table align="center" width="700" border="1" bordercolor="black">
		<tr>
			<th bgcolor="lightyellow">No.</th>
			<th bgcolor="lightyellow">Book Name</th>
			<th bgcolor="lightyellow">Book Image</th>
			<th bgcolor="lightyellow">quantity</th>
			<th bgcolor="lightyellow">Book Price</th>
			<th bgcolor="lightyellow">Total Price</th>
			<th bgcolor="lightyellow" colspan="2">Action</th>
			<?Php
			while($row=mysqli_fetch_array($result))
			{?>
				<tr>
					<!-- <input type="hidden" name="id" value="<?php echo $_GET['id'];?>"> -->
					<td align="center"><?php echo $no;?></td>
					<td align="center"><?php echo $row['book_title'];?></td>
					<td align="center"><img src="<?php echo $row['book_img'];?>" height="100" width="80"></td>
					<td align="center"><?php echo $row['qty'];?></td>
					<td align="center"><?php echo "&#8377; ".$row['book_price'];?></td>
					<td align="center"><?php 
					echo "&#8377; ".$total=$qty*$row['book_price'];?></td>
					<td width="70" align="center" bgcolor="lightyellow"><a href="cl_update_cart.php?id=<?php echo $row['id'];?>"><font > Update </font> </a></td>
					<td width="70" align="center" ><a href="delete_cart.php?id=<?php echo $row['id'];?>"> <font > Remove </font></a></td>
				</tr>
					<?php
					$no=$no+1;
					$gtotal=$gtotal+$total;
			}
			?>
			<tr>
				<td colspan="5" align="right"><?php echo "Total Amount: ";?></td>
				<td align="center"><?php echo "&#8377; ".$gtotal;?></td>
			</tr>
	</table> <br> <br>
	<a href="cl_show_book.php"><center><font color="golden"><b> <font color="black"> Add New Book </font></b> </font></center></a> <br>
	<a href="cl_show_bill.php"> <center><font color="golden"><b> <font color="black"> Show Bill </font> </b> </font></center></a>
	</table>
</form>
</body>
</html