<?php

include("Bd.php");
$con=conectar();

$DNI=$_GET['id'];

$sql="DELETE FROM Cliente WHERE IdCliente='$DNI'";
$query=mysqli_query($con,$sql);

    if($query){
        Header("Location: IndexClien.php");
    }
?>