<?php
require_once("funcionesBD.php");
$conexion = obtenerConexion();

// Recuperar parámetro
$nombre_usuario = $_GET['txtNombreUsuario'];

// Aquí te muestro la versión simple, similar a la tuya:
$sql = "SELECT * 
        FROM user 
        WHERE name LIKE '%$nombre_usuario%';";


$resultado = mysqli_query($conexion, $sql);

if (mysqli_num_rows($resultado) > 0) { // Mostrar tabla de datos, hay datos

    $mensaje = "<h2 class='text-center'>USUARIO ENCONTRADO</h2>";
    $mensaje .= "<table class='table'>";
    $mensaje .= "<thead><tr><th>IDUSUARIO</th><th>NOMBRE</th><th>EMAIL</th><th>FECHA REGISTRO</th><th>EDAD</th><th>VIP</th><th>OBSERVACION</th><th>ACCION</th></tr></thead>";
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
        $mensaje .= "<td>
                    <form action='proceso_borrar_usuario.php' method='post'>
                        <input type='hidden' name='id_user' value='" . $fila['id_user'] . "' />
                        <button type='submit' name='btnBorrar' class='btn btn-danger'>
                            <i class='bi bi-trash'></i>
                        </button>
                    </form>
                 </td>";

        $mensaje .= "</tr>";
    }

    $mensaje .= "</tbody></table>";
} else { // No hay datos
    $mensaje = "<h2 class='text-center mt-5'>No hay usuarios con nombre $nombre_usuario</h2>";
}

// Insertamos cabecera
include_once("cabecera.html");

// Mostrar mensaje calculado antes
echo $mensaje;
