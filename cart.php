<?php
include ("conn.php");
include ("functions/functions.php");


session_start();
if(!isset($_SESSION['email']))
{
  /*header("location:index.php"); */

echo "<script>window.open('index.php')</script>";


}

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>iSpecs</title>
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

<style>

#product_box
{

  width: 90%;
  padding: 20px;
  margin-left: 70px;
  margin-right: 50px;
  margin-top: 10px;
  margin-bottom: 10px;
  text-align: center;
}

#single_product
{
  float: left;
  padding: 10px;
  margin-right: 20px;

}

#single_product img
{
    margin-left: 25px;
    border: 2px solid #2c3338;
    width: 210px;
    height: 200px;
}
#single_product img:hover
{
    color: blue;
}


/* Set a style for the submit button */


.link_btn 
{
    background-color: #1abc9c;
    color: white;
    padding: 10px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    padding: 10px;
    border: none;


}

.link_btn:hover
{
  background-color: black;
  color:white;
}


/*----------------------------------- Internal CSS for table ----------------------------------------*/           
            table 
                {
                    border: 3px solid #1abc9c;
                    border-collapse: collapse;
                    margin-left: 400px;
                    width: 565px;
                
                }

            th, td 
                {
                    border: 1px solid #1abc9c;
                    padding: 5px;
                    text-align: center;
                    border-bottom: 1px solid #ddd;

                }

            tr:hover
                {
                    background-color:#f5f5f5;
                }

/*----------------------------------------------------------------------------------------------------*/           


</style>



  </head>
 
 <body>
  
    <div class="header-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="user-menu">
                        <ul>
                            <li><a href="my_account.php"><i class="fa fa-user"></i> My Account</a></li>
                            <li><a href="cart.php"><i class="fa fa-user"></i> My Cart</a></li>
                            <li><a href="signup.php"><i class="fa fa-user"></i> Signup</a></li>


                                <?php
                                if(!isset($_SESSION['email']))
                                {
                                    echo "<li><a href='userlogin.php'><i class='fa fa-user'></i> Login</a></li>";
                                }

                                else
                                {

                                }

                                ?>

                        </ul>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="header-right">


                        

                        <ul class="list-unstyled list-inline">


                            <li class="dropdown dropdown-small">
                                <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#"><span class="key">currency :</span><span class="value">PKR </span><b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">PKR</a></li>
                                </ul>
                            </li>

                            <li class="dropdown dropdown-small">
                                <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#"><span class="key">language :</span><span class="value">English </span><b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">English</a></li>

                                </ul>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div> <!-- End header area -->
    
    <div class="site-branding-area">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="logo">
                        <h1><a href="index.php">i<span>Specs</span></a></h1>

                    </div>
                </div>
                
                <div class="col-sm-6" >
                    <div class="shopping-item" >
                        <a href="cart.php">Cart - <span class="cart-amunt"><?php total_price();?></span> <i class="fa fa-shopping-cart"></i> <span class="product-count"><?php items();?></span></a>
                    </div>
                </div>

            </div>
        </div>
    </div> <!-- End site branding area -->
    
    <div class="mainmenu-area">
        <div class="container">
            <div class="row">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div> 
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="all_products.php">All Products</a></li>
                        <li><a href="brand.php">Brands</a></li>
                        <li class="active"><a href="cart.php">Cart</a></li>
                        <li><a href="contact.php">Contact</a></li>
                        <li style="text-align: center;">
                            <?php
                                if(!isset($_SESSION['email']))
                                {

                                }

                                else
                                {
                                    echo"<div style='color:black; padding:18px;font-weight:bold;font-size:17px; margin-left:50px;'>";
                                    echo $_SESSION['email']; 
                                    echo "</div>";   
                                    echo "<li><a href='logout.php' style='background-color: #cc0000;'>Logout</a></li>";
                                }

                        ?>
                        </li>
                    </ul>
                </div>  
            </div>
        </div>
    </div> <!-- End mainmenu area -->    



<!--============================================================================================================================================================-->

<div id="product_box">

    <form action="cart.php" method="POST" enctype="multipart/form-data">
<table>
    <tr style="border-bottom: 2px solid #1abc9c;">
        <th>Remove</th>
        <th colspan="2">Product Title</th>
        <th>Product Brand</th> 
        <th>Total Price</th>
    </tr>

<!----------------------------------------------Total Price Function to get both Cart and products item from database---------------------------------------------->
<?php

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
                $product_title=$p_price['product_title'];
                $product_brand=$p_price['product_brand'];
                $only_price=$p_price['product_price'];

                $product_img=$p_price['product_img'];

                $val=array_sum($product_price);   //$p_price iss liye use kiya h...q k wo products wale table ki query le k aa rha h ta k hum Products wale 
                                                  //Price ko fetch kr sakein.....!!
                $total+=$val;

?>
<!----------------------------------------------------------------------------------------------------------------------------------------------------------------->
    <tr>
        <td><input type="checkbox" value="<?php echo $pro_id; ?>" name="remove[]"></td> <!-- humein multiple data ko b remove  krna par jata h..is se liye -->
                                                                                         <!-- remove k sath ye brackets use ki hain'[]'  -->
        <td><img src="admin/product_images/<?php echo $product_img; ?>" height="80" width="80" ></td>
        <td style="text-align: left;"><?php echo $product_title; ?></td>
        <td><?php echo $product_brand; ?></td>
        <td><?php echo "Rs." . $only_price ?></td>
    
    </tr>
        <?php             
        }       //total price wale function wali 2 brackets
        }
        ?>

       
        <tr style="border-top:2px solid #1abc9c;">
            <th colspan="4">Sub-total</th>
            <th><?php echo "Rs." . $total; ?></th>
        </tr>



    </table> 

    		<div style="margin-left: -22px;"> 	
            <input type="submit" name="update" value="Delete Cart" style="margin-right: 25px; width: 178px; margin-top: 10px;">
            <input type="submit" name="continue" value="Continue Shopping" style="margin-right: 25px; margin-top: 10px;">
            <button class="link_btn"><a href="checkout.php" style="color: white; text-decoration: none; padding: 10px; margin-top: 10px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CHECKOUT&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></button>
        	</div>


    </form>

    <?php
    
/*----------------------------------------------------------------------------- Update Cart -----------------------------------------------------------------------*/
    
    function updatecart()
    {
        global $conn;
    if (isset($_POST['update'])) 
    {
        foreach ($_POST['remove'] as $remove_id)
        {
            $delete_product="delete from cart where p_id='$remove_id'";
            $run_delete=mysqli_query($conn,$delete_product);
            if($run_delete)
            {
                echo "<script>window.open('cart.php','_self')</script>";
            }
        }
    }

/*--------------------------------------------------------------------------- Continue Shopping -------------------------------------------------------------------*/

if(isset($_POST['continue']))
    {
         echo "<script>window.open('index.php','_self')</script>";
    }
    }

    echo @$up_cart=updatecart();

    ?>

</div>

<!--=============================================================================================================================================================-->









        </div>
    </div>


    <div class="footer-top-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="footer-about-us">
                        <h2>i<span>Specs</span></h2>
                        <p>A spectacles website that permits a customer to submit online orders for glasses. Shopping Cart System is the Simple shopping Solution. It's a full-featured website and shopping cart system that bends over backwards to give you the flexibility you need to runyour online store.</p>
                        <div class="footer-social">
                            <a href="https://www.facebook.com" target="_blank"><i class="fa fa-facebook"></i></a>
                            <a href="https://www.twitter.com" target="_blank"><i class="fa fa-twitter"></i></a>
                            <a href="https://www.youtube.com" target="_blank"><i class="fa fa-youtube"></i></a>
                            <a href="https://www.linkedin.com" target="_blank"><i class="fa fa-linkedin"></i></a>
                            <a href="https://www.pinterest.com" target="_blank"><i class="fa fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-3 col-sm-6">
                    <div class="footer-menu">
                        <h2 class="footer-wid-title">User Navigation </h2>
                        <ul>
                            <li><a href="my_account.php">My account</a></li>
                            <li><a href="my_account.php">Order history</a></li>
                        </ul>                        
                    </div>
                </div>
                
                <div class="col-md-3 col-sm-6">
                    <div class="footer-menu">
                        <h2 class="footer-wid-title">Brands</h2>
                        <ul>
                            <li><a href="rayban.php">Rayban</a></li>
                            <li><a href="gucci.php">Gucci</a></li>
                            <li><a href="armani.php">Armnani</a></li>
                            <li><a href="prada.php">Prada</a></li>
                        </ul>                        
                    </div>
                </div>
                
                <div class="col-md-3 col-sm-6">
                    <div class="footer-newsletter">
                        <h2 class="footer-wid-title">Newsletter</h2>
                        <p>Sign up to our newsletter and get exclusive deals you wont find anywhere else straight to your inbox!</p>
                        <div class="newsletter-form">
                            <input type="email" placeholder="Type your email">
                            <input type="submit" value="Subscribe">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="copyright">
                        <p>&copy; 2019 iSpecs. All Rights Reserved. Coded by <a href="#" target="_blank">Mohsin & Junaid.</a></p>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
   
    <!-- Latest jQuery form server -->
    <script src="https://code.jquery.com/jquery.min.js"></script>
    
    <!-- Bootstrap JS form CDN -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    
    <!-- jQuery sticky menu -->
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    
    <!-- jQuery easing -->
    <script src="js/jquery.easing.1.3.min.js"></script>
    
    <!-- Main Script -->
    <script src="js/main.js"></script>
  </body>
</html>