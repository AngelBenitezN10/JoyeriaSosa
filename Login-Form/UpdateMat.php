<?php
include("Bd.php");
	 $con=conectar();
if (!empty($_POST['Material'])){
	    	$Id=$_POST['Id'];
	    	$Material=$_POST['Material'];
	    	$sql="UPDATE Material SET Material ='$Material' WHERE IdMaterial = $Id";
	    	$query= mysqli_query($con,$sql);
	    	if ($query) {
	    		header("location: ../Login-Form/IndexMat.php");;
	    	}
}
?>