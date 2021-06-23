<?php
include("includes/conn.php");
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

 <!--==========================================Internal CSS For table =================================================================-->
		<style>
			
			table 
				{
					border: 3px solid #1abc9c;
  					border-collapse: collapse;
  				
				}

			th, td 
				{
					border: 1px solid black;
  					padding: 5px;
					text-align: center;
					border-bottom: 1px solid #ddd;

				}

			tr:hover
				{
					background-color:#f5f5f5;
				}
		</style>

<!--===================================================================================================================================-->

<!--================================================= CSS Links =======================================================================-->
    
    <link rel="stylesheet" href="dashboard_style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!--===================================================================================================================================-->

</head>


<body>
	<div class="topbar">
		<h2 style="text-align: center;padding-top: 20px">Admin Panel</h2>
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
  <h2 style="margin-left: 390px">Manage Products</h2>


</div>




<div style="margin-left: 500px; margin-top: 20px;">
<table>
	<tr style="background-color: #1abc9c">
		<th>ID</th>
		<th>Image</th>
		<th>Product Title</th> 
		<th>Product Brand</th> 
		<th>Price</th>
		<th>Action</th>

</tr>
</body>
</html>

<!--============================================================================================================================-->


<?php
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




$i=0;
$query ="SELECT * FROM products";
$rs = mysqli_query($conn,$query);
while($row = mysqli_fetch_array($rs))
{
$p_id=$row['product_id'];
$p_img=$row['product_img'];
$p_title=$row['product_title'];
$p_brand=$row['product_brand'];
$p_price=$row['product_price'];
$i++;

?>
<tr>
	<td><?php echo $i; ?></td>
	<td><img src="product_images/<?php echo $p_img ?>" width="60" height="60"></td>
	<td><?php echo $p_title; ?></td>
	<td><?php echo $p_brand; ?></td>
	<td><?php echo $p_price; ?></td>
		<td>
		<a href="update_product.php?update_pro=<?php echo $p_id ?> style = "text-decoration:none;" class="link_btn">Edit</a>
		<a href="delete_product.php?delete_pro=<?php echo $p_id; ?> style = "text-decoration:none;" class="link_btn">Delete</a>
	</td>

	</td>


</tr>


<?php } ?>


</table>