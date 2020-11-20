<?php 
include 'db.php';
$id = $_POST['id'];
$sql = "DELETE FROM books
WHERE book_id = $id;";
$result1 = mysqli_query($conn, $sql);
$conn->close();
header('Location:/admin.php');

 ?>
