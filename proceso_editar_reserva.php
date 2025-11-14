<?php
require_once("funcionesBD.php");
$conexion = obtenerConexion();

// Recuperar parámetros del formulario
$id_reservation = $_POST['id_reservation'];
$name = $_POST['name'];
$id_user = $_POST['id_user'];
$id_activity = $_POST['id_activity'];
$reservation_date = $_POST['reservation_date'];
$is_active = $_POST['is_active'];
$id_assessment = $_POST['id_assessment'];

// No validamos, suponemos que la entrada de datos es correcta

// Consulta UPDATE (sin campo status)
$sql = "UPDATE reservation 
        SET name = '$name',
            id_user = '$id_user',
            id_activity = '$id_activity',
            reservation_date = '$reservation_date',
            is_active = '$is_active',
            id_assessment = '$id_assessment'
        WHERE id_reservation = '$id_reservation';";

// Ejecutar consulta
$resultado = mysqli_query($conexion, $sql);

// Verificar errores y mostrar mensaje
if (mysqli_errno($conexion) != 0) {
    $numerror = mysqli_errno($conexion);
    $descrerror = mysqli_error($conexion);
    $mensaje = "<h2 class='text-center mt-5'>Se ha producido un error numero $numerror que corresponde a: $descrerror</h2>";
} else {
    $mensaje = "<h2 class='text-center mt-5'>Reserva modificada correctamente</h2>";
}

// Redirección tras 5 segundos
header("refresh:5;url=listado_reservas.php");

// Cabecera HTML
include_once("cabecera.html");

// Mostrar mensaje
echo $mensaje;
