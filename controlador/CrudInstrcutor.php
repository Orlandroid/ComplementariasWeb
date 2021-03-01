<?php
include_once '../modelo/instructor.php';

$instructor = new Instructor();
/*Registramos un usuario*/
if (isset($_POST['registrar'])) {
    $nombre = $_REQUEST['nombre'];
    $sexo = $_REQUEST['sexo'];
    $a_paterno = $_REQUEST['a_paterno'];
    $a_materno = $_REQUEST['a_materno'];
    $carrera = $_REQUEST['id_carrera'];
    $instructor->insertar($nombre, $sexo, $a_paterno, $a_materno, $carrera);
    regresa("SE HA REGISTRADO CORRECTAMENTE EL INSTRUCTOR");
}
/* eliminados el  usario cuando presionamos el boton eliminar*/
if (isset($_GET['id'])) {
    $idInstructor = $_GET['id'];
    $instructor->eliminar($instructor);
    regresa("SE HA ELIMINDAO EL USUARIO CORRECTAMENTE");
}
/*actualizamos el registro el cual presionemos en el boton actualizar*/
if (isset($_POST['actualizar'])) {
    $nombre = $_REQUEST['nombre'];
    $sexo = $_REQUEST['sexo'];
    $a_paterno = $_REQUEST['a_paterno'];
    $a_materno = $_REQUEST['a_materno'];
    $carrera = $_REQUEST['id_carrera'];
    $idInstructor = $_REQUEST['idinstructor'];
    $instructor->actualizar($nombre, $sexo, $a_paterno, $a_materno, $idInstructor);
    regresa("SE HA ACTUALIZADO CORRECTAMENTE EL USUARIO");
}

function  regresa($c)
{
    echo "<script >alert('$c')</script>";
    echo "<script >location.href='../vista/FormularioInstructor.php';</script>";
}
