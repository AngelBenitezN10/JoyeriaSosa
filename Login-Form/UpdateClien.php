<?php
include("Bd.php");

$con = conectar();

if (!empty($_POST['dni']) && !empty($_POST['apellido']) && !empty($_POST['nombres']) && !empty($_POST['contacto'])) {
    $Dni = $_POST['dni'];
    $Apellido = $_POST['apellido'];
    $Nombre = $_POST['nombres'];
    $Contacto = $_POST['contacto'];

    $sql = "UPDATE cliente SET Apellido ='$Apellido', Nombres ='$Nombre', Contacto='$Contacto' WHERE IdCliente = $Dni";
    $query = mysqli_query($con, $sql);

    if ($query) {
        // Redirección después de una actualización exitosa
        header("location: ../Login-Form/IndexClien.php");
        exit(); // Asegura que el script se detenga después de la redirección
    } else {
        echo "Error en la actualización: " . mysqli_error($con);
        // Puedes manejar el error de otra manera si lo deseas
    }
} else {
    echo "Todos los campos son requeridos.";
    // Puedes manejar la falta de datos de otra manera si lo deseas
}
?>