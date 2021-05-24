<?php 

	include_once 'conexion.php';
	if(isset($_GET['CodAlum'])){
		$codA=(int) $_GET['CodAlum'];
		$delete=$con->prepare('DELETE FROM alumno WHERE CodAlum=:CodAlum');
		$delete->execute(array(
			':CodAlum'=>$codA
		));
		header('Location: index.php');
	}else{
		header('Location: index.php');
	}
 ?>