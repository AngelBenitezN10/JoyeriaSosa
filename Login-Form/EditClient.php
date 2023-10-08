<?php 
	session_start();
    require "database.php" ;
    include("Bd.php");
	 $con=conectar();
    if (isset($_SESSION['user_id'])){
	$records = $conn->prepare ("SELECT Id, Username, Rank FROM users WHERE Id = :Id");
	$records->bindParam(":Id", $_SESSION["user_id"]);
	$records -> execute();
	$results = $records->fetch(PDO::FETCH_ASSOC);

	$user = null;

	if (count($results) != 0 ){
		$user = $results;
	}
}
    else{
    header("location: ../Login-Form/index.php");
}
	$id=$_GET['id'];

	$sql="SELECT * FROM cliente WHERE IdCliente='$id'";
	$query=mysqli_query($con,$sql);

	$row=mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Editar Cliente ││ Joyeria Sosa</title>
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
    <div class="Login-box2">
		<div class="Login-box">
			<form action="UpdateClien.php" method="post">
				<!-- Cliente -->
				<input type="hidden" name="DNI" value="<?php echo $row['IdCliente']  ?>">
				<label for="Apellido">Apellido</label>
				<input type="text" name="Apellido" value="<?php echo $row['Apellido']  ?>"placeholder="Ingrese Apellido">
				<label for="Nombre">Nombres</label>
				<input type="text" name="Nombre" value=<?php echo $row['Nombres']  ?> placeholder="Ingrese Nombres">
				<label for="Contacto">Contacto</label>
				<input type="text" name="Contacto" value=<?php echo $row['Contacto']  ?> placeholder="Ingrese Numero de contacto">
				<input type="submit" value="Guardar Cliente">
			</form>
		</div>
	</div>
</body>
</html>