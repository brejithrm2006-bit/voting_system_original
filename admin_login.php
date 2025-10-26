<?php
session_start();
$admin_username = "brejithrm2006";
$admin_password = "qw1988qw1988";

if(isset($_POST['login'])){
    if($_POST['username']==$admin_username && $_POST['password']==$admin_password){
        $_SESSION['admin'] = $admin_username;
        header("Location: admin_dashboard.php");
        exit();
    } else {
        $error = "Invalid login credentials!";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Admin Login</title>
<style>
body {
    background: linear-gradient(to right,  #000428, #022206ff);
    color: white;
    text-align: center;
    font-family: Arial, sans-serif;
}
form {
    margin-top: 150px;
}
input[type=text], input[type=password] {
    width: 250px;
    padding: 10px;
    margin: 10px;
    border: none;
    border-bottom: 2px solid white;
    background: transparent;
    color: white;
}
input[type=submit] {
    background: white;
    border: none;
    color: #dd2476;
    padding: 10px 20px;
    cursor: pointer;
    border-radius: 5px;
}
</style>
</head>
<body>
<h2>Admin Login</h2>
<form method="POST">
<input type="text" name="username" placeholder="Username" required><br>
<input type="password" name="password" placeholder="Password" required><br>
<input type="submit" name="login" value="Login">
</form>
<p style="color:yellow;"><?php if(isset($error)) echo $error; ?></p>
</body>
</html>
