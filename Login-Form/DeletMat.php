<?php

include("Bd.php");
$con=conectar();

$ID=$_GET['id'];

$sql="DELETE FROM material WHERE IdMaterial='$ID'";
$query=mysqli_query($con,$sql);

    if($query){
        Header("Location: IndexMat.php");
    }
?>