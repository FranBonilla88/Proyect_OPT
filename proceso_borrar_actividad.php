<?php
require_once("funcionesBD.php");
$conexion = obtenerConexion();

// Recuperar parámetro
$id_activity = $_POST['id_activity'];

// Definir DELETE
$sql = "DELETE FROM activity WHERE id_activity = $id_activity;";

// Ejecutar consulta
$resultado = mysqli_query($conexion, $sql);

// Verificar si hay error y almacenar mensaje
if (mysqli_errno($conexion) != 0) {
    $numerror = mysqli_errno($conexion);
    $descrerror = mysqli_error($conexion);
    $mensaje = "<h2 class='text-center mt-5'>Se ha producido un error número $numerror que corresponde a: $descrerror</h2>";
} else {
    $mensaje = "<h2 class='text-center mt-5'>Actividad con id $id_activity borrado correctamente</h2>";
}

// Insertamos cabecera
include_once("cabecera.html");

// Mostrar mensaje calculado antes
echo $mensaje;
