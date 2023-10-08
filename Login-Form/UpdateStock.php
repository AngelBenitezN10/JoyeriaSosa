<?php
include("Bd.php");
	 $con=conectar();
if (!empty($_POST['Id'])){
	    	$Id=$_POST['Id'];
	    	$Cantidad=$_POST['CantExi'];
	    	$sql="UPDATE Stock SET UnidadesDispo ='$Cantidad' WHERE IdStock = $Id";
	    	$query= mysqli_query($con,$sql);
	    	if ($query) {
	    		header("location: ../Login-Form/IndexStock.php");;
	    	}
}
?>