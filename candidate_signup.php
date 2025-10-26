<?php
include('db.php');
include('header.php');
$message = "";
if(isset($_POST['signup'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $position = $_POST['position'];
    $password = $_POST['password'];

    $check = mysqli_query($conn,"SELECT * FROM candidates WHERE email='$email'");
    if(mysqli_num_rows($check)>0){
        $message = "Email already exists!";
    } else {
        $insert = mysqli_query($conn,"INSERT INTO candidates (name,email,position,password,approved) VALUES ('$name','$email','$position','$password',0)");
        if($insert){
            $message = "Account created! Wait for admin approval.";
        } else {
            $message = "Error in registration!";
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Candidate Signup</title>
<style>
body {
  background: linear-gradient(45deg, #000428, #185a9d);
  font-family: 'Verdana';
  text-align: center;
  color: white;
}
.container {
  width: 350px;
  background: rgba(255,255,255,0.1);
  margin: 100px auto;
  padding: 30px;
  border-radius: 10px;
}
input[type=text], input[type=email], input[type=password] {
  width: 90%;
  padding: 10px;
  margin: 8px 0;
  border: none;
  border-bottom: 2px solid white;
  background: transparent;
  color: white;
}
input[type=submit] {
  background: white;
  color: #185a9d;
  padding: 10px 20px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}
a {
  color: yellow;
  text-decoration: none;
}
</style>
</head>
<body>
<div class="container">
<h2>Candidate Signup</h2>
<form method="POST">
<input type="text" name="name" placeholder="Full Name" required><br>
<input type="email" name="email" placeholder="Email" required><br>
<input type="text" name="position" placeholder="Position Applying For" required><br>
<input type="password" name="password" placeholder="Password" required><br>
<input type="submit" name="signup" value="Signup">
</form>
<p><?php echo $message; ?></p>
<p>Already registered? <a href="candidate_login.php">Login here</a></p>
</div>
</body>
</html>
