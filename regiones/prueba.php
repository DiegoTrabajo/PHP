
<?php

include 'conexion.php';
$conex = conexion();

?>

<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>prueba</title>


	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>

  <script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>


</head>
<body>

<?php

$sql = "select * from countries order by name";
$result = pg_query($conex, $sql);
?>
<section>
	<form id="formulario">
	<label>Rut</label>
	<input type="text" id="Rut" placeholder="rut" name="Rut">
  <br>
  <br>

     <label>nombre</label>
     <input type="text" id="Nombre" placeholder="nombre" name="Nombre">
     <br>
     <br>

     <label>Correo</label>
     <input type="text" id="Correo" placeholder="ejemplo@ejemplo.com" name="Correo">
     <br>
     <br>

     <label>Paises</label>
     <select name="Pais" id="Pais">
     <option value="0"> seleccionar Pais </option>
     <?php
        while ($row = pg_fetch_assoc($result) ){

          $id = $row['country_id'];
          $name = $row['name'];

          echo "<option value='".$id."' >".$name."</option>";
       }
      ?>
			

     </select>
     <br>
     <br>
     <div id="select2lista"></div>
     <br>
     <br>

     <label>Candidato</label>
     <select name="Candidato" id="Candidato">
     <option value=""> seleccionar </option>
     <option value="Carlos"> Carlos </option>
     <option value="Johan"> Johan </option>
     <option value="Doom"> Doom </option>
     </select>
     <br>
     <br>

      <button type="button" id="Enviar">Enviar</button>
      </form>
</section>
<br>
<br>
<div id="respuesta"></div>
</body>
<script src="js/validar.js"></script>

<script type="text/javascript">
	$(document).ready(function(){
		$('#Pais').val(1);
		recargarLista();

		$('#Pais').change(function(){
			recargarLista();
		});
	})
</script>
<script type="text/javascript">
	function recargarLista(){
		$.ajax({
			type:"POST",
			url:"AjaxR.php",
			data:"Pais=" + $('#Pais').val(),
			success:function(r){
				$('#select2lista').html(r);
			}
		});
	}
</script>

</html>




