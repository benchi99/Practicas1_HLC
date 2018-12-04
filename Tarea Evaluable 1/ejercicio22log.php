<!DOCTYPE html5>
<html lang="es_ES">
	<head>
		<meta name="description" content="Actividad 2.2">
		<meta name="author" content="Rub�n Bermejo Romero">
		<meta name="keywords" content="Actividad 2.2">
		<meta charset="UTF-8">
		<title>Actividad 2.2</title>
	</head>

    <body>
        <?php
        
            $errores = [];
        
            if (!$_POST){
                
             include "ejercicio22form.php";
             
            } else {
                
                if (empty($_POST['numero'])) {
                    $errores['numero'] = "No se ha especificado un n�mero.";
                } else if (!preg_match("/[0-9]+/", $_POST['numero'])){
                    //REQUIERE QUE TENGAS DECLARADO UN ARRAY $errores = [];
                    $errores[''] = "";
                }
                                
                if ($errores) {
                    include "ejercicio22form.php";
                } else {
                    switch ($_POST['op']){
                        case "sumar":
                            echo "<h1>Operaci�n a realizar: suma</h1>";
                            for ($i = 0; $i <= 10; $i++) {
                                echo "<p>".$_POST['numero']." + ".$i." = ".($i+(int)$_POST['numero']);
                            }
                            break;
                        case "restar":
                            echo "<h1>Operaci�n a realizar: resta</h1>";
                            for ($i = 0; $i <= 10; $i++) {
                                echo "<p>".$_POST['numero']." - ".$i." = ".($i-(int)$_POST['numero']);
                            }
                            break;
                        case "multip":
                            echo "<h1>Operaci�n a realizar: multiplicaci�n</h1>";
                            for ($i = 0; $i <= 10; $i++) {
                                echo "<p>".$_POST['numero']." x ".$i." = ".($i*(int)$_POST['numero']);
                            }
                            break;
                        case "dividi":
                            echo "<h1>Operaci�n a realizar: dividir</h1>";
                            for ($i = 0; $i <= 10; $i++) {
                                echo "<p>".$_POST['numero']." / ".$i." = ".($i/(int)$_POST['numero']);
                            }
                            break;  
                    }
                    echo '<br><a href="ejercicio22form.php">Volver a crear una tabla</a> <a href="indexact2.php">Volver p�gina inicio</a>';   
                    
                }
            }
    
        ?>
    </body>
</html>