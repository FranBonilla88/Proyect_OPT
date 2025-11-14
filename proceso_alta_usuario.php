<?php
require_once("funcionesBD.php");
$conexion = obtenerConexion();

// Recuperar parámetros
$name_user = $_POST['name_user'];
$email = $_POST['email'];
$registration_date = $_POST['registration_date'];
$age = $_POST['age'];
$vip = $_POST['vip'];
$observation = $_POST['observation'];
$id_membership = $_POST['lstPlan'];

// No validamos, suponemos que la entrada de datos es correcta

// Definir insert
$sql = "INSERT INTO user(`id_user`, `name`, `email`, `registration_date`, `age`, `vip`, `observation`,`id_membership`) 
        VALUES (NULL, '" . $name_user . "', '" . $email . "', '" . $registration_date . "', $age,$vip, '" . $observation . "',$id_membership);";
//Los int(como es la edad) se ponen sin comillas

// Ejecutar consulta
$resultado = mysqli_query($conexion, $sql);

// Verificar si hay error y almacenar mensaje
if (mysqli_errno($conexion) != 0) {
    $numerror = mysqli_errno($conexion);
    $descrerror = mysqli_error($conexion);
    $mensaje =  "<h2 class='text-center mt-5'>Se ha producido un error numero $numerror que corresponde a: $descrerror </h2>";
} else {
    $mensaje =  "<h2 class='text-center mt-5'>Usuario registrado</h2>";
}
// Redireccionar tras 5 segundos al index.
// Siempre debe ir antes de DOCTYPE
header("refresh:5;url=index.php");

// Aquí empieza la página
include_once("cabecera.html");

// Mostrar mensaje calculado antes
echo $mensaje;
