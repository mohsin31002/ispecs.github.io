
<!--=================================================================-->
<?php

    include("conn.php");
    error_reporting(0);
    $id = $_REQUEST['id'];
    $query = "select * from signup where id = '$id'";
    $result=mysqli_query($conn,$query);   
     while($row = $result->fetch_assoc()) 
     {
        $id = $row["id"];
        $firstname = $row["firstname"];
        $lastname = $row["lastname"];
        $email = $row["email"];
        $password = $row["password"];
        $confirmpassword = $row["cpassword"];
        $mobile = $row["mobile"];
        $address = $row["address"];
        $country = $row["country"];
        $city = $row["city"];

        }
    if($_POST)
      {
        $firstname = $_POST["firstname"];
        $lastname = $_POST["lastname"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $confirmpassword = $_POST["cpassword"];
        $mobile = $_POST["mobile"];
        $address = $_POST["address"];
        $country = $_POST["country"];
        $city = $_POST["city"];

        $sql = "UPDATE signup SET firstname='$firstname' , lastname='$lastname', email='$email', password='$password', confirmpassword='$cpassword', mobile='$mobile', address='$address', country='$country', city='$city' WHERE id= '$id'";
  
        if ($conn->query($sql) === TRUE) 
        {
        echo"<script>alert('Record Updated Successfully')</script>";
        echo "<script>window.open('manage_users.php','_self')</script>";
        } 
      else 
        {
        echo"<script>alert('Record Updated Successfully')</script>";
        echo "<script>window.open('manage_users.php','_self')</script>";
        }
      } 

    ?>  


<!--=================================================================-->







<!DOCTYPE html>
<html lang="en">
<head>
    <title>ispecs</title>
    <link rel="icon" type="image/ico" href="img/specs.png">
    <link rel="stylesheet" href="dashboard_style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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
    <link rel="stylesheet" href="../css/owl.carousel.css">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../css/responsive.css">

</head>
<body>
	<div class="topbar">
		<h2 style="text-align: center;padding-top: 20px">Admin Panel</h2>
	</div>

<div class="sidenav">
  <a href="dashboard.php" style="text-decoration: none;"><i class="fa fa-fw fa-home"></i>&nbsp;&nbsp;&nbsp;&nbsp;Dashboard</a>
  <a href="insert_product.php" style="text-decoration: none;"><i class="fa fa-fw fa-edit"></i>&nbsp;&nbsp;&nbsp;&nbsp;Add Product</a>
    <a href="product_list.php" style="text-decoration: none;"><i class="fa fa-fw fa-edit"></i>&nbsp;&nbsp;&nbsp;&nbsp;Product List</a>
  <a href="orders.php" style="text-decoration: none;"><i class="fa fa-fw fa-edit"></i>&nbsp;&nbsp;&nbsp;&nbsp;Orders</a>
  <a href="manage_users.php" style="text-decoration: none;"><i class="fa fa-fw fa-edit"></i>&nbsp;&nbsp;&nbsp;&nbsp;Manage Users</a>
  <div class="logout"><a href="logout.php" style="text-decoration: none;"><i class="fa fa-fw fa-sign-out"></i>&nbsp;&nbsp;&nbsp;&nbsp;Logout</a></div>
</div>

<div class="main">
  <h2 style="margin-left: 450px; margin-top: 20px;">Update User</h2>


</div>    
<!--=============================================================== SignUp Form ===============================================================================--> 


    <div class="container" >

      <div id="login" style="border:3px; border-style:solid; border-color:#1abc9c; padding: 40px; margin: 20px; margin-left: 370px;margin-right: 370px;">

        <form action="" method="post" >

          <fieldset class="clearfix">

                <input type="text" name="firstname" value="<?php echo $firstname; ?>" pattern="[A-Za-z].{2,}" title="Please Enter 3 or more Character Values" placeholder="First Name" style = "width: 270px; margin-left: 20px; margin-top: 1px;" required>

                <input type="text" name="lastname" value="<?php echo $lastname; ?>"  pattern="[A-Za-z].{2,}" title="Please Enter 3 or more Character Values" placeholder="Last Name" style = "width: 270px; margin-left: 20px; margin-top: 10px;" required>

                <input type="email" name="email" value="<?php echo $email; ?>"  placeholder="Email" style = "width: 270px; margin-left: 20px; margin-top: 10px;" required>

                <input type="password" name="password" value="<?php echo $password; ?>" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" placeholder="Password" style = "width: 270px; margin-left: 20px; margin-top: 10px;" required>

                <input type="password" name="cpassword" value="<?php echo $confirmpassword; ?>" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" placeholder="Confirm Password" style = "width: 270px; margin-left: 20px; margin-top: 10px;" required>

                <input type="text" name="mobile" value="<?php echo $mobile; ?>"  pattern="[0-9].{10}" title="Incorrect Number Pattern. Please Enter 11 Digits Only." placeholder="Mobile Number" style = "width: 270px; margin-left: 20px; margin-top: 10px;" required>
                      
                <input type="text" name="address" value="<?php echo $address; ?>"  placeholder="Permanent Address" style = "width: 270px; margin-left: 20px; margin-top: 10px;" required>

            <select name="country" style = "width: 270px; margin-left: 20px; margin-top: 10px;" required>
                <option>&nbsp;&nbsp;Select Country</option>
                <option>Pakistan</option>
                <option>Australia</option>
                <option>Canada</option>
                <option>USA</option>
            </select>

                <input type="text" name="city" value="<?php echo $city; ?>"  placeholder="City" style = "width: 270px; margin-left: 20px; margin-top: 10px;" required>
  
          <input type="submit" class="btn" name="update_user" value="UPDATE USER" style = "width: 270px; margin-left: 20px; margin-top: 10px;">

          </fieldset>
          

       



<?php


if(isset($_POST['update_user']))
{
$firstname=$_POST['firstname'];
$lastname=$_POST['lastname'];
$email=$_POST['email'];
$password=$_POST['password'];
$cpassword=$_POST['cpassword'];
$mobile=$_POST['mobile'];
$address=$_POST['address'];
$country=$_POST['country'];
$city=$_POST['city'];
$id=$_GET['id'];
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

$sql = "UPDATE signup SET firstname='$firstname' , lastname='$lastname', email='$email', password='$cpassword', cpassword='$cpassword', mobile='$mobile', address='$address', country='$country', city='$city' WHERE id=$id ";

if ($conn->query($sql) === TRUE) 
  {
        echo"<script>alert('Record Successfully Updated ')</script>";
        echo "<script>window.open('manage_users.php','_self')</script>";
  } 
else 
  {
        echo"<script>alert('Invalid Entry')</script>";
        echo "<script>window.open('admin/update_user.php','_self')</script>";
  }

$conn->close();
}

?>
 
 </form>

      </div> 

    </div>

  </body>
</html>