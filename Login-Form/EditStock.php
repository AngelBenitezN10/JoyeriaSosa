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

	$sql="SELECT * FROM stock WHERE IdStock='$id'";
	$query=mysqli_query($con,$sql);
	$row=mysqli_fetch_array($query);
    $idp = $row["IdProducto"];
    $sql = "SELECT * FROM producto WHERE IdProducto = '$idp'";
    $query = mysqli_query($con, $sql);
    $Pod = mysqli_fetch_array($query);
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
			<form action="UpdateStock.php" method="post">
                <label for="Material">Producto:</label>
                <input type="text" name="NombreProducto" value="<?php echo $Pod['NombreProducto'];  ?>"readonly>
				<label for="Material">En existencia: </label>
                <input type="text" name="CantExi" value="<?php echo $row['UnidadesDispo'];  ?>" placeholder="Ingrese Stock">
                <input type="text" name="Id" value="<?php echo $id;  ?>" hidden>
                <input type="submit" value="Actualizar Stock">
			</form>
		</div>
	</div>
</body>
</html>