<?php

include 'db.php';



$search = $_GET['search'];
$genre = $_GET['genre'];
$publisher = $_GET['publisher'];

$sql = "SELECT book_id, title, price, full_name, picture_url, description, isbn, genre, publisher.name
FROM books 
INNER JOIN author
ON books.author_id = author.author_id
INNER JOIN publisher
on books.publisher_id = publisher.publisher_id
WHERE title LIKE '%$search%' AND genre LIKE '%$genre%' AND publisher.name LIKE '%$publisher%';
";
	
$sql1 = "SELECT DISTINCT  genre FROM books";
$sql2 = "SELECT DISTINCT  name FROM publisher";

$result = mysqli_query($conn, $sql);
$result1 = mysqli_query($conn, $sql1);
$result2 = mysqli_query($conn, $sql2);

?>
	<!DOCTYPE html>
	<html>
	<head>
		<title></title>
	</head>
	<link rel="stylesheet" type="text/css" href="css/main.css">

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<body style="background-color: #E8E8E8	">
	
	<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #000000">
			<a class="navbar-brand" href="#">
    <img src="images/Logo3.png" width="150px" alt="" style="margin-top: -10px;">
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
  	 <form class="form-inline my-2 my-lg-0 ml-5" style="width: 70%" action="search.php" method="GET">
      <input class="form-control mr-sm-4 w-75" type="search" placeholder="Search" name="search" value="<?php echo $search?>">
      <button class="btn btn-outline-light	my-2 my-sm-0" type="submit">Search</button>
    </form>
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="signup.php">Log In</a>
      </li>
       <li class="nav-item active">
        <a class="nav-link" href="contact.php">Contact us</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Card</a>
      </li>     
    </ul>
  </div>
</nav>	
<div class="row">
	<div class="col-md-3 mt-4">
		<div class="card">
        <div class="card-body pt-2" style="background: #156145; color: white; height: 45px;">
            <h5 class="card-title">Genres: </h5>
        </div>
        <ul class="list-group list-group-flush" style="font-weight: bold" >
           <?php if ($result1->num_rows > 0) {

  while($row1 = $result1->fetch_assoc()) {
   
   ?>
   	            <li class="list-group-item"><a href="/search.php?search=<?php echo $search ?>&genre=<?php echo $row1['genre']?>"><?php echo $row1['genre']; ?></a></li>

    <?php }}
     ?>
        </ul>
    </div>
    <div class="card mt-4">
        <div class="card-body pt-2" style="background: #156145;color: white; height: 45px; font-size: 15px;">
            <h5 class="card-title">Publishers: </h5>
        </div>
        <ul class="list-group list-group-flush" style="font-weight: bold">
            <?php if ($result2->num_rows > 0) {

 			 while($row2 = $result2->fetch_assoc()) {	?>

   	            <li class="list-group-item"><a href="/search.php?search=<?php echo $search ?>&genre=<?php echo $genre?>&publisher=<?php echo $row2['name']?>"><?php echo $row2['name']; ?></a></li>

    <?php }}
     ?>
            
        </ul>
    </div>

</div>
<div class="col-md-9 mt-4">
			<div class="book_list">
			<div class="row text-center mb-5">
				<?php if ($result->num_rows > 0) {

  while($row = $result->fetch_assoc()) {
   
   ?>			<div class="col-md-3 sm-6 mb-3">
					<a type="button" data-toggle="modal" data-target="#<?php echo substr($row['title'],0,3)?>">
					<img src="<?php echo $row["picture_url"]?>" alt="" class="imgShadows" style="height: 230px;"></a>
					<div class="d-flex justify-content-center price"><p><?php echo $row["price"] ?> KZT</p>
						<a >
					<img src="images/basket.png" alt="" style="margin-left: 40px" class="basket"></a></div>
				</div>
				<?php }
}  ?>
</div>
			</div>

		</div>
		</div>
<?php
	$result = mysqli_query($conn, $sql);
 if ($result->num_rows > 0) {

  while($row = $result->fetch_assoc()) {
 
   ?>
		<!-- Modal -->
<div class="modal fade" id="<?php echo substr($row['title'],0,3)?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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