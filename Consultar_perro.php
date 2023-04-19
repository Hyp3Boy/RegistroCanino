<?php
// Conexion a la base de datos
$mysqli = new mysqli("localhost", "root", "", "dbtest");

// Comprobar si hay errores de conexión
if ($mysqli->connect_errno) {
    echo "Error de conexión: " . $mysqli->connect_error;
    exit();
}

// Capturar datos
$v2 = $_REQUEST['Nombre'];

// Consulta SQL con parámetros preparados
$stmt = $mysqli->prepare("SELECT * FROM Perros WHERE Nombre LIKE ?");
$stmt->bind_param("s", $v2);
$stmt->execute();

// Obtener resultados
$resultado = $stmt->get_result();

// Mostrar información de los perros y detalles
$num_resultados = $resultado->num_rows;
echo "<p>Número de perros encontrados: " . $num_resultados . "</p>";

while ($row = $resultado->fetch_assoc()) {
    echo ($i + 1);
    echo " DNI : " . $row["DNI"];
    echo "</br>Nombre : " . $row["Nombre"];
    echo "</br>Raza : " . $row["Raza"];
    echo "</br>Género : " . $row["Genero"];
    echo "</br>Nació en : " . $row["FechaNacimiento"];
    echo "</p>";
}

// Cerrar la conexión
$stmt->close();
$mysqli->close();
?>

