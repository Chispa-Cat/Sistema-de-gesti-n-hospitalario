<?php
include("conexionbd.php");
$conn = conexion();

// Verificar si la conexión se realizó correctamente
if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
}

$paciente = isset($_POST['PACIENTE']) ? mysqli_real_escape_string($conn, $_POST['PACIENTE']) : '';
$medico = isset($_POST['MEDICO']) ? mysqli_real_escape_string($conn, $_POST['MEDICO']) : '';
$fecha = isset($_POST['FECHA_VISITA']) ? mysqli_real_escape_string($conn, $_POST['FECHA_VISITA']) : '';
$diagnostico = isset($_POST['DIAGNOSTICO']) ? mysqli_real_escape_string($conn, $_POST['DIAGNOSTICO']) : '';
$tratamiento = isset($_POST['TRATAMIENTO']) ? mysqli_real_escape_string($conn, $_POST['TRATAMIENTO']) : '';
$id = isset($_POST['ID_HIST']) ? mysqli_real_escape_string($conn, $_POST['ID_HIST']) : '';


// Imprimir los valores recibidos para depuración

if ($paciente && $medico && $fecha && $diagnostico && $tratamiento && $id) {
    $sql = "UPDATE historial SET PACIENTE='$paciente', MEDICO='$medico', FECHA='$fecha', DIAGNOSTICO='$diagnostico', TRATAMIENTO='$tratamiento' WHERE ID_PACIENTE='$id'";
    
    // Imprimir la consulta SQL para depuración
    echo "Consulta SQL: $sql<br>";
    
    if (mysqli_query($conn, $sql)) {
        // Redirigir solo si la consulta se ejecuta correctamente
        header("Location: Uhistorial.php");
        exit();
    } else {
        echo "Error en la actualización: " . mysqli_error($conn);
    }
} else {
    echo "Todos los campos son obligatorios";
}

