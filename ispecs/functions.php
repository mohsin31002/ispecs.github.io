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

//==============================================================================================

//Function to get real ip address to identify real customer
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

//=============================== Creating the Cart ================================================

  //creating cart
  function cart()
  {
  	if(isset($_GET['add_cart']))
  	{	
  		global $conn;

  		$ip_add=getRealIpAddr();
  		$p_id=$_GET['add_cart'];
  		$check_pro="select* from cart where ip_add='$ip_add' AND p_id='$p_id'";
  		$run_check=mysqli_query($conn,$check_pro);
  		if(mysqli_num_rows($run_check)>0)
  		{
  			echo "";
  		}
  		else
  		{
  			$q="INSERT INTO cart (p_id,ip_add) VALUES ('$p_id','1')";
  			$run_q=mysqli_query($conn,$q);
  		}


  	}

  }



//================================== Getting Product to Display ============================================================
function getPro()
{
global $conn;  //to use $conn in function,we have to make global variable
$sql_query="SELECT * FROM products order by rand() LIMIT 0,13";
$query=mysqli_query($conn, $sql_query);  
while($row_products=mysqli_fetch_array($query))
	{
    	$pro_id=$row_products['product_id'];
    	$pro_title=$row_products['product_title'];
    	$pro_brand=$row_products['product_brand'];
    	$pro_img=$row_products['product_img'];
    	$pro_price=$row_products['product_price']; 

            echo "
                <div id='single_product'>
                
                <h4 style='margin-left:20px;'>$pro_title</h4>
                <a href ='single_product.php?pro_id=$pro_id'><img src='admin/product_images/$pro_img'></a>
             
                <br><br>
                <h5>Rs.$pro_price</h5>
                <a href='#' style = 'text-decoration:none; width:95px;' class='link_btn'>Try On</a>
                <a href='index.php?add_cart=$pro_id' style = 'text-decoration:none; width:105px; margin-left:8px;' class='link_btn'>Add To Cart</a>
                <br><br><br>

                   </div>
                ";


	} 

}

///////////////////////////////////////////////////////////////////////////////////////////



?>