<?php
include ("conn.php");
include ("functions/functions.php");


//--------------------------------- getting customer id

if (isset($_GET['cust_id']))
{
	$customer_id= $_GET['cust_id'];
}

//-------------------------------- getting Products price and no. of items

  $total=0;
  $ip_add=getRealIpAddr();
  $sel_price="select * from cart where ip_add='$ip_add'";
  $run_price=mysqli_query($conn,$sel_price);
  $status='pending';
  $invoice_no=mt_rand();
  $count_pro=mysqli_num_rows($run_price);
  while($record=mysqli_fetch_array($run_price))
  {
    $pro_id=$record['p_id'];
    $pro_price="select * from products where product_id='$pro_id'";
    $run_pro_price=mysqli_query($conn,$pro_price);
    while($p_price=mysqli_fetch_array($run_pro_price))
    {
      $product_price=array($p_price['product_price']);
      $val=array_sum($product_price);   //$p_price iss liye use kiya h...q k wo products wale table ki query le k aa rha h ta k hum Products wale table se Price ko 
                                        //fetch kr sakein.....!!
      $total+=$val;
    }
//  }

 //-------------------------------- Getting Quantity from cart

  $get_cart="select * from cart where ip_add='$ip_add'";
  $run_cart=mysqli_query($conn,$get_cart);
  $get_qty=mysqli_fetch_array($run_cart);
  $qty=$get_qty['qty'];  		//cart k qty ko $qty mein store krwa rhy

 	if($qty==0)
 	{
    $qty=1;
    $sub_total=$total;
 	}
  else
  {
    $qty=$qty;
    $sub_total=$total*$qty;
  }
  date_default_timezone_set("Asia/Karachi");

$date = date('Y-m-d H:i:s');
//mysql_query("INSERT INTO `table` (`dateposted`) VALUES ('$date')");

    $insert_order="INSERT INTO customer_order (customer_id,due_amount,invoice_no,total_products,order_date,order_status) 
                            VALUES ('$customer_id','$sub_total','$invoice_no','$count_pro','$date','$status')";
    $run_order=mysqli_query($conn,$insert_order);

    if($run_order)
   {
      echo"<script>window.open('display_msg.php','_self')</script>";

    
      $empty_cart="DELETE FROM cart where ip_add='$ip_add'";
      $run_empty=mysqli_query($conn,$empty_cart);
      $insert_to_pending_orders="INSERT INTO pending_orders(customer_id,invoice_no,product_id ,qty,order_status)
                                        VALUES ('$customer_id','$invoice_no','$pro_id','$qty','$status')";
      $run_pending_order=mysqli_query($conn,$insert_to_pending_orders);
    }

}



?>