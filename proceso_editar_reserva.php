<?php
require_once("funcionesBD.php");
$conexion = obtenerConexion();

//Recuperar parámetros del formulario
$id_reservation = $_POST['id_reservation'];
$name = $_POST['name'];
$id_user = $_POST['id_user'];
$id_activity = $_POST['id_activity'];
$reservation_date = $_POST['reservation_date'];
$is_active = $_POST['is_active'];
$status = $_POST['status'];

// No validamos, suponemos que la entrada de datos es correcta

//Definir UPDATE
$sql = "UPDATE reservation
        SET name = '$name',
            id_user = '$id_user',
            id_activity = '$id_activity',
            reservation_date = '$reservation_date',
            is_active = '$is_active',
            status = '$status'
        WHERE id_reservation = $id_reservation;";

//Ejecutar consulta
$resultado = mysqli_query($conexion, $sql);

// Verificar si hay error y almacenar mensaje
if (mysqli_errno($conexion) != 0) {
    $numerror = mysqli_errno($conexion);
    $descrerror = mysqli_error($conexion);
    $mensaje = "<h2 class='text-center mt-5'>Se ha producido un error número $numerror que corresponde a: $descrerror</h2>";
} else {
    $mensaje = "<h2 class='text-center mt-5'>Reserva actualizada correctamente</h2>";
}
// Redireccionar tras 5 segundos al index.
// Siempre debe ir antes de DOCTYPE
header("refresh:5;url=index.php");

// Aquí empieza la página
include_once("cabecera.html");

// Mostrar mensaje calculado antes
echo $mensaje;
