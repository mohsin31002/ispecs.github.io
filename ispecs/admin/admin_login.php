<?php
session_start();
include("conn.php");
?>


<!DOCTYPE html>
<html>
<head>
    <title>ispecs</title>
    <link rel="icon" type="image/ico" href="img/specs.png">
    <link rel="stylesheet" href="login_style.css">
</head>
<body>
<div class="header">
    <h2>Admin Login</h2>
</div>
<form action="admin_login_verify.php" method="POST">

    <div class="input-group">
        <label>Username</label>
        <input type="text" name="username">
    </div>

    <div class="input-group">
        <label>Password</label>
        <input type="password" name="password">
    </div>

    <div class="input-group">
        <button type="submit" class="btn" name="login"><b>Login</b></button>
    </div>
</form>
</body>
</html>


