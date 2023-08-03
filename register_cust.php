<?php
session_start();
	$name=$_POST['txt_name'];
	$email=$_POST['em_email'];
	$cont=$_POST['txt_con'];
	$pass=$_POST['pa_pass'];
	$cpass=$_POST['pa_cpass'];

	$con=mysqli_connect('localhost','root','','mca');
	if(!$con)
	{
		dei("Connection error...");
	} 
	$query="SELECT * FROM cl_reg WHERE cust_email='$email' and cust_pass='$pass'";
	//echo $query;
	$ans=mysqli_query($con,$query);
	$count=mysqli_num_rows($ans);
	if($count>0)
	{
		$_SESSION['error']="User already exist!";
		header("location:register.php");
	}
	elseif(!$pass>=6 && !$pass<=10)
	{
		$_SESSION['loginerror']="Password are required more than 6 digit and less than 10 digit.";
		header("location:ad_login.php");
	}
	elseif($pass != $cpass)
	{
		$_SESSION['error']="Password and Confirme password not match!";
		header("location:register.php");
	}
	elseif(!$cont==10)
	{
		$_SESSION['error']="Contact number must be 10 digit only!";
		header("location:register.php");
	}
	else
	{
		$sql="INSERT into cl_reg (cust_name,cust_email,cust_num,cust_pass,con_pass) values ('$name','$email','$cont','$pass','$cpass')";
		$result=mysqli_query($con,$sql);
		if($result===FALSE)
		{
			$_SESSION['error']="Not register!";
			header("location:register.php");
		}
		else
		{
			$_SESSION['error']="Your registraion sucessfull Please Login !";
			header("location:register.php");
		}

	}

?>