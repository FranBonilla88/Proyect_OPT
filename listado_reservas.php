<?php
require_once("funcionesBD.php");
$conexion = obtenerConexion();

// Consulta con JOIN para traer ID y texto del assessment
$sql = "SELECT r.id_reservation, 
               r.name AS name_reservation, 
               r.id_user, 
               r.id_activity, 
               r.reservation_date, 
               r.is_active, 
               r.id_assessment,             
               s.value AS assessment_value
        FROM reservation r
        LEFT JOIN assessment s ON r.id_assessment = s.id_assessment
        ORDER BY r.id_reservation ASC;";

// Ejecutamos la consulta
$resultado = mysqli_query($conexion, $sql);

// Montamos la tabla
$mensaje = "<h2 class='text-center'>Listado de Reservas</h2>";
$mensaje .= "<table class='table table-striped'>";
$mensaje .= "<thead><tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Id Usuario</th>
                <th>Id Actividad</th>
                <th>Fecha Reserva</th>
                <th>¿Está activa?</th>
                <th>Valoración</th>
                <th>Acciones</th>
                </tr></thead>";
$mensaje .= "<tbody>";

// Recorremos las filas
while ($fila = mysqli_fetch_assoc($resultado)) {

    $mensaje .= "<tr><td>" . $fila['id_reservation'] . "</td>";
    $mensaje .= "<td>" . $fila['name_reservation'] . "</td>";
    $mensaje .= "<td>" . $fila['id_user'] . "</td>";
    $mensaje .= "<td>" . $fila['id_activity'] . "</td>";
    $mensaje .= "<td>" . date("d/m/Y H:i", strtotime($fila['reservation_date'])) . "</td>";
    $mensaje .= "<td>" . ($fila['is_active'] ? 'Sí' : 'No') . "</td>";
    $mensaje .= "<td>" . ($fila['assessment_value'] ? ucfirst($fila['assessment_value']) : '-') . "</td>";

    // Acciones
    $mensaje .= "<td>
                    <form class='d-inline me-1' action='editar_reserva.php' method='post'>
                        <input type='hidden' name='reserva' value='" . htmlspecialchars(json_encode($fila), ENT_QUOTES) . "' />
                        <button name='Editar' class='btn btn-primary'><i class='bi bi-pencil-square'></i></button>
                    </form>
                    <form class='d-inline' action='proceso_borrar_reserva.php' method='post'>
                        <input type='hidden' name='id_reservation' value='" . $fila['id_reservation'] . "' />
                        <button name='Borrar' class='btn btn-danger'><i class='bi bi-trash'></i></button>
                    </form>
                 </td></tr>";
}

$mensaje .= "</tbody></table>";

// Insertar cabecera
include_once("cabecera.html");

// Mostrar
echo $mensaje;
