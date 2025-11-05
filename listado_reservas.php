<?php
require_once("funcionesBD.php");
$conexion = obtenerConexion();

$sql = "SELECT r.id_reservation, r.name AS nombre_reserva, 
               r.reservation_date, r.is_active, r.comment, 
               u.name AS usuario, a.name AS actividad
        FROM reservation r
        JOIN user u ON r.id_user = u.id_user
        JOIN activity a ON r.id_activity = a.id_activity
        ORDER BY r.id_reservation ASC;";

//Ejecutar consulta
$resultado = mysqli_query($conexion, $sql);

//Montar tabla
$mensaje = "<h2 class='text-center'>Listado de Reservas</h2>";
$mensaje .= "<table class='table table-striped'>";
$mensaje .= "<thead><tr><th>ID</th><th>Nombre</th><th>ID Usuario</th><th>ID Actividad</th><th>Fecha Reserva</th><th>Esta Activa</th></tr></thead>";
$mensaje .= "<tbody>";

// Recorrer filas mientras $fila != null
// OJO: es una asignación a la variable $fila y después se evalua $fila != null
while ($fila = mysqli_fetch_assoc($resultado)) {
    $mensaje .= "<td>" . $fila['id_reservation'] . "</td>";
    $mensaje .= "<td>" . $fila['name_reservation'] . "</td>";
    $mensaje .= "<td>" . $fila['id_user'] . "</td>";
    $mensaje .= "<td>" . $fila['id_activity'] . "</td>";
    $mensaje .= "<td>" . $fila['reservation_date'] . "</td>";

    $mensaje .= "<td><form class='d-inline me-1' action='editar_reserva.php' method='post'>";
    $mensaje .= "<input type='hidden' name='reservation' value='" . htmlspecialchars(json_encode($fila), ENT_QUOTES) . "' />";
    $mensaje .= "<button name='Editar' class='btn btn-primary'><i class='bi bi-pencil-square'></i></button></form>";

    $mensaje .= "<form class='d-inline' action='proceso_borrar_reserva.php' method='post'>";
    $mensaje .= "<input type='hidden' name='id_reservation' value='" . $fila['id_reservation']  . "' />";
    $mensaje .= "<button name='Borrar' class='btn btn-danger'><i class='bi bi-trash'></i></button></form>";

    $mensaje .= "</td></tr>";
}
