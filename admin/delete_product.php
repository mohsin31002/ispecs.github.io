<?php
include("conn.php");

if (isset($_GET['delete_pro']))
	{

		$delete_id=$_GET['delete_pro'];
    	$sql = "DELETE FROM products WHERE product_id='$delete_id'";
    	if($conn->query($sql))
    		{

    			header("location:product_list.php");
       		}
	}
?>