<?php
include('db.php');
include('lower.php');
?>
<!DOCTYPE html>
<html>
<head>
<title>Manage Voters</title>
<style>
body {
    background: #000046;
    color: white;
    text-align: center;
}
table {
    width: 80%;
    margin: auto;
    border-collapse: collapse;
}
table, th, td {
    border: 1px solid white;
    padding: 10px;
}
</style>
</head>
<body>
<h2>Manage Voters</h2>
<?php
if(isset($_GET['delete'])){
    $id=$_GET['delete'];
    mysqli_query($conn,"DELETE FROM voters WHERE id=$id");
}
$result=mysqli_query($conn,"SELECT * FROM voters");
echo "<table><tr><th>ID</th><th>Name</th><th>Email</th><th>Action</th></tr>";
while($row=mysqli_fetch_assoc($result)){
    echo "<tr><td>{$row['id']}</td><td>{$row['name']}</td><td>{$row['email']}</td><td><a href='?delete={$row['id']}'>Delete</a></td></tr>";
}
echo "</table>";
?>
</body>
</html>
