<?php
	session_start();
	if	(isset($_SESSION['user_id'])){
		header("location: IndexJoy.php");
	}
	require "database.php";
	if (!empty($_POST['Username']) && !empty($_POST['Password'])){
		$records  = $conn->prepare("SELECT Id, Username, Password, Rank FROM users Where Username=:Username");
		$records->bindParam(":Username", $_POST['Username']);
		$records->execute();
		$results = $records->fetch(PDO::FETCH_ASSOC);


		if	($_POST['Password'] == $results["Password"]) {
			$_SESSION['user_id'] = $results["Id"];
			header("location: IndexJoy.php");
		}
		else {
			
			$message = "Sorry , those credentials do not match";
		} 
	}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Form Login │ Joyeria Sosa</title>
	<link rel="stylesheet" href="css/style_login.css">
</head>
<body>
	<div class="Login-box">
		<img class="Avatar" src="img/Logo.png" alt="Logo de Joyeria">
		<h1> Joyeria Sosa <br> Login Here </h1>
		<form action="index.php" method="post">
			<?php if (!empty($message)): ?>
			<p> <?= $message ?> </p>
			<?php endif; ?>

			<!-- USERNAME -->
			<label for="Username">Username</label>
			<input type="text" name="Username" placeholder="Enter Username">

			<!-- Password -->
			<label for="Password">Password</label>
			<input type="Password" name="Password" placeholder="Enter Password">

			<input type="submit" value="Log in">

		</form>
		
	</div>
</body>
</html>