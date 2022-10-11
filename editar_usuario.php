<?php
session_start();
include "conf.php";
include "modelos/Ciudad.php";
include "modelos/Usuario.php";
include "modelos/Rol.php";
//carga la plantilla con la header y el footer
require_once('layouts/layout.php');
$usuid = $_GET["usuid"];
$usuario = Usuario::obtenerUno($usuid);
?>
<div class="container">
    <div class="card mt-5">
        <div class="card-header">
            <h1 class="txt">Usuarios</h1>
        </div>
        <div class="card-body shadow">

            <h5 class="card-title">Editar Usuario</h5>
            <form action="actualizar_usuario.php" id="agrusuario" method="POST">
                <div class="form-group">
                    <input type="hidden" class="form-control" name="usuid" placeholder="Ingresa un alias para el usuario" aria-label="Username" aria-describedby="basic-addon1" value="<?php echo $usuario->usuid ?>" required>
                    <div class="row">
                        <div class="col">
                            <div class="input-group mb-2">
                                <span class="input-group-text" id="basic-addon1">Rol</span>
                                <select name="rolid"  class="form-select form-select" >
                                    <?php
                                    $roles = Rol::obtener();
                                    foreach ($roles as $rol) {
                                        if ($rol->rolid == $usuario->rolid) {
                                    ?>

                                            <option value="<?php echo $rol->rolid ?>" selected><?php echo $rol->rolnombre ?></option>

                                        <?php }} ?>
                                </select>
                            </div>
                            <div class="input-group mb-2">
                                <span class="input-group-text" id="basic-addon1">Username</span>
                                <input type="text" class="form-control" name="usuusuario" id="rolnombre" placeholder="Ingresa un alias para el usuario" aria-label="Username" aria-describedby="basic-addon1" value="<?php echo $usuario->usuusuario ?>" required>
                            </div>
                            <div class="input-group mb-2">
                                <span class="input-group-text" id="basic-addon1">Password</span>
                                <input type="password" class="form-control" name="usupassword" id="txtPassword" placeholder="Ingresa el password" aria-label="Username" aria-describedby="basic-addon1" value="<?php echo $usuario->usupassword ?>" required>
                                <div class="input-group-append">
                                    <button id="show_password" class="btn btn-primary" type="button" onclick="mostrarPassword()"> <span class="fa fa-eye-slash icon"></span> </button>
                                </div>
                            </div>
                            <div class="input-group mb-2">
                                <span class="input-group-text" id="basic-addon1">Nombre</span>
                                <input type="text" class="form-control" name="usunombre" id="rolnombre" placeholder="Ingresa el nombre del usuario" aria-label="Username" aria-describedby="basic-addon1" value="<?php echo $usuario->usunombre ?>" required>
                            </div>
                            <div class="input-group mb-2">
                                <span class="input-group-text" id="basic-addon1">Apellido</span>
                                <input type="text" class="form-control" name="usuapellido" id="rolnombre" placeholder="Ingresa el apellido del usuario" aria-label="Username" aria-describedby="basic-addon1" value="<?php echo $usuario->usuapellido ?>" required>
                            </div>
                            <div class="input-group mb-2">
                                <span class="input-group-text" id="basic-addon1">Ciudad</span>
                                <select name="ciuid" class="form-select form-select">
                                    <?php
                                    $ciudades = Ciudad::obtener();
                                    foreach ($ciudades as $ciudad) {
                                        if ($ciudad->ciuid == $usuario->ciuid) {
                                    ?>

                                            <option value="<?php echo $ciudad->ciuid ?>" selected><?php echo $ciudad->ciunombre ?></option>

                                        <?php } else { ?>
                                            <option value="<?php echo $ciudad->ciuid ?>"><?php echo $ciudad->ciunombre ?></option>
                                    <?php
                                        }
                                    } ?>
                                </select>
                            </div>
                            <div class="input-group mb-2">
                                <span class="input-group-text" id="basic-addon1">Cedula</span>
                                <input type="text" class="form-control" name="usucedula" id="rolnombre" placeholder="Ingresa el numero de cedula" aria-label="Username" aria-describedby="basic-addon1" value="<?php echo $usuario->usucedula ?>" required>
                            </div>
                            <div class="input-group mb-2">
                                <span class="input-group-text" id="basic-addon1">Direccion</span>
                                <input type="text" class="form-control" name="usudireccion" id="rolnombre" placeholder="Ingresa la direccion" aria-label="Username" aria-describedby="basic-addon1" value="<?php echo $usuario->usudireccion ?>" required>
                            </div>
                            <div class="input-group mb-2">
                                <span class="input-group-text" id="basic-addon1">Teléfono</span>
                                <input type="text" class="form-control" name="usutelefono" id="rolnombre" placeholder="Ingresa el número telefónico" aria-label="Username" aria-describedby="basic-addon1" value="<?php echo $usuario->usutelefono ?>" required>
                            </div>
                        </div>
                        <div class="col ">
                            <button class="btn btn-outline-primary shadow-sm" type="submit"><img src="img/actualizar.png">Actualizar</button><br><br>
                            <a href="usuarios.php" class="btn btn-outline-danger shadow-sm" ><img src="img/cancelar.png">Cancelar</a>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>

</div>
<script type="text/javascript">
    function mostrarPassword() {
        var cambio = document.getElementById("txtPassword");
        if (cambio.type == "password") {
            cambio.type = "text";
            $('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
        } else {
            cambio.type = "password";
            $('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
        }
    } 
    </script>
</body>
    

    </html>