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

	$sql="SELECT * FROM material WHERE IdMaterial='$id'";
	$query=mysqli_query($con,$sql);

	$row=mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Editar Material││ Joyeria Sosa</title>
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
			<form action="UpdateMat.php" method="post">
				<input type="hidden" name="Id" value="<?php echo $row['IdMaterial']  ?>">
				<label for="Material">Material</label>
				<input type="text" name="Material" value="<?php echo $row['Material']  ?>"placeholder="Ingrese Apellido">
                <input type="submit" value="Guardar Material">
			</form>
		</div>
	</div>
</body>
</html>