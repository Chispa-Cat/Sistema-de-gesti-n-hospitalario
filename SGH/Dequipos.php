<?php
include 'conexionbd.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM equipos WHERE ID_EQUIPO='$id'";

    if ($conn->query($sql) === TRUE) {
        echo "Equipo eliminada correctamente";
    } else {
        echo "Error al eliminar equipo: " . $conn->error;
    }
}

$conn->close();
header("Location: equipos.php");
exit;
?>