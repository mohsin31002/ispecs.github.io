<?php
session_start();

include ("includes/conn.php");
if(isset($_POST['login']))
{

}

$u_name=$_POST['username'];
$pswd=$_POST['password'];
$sql = "SELECT * FROM admin_login WHERE username = '$u_name' AND password='$pswd'";
$run_query=mysqli_query($conn,$sql);
    
$row=mysqli_num_rows($run_query);
		
			if($row==1)
			{
				echo "Logged in";
				$_SESSION['username']=$u_name;
    		  	header('location:dashboard.php');
			}

    		else
        	{
    			echo "<script>alert('Invalid Username/Password.')</script>";
    			header('location:admin_login.php');

    		}

?>
