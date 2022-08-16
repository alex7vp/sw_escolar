<!DOCTYPE html>
<html lang="es">

<head>
    <link rel="shortcut icon" href="img/monitor.png">
    <title> Plantilla con Bootstrap</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Gestión Escolar</title>
    <?php 
		include_once('scripts.php');
	?>
</head>

<body>
    <header>
        <?php 
		require_once('header.php');
	?>
    </header>

    <section>
        <div class="container">
            <?php 
			// carga el archivo routing.php para direccionar a la página .php que se incrustará entre la header y el footer
			//require_once('routing.php');
	 ?>

        </div>
    </section>


