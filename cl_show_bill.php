<?php session_start();
 
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
	<title>Add to cart</title>
</head>
<body style="background-image:linear-gradient(rgba(0,0,0,0.1),rgba(0,0,0,0.8)),url('images/cl_img1.jpg'); height: 100vh; background-size: cover;">>
	<form method="post" style="margin-top:13%; margin-left: 25%;" action="thank.php">
	<h1 style="margin-left:25%;"> Your Bill </h1> <br>
	<table align="center" width="700" bgcolor="white">
			<tr>
			<th align="center">NO.</th>
			<th>Book Name</th>
			<th>Quantity</th>
			<th>Book Price</th>
			<th>Total Price</th>
			<?Php
			while($row=mysqli_fetch_array($result))
			{?>
				<tr>
					<!-- <input type="hidden" name="id" value="<?php echo $_GET['id'];?>"> -->
					<td align="center"><?php echo $no;?></td>
					<td align="center"><?php echo $row['book_title'];?></td>
					<td align="center"><?php echo $row['qty'];?></td>
					<td align="center"><?php echo "&#8377 ".$row['book_price'];?></td>
					<td align="center"><?php 
					echo "&#8377 ".$total=$qty*$row['book_price'];?></td>
				</tr>
					<?php
					$no=$no+1;
					$gtotal=$gtotal+$total;
			}
			?>
			<tr> 
				<td colspan="4"> </td> </tr>
				<tr> 
				<td colspan="4"> </td> </tr> 
				<tr>
				<td colspan="4" align="right" height="20" ><?php echo "Total Amount: ";?></td>
				<td align="center"><?php echo "&#8377 ".$gtotal;?></td>
			</tr>
			<tr>
			<td colspan="4"> </td> </tr>
		
			<tr>
				<td align="right" colspan="3" height="30" >Payment Status :</td>
				<td align="left"><input type="radio" name="rdo_pay" value="panding" required>Pending &nbsp;&nbsp;&nbsp;
					<input type="radio" name="rdo_pay" value="completed" required>Completed</td>
			</tr>
			<tr> <td colspan="5" align="center" height="30"> &nbsp;
			<input type="submit" value="submit"> </td> </tr>

	</table> <br>
	</form>
</body>
</html>
