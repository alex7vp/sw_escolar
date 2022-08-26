<?php 
	session_start();
	include "conf.php";
	require_once('layouts/layout.php');	

 ?>
 <br>
 <center>
 <div class="container">
    
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
        
        ?>
 
 </center>

</body>
</html>