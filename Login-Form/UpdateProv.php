<?php
include("Bd.php");
	 $con=conectar();
if (!empty($_POST['Nombre'])){
	if (!empty($_POST['Contacto'])){
	    if(!empty($_POST['Material'])){
	    	$Cuil=$_POST['Cuil'];
	    	$Nombre=$_POST['Nombre'];
	    	$Contacto=$_POST['Contacto'];
	    	$Material=$_POST['Material'];
	    	$sql="UPDATE proveedor SET Nombre ='$Nombre',Contacto ='$Contacto',Id_Materia='$Material' WHERE Id_Proveedor = $Cuil";
	    	$query= mysqli_query($con,$sql);
	    	if ($query) {
	    		header("location: ../Login-Form/IndexProv.php");;
	    	}
	   }
	}
}
?>