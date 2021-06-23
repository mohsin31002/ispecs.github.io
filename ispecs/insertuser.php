<?php
include 'signup.php';
include 'functions/functions.php';
include 'conn.php';
$servername = "localhost";
$username = "root";
$password = "";
$db="ispecs";
session_start();
		$conn = mysqli_connect($servername, $username, $password,$db);
			if ($conn)
				{

				}
			else
				{
					die("connection failed...".mysqli_connect_error());
				}




$firstname=$_POST['firstname'];
$lastname=$_POST['lastname'];
$email=$_POST['email'];
$password=$_POST['password'];
$cpassword=$_POST['cpassword'];
$mobile=$_POST['mobile'];
$address=$_POST['address'];
$country=$_POST['country'];
$city=$_POST['city'];
$c_ip=getRealIpAddr();
if(isset($_POST['signup']))
{
	session_start();


		if($password==$cpassword)
			{
				$query="SELECT * FROM signup WHERE email='$email'";
				$fire=mysqli_query($conn,$query);
				if(mysqli_num_rows($fire)>0)
				{
				echo "<script> alert('Email Already Exists')</script>";
				}
				else
				{
				$sql="INSERT INTO signup(firstname,lastname,email,password,cpassword,mobile,address,country,city,c_ip) VALUES ('$firstname','$lastname','$email','$password','$cpassword','$mobile','$address','$country','$city','$c_ip')";
				mysqli_query($conn, $sql);
				echo "<script> alert('Record Inserted')</script>";
				}
			}
		else
			{
								echo "<script> alert('Incorrect Username/Password')</script>";
			}
}
mysqli_close($conn);
?>