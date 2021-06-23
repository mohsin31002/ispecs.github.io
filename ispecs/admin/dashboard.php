<?php 
session_start();
if(!isset($_SESSION['username']))
{
  header('location:admin_login.php');
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>ispecs</title>
    <link rel="icon" type="image/ico" href="img/specs.png">
    <link rel="stylesheet" href="dashboard_style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<div class="topbar">
		<h2 style="text-align: center;padding-top: 20px;margin-left: 165px;">Admin Panel</h2>
	</div>

<div class="sidenav">
  <a href="dashboard.php"><i class="fa fa-fw fa-home"></i>&nbsp;&nbsp;&nbsp;&nbsp;Dashboard</a>
  <a href="insert_product.php"><i class="fa fa-fw fa-edit"></i>&nbsp;&nbsp;&nbsp;&nbsp;Add Product</a>
  <a href="product_list.php"><i class="fa fa-fw fa-edit"></i>&nbsp;&nbsp;&nbsp;&nbsp;Product List</a>
  <a href="orders.php"><i class="fa fa-fw fa-edit"></i>&nbsp;&nbsp;&nbsp;&nbsp;Orders</a>
  <a href="manage_users.php"><i class="fa fa-fw fa-edit"></i>&nbsp;&nbsp;&nbsp;&nbsp;Manage Users</a>
  <div class="logout"><a href="logout.php"><i class="fa fa-fw fa-sign-out"></i>&nbsp;&nbsp;&nbsp;&nbsp;Logout</a></div>
</div>

<div class="main">
  <h2 style="margin-left: 490px">Welcome <?php echo $_SESSION['username']?></h2>


  <marquee scrollamount="12" direction="right">  
  <h1 style="margin-left: 400px; color: #1abc9c;">Online Glasses Store</h1>
  <h2 style="margin-left: 400px; color: #1abc9c;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Virtual Try On)</h2>
    </marquee>  

    <marquee scrollamount="12" >  
    <h5 style="margin-left: 400px; color: red;"><br><br><br><br><br>Made By Mohsin & Junaid</h5>
    </marquee> 
  


</div>
   
</body>

</html>
