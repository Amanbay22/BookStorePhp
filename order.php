<?php 
include 'db.php';
$sql = "SELECT user_id FROM user WHERE email = "."'".$_COOKIE['email']."'";


$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    $data = $row['user_id'];
  }
} else {
  echo "0 results";

}
$data = unserialize($_COOKIE['cart']);

$book_id = $_POST['book_id'];
foreach ($data as $v1=>$subArray){
	if($subArray['book_id']==$book_id){
		unset($data[$v1]);
	}
}

setcookie('cart', serialize($data), time()+3600);
header('Location:/basket.php');
 ?>