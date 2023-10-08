<?php 
	session_start();
    require "database.php" ;
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
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Home │ Joyeria Sosa</title>
	<link rel="stylesheet" href="style_joyeria.css">
</head>
    <body>
        <header>
            <div class="interior">
                <a href="../Login-Form/Logout.php" class="logo"><img src="img/Logo.png" alt=""></a>
                <nav class="navegacion">
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
                    <h1>Bienvenido</h1>
                    <h3>Usuario: <?= $results["Username"] ?>
                    <h3>CUIL Joyeria:20-43546211-2</h3>
                    <h3>Contacto: 3764-804682</h3>
                    <h3>Direccion: Kolping & Lopez y Planes</h3>
            </div>
        </div>

    </body>
</html>