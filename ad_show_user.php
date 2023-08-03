<?php include 'navigation.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>User List</title>
</head>
<body>
	<center><table align="center" border="1" style="margin-top:10%;" width="500" bordercolor="black">
		<th colspan="4"> <b> <h2><font color="black"> User List</font> </h2> </b> </th>
		<tr>
			<th bgcolor="lightyellow"> Name</th>
			<th bgcolor="lightyellow"> Email</th>
			<th bgcolor="lightyellow"> Contact No.</th>
			<th bgcolor="lightyellow"> Action</th>
		</tr>	
		<?php
		$con=mysqli_connect('localhost','root','','mca');
		if(!$con)
		{
			die("Connection Error..");
		} 
		$sql="SELECT * from cl_reg";
		$result=mysqli_query($con,$sql);
		while($row=mysqli_fetch_array($result))
		{?>
			<tr>
				<td><?php echo $row['cust_name'];?></td>
				<td><?php echo $row['cust_email'];?></td>
				<td><?php echo $row['cust_num'];?></td>
				<td><a href="delete_user.php?id=<?php echo $row['cust_id'];?>"><font color="brown">Delete </font></td>
			</tr>
			<?php
		}
		?>
	</table></center>
</body>
</html>