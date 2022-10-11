<?php
session_start();
include "conf.php";
include "modelos/Usuario.php";
include "modelos/Rol.php";
include "modelos/Ciudad.php";
require_once('layouts/layout.php');
$usuarios = Usuario::obtener();
if (!isset($_SESSION['rol'])) {
    header("Location: index.php");
}

?>

<div class="card container mt-3 shadow">
    <div class="card-header">
        <h3 class="txt">Usuarios</h3>
    </div>
    <div class="card-body">

        <div class="row">
            <div class="col-md-4">

                <div class="card card-body">
                    <div class="row">
                        <center>
                            <div class="col">
                                <img src="img/logo2.svg" alt="">
                            </div>
                        </center>
                    </div>
                    <div class="row mt-2">
                        <div class="col">
                            <button id="btn_agrusuario" class="btn btn-outline-primary shadow" onclick="ActivarOcultarVarios('agrusuario','todas','roles')"><img src="img/agregar-usuario.png" alt="">
                                <p>Agregar Usuarios</p>
                            </button>
                        </div>
                        <div class="col">
                            <button id="btn_agrusuario" class="btn btn-outline-primary shadow" onclick="ActivarOcultarVarios('todas','agrusuario','roles')"><img src="img/usuarios.png" alt="">
                                <p>Todos los Usuarios</p>
                            </button>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <center>
                            <div class="col">
                                <button id="btn_agrusuario" class="btn btn-outline-primary shadow" onclick="ActivarOcultarVarios('roles','agrusuario','todas')"><img src="img/usuario.png" alt="">
                                    <p>Por roles</p>
                                </button>
                            </div>
                        </center>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card card-body">
                    <form action="nuevousuario.php" id="agrusuario" method="POST" style="display: none;">
                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                    <div class="input-group mb-2">
                                        <span class="input-group-text" id="basic-addon1">Rol</span>
                                        <select name="rolid" class="form-select form-select">
                                            <?php
                                            $roles = Rol::obtener();
                                            foreach ($roles as $rol) { ?>
                                                <option value="<?php echo $rol->rolid ?>"><?php echo $rol->rolnombre ?></option>

                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="input-group mb-2">
                                        <span class="input-group-text" id="basic-addon1">Username</span>
                                        <input type="text" class="form-control" name="usuusuario" id="rolnombre" placeholder="Ingresa un alias para el usuario" aria-label="Username" aria-describedby="basic-addon1" required>
                                    </div>
                                    <div class="input-group mb-2">
                                        <span class="input-group-text" id="basic-addon1">Password</span>
                                        <input type="text" class="form-control" name="usupassword" id="rolnombre" placeholder="Ingresa el password" aria-label="Username" aria-describedby="basic-addon1" required>
                                    </div>
                                    <div class="input-group mb-2">
                                        <span class="input-group-text" id="basic-addon1">Nombre</span>
                                        <input type="text" class="form-control" name="usunombre" id="rolnombre" placeholder="Ingresa el nombre del usuario" aria-label="Username" aria-describedby="basic-addon1" required>
                                    </div>
                                    <div class="input-group mb-2">
                                        <span class="input-group-text" id="basic-addon1">Apellido</span>
                                        <input type="text" class="form-control" name="usuapellido" id="rolnombre" placeholder="Ingresa el apellido del usuario" aria-label="Username" aria-describedby="basic-addon1" required>
                                    </div>
                                    <div class="input-group mb-2">
                                        <span class="input-group-text" id="basic-addon1">Ciudad</span>
                                        <select name="ciuid" class="form-select form-select" required>
                                            <?php
                                            $ciudades = Ciudad::obtener();
                                            foreach ($ciudades as $ciudad) { ?>
                                                <option value="<?php echo $ciudad->ciuid ?>"><?php echo $ciudad->ciunombre ?></option>

                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="input-group mb-2">
                                        <span class="input-group-text" id="basic-addon1">Cedula</span>
                                        <input type="text" class="form-control" name="usucedula" id="rolnombre" placeholder="Ingresa el numero de cedula" aria-label="Username" aria-describedby="basic-addon1" required>
                                    </div>
                                    <div class="input-group mb-2">
                                        <span class="input-group-text" id="basic-addon1">Direccion</span>
                                        <input type="text" class="form-control" name="usudireccion" id="rolnombre" placeholder="Ingresa la direccion" aria-label="Username" aria-describedby="basic-addon1" required>
                                    </div>
                                    <div class="input-group mb-2">
                                        <span class="input-group-text" id="basic-addon1">Teléfono</span>
                                        <input type="text" class="form-control" name="usutelefono" id="rolnombre" placeholder="Ingresa el número telefónico" aria-label="Username" aria-describedby="basic-addon1" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group ">
                                        <button class="btn btn-outline-primary shadow-sm btn-sm" type="submit"><img src="img/guardar2.png"> Agregar</button>
                                    </div>
                                    <div class="form-group mt-3">
                                    <a class="btn btn-outline-danger btn-sm shadow-sm" onclick="ActivarOcultar('btn_agrusuario','agrusuario')"><img src="img/cancelar.png" alt=""> Cancelar</a>
                                    </div>

                                </div>
                            </div>                            
                        </div>

                    </form>

                    <table id="todas" class="table table-striped table-bordered table-hover" style="width:100%;display: none;">
                        <thead>
                            <tr>
                            <th>Id</th>
                                    <th>Rol</th>
                                    <th>Usuario</th>
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>Cedula</th>
                                    <th></th>
                                    <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($usuarios as $usuario) { ?>
                                <tr>
                                    <td><?php echo $usuario->usuid ?></td>
                                    <td><?php echo $usuario->rolnombre ?></td>
                                    <td><?php echo $usuario->usuusuario ?></td>
                                    <td><?php echo $usuario->usunombre ?></td>
                                    <td><?php echo $usuario->usuapellido ?></td>
                                    <td><?php echo $usuario->usucedula ?></td>
                                    <td>
                                        <a href="editar_usuario.php?usuid=<?php echo $usuario->usuid ?>" class="btn btn-success shadow-sm"><img src="img/editar.png" alt="" class="btn_img"></a>
                                    </td>
                                    <td>
                                        <a href="eliminar_usuario.php?usuid=<?php echo $usuario->usuid ?>" class="btn btn-danger shadow-sm"><img src="img/eliminar.png" alt="" class="btn_img"></a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <div id="roles" style="display: block;">
                        <form action="" method="$_POST">
                            <div class="container">
                                <div class="row">
                                    <div class="col-8">
                                        <select name="select" placeholder="Selecciona una rol" class="form-select form-select">
                                            <?php
                                            $roles = Rol::obtener();
                                            foreach ($roles as $rol) { ?>
                                                <option value="<?php echo $rol->rolid ?>"><?php echo $rol->rolnombre ?></option>

                                            <?php } ?>
                                        </select>
                                    </div>

                                    <div class="col-4"><button class="btn btn-outline-primary shadow-sm" type="submit"><img src="img/lupa.png" alt=""> Buscar</button></div>
                                </div>
                            </div>
                        </form><br>

                        <?php
                        if (isset($_GET["select"])) {
                            $rolid = $_GET["select"];
                        } else {
                            $rolid = "1";
                        }

                        $usuarios2 = Usuario::porRoles($rolid);

                        ?>
                        <table id="todas" class="table table-striped table-bordered table-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Rol</th>
                                    <th>Usuario</th>
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>Cedula</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody id="developers">
                                <?php foreach ($usuarios2 as $usuario) { ?>
                                    <tr>
                                        <td><?php echo $usuario->usuid ?></td>
                                        <td><?php echo $usuario->rolnombre ?></td>
                                        <td><?php echo $usuario->usuusuario ?></td>
                                        <td><?php echo $usuario->usunombre ?></td>
                                        <td><?php echo $usuario->usuapellido ?></td>
                                        <td><?php echo $usuario->usucedula ?></td>
                                        <td>
                                            <a href="editar_usuario.php?usuid=<?php echo $usuario->usuid ?>" class="btn btn-success shadow-sm"><img src="img/editar.png" alt="" class="btn_img"></a>
                                        </td>
                                        <td>
                                            <a href="eliminar_usuario.php?usuid=<?php echo $usuario->usuid ?>"  class="btn btn-danger shadow-sm" style="color: white;"><img src="img/eliminar.png" alt="" class="btn_img"></a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>

                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div><br>
</div>

</body>

</html>