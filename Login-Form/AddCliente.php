
<?php
require("Bd.php");

$con = conectar();
$message = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $Dni = $_POST['dni'];
    $Apellido = $_POST['apellido'];
    $Nombre = $_POST['nombres'];
    $Contacto = $_POST['contacto'];

    if (!empty($Dni) && !empty($Apellido) && !empty($Nombre) && !empty($Contacto)) {
        $sql = "INSERT INTO cliente (IdCliente, Apellido, Nombres, Contacto) VALUES ('$Dni', '$Apellido', '$Nombre', '$Contacto')";
        $query = mysqli_query($con, $sql);

        if ($query) {
            $message = "Cliente registrado correctamente";
        } else {
            $message = "Error al registrar el cliente: " . mysqli_error($con);
        }
    } else {
        $message = "Todos los campos son requeridos.";
    }
}

// Redirección a la página IndexClien.php con un mensaje
header("location: IndexClien.php?message=" . urlencode($message));
exit();
?>