<?php

include 'conexion.php';
$conex = conexion();
$Pais=$_POST['Pais'];

$sql="select * from states where country_id='$Pais'";

	$result=pg_query($conex,$sql);

   

	$cadena="<label>Ciudad</label> 
			<select id='lista2' name='lista2'>";

	while ($ver=pg_fetch_row($result)) {
		$cadena=$cadena.'<option value='.$ver[1].'>'.utf8_encode($ver[1]).'</option>';
	}

	echo  $cadena."</select>";


?>