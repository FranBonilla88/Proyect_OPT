<?php

include_once("funcionesBD.php");

$conexion = obtenerConexion();

$nombre = $_POST["txtNombre"];
$descripcion = $_POST["txtDescripcion"];
$dia = $_POST["dateActivityDay"];
$duracion = $_POST["numberDuration"];
$disponibilidad = $_POST["boolAvalible"];

