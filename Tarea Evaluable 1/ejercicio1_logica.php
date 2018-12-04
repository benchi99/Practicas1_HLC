<?php

    function validaFecha($fecha, $formato = 'd-m-Y') {
        $d = DateTime::createFromFormat($formato, $fecha);
        return $d && $d->format($formato) == $fecha;
    }

    $errores = [];

    if (!$_POST){
        
        include "ejercicio1_form.php";
        
    } else {
        
        // NOMBRE
        if(empty($_POST["nombre"])) {
            $errores['nombre'] = "Se requiere nombre";
        } else if (strlen($_POST["nombre"]) <= 3){
            $errores['nombre'] = "El nombre ha de tener un mínimo de tres caracteres.";
        } else if (!preg_match('/[A-Za-z]+/', $_POST["nombre"])) {
            $errores['nombre'] = "El nombre contiene números.";
        }
        

        //APELLIDOS
        if(empty($_POST["apellidos"])){
            $errores['apellidos'] = "Se requiere apellidos";
        } else if (!preg_match("/[A-Za-z]+/", $_POST["apellidos"])) {
            $errores['apellidos'] = "Has escrito los apellidos en un formato incorrecto.";
        }
        
        //FECHA DE NACIMIENTO
        if (empty($_POST["fechanac"])) {
            $errores['fechanac'] = "Se requiere fecha de nacimiento";
        } else if (!validaFecha($_POST["fechanac"])) {
            $errores['fechanac'] = "La fecha establecida es inválida.";
        } else if (!preg_match("/[0-9]{2}\W[0-9]{2}\W[0-9]{4}/", $_POST["fechanac"])){
            $errores['fechanac'] = "La estructura de la fecha es incorrecta. ".$_POST["fechanac"];
        } else if ($_POST["fechanac"] > time('d/m/Y')) {
            $errores['fechanac'] = "La fecha establecida es antes de la fecha actual.";
        } 
        
        //SEXO
        if (empty($_POST["sexo"])) {
            $errores['sexo'] = "Especifique un sexo.";
        }
        
        //CATEGORIA
        if (empty($_POST["cat"])) {
            $errores['categoria'] = "No has especificado ninguna categoría.";
        }
        
        //SUELDO
        if (empty($_POST["sueldo"])) {
            $errores['sueldo'] = "Especifique un sueldo (entre 600 y 3000)";
        } else {
            switch ($_POST["cat"]) {
                case "Peon":
                    if ($_POST["sueldo"] < 600 || $_POST["sueldo"] > 1200) {
                        $errores['sueldo'] = "Has especificado un sueldo inválido para esta categoría.";
                    }
                    break;
                case "Oficial":
                    if ($_POST["sueldo"] < 900 || $_POST["sueldo"] > 1500) {
                        $errores['sueldo'] = "Has especificado un sueldo inválido para esta categoría.";
                    }
                    break;
                case "JefeDepartamento":
                    if ($_POST["sueldo"] < 1400 || $_POST["sueldo"] > 2500) {
                        $errores['sueldo'] = "Has especificado un sueldo inválido para esta categoría.";
                    }
                    break;
                case "Director": 
                    if ($_POST["sueldo"] < 2000 || $_POST["sueldo"] > 3000) {
                        $errores['sueldo'] = "Has especificado un sueldo inválido para esta categoría.";
                    }
                    break;
            }
        }
        
        //AFICION
        if (empty($_POST["aficion"])) {
            $errores['aficion'] = "No has especificado ninguna afición.";
        }
        
        if ($errores) {
            //hay errores
            include "ejercicio1_form.php";
        } else {
            //no hay errores, imprimo los datos
            echo "<h1>DATOS DEL USUARIO</h1>";            
            echo "<p>Nombre: ".$_POST["nombre"]."</p>";
            echo "<p>Apellidos: ".$_POST["apellidos"]."</p>";
            echo "<p>Fecha de nacimiento: ".$_POST["fechanac"]."</p>";
            echo "<p>Sexo: ".$_POST["sexo"]."</p>";
            echo "<p>Categoría: ".$_POST["cat"]."</p>";
            echo "<p>Sueldo: ".$_POST["sueldo"]."</p>";
            echo "<p>Aficiones: ";
            $arrayAf = $_POST['aficion'];
            for ($i = 0; $i < count($arrayAf); $i++){
                echo $arrayAf[$i].", ";
            }
            echo "</p>";
        }
        
        
    }
    
?>