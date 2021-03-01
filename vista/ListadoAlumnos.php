<?php
include_once 'header.html';
include_once '../modelo/alumnos.php';
?>
<br>
<div class="container">
    <form action="ListadoAlumnos.php" method="post">
        <input type="text" name="buscar" placeholder="Numero de control">
        <input type="submit" value="Buscar" name="busca" class="btn btn-primary" id="busca" >
        <br><br>
    </form>
    <h2>
        <caption class="text-center">Listado de alumnos registrados</caption>
    </h2>
    <table class="table table-striped table-bordered table-secondary table-sm">
        <thead class="thead-dark">
            <th>Id</th>
            <th>Nombre</th>
            <th>Sexo</th>
            <th>Apellido_materno</th>
            <th>Apellido_paterno</th>
            <th>Numero de control</th>
            <th>Activo</th>
            <th>Carrrea</th>
            <th>Eliminar</th>
            <th>Actualizar</th>
        </thead>
        <?php
        $alumno = new Alumnos();
        if (isset($_REQUEST['busca'])) {
            $buscar = $_REQUEST['buscar'];
            $alumno->obtener(true,$buscar);
        }
        $alumno->obtener(false,"null");
        ?>
    </table>
</div>