
<?php 
	require("Bd.php");
	$con=conectar();
	$message = null;
	if (!empty($_POST['Nombre'])){
	    	if (!empty($_POST['Material'])){
	    		if (!empty($_POST['Precio'])){
	    			if(!empty($_POST['Proveedor'])){
	    				$Nombre=$_POST['Nombre'];
	    				$Material=$_POST['Material'];
	    				$Precio=$_POST['Precio'];
	    				$Proveedor=$_POST['Proveedor'];
	    				$tipojoyeria =$_POST['TipoProducto'];
	    				$sql="INSERT INTO  producto VALUES ('0','$Nombre','$Material','$Precio','$Proveedor','$tipojoyeria','0')";
	    				$query= mysqli_query($con,$sql);
	    				if ($query) {
								$message = "Producto Agregado Correctamente";
	    				}
	    		}
	    		else{
	    			$message = "Falta colocar el precio";
	    		}
	    	}
		}
		else{
			$message = "Falta agregar un Nombre al producto";
		}
	}
    $sql = "SELECT * FROM material";
	$result = $con->query($sql);
    $sql = "SELECT * FROM Proveedor";
    $prov = $con->query($sql);
    $sql = "SELECT * FROM `tipojoyeria` ORDER BY NombreJoyeria";
	$Tipo = $con->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Crear Cliente ││ Joyeria Sosa</title>
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
			<form action="AddArt.php" method="post">
				<?php if (!empty($message)): ?>
				<p> <?= $message ?> </p>
				<?php endif; ?>
				<!-- Cliente -->
				<label for="Nombre">Nombre Del Producto</label>
				<input type="text" name="Nombre" placeholder="Ingrese el nombre del Producto">
				<label for="TipoProducto">Tipo de Producto</label>
                <br>
				<select name="TipoProducto">
				    <?php
				    if ($Tipo->num_rows > 0) {
				        while ($row = $Tipo->fetch_assoc()) {
				            $id = $row["IdTipo"];
				            $nombre = $row["NombreJoyeria"];
				            echo "<option value='$id'>$nombre</option>";
				        }
				    }
				    	?>
				</select>
					<br><br>
					<label for="Material">Material</label>
					<br>
					<select name="Material">
					    <?php
					    if ($result->num_rows > 0) {
					        while ($row = $result->fetch_assoc()) {
					            $id = $row["IdMaterial"];
					            $nombre = $row["Material"];
					            echo "<option value='$id'>$nombre</option>";
					        }
					    }
					    ?>
					</select>
					<br><br>
				<label for="Precio">Precio</label>
				<input type="text" name="Precio" placeholder="Ingrese El Precio $">
				<label for="Precio">Proveedor</label>
				<br>
				<select name="Proveedor">
				    <?php
				    if ($prov->num_rows > 0) {
				        while ($row = $prov->fetch_assoc()) {
				            $id = $row["Id_Proveedor"];
				            $nombre = $row["Nombre"];
				            echo "<option value='$id'>$nombre</option>";
				        }
				    }
				    ?>
				</select>
                <br>
                <br>
				
				<input type="submit" value="Guardar Cliente">
			</form>
			
		</div>
	</div>
</body>
</html>