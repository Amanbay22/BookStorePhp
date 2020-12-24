<?php include 'db.php';

if(isset($_POST['Add'])){
	$id = $_POST['id'];
	$title = mysql_escape_string($_POST['title']);
	$description =  mysql_escape_string($_POST['description']);
	$price = $_POST['price'];
	$isbn = $_POST['isbn'];
	$pictureUrl = $_POST['pictureUrl'];
	$genre = $_POST['genre'];
	$author = $_POST['author'];
	$publisher = $_POST['publisher'];

$sql = "INSERT INTO books
( 
title,
price,
picture_url,
isbn,
genre,
description,
publisher_id,
author_id)
VALUES
('$title','$price','$pictureUrl','$isbn','$genre','$description','$publisher','$author');";
mysqli_query($conn, $sql);

$conn->close();
header('Location:/admin.php');
}
 ?>
