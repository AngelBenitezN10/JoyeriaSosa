
<?php
    require("Bd.php");
	$conn=conectar();

    $campo=isset($_POST['campo']) ? $conn->real_escape_string($_POST['campo']) : null;

    $sql = "SELECT * FROM `cliente`";

    $resultado = $conn->query($sql);

    $num_rows= $resultado->num_rows;

    $html= "";

    if($num_rows >= 0){
        while ($row=$resultado->fetch_assoc()){
            $html .='<tr>';
            $html .='<td>'.$row['IdCliente'].'</td>';
            $html .='<td>'.$row['Apellido'].'</td>';
            $html .='<td>'.$row['Nombres'].'</td>';
            $html .='<td>'.$row['Contacto'].'</td>';
            $html .='<td><i class="fa-solid fa-pencil" style="color: #ffffff;"></i></td>';
            $html .='<td><i class="fa-solid fa-trash-can" style="color: #880202;"></i></td>';
            $html .='</tr>';
        } 
    }else{
        $html .='<tr>';
            $html .='<td colaspan = "6">Sin resultados</td>';
            $html .='</tr>';
    }

    echo json_encode($html,JSON_UNESCAPED_UNICODE);

    ?>