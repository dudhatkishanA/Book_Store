<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title> Login Here</title>
	<link rel="stylesheet" type="text/css" href="">
</head>
<body style="background-image:linear-gradient(rgba(0,0,0,0.1),rgba(0,0,0,0.8)),url('images/loginimage.jpg'); height: 100vh; background-size: cover; margin-top: 4%;">
	<form method="post" action="valid_user.php">
		<h1> <center> <font color="black"> Login Here </font> </center> </h1>
		<table align="center" height=230 width="400"> 
			<tr>
				<td align="center"> <h3> Email : </h3> </td>
				<td><input type="email" name="em_email" autocomplete="off" required></td>
			</tr> 
			<tr>
				<td align="center"> <h3>Password :</h3> </td>
				<td><input type="password" name="pa_pass" autocomplete="off" required></td>
			</tr>
			<tr>
				<td colspan="2" align="center"><input type="submit" name="btn_submit" value="Login"></td>
			</tr>
			<br><br>
			<tr>
				<td colspan="2" align="center"><a href="register.php"><font color="white"> <b> Create New account</b> </font></td>
			</tr>
			<tr>
				<td colspan="2" align="center"><a href="forgot_pass.php"><font color="white"> <b> Forgot Password</b> </font></td>
			</tr>
			<tr>
				<td colspan="2" align="center"><a href="change_pass.php"><font color="white"> <b> Change Password</b> </font></td>
			</tr>
			<tr>
				<td colspan="2">
					<?php
					if(isset($_SESSION['loginerror']))
					{
						echo $_SESSION['loginerror'];
					} 
					unset($_SESSION['loginerror']);
					?>
				</td>
			</tr>
		</table>
	</form>
</body>
</html>