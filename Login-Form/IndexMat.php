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
	<title>Material │ Joyeria Sosa</title>
	<link rel="stylesheet" href="css/style_mat.css">
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
                    <li><a href="IndexStock.php">Stock</a></li>
                    <li><a href="IndexProv.php">Proveedor</a></li>
                </nav>
            </div>
        </header>
        <div class="Login-box2">
            <div class="Login-box">
            	<table class="table table-striped">
            		<thead>
            			<tr>
	            			<th>Id Material</th>
                            <th>Material</th>
	            			<th><a href = "AddMat.php"><i class="fa-solid fa-diamond" style="color: #ffffff;"></i></a></th>
	            		</tr>
            		</thead>
            		<?php foreach ($con->query("SELECT * FROM material") as $row) {?>
            			<tr>
            				<td><?php echo $row["IdMaterial"]?></td>
            				<td><?php echo $row["Material"]?></td>
            				<td><a href="EditMat.php?id=<?php echo $row['IdMaterial'] ?>"><i class="fa-solid fa-pencil" style="color: #ffffff;"></i></a></td>
            				<td><a href="DeletMat.php?id=<?php echo $row['IdMaterial'] ?>"><i class="fa-solid fa-trash-can" style="color: #880202;"></i></a></td>
            			</tr>
            		<?php } ?>
            	</table> 
            </div>
        </div>
	</body>
</html>