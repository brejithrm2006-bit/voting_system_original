<?php
include('db.php');
$result = mysqli_query($conn, "SELECT c.name, COUNT(v.id) AS total_votes FROM votes v JOIN candidates c ON v.candidate_id=c.id GROUP BY c.name ORDER BY total_votes DESC");
?>
<!DOCTYPE html>
<html>
<head>
<title>Live Results</title>
<style>
body {
    background: linear-gradient(to right, #283048, #859398);
    color: white;
    text-align: center;
    font-family: Arial, sans-serif;
}
table {
    width: 70%;
    margin: 40px auto;
    border-collapse: collapse;
    background: rgba(255,255,255,0.1);
}
table, th, td {
    border: 1px solid white;
    padding: 10px;
}
</style>
</head>
<body>
<h2>Live Voting Results</h2>
<table>
<tr><th>Candidate</th><th>Total Votes</th></tr>
<?php
while($r=mysqli_fetch_assoc($result)){
    echo "<tr><td>{$r['name']}</td><td>{$r['total_votes']}</td></tr>";
}
?>
</table>
</body>
</html>
