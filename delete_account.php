<form action="" method="POST">



<table width="500" style="margin:70px; margin-left: 150px;">
	<tr Align="center">
		<td>
			<input type="submit" name="yes" value="Yes, I Want to Delete"/>
			<input type="submit" name="no" value="No, I Don't Want to Delete"/>
		</td>
	</tr>
</table>	
</form>

<?php
include("conn.php");
$c=$_SESSION['email'];
if(isset($_POST['yes']))
{
	$delete_customer="delete from signup where email='$c'";
	$run_delete=mysqli_query($conn,$delete_customer);

	if($run_delete)
	{
		session_destroy();
		echo "<script>alert('Your Account has been deleted')</script>";
		echo "<script>window.open('index.php','_self')</script>";
	}
}

if(isset($_POST['no']))
{

		echo "<script>window.open('my_account.php','_self')</script>";
	
}
?>