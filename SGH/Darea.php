<?php
include 'conexionbd.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM areas WHERE ID_AREA='$id'";

    if ($conn->query($sql) === TRUE) {
        echo "Area eliminada correctamente";
    } else {
        echo "Error al eliminar area: " . $conn->error;
    }
}

$conn->close();
header("Location: area.php");
exit;
?>