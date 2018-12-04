<!DOCTYPE html5>
<html lang="es_ES">
    <head>
        <meta name="description" content="Ejercicio 3">
        <meta name="author" content="Rubén Bermejo Romero">
        <meta name="keywords" content="actividad php aa">
        <meta charset="UTF-8">
        <title>Actividad 3</title>
        <style>
            body {
                text-align: center;
            }
            .error {
                color: red;
            }
        </style>
    </head>

    <?php 
    
    $errores = [];

    $campos = [
        ['nombre_campo' => 'nombre',
        'etiqueta' => 'Nombre',
        'tipo' => 'text',
        ],

        ['nombre_campo' => 'edad',
        'etiqueta' => 'Edad',
        'tipo' => 'number',
        ],

        ['nombre_campo' => 'cat',
        'etiqueta' => 'Categoría',
        'tipo' => 'select',
        'entradas' => [
            ['entrada' => 'Peón', 'valor' => 'peon'],
            ['entrada' => 'Director', 'valor' => 'director'],
            ['entrada' => 'Superintendente', 'valor' => 'superinten']  
            ]
        ]
    ]; 


    /**
     * Función ParseForm
     * Interpreta un array campo que contiene la información de unos campos de formulario
     * a generar.
     * 
     * @param array $campo Array que contiene la información de los campos a generar.
     * @param array $errores Array de errores para que pueda generar errores.
     */

    function ParseForm(array $campo, array $errores)
    {
        for ($i=0; $i < count($campo); $i++) { 
            $campoActual = $campo[$i];
            if($campoActual['tipo'] == 'select'){
                echo '<tr>';
                echo '<td>'.$campoActual['etiqueta'].'</td>';
                echo '<td><select name="'.$campoActual['nombre_campo'].'">';
                $entradasActuales = $campoActual['entradas'];
                for ($j=0; $j < count($entradasActuales); $j++) { 
                    $entradaActual = $entradasActuales[$j];
                    echo '<option value="'.$entradaActual['valor'].'">'.$entradaActual['entrada'].'</option>';
                }
                echo '</select>';
                echo '</td>';
                echo '</tr>';
            } else {
                echo '<tr>';
                echo '<td>'.$campoActual['etiqueta'].'</td>';
                echo '<td><input type="'.$campoActual['tipo'].'" name="'.$campoActual['nombre_campo'].'"></td>';
                if (isset($errores[$campoActual['nombre_campo']])) {
                    echo '<td class="error">'.$errores[$campoActual['nombre_campo']].'</td>';
                }
                echo '</tr>';
            }
        }
    }


    function imprimeInformacion(array $campos)
    {
        echo '<h1>Datos empleado</h1>';
        echo '<table>';
        for ($i = 0; $i < count($campos); $i++) {
            $campoActual = $campos[$i];
            echo '<tr>';
            echo '<td>'.$campoActual['etiqueta'].'</td>';
            echo '<td>'.$_POST[$campoActual['nombre_campo']].'</td>';
            echo '</tr>';
        }
    }

?>

    <body>
        
        <?php if (!$_POST) {?>
        
        <h1>Datos empleado</h1>

        <form action="ejercicio3.php" method="POST">
            
            <table align="center">

                <?php ParseForm($campos, $errores) ?>

            </table>

            <input type="submit" name="guardar" value="Guardar datos">

        </form>

        <?php } else { 
            
            //Nombre
            if (empty($_POST['nombre'])) {
                $errores['nombre'] = "Escriba un nombre.";
            } else if (!preg_match("/[A-z]+/", $_POST['nombre'])) {
                $errores['nombre'] = "Has escrito números en el nombre.";
            }

            //Edad
            if (empty($_POST['edad'])) {
                $errores['edad'] = "Escriba una edad.";
            } else if (!preg_match("/[0-9]+/", $_POST['edad'])) {
                $errores['edad'] = "Has escrito letras en la edad.";
            }


            if ($errores) { ?>
                
                <h1>Datos empleado</h1>
                
                <form action="ejercicio3.php" method="POST">
                    
                    <table align="center">

                        <?php ParseForm($campos, $errores) ?>

                    </table>

                    <input type="submit" name="guardar" value="Guardar datos">

                </form>
            <?php } else {
                imprimeInformacion($campos);
            }
} ?>

    </body>

</html>