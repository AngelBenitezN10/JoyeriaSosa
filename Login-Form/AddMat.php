<?php 
	require("Bd.php");
	$con=conectar();
	$sql = "SELECT COUNT(*) AS total_filas FROM material";
	$result = $con->query($sql);
    $cont;
	$message = null;
	    	if (!empty($_POST['Material'])){
	    		$Material=$_POST['Material'];
	    		$sql="INSERT INTO  material VALUES ('0','$Material')";
	    		$query= mysqli_query($con,$sql);
	    		if ($query) {
						$message = "Material registrado Correctamente";
                    }
			}
		else{
			$message = "Falta agregar un Nombre al material";
		}

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
			<form action="AddMat.php" method="post">
				<label for="Material">Nombre ││ Material</label>
				<input type="text" name="Material" placeholder="Ingrese Nombre del material">
				<input type="submit" value="Guardar Proveedor">
				<br>
			</form>
		</div>
	</div>
</body>
</html>