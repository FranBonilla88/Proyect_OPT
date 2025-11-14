<?php
require_once("funcionesBD.php");
$conexion = obtenerConexion();

// Recuperamos parámetro
$id_reservation = $_POST['id_reservation'];

// Definimos DELETE
$sql = "DELETE FROM reservation WHERE id_reservation = $id_reservation;";

// Ejecutamos consulta
$resultado = mysqli_query($conexion, $sql);

// Verificamos si hay error y almacenar mensaje
if (mysqli_errno($conexion) != 0) {
    $numerror = mysqli_errno($conexion);
    $descrerror = mysqli_error($conexion);
    $mensaje = "<h2 class='text-center mt-5'>Se ha producido un error número $numerror que corresponde a: $descrerror</h2>";
} else {
    $mensaje = "<h2 class='text-center mt-5'>Reserva con id $id_reservation borrada correctamente</h2>";
}

// Redireccionar tras 5 segundos al index (siempre antes de DOCTYPE)
header("refresh:5;url=index.php");

// Insertar cabecera
include_once("cabecera.html");

// Mostrar mensaje
echo $mensaje;
