<?php
	$data = unserialize($_COOKIE['cart']);
	$check = false;
	if (is_array($values) || is_object($values)){
	foreach ($data as $v1 => $value) {
		if($value['book_id']==$_POST['book_id']){
			$check = true;
			break;
		}
	}}
	if($check==false){
	$data[]['book_id'] = $_POST['book_id'];}
	setcookie('cart', serialize($data), time()+3600);
	header('Location:/index.php');
 ?>