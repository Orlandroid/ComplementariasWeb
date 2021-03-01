<?php
include_once '../modelo/Usuario.php';

$Ousuario = new Usuario();

/*Registramos un usuario*/
if (isset($_POST['registrar'])) {
    $usuario = $_REQUEST['usuario'];
    $contra = $_REQUEST['pass'];
    $tipo = $_REQUEST['tipo'];
    $Ousuario->insertar($usuario, $contra, $tipo);
    regresa("SE HA REGISTRADO CORRECTAMENTE AL USUARIO");
}
/* eliminados el  usario cuando presionamos el boton eliminar*/
if (isset($_GET['id'])) {
    $idUsuario = $_GET['id'];
    $Ousuario->eliminar($idUsuario);
    regresa("SE HA ELIMINADO CORRECTAMENTE AL USUARIO");
}
/*actualizamos el registro el cual presionemos en el boton actualizar*/
if (isset($_POST['actualizar'])) {
    $usuario = $_REQUEST['usuario'];
    $contra = $_REQUEST['pass'];
    $tipo = $_REQUEST['tipo'];
    $idUsuario = $_GET['id'];
    $Ousuario->actualizar($usuario, $contra, $tipo, $idUsuario);
    regresa("SE HA ACTUALIZADO CORRECTAMENTE EL USUARIO");
}

function  regresa($c)
{
    echo "<script >alert('$c')</script>";
    echo "<script >location.href='../vista/FormularioUsuarios.php';</script>";
}
