<?php
require_once("funcionesBD.php");
$conexion = obtenerConexion();

// Recuperar parámetro
$name_user = $_GET['name_user'];

$sql = "SELECT * 
        FROM user 
        WHERE name LIKE '%$name_user%';";


$resultado = mysqli_query($conexion, $sql);

if (mysqli_num_rows($resultado) > 0) { // Mostrar tabla de datos, hay datos

    $mensaje = "<h2 class='text-center'>Usuario Encontrado</h2>";
    $mensaje .= "<table class='table table-striped'>";
    $mensaje .= "<thead><tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Fecha Registro</th>
                <th>Edad</th>
                <th>VIP</th>
                <th>Observación</th>
                <th>Acción</th>
            </tr></thead>";
    $mensaje .= "<tbody>";

    while ($fila = mysqli_fetch_assoc($resultado)) {
        $mensaje .= "<tr>";
        $mensaje .= "<td>" . $fila['id_user'] . "</td>";
        $mensaje .= "<td>" . $fila['name'] . "</td>";
        $mensaje .= "<td>" . $fila['email'] . "</td>";
        $mensaje .= "<td>" . $fila['registration_date'] . "</td>";
        $mensaje .= "<td>" . $fila['age'] . "</td>";
        $mensaje .= "<td>" . ($fila['vip'] ? "Sí" : "No") . "</td>";
        $mensaje .= "<td>" . $fila['observation'] . "</td>";

        // Formulario en la celda para procesar borrado del usuario
        $mensaje .= "<td><form action='proceso_borrar_usuario.php' method='post'>
                        <input type='hidden' name='id_user' value='" . $fila['id_user'] . "' />
                        <button type='submit' name='btnBorrar' class='btn btn-danger'>
                            <i class='bi bi-trash'></i>
                        </button>
                    </form></td>";

        $mensaje .= "</tr>";
    }

    $mensaje .= "</tbody></table>";
} else { // No hay datos
    $mensaje = "<h2 class='text-center mt-5'>No hay usuarios con nombre $name_user</h2>";
}

// Insertamos cabecera
include_once("cabecera.html");

// Mostrar mensaje calculado antes
echo $mensaje;
