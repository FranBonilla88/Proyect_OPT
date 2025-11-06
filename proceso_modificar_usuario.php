<?php
require_once("funcionesBD.php");
$conexion = obtenerConexion();

// Recuperar parámetros del formulario
$id_user = $_POST['id_user'];
$name = $_POST['txtNombre'];
$email = $_POST['txtEmail'];
$registration_date = $_POST['txtFecha'];
$age = $_POST['txtEdad'];
$vip = $_POST['txtVip'];
$observation  = $_POST['txtObservacion'];

// No validamos, suponemos que la entrada de datos es correcta

// Definir UPDATE
$sql = "UPDATE user 
        SET name = '$name',
            email = '$email',
            registration_date = '$registration_date',
            age = $age,
            vip = $vip,
            observation = '$observation'
        WHERE id_user = $id_user;";

// Ejecutar consulta
$resultado = mysqli_query($conexion, $sql);

// Verificar si hay error y almacenar mensaje
if (mysqli_errno($conexion) != 0) {
    $numerror = mysqli_errno($conexion);
    $descrerror = mysqli_error($conexion);
    $mensaje = "<h2 class='text-center mt-5'>Se ha producido un error número $numerror que corresponde a: $descrerror</h2>";
} else {
    $mensaje = "<h2 class='text-center mt-5'>Usuario actualizado correctamente</h2>";
}
// Redireccionar tras 5 segundos al index.
// Siempre debe ir antes de DOCTYPE
header("refresh:5;url=index.php");

// Aquí empieza la página
include_once("cabecera.html");

// Mostrar mensaje calculado antes
echo $mensaje;
?>