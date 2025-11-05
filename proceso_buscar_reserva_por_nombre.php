<?php
require_once("funcionesBD.php");
$conexion = obtenerConexion();

// Recuperar parámetro
$nombre_reserva = $_GET['name_reservation'];

// Se hacen dos consultas porque el formulario necesita
// mostrar usuarios y actividades en listas desplegables.

$sqlUsuarios = "SELECT id_user, name FROM user;";
$sqlActividades = "SELECT id_activity, name FROM activity;";

$resultadoUsuarios = mysqli_query($conexion, $sqlUsuarios);
$resultadoActividades = mysqli_query($conexion, $sqlActividades);

if (mysqli_num_rows($resultadoUsuarios) > 0 && mysqli_num_rows($resultadoActividades) > 0) {    // Mostrar tabla de datos, hay datos
    $mensaje = "<h2 class='text-center'></h2>";
    $mensaje .= "<table class='table table-striped'>";
    $mensaje .= "<thead><tr><th>ID</th><th>Nombre</th><th>ID Usuario</th><th>ID Actividad</th><th>Fecha Reserva</th><th>Esta Activa</th></tr></thead>";
    $mensaje .= "<tbody>";


    while ($fila = mysqli_fetch_assoc($resultadoUsuarios) && $fila = mysqli_fetch_assoc($resultadoActividades)) {
        $mensaje .= "<tr>";
        $mensaje .= "<td>" . $fila['id_reservation'] . "</td>";
        $mensaje .= "<td>" . $fila['name_reservation'] . "</td>";
        $mensaje .= "<td>" . $fila['id_user'] . "</td>";
        $mensaje .= "<td>" . $fila['id_activity'] . "</td>";
        $mensaje .= "<td>" . $fila['reservation_date'] . "</td>";

        // Formulario en la celda para procesar borrado del registro
        $mensaje .= "<td><form action='proceso_borrar_reserva.php' method='post'>";
        // input hidden para enviar idReserva a borrar
        $id_reserva = $fila['id_reservation'];
        $mensaje .= "<input type='hidden' name='id_reservation' value='$id_reserva' />";
        $mensaje .= "<button type='submit' name='btnBorrar' class='btn btn-primary'><i class='bi bi-trash'></i></button> </form> </td>";

        $mensaje .= "</tr>";
    }

    $mensaje .= "</tbody></table>";
} else { // No hay datos
    $mensaje = "<h2 class='text-center mt-5'>No hay reservas con el nombre $nombre_componente</h2>";
}

// Insertamos cabecera
include_once("cabecera.html");

// Mostrar mensaje calculado antes
echo $mensaje;
