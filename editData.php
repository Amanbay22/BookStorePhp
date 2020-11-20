<?php include 'db.php';

if(isset($_POST['save'])){
	$id = $_POST['id'];
	$title = mysql_escape_string($_POST['title']);
	$description =  mysql_escape_string($_POST['description']);
	$price = $_POST['price'];
	$isbn = $_POST['isbn'];
	$pictureUrl = $_POST['pictureUrl'];
	$genre = $_POST['genre'];
	$author = $_POST['author'];
	$publisher = $_POST['publisher'];

$sql = "UPDATE books
SET
title = '$title',
price = '$price',
picture_url = '$pictureUrl',
isbn = '$isbn',
genre = '$genre',
description = '$description',
author_id = '$author',
publisher_id = '$publisher'

WHERE book_id = $id";
mysqli_query($conn, $sql);
$conn->close();
header('Location:/admin.php');
}
 ?>
