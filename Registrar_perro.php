<?php
//conexion a la Base de datos (Servidor,usuario,password)
$conn = mysqli_connect("localhost", "root","", "dbtest");
if (!$conn) {
die("Error de conexion: " . mysqli_connect_error());
}

//capturando datos
//(nombre de la base de datos, $enlace) mysql_select_db("dbtest",$link);
//capturando datos
$v1 = $_REQUEST['DNI'];
$v2 = $_REQUEST['Nombre'];
$v3 = $_REQUEST['Raza'];
$v4 = $_REQUEST['Genero'];
$v5 = $_REQUEST['FechaNacimiento'];
$v6 = $_REQUEST['Foto'];
//conuslta SQL
$sql = "INSERT INTO Perros (DNI, Nombre, Raza, Genero, FechaNacimiento, Foto) ";
$sql .= "VALUES ('$v1', '$v2', '$v3', '$v4', '$v5', '$v6')";
if (mysqli_query($conn, $sql)) {
echo "<p>Ok, datos ingresados </p>";
} else {
echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
//Mensaje de conformidad
echo "<p>Los datos han sido ingresados satisfactoriamente</p>";
?>
