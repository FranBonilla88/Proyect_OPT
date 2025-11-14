<?php
require_once("funcionesBD.php");
$conexion = obtenerConexion();

// Recuperamos parámetros del formulario
$name_reservation = $_POST['name_reservation'];
$id_user = $_POST['id_user'];
$id_activity = $_POST['id_activity'];
$reservation_date = $_POST['reservation_date'];
$is_active = $_POST['is_active'];
$id_assessment = $_POST['lstAssessment'];

// No validamos, suponemos que la entrada de datos es correcta

// Definimos la consulta INSERT
$sql = "INSERT INTO reservation(`id_reservation`, `name`, `id_user`, `id_activity`, `reservation_date`, `is_active`, `id_assessment`)  
        VALUES (NULL, '$name_reservation', $id_user, $id_activity, '$reservation_date', $is_active, $id_assessment);";

// Ejecutamos consulta
$resultado = mysqli_query($conexion, $sql);

// Verificamos si hay error y almacenar mensaje
if (mysqli_errno($conexion) != 0) {
    $numerror = mysqli_errno($conexion);
    $descrerror = mysqli_error($conexion);
    $mensaje =  "<h2 class='text-center mt-5'>Se ha producido un error número $numerror que corresponde a: $descrerror </h2>";
} else {
    $mensaje =  "<h2 class='text-center mt-5'>Reserva agregada correctamente</h2>";
}

// Redireccionar tras 5 segundos al index.
// Siempre debe ir antes de DOCTYPE
header("refresh:5;url=index.php");

// Aquí empieza la página
include_once("cabecera.html");

// Mostrar mensaje calculado antes
echo $mensaje;
