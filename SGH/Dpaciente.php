<?php
include 'conexionbd.php';
$conn= conexion();
if (isset($_GET['ID_PACIENTE'])) {
    $id = $_GET['ID_PACIENTE'];
    $sql = "DELETE FROM pacientes WHERE ID_PACIENTE='$id'";

    if ($conn->query($sql) === TRUE) {
        echo "Paciente eliminado correctamente.";
    } else {
        echo "Error al eliminar paciente: " . $conn->error;
    }
}

$conn->close();
header("Location: pacientes.php");
exit;
?>
