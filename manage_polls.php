<?php
include('db.php');
include('lower.php');
?>
<!DOCTYPE html>
<html>
<head>
<title>Manage Polls</title>
<style>
body {
    background: #2c3e50;
    color: white;
    text-align: center;
}
table {
    margin: 30px auto;
    border-collapse: collapse;
    width: 80%;
}
table, th, td {
    border: 1px solid white;
    padding: 10px;
}
input[type=text], input[type=submit] {
    padding: 10px;
}
</style>
</head>
<body>
<h2>Manage Polls</h2>
<form method="POST">
<input type="text" name="poll_title" placeholder="Enter Poll Title">
<input type="submit" name="add_poll" value="Add Poll">
</form>

<?php
if(isset($_POST['add_poll'])){
    $title = $_POST['poll_title'];
    mysqli_query($conn, "INSERT INTO polls (title,status) VALUES ('$title','open')");
}
if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM polls WHERE id=$id");
}
$result = mysqli_query($conn, "SELECT * FROM polls");
echo "<table><tr><th>ID</th><th>Title</th><th>Status</th><th>Action</th></tr>";
while($row = mysqli_fetch_assoc($result)){
    echo "<tr><td>{$row['id']}</td><td>{$row['title']}</td><td>{$row['status']}</td><td><a href='?delete={$row['id']}'>Delete</a></td></tr>";
}
echo "</table>";
?>
</body>
</html>
