<?php
include_once '../modelo/validaSesion.php';
include_once '../modelo/registrarse.php';
include_once 'header.html';
?>
<br>
<div class="container">
    <form action="ListadoRegistroActividad.php" method="post">
        <input type="text" name="buscar">
        <input type="submit" value="Buscar" name="busca" class="btn btn-primary" id="busca">
        <br><br>
    </form>
    <table class="table table-striped table-bordered table-secondary table-sm ">
        <thead class="thead-dark">
            <th>Id</th>
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
            <th>Actualizar</th>
            <th>PDF</th>
            <th>Evaluar</th>
        </thead>
        <?php
        $registrarse = new HistorialActividades();
        if (isset($_REQUEST['busca'])) {
            $buscar = $_REQUEST['buscar'];
            $registrarse->obtenerBuscando($buscar);
        }else
        $registrarse->obtener();
        ?>
    </table>
</div>