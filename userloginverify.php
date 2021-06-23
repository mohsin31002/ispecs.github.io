<?php
@session_start();
include ("conn.php");
if(isset($_POST['login']))
{
$e_mail=$_POST['email'];
$pswd=$_POST['password'];
$sql = "SELECT * FROM signup WHERE email = '$e_mail' AND password='$pswd'";
$run_query=mysqli_query($conn,$sql);
$row=mysqli_num_rows($run_query);
$rows = mysqli_fetch_assoc($run_query);
$i=$rows['id'];

if($row==1)
{
	$_SESSION['email']=$e_mail;
    header("location:my_account.php");
}
else
{
		echo "Incorrect Username/Password";
	echo"<script>alert('Email/Password is Incorrect.')</script>";
	echo "<script>window.open('userlogin.php','_self')</script>";

}
}
?>
