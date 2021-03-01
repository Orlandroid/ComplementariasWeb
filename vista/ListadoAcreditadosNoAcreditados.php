<?php
include_once '../modelo/validaSesion.php';
include_once 'header.html';
?>
<br>
<div class="container">
    <form action="ListadoAcreditadosNoAcreditados.php" method="post">
        <input type="text" name="buscar">
        <input type="submit" value="Buscar" name="busca" class="btn btn-primary" id="busca">
        <br><br>
    </form>
    <table class="table table-striped table-bordered table-secondary table-sm ">
        <thead class="thead-dark">
            <th>noCredito</th>
            <th>Fecha</th>
            <th>Acreditado</th>
            <th>Semestre</th>
            <th>Alumno</th>
            <th>#control</th>
            <th>Sexo</th>
            <th>Actividad</th>
            <th>Instructor</th>
            <th>Carrera</th>
        </thead>
        <?php
        include_once '../modelo/conexion.php';
        $consulta = "select c.idcredito,c.credito,c.fecha_reguistro,c.acreditado,c.semestre,a.nombre,a.numero_control,
a.sexo,ac.nombre,i.nombre,ca.carrera
from historial_actividades c, alumnos a , actividad ac , instructor i, carreras ca
where c.id_alumno=a.idalumnos and  c.id_actividad=ac.idactividad and ac.id_instructor=i.idinstructor and a.id_carrera=ca.idcarrera";
        if (isset($_REQUEST['busca'])) {
            $buscar = $_REQUEST['buscar'];
            $consulta = $consulta . " and c.acreditado ='$buscar'";
        }
        $con = regresarConexion();
        $consulta = $consulta . " order by a.numero_control";
        $reguistros = mysqli_query($con, $consulta) or
            die("Problema en la consulta" . mysqli_error($con));
        while ($reg = mysqli_fetch_array($reguistros)) {
            echo "<tr>";
            echo "<td>" . $reg[1] . "</td>";
            echo "<td>" . $reg[2] . "</td>";
            echo "<td>" . $reg[3] . "</td>";
            echo "<td>" . $reg[4] . "</td>";
            echo "<td>" . $reg[5] . "</td>";
            echo "<td>" . $reg[6] . "</td>";
            echo "<td>" . $reg[7] . "</td>";
            echo "<td>" . $reg[8] . "</td>";
            echo "<td>" . $reg[9] . "</td>";
            echo "<td>" . $reg[10] . "</td>";
            echo "<tr>";
        }

        ?>
    </table>
</div>