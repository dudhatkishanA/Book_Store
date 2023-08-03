<?php
session_start();

$_SESSION['id']=$_GET['id'];
$qty=1;
$con=mysqli_connect('localhost','root','','mca');
 
$sql="SELECT * from cl_product where id=".$_GET['id'];

$result=mysqli_query($con,$sql);
$row=mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Update</title>
</head>
<body style="background-image:linear-gradient(rgba(0,0,0,0.1),rgba(0,0,0,0.8)),url('images/cl_img1.jpg'); height: 100vh; background-size: cover;">>
	<form method="post" action="update_cart.php" enctype="multipart/form-data">
		<table align="center">
			<input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
			<th colspan="2" align="center"><h1>Update Your Cart</h1></th>
			<tr>
				<td colspan="2" align="center"><img src="<?php echo $row['book_img'];?>" height="100" width="80"></td>
				
			</tr>
			<tr>
				<td>Book Title : </td>
				<td align="center"><input type="text" name="txt_title" value="<?php echo $row['book_title'];?>"></td>
			</tr>
			<tr>
				<td>Book price : </td>
				<td align="center"><input type="text" name="txt_price" value="<?php echo $row['book_price'];?>"></td>
			</tr>
			<tr>
				<td>Book Quantity : </td>
				<td align="center"><input type="text" name="txt_qty" value="<?php echo $row['qty'];?>"></td>
			</tr>
			<tr>
				<td align="center"><input type="submit" value="Update"></td>
				<td align="center"><input type="reset" value="Clear"></td>
			</tr>
			<br><br>
			<tr>
				<td colspan="2">
					<?php
					if(isset($_SESSION['result']))
					{
						echo $_SESSION['result'];
					} 
					?>
				</td>
			</tr>
		</table>
	</form>
</body>
</html>
