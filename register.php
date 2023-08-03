<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Registration</title>
</head>
<body style="background-image:linear-gradient(rgba(0,0,0,0.1),rgba(0,0,0,0.8)),url('images/cl_img1.jpg'); height: 100vh; background-size: cover; margin-top: 4%;">
	
	<form method="post" action="register_cust.php">
		<table align="center" width="390" height="100">
			<tr>
				<td colspan="2" align="center"><h1> Register Now </h1></td>
			</tr>
			<tr>
				<td align="left"> <h3> Name : </h3> </td>
				<td align="center"><input type="text" name="txt_name" autocomplete="off" required></td>
			</tr>
			<tr>
				<td align="left"> <h3>Email : </h3></td>
				<td align="center"><input type="email" name="em_email" autocomplete="off"required></td>
			</tr>
			<tr>
				<td align="left"><h3>Contact No :</h3> </td>
				<td align="center"><input type="text" name="txt_con" autocomplete="off"required></td>
			</tr>
			<tr>
				<td align="left"><h3>Password :</h3> </td>
				<td align="center"><input type="password" name="pa_pass" autocomplete="off"required></td>
			</tr>
			<tr>
				<td align="left"><h3>Confirm Password: </h3></td>
				<td align="center"><input type="password" name="pa_cpass" autocomplete="off"required></td>
			</tr>
			<tr>
				<td colspan="2" align="center"><input type="submit" name="btn_submit" value="Submit" style="padding: 9px 30px;">
					<input type="reset" name="btn_reset" value="Clear" style="padding: 9px 30px;"></td>
			</tr>
			<br><br>
			<tr> 
				<td align="right"><font color="white">I have an account </font></td>
				<td align="center"><a href="ad_login.php"><font color="white">LOGIN </font></td>
			</tr>
			<tr>
				<td colspan="2" height="10px"></td>
			</tr>
		</table>
	</form>
	<?php
		if(isset($_SESSION['error'])) 
		{?><p align="center"><?php 
			echo $_SESSION['error'];?></p><?php
		}
		?>
	<?php unset($_SESSION['error']); ?>
</body>
</html>