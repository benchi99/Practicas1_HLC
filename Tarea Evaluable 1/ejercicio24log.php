<!DOCTYPE html5>
<html lang="es_ES">
    <head>
        <meta name="description" content="Actividad 2.4 lógica">
        <meta name="author" content="Rubén Bermejo Romero">
        <meta name="keywords" content="php aaaaaa">
        <meta charset="UTF-8">
        <title>Actividad 2.4</title>
    </head>

    <body>
        
        <h1>Tabla operaciones aritméticas.</h1>
        
        <?php 
        for ($i = 0; $i < 10; $i++) {
            switch ($_GET['operacion']) {
                case 'Suma': 
                    echo $i.' + '.$_GET['numero'].' = '.($i+(int)$_GET['numero']).'<br>';
                    break;
                case 'Resta': 
                    echo $i.' - '.$_GET['numero'].' = '.($i-(int)$_GET['numero']).'<br>';
                    break;
                case 'Multiplicar':
                    echo $i.' x '.$_GET['numero'].' = '.($i*(int)$_GET['numero']).'<br>';
                    break;
                case 'Dividir':
                    echo $i.' - '.$_GET['numero'].' = '.($i-(int)$_GET['numero']).'<br>';
                    break;
            }
        }
        ?>

        <a href="ejercicio24form.php">Volver a escoger nueva tabla</a>
		<a href="indexact2.php">Volver a la página de inicio</a>

    </body>
</html>