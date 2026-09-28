<?php
include("conexionbd.php");
$conn = conexion();

// Verificar si la conexión se realizó correctamente
if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
}

$nombre = isset($_POST['NOMBRE']) ? mysqli_real_escape_string($conn, $_POST['NOMBRE']) : '';
$apellido = isset($_POST['APELLIDO']) ? mysqli_real_escape_string($conn, $_POST['APELLIDO']) : '';
$cargo = isset($_POST['CARGO']) ? mysqli_real_escape_string($conn, $_POST['CARGO']) : '';
$numero = isset($_POST['NUMERO']) ? mysqli_real_escape_string($conn, $_POST['NUMERO']) : '';
$correo = isset($_POST['CORREO']) ? mysqli_real_escape_string($conn, $_POST['CORREO']) : '';
$horas = isset($_POST['HORAS']) ? mysqli_real_escape_string($conn, $_POST['HORAS']) : '';
$area = isset($_POST['AREA']) ? mysqli_real_escape_string($conn, $_POST['AREA']) : '';
$id = isset($_POST['ID_MEDICO']) ? mysqli_real_escape_string($conn, $_POST['ID_MEDICO']) : '';


// Imprimir los valores recibidos para depuración

if ($nombre && $apellido && $cargo && $numero && $correo && $horas && $area && $id) {
    $sql = "UPDATE medicos SET NOMBRE='$nombre', APELLIDO='$apellido', CARGO='$cargo', NUMERO='$numero', CORREO='$correo', HORAS='$horas', AREA='$area' WHERE ID_MEDICO='$id'";
    
    // Imprimir la consulta SQL para depuración
    echo "Consulta SQL: $sql<br>";
    
    if (mysqli_query($conn, $sql)) {
        // Redirigir solo si la consulta se ejecuta correctamente
        header("Location: Umedico.php");
        exit();
    } else {
        echo "Error en la actualización: " . mysqli_error($conn);
    }
} else {
    echo "Todos los campos son obligatorios";
}
