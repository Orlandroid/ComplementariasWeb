<?php
include_once 'header.html';
include_once '../modelo/conexion.php';
include_once '../modelo/validaSesion.php';
$session = new Session();
?>
<title>Registro de Usuarios</title>
<script src="../js/Editar.js">
</script>
<div class="contenedor-form">

    <h1>Registrar Usuarios</h1>
    <form action="../controlador/CrudUsuario.php" method="post">
        <input type="text" name="usuario" class="input-control" placeholder="Usuario" required id="u">
        <input type="password" name="pass" class="input-control" placeholder="Contrasena" required id="c">
        <input type="hidden" value="" id="id" name="idusuarios">
        <select name="tipo" required class="form-control">
            <option value="administrador">Administrador</option>
            <option value="invitado">Invitado</option>
        </select><br>

        <input type="submit" value="Registrar" name="registrar" class="btn btn-primary" id="accion" <?php echo $session->getHabilita(); ?>>
        <input type="reset" class="btn btn-danger" value="cancelar">
    </form>
</div>

<?php
include_once 'ListadoUsuarios.php';
include_once 'footer.html';
?>
