<?php 
	session_start();
	include "conf.php";
	require_once('layouts/layout.php');	

 ?>
 <br>
 <center>
 <div class="container">
	<h1 class="txt">Bienvenid@ <?php echo $_SESSION["nombre"]." ".$_SESSION["apellido"] ?></h1>
    
 <img src="img/logo.svg" style="width: 150px;" alt=""><br><br>
 </div>
 	<?php
	if ($_SESSION['rol']==1) {
		require_once('home_administrador.php');
	}
	if ($_SESSION['rol']==2) {
		require_once('home_docente.php');
	}
	if ($_SESSION['rol']==3) {
		require_once('home_estudiante.php');
	}
	if ($_SESSION['rol']==4) {
		require_once('home_coordinador.php');
	}
        
        ?>
 
 </center>

</body>
</html>