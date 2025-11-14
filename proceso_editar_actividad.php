<?php
require_once("funcionesBD.php");
$conexion = obtenerConexion();

// Recuperar parámetros del formulario
$id_activity = $_POST['id_activity'];
$name = $_POST['nameActivity'];
$description = $_POST['descriptionActivity'];
$activity_day = $_POST['activityDay'];
$duration = $_POST['numDuration'];
$avalible = $_POST['boolAvalible'];
$trainer  = $_POST['idTrainer'];

// No validamos, suponemos que la entrada de datos es correcta

// Definir UPDATE
$sql = "UPDATE activity
        SET name = '$name',
            description = '$description',
            activity_day = '$activity_day',
            duration = $duration,
            available = $avalible,
            id_trainer = $trainer
        WHERE id_activity = $id_activity;";

// Ejecutar consulta
$resultado = mysqli_query($conexion, $sql);

// Verificar si hay error y almacenar mensaje
if (mysqli_errno($conexion) != 0) {
    $numerror = mysqli_errno($conexion);
    $descrerror = mysqli_error($conexion);
    $mensaje = "<h2 class='text-center mt-5'>Se ha producido un error número $numerror que corresponde a: $descrerror</h2>";
} else {
    $mensaje = "<h2 class='text-center mt-5'>Actividad actualizada correctamente</h2>";
}

// Aquí empieza la página
include_once("cabecera.html");

// Mostrar mensaje calculado antes
echo $mensaje;
?>
</body>

</html>