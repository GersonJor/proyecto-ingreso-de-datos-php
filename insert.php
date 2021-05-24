<?php 
	include_once 'conexion.php';
	// en elsiguiente metodo enviamos los datos colocados por el usuario y luego hacemos una verificacion si en caso algun campo este vacio mandaremos un mensajo de "error de registras los datos"
	if(isset($_POST['guardar'])){
		$codA=$_POST['CodAlum'];
		$nombreA=$_POST['NomAlum'];
		$dniA=$_POST['DniAlum'];
		$direccA=$_POST['DirAlum'];
		

		if(!empty($codA) && !empty($nombreA) && !empty($dniA) && !empty($direccA)){
			
			$consulta_insert=$con->prepare('INSERT INTO alumno(CodAlum,NomAlum,DniAlum,DirAlum) VALUES(:CodAlum,:NomAlum,:DniAlum,:DirAlum)');
			$consulta_insert->execute(array(':CodAlum' =>$codA,':NomAlum' =>$nombreA,':DniAlum' =>$dniA,':DirAlum' =>$direccA,));
			header('Location: index.php');	
		}else{
			echo "<script> alert('ERROR!  Debe llenar todos los campos ');</script>";
		}

	}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Nuevo Alumno</title>
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
								<h3 style="text-align: center;">Registrar nuevo Alumno</h3>
								<h5 style="margin-top: 20px;">codigo del estudiante: </h5>
								<input type="text" name="CodAlum" placeholder="Cod de alumno" class="form-control" >
								<h5 style="margin-top: 20px;">nombre del estudiante: </h5>							
								<input type="text" name="NomAlum" placeholder="Nombres" class="form-control">
							</div>
							<div class="form-group">
								<h5 style="margin-top: 20px;">numero de DNI: </h5>
								<input type="number" name="DniAlum" placeholder="DNI" class="form-control">
								<h5 style="margin-top: 20px;">Direccion: </h5>
								<input type="text" name="DirAlum" placeholder="Dirrección" class="form-control">
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
