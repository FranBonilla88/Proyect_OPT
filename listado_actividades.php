<?php
require_once("funcionesBD.php");
$conexion = obtenerConexion();

if(isset($_GET['orderByDate'])){
    $sql = "SELECT a.*, u.name AS trainer
        FROM activity a, user u 
        WHERE a.id_trainer = u.id_user 
        ORDER BY a.activity_day DESC;";

}elseif(isset($_GET['activityName'])){
    $value = $_GET['activityName'];
    $sql = "SELECT a.*, u.name AS trainer
        FROM activity a, user u 
        WHERE a.id_trainer = u.id_user AND a.name LIKE '%$value%';";
}elseif(isset($_GET['trainer'])){
    $value = $_GET['trainer'];
    $sql = "SELECT a.*, u.name AS trainer
        FROM activity a, user u 
        WHERE a.id_trainer = u.id_user AND u.id_user = $value;";
}else{
    $sql = "SELECT a.*, u.name AS trainer
        FROM activity a, user u 
        WHERE a.id_trainer = u.id_user;";
}

// Ejecutar consulta
$resultado = mysqli_query($conexion, $sql);

// Montar tabla
$mensaje = "<h2 class='text-center'>Listado de Actividades</h2>";
$mensaje .= "<table class='table table-striped'>";
$mensaje .= "<thead><tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Dia de la actividad</th>
                <th>Duracion</th>
                <th>¿Esta disponible?</th>
                <th>Entrenador</th>
                <th>Acciones</th>
             </tr></thead>";
$mensaje .= "<tbody>";

//Recorrer filas
while ($fila = mysqli_fetch_assoc($resultado)) {
    $mensaje .= "<tr><td>" . $fila['id_activity'] . "</td>";
    $mensaje .= "<td>" . $fila['name'] . "</td>";
    $mensaje .= "<td>" . $fila['description'] . "</td>";
    $mensaje .= "<td>" . $fila['activity_day'] . "</td>";
    $mensaje .= "<td>" . $fila['duration'] . "</td>";
    $mensaje .= "<td>" . ($fila['available'] ? 'Sí' : 'No') . "</td>";
    $mensaje .= "<td>" . $fila['trainer'] . "</td>";

    //Acciones
    $mensaje .= "<td>
                    <form class='d-inline me-1' action='editar_actividad.php' method='post'>
                        <input type='hidden' name='actividad' value='" . htmlspecialchars(json_encode($fila), ENT_QUOTES) . "' />
                        <button name='Editar' class='btn btn-primary'><i class='bi bi-pencil-square'></i></button>
                    </form>
                    <form class='d-inline' action='proceso_borrar_actividad.php' method='post'>
                        <input type='hidden' name='id_activity' value='" . $fila['id_activity'] . "' />
                        <button name='Borrar' class='btn btn-danger'><i class='bi bi-trash'></i></button>
                    </form>";

    $mensaje .= "</td></tr>";
}

$mensaje .= "</tbody></table>";

// Insertar cabecera
include_once("cabecera.html");

// Mostrar
echo $mensaje;
