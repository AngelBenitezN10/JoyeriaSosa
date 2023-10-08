<?php 
	require("Bd.php");
	$con=conectar();
	$message = null;
	if (!empty($_POST['Cuil'])){
	    	if (!empty($_POST['Nombre'])){
	    		if (!empty($_POST['Contacto'])){
	    			if(!empty($_POST['Material'])){
	    				$Cuil=$_POST['Cuil'];
	    				$Nombre=$_POST['Nombre'];
	    				$Contacto=$_POST['Contacto'];
	    				$Material=$_POST['Material'];
	    				$sql="INSERT INTO  proveedor VALUES ('$Cuil','$Nombre','$Contacto','$Material')";
	    				$query= mysqli_query($con,$sql);
	    				if ($query) {
								$message = "Proveedor Registrado Correctamente";
	    				}
	    		}
				else{
					$message = "Falta agregar un Material al Proveedor";
				}
	    	}
			else{
				$message = "Falta agregar un Nombre al Proveedor";
			}

		}
		else{
			$message = "Falta agregar un Apellido al Proveedor";
		}

	}
	else{
		$message = "Falta agregar el Cuil al Proveedor";
	}
	$sql = "SELECT * FROM material";
	$result = $con->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Crear Proveedor ││ Joyeria Sosa</title>
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
			<form action="AddProv.php" method="post">
				<!-- Cliente -->
				<label for="Cuil">CUIL ││ CUIT</label>
				<input type="text" name="Cuil" placeholder="Ingrese CUIL ││ CUIT">
				<label for="Nombre">Nombre</label>
				<input type="text" name="Nombre" placeholder="Ingrese Nombre">
				<label for="Contacto">Contacto</label>
				<input type="text" name="Contacto" placeholder="Ingrese Contacto">
				<label for="Material">Material</label>
				<select name="Material">
				<?php
				if ($result->num_rows > 0) {
					while ($row = $result->fetch_assoc()) {
						$id = $row["Id_Material"];
						$nombre = $row["Material"];
						echo "<option value='$id'>$nombre</option>";
					}
				
					echo "</select>";
				}
				?>
				<input type="submit" value="Guardar Proveedor">
				<br>
			</form>
		</div>
	</div>
</body>
</html>