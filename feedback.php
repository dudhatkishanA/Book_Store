<?php session_start(); 
 include 'cl_navigation.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Feedback</title>
</head>
<body style="background-image:linear-gradient(rgba(0,0,0,0.1),rgba(0,0,0,0.8)),url('images/cl_img1.jpg'); height: 100vh; background-size: cover;">>
	<form method="post" action="feedback.php">
				<center> <table align="center" style="margin-top:10%";>
			<tr>
				<td colspan="2" align="center"></td>
			</tr>
			<tr> <td colspan="2"height="50"> <h1> Write Your Feedback </h1> </td> </tr>
			<tr>
				<td colspan="2" align="center"></td>
			</tr>
			<tr>
				<td colspan="2" align="center"></td>
			</tr>
		<tr>
				<td colspan="2" align="center"></td>
			</tr>
		<tr>
				<td colspan="2" align="center"></td>
			</tr>
			<tr>
				<td align="center" height="30" >Email : </td>
				<td><input type="email" name="em_feed" autocomplete="off" required></td>
			</tr>
			<tr>
				<td align="center" height="30" >Message : </td>
				<td><input type="text" name="txt_msg" autocomplete="off"></td>
			</tr>
			</tr>
		<tr>
				<td colspan="2" align="center"></td>
			</tr>
			<tr>
				<td align="center" colspan="2" height="50"><input type="submit" value="Submit"></td>
			</tr>
			<tr>
				<td colspan="2">
				<?php 
					if(isset($_SESSION['result']))
					{
						echo $_SESSION['result'];
					}
					unset($_SESSION['result']);
				?>
				</td>
			</tr>
		</table></center>
	</form>
	<?php 
	if(!empty($_POST))
	{
		$email=$_POST['em_feed'];
		$msg=$_POST['txt_msg'];

		$con=mysqli_connect('localhost','root','','mca');
		if(!$con)
		{
			die("Connection failed..");
		}
		$sql="SELECT * FROM cl_reg where cust_email='$email'";
		//echo $sql;
		$result=mysqli_query($con,$sql);
		$count=mysqli_num_rows($result);
		if($count>0)
		{
			$query="INSERT into cl_feedback(cust_email,cust_msg) values ('$email','$msg')";
			$ans=mysqli_query($con,$query);
			if($ans===FALSE)
			{
				$_SESSION['result']="Not send your feedback..Try again!";
				header("location:feedback.php");
			}
			else
			{
				$_SESSION['result']="Successfully send your feedback!";
				header("location:feedback.php");
			}
		}
		else
		{
			$_SESSION['result']="Your Email is invalid..!";
			header("location:feedback.php");
		}
	}
	?>
</body>
</html>