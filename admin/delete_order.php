<?php
include("conn.php");

if (isset($_GET['delete_order']))
	{

		$delete_order_id=$_GET['delete_order'];
    	$sql = "DELETE FROM pending_orders WHERE order_id='$delete_order_id'";
    	if($conn->query($sql))
    		{

    			header("location:orders.php");
       		}
	}
?>