<?php
include_once '../modelo/actividad.php';
$actividad = new Actividad();

/*Registramos un alumno */
if (isset($_POST['registrar'])) {
    $nombre = $_REQUEST['nombre'];
    $descripcion = $_REQUEST['descripcion'];
    $imagen = $_FILES['imagen']['name'];
    $imagenGuardar = $_FILES['imagen']['tmp_name'];
    echo "$imagenGuardar $imagenGuardar";
    if (!file_exists('../archivos')) {
        mkdir('../archivos', 0777, true);
        if (move_uploaded_file($imagenGuardar, '../archivos/' . $imagen)) {
            print "Archivo subido exitosamente";
        } else {
            echo "Error al subir el archivo";
        }
    } else {
        if (move_uploaded_file($imagenGuardar, '../archivos/' . $imagen)) {
            print "Archivo subido exitosamente";
        } else {
            echo "Error al subir el archivo";
        }
    }
    $cupo = $_REQUEST['cupo_limite'];
    $fecha = $_REQUEST['fecha'];
    $id_instructor = $_REQUEST['id_instructor'];
    $actividad->insertar($nombre, $descripcion, $imagen, $cupo, $fecha, $id_instructor);
    regresa("SE HA REGISTRADO CORRECTAMENTE EL LA ACTIVIDAD");
}

/*actualizamos el registro el cual presionemos en el boton actualizar*/
if (isset($_POST['actualizar'])) {
    $nombre = $_REQUEST['nombre'];
    $descripcion = $_REQUEST['descripcion'];
    $imagen = $_REQUEST['imagen'];
    $cupo_limite = $_REQUEST['cupo_limite'];
    $fecha = $_REQUEST['fecha'];
    $id_instructor = $_REQUEST['id_instructor'];
    $idactividad = $_REQUEST['idactividad'];
    $actividad->actualizar($nombre, $descripcion, $imagen, $cupo_limite, $fecha, $id_instructor, $idactividad);
    regresa("SE HA ACTUALIZADO CORRECTAMENTE LA ACTIVIDAD");
}

/* eliminados el alumno cuando presionamos el boton eliminar */
if (isset($_GET['id'])) {
    $idactividad = $_GET['id'];
    $actividad->eliminar($idactividad);
    regresa("SE HA ELIMINDAO LA ACTIVIDAD");
}

function  regresa($c)
{
    echo "<script >alert('$c')</script>";
    echo "<script >location.href='../vista/FormularioActividad.php';</script>";
}
?>