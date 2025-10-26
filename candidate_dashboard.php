<?php
session_start();
include('db.php');
if(!isset($_SESSION['candidate_id'])){
    header("Location: candidate_login.php");
    exit();
}
$candidate_id = $_SESSION['candidate_id'];
$candidate_name = $_SESSION['candidate_name'];

// Get vote count
$res = mysqli_query($conn,"SELECT COUNT(id) as count FROM votes WHERE candidate_id='$candidate_id'");
$data = mysqli_fetch_assoc($res);
$total_votes = $data['count'];
?>
<!DOCTYPE html>
<html>
<head>
<title>Candidate Dashboard</title>
<style>
body {
  background: linear-gradient(120deg, #1f4037,  #000428);
  font-family: 'Verdana';
  color: white;
  text-align: center;
}
.container {
  width: 400px;
  margin: 100px auto;
  background: rgba(0,0,0,0.3);
  padding: 30px;
  border-radius: 10px;
}
a {
  display: inline-block;
  margin: 20px;
  padding: 10px 20px;
  background: white;
  color: #1f4037;
  text-decoration: none;
  border-radius: 5px;
}
a:hover {
  background: #16a085;
  color: white;
}
</style>
</head>
<body>
<div class="container">
<h2>Welcome, <?php echo $candidate_name; ?></h2>
<h3>Your Vote Count: <?php echo $total_votes; ?></h3>
<a href="results.php">View Live Results</a>
<a href="logout.php">Logout</a>
</div>
</body>
</html>
