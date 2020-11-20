<?php 
include 'db.php';
if(isset($_POST['Register'])){
	$full_name = mysql_escape_string($_POST['full_name']);
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$age = $_POST['age'];
	$address = mysql_escape_string($_POST['address']);
	$role = mysql_escape_string('user');
	$password = mysql_escape_string($_POST['pass']);


$result = "SELECT count(email) as email FROM user
			WHERE email = '$email'";

$result1 =  mysqli_query($conn, $result);

$row1 = $result1->fetch_assoc();

if(intval($row1['email'])>0){
	header('Location:/singin.php?err=True');
}
else{

$sql = "INSERT INTO user
( 
full_name,
age,
address,
phone,
email,
role,
password)
VALUES
('$full_name','$age','$address','$phone','$email','$role','$password');";
mysqli_query($conn, $sql);
$conn->close();
header('Location:/signup.php');
}}
if (isset($_POST['signin'])) {
	$sql = "SELECT email, password FROM user";
	$check = False;
	$result = mysqli_query($conn, $sql);
	if ($result->num_rows > 0) {
  	while($row = $result->fetch_assoc()) {
  	if($row['email']==$_POST['email'] && $row['password'] == $_POST['password']){
  		$check = True;
  		$cookie_name = 'email';
		$cookie_email = $row['email'];
		$cookie_name1 = 'password';
		$cookie_password = $row['password'];
		setcookie($cookie_name, $cookie_email, time() + (86400 * 30), "/");
		setcookie($cookie_name1, $cookie_password, time() + (86400 * 30), "/");
  		break;
  	}
  }
}
if($check){
header('Location:/index.php');
}
else{
	header('Location:/signup.php?err=True');

}
}
 ?>