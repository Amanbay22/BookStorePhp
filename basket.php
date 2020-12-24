<?php

include 'db.php';

$sql = "SELECT book_id, title, price, full_name, picture_url, description, isbn, genre
FROM books 
INNER JOIN author
ON books.author_id = author.author_id;
";
$data = unserialize($_COOKIE['cart']);
  

$result = mysqli_query($conn, $sql);

?>
<!DOCTYPE html>
<html>
<head>
	<title>Basket</title>
</head>
<link rel="stylesheet" type="text/css" href="css/main.css">

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<body style="background-color: #E8E8E8	">
<body>
 <?php include 'navbar.php' ?>	

 <div class="container mt-5 books">
   
			<div class="book_list">
        <?php if(!empty($data)){
 ?>
			<div class="row text-center mb-5">
         
        
				<?php 
          if ($result->num_rows > 0) {
           while($row = $result->fetch_assoc()) {
            foreach ($data as $v1) {
              if($v1['book_id']==$row['book_id']){
   ?>			<div class="col-md-3 sm-6 mb-3">
					<a type="button" data-toggle="modal" data-target="#<?php echo substr($row['isbn'],0,7)?>">
					<img src="<?php echo $row["picture_url"]?>" alt="" class="imgShadows" style="height: 230px;"></a>
					<div class="d-flex justify-content-center price"><p><?php echo $row["price"] ?> KZT</p>
                 <form action="order.php" method="post">
                  <input type="hidden" name="book_id" value="<?php echo $row['book_id']?>"> 
                  <button type="submit" class="btn btn-secondary btn-sm" style="margin-left: 33px">Order</button>  
                  </form>      					</div>
				</div>
				<?php }}}}
  ?>
</div>
 <?php } 
 else {?>
        <div class="row text-center pb-4">
          <div class="col" style="font-size: 24px;">No books</div>
        </div>
      <?php }  ?>
			</div>
 

		</div>
<?php
	$result = mysqli_query($conn, $sql);
 if ($result->num_rows > 0) {

  while($row = $result->fetch_assoc()) {
 
   ?>
		<!-- Modal -->
<div class="modal fade" id="<?php echo substr($row['isbn'],0,7)?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg "  role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"><?php echo $row['title']; ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
        	<div class="col-md-5 text-center d-flex justify-content-center">
        		<img class="figure-img img-fluid w-100" src="<?php echo $row["picture_url"] ?>" alt="">
        		</div>
        			<div class="col-md-6 card text-left ml-1">
					  <div class="card-body">
					    <h5 class="card-title"><?php echo $row['title']; ?></h5>
					    <h6 class="card-subtitle mb-2 text-muted"><?php echo $row['full_name']; ?></h6>
					    <h6 class="card-subtitle mb-2 text-muted">ISBN: <?php echo $row['isbn']; ?></h6>
					    <h6 class="card-subtitle mb-2 text-muted">Genre: <?php echo $row['genre']; ?></h6>

					    <p class="card-text"><?php echo $row['description']; ?></p>
					  </div>
				</div>
        </div>
              </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>

</div>
  <?php }
}  $conn->close();?>	

	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>