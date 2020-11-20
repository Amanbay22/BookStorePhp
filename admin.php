<?php include 'db.php';


$sql = "SELECT book_id, title, price, full_name, picture_url, description
FROM books 
INNER JOIN author
ON books.author_id = author.author_id;
";
$sql1 = "SELECT * FROM author";
$sql2 = "SELECT * FROM publisher";

$result1 = mysqli_query($conn, $sql1);
$result2 = mysqli_query($conn, $sql2);


$result = mysqli_query($conn, $sql);



 ?>

<!DOCTYPE html>
<html>
<head>
    <title>Home page</title>
    <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">

    <link crossorigin="anonymous"
          href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
          rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
            type="text/javascript"></script>
    <script crossorigin="anonymous"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
            src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" type="text/javascript"></script>
    <script crossorigin="anonymous"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" type="text/javascript"></script>

</head>
<body >
<table class="table">


    <div class="breadcrumb">
        <div class="col">
            <span>List of all Books</span>
        </div>
        <div class="col col-lg-2">
            <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#example1Modal">
                + ADD NEW
            </button>
        </div>
    </div>
    <thead>
    <tr>
        <th style="width: 480px">Book Name</th>
        <th style="width: 320px">Book Author</th>
        <th style="width: 320px">Book Price</th>
        <th >OPERATION</th>
    </tr>
    </thead>
    <tbody>
        <?php if ($result->num_rows > 0) {

  while($row = $result->fetch_assoc()) {
   
   ?>   
        <tr>
            
            <td><?php echo $row['title']; ?></td>
            <td><?php echo $row['full_name']?></td>
            <td><?php echo $row['price']?></td>

            <td>
                <a class="btn btn-primary" href="edit.php?id=<?php echo $row['book_id'] ?>">Edit</a>
                <form action="delete.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $row['book_id']; ?>">
                    <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
    <?php }} ?>
    </tbody>
</table>

<div class="myForm">
    <form action="add.php" method="post">
        <div aria-hidden="true" aria-labelledby="example1ModalLabel" class="modal fade"
             id="example1Modal" role="dialog"
             tabindex="-1">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="example1ModalLabel">Add new</h5>
                        <button aria-label="Close" class="close" data-dismiss="modal"
                                type="button">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                       <input type="hidden" name="id" value="">
    <div class="form-group">
        <label class="col-form-label" for="title">Title: </label>
        <input class="form-control" id="title" name="title" type="text" value=""/>
    </div>
    <div class="form-group">
        <label class="col-form-label" for="description">Description: </label>
        <textarea class="form-control" id="description" name="description"></textarea>
    </div>
    <div class="form-group">
        <label class="col-form-label" for="price">Price: </label>
        <input class="form-control" id="price" name="price" type="number" value=""/>
    </div>
    <div class="form-group">
        <label class="col-form-label" for="isbn">ISBN: </label>
        <input class="form-control" id="isbn" name="isbn" type="text"  value=""/>
    </div>
    <div class="form-group">
        <label class="col-form-label" for="pictureUrl">Picture Url: </label>
        <input class="form-control" id="pictureUrl" name="pictureUrl" type="url" value="">
    </div>
    <div class="form-group">
        <label class="col-form-label" for="genre">Genre: </label>
        <input class="form-control" id="genre" name="genre" type="text" value=""/>
    </div>
    <div class="form-group">
        <label class="col-form-label" for="author">Author: </label>
        <select class="form-control" id="author" name="author">
            <?php if ($result1->num_rows > 0) {
        while($row1 = $result1->fetch_assoc()) {?>
            <option value="<?php echo $row1['author_id']?>"><?php echo $row1['full_name']?></option>
        <?php }} ?>
        </select>   
    </div>
    <div class="form-group">
        <label class="col-form-label" for="publisher">Publisher: </label>
        <select class="form-control" id="publisher" name="publisher">
            <?php if ($result2->num_rows > 0) {
        while($row2 = $result2->fetch_assoc()) {?>
            <option value="<?php echo $row2['publisher_id']?>"><?php echo $row2['name']?></option>
        <?php }} ?>
        </select>
    </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-dismiss="modal"
                                type="button">Close
                        </button>
                        <input class="btn btn-primary" type="submit" name= "Add" value="Add"/>
                        </div>
                </div>
            </div>
        </div>
    </form>
</div>

<?php $conn->close(); ?>

</body>
</html>