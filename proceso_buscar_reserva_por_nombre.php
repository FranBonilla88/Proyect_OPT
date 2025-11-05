<?php
require_once("funcionesBD.php");
$conexion = obtenerConexion();

// Se hacen dos consultas porque el formulario necesita
// mostrar usuarios y actividades en listas desplegables.

$sqlUsuarios = "SELECT id_user, name FROM user;";
$sqlActividades = "SELECT id_activity, name FROM activity;";

$resultadoUsuarios = mysqli_query($conexion, $sqlUsuarios);
$resultadoActividades = mysqli_query($conexion, $sqlActividades);

if (mysqli_num_rows($resultadoUsuarios) > 0 && mysqli_num_rows($resultadoActividades) > 0) {
    $mensaje = "<h2 class='text-center'></h2>";
    $mensaje .= "<table class='table table-striped'>";
    $mensaje .= "<thead><tr><th>IDCOMPONENTE</th><th>NOMBRE</th><th>DESCRIPCION</th><th>PRECIO</th><th>TIPO</th><th>ACCION</th></tr></thead>";
    $mensaje .= "<tbody>";
}
