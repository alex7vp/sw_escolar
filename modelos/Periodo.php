<?php
class Periodo
{
    private $pernombre, $perid;

    public function __construct($pernombre, $perid = null)
    {
        $this->pernombre = $pernombre;
        if ($perid) {
            $this->id = $perid;
        }
    }

    public function guardar()
    {
        global $conn;
        $sentencia = $conn->prepare("INSERT INTO periodos
            (pernombre)
                VALUES
                (?)");
        $sentencia->bindParam(1, $this->pernombre);
        $sentencia->execute();
    }

    public static function obtener()
    {
        global $conn;
        $sentencia = $conn->query("SELECT * from periodos ORDER BY perid ");
        return $resultado = $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    public static function obtenerUno($perid)
    {
        global $conn;

        $sentencia = 'SELECT perid, pernombre FROM periodos WHERE perid=:perid ';
        $registros = $conn->prepare($sentencia);
        $registros->execute(array(":perid" => $perid));
        return $registros = $registros->fetch(PDO::FETCH_OBJ);
    }
    public function actualizar($pernombre, $perid)
    {
        global $conn;
        $sentencia = 'UPDATE periodos SET pernombre=:pernombre WHERE perid=:perid ';
        $registros = $conn->prepare($sentencia);
        $registros->execute(array(":pernombre" => $pernombre, ":perid" => $perid));
        return $registros = $registros->fetch(PDO::FETCH_OBJ);
    }

    public static function eliminar($perid)
    {
        global $conn;
        $sentencia = $conn->prepare("DELETE FROM periodos WHERE perid = ?");
        $sentencia->bindParam(1, $perid);
        $sentencia->execute();
    }
}
