<?php 
	//carga la plantilla con la header y el footer
	require_once('layouts/layout.php');	
	session_start();
	echo $_SESSION["rol"];

 ?>
 <br>
 <center>
 <div class="container">
    
 <h1 >Página Restringida</h1>
 </div>
 </center>

</body>
</html>