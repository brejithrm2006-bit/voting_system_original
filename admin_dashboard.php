<?php
session_start();
if(!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Admin Dashboard</title>
<style>
body {
    background: linear-gradient( #000428, #4A00E0);
    color: white;
    text-align: center;
    font-family: Arial, sans-serif;
}
a {
    display: inline-block;
    margin: 20px;
    padding: 15px 25px;
    background: white;
    color: #4A00E0;
    border-radius: 5px;
    text-decoration: none;
    transition: 0.3s;
}
a:hover {
    background: #4A00E0;
    color: white;
}
</style>
</head>
<body>
<h1>Welcome, Admin (Brejith R Mathew)</h1>
<a href="manage_polls.php">Manage Polls</a>
<a href="manage_candidates.php">Manage Candidates</a>
<a href="manage_voters.php">Manage Voters</a>
<a href="results.php">View Live Results</a>
<br><br>
<a href="logout.php">Logout</a>
</body>
</html>
