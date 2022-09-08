<?php
session_start();
include "conf.php";
include "modelos/Materia.php";
include "modelos/Area.php";
require_once('layouts/layout.php');
$materias = Materia::obtener();
if (!isset($_SESSION['rol'])) {
    header("Location: index.php");
}

?>

<div class="card container mt-3 shadow">
    <div class="card-header">
        <h3 class="txt">Materias</h3>
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
                            <button id="btn_agrMateria" class="btn btn-outline-primary shadow" onclick="ActivarOcultarVarios('agrmateria','todas','areas')"><img src="img/agregar_materia.png" alt="">
                                <p>Agregar Materia</p>
                            </button>
                        </div>
                        <div class="col">
                            <button id="btn_agrmateria" class="btn btn-outline-primary shadow" onclick="ActivarOcultarVarios('todas','agrmateria','areas')"><img src="img/materia.png" alt="">
                                <p>Todas las materias</p>
                            </button>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <center>
                            <div class="col">
                                <button id="btn_agrmateria" class="btn btn-outline-primary shadow" onclick="ActivarOcultarVarios('areas','agrmateria','todas')"><img src="img/todas_materias.png" alt="">
                                    <p>Por áreas</p>
                                </button>
                            </div>
                        </center>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card card-body">
                    <form action="nuevamateria.php" id="agrmateria" method="POST" style="display: none;">
                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                    <div class="input-group mb-2">
                                        <span class="input-group-text" id="basic-addon1">Area</span>
                                        <select name="areid" class="form-select form-select">
                                            <option value="1">Seleccione:</option>
                                            <?php
                                            $areas = Area::obtener();
                                            foreach ($areas as $area) { ?>
                                                <option value="<?php echo $area->areid ?>"><?php echo $area->arenombre ?></option>

                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="input-group mb-2">
                                        <span class="input-group-text" id="basic-addon1">Materia</span>
                                        <input type="text" class="form-control" name="matnombre" id="arenombre" placeholder="Ingresa el nombre de la materia" aria-label="Username" aria-describedby="basic-addon1" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group ">
                                        <button class="btn btn-outline-primary shadow-sm btn-sm" type="submit"><img src="img/guardar2.png"> Agregar</button>
                                    </div>
                                    <div class="form-group mt-3">
                                    <a class="btn btn-outline-danger btn-sm shadow-sm" onclick="ActivarOcultar('btn_agrmateria','agrmateria')"><img src="img/cancelar.png" alt=""> Cancelar</a>
                                    </div>

                                </div>
                            </div>                            
                        </div>

                    </form>

                    <table id="todas" class="table table-striped table-bordered table-hover" style="width:100%;display: none;">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Area</th>
                                <th>Materia</th>
                                <th>Editar</th>
                                <th>Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($materias as $materia) { ?>
                                <tr>
                                    <td><?php echo $materia->matid ?></td>
                                    <td><?php echo $materia->arenombre ?></td>
                                    <td><?php echo $materia->matnombre ?></td>
                                    <td>
                                        <a href="editar_materia.php?matid=<?php echo $materia->matid ?>" class="btn btn-success shadow-sm"><img src="img/editar.png" alt="" class="btn_img"></a>
                                    </td>
                                    <td>
                                        <a href="eliminar_materia.php?areid=<?php echo $materia->matid ?>" class="btn btn-danger shadow-sm"><img src="img/eliminar.png" alt="" class="btn_img"></a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <div id="areas" style="display: block;">
                        <form action="" method="$_POST">
                            <div class="container">
                                <div class="row">
                                    <div class="col-8">
                                        <select name="select" placeholder="Selecciona una area" class="form-select form-select">
                                            <?php
                                            $areas = Area::obtener();
                                            foreach ($areas as $area) { ?>
                                                <option value="<?php echo $area->areid ?>"><?php echo $area->arenombre ?></option>

                                            <?php } ?>
                                        </select>
                                    </div>

                                    <div class="col-4"><button class="btn btn-outline-primary shadow-sm" type="submit"><img src="img/lupa.png" alt=""> Buscar</button></div>
                                </div>
                            </div>
                        </form><br>

                        <?php
                        if (isset($_GET["select"])) {
                            $areid = $_GET["select"];
                        } else {
                            $areid = "1";
                        }

                        $materias2 = Materia::porAreas($areid);

                        ?>
                        <table id="todas" class="table table-striped table-bordered table-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Area</th>
                                    <th>Materia</th>
                                    <th>Editar</th>
                                    <th>Eliminar</th>
                                </tr>
                            </thead>
                            <tbody id="developers">
                                <?php foreach ($materias2 as $materia) { ?>
                                    <tr>
                                        <td><?php echo $materia->matid ?></td>
                                        <td><?php echo $materia->arenombre ?></td>
                                        <td><?php echo $materia->matnombre ?></td>
                                        <td>
                                            <a href="editar_materia.php?matid=<?php echo $materia->matid ?>" class="btn btn-success shadow-sm"><img src="img/editar.png" alt="" class="btn_img"></a>
                                        </td>
                                        <td>
                                            <a href="eliminar_materia.php?matid=<?php echo $materia->matid ?>" class="btn btn-danger shadow-sm" style="color: white;"><img src="img/eliminar.png" alt="" class="btn_img"></a>
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