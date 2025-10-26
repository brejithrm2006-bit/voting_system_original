<?php
include('db.php');
include('header.php');
session_start();
$message = "";

if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $res = mysqli_query($conn,"SELECT * FROM voters WHERE email='$email' AND password='$password'");
    if(mysqli_num_rows($res)>0){
        $row = mysqli_fetch_assoc($res);
        $_SESSION['voter_id'] = $row['id'];
        $_SESSION['voter_name'] = $row['name'];
        header("Location: voter_dashboard.php");
        exit();
    } else {
        $message = "Invalid credentials!";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Voter Login</title>
<style>
body {
  background: linear-gradient(135deg,  #000428, #5477f5);
  color: white;
  text-align: center;
  font-family: Arial;
}
.container {
  width: 350px;
  margin: 100px auto;
  padding: 30px;
  background: rgba(0,0,0,0.3);
  border-radius: 10px;
}
input {
  width: 80%;
  padding: 10px;
  background: transparent;
  border: none;
  border-bottom: 2px solid white;
  color: white;
  margin: 8px;
}
input[type=submit] {
  background: white;
  color: #5477f5;
  border: none;
  border-radius: 5px;
  padding: 10px 20px;
  cursor: pointer;
}
a {
  color: yellow;
}
</style>
</head>
<body>
<div class="container">
<h2>Voter Login</h2>
<form method="POST">
<input type="email" name="email" placeholder="Email" required><br>
<input type="password" name="password" placeholder="Password" required><br>
<input type="submit" name="login" value="Login">
</form>
<p><?php echo $message; ?></p>
<p>Don't have an account? <a href="voter_signup.php">Sign up here</a></p>
</div>
</body>
</html>
