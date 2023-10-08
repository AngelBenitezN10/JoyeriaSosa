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
	$message = isset($_GET['message']) ? urldecode($_GET['message']) : null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes │ Joyeria Sosa</title>
    <link rel="stylesheet" href="css/style_clientes.css">
    <script src="https://kit.fontawesome.com/4efbc1eafa.js" crossorigin="anonymous"></script>
    <style>
        /* Estilos adicionales para el formulario de agregar cliente */
        #addClienteForm {
            position: absolute;
            top: 0;
            right: 0;
            width: 200px; /* Ancho del formulario, ajusta según sea necesario */
            padding: 10px;
            background-color: #f4f4f4;
            display: none; /* Ocultar inicialmente */
        }
    </style>
</head>
<body>
    <header>
        <div class="interior">
            <a href="../Login-Form/Logout.php" class="logo"><img src="img/Logo.png" alt=""></a>
            <nav class="navegacion">
                <li><a href="IndexJoy.php">Joyeria</a></li>
                <li><a href="Ventas"></a>Ventas</li>
                <li><a href="IndexStock.php">Stock</a></li>
                <li><a href="IndexProv.php">Proveedor</a></li>
                <li><a href="IndexMat.php">Material</a></li>
            </nav>
        </div>
    </header>
    <p><?= $message ?></p>
    <div class="Login-box2">
        <div class="Login-box">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>DNI</th>
                        <th>Apellido</th>
                        <th>Nombre</th>
                        <th>Contacto</th>
                        <th>
                            <!-- Agregado: Botón para desplegar el formulario -->
                            <button id="mostrarFormularioBtn">
                                <i class="fa-solid fa-user-plus" style="color: #ffffff;"></i>
                            </button>
                        </th>
                    </tr>
                </thead>
                <?php foreach ($con->query("SELECT * FROM cliente") as $row) {?>
                    <tr>
                        <td><?php echo $row["IdCliente"]?></td>
                        <td><?php echo $row["Apellido"]?></td>
                        <td><?php echo $row["Nombres"]?></td>
                        <td><?php echo $row["Contacto"]?></td>
                        <td><a href="EditClient.php?id=<?php echo $row['IdCliente'] ?>"><i class="fa-solid fa-pencil" style="color: #ffffff;"></i></a></td>
                        <td><a href="DeletClient.php?id=<?php echo $row['IdCliente'] ?>"><i class="fa-solid fa-trash-can" style="color: #880202;"></i></a></td>
                    </tr>
                <?php } ?>
            </table>
            
            <!-- Agregado: Formulario para agregar cliente -->
		   	<div id="addClienteForm" style="display: none;">
			    <form action="procesar_add_cliente.php" method="POST">
			        <label for="dni">DNI:</label>
			        <input type="text" name="dni" required>
			        
			        <label for="apellido">Apellido:</label>
			        <input type="text" name="apellido" required>
			        
			        <label for="nombres">Nombres:</label>
			        <input type="text" name="nombres" required>
			        
			        <label for="contacto">Contacto:</label>
			        <input type="text" name="contacto" required>
			        
			        <input type="submit" value="Guardar">
			    </form>
			</div>
        </div>
    </div>

	    <script>
	    // JavaScript para mostrar y ocultar el formulario
	    document.addEventListener("DOMContentLoaded", function () {
	        const addClienteForm = document.getElementById("addClienteForm");
	        const mostrarFormularioBtn = document.getElementById("mostrarFormularioBtn");

	        mostrarFormularioBtn.addEventListener("click", function () {
	            addClienteForm.style.display = "block";
	        });
	    });
	</script>
</body>
</html>