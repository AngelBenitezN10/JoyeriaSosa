<?php 
require("Bd.php");
$con = conectar();
$message = null;

if (!empty($_POST['CEx'])) {
  if (!empty($_POST['CMin'])) {
    $Producto = $_POST['Producto'];
    $Ecxistente = $_POST['CEx'];
    $Minima = $_POST['CMin'];

    // Insert product into the stock table
    $sql = "INSERT INTO stock VALUES ('0', '$Producto', '$Ecxistente', '$Minima')";
    $query = mysqli_query($con, $sql);

    // Update the product's 'Alta' column to '1'
    $sql = "UPDATE producto SET Alta = '1' WHERE IdProducto = '$Producto'";
    $query = mysqli_query($con, $sql);

    if ($query) {
      $message = "Product added successfully.";
    }
  } else {
    $message = "Please enter the minimum required quantity.";
  }
} else {
  $message = "Please enter the existing quantity.";
}

// Select all products that are not marked as 'Alta'
$sql = "SELECT * FROM producto WHERE Alta <> '1'";
$result = $con->query($sql);

$con->close();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Crear Stock ││ Joyeria Sosa</title>
	<link rel="stylesheet" href="css/style_addc.css">
</head>
<body>
		 <header>
            <div class="interior">
                <a href="../Login-Form/Logout.php" class="logo"><img src="img/Logo.png" alt=""></a>
                <nav class="navegacion">
                	<li><a href="IndexJoy.php">Joyeria</a></li>
                    <li><a href="Ventas"></a>Ventas</li>
                    <li><a href="IndexClien.php">Cliente</a></li>
                    <li><a href="IndexStock.php">Stock</a></li>
                    <li><a href="IndexProv.php">Proveedor</a></li>
                    <li><a href="IndexMat.php">Material</a></li>
                </nav>
            </div>
        </header>
    <div class="Login-box2">
		<div class="Login-box">
			<?php if (!empty($message)): ?>
				<p> <?= $message ?> </p>
				<?php endif; ?>
			<form action="AddStock.php" method="post">
			<label for="Nombre">Nombre Del Articulo</label>
			<br>
				<select name="Producto">
				<?php
				if ($result->num_rows > 0) {
					while ($row = $result->fetch_assoc()) {
						$id = $row["IdProducto"];
						$nombre = $row["NombreProducto"];
						echo "<option value='$id'>$nombre</option>";
					}
				
					echo "</select>";
				}
				?>
				<br><br>
				<label for="CEx">Cantidad Actual</label>
				<input type="text" name="CEx" placeholder="Ingrese Cantidad Existente">
				<label for="CMin">Cantidad Minima</label>
				<input type="text" name="CMin" placeholder="Ingrese Cantidad Minima Reuquerida">
				<input type="submit" value="Actualizar Stock">
				<br>
			</form>
		</div>
	</div>
</body>
</html>