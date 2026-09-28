<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medicos - Hospital IMSS</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="styles.css"> <!-- Enlace al archivo CSS -->
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
<main>
    <section class="table-section">
        <h2>Lista de Areas</h2>
        <table id="areasTable">
            <thead>
                <tr>
                    <th>ID Area</th>
                    <th>Nombre</th>
                    <th>Ubicacion</th>
                    <th>Número de Teléfono</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'conexionbd.php';
                $conn = conexion();

                // Insertar paciente
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $nombre = $_POST['nombre'];
                    $ubicacion = $_POST['ubicacion'];
                    $numero = $_POST['numero'];

                    $sql = $conn->prepare("INSERT INTO areas (NOMBRE, UBICACION, NUMERO) VALUES (?, ?, ?)");
                    $sql->bind_param("sssssss",'$nombre', '$ubicacion', '$numero');
                    
                    if ($conn->query($sql) === TRUE) {
                        echo "Area registrada correctamente.";
                    } else {
                        echo "Error al registrar Area: " . $conn->error;
                    }
                }

                // Mostrar pacientes
                $sql = "SELECT * FROM areas";
$result = $conn->query($sql);

// Verificar si hay resultados
if ($result->num_rows > 0) {
    // Iterar sobre cada fila de resultados
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["ID_AREA"] . "</td>";
        echo "<td>" . $row["NOMBRE"] . "</td>";
        echo "<td>" . $row["UBICACION"] . "</td>";
        echo "<td>" . $row["NUMERO"] . "</td>";
        echo '<td class="actions">';
        echo '<a href="Uarea.php?ID_AREA' . $row["ID_AREA"] . '" class="update"><i class="fas fa-pencil-alt"></i></a>';
        echo '<a href="Darea.php?ID_AREA' . $row["ID_AREA"] . '" class="delete"><i class="fas fa-trash"></i></a>';
        echo '</td>';
        echo "</tr>";
    }
} else {
    // Si no hay resultados, mostrar un mensaje
    echo "<tr><td colspan='9'>No hay areas registradas.</td></tr>";
}

// Cerrar la conexión a la base de datos
$conn->close();
?>
            </tbody>
        </table>
    </section>
</main>

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
    <script>
        window.onscroll = function() {
            const button = document.querySelector('.scroll-to-top');
            if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
                button.style.display = "block";
            } else {
                button.style.display = "none";
            }
        };

        function scrollToTop() {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }
    </script>
</body>
</html>

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

h1 {
    margin: 0;
    font-size: 2em;
}

.table-section {
    background-color: white;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    margin: 20px auto;
    width: 90%;
    max-width: 1200px;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

th, td {
    padding: 10px;
    border-bottom: 1px solid #ccc;
    text-align: left;
}

th {
    background-color: #2ecc71;
    color: white;
}

tr:nth-child(even) {
    background-color: #f9f9f9;
}

.actions {
    display: flex;
    gap: 10px;
}

.actions .update, .actions .delete {
    color: #2ecc71;
    text-decoration: none;
    transition: color 0.3s;
}

.actions .update:hover {
    color: #27ae60;
}

.actions .delete:hover {
    color: #c0392b;
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