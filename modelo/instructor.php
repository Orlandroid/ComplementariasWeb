  <?php

  class Instructor
  {

      public function insertar($nombre, $sexo, $paterno, $materno, $id)
      {
          include_once 'conexion.php';
          $con = regresarConexion();
          mysqli_query($con, "insert into instructor(nombre,sexo,a_paterno,a_materno,idcarrera) values ('$nombre','$sexo','$paterno','$materno','$id')")
              or die("Error al ingresar al usuario" . mysqli_error($con));
              closeConexion($con);
      }

      public function obtener()
      {
          include_once 'conexion.php';
          include_once 'validaSesion.php';
          $session = new Session();
          $con = regresarConexion();
          $consulta = "select i.idinstructor,i.nombre,i.sexo,i.a_paterno,i.a_materno,i.activo, c.carrera from instructor i
          inner join carreras c
          on i.idcarrera=c.idcarrera";
          $habilita = $session->getHabilita();
          $reguistros = mysqli_query($con, $consulta) or
              die("Problema de conexion con la base de datos" . mysqli_error($con));
          while ($reg = mysqli_fetch_array($reguistros)) {
              echo "<tr>";
              echo "<td>" . $reg['idinstructor'] . "</td>";
              echo "<td>" . $reg['nombre'] . "</td>";
              echo "<td>" . $reg['sexo'] . "</td>";
              echo "<td>" . $reg['a_paterno'] . "</td>";
              echo "<td>" . $reg['a_materno'] . "</td>";
              echo "<td>" . $reg['activo'] . "</td>";
              echo "<td>" . $reg['carrera'] . "</td>";
              $idinstructor = $reg['idinstructor'];
              echo "<td><a href='../controlador/CrudInstrcutor.php?id=" . $reg['idinstructor'] . "' class='btn btn-danger $habilita'>
              Eliminar</a></td><td>
              <a href='#' class='btn btn-primary' onclick='Editar($idinstructor);'>
              actualizar</a> ";
              echo  " </td>";
              echo "<tr>";
          }
          closeConexion($con);
      }

      public function obtenerBuscando($buscandoValor)
      {
          include_once 'conexion.php';
          include_once 'validaSesion.php';
          $session = new Session();
          $con = regresarConexion();
          $consulta = "select i.idinstructor,i.nombre,i.sexo,i.a_paterno,i.a_materno,i.activo, c.carrera from instructor i
          inner join carreras c
          on i.idcarrera=c.idcarrera  where i.nombre like '%$buscandoValor%'";
          $habilita = $session->getHabilita();
          $reguistros = mysqli_query($con, $consulta) or
              die("Problema de conexion con la base de datos" . mysqli_error($con));
          while ($reg = mysqli_fetch_array($reguistros)) {
              echo "<tr>";
              echo "<td>" . $reg['idinstructor'] . "</td>";
              echo "<td>" . $reg['nombre'] . "</td>";
              echo "<td>" . $reg['sexo'] . "</td>";
              echo "<td>" . $reg['a_paterno'] . "</td>";
              echo "<td>" . $reg['a_materno'] . "</td>";
              echo "<td>" . $reg['activo'] . "</td>";
              echo "<td>" . $reg['carrera'] . "</td>";
              $idinstructor = $reg['idinstructor'];
              echo "<td><a href='../controlador/CrudInstrcutor.php?id=" . $reg['idinstructor'] . "' class='btn btn-danger $habilita'>
              Eliminar</a></td><td>
              <a href='#' class='btn btn-primary' onclick='Editar($idinstructor);'>
              actualizar</a> ";
              echo  " </td>";
              echo "<tr>";
          }
          closeConexion($con);
      }

      public function actualizar($nombre, $sexo, $paterno, $materno, $id)
      {
          include_once 'conexion.php';
          $con = regresarConexion();
          mysqli_query($con, "update instructor set nombre=$nombre,sexo=$sexo,a_paterno=$paterno,a_materno=$materno where idinstructor=$id");
          closeConexion($con);
      }

      public function eliminar($id)
      {
          include_once  'conexion.php';
          $con = regresarConexion();
          mysqli_query($con, "update instructor set activo = 0 where idinstructor=$id")
              or die("Problemas al eliminar" . mysqli_error($con));
              closeConexion($con);
      }
  }
  ?>
