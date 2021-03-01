<?php

/**Este archivo lo que hace es checkar en la base de datos si se
 * encuentra el usuario y que privilegios tienes ya que hay dos
 * tipos administrador e invitado si encuentra al usario lo
 * envia al home de la pagina si no lo direciona al index
 */

session_start();
include_once 'conexion.php';
$con = regresarConexion();
$usuario = $_POST['usuario'];
$contra = $_POST['clave'];
$consulta = "SELECT  usuario,tipo,activo from usuarios where usuario = '$usuario' and contraseña = '$contra' and activo=1";

$loguin = mysqli_query($con, $consulta);
if ($reg = mysqli_fetch_array($loguin)) {
    $_SESSION['user'] = $reg[0];
    $_SESSION['tipo'] = $reg[1];
    $_SESSION['activo'] = $reg[2];
    echo "<script>alert('Iniciando en el sistema')</script>";
    echo "<script>location.href='../vista/home.php';</script>";
} else {
    echo "<script>alert('usuario o clave incorrectos')</script>";
    echo "<script>location.href='../index.php';</script>";
}
?>
