<?php
session_start();
include "conf.php";
include "modelos/Usuario.php";
include "modelos/Periodo.php";
include "modelos/rMatriculacion.php";
include "modelos/Curso.php";
require_once('layouts/layout.php');
if (!isset($_SESSION['rol'])) {
    header("Location: index.php");
}

?>

<div class="card container mt-3 shadow">
    <div class="card-header">
        <h3 class="txt" Matrículas</h3>
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
                                <p>Agregar Matrículas</p>
                            </button>
                        </div>
                        <div class="col">
                            <button id="btn_agrusuario" class="btn btn-outline-primary shadow" onclick="ActivarOcultarVarios('todas','agrusuario','roles')"><img src="img/usuarios.png" alt="">
                                <p>Matrículas generadas</p>
                            </button>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <center>
                            <div class="col">
                                <button id="btn_agrusuario" class="btn btn-outline-primary shadow" onclick="ActivarOcultarVarios('roles','agrusuario','todas')"><img src="img/usuario.png" alt="">
                                    <p>Grados/cursos</p>
                                </button>
                            </div>
                        </center>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card card-body">
                    <form action="nuevamatricula.php" id="agrusuario" method="POST" style="display: none;">
                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                    <div class="input-group mb-2">
                                        <span class="input-group-text" id="basic-addon1">Curso</span>
                                        <select name="curid" class="form-select form-select">
                                            <?php
                                            $cursos = Curso::obtener();
                                            foreach ($cursos as $curso) { ?>
                                                <option value="<?php echo $curso->curid ?>"><?php echo $curso->curnombre ?></option>

                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="input-group mb-2">
                                        <span class="input-group-text" id="basic-addon1">Año Lectivo</span>
                                        <select name="perid" class="form-select form-select">
                                            <?php
                                            $periodos = Periodo::obtener();
                                            foreach ($periodos as $periodo) { ?>
                                                <option value="<?php echo $periodo->perid ?>"><?php echo $periodo->pernombre ?></option>

                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="input-group mb-2">
                                        <span class="input-group-text" id="basic-addon1">Estudiante</span>
                                        <select name="usuid" class="form-select form-select">
                                            <?php
                                            $usuarios = Usuario::porEstudiantes();
                                            foreach ($usuarios as $usuario) { ?>
                                                <option value="<?php echo $usuario->usuid ?>"><?php echo $usuario->usunombre . " " . $usuario->usuapellido ?></option>

                                            <?php } ?>
                                        </select>
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
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Período</th>
                                <th>Curso</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $matriculas = rMatriculacion::obtener();
                            foreach ($matriculas as $usuario2) { ?>
                                <tr>
                                    <td><?php echo $usuario2->rmaid ?></td>
                                    <td><?php echo $usuario2->usunombre ?></td>
                                    <td><?php echo $usuario2->usuapellido ?></td>
                                    <td><?php echo $usuario2->pernombre ?></td>
                                    <td><?php echo $usuario2->curnombre ?></td>
                                    <td>
                                        <a href="editar_usuario.php?usuid=<?php echo $usuario2->rmaid ?>" class="btn btn-success shadow-sm"><img src="img/editar.png" alt="" class="btn_img"></a>
                                    </td>
                                    <td>
                                        <a href="eliminar_usuario.php?rolid=<?php echo $usuario2->rmaid ?>" class="btn btn-danger shadow-sm"><img src="img/eliminar.png" alt="" class="btn_img"></a>
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
                                            $cursos = Curso::obtener();
                                            foreach ($cursos as $curso) { ?>
                                                <option value="<?php echo $curso->curid ?>"><?php echo $curso->curnombre ?></option>

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

                        $matriculas2 = rMatriculacion::porMateria($rolid);

                        ?>
                        <table id="todas" class="table table-striped table-bordered table-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Id Matrícula</th>
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>Periodo</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody id="developers">
                                <?php foreach ($matriculas2 as $matricula2) { ?>
                                    <tr>
                                        <td><?php echo $matricula2->rmaid ?></td>
                                        <td><?php echo $matricula2->usunombre ?></td>
                                        <td><?php echo $matricula2->usuapellido ?></td>
                                        <td><?php echo $matricula2->pernombre ?></td>
                                        <td>
                                            <a href="editar_usuario.php?usuid=<?php echo $usuario->usuid ?>" class="btn btn-success shadow-sm"><img src="img/editar.png" alt="" class="btn_img"></a>
                                        </td>
                                        <td>
                                            <a href="eliminar_usuario.php?usuid=<?php echo $usuario->usuid ?>" class="btn btn-danger shadow-sm" style="color: white;"><img src="img/eliminar.png" alt="" class="btn_img"></a>
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