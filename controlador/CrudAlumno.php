<?php
include_once '../modelo/alumnos.php';

$alumno = new Alumnos();


/*Registramos un alumno */
if (isset($_POST['registrar'])) {
    $nombre = $_REQUEST['nombre'];
    $sexo = $_REQUEST['sexo'];
    $amaterno = $_REQUEST['apellido_materno'];
    $apaterno = $_REQUEST['apellido_paterno'];
    $nocontrol = $_REQUEST['numero_control'];
    $carrera = $_REQUEST['id_carrera'];
    $alumno->insertar($nombre, $sexo, $amaterno, $apaterno, $nocontrol, $carrera);
    regresa("Se ha agregado al alumno");
}
/* eliminados el alumno cuando presionamos el boton eliminar */
if (isset($_GET['id'])) {
    $idalumno = $_GET['id'];
    $alumno->eliminar($idalumno);
    regresa("SE HA ELIMINDAO EL ALUMNO CORRECTAMENTE");
}
/*actualizamos el registro el cual presionemos en el boton actualizar*/
if (isset($_POST['actualizar'])) {
    $nombre = $_REQUEST['nombre'];
    $sexo = $_REQUEST['sexo'];
    $amaterno = $_REQUEST['apellido_materno'];
    $apaterno = $_REQUEST['apellido_paterno'];
    $nocontrol = $_REQUEST['numero_control'];
    $carrera = $_REQUEST['id_carrera'];
    $idalumno = $_REQUEST['idalumnos'];
    $alumno->actualizar($nombre, $sexo, $amaterno, $apaterno, $nocontrol, $carrera, $idalumno);
    regresa("SE HA ACTUALIZADO CORRECTAMENTE EL USUARIO");
}

function  regresa($c)
{
    echo "<script >alert('$c')</script>";
    echo "<script >location.href='../vista/FormularioAlumnos.php';</script>";
}
?>
