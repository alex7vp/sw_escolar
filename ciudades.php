<?php
session_start();
include "conf.php";
include "modelos/Ciudad.php";
include "modelos/Provincia.php";
require_once('layouts/layout.php');
$ciudades = Ciudad::obtener();
if (!isset($_SESSION['rol'])) {
    header("Location: index.php");
}

?>

<div class="card container mt-3 shadow">
    <div class="card-header">
        <h3 class="txt">Ciudades</h3>
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
                            <button id="btn_agrCiudad" class="btn btn-outline-primary shadow" onclick="ActivarOcultarVarios('agrCiudad','todas','provincias')"><img src="img/ciudad+.png" alt="">
                                <p>Agregar Ciudad</p>
                            </button>
                        </div>
                        <div class="col">
                            <button id="btn_agrCiudad" class="btn btn-outline-primary shadow" onclick="ActivarOcultarVarios('todas','agrCiudad','provincias')"><img src="img/ciudad.png" alt="">
                                <p>Todas las ciudades</p>
                            </button>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <center>
                            <div class="col">
                                <button id="btn_agrCiudad" class="btn btn-outline-primary shadow" onclick="ActivarOcultarVarios('provincias','agrCiudad','todas')"><img src="img/buscar_ciudad.png" alt="">
                                    <p>Por provincias</p>
                                </button>
                            </div>
                        </center>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card card-body">
                    <form action="nuevaciudad.php" id="agrCiudad" method="POST" style="display: none;">
                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                    <div class="input-group mb-2">
                                        <span class="input-group-text" id="basic-addon1">Provincia</span>
                                        <select name="proid" class="form-select form-select" required>
                                             <?php
                                            $provincias = Provincia::obtener();
                                            foreach ($provincias as $provincia) { ?>
                                                <option value="<?php echo $provincia->proid ?>"><?php echo $provincia->pronombre ?></option>

                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="input-group mb-2">
                                        <span class="input-group-text" id="basic-addon1">Ciudad</span>
                                        <input type="text" class="form-control" name="ciuNombre" id="proNombre" placeholder="Ingresa el nombre de la ciudad" aria-label="Username" aria-describedby="basic-addon1" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group ">
                                        <button class="btn btn-outline-primary shadow-sm btn-sm" type="submit"><img src="img/guardar2.png"> Agregar</button>
                                    </div>
                                    <div class="form-group mt-3">
                                    <a class="btn btn-outline-danger btn-sm shadow-sm" onclick="ActivarOcultar('btn_agrCiudad','agrCiudad')"><img src="img/cancelar.png" alt=""> Cancelar</a>
                                    </div>

                                </div>
                            </div>                            
                        </div>

                    </form>

                    <table id="todas" class="table table-striped table-bordered table-hover" style="width:100%;display: none;">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Provincia</th>
                                <th>Ciudad</th>
                                <th>Editar</th>
                                <th>Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($ciudades as $ciudad) { ?>
                                <tr>
                                    <td><?php echo $ciudad->ciuid ?></td>
                                    <td><?php echo $ciudad->pronombre ?></td>
                                    <td><?php echo $ciudad->ciunombre ?></td>
                                    <td>
                                        <a href="editar_ciudad.php?ciuid=<?php echo $ciudad->ciuid ?>" class="btn btn-success shadow-sm"><img src="img/editar.png" alt="" class="btn_img"></a>
                                    </td>
                                    <td>
                                        <a href="eliminar_ciudad.php?ciuid=<?php echo $ciudad->ciuid ?>" class="btn btn-danger shadow-sm"><img src="img/eliminar.png" alt="" class="btn_img"></a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <div id="provincias" style="display: block;">
                        <form action="" method="$_POST">
                            <div class="container">
                                <div class="row">
                                    <div class="col-8">
                                        <select name="select" placeholder="Selecciona una provincia" class="form-select form-select">
                                            <?php
                                            $provincias = Provincia::obtener();
                                            foreach ($provincias as $provincia) { ?>
                                                <option value="<?php echo $provincia->proid ?>"><?php echo $provincia->pronombre ?></option>

                                            <?php } ?>
                                        </select>
                                    </div>

                                    <div class="col-4"><button class="btn btn-outline-primary shadow-sm" type="submit"><img src="img/lupa.png" alt=""> Buscar</button></div>
                                </div>
                            </div>
                        </form><br>

                        <?php
                        if (isset($_GET["select"])) {
                            $proid = $_GET["select"];
                        } else {
                            $proid = "1";
                        }

                        $ciudades2 = Ciudad::porProvincias($proid);

                        ?>
                        <table id="todas" class="table table-striped table-bordered table-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Provincia</th>
                                    <th>Ciudad</th>
                                    <th>Editar</th>
                                    <th>Eliminar</th>
                                </tr>
                            </thead>
                            <tbody id="developers">
                                <?php foreach ($ciudades2 as $ciudad) { ?>
                                    <tr>
                                        <td><?php echo $ciudad->ciuid ?></td>
                                        <td><?php echo $ciudad->pronombre ?></td>
                                        <td><?php echo $ciudad->ciunombre ?></td>
                                        <td>
                                            <a href="editar_ciudad.php?ciuid=<?php echo $ciudad->ciuid ?>" class="btn btn-success shadow-sm"><img src="img/editar.png" alt="" class="btn_img"></a>
                                        </td>
                                        <td>
                                            <a href="eliminar_ciudad.php?ciuid=<?php echo $ciudad->ciuid ?>" class="btn btn-danger shadow-sm" style="color: white;"><img src="img/eliminar.png" alt="" class="btn_img"></a>
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