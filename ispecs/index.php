<?php
include ("conn.php");
include ("functions/functions.php");


session_start();
if(!isset($_SESSION['email']))
{
  /*header("location:index.php"); */

//echo "<script>window.open('index.php')</script>";


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

  width: 100%;
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
    margin-left: 25px;
    background-color: #1abc9c;
    color: white;
    padding: 10px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    padding: 10px;


}

.link_btn:hover
{
  background-color: black;
  color:white;
}



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
//echo $_GET['a'];
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
                        <li class="active"><a href="index.php">Home</a></li>
                        <li><a href="all_products.php">All Products</a></li>
                        <li><a href="brand.php">Brands</a></li>
                        <li><a href="cart.php">Cart</a></li>
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




<marquee scrollamount="12">  
<!--    
    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center"> -->


                    <a href="rayban.php"><img src="img/rayban.png" height="945px" width="259"></a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="armani.php"><img src="img/armani.png" height="999px" width="257"></a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <img src="img/ogs.png" height="999px" width="557">  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="prada.php"><img src="img/prada.jpg" height="942px" width="242"></a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="gucci.php"><img src="img/gucci.jpg" height="942px" width="242"></a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                    
                    <!--   <h3 style="margin-right: 930px"><b>Online Glasses Store<br>(Virtual Try On)</b></h3> 
                    

                    </div>


                </div>

            </div>
        </div>
    </div>-->
    </marquee>  
                        <?php
                        cart();
                        ?>

<!--=====================================================================================================================-->
<div id="product_box">
<?php

    getPro(); //function defined in functions folder
?>
</div>

<!--=====================================================================================================================-->
            
            <div class="row">
                <div class="col-md-12">
                    <div class="product-pagination text-center">                      
                    </div>
                </div>
            </div>
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