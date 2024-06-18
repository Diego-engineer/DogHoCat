<?php
// Archivo de conexion con la base de datos
require_once 'Conexion.php';
// Condicional para validar el borrado de la imagen
if(isset($_GET['delete_id']))
{
	// Selecciona imagen a borrar
	$stmt_select = $DB_con->prepare('SELECT Imagen_Img FROM tbl_animales WHERE Id_Animal =:uid');
	$stmt_select->execute(array(':uid'=>$_GET['delete_id']));
	$imgRow=$stmt_select->fetch(PDO::FETCH_ASSOC);
	// Ruta de la imagen
	unlink("imagenes/".$imgRow['Imagen_Img']);
	
	// Consulta para eliminar el registro de la base de datos
	$stmt_delete = $DB_con->prepare('DELETE FROM tbl_animales WHERE Id_Animal =:uid');
	$stmt_delete->bindParam(':uid',$_GET['delete_id']);
	$stmt_delete->execute();
	// Redireccioa al inicio
	header("Location: index.php");
}

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=yes" />
    <title>Subir imagen al servidor usando PDO MySQL</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="../Estilos/for.css">
    <style>
        .carousel-inner {
            text-align: center;
        }

        .carousel-control {
            width: 5%;
        }

        .carousel-indicators {
            bottom: 0;
            left: 0;
            margin-left: 0;
            width: 100%;
            text-align: center;
        }

        .carousel-indicators li {
            display: inline-block;
            width: 10px;
            height: 10px;
            margin: 1px;
            text-indent: -999px;
            cursor: pointer;
            background-color: #ccc;
            border: 1px solid #ccc;
            border-radius: 10px;
        }

        .carousel-indicators .active {
            width: 12px;
            height: 12px;
            background-color: #007bff;
            border-color: #007bff;
        }

        .carousel-inner img {
            margin: 0 auto; /* Centrar la imagen horizontalmente */
        }
    </style>
    <script src="bootstrap/js/jquery.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="page-header">
            <h1 class="h2"> <a class="btn btn-default" href="AgregarNuevo.php"> <span class="glyphicon glyphicon-plus"></span> &nbsp; Agregar nuevo</a></h1>
        </div>
        <a class="btn btn-default btn-volver" href="../Html/Inicio/Administrador.php" title='Volver' target="_blank">Volver</a>
        <br />
        <div class="row">
            <div class="col-xs-12">
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <?php
                        $stmt = $DB_con->prepare('SELECT * FROM tbl_animales ORDER BY Id_Animal DESC');
                        $stmt->execute();

                        if ($stmt->rowCount() > 0) {
                            for ($i = 0; $i < $stmt->rowCount(); $i++) {
                                if ($i == 0) {
                                    echo '<li data-target="#myCarousel" data-slide-to="' . $i . '" class="active"></li>';
                                } else {
                                    echo '<li data-target="#myCarousel" data-slide-to="' . $i . '"></li>';
                                }
                            }
                        }
                        ?>
                    </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner" role="listbox">
                        <?php
                        if ($stmt->rowCount() > 0) {
                            $count = 0;
                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                extract($row);
                                if ($count == 0) {
                                    echo '<div class="item active">';
                                } else {
                                    echo '<div class="item">';
                                }
                                echo '<p class="page-header">' . $Nombre . "&nbsp;/&nbsp;" . $Edad . "&nbsp;/&nbsp;" . $Raza . "&nbsp;/&nbsp;" . $Tamaño . "&nbsp;/&nbsp;" . $Color . "&nbsp;/&nbsp;" . $Sexo . '</p>';
                                echo '<img src="imagenes/' . $row['Imagen_Img'] . '" class="img-rounded" width="250px" height="250px" />';
                                echo '<p class="page-header"> <span> <a class="btn btn-info" href="EditarImagen.php?edit_id=' . $row['Id_Animal'] . '" title="click for edit" onclick="return confirm(\'Esta seguro de editar el archivo ?\')"><span class="glyphicon glyphicon-edit"></span> Editar</a> <a class="btn btn-danger" href="?delete_id=' . $row['Id_Animal'] . '" title="click for delete" onclick="return confirm(\'Esta seguro de eliminar el archivo?\')"><span class="glyphicon glyphicon-remove-circle"></span> Borrar</a> </span> </p>';
                                echo '</div>';
                                $count++;
                            }
                        }
                        ?>
                    </div>

                    <!-- Left and right controls -->
                    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <script src="bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
