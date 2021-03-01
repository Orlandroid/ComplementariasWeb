  <?php 
  function regresarConexion()
  {
    $con = mysqli_connect("localhost:3308", "root", "master", "complementarias2") or
    die("Problemas al conectarse con la base de datos");
    mysqli_set_charset($con,'utf8');
    if (!$con) {
        die("Error al conectar a la base de datos" . mysqli_connect_error());
    }
    return $con;
  }

  function closeConexion($con){
    mysqli_close($con);
  }
?>
