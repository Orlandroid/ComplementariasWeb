<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="css/estilo.css">
  <link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap.min.css" />
  <title></title>
</head>

<body>

  <form id="formacceso" action="modelo/validar.php" method="post">
    <div class="alert alert-primary rounded-top" role="alert">
      <strong>
        <h2>Inicio de session</h2>
      </strong>
    </div>
    <table align="center">
      <img src="imagenes/usuario.png" class="img">
      <tr>
        <td colspan="2">
          <span>Usuario:</span><br />
          <input class="cajas" type="text" name="usuario">
        </td>
      </tr>
      <tr>
        <td colspan="2">
          <span>Clave:</span><br />
          <input class="cajas" type="password" name="clave">
        </td>
      </tr>
      <tr>
        <td>
          <br />
          <input type="submit" class="btn btn-primary" value="ingresar">
        </td>
        <td>
          <br />
          <input type="reset" class="btn btn-danger" value="cancelar">
        </td>
      </tr>
    </table>

  </form>
</body>

</html>