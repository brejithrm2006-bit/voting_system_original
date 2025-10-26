<?php
include('db.php');
include('header.php');
$message = "";
if(isset($_POST['signup'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $check = mysqli_query($conn,"SELECT * FROM voters WHERE email='$email'");
    if(mysqli_num_rows($check)>0){
        $message = "Email already exists!";
    } else {
        $insert = mysqli_query($conn,"INSERT INTO voters (name,email,password) VALUES ('$name','$email','$password')");
        if($insert){
            $message = "Registration successful! You can log in now.";
        } else {
            $message = "Error in registration.";
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Voter Signup</title>
<style>
body {
  background: linear-gradient(to right,  #000428,  #000428);
  color: white;
  text-align: center;
  font-family: Arial;
}
.container {
  width: 350px;
  margin: 100px auto;
  background: rgba(255,255,255,0.1);
  padding: 30px;
  border-radius: 10px;
}
input[type=text], input[type=email], input[type=password] {
  background: transparent;
  border: none;
  border-bottom: 2px solid white;
  color: white;
  padding: 10px;
  width: 80%;
  margin: 8px;
}
input[type=submit] {
  background: white;
  color: #1f4037;
  border: none;
  padding: 10px 20px;
  border-radius: 5px;
  cursor: pointer;
}
a {
  color: yellow;
}
</style>
</head>
<body>
<div class="container">
<h2>Voter Signup</h2>
<form method="POST">
<input type="text" name="name" placeholder="Full Name" required><br>
<input type="email" name="email" placeholder="Email" required><br>
<input type="password" name="password" placeholder="Password" required><br>
<input type="submit" name="signup" value="Signup">
</form>
<p><?php echo $message; ?></p>
<p>Already registered? <a href="voter_login.php">Login</a></p>
</div>
</body>
</html>
