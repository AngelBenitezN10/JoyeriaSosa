<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Procesar los datos del formulario
    $nombre = $_POST["nombre"];
    $email = $_POST["email"];

    // Realizar las operaciones necesarias, por ejemplo, guardar en la base de datos
    // Aquí puedes agregar tu lógica de manejo de datos

    // Redireccionar o mostrar un mensaje de éxito
    header("Location: index.html");
    exit();
}
?>
