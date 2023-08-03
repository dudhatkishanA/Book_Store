<?php include 'navigation.php';

?> 
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Add And Show book</title>
</head>
<body>
	<form method="post" action="ad_book_add_show.php" enctype="multipart/form-data">
		<table align="left" style="margin-top: 7%; margin-left:10%;">
			<th colspan="2" align="center"><h1> <font color="black">ADD BOOK </font></h1></th>
			<tr>
				<td>Book Title : </td>
				<td align="center"><input type="text" name="txt_title" autocomplete="off" required></td>
			</tr>
			<tr>
				<td>Book Price : </td>
				<td align="center"><input type="text" name="txt_price" autocomplete="off" required></td>
			</tr>
			<tr>
				<td>Book Author : </td>
				<td align="center"><input type="text" name="txt_author" autocomplete="off"required></td>
			</tr>
			<tr>
				<td>Book Type : </td>
				<td align="center"><input type="text" name="txt_type" autocomplete="off" required></td>
			</tr>
			<tr>
				<td>Book Image : </td>
				<td align="center"><input type="file" name="file_image"></td>
			</tr>
			<tr>
				<td><input type="submit" value="Add"></td>
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
	<br>
	<?php unset($_SESSION['result']); ?>
	<table align="right" border="1" style="margin-top:6%; margin-right:10% ;">
		<tr>
			<th width="100" bgcolor="lightyellow">Title</th>
			<th width="100" bgcolor="lightyellow">Photo</th>
			<th width="100" bgcolor="lightyellow">Author Name</th>
			<th width="80" bgcolor="lightyellow">Type</th>
			<th width="80" bgcolor="lightyellow">Price</th>
			<th colspan="2" bgcolor="lightyellow">Action</th>
		</tr>
		<?php
		$con=mysqli_connect('localhost','root','','mca');
		if(!$con)
		{
			die("Connection failed..");
		}
		$sql="SELECT * FROM ad_product";
		$result=mysqli_query($con,$sql);
		while($row=mysqli_fetch_array($result))
		{?>
			<tr align="center">
				<td><?php echo $row['book_title'];?></td>
				<td><img src="<?php echo $row['book_image'];?>" height="100" width="80"></td>
				<td><?php echo $row['book_author'];?></td>
				<td><?php echo $row['book_type'];?></td>
				<td><?php echo "&#8377; ".$row['book_price'];?></td>
				<td bgcolor="lightyellow"><a href="edit_book.php?id=<?php echo $row['id'];?>">
					<font color="blue"> Update </font> </a></td>
				<td bgcolor="lightyellow" width="70"><a href="remove_book.php?id=<?php echo $row['id'];?>"> <font color="blue">Remove </font> </a></td>

			</tr>
			<?php
		} 
		?>
	</table>
</body>
</html> <?php 
