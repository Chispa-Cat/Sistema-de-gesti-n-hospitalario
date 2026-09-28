<?php
include("conexionbd.php");
$conn = conexion();

// Verificar si la conexión se realizó correctamente
if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
}

$nombre = isset($_POST['NOMBRE']) ? mysqli_real_escape_string($conn, $_POST['NOMBRE']) : '';
$apellido = isset($_POST['APELLIDO']) ? mysqli_real_escape_string($conn, $_POST['APELLIDO']) : '';
$fecha = isset($_POST['FECHA']) ? mysqli_real_escape_string($conn, $_POST['FECHA']) : '';
$genero = isset($_POST['GENERO']) ? mysqli_real_escape_string($conn, $_POST['GENERO']) : '';
$numero = isset($_POST['NUMERO']) ? mysqli_real_escape_string($conn, $_POST['NUMERO']) : '';
$correo = isset($_POST['CORREO']) ? mysqli_real_escape_string($conn, $_POST['CORREO']) : '';
$historial = isset($_POST['HISTORIAL']) ? mysqli_real_escape_string($conn, $_POST['HISTORIAL']) : '';
$id = isset($_POST['ID_PACIENTE']) ? mysqli_real_escape_string($conn, $_POST['ID_PACIENTE']) : '';


// Imprimir los valores recibidos para depuración

if ($nombre && $apellido && $fecha && $genero && $numero && $correo && $historial && $id) {
    $sql = "UPDATE pacientes SET NOMBRE='$nombre', APELLIDO='$apellido', FECHA='$fecha', GENERO='$genero', NUMERO='$numero', CORREO='$correo', HISTORIAL='$historial' WHERE ID_PACIENTE='$id'";
    
    // Imprimir la consulta SQL para depuración
    echo "Consulta SQL: $sql<br>";
    
    if (mysqli_query($conn, $sql)) {
        // Redirigir solo si la consulta se ejecuta correctamente
        header("Location: Upaciente.php");
        exit();
    } else {
        echo "Error en la actualización: " . mysqli_error($conn);
    }
} else {
    echo "Todos los campos son obligatorios";
}

