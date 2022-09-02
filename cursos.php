<?php
session_start();
include "conf.php";
include "modelos/Curso.php";
include "modelos/Paralelo.php";
require_once('layouts/layout.php');
$cursos = Curso::obtener();
if (!isset($_SESSION['rol'])) {
    header("Location: index.php");
}

?>

<div class="card container mt-3 shadow">
    <div class="card-header">
        <h3 class="txt">Cursos</h3>
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
                            <button id="btn_agrCurso" class="btn btn-outline-primary shadow" onclick="ActivarOcultarVarios('agrCurso','todas','paralelos')"><img src="img/curso.png" alt="">
                                <p>Agregar Curso</p>
                            </button>
                        </div>
                        <div class="col">
                            <button id="btn_agrCurso" class="btn btn-outline-primary shadow" onclick="ActivarOcultarVarios('todas','agrCurso','paralelos')"><img src="img/curso.png" alt="">
                                <p>Todos las cursos</p>
                            </button>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <center>
                            <div class="col">
                                <button id="btn_agrCurso" class="btn btn-outline-primary shadow" onclick="ActivarOcultarVarios('paralelos','agrCurso','todas')"><img src="img/buscar_curso.png" alt="">
                                    <p>Por paralelos</p>
                                </button>
                            </div>
                        </center>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card card-body">
                    <form action="nuevacurso.php" id="agrCurso" method="POST" style="display: none;">
                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                    <div class="input-group mb-2">
                                        <span class="input-group-text" id="basic-addon1">Paralelo</span>
                                        <select name="parid" class="form-select form-select">
                                            <option value="1">Seleccione:</option>
                                            <?php
                                            $paralelos = Paralelo::obtener();
                                            foreach ($paralelos as $paralelo) { ?>
                                                <option value="<?php echo $paralelo->parid ?>"><?php echo $paralelo->parnombres ?></option>

                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="input-group mb-2">
                                        <span class="input-group-text" id="basic-addon1">Curso</span>
                                        <input type="text" class="form-control" name="curnombre" id="parnombres" placeholder="Ingresa el nombre de la curso" aria-label="Username" aria-describedby="basic-addon1" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group ">
                                        <button class="btn btn-outline-primary shadow-sm btn-sm" type="submit"><img src="img/guardar2.png"> Agregar</button>
                                    </div>
                                    <div class="form-group mt-3">
                                    <a class="btn btn-outline-danger btn-sm shadow-sm" onclick="ActivarOcultar('btn_agrCurso','agrCurso')"><img src="img/cancelar.png" alt=""> Cancelar</a>
                                    </div>

                                </div>
                            </div>                            
                        </div>

                    </form>

                    <table id="todas" class="table table-striped table-bordered table-hover" style="width:100%;display: none;">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Paralelo</th>
                                <th>Curso</th>
                                <th>Editar</th>
                                <th>Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($cursos as $curso) { ?>
                                <tr>
                                    <td><?php echo $curso->curid ?></td>
                                    <td><?php echo $curso->parnombres ?></td>
                                    <td><?php echo $curso->curnombre ?></td>
                                    <td>
                                        <a href="editar_curso.php?curid=<?php echo $curso->curid ?>" class="btn btn-success shadow-sm"><img src="img/editar.png" alt="" class="btn_img"></a>
                                    </td>
                                    <td>
                                        <a href="eliminar_curso.php?parid=<?php echo $curso->curid ?>" class="btn btn-danger shadow-sm"><img src="img/eliminar.png" alt="" class="btn_img"></a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <div id="paralelos" style="display: block;">
                        <form action="" method="$_POST">
                            <div class="container">
                                <div class="row">
                                    <div class="col-8">
                                        <select name="select" placeholder="Selecciona un paralelo" class="form-select form-select">
                                            <?php
                                            $paralelos = Paralelo::obtener();
                                            foreach ($paralelos as $paralelo) { ?>
                                                <option value="<?php echo $paralelo->parid ?>"><?php echo $paralelo->parnombres ?></option>

                                            <?php } ?>
                                        </select>
                                    </div>

                                    <div class="col-4"><button class="btn btn-outline-primary shadow-sm" type="submit"><img src="img/lupa.png" alt=""> Buscar</button></div>
                                </div>
                            </div>
                        </form><br>

                        <?php
                        if (isset($_GET["select"])) {
                            $parid = $_GET["select"];
                        } else {
                            $parid = "1";
                        }

                        $cursos2 = Curso::porParalelos($parid)

                        ?>
                        <table id="todas" class="table table-striped table-bordered table-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Paralelo</th>
                                    <th>Curso</th>
                                    <th>Editar</th>
                                    <th>Eliminar</th>
                                </tr>
                            </thead>
                            <tbody id="developers">
                                <?php foreach ($cursos2 as $curso) { ?>
                                    <tr>
                                        <td><?php echo $curso->curid ?></td>
                                        <td><?php echo $curso->parnombres ?></td>
                                        <td><?php echo $curso->curnombre ?></td>
                                        <td>
                                            <a href="editar_curso.php?curid=<?php echo $curso->curid ?>" class="btn btn-success shadow-sm"><img src="img/editar.png" alt="" class="btn_img"></a>
                                        </td>
                                        <td>
                                            <a href="eliminar_curso.php?curid=<?php echo $curso->curid ?>" class="btn btn-danger shadow-sm" style="color: white;"><img src="img/eliminar.png" alt="" class="btn_img"></a>
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