<?php

include 'conexion.php';
$conex = conexion();

$rut =$_POST['Ru'];
$nom =$_POST['Nom'];
$corr =$_POST['Corr'];
$can =$_POST['Candi'];


$pregunta = "select * FROM Votos Where rut = '$rut' OR 	correo = '$corr'";

$resp = pg_query($conex, $pregunta);

$rows = pg_num_rows($resp);

if ($rows > 0) {

    echo '<script type="text/javascript">
          alert("Ya has votado");
          window.location.assign("prueba.php");
</script>';
}else{
$sql = "insert into votos values(default,'$rut','$nom','$corr','$can')";
pg_query($conex, $sql);

echo "tu Rut es" ." ".$rut." ".$nom." ".$corr." ".$can;
}
?>