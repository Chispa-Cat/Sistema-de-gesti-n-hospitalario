<?php
include 'conexionbd.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM historial WHERE ID_HIST='$id'";

    if ($conn->query($sql) === TRUE) {
        echo "Historial eliminado correctamente.";
    } else {
        echo "Error al eliminar historial: " . $conn->error;
    }
}

$conn->close();
header("Location: historial.php");
exit;
?>