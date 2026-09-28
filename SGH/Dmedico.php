<?php
include 'conexionbd.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM medicos WHERE ID_MEDICO='$id'";

    if ($conn->query($sql) === TRUE) {
        echo "Medico eliminado correctamente.";
    } else {
        echo "Error al eliminar medico: " . $conn->error;
    }
}

$conn->close();
header("Location: medicos.php");
exit;
?>
