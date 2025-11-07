<?php
require_once("funcionesBD.php");
$conexion = obtenerConexion();

// Recuperar parámetro
$id_reservation = $_POST['id_reservation'];

// Definir DELETE
$sql = "DELETE FROM reservation WHERE id_reservation = $id_reservation;";

// Ejecutar consulta
$resultado = mysqli_query($conexion, $sql);

// Verificar si hay error y almacenar mensaje
if (mysqli_errno($conexion) != 0) {
    $numerror = mysqli_errno($conexion);
    $descrerror = mysqli_error($conexion);
    $mensaje = "<h2 class='text-center mt-5'>Se ha producido un error número $numerror que corresponde a: $descrerror</h2>";
} else {
    $mensaje = "<h2 class='text-center mt-5'>Reserva con id $id_reservation borrado correctamente</h2>";
}
// Redireccionar tras 5 segundos al index.
// Siempre debe ir antes de DOCTYPE
header("refresh:5;url=index.php");

// Insertamos cabecera
include_once("cabecera.html");

// Mostrar mensaje calculado antes
echo $mensaje;
