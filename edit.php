<?php 
include 'db.php';
$id = $_GET['id'];

$sql = "SELECT  book_id, title, price, full_name, picture_url, description, isbn, genre, name
FROM books 
INNER JOIN author
ON books.author_id = author.author_id
INNER JOIN publisher
ON books.publisher_id = publisher.publisher_id
WHERE book_id = $id"; 
$sql1 = "SELECT * FROM author";
$sql2 = "SELECT * FROM publisher";

$result = mysqli_query($conn, $sql);
$result1 = mysqli_query($conn, $sql1);
$result2 = mysqli_query($conn, $sql2);

$row = $result->fetch_assoc();

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body>
<div class="container">
<form action="editData.php" method="post">
    <input type="hidden" name="id" value="">
    <div class="form-group">
        <input type="hidden" name="id" value="<?php echo $row['book_id']?>">
        <label class="col-form-label" for="title">Title: </label>
        <input class="form-control" id="title" name="title" type="text" value="<?php echo $row['title']?>"/>
    </div>
    <div class="form-group">
        <label class="col-form-label" for="description">Description: </label>
        <textarea class="form-control" id="description" name="description"><?php echo $row['description']?></textarea>
    </div>
    <div class="form-group">
        <label class="col-form-label" for="price">Price: </label>
        <input class="form-control" id="price" name="price" type="number" value="<?php echo $row['price']?>"/>
    </div>
    <div class="form-group">
        <label class="col-form-label" for="isbn">ISBN: </label>
        <input class="form-control" id="isbn" name="isbn" type="text"  value="<?php echo $row['isbn']?>"/>
    </div>
    <div class="form-group">
        <label class="col-form-label" for="pictureUrl">Picture Url: </label>
        <input class="form-control" id="pictureUrl" name="pictureUrl" type="url" value="<?php echo $row['picture_url']?>"/>
    </div>
    <div class="form-group">
        <label class="col-form-label" for="genre">Genre: </label>
        <input class="form-control" id="genre" name="genre" type="text" value="<?php echo $row['genre']?>"/>
    </div>
    <div class="form-group">
        <label class="col-form-label" for="author">Author: </label>
        <select class="form-control" id="author" name="author">
            <?php if ($result1->num_rows > 0) {

        while($row1 = $result1->fetch_assoc()) {?>
            <option value="<?php echo $row1['author_id']?>" <?php if($row1['full_name']==$row['full_name']) echo "selected";?>><?php echo $row1['full_name']?></option>
        <?php }} ?>
        </select>   
    </div>
    <div class="form-group">
        <label class="col-form-label" for="publisher">Publisher: </label>
        <select class="form-control" id="publisher" name="publisher">
            <?php if ($result2->num_rows > 0) {
        while($row2 = $result2->fetch_assoc()) {?>
            <option value="<?php echo $row2['publisher_id']?>" <?php if($row2['name']==$row['name']) echo "selected";?>><?php echo $row2['name']?></option>
        <?php }} ?>
        </select>
    </div>
    <button class="btn btn-primary" type="submit" name="save">Save</button>
</form>
    <div class="w-100 text-right mb-4" style="margin-top: -40px">
        <a href="/admin.php" class="btn btn-secondary">Back</a>
    </div>
<?php $conn->close(); ?>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>