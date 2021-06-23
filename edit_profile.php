<?php
@session_start();
include("conn.php");
if (isset($_GET['edit_profile'])) 
{
	$customer_email=$_SESSION['email'];
	$get_customer="select * from signup where email='$customer_email'";
	$run_customer=mysqli_query($conn, $get_customer);
	$row=mysqli_fetch_array($run_customer);

	$id=$row['id'];
	$firstname=$row['firstname'];
	$lastname=$row['lastname'];
	$email=$row['email'];
	$password=$row['password'];
	$mobile=$row['mobile'];
	$address=$row['address'];
	$country=$row['country'];
	$city=$row['city'];
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


  </head>
  <body>
   
    <div class="product-big-title-area" style="margin-left: -100px">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Update Account</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
<!--=============================================================== Update Form ===============================================================================--> 


    <div class="container" style="margin-left: -100px">

      <div id="login" style="border:3px; border-style:solid; border-color:#1abc9c; padding: 40px; margin: 20px; margin-left: 370px;margin-right: 370px;">

        <form action="" method="post" enctype="multipart/form_data">

          <fieldset class="clearfix">

                <input type="text" name="firstname" value="<?php echo $firstname?>" pattern="[A-Za-z].{2,}" title="Please Enter 3 or more Character Values" placeholder="First Name" style = "width: 270px; margin-left: 20px; margin-top: 1px;" required>

                <input type="text" name="lastname" value="<?php echo $lastname?>" pattern="[A-Za-z].{2,}" title="Please Enter 3 or more Character Values" placeholder="Last Name" style = "width: 270px; margin-left: 20px; margin-top: 10px;" required>

                <input type="email" name="email" value="<?php echo $email?>" placeholder="Email" style = "width: 270px; margin-left: 20px; margin-top: 10px;" required>

                <input type="password" name="password" value="<?php echo $password?>" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" placeholder="Password" style = "width: 270px; margin-left: 20px; margin-top: 10px;" required>

                <input type="password" name="cpassword" value="<?php echo $password?>" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" placeholder="Confirm Password" style = "width: 270px; margin-left: 20px; margin-top: 10px;" required>

                <input type="text" name="mobile" value="<?php echo $mobile?>" pattern="[0-9].{10}" title="Incorrect Number Pattern. Please Enter 11 Digits Only." placeholder="Mobile Number" style = "width: 270px; margin-left: 20px; margin-top: 10px;" required>
                      
                <input type="text" name="address" value="<?php echo $address?>" placeholder="Permanent Address" style = "width: 270px; margin-left: 20px; margin-top: 10px;" required>

            <select name="country" value="<?php echo $country?>"style = "width: 270px; margin-left: 20px; margin-top: 10px;" required>
                <option>&nbsp;&nbsp;Select Country</option>
                <option>Pakistan</option>
                <option>Australia</option>
                <option>Canada</option>
                <option>USA</option>
            </select>

                <input type="text" name="city" value="<?php echo $city?>" placeholder="City" style = "width: 270px; margin-left: 20px; margin-top: 10px;" required>
  
    <input type="submit" name="update_account" value="UPDATE" style = "width: 270px; margin-left: 20px; margin-top: 10px;">

          </fieldset>
          

        </form>

      </div> 

    </div>


<!--==========================================================================================================================================================-->    
<?php


if(isset($_POST['update_account']))
{
	$update_id=$id;
	$firstname=$_POST['firstname'];
	$lastname=$_POST['lastname'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	$cpassword=$_POST['cpassword'];
	$mobile=$_POST['mobile'];
	$address=$_POST['address'];
	$country=$_POST['country'];
	$city=$_POST['city'];

	$sql = "UPDATE signup SET firstname='$firstname' , lastname='$lastname', email='$email', password='$cpassword', cpassword='$cpassword', mobile='$mobile', address='$address', country='$country', city='$city' WHERE id=$id ";
	$run_sql=mysqli_query($conn,$sql);

if ($run_sql) 
  {
        echo"<script>alert('Your Account has been updated Successfully')</script>";
        echo "<script>window.open('my_account.php','_self')</script>";
  } 
  else 
  {
        echo"<script>alert('Invalid Entry')</script>";
        echo "<script>window.open('my_account.php?edit_profile','_self')</script>";
  }


}

?>

<!--==========================================================================================================================================================-->    
