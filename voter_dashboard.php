<?php
session_start();
if(!isset($_SESSION['voter_id'])){
    header("Location: voter_login.php");
    exit();
}
$voter_name = $_SESSION['voter_name'];
?>
<!DOCTYPE html>
<html>
<head>
<title>Voter Dashboard</title>
<style>
body {
  background: linear-gradient(to right, #141E30, #243B55);
  color: white;
  text-align: center;
  font-family: 'Verdana';
}
a {
  text-decoration: none;
  background: white;
  color: #243B55;
  padding: 10px 20px;
  margin: 15px;
  border-radius: 5px;
  display: inline-block;
}
a:hover {
  background: #00bcd4;
  color: white;
}
</style>
</head>
<body>
<h2>Welcome, <?php echo $voter_name; ?></h2>
<p>Select an option below:</p>
<a href="vote.php">Cast Your Vote</a>
<a href="results.php">View Live Results</a>
<a href="logout.php">Logout</a>
</body>
</html>
