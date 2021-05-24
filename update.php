<?php
	include_once 'conexion.php';
	// el siguiente metodo obtendremos el codigo del estudiante con el GET y luego obtendremos los datos segun el cod del alumno
	if(isset($_GET['CodAlum'])){
		$codA=(int) $_GET['CodAlum'];

		$buscar_codA=$con->prepare('SELECT * FROM alumno WHERE CodAlum=:CodAlum LIMIT 1');
		$buscar_codA->execute(array(':CodAlum'=>$codA));
		$resultado=$buscar_codA->fetch();
	}else{
		header('Location: index.php');
	}
	// el siguiente metodo enviamos los datos con el metodo POST y hacemos la consulta, finalmente actualizamos los datos
	if(isset($_POST['guardar'])){
		$nombreA=$_POST['NombreAlum'];
		$dniA=$_POST['DniAlum'];
		$direccA=$_POST['DirAlum'];
		$codA=(int) $_GET['CodAlum'];

		if(!empty($codA) && !empty($nombreA) && !empty($dniA) && !empty($direccA)){
			
				$consulta_update=$con->prepare(' UPDATE alumno SET  NomAlum=:NomAlum, DniAlum=:DniAlum, DirAlum=:DirAlum WHERE CodAlum=:CodAlum;');
				$consulta_update->execute(array(':NomAlum' =>$nombreA,':DniAlum' =>$dniA,':DirAlum' =>$direccA,':CodAlum' =>$codA,));
				header('Location: index.php');	
		}else{
			echo "<script> alert('ERROR!! Debe llenar todos los campos');</script>";
		 }
	}


?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>actulizar alumno</title>
	
	<link rel="stylesheet" type="text/css" href="https://bootswatch.com/4/lux/bootstrap.min.css">
</head>
<body>

	<div class="container p-20" style="margin-top: 20px; margin-left: 30%; ">
		<div class="row">
			<div class="col-md-5">
				<div class="card">
					<div class="card-body">
						<form id="frmtarea"  action="" method="post" >
							<div class="form-group">
								<h3 style="text-align: center;">Actualizar datos del alumno</h3>
								<h5 style="margin-top: 20px;">codigo del estudiante: </h5>
								<input readonly type="text" name="CodAlum" value="<?php if($resultado) echo $resultado['CodAlum']; ?>" class="form-control" >
								<h5 style="margin-top: 20px;">nombre del estudiante: </h5>							
								<input type="text" name="NombreAlum" placeholder="Nombre del Estudiante" value="<?php if($resultado) echo $resultado['NomAlum']; ?>" class="form-control">
							</div>
							<div class="form-group">
								<h5 style="margin-top: 20px;">numero de DNI: </h5>
								<input type="text" name="DniAlum" placeholder="Numero de DNI" value="<?php if($resultado) echo $resultado['DniAlum']; ?>" class="form-control">
								<h5 style="margin-top: 20px;">Direccion: </h5>
								<input type="text" name="DirAlum" placeholder="Direccion del Estudiante" value="<?php if($resultado) echo $resultado['DirAlum']; ?>" class="form-control">
							</div>
							<div class="col text-center btn-group">
								<a href="index.php" class="btn btn-success my-2 my-sm-0 bg-dark">Cancelar</a>
								<input type="submit" name="guardar" value="Guardar" class="btn btn-success my-2 my-sm-0 bg-success">
							</div>

						</form>
					</div>
				</div>
			</div>
		</div>
	</div>	
</body>
</html>
