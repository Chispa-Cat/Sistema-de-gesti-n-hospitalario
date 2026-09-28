<?php
include 'conexionbd.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM camas WHERE ID_CAMA='$id'";

    if ($conn->query($sql) === TRUE) {
        echo "Cama eliminada correctamente";
    } else {
        echo "Error al eliminar cama: " . $conn->error;
    }
}

$conn->close();
header("Location: camas.php");
exit;
?>