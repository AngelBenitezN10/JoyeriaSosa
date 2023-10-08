<?php
include("Bd.php");
$con = conectar();

if (isset($_GET['id'])) {
    $ID = $_GET['id'];

    // Prepare and execute a SELECT query to retrieve IdProducto
    $stmt = $con->prepare("SELECT IdProducto FROM stock WHERE IdStock = ?");
    $stmt->bind_param("s", $ID);
    $stmt->execute();
    $stmt->bind_result($IDP);
    $stmt->fetch();
    $stmt->close();

    // Prepare and execute the DELETE query on Stock table
    $stmt = $con->prepare("DELETE FROM Stock WHERE IdStock = ?");
    $stmt->bind_param("s", $ID);
    $stmt->execute();
    $stmt->close();

    // Prepare and execute the UPDATE query on Producto table
    $stmt = $con->prepare("UPDATE Producto SET Alta = '0' WHERE IdProducto = ?");
    $stmt->bind_param("s", $IDP);
    $stmt->execute();
    $stmt->close();

    // Redirect the user to IndexStock.php
    header("Location: IndexStock.php");
    exit();
}
?>