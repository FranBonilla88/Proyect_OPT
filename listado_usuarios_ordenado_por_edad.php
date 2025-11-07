<?php
require_once("funcionesBD.php");
$conexion = obtenerConexion();

// Listamos todos los usuarios ordenados por edad
$sql = "SELECT * FROM user ORDER BY age ASC;";

// Ejecutar consulta
$resultado = mysqli_query($conexion, $sql);

// Montar tabla
$mensaje = "<h2 class='text-center'>Listado de usuarios por edad</h2>";
$mensaje .= "<table class='table table-striped'>";
$mensaje .= "<thead><tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Fecha registro</th>
                <th>Edad</th>
                <th>VIP</th>
                <th>Observación</th>
                <th>Acción</th>
             </tr></thead>";
$mensaje .= "<tbody>";

// Recorrer filas
while ($fila = mysqli_fetch_assoc($resultado)) {
    $mensaje .= "<tr>";
    $mensaje .= "<td>" . $fila['id_user'] . "</td>";
    $mensaje .= "<td>" . $fila['name'] . "</td>";
    $mensaje .= "<td>" . $fila['email'] . "</td>";
    $mensaje .= "<td>" . $fila['registration_date'] . "</td>";
    $mensaje .= "<td>" . $fila['age'] . "</td>";
    $mensaje .= "<td>" . ($fila['vip'] == 1 ? "Sí" : "No") . "</td>";
    $mensaje .= "<td>" . $fila['observation'] . "</td>";

    // Botones de acción
    $mensaje .= "<td>
                    <form class='d-inline me-1' action='editar_usuario.php' method='post'>
                        <input type='hidden' name='usuario' value='" . htmlspecialchars(json_encode($fila), ENT_QUOTES) . "' />
                        <button name='Editar' class='btn btn-primary'><i class='bi bi-pencil-square'></i></button>
                    </form>
                    <form class='d-inline' action='proceso_borrar_usuario.php' method='post'>
                        <input type='hidden' name='id_user' value='" . $fila['id_user'] . "' />
                        <button name='Borrar' class='btn btn-danger'><i class='bi bi-trash'></i></button>
                    </form>
                 </td>";
    $mensaje .= "</tr>";
}

// Cerrar tabla
$mensaje .= "</tbody></table>";

// Insertamos cabecera
include_once("cabecera.html");

// Mostrar mensaje calculado antes
echo $mensaje;
