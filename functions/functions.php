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







//------------------------------------------ Function to Show Product ------------------------------------------------


function getPro()
{
global $conn;  //to use $conn in function,we have to make global variable
$sql_query="SELECT * FROM products order by rand()";
$query=mysqli_query($conn, $sql_query);  
while($row_products=mysqli_fetch_array($query))
	{
    	$pro_id=$row_products['product_id'];
    	$pro_title=$row_products['product_title'];
    	$pro_brand=$row_products['product_brand'];
    	$pro_img=$row_products['product_img'];
    	$pro_price=$row_products['product_price']; 
      $pro_sku=$row_products['product_sku']; 

            echo "
                <div id='single_product'>
                
                <h4 style='margin-left:20px;'>$pro_title</h4>
                <a href ='single_product.php?pro_id=$pro_id'><img src='admin/product_images/$pro_img'></a>
             
                <br><br>
                <h5>Rs.$pro_price</h5>
                <a href='tryOn/tryOn.php?sku=$pro_sku' style = 'text-decoration:none; width:95px;' class='link_btn'>Try On</a>
                <a href='index.php?add_cart=$pro_id' style = 'text-decoration:none; width:105px; margin-left:8px;' class='link_btn'>Add To Cart</a>
                <br><br><br>

                   </div>
                ";


	} 

}

// -------------------------------- Function to get real ip address to identify real customer --------------------------------

  function getRealIpAddr()
  {
    if ( !empty( $_SERVER['HTTP_CLIENT_IP'] ) )
    {
      $ip = $_SERVER['HTTP_CLIENT_IP'];
    }
    elseif( !empty( $_SERVER['HTTP_X_FORWARDED_FOR'] ) )
    //to check ip passed from proxy
    {
      $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else
    {
      $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
  }


  //------------------------------------------------- Creating cart ------------------------------------------------------------

  function cart()
  {
  	if(isset($_GET['add_cart']))
  	{	
  		//to use data from data from database , we have to make global variable of $conn which is available in conn.php
  		global $conn;

  		$ip_add=getRealIpAddr();
  		$p_id=$_GET['add_cart'];
  		$check_pro="select * from cart where ip_add='$ip_add' AND p_id='$p_id'";
  		$run_check=mysqli_query($conn,$check_pro);
  		if(mysqli_num_rows($run_check)>0)
  		{
  			echo "";
  		}
  		else
  		{
  			$q="INSERT INTO cart (p_id,ip_add) VALUES ('$p_id','$ip_add')";
  			$run_q=mysqli_query($conn,$q);
        echo "<script>window.open('index.php','_self')</script>";
  		}


  	}

  }


//------------------------------------- Function to get total number of items in cart ----------------------------------------------

function items()
{
  global $conn;
  $ip_add=getRealIpAddr();
    if(isset($_GET['add_cart']))
      {
        $get_items= "select * from cart where ip_add='$ip_add'";
        $run_items=mysqli_query($conn,$get_items);
        $count_items=mysqli_num_rows($run_items);
      }
    else
      {
        $get_items= "select * from cart where ip_add='$ip_add'";
        $run_items=mysqli_query($conn,$get_items);
        $count_items=mysqli_num_rows($run_items);
      }
        echo $count_items;
}

//------------------------------------- Function to get total price of items in cart ----------------------------------------------

function total_price()
{
  global $conn;
  $total=0;
  $ip_add=getRealIpAddr();
  $sel_price="select * from cart where ip_add='$ip_add'";
  $run_price=mysqli_query($conn,$sel_price);
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
  }
    echo "Rs." . $total;
}


//------------------------------------------ Function For My Account ------------------------------------------------

function getdefault()
{
  global $conn;


  error_reporting(0);
  $c=$_SESSION['email'];
  $get_c="select * from signup where email='$c'";
  $run_c=mysqli_query($conn,$get_c);
  $row_c=mysqli_fetch_array($run_c);
  $customer_id=$row_c['id'];

        if(!isset($_GET['my_orders']))
          {
          if(!isset($_GET['edit_profile']))
            {
            if(!isset($_GET['change_password']))
              {
              if(!isset($_GET['delete_account']))
                {

            $get_orders="select * from customer_order where customer_id='$customer_id' AND order_status='pending'";
            $run_orders=mysqli_query($conn,$get_orders);
            $count_orders=mysqli_num_rows($run_orders);
            
            if($count_orders>0)
            {
              echo"
              <div>
              <h1 style='color:red;'>Important</h1>
              <h2>You have ($count_orders) pending Orders....</h2>
              <h3>You can see your orders at <a href='my_account.php?my_orders' style='text-decoration:none;'>My Orders</a></h3>

              </div>
              ";
            }

            else
            {
              
              echo"
              <div>
              <h1 style='color:red;'>Important</h1>
              <h2>You have No pending Orders....</h2>
              <h3>You can see your orders History at <a href='my_account.php?my_orders' style='text-decoration:none;'>My Orders</a></h3>

              </div>
              ";
              
            }
            
  }

}
}
}
}

?>