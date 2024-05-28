<?php

	error_reporting( ~E_NOTICE ); // avoid notice
	
	require_once 'Conexion.php';
	
	if(isset($_POST['btnsave']))
	{
    $Nombre = $_POST['Nombre'];
    $Edad = $_POST ['Edad'];
    $Raza = $_POST ['Raza'];
    $Tamaño = $_POST ['Tamaño'];
    $Color = $_POST ['Color'];
    $Sexo = $_POST ['Sexo'];
    
     

		
		$imgFile = $_FILES['user_image']['name'];
		$tmp_dir = $_FILES['user_image']['tmp_name'];
		$imgSize = $_FILES['user_image']['size'];
		
		
		if(empty($Nombre)){
			$errMSG = "Ingrese la marca";
		}
		else if(empty($Edad)){
			$errMSG = "Ingrese el tipo.";
		}else if(empty($Raza)){
			$errMSG = "Ingrese el tipo.";
		}else if(empty($Tamaño)){
			$errMSG = "Ingrese el tipo.";
		}else if(empty($Color)){
			$errMSG = "Ingrese el tipo.";
		}else if(empty($Sexo)){
			$errMSG = "Ingrese el tipo.";
		}
		else if(empty($imgFile)){
			$errMSG = "Seleccione el archivo de imagen.";
		}
		else
		{
			$upload_dir = 'imagenes/'; // upload directory
	
			$imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
		
			// valid image extensions
			$valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'jfif'); // valid extensions
		
			// rename uploading image
			$userpic = rand(1000,1000000).".".$imgExt;
				
			// allow valid image file formats
			if(in_array($imgExt, $valid_extensions)){			
				// Check file size '1MB'
				if($imgSize < 1000000)				{
					move_uploaded_file($tmp_dir,$upload_dir.$userpic);
				}
				else{
					$errMSG = "Su archivo es muy grande.";
				}
			}
			else{
				$errMSG = "Solo archivos JPG, JPEG, PNG & GIF son permitidos.";		
			}
		}
		
		
		// if no error occured, continue ....
		if(!isset($errMSG))
		{
			$stmt = $DB_con->prepare('INSERT INTO tbl_imagenes(Nombre,Edad,Raza,Tamaño,Color,Sexo,Imagen_Img) VALUES(:Nombre, :Edad, :Raza, :Tamaño, :Color, :Sexo, :upic)');
			$stmt->bindParam(':Nombre',$Nombre);
			$stmt->bindParam(':Edad',$Edad);
      $stmt->bindParam(':Raza',$Raza);
			$stmt->bindParam(':Tamaño',$Tamaño);
      $stmt->bindParam(':Color',$Color);
			$stmt->bindParam(':Sexo',$Sexo);
			$stmt->bindParam(':upic',$userpic);
			
			if($stmt->execute())
			{
				$successMSG = "Nuevo registro insertado correctamente ...";
				header("refresh:3;index.php"); // redirects image view page after 5 seconds.
			}
			else
			{
				$errMSG = "Error al insertar ...";
			}
		}
	}
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<title>Subir, Insertar, Actualizar, Borrar una imágen usando PHP y MySQL</title>
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">
<!-- Latest compiled and minified JavaScript -->
<script src="bootstrap/js/jquery.min.js"></script>
</head>
<body>
<div class="navbar navbar-default navbar-static-top" role="navigation">
  <div class="container">
    <div class="navbar-header"> <a class="navbar-brand" href="index.php" title='Inicio' target="_blank">Inicio</a> </div>
  </div>
</div>
<div class="container">
  <div class="page-header">
    <h1 class="h3">Agregar nueva imágen. <a class="btn btn-default" href="index.php"> <span class="glyphicon glyphicon-eye-open"></span> &nbsp; Mostrar todo </a></h1>
  </div>
  <?php
	if(isset($errMSG)){
			?>
  <div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> <strong><?php echo $errMSG; ?></strong> </div>
  <?php
	}
	else if(isset($successMSG)){
		?>
  <div class="alert alert-success"> <strong><span class="glyphicon glyphicon-info-sign"></span> <?php echo $successMSG; ?></strong> </div>
  <?php
	}
	?>
  <form method="post" enctype="multipart/form-data" class="form-horizontal">
    <table class="table table-bordered table-responsive">
      <tr>
        <td><label class="control-label">Nombre</label></td>
        <td><input class="form-control" type="text" name="Nombre" placeholder="Ingrese la Marca"  /></td>
      </tr>
      <tr>
        <td><label class="control-label">Edad</label></td>
        <td><input class="form-control" type="text" name="Edad" placeholder="Ingrese el Modelo"  /></td>
      </tr>
      <td><label class="control-label">Raza</label></td>
        <td><input class="form-control" type="text" name="Raza" placeholder="Ingrese la Marca"  /></td>
      </tr>
      <tr>
        <td><label class="control-label">Tamaño</label></td>
        <td><input class="form-control" type="text" name="Tamaño" placeholder="Ingrese el Modelo"  /></td>
      </tr>
      <td><label class="control-label">Color</label></td>
        <td><input class="form-control" type="text" name="Color" placeholder="Ingrese la Marca"  /></td>
      </tr>
      <tr>
        <td><label class="control-label">Sexo</label></td>
        <td><input class="form-control" type="text" name="Sexo" placeholder="Ingrese el Modelo"  /></td>
      </tr>
      <tr>
        <td><label class="control-label">Imágen.</label></td>
        <td><input class="input-group" type="file" name="user_image" accept="image/*" /></td>
      </tr>
      <tr>
        <td colspan="2"><button type="submit" name="btnsave" class="btn btn-default"> <span class="glyphicon glyphicon-save"></span> &nbsp; Guardar Imagen </button></td>
      </tr>
    </table>
  </form>
  <div class="alert alert-info"> <strong>Tutorial Vinculo!</strong> <a href="https://baulcode.com">Ir al Tutorial</a>! </div>
</div>

<!-- Latest compiled and minified JavaScript --> 
<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>