<!DOCTYPE html5>
<html lang="es_ES">
    <head>
        <meta name="description" content="Actividad 2.4">
        <meta name="author" content="Rubén Bermejo Romero">
        <meta name="keywords" content="Actividad 2 4 PHP aa">
        <meta charset="UTF-8">
        <title>Actividad 2.4</title>
    </head>

    <?php 
    
    function ValorPost($nombre, $valorPorDefecto='') {
        if (isset ($_POST[$nombre])){
            return $_POST[$nombre];
        } else {
            return $valorPorDefecto;
        }
    }

    /**
     * generaEnlaces
     * @param string $operacion Operación de la que se generan los enlaces
     */

    function generaEnlaces(string $operacion) {
        echo '<td>';
        echo '<p>'.$operacion.'</p>';
        for ($i = 1; $i <= 10; $i++){
            echo '<a href="ejercicio24log.php?numero='.$i.'&operacion='.$operacion.'" name="num'.$operacion.$i.'">Tablas del '.$i.'</a><br>';
        }
        echo '</td>';
    }
    
    ?>

    <body>
        <h1>Tabla operaciones aritméticas.</h1>

        <p>Realizamos operación: </p>

        <table border="1">
            <tr>
            <?php 
                generaEnlaces('Suma');
                generaEnlaces('Resta');
                generaEnlaces('Multiplicar');
                generaEnlaces('Dividir');
            ?>
            </tr>
        </table>
        
    </body>
</html>