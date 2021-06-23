<?php
include ("conn.php");
//include ("functions/functions.php");

  $c=$_SESSION['email'];
  $get_c="select * from signup where email='$c'";
  $run_c=mysqli_query($conn,$get_c);
  $row_c=mysqli_fetch_array($run_c);
  $customer_id=$row_c['id'];


?>

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
  					padding: 4px;
					text-align: center;
					border-bottom: 1px solid #ddd;


				}

			tr:hover
				{
					background-color:#f5f5f5;
				}
		</style>

<!--===================================================================================================================================-->


<table style="border-bottom: 2px solid #1abc9c; margin-left: 113px;">
	
	<th style="background-color: #1abc9c;"><center>Order No</center></th>
	<th style="background-color: #1abc9c;"><center>Due Amount</center></th>
	<th style="background-color: #1abc9c;"><center>Invoice No</center></center></th>
	<th style="background-color: #1abc9c;"><center>Total Products</center></th>
	<th style="background-color: #1abc9c;"><center>Order Date</center></th>
	<th style="background-color: #1abc9c;"><center>Paid/Unpaid</center></th>


<?php


	$get_orders="select * from customer_order where customer_id='$customer_id'";
	$run_orders=mysqli_query($conn, $get_orders);
	$i=0;
	while($row_orders=mysqli_fetch_array($run_orders))     // while and fetch array ki madad se sara data retrieve kr lena h ....
	{
	$order_id=$row_orders['order_id'];
	$due_amount=$row_orders['due_amount'];
	$invoice_no=$row_orders['invoice_no'];
	$total_products=$row_orders['total_products'];
	$order_date=$row_orders['order_date'];
	$order_status=$row_orders['order_status'];
	$i++;

	if($order_status=='pending')
	{
		$order_status='Unpaid';
	}
	else
	{
		$order_status='Paid';
	}

	echo"
	<tr>
	<td>$i</td>
	<td>$due_amount</td>
	<td>$invoice_no</td>
	<td>$total_products</td>
	<td>$order_date</td>
	<td>$order_status</td>


	</tr>

	";
}


?>

</table>