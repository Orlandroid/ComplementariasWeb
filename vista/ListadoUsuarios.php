<?php
include_once '../modelo/validaSesion.php';
include_once '../modelo/Usuario.php';
include_once 'header.html';
?>
<br>
<div class="container">
    <form action="ListadoUsuarios.php" method="post">
        <input type="text" name="buscar">
        <input type="submit" value="Buscar" name="busca" class="btn btn-primary" id="busca">
        <br><br>
    </form>
    <table class="table table-striped table-bordered table-secondary table-sm">
        <thead class="thead-dark">
            <th>Id</th>
            <th>Usuario</th>
            <th>Contraseña</th>
            <th>Tipo</th>
            <th>Activo</th>
            <th>Eliminar</th>
            <th>Actualizar</th>
        </thead>
        <?php
        $usuario = new Usuario();
        if (isset($_REQUEST['busca'])) {
            $buscar = $_REQUEST['buscar'];
            $usuario->obtener(true,$buscar);
        }
        $usuario->obtener(false,"");
        ?>
    </table>
</div>