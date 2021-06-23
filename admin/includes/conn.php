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

?>