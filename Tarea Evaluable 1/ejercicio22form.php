<!DOCTYPE html5>
<html lang="es_ES">
	<head>
		<meta name="description" content="Actividad 2.2">
		<meta name="author" content="Rubén Bermejo Romero">
		<meta name="keywords" content="Actividad 2.2">
		<meta charset="UTF-8">
		<title>Actividad 2.2</title>
		<style>
		      .error {
		          
		          color: red;
		          
	           }
		</style>
	</head>

			   

	<?php 
	function ValorPost($nombre, $valorPorDefecto='') {
	    if (isset ($_POST[$nombre])){
	        return $_POST[$nombre];
	    } else {
	        return $valorPorDefecto;
	    }
	}
	?>

	<body>
		<h1>Tabla operaciones aritméticas</h1>
		<form action="ejercicio22log.php" method="POST">
			<p>Operación a realizar: <input type="checkbox" name="op" checked="checked" value="sumar">Sumar
									 <input type="checkbox" name="op" value="restar">Restar
									 <input type="checkbox" name="op" value="multiplicar">Multiplicar
									 <input type="checkbox" name="op" value="Dividir">Dividir
			</p>
			<p>Número de la tabla: <input type="text" name="numero" value=<?php ValorPost('numero')?>></p>
			<?php if (isset($errores['numero'])) {
    		    echo '<p class="error">'.$errores['numero'].'</p>';   
    		}?>
			<input type="submit" name="enviardatos" value="Mostrar tabla">
		</form>
	</body>

</html>