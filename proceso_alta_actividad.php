<?php

include_once("funcionesBD.php");

$conexion = obtenerConexion();

$nombre = $_POST["txtName"];
$descripcion = $_POST["txtDescription"];
$day = $_POST["dateActivityDay"];
$duration = $_POST["numberDuration"];
$isAvalible = $_POST["boolAvalible"] != "" ? 1 : 0;
$trainer = $_POST["keyTrainer"];



$sql = "INSERT INTO activity(`id_activity`,`name`,`description`,`activity_day`,`duration`,`available`,`id_trainer`)
        VALUES (NULL, '" . $nombre . "', '" . $descripcion . "', '" . $day . "', '" . $duration . "', '" . $isAvalible  . "', '" . $trainer . "');";

$result = mysqli_query($conexion, $sql);

if (mysqli_errno($conexion) != 0) {
    $numerror = mysqli_errno($conexion);
    $descrerror = mysqli_error($conexion);
    $mesage = "<h2 class='text-center mt-5'>Se ha producido un error numero $numerror que corresponde a: $descrerror </h2>";
} else {
    $mesage = "<h2 class='text-center mt-5'>Actividad registrada correctamente</h2>";
}

include_once("cabecera.html");

echo $mesage;
?>
</body>

</html>