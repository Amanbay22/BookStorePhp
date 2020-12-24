<?php 	
	$data = unserialize($_COOKIE['cart']);
	foreach ($data as $v1) {
    echo $v1['book_id']."</br>";
   }

 ?>