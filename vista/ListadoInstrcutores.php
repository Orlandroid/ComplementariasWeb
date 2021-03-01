<?php
include_once '../modelo/validaSesion.php';
include_once '../modelo/instructor.php';
include_once 'header.html';
?>
<br>
<div class="container">
    <form action="ListadoInstrcutores.php" method="post">
        <input type="text" name="buscar">
        <input type="submit" value="Buscar" name="busca" class="btn btn-primary" id="busca">
        <br><br>
    </form>
    <h2>
        <caption class="text-center">Listado de instructores registrados</caption>
    </h2>
    <table class="table table-striped table-bordered table-secondary table-sm">
        <thead class="thead-dark">
            <th>Id</th>
            <th>Nombre</th>
            <th>Sexo</th>
            <th>Apellido_paterno</th>
            <th>Apellido_materno</th>
            <th>Activo</th>
            <th>Carrera</th>
            <th>Eliminar</th>
            <th>Actualizar</th>
        </thead>
        <?php
        $instructor = new Instructor();
        if (isset($_REQUEST['busca'])) {
            $buscar = $_REQUEST['buscar'];
           $instructor->obtener(true,$buscar);
        }
        $instructor->obtener(false,"");
        ?>
    </table>
</div>