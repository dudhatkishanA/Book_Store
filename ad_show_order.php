<?php
include 'navigation.php';
$con=mysqli_connect('localhost','root','','mca');
$sql="SELECT * FROM cl_bill";
$result=mysqli_query($con,$sql);
$no=1;
$gtotal=0;
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Show Order</title>
</head>
<body>
<form style="margin-left:30%; margin-top: 10%;">
		<table border="1" align="center" bordercolor="black" width="600">
		<tr> 
			<th colspan="4"> <b> <font color="black"> <h1> All Orders </h1></b></font></th> 
		</tr>
		<tr>
			<th bgcolor="lightyellow">No.</th>
			<th bgcolor="lightyellow">Book Name</th>
			<th bgcolor="lightyellow">Quantity</th>
			<th bgcolor="lightyellow" align="center">Total Price</th>
		</tr><?php
		while($row=mysqli_fetch_array($result))
		{?>
			<tr>
				<td align="center"><?php echo $no;?></td>
				<td align="center"><?php echo $row['book_title'];?></td>
				<td align="center"><?php echo $row['book_qty'];?></td>
				<td align="right"><?php echo "&#8377; ".$row['book_price'];?></td>
			</tr>
			<?php
			$no=$no+1;
			$gtotal=$gtotal+$row['book_price'];
			}
			?>
			<tr>
				<td colspan="3" align="right"><?php echo "Total Amount: ";?></td>
				<td align="right"><?php echo "&#8377; ".$gtotal;?></td>
			</tr>
	</table>
</form>
</body>
</html>