<?php
require_once '../modelo/validaSesion.php';
require_once '../modelo/actividad.php';
include_once 'header.html';
?><br>
<div class="container">
    <form action="ListadoActividades.php" method="post" >
        <input type="text" name="buscar" placeholder="Actividad">
        <input type="submit" value="Buscar" name="busca" class="btn btn-primary" id="busca" >
        <br><br>
    </form>
    <table class="table table-striped table-bordered table-secondary table-sm">
        <thead class="thead-dark">
            <th>Id</th>
            <th>Nombre</th>
            <th>Descripcion</th>
            <th>Cupo limite</th>
            <th>Fecha</th>
            <th>Activo</th>
            <th>Instructor</th>
            <th>A paterno</th>
            <th>A materno</th>
            <th>Eliminar</th>
            <th>Actualizar</th>
        </thead>
        <?php
        $actividad = new Actividad();
        if (isset($_REQUEST['busca'])) {
        $buscar =$_REQUEST['buscar'];
        $actividad->obtenerBuscando($buscar);
        }else
        $actividad->obtener();
        ?>
    </table>
</div>