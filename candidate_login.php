<?php
include('db.php');
include('header.php');
session_start();
$message = "";
if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $res = mysqli_query($conn,"SELECT * FROM candidates WHERE email='$email' AND password='$password'");
    if(mysqli_num_rows($res)>0){
        $row = mysqli_fetch_assoc($res);
        if($row['approved']==1){
            $_SESSION['candidate_id']=$row['id'];
            $_SESSION['candidate_name']=$row['name'];
            header("Location: candidate_dashboard.php");
            exit();
        } else {
            $message = "Wait for admin approval!";
        }
    } else {
        $message = "Invalid credentials!";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Candidate Login</title>
<style>
body {
  background: linear-gradient(to right, #000428,  #000428);
  font-family: 'Arial';
  text-align: center;
  color: white;
}
.container {
  background: rgba(255,255,255,0.2);
  width: 350px;
  margin: 100px auto;
  padding: 30px;
  border-radius: 10px;
}
input[type=email], input[type=password] {
  width: 90%;
  padding: 10px;
  margin: 10px 0;
  background: transparent;
  color: white;
  border: none;
  border-bottom: 2px solid white;
}
input[type=submit] {
  padding: 10px 20px;
  background: white;
  border: none;
  color: #ff416c;
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
<h2>Candidate Login</h2>
<form method="POST">
<input type="email" name="email" placeholder="Email" required><br>
<input type="password" name="password" placeholder="Password" required><br>
<input type="submit" name="login" value="Login">
</form>
<p><?php echo $message; ?></p>
<p>Don't have an account? <a href="candidate_signup.php">Signup here</a></p>
</div>
</body>
</html>
