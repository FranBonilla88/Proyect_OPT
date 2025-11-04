<?php
require_once("funcionesBD.php");
$conexion = obtenerConexion();

// Recuperar parámetros
$id_user = $_POST['id_user'];
$id_activity = $_POST['id_activity'];
$reservation_date = $_POST['reservation_date'];
$is_active = $_POST['is_active'];
$comment = $_POST['comment'];

// No validamos, suponemos que la entrada de datos es correcta

// Definir insert
$sql = "INSERT INTO reservation(`id_reservation`, `id_user`, `id_activity`, `reservation_date`, `is_active`, `comment`)  
                VALUES (null,'" . $id_user . "', '" . $id_activity . "', '" . $reservation_date . "', '" . $is_active . "', '" . $comment . "' );";

// Ejecutar consulta
$resultado = mysqli_query($conexion, $sql);

// Verificar si hay error y almacenar mensaje
if (mysqli_errno($conexion) != 0) {
    $numerror = mysqli_errno($conexion);
    $descrerror = mysqli_error($conexion);
    $mensaje =  "<h2 class='text-center mt-5'>Se ha producido un error numero $numerror que corresponde a: $descrerror </h2>";
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

?>
</body>

</html>