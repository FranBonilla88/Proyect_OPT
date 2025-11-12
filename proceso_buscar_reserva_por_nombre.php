<?php
require_once("funcionesBD.php");
$conexion = obtenerConexion();

// Recuperar parámetro
$nombre_reserva = $_GET['name_reservation'];


$sql = "SELECT r.id_reservation, r.name AS name_reservation, r.id_user, r.id_activity, r.reservation_date, r.is_active, status
        FROM reservation r
        WHERE r.name LIKE '%$nombre_reserva%';";

$resultado = mysqli_query($conexion, $sql);

if (mysqli_num_rows($resultado) > 0) {    // Mostrar tabla de datos, hay datos
    $mensaje = "<h2 class='text-center'>Reserva Encontrada</h2>";
    $mensaje .= "<table class='table table-striped'>";
    $mensaje .= "<thead><tr><th>ID</th><th>Nombre</th><th>Id Usuario</th><th>Id Actividad</th><th>Fecha Reserva</th><th>¿Esta Activa?</th><th>Estado</th><th>Acciones</th></tr></thead>";
    $mensaje .= "<tbody>";


    while ($fila = mysqli_fetch_assoc($resultado)) {
        $mensaje .= "<tr>";
        $mensaje .= "<td>" . $fila['id_reservation'] . "</td>";
        $mensaje .= "<td>" . $fila['name_reservation'] . "</td>";
        $mensaje .= "<td>" . $fila['id_user'] . "</td>";
        $mensaje .= "<td>" . $fila['id_activity'] . "</td>";
        $mensaje .= "<td>" . date("d/m/Y H:i", strtotime($fila['reservation_date'])) . "</td>";
        $mensaje .= "<td>" . ($fila['is_active'] ? 'Sí' : 'No') . "</td>";
        $mensaje .= "<td>" . ucfirst($fila['status']) . "</td>";


        // input hidden para enviar idReserva a borrar
        $id_reserva = $fila['id_reservation'];

        // Formulario en la celda para procesar borrado del registro
        $mensaje .= "<td><form action='proceso_borrar_reserva.php' method='post'>
                        <input type='hidden' name='id_reservation' value='" . $fila['id_reservation'] . "' />
                        <button type='submit' name='btnBorrar' class='btn btn-danger'>
                            <i class='bi bi-trash'></i>
                        </button>
                    </form></td>";

        $mensaje .= "</tr>";
    }

    $mensaje .= "</tbody></table>";
} else { // No hay datos
    $mensaje = "<h2 class='text-center mt-5'>No hay reservas con el nombre $nombre_reserva</h2>";
}

// Insertamos cabecera
include_once("cabecera.html");

// Mostrar mensaje calculado antes
echo $mensaje;
