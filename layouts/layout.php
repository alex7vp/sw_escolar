
<!DOCTYPE html>
<html lang="es">

<head>
    <link rel="shortcut icon" href="img/logo2.svg">
    <title> SAC Sistema de Asistencias y Evaluaciones</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Gestión Escolar</title>
    <link href="<?php if (isset($_SESSION['rol'])) {
        if ($_SESSION['rol']==1) {
            echo "css/style.css";
        }
        if ($_SESSION['rol']==2) {
            echo "css/docente.css";;
        }        
        if ($_SESSION['rol']==3) {
            echo "css/estudiante.css";
        }
        if ($_SESSION['rol']==4) {
            echo "/sw_escolar/css/coordinador.css";
        }
    }else {
        echo "/sw_escolar/css/style.css";
    }?>"  rel="stylesheet">
    <?php
    include_once('scripts.php');
    ?>
    <script>
        function Activar(elemento) {
            var htmlShow = document.getElementById(elemento);
            htmlShow.style.display = "block";
        }
        function Ocultar(elemento) {
            var htmlShow = document.getElementById(elemento);
            htmlShow.style.display = "none";
        }
        function ActivarOcultar(elemento, elemento2) {
            var htmlShow = document.getElementById(elemento);
            var htmlShow2 = document.getElementById(elemento2);
            htmlShow.style.display = "block";
            htmlShow2.style.display = "none";
        }
        function ActivarOcultarVarios(elemento, elemento2,elemento3,elmento4,elemento5) {
            var htmlShow = document.getElementById(elemento);
            htmlShow.style.display = "block";
            var htmlShow2 = document.getElementById(elemento2);
            htmlShow2.style.display = "none";
            var htmlShow3 = document.getElementById(elemento3);
            htmlShow3.style.display = "none";
            var htmlShow4 = document.getElementById(elemento4);
            htmlShow4.style.display = "none";
            var htmlShow5 = document.getElementById(elemento5);
            htmlShow5.style.display = "none";
        }

    </script>
</head>

<body>
    <header>
        <?php
        if ($_SESSION['rol']==1) {
            $navbar= "header.php";
        }
        if ($_SESSION['rol']==2) {
            $navbar= "headerdocente.php";;
        }        
        if ($_SESSION['rol']==3) {
            $navbar= "headerestudiante.php";
        }
        if ($_SESSION['rol']==4) {
            $navbar= "headercoordinador.php";
        }
        require_once($navbar);
        ?>
    </header>

    