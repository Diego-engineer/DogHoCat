<?php
error_reporting( ~E_NOTICE );	
require_once 'Conexion.php';

if(isset($_GET['edit_id']) && !empty($_GET['edit_id']))
{
	$id = $_GET['edit_id'];
	$stmt_edit = $DB_con->prepare('SELECT Nombre, Edad, Raza, Tamaño, Color, Sexo, Imagen_Img FROM tbl_animales WHERE Id_Animal  =:uid');
	$stmt_edit->execute(array(':uid'=>$id));
	$edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
	extract($edit_row);
}
else
{
	header("Location: index.php");
}	

if(isset($_POST['btn_save_updates']))
{
	$Nombre = $_POST['Nombre']; // user name
    $Edad = $_POST['Edad']; // user email
    $Raza = $_POST['Raza'];
    $Tamaño = $_POST['Tamaño'];
    $Color = $_POST['Color'];
    $Sexo = $_POST['Sexo'];
		
	$imgFile = $_FILES['user_image']['name'];
	$tmp_dir = $_FILES['user_image']['tmp_name'];
	$imgSize = $_FILES['user_image']['size'];
				
	if($imgFile)
	{
		$upload_dir = 'imagenes/'; // upload directory	
		$imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
		$valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
		$userpic = rand(1000,1000000).".".$imgExt;
		if(in_array($imgExt, $valid_extensions))
		{			
			if($imgSize < 1000000)
			{
				unlink($upload_dir.$edit_row['Imagen_Img']);
				move_uploaded_file($tmp_dir,$upload_dir.$userpic);
			}
			else
			{
				$errMSG = "Su archivo es demasiado grande mayor a 1MB";
			}
		}
		else
		{
			$errMSG = "Solo archivos JPG, JPEG, PNG & GIF .";		
		}	
	}
	else
	{
		// if no image selected the old image remain as it is.
		$userpic = $edit_row['Imagen_Img']; // old image from database
	}	
					
	
	// if no error occured, continue ....
	if(!isset($errMSG))
	{
		$stmt = $DB_con->prepare('UPDATE tbl_animales
                             SET Nombre=?, 
                                 Edad=?, 
                                 Raza=?, 
                                 Tamaño=?,
                                 Color=?,
                                 Sexo=?,
                                 Imagen_Img=?
                           WHERE Id_Animal =?');	
		$stmt->bindValue(1, $Nombre);
		$stmt->bindValue(2, $Edad);
		$stmt->bindValue(3, $Raza);
		$stmt->bindValue(4, $Tamaño);
		$stmt->bindValue(5, $Color);
		$stmt->bindValue(6, $Sexo);
		$stmt->bindValue(7, $userpic);
		$stmt->bindValue(8, $Id_Animal );

			
		if($stmt->execute()){
			?>
<script>
			alert('Archivo editado correctamente ...');
			window.location.href='index.php';
			</script>
<?php
		}
		else{
			$errMSG = "Los datos no fueron actualizados !";
		}		
	}						
}	
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8" />
<title>Subir imagen al servidor usando PDO MySQL</title>
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">

<!-- custom stylesheet -->
<link rel="stylesheet" href="style.css">

<!-- Latest compiled and minified JavaScript -->

</head>
<body>
<div class="navbar navbar-default navbar-static-top" role="navigation">
  <div class="container">
    <div class="navbar-header"> <a class="navbar-brand" href="index.php" title='Inicio' target="_blank">Inicio</a> </div>
  </div>
</div>
<div class="container">
  <div class="page-header">
    <h1 class="h2">Actualización producto. <a class="btn btn-default" href="index.php"> Mostrar todos los modelos </a></h1>
  </div>
  <div class="clearfix"></div>
  <form method="post" enctype="multipart/form-data" class="form-horizontal">
    <?php
	if(isset($errMSG)){
		?>
    <div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; <?php echo $errMSG; ?> </div>
    <?php
	}
	?>
    <table class="table table-bordered table-responsive">
      <tr>
        <td><label class="control-label">Nombre</label></td>
        <td><input class="form-control" type="text" name="Nombre" value="<?php echo $Nombre; ?>" required /></td>
      </tr>
      <tr>
        <td><label class="control-label">Edad</label></td>
        <td><input class="form-control" type="text" name="Edad" value="<?php echo $Edad; ?>" required /></td>
      </tr>
	  <tr>
        <td><label class="control-label">Raza</label></td>
        <td><input class="form-control" type="text" name="Raza" value="<?php echo $Raza; ?>" required /></td>
      </tr>
      <tr>
        <td><label class="control-label">Tamaño</label></td>
        <td><input class="form-control" type="text" name="Tamaño" value="<?php echo $Tamaño; ?>" required /></td>
      </tr>
	  <tr>
        <td><label class="control-label">Color</label></td>
        <td><input class="form-control" type="text" name="Color" value="<?php echo $Color; ?>" required /></td>
      </tr>
      <tr>
        <td><label class="control-label">Sexo</label></td>
        <td><input class="form-control" type="text" name="Sexo" value="<?php echo $Sexo; ?>" required /></td>
      </tr>
      <tr>
        <td><label class="control-label">Imágen.</label></td>
        <td><p><img src="imagenes/<?php echo $Imagen_Img; ?>" height="150" width="150" /></p>
          <input class="input-group" type="file" name="user_image" accept="image/*" /></td>
      </tr>
      <tr>
        <td colspan="2"><button type="submit" name="btn_save_updates" class="btn btn-default"> <span class="glyphicon glyphicon-save"></span> Actualizar </button>
          <a class="btn btn-default" href="index.php"> <span class="glyphicon glyphicon-backward"></span> cancelar </a></td>
      </tr>
    </table>
  </form>
  
</body>
</html>