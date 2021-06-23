<?php
include("includes/conn.php");
session_start();
if(!isset($_SESSION['username']))
{
header('location:admin_login.php');
}

?>



<!DOCTYPE html><html lang="en">
<head>
    <title>ispecs</title>
    <link rel="icon" type="image/ico" href="img/specs.png">
    <link rel="stylesheet" href="dashboard_style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
	<div class="topbar">
		<h2 style="text-align: center;padding-top: 20px;">Admin Panel</h2>
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
  <h2 style="margin-left: 400px">Add New Product</h2>


</div>
   

<form method="POST" action="insert_product.php" enctype="multipart/form-data" style="max-width:500px;margin:auto">

<div class = "box">
	
	<div class="input-container">
    	<i class="fa fa-adn icon"></i>
    	<input class="input-field" type="text" placeholder="Product Title" name="product_title" required>
  	</div>

	<div class="input-container">
    	<i class="fa fa-bandcamp icon"></i>
    	<input class="input-field" type="text" placeholder="Product Brand" name="product_brand" required>
  	</div>
	
	<div class="input-container">
    	<i class="fa fa-image icon"></i>
    	<input class="input-field" type="file" placeholder="Product Image" name="product_img" required>
  	</div>

	<div class="input-container">
    	<i class="fa fa-money icon"></i>
    	<input class="input-field" type="text" pattern="[0-9].{2,}" title="Please Enter Digits Value only" placeholder="Product Price" name="product_price" required>
  	</div>

		  <button type="submit" class="btn" name="insert_product"><b>ADD PRODUCT</b></button>
</div>
</form>

</body>
</html>



<?php

if (isset($_POST['insert_product'])) 
	{
		
		$p_title=$_POST['product_title'];
		$p_brand=$_POST['product_brand'];

//--------------------------------------------- For image upload -------------------------------------------

		$p_img=$_FILES['product_img']['name'];

     // echo"<script>alert('.$p_img.')</script>";


//******************** To put img name field without .jpg extension in SKU_PRODUCT in database

$filename = explode(".", $_FILES['product_img']['name']); //split by '.'
 // echo"<script>alert('.$filename.')</script>";
array_pop($filename); //remove the last segment
 // echo"<script>alert('.$filename.')</script>";
$filename = implode(".", $filename); //concat it by '.'


  //echo"<script>alert('.$filename.')</script>";
 


		//temporary name
		$temp_img=$_FILES['product_img']['tmp_name'];

		move_uploaded_file($temp_img,"product_images/$p_img");

//-----------------------------------------------------------------------------------------------------------
		$p_price=$_POST['product_price'];

		$p_sku=$filename;

		$sql_query="INSERT INTO products(product_title,product_sku,product_brand,product_img,product_price)
		 						  VALUES('$p_title','$p_sku','$p_brand','$p_img','$p_price')";

		 $query= mysqli_query($conn,$sql_query);

		 if($query)
		 {
				echo"<script>alert('New Product Inserted')</script>";
				echo "<script>window.open('insert_product.php','_self')</script>";
		 }

	}

?>