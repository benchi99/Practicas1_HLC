<!DOCTYPE html5>
<html>
	<head>
		<meta name="description" content="Actividad 2.3">
		<meta name="author" content="Rubén Bermejo Romero">
		<meta name="keywords" content="Actividad 2.3">
		<meta charset="UTF-8">
		<title>Actividad 2.3</title>
	</head>
	
	<body>
		<?php 
		
		$errores = [];

		if (empty($_POST['numOp'])) {
			$errores['numOp'] = "Escribe el numero de tablas a generar.";
		} else if (!preg_match("/[0-9]+/", $_POST['numOp'])) {
			$errores['numOp'] = "Escribe un número.";
		}

		if (empty($_POST['num'])) {
			$errores['num'] = "Escribe un número para generar tablas.";
		} else if (!preg_match("/[0-9]+/", $_POST['num'])) {
			$errores['num'] = "Escribe un número.";
		}

		if (!$_POST) {
		    include 'ejercicio23form.php';
		} else if ($errores && $_POST['estado'] == 0) { 
			include 'ejercicio23form.php';
		} else if ($_POST['estado'] == '0'){
	    ?>
		<h1>Tabla operaciones aritméticas</h1>
		<p>Tablas del número <?php echo $_POST['num']?></p>
		<p>Seleccione orden de las operaciones: </p>
		<form action="ejercicio23log.php" method="POST">
			<input type="hidden" name="estado" value="1">
			<input type="hidden" name="numero" value="<?php echo $_POST['num']?>">
			<input type="hidden" name="repeticiones" value="<?php echo $_POST['numOp']?>">
			<?php 
			for ($i = 0; $i < $_POST['numOp'];$i++) {
		      echo '<select name="operacRealiz'.$i.'">';
		      echo '<option value="Sumar">Sumar</option>';
		      echo '<option value="Restar">Restar</option>';
		      echo '<option value="Multiplicar">Multiplicar</option>';
		      echo '<option value="Dividir">Dividir</option>';
			  echo '</select>';
			  echo '<br>';
			}
			?>
			<input type="submit" name="envTablas" value="Mostrar tablas">
			<a href="indexact2.php">Volver a la página de inicio</a>
		</form>
		<?php
		} else if ($_POST['estado'] == '1') {
		?>
		<h1>Tabla operaciones aritméticas</h1>
		<p>Realizamos operaciones: </p>
		<table border="3">
			<tr>
				<?php 
					
					for ($i = 0; $i < $_POST['repeticiones']; $i++) {
						echo '<td>';
						echo '<p>'.$_POST['operacRealiz'.$i].'</p>';
						echo '<p>';
						for ($j = 1; $j <= 10; $j++) {
							switch ($_POST['operacRealiz'.$i]) {
								case 'Sumar': 
									echo $j.' + '.$_POST['numero'].' = '.($j+(int)$_POST['numero']).'<br>';
									break;
								case 'Restar': 
									echo $j.' - '.$_POST['numero'].' = '.($j-(int)$_POST['numero']).'<br>';
									break;
								case 'Multiplicar':
									echo $j.' x '.$_POST['numero'].' = '.($j*(int)$_POST['numero']).'<br>';
									break;
								case 'Dividir':
									echo $j.' - '.$_POST['numero'].' = '.($j-(int)$_POST['numero']).'<br>';
									break;
							}
						}
						echo '</p>';
						echo '</td>';
					}
				?>
			</tr>
		</table>
		<p>
			<a href="ejercicio23form.php">Volver a crear nueva tabla</a>
			<a href="indexact2.php">Volver a la página de inicio</a>
		</p>
		<?php 
		}
		?>
	</body>
</html>