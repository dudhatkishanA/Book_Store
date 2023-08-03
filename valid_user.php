<?php
	session_start();
	$email=$_POST['em_email'];
	$pass=$_POST['pa_pass'];

	$con=mysqli_connect('localhost','root','','mca');
	if(!$con)
	{
		die("Connection error...");
	}
	$s1="SELECT * from cl_reg where cust_email='$email' and cust_pass='$pass'";
	$r1=mysqli_query($con,$s1);
	$c1=mysqli_num_rows($r1);

	if(!$email || !$pass)
	{
		$_SESSION['loginerror']="Email & Password are required";
		header("location:ad_login.php");
	}
	elseif(!$pass>=6 && !$pass<=10)
	{
		$_SESSION['loginerror']="Password are required more than 6 digit and less than 10 digit.";
		header("location:ad_login.php");
	}
	elseif($c1>0)
	{
		header("location:home.php");
	}
	else
	{
		$q1="SELECT * from ad_login where email='$email' and pass='$pass'";
		$a1=mysqli_query($con,$q1);
		$cou=mysqli_num_rows($a1);
		if($cou>0)
		{
			header("location:ad_book.php");
		}
		else
		{

			$_SESSION['loginerror']="Email or Password in valid!.Please Enter currect data.";
			$_SESSION['logged_in']=TRUE;
			header("location:ad_login.php");
		}
	}
?>