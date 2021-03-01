<?php
include_once '../modelo/registrarse.php';
$registrarse = new HistorialActividades();

/*Registramos un usuario*/
if(isset($_POST['registrar'])){
    $credito = $_REQUEST['credito'];
    $fecha = $_REQUEST['fecha'];
    $semestre = $_REQUEST['semestre'];
    $id_alumno = $_REQUEST['id_alumno'];
    $id_actividad = $_REQUEST['id_actividad'];
    $registrarse->insertar($credito,$fecha,$semestre,$id_alumno,$id_actividad);
      regresa("SE HA REGISTRADO CORRECTAMENTE EL ALUMNO EN LA ACTIVIDAD COMPLEMENTARIA");
}
/* eliminados el  usario cuando presionamos el boton eliminar*/
/*actualizamos el registro el cual presionemos en el boton actualizar*/
if(isset($_POST['actualizar'])){
    $credito = $_REQUEST['credito'];
    $fecha = $_REQUEST['fecha'];
    $acreditado = $_REQUEST['acreditado'];
    $semestre = $_REQUEST['semestre'];
    $id_alumno = $_REQUEST['id_alumno'];
    $id_actividad = $_REQUEST['id_actividad'];
    $id_credito = $_REQUEST['idcredito'];
    mysqli_query($con,"update historial_actividades set credito = '$credito' , fecha_reguistro = '$fecha' , acreditado = '$acreditado' , 
    semestre = '$semestre' , id_alumno = '$id_alumno' , id_actividad = '$id_actividad' where idcredito=$id_credito") or
    die("Problemas en la consulta editar".mysqli_error($con));
    regresa("SE HA ACTUALIZADO CORRECTAMENTE EL REGISTRO EN ACTIVIDAD");
}

function  regresa($c){
    echo"<script >alert('$c')</script>";
    echo"<script >location.href='../vista/FormularioRegistrarse.php';</script>";
}


 
 ?>
