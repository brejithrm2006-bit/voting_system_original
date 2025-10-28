<?php
include('db.php');
session_start();
if(!isset($_SESSION['voter_id'])){
    header("Location: voter_login.php");
    exit();
}
$voter_id = $_SESSION['voter_id'];

// Check if user has voted
$check_vote = mysqli_query($conn,"SELECT * FROM votes WHERE voter_id='$voter_id'");
if(mysqli_num_rows($check_vote)>0){
    $msg = "You have already voted!";
    $voted = true;
} else {
    $voted = false;
}

// Cast a vote
if(isset($_POST['candidate_id'])){
    $cid = $_POST['candidate_id'];
    mysqli_query($conn,"INSERT INTO votes (voter_id,candidate_id,poll_id) VALUES ('$voter_id','$cid',1)");
    $msg = "Vote cast successfully!";
    $voted = true;
}
$candidates = mysqli_query($conn,"SELECT * FROM candidates WHERE approved=1");
?>
<!DOCTYPE html>
<html>
<head>
<title>Cast Your Vote</title>
<style>
body {
  background: linear-gradient(to right, #56ab2f, #a8e063);
  text-align: center;
  color: white;
  font-family: Arial;
}
table {
  margin: auto;
  width: 70%;
  border-collapse: collapse;
}
th, td {
  border: 1px solid white;
  padding: 10px;
}
input[type=submit] {
  background: white;
  color: #56ab2f;
  padding: 8px 15px;
  border: none;
  border-radius: 5px;
}
footer{
    color:silver;
}
</style>
</head>
<body>
<h2>Vote for Your Candidate</h2>
<?php if(isset($msg)) echo "<p>$msg</p>"; ?>
<?php if(!$voted){ ?>
<form method="POST">
<table>
<tr><th>Candidate Name</th><th>Position</th><th>Action</th></tr>
<?php while($row = mysqli_fetch_assoc($candidates)){ ?>
<tr>
<td><?php echo $row['name']; ?></td>
<td><?php echo $row['position']; ?></td>
<td><button type="submit" name="candidate_id" value="<?php echo $row['id']; ?>">Vote</button></td>
</tr>
<?php } ?>
</table>
</form>
<?php } else { ?>
<p>Thank you, your vote has been recorded.</p>
<?php } ?>
<a href="voter_dashboard.php">Back to Dashboard</a>
<footer>copy@ Online Voting System 2025</footer>
</body>
</html>
