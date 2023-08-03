<?php
	session_start();
	$email=$_POST['em_email'];
	$pass=$_POST['pa_pass'];
	$npass=$_POST['pa_npass'];
	$cpass=$_POST['pa_ncpass'];

	$con=mysqli_connect('localhost','root','','mca');
	if(!$con)
	{
		die("Connection error...");
	}
	$s1="SELECT * from cl_reg where cust_email='$email' and cust_pass='$pass'";
	$r1=mysqli_query($con,$s1);
	$c1=mysqli_num_rows($r1);

	if(!$email || !$pass || !$cpass || !$npass)
	{
		$_SESSION['loginerror']="Email & Password are required";
		header("location:forgot_pass.php");
	}
	elseif(!$npass>=6 && !$npass<=10 || !$pass>=6 && !$pass<=10)
	{
		$_SESSION['loginerror']="Password are required more than 6 digit and less than 10 digit.";
		header("location:forgot_pass.php");
	}
	elseif(!$cpass>=6 && !$cpass<=10)
	{
		$_SESSION['loginerror']="Password are required more than 6 digit and less than 10 digit.";
		header("location:forgot_pass.php");
	}
	elseif($npass!=$cpass)
	{
		$_SESSION['loginerror']="Password does not match to confirm Password!";
		header("location:forgot_pass.php");
	}
	elseif($c1>0)
	{
		$cl_up="UPDATE cl_reg set cust_pass='$npass',con_pass='$cpass' where cust_email='$email'";
		$c1=mysqli_query($con,$cl_up);
		if($cl===FALSE)
		{
			$_SESSION['loginerror']="Password not create!";
			header("location:forgot_pass.php");
		}
		else
		{
			$_SESSION['loginerror']="Successfully create new password!";
			header("location:forgot_pass.php");
		}
	}
	else
	{
		$q1="SELECT * from ad_login where email='$email'";
		$a1=mysqli_query($con,$q1);
		$cou=mysqli_num_rows($a1);
		$ad_up="UPDATE ad_login set pass='$npass' where email='$email' and pass='$pass'";
		$ad=mysqli_query($con,$q1);
		if($ad===FALSE)
		{
			$_SESSION['loginerror']="Password not create!";
			header("location:change_pass.php");
		}
		else
		{
			$_SESSION['loginerror']="Successfully create new passwords!";
			$_SESSION['logged_in']=TRUE;
			header("location:change_pass.php");
		}
	}
?>