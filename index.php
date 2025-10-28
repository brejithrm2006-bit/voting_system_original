<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>Online Voting System</title>
<style>
body {
    background: linear-gradient(90deg, #004e92, #000428);
    font-family: 'Arial', sans-serif;
    color: white;
    text-align: center;
}
.container {
    margin-top: 100px;
}
a {
    color: #00e6f6;
    text-decoration: none;
    padding: 10px;
}
a:hover {
    background: #00e6f6;
    color: black;
    border-radius: 5px;
}
    footer{
        color:silver;
    }
</style>
</head>
<body>
<div class="container">
<h1>Online Voting System</h1>
<p>Select your role:</p>
<a href="admin_login.php">Admin Login</a> |
<a href="voter_login.php">Voter Login</a> |
<a href="candidate_login.php">Candidate Login</a> |
<a href="results.php">Live Results</a>
</div>
    <footer>copy@ Online Voting System 2025</footer>
</body>
</html>
