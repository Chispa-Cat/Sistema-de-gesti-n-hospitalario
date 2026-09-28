<?php
include("conexionbd.php");
$con = conexion();

// Debugging: Check if ID_PACIENTE is received


// Check if ID_PACIENTE is set in the URL and not empty
if (!empty($_GET['ID_CAMA'])) {
    $id = mysqli_real_escape_string($con, $_GET['ID_CAMA']);
    $sql = "SELECT * FROM camas WHERE ID_CAMA='$id'";
    $up = mysqli_query($con, $sql);

    if ($up && mysqli_num_rows($up) > 0) {
        $row = mysqli_fetch_array($up);
    } else {
        // Handle case where the patient is not found
        echo "Cama no encontrada.";
        exit;
    }
} else {
    // Handle case where ID_PACIENTE is not provided
    Header("location:camas.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Camas - Hospital IMSS</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>
<body>
    <header>
        <div class="logo">
            <img src="imss.png" alt="Logo IMSS">
            <h1 class="vip-text">VIP</h1>
        </div>
        <nav>
            <ul>
                <li><a href="inicio.html">Inicio</a></li>
                <li><a href="pacientes.html">Pacientes</a></li>
                <li><a href="medicos.html">Médicos</a></li>
                <li><a href="area.html">Areas</a></li>
                <li><a href="historial.html">Historial Médico</a></li>
                <li><a href="camas.html">Camas</a></li>
                <li><a href="equipos.html">Equipos Médicos</a></li>
            </ul>
        </nav>
    </header>
    <div class="form-container">
        <h2>Actualizar Camas</h2>

        <form action="UPDcamas.php" method="POST">

            <input type="hidden" name="ID_CAMA" value="<?= htmlspecialchars($row['ID_CAMA']) ?>">

            <div class="form-group">
                <label for="habitacion">Habitacion:</label>
                <input type="number" id="habitacion" name="HABITACION" value="<?= htmlspecialchars($row['HABITACION']) ?>">
            </div>

            <div class="form-group">
                <label for="area">Area:</label>
                <input type="text" id="area" name="AREA" value="<?= htmlspecialchars($row['AREA']) ?>" required>
            </div>

            <div class="form-group">
                <label for="estado">Estado:</label>
                <select name="ESTADO">
                    <option value="<?= htmlspecialchars($row['ESTADO']) ?>"><?= htmlspecialchars($row['ESTADO']) ?></option>
                    <option value="Ocupado">Ocupado</option>
                    <option value="Desocupado">Desocupado</option>
                </select>
            </div>

            <div class="form-group">
                <button type="submit">Actualizar</button>
            </div>

        </form>
    </div>
    <footer>
        <div class="container">
            <div class="social-icons">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
            </div>
            <p>&copy; 2024 Hospital IMSS - Todos los derechos reservados</p>
        </div>
    </footer>
    <button class="scroll-to-top" onclick="scrollToTop()"><i class="fas fa-arrow-up"></i></button>
</body>
</html>

<?php
$con->close();
?>

<style type="text/css">
body {
    font-family: 'Helvetica Neue', Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
    color: #333;
}

header {
    background-color: #3E785A;
    color: white;
    padding: 10px 0;
    display: flex;
    align-items: center;
    justify-content: space-between;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.logo {
    display: flex;
    align-items: center;
    margin-left: 20px;
}

.logo img {
    height: 50px;
}

.vip-text {
    margin-left: 10px;
    font-size: 24px;
    font-weight: bold;
    color: gold;
}

nav ul {
    list-style: none;
    display: flex;
    margin: 0;
    padding: 0;
}

nav ul li {
    margin-right: 20px;
}

nav ul li a {
    color: white;
    text-decoration: none;
    font-weight: bold;
    padding: 10px;
    transition: background-color 0.3s ease;
}

nav ul li a:hover {
    background-color: gold;
    color: #004d00;
    border-radius: 5px;
}

/* Contenedor del formulario */
.form-container {
    width: 80%;
    max-width: 600px;
    background: white;
    padding: 20px;
    margin: 2rem auto;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.form-container h2 {
    margin-bottom: 1rem;
    text-align: center;
}

.form-group {
    margin-bottom: 1rem;
}

.form-group label {
    display: block;
    margin-bottom: 0.5rem;
    font-weight: bold;
}

.form-group input,
.form-group select,
.form-group textarea {
    width: 100%;
    padding: 0.5rem;
    border: 1px solid #ccc;
    border-radius: 4px;
}

.form-group textarea {
    height: 100px;
}

.form-group button {
    width: 100%;
    padding: 0.75rem;
    border: none;
    border-radius: 4px;
    background-color: #007f3f;
    color: white;
    font-size: 1rem;
    cursor: pointer;
}

.form-group button:hover {
    background-color: #005f2f;
}


footer {
    background-color: #3E785A;
    color: white;
    text-align: center;
    padding: 10px 0;
    margin-top: 20px;
    display: flex;
    flex-direction: column;
    align-items: center;
}

.social-icons {
    margin-bottom: 10px;
}

.social-icons a {
    color: white;
    margin: 0 10px;
    text-decoration: none;
    font-size: 20px;
    transition: color 0.3s ease;
}

.social-icons a:hover {
    color: gold;
}

.scroll-to-top {
    position: fixed;
    bottom: 20px;
    right: 20px;
    background-color: #128c7e;
    color: #fff;
    border: none;
    padding: 10px;
    border-radius: 50%;
    cursor: pointer;
    display: none;
    transition: background-color 0.3s ease;
}

.scroll-to-top:hover {
    background-color: #0e6c5f;
}
</style>