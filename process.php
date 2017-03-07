<?php
	include_once('common.php');
	
	if(!empty($_POST))
	{
		$msg="";
		
		if(empty($_POST['username']) || empty($_POST['password']) || empty($_POST['cpass']) || empty($_POST['fname']) || empty($_POST['lname']) || empty($_POST['email'])|| empty($_POST['phone'])|| empty($_POST['loc']))
		{
			$msg.="<li>Please full fill all requirement";
		}
		
		if($_POST['password']!=$_POST['cpass'])
		{
			$msg.="<li>Please Enter your Password Again.....";
		}
		
		if(!ereg("^[a-z0-9_]+[a-z0-9_.]*@[a-z0-9_-]+[a-z0-9_.-]*\.[a-z]{2,5}$",$_POST['email']))
		{
			$msg.="<li>Please Enter Your Valid Email Address...";
		}
		
		
		if(strlen($_POST['password'])>15)
		{
			$msg.="<li>Please Enter Your Password in limited Format....";
		}
		
		if(is_numeric($_POST['fname']))
		{
			$msg.="<li>Name must be in String Format...";
		}
		
		if(!is_numeric($_POST['phone']))
		{
			$msg.="<li>Phone number must be in Numerals Format...";
		}
		
		if(dataExists($_POST['username'], $_POST['email']))
		{
			$msg.="<li>User already exist with this uname/email...";
		}
		
		if($msg!="")
		{
			header("location:index.php?error=".$msg);
		}
		else
		{
			$fname=$_POST['fname'];
			$lname=$_POST['lname'];
			$uname=$_POST['username'];
			$pass=$_POST['password'];
			$email=$_POST['email'];
			$phone=$_POST['phone'];
			$loc=$_POST['loc'];
			
			addUser($fname,$uname,$pass,$lname,$email,$phone,$loc);
			header("location:index.php");
		}
	}
	else
	{
		header("location:index.php");
	}
?>