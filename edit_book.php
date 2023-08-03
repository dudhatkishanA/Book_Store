<?php
session_start();
$_SESSION['id']=$_GET['id'];
$con=mysqli_connect('localhost','root','','mca');
 
$sql="SELECT * from ad_product where id=".$_GET['id'];

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
<body bgcolor="lightgreen">
	<form method="post" action="update_book.php" enctype="multipart/form-data">
		<table align="left">
			<input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
			<th colspan="2" align="left"><h3>ADD BOOK</h3></th>
			<tr>
				<td>Book Title : </td>
				<td align="center"><input type="text" name="txt_title" value="<?php echo $row['book_title']?>"></td>
			</tr>
			<tr>
				<td>Book Price : </td>
				<td align="center"><input type="text" name="txt_price" value="<?php echo $row['book_price']?>"></td>
			</tr>
			<tr>
				<td>Book Author : </td>
				<td align="center"><input type="text" name="txt_author" value="<?php echo $row['book_author']?>"></td>
			</tr>
			<tr>
				<td>Book Type : </td>
				<td align="center"><input type="text" name="txt_type" value="<?php echo $row['book_type']?>"></td>
			</tr>
			<tr>
				<td>Book Image : </td>
				<td><input type="file" name="file_image"></td>
				<img src="<?php echo $row['book_image'];?>" height="100" width="80">
			</tr>
			<tr>
				<td><input type="submit" value="Update"></td>
				<td><input type="reset" value="Clear"></td>
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