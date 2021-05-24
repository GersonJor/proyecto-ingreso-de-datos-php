<?php
	$database="bdgrupo";
	$user='root';
	$password='gerson13579';


try {
	
	$con=new PDO('mysql:host=localhost;dbname='.$database,$user,$password);

} catch (PDOException $e) {
	echo "Error".$e->getMessage();
}

?>