<?php
	// conexion a nuestra base de datos 
	include_once 'conexion.php';

	$sentencia_select=$con->prepare('SELECT *FROM alumno ORDER BY CodAlum ASC');
	$sentencia_select->execute();
	$resultado=$sentencia_select->fetchAll();
	
	//  metodo para buscar los datos de nuestra base de datos
	if(isset($_POST['btn_buscar'])){
		$buscar_text=$_POST['buscar'];
		$select_buscar=$con->prepare('SELECT *FROM alumno WHERE CodAlum LIKE :campo;'
		);

		$select_buscar->execute(array(
			':campo' =>"%".$buscar_text."%"
		));

		$resultado=$select_buscar->fetchAll();

	}

?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Inicio</title>
	
	<link rel="stylesheet" type="text/css" href="https://bootswatch.com/4/lux/bootstrap.min.css">
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="margin-bottom: 20px;">	
		<a href="#" class="navbar-brand">REGISTRO </a>
		<ul class="navbar-nav ml-auto">
			<form class="form-inline my-2 my-lg-0" action=""  method="post">
				<input type="search" id="buscar" name="buscar"  class="form-control mr-sm-5" placeholder="Buscar Alumno"
				value="<?php if(isset($buscar_text)) echo $buscar_text; ?>">
				<input type="submit" class="btn btn-success my-2 my-sm-0 bg-danger" name="btn_buscar" value="Buscar">
			</form>

		</ul>
	</nav>
	<div class= "col-md-10 container p-10 " style="margin-bottom: 20px;">
		<div class="col text-center btn-group">
		
			<a href="profesor.php" class="btn btn-info ">Profesor</a>
			<a href="index.php" class="btn btn-success my-2 my-sm-0">Alumnos</a>
		</div>	
	</div>

	<div class="container p-10">
		<div class="row">
			<div class="col-md-2.5">
				<div class="card">
					<div class="card-body">
						<form id="frmtarea">
							<div class="form-group">
								<h3>Lista de alumunos -></h3>	
							</div>
							<div class="form-group">	
							</div>
							<a href="insert.php"  class="btn btn-success my-2 my-sm-0">Registrar alumnos</a>
						</form>
					</div>
				</div>
			</div>
			<div class="col-md-7">
				<table class="table table-bordered table-sm table-hover" >
					<thead class="table-dark" >
						<tr>
							<td>Cod</td>
							<td>Alumno<br>(Nombre)</td>
							<td>DNI</td>
							<td>Direcc</td>
							<td colspan="1">(Activo)</td>
							<td colspan="2">Acción</td>
						</tr>
					</thead>
					<?php foreach($resultado as $fila):?>
						<tr >
						<td><?php echo $fila['CodAlum']; ?></td>
						<td><?php echo $fila['NomAlum']; ?></td>
						<td><?php echo $fila['DniAlum']; ?></td>
						<td><?php echo $fila['DirAlum']; ?></td>
						<td class="cbox"><input type="checkbox" name="activo[]" value="A" ></td>
						<td><a href="update.php?CodAlum=<?php echo $fila['CodAlum']; ?>"  class="btn btn-success my-2 my-sm-0 bg-dark" >Editar</a></td>
						<td><a href="delete.php?CodAlum=<?php echo $fila['CodAlum']; ?>" class="btn btn-success my-2 my-sm-0 bg-danger">Eliminar</a></td>
						</tr>
					<?php endforeach ?>
					<tbody id="tareas">
					</tbody>
				</table>
			</div>
		</div>
	</div>


</body>
</html>
