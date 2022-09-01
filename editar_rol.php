<?php
session_start();
include "conf.php";
include "modelos/Rol.php";
//carga la plantilla con la header y el footer
require_once('layouts/layout.php');
$rolid = $_GET["rolid"];
$rol = Rol::obtenerUno($rolid);
?>
<div class="container">
    <div class="card mt-5">
        <div class="card-header">
            <h1 class="txt">Roles</h1>
        </div>
        <div class="card-body">
            <h5 class="card-title">Editar Rol</h5>
            <form action="actualizar_rol.php" class="form-control" method="POST">
                <input type="hidden" name="rolid" value="<?php echo $rol->rolid ?>">
                <div class="row card-body">
                    <div class="col">
                        <center><img src="img/logo2.svg" alt=""></center>                        
                    </div>
                    <div class="col">
                        <div class="input-group mb-2">
                            <span class="input-group-text" id="basic-addon1">Rol</span>
                            <input type="text" class="form-control" name="rolnombre" value="<?php echo $rol->rolnombre ?>" aria-label="Username" width="300px" aria-describedby="basic-addon1" required>
                        </div>
                    </div>
                    <div class="col ">
                        <button class="btn btn-outline-primary shadow-sm" type="submit"><img src="img/actualizar.png">  Actualizar</button>
                    </div>
                </div>                         
            </form>
        </div>
    </div>

</div>

</body>

</html>