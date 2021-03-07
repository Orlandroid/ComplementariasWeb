<?php

class Usuario
{

    public function insertar($usuario, $contra, $tipo)
    {
        include_once 'conexion.php';
        $con = regresarConexion();
        mysqli_query($con, "insert into usuarios(usuario,contraseña,tipo) values ('$usuario','$contra','$tipo')")
            or die("Error al ingresar al usuario" . mysqli_error($con));
        closeConexion($con);
    }

    public function obtenerBuscando($buscandoValor)
    {
        include_once 'conexion.php';
        include_once 'validaSesion.php';
        $session = new Session();
        $con = regresarConexion();
        $consulta = "select * from usuarios where usuario like '%$buscandoValor%'";
        $habilita = $session->getHabilita();
        $reguistros = mysqli_query($con, $consulta) or
        die("Problema en la consulta" . mysqli_error($con));
        while ($reg = mysqli_fetch_array($reguistros)) {
            $reg['contraseña'] = hash('MD5', $reg['contraseña']);
            echo "<tr>";
            echo "<td>" . $reg['idusuarios'] . "</td>";
            echo "<td>" . $reg['usuario'] . "</td>";
            echo "<td>" . $reg['contraseña'] . "</td>";
            echo "<td>" . $reg['tipo'] . "</td>";
            echo "<td>" . $reg['activo'] . "</td>";
            $idusuarios = $reg['idusuarios'];
            echo "<td><a href='../controlador/CrudUsuario.php?id=" . $reg['idusuarios'] . "' class='btn btn-danger $habilita'>
            Eliminar</a><br></td><td>
            <a href='#' class='btn btn-primary' onclick='Editar($idusuarios);'>
            actualizar</a> ";
            echo  " </td>";
            echo "<tr>";
        }
        closeConexion($con);
    }


    public function obtener()
    {
        include_once 'conexion.php';
        include_once 'validaSesion.php';
        $session = new Session();
        $con = regresarConexion();
        $consulta = "select * from usuarios";
        $habilita = $session->getHabilita();
        $reguistros = mysqli_query($con, $consulta) or
        die("Problema en la consulta" . mysqli_error($con));
        while ($reg = mysqli_fetch_array($reguistros)) {
            $reg['contraseña'] = hash('MD5', $reg['contraseña']);
            echo "<tr>";
            echo "<td>" . $reg['idusuarios'] . "</td>";
            echo "<td>" . $reg['usuario'] . "</td>";
            echo "<td>" . $reg['contraseña'] . "</td>";
            echo "<td>" . $reg['tipo'] . "</td>";
            echo "<td>" . $reg['activo'] . "</td>";
            $idusuarios = $reg['idusuarios'];
            echo "<td><a href='../controlador/CrudUsuario.php?id=" . $reg['idusuarios'] . "' class='btn btn-danger $habilita'>
            Eliminar</a><br></td><td>
            <a href='#' class='btn btn-primary' onclick='Editar($idusuarios);'>
            actualizar</a> ";
            echo  " </td>";
            echo "<tr>";
        }
        closeConexion($con);
    }

    public function actualizar($usuario, $contra, $tipo, $id)
    {
        include_once 'conexion.php';
        $con = regresarConexion();
        mysqli_query($con, "update usuarios set usuario=$usuario, set contraseña=$contra,tipo=$tipo where idusuarios=$id");
        closeConexion($con);
    }

    public function eliminar($id)
    {
        include_once  'conexion.php';
        $con = regresarConexion();
        mysqli_query($con, "update usuarios set activo = 0 where idusuarios=$id")
            or die("Problemas al eliminar" . mysqli_error($con));
            closeConexion($con);
    }
}
?>
