<?php
include('db.php');
include('lower.php');
?>
<!DOCTYPE html>
<html>
<head>
<title>Manage Candidates</title>
<style>
body {
    background: #000046;
    color: white;
    text-align: center;
}
table {
    border-collapse: collapse;
    width: 80%;
    margin: 20px auto;
}
table, th, td {
    border: 1px solid white;
    padding: 10px;
}
</style>
</head>
<body>
<h2>Manage Candidates</h2>
<?php
if(isset($_GET['approve'])){
    mysqli_query($conn, "UPDATE candidates SET approved=1 WHERE id={$_GET['approve']}");
}
if(isset($_GET['delete'])){
    mysqli_query($conn, "DELETE FROM candidates WHERE id={$_GET['delete']}");
}
$res = mysqli_query($conn, "SELECT * FROM candidates");
echo "<table><tr><th>ID</th><th>Name</th><th>Email</th><th>Approved</th><th>Action</th></tr>";
while($row = mysqli_fetch_assoc($res)){
    echo "<tr><td>{$row['id']}</td><td>{$row['name']}</td><td>{$row['email']}</td><td>" . ($row['approved']?'Yes':'No') . "</td>";
    echo "<td><a href='?approve={$row['id']}'>Approve</a> | <a href='?delete={$row['id']}'>Delete</a></td></tr>";
}
echo "</table>";
?>
</body>
</html>
