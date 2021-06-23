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
  <h2 style="margin-left: 449px">View Orders</h2>


</div>

<div style="margin-left: 500px; margin-top: 20px; ">
<table>
	<tr style="border-bottom: 3px solid #1abc9c; background-color: #1abc9c;">
		<th>Order No</th>
		<th>Order ID</th>
		<th>Customer ID</th>
		<th>Invoice no</th> 
		<th>Product ID</th> 
		<th>Quantity</th>
		<th>Status</th>
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
$query ="SELECT * FROM pending_orders";
$rs = mysqli_query($conn,$query);
while($row_orders = mysqli_fetch_array($rs))
{

$order_id=$row_orders['order_id'];
$c_id=$row_orders['customer_id'];
$invoice=$row_orders['invoice_no'];
$p_id=$row_orders['product_id'];
$qty=$row_orders['qty'];
$status=$row_orders['order_status'];




$i++;

?>
<tr>
	<td><?php echo $i; ?></td>
	<td><?php echo $order_id; ?></td>
	<td><?php echo $c_id; ?></td>
	<td><?php echo $invoice; ?></td>
	<td><?php echo $p_id; ?></td>
	<td><?php echo $qty; ?></td>
	<td><?php echo $status; ?></td>

		<td>
		<a href="delete_order.php?delete_order=<?php echo $order_id; ?> style = "text-decoration:none;" class="link_btn">Delete</a>
	</td>
</tr>


<?php } ?>


</table>