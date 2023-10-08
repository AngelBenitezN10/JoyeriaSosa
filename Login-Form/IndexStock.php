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
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Stock ││ Joyeria Sosa</title>
	<link rel="stylesheet" href="css/style_stock.css">
	<script src="https://kit.fontawesome.com/4efbc1eafa.js" crossorigin="anonymous"></script>
</head>
	<body>
		 <header>
            <div class="interior">
                <a href="../Login-Form/Logout.php" class="logo"><img src="img/Logo.png" alt=""></a>
                <nav class="navegacion">
					<li><a href="IndexJoy.php">Joyeria</a></li>
                    <li><a href="Ventas"></a>Ventas</li>
                    <li><a href="IndexClien.php">Cliente</a></li>
                    <li><a href="IndexProv.php">Proveedor</a></li>
                    <li><a href="IndexMat.php">Material</a></li>
                </nav>
            </div>
        </header>
        <div class="Login-box2">
            <div class="Login-box">
            	<table class="table table-striped">
            		<thead>
            			<tr>
	            			<th>Id</th>
	            			<th>Producto</th>
	            			<th>Tipo</th>
	            			<th>Material</th>
	            			<th>Cantidad Disponibles</th>
	            			<th>Cantidad Minima</th>
	            			<th><a href = "AddStock.php"><i class="fa-sharp fa-solid fa-box" style="color: #ffffff;"></i></a></th>
                            <th><a href = "AddArt.php"><i class="fa-solid fa-ring" style="color: #ffffff;"></i></a></th>
	            		</tr>
            		</thead>
            		<?php
            		foreach ($con->query("SELECT * FROM stock") as $row) {
            			$id = $row["IdProducto"];
						$query = $con->query("SELECT * FROM producto WHERE IdProducto = $id");
            			$product = $query->fetch_assoc();
            			$idP = $product["IdMaterial"];
            			$idT = $product["IdTipo"];
            			$query = $con->query("SELECT * FROM Material WHERE IdMaterial = $idP");
            			$Material = $query->fetch_assoc();
            			$query = $con->query("SELECT * FROM Tipojoyeria WHERE IdTipo = $idT");
            			$Tipo = $query->fetch_assoc();
            			?>       			
            			<tr>
            				<td><?php echo $row["IdStock"]?></td>
            				<td><?php echo $product["NombreProducto"]?></td>
            				<td><?php echo $Tipo["NombreJoyeria"]?></td>
            				<td><?php echo $Material["Material"]?></td>
            				<td><?php echo $row["UnidadesDispo"]?></td>
            				<td><?php echo $row["UnidadMini"]?></td>
            				<td><a href="EditClient.php?id=<?php echo $row['IdStock'] ?>"><i class="fa-solid fa-pencil" style="color: #ffffff;"></i></a></td>
            				<td><a href="DeletStock.php?id=<?php echo $row['IdStock'] ?>"><i class="fa-solid fa-trash-can" style="color: #880202;"></i></a></td>
            			</tr>
            		<?php } ?>
            	</table> 
            </div>
        </div>
	</body>
</html>