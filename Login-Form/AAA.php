<?php
	require("Bd.php");
	$conn=conectar();

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Consulta SQL
$sql = "SELECT * FROM material";

// Ejecutar la consulta
$result = $conn->query($sql);

// Verificar si hay resultados
if ($result->num_rows > 0) {
    // Crear el select
    echo "<select>";

    // Iterar sobre los resultados y generar las opciones del select
    while ($row = $result->fetch_assoc()) {
        $id = $row["Id_Material"];
        $nombre = $row["material"];
        echo "<option value='$id'>$nombre</option>";
    }

    echo "</select>";
} else {
    echo "No se encontraron resultados.";
}

// Cerrar la conexión
$conn->close();
?>