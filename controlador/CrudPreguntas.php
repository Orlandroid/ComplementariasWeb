<?php
include_once '../conexion.php';

 $p1 = $_REQUEST['1'];
 $p2 = $_REQUEST['2'];
 $p3 = $_REQUEST['3'];
 $p4 = $_REQUEST['4'];
 $p5 = $_REQUEST['5'];
 $p6 = $_REQUEST['6'];
 $p7 = $_REQUEST['7'];
$idalumno = $_REQUEST['id_alumno'];


/*Registramos un usuario*/
if(isset($_POST['registrar'])){

        $consulta =" insert into pregunta (p1,p2,p3,p4,p5,p6,p7,idalumno) values
    ( '$p1' , '$p2' , '$p1' , '$p4' , '$p5' , '$p6' , '$p7' ,'$idalumno') ";
    $reguistros = mysqli_query($con,$consulta) or 
      die("Problemas en la consulta".mysqli_error($con));
      regresa("SE HA EVALUADO CORRECTAMENTE AL ALUMNO");
      
}


function  regresa($c){
    echo"<script >alert('$c')</script>";
}
?>
<a href="../Evaluacion.php?alumno=<?php echo $idalumno;?>">Generar constancia del alumno</a>
