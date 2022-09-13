<?php
session_start();
include "conf.php";
include "modelos/Nota.php";
//carga la plantilla con la header y el footer
require_once('layouts/layout.php');
$detalles = Nota::porMateria($_GET["detmatid"]);