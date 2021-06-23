<?php
include("includes/conn.php");
session_start();
if(!isset($_SESSION['username']))
{
header('location:admin_login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>ispecs</title>
    <link rel="icon" type="image/ico" href="img/specs.png">
    <link rel="stylesheet" href="dashboard_style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="icon" type="image/ico" href="img/specs.png">
    
    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>
    
    <!-- Bootstrap -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/responsive.css">

</head>
<body>
	<div class="topbar">
		<h2 style="text-align: center;padding-top: 20px">Admin Panel</h2>
	</div>

<div class="sidenav">
  <a href="dashboard.php" style="text-decoration: none;"><i class="fa fa-fw fa-home"></i>&nbsp;&nbsp;&nbsp;&nbsp;Dashboard</a>
  <a href="insert_product.php" style="text-decoration: none;"><i class="fa fa-fw fa-edit"></i>&nbsp;&nbsp;&nbsp;&nbsp;Add Product</a>
    <a href="product_list.php" style="text-decoration: none;"><i class="fa fa-fw fa-edit"></i>&nbsp;&nbsp;&nbsp;&nbsp;Product List</a>
  <a href="orders.php" style="text-decoration: none;"><i class="fa fa-fw fa-edit"></i>&nbsp;&nbsp;&nbsp;&nbsp;Orders</a>
  <a href="manage_users.php" style="text-decoration: none;"><i class="fa fa-fw fa-edit"></i>&nbsp;&nbsp;&nbsp;&nbsp;Manage Users</a>
  <div class="logout"><a href="#" style="text-decoration: none;"><i class="fa fa-fw fa-sign-out"></i>&nbsp;&nbsp;&nbsp;&nbsp;Logout</a></div>
</div>

<div class="main">
  <h2 style="margin-left: 450px">Update Product</h2>


</div>    
<!--=============================================================== Update Form ===============================================================================--> 

<form method="POST" action="" enctype="multipart/form-data" style="max-width:500px;margin:auto;padding: 30px;">

<div class = "box">
	
	<div class="input-container">
    	<i class="fa fa-adn icon"></i>
    	<input class="input-field" type="text" placeholder="Product Title" name="product_title">
  	</div>

	<div class="input-container">
    	<i class="fa fa-bandcamp icon"></i>
    	<input class="input-field" type="text" placeholder="Product Brand" name="product_brand">
  	</div>
	
	<div class="input-container">
    	<i class="fa fa-image icon"></i>
    	<input class="input-field" type="file" placeholder="Product Image" name="product_img">
  	</div>

	<div class="input-container">
    	<i class="fa fa-money icon"></i>
    	<input class="input-field" type="text" pattern="[0-9].{2,}" title="Please Enter Digits Value only" placeholder="Product Price" name="product_price">
  	</div>
    <div style="padding: 8px; width: 460px; margin-left:-10px">
		  <button type="submit" class="btn" name="update_pro" ><b>UPDATE PRODUCT</b></button>
      </div>
</div>
       



<?php


if(isset($_POST['update_pro']))
{
	$p_id=$_GET['update_pro'];
	$p_title=$_POST['product_title'];
	$p_brand=$_POST['product_brand'];

//--------------------------------------------- For image upload -------------------------------------------

	$p_img=$_FILES['product_img']['name'];

	//temporary name
	$temp_img=$_FILES['product_img']['tmp_name'];

	move_uploaded_file($temp_img,"product_images/$p_img");

//-----------------------------------------------------------------------------------------------------------
	$p_price=$_POST['product_price'];


$servername = "localhost";
$username = "root";
$password = "";
$db="ispecs";

$conn = mysqli_connect($servername, $username, $password,$db);
if ($conn)
{
	
}
else
{
	die("connection failed...".mysqli_connect_error());
}

$sql = "UPDATE products SET product_title='$p_title', product_brand='$p_brand', product_img='$p_img', product_price='$p_price' WHERE product_id='$p_id' ";

if ($conn->query($sql) === TRUE) {
        echo"<script>alert('Product Updated')</script>";
        echo "<script>window.open('product_list.php','_self')</script>";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
}

?>
 </form>

      </div> 

    </div>

  </body>
</html>