<!DOCTYPE html5>
<html lang="es_ES">
	<head>
		<meta name="description" content="Actividad 2.3">
		<meta name="author" content="Rubén Bermejo Romero">
		<meta name="keywords" content="Actividad 2.3">
		<meta charset="UTF-8">
		<title>Actividad 2.3</title>
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
		<h1>Tabla operaciones aritméticas.</h1>
		<form action="ejercicio23log.php" method="POST">
			<input type="hidden" name="estado" value="0">
			<p>Número de operaciones simultáneas: <input type="text" name="numOp" value=<?php ValorPost('numOp')?>></p>
			<?php if(isset($errores['numOp'])){
				echo '<p class="error">'.$errores['numOp'].'</p>';
			}?>
			<p>Número de la tabla: <input type="text" name="num" value=<?php ValorPost('num')?>></p>
			<?php if(isset($errores['num'])){
				echo '<p class="error">'.$errores['num'].'</p>';
			}?>
			<input type="submit" name="enviar0" value="Continuar">
			<a href="indexact2.php">Volver a la página de inicio</a>
		</form>
	</body>

</html>