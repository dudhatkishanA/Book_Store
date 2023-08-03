<?php session_start();
	$_SESSION['id']=$_GET['id']; 
	$con=mysqli_connect('localhost','root','','mca');
	if(!$con)
	{
		die("Connection Error..");
	} 
	$sql="SELECT * FROM cl_feedback";
	$result=mysqli_query($con,$sql);
	$query="DELETE FROM cl_feedback WHERE id=".$_GET['id'];
	//echo $sql;
	$delete=mysqli_query($con,$query);
	if($delete === FALSE)
	{
		$_SESSION['result']="Delete book unsuccessfully..";
		header("location:ad_show_feedback.php");
	}
	else
	{
		$_SESSION['result']="Delete book successfully..";
		header("location:ad_show_feedback.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Show_Feedback</title>
</head>
<body>
	<form>
		<table border="1" align="center">
			<input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
			<tr>
				<th align="center" width="80">Email</th>
				<th align="center" width="200">Message</th>
				<th align="center" width="80">Action</th>
			</tr>
			<?php
				while($row=mysqli_fetch_array($result))
				{?>
					<tr>
						<td><?php echo $row['cust_email'];?></td>
						<td><?php echo $row['cust_msg'];?></td>
						<td><a href="ad_show_feedback.php?id=<?php echo $row['id'];?>">Delete</td>
					</tr>
					<?php
				}
			?>
			<tr>
				<td colspan="2" align="center">
					<?php
						if(isset($_SESSION['result']))
						{
							echo $_SESSION['result'];
						} 
						unset($_SESSION['result']);
					?>
				</td>
			</tr>
		</table>
	</form>
</body>
</html>
<?php
	
?>