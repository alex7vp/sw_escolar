<?php
class Paralelo
{
    private $parnombres, $parid;

    public function __construct($parnombres, $parid = null)
    {
        $this->parnombres = $parnombres;
        if ($parid) {
            $this->parid = $parid;
        }
    }

    public function guardar()
    {
        global $conn;
        $sentencia = $conn->prepare("INSERT INTO paralelos
            (parnombres)
                VALUES
                (?)");
        $sentencia->bindParam(1, $this->parnombres);
        $sentencia->execute();
    }

    public static function obtener()
    {
        global $conn;
        $sentencia = $conn->query("SELECT * from paralelos ORDER BY parid ");
        return $resultado = $sentencia->fetchAll(PDO::FETCH_OBJ);
    }
    public static function obtenerLimite($upset)
    {
        global $conn;
        $sentencia = $conn->query("SELECT * from paralelos LIMIT 5 OFFSET " . $upset);
        return $resultado = $sentencia->fetchAll(PDO::FETCH_OBJ);
    }
    public static function obtenerUno($parid)
    {
        global $conn;

        $sentencia = 'SELECT parid, parnombres FROM paralelos WHERE parid=:parid ';
        $registros = $conn->prepare($sentencia);
        $registros->execute(array(":parid" => $parid));
        return $registros = $registros->fetch(PDO::FETCH_OBJ);
    }
    public function actualizar($parnombres, $parid)
    {
        global $conn;
        $sentencia = 'UPDATE paralelos SET parnombres=:parnombres WHERE parid=:parid ';
        $registros = $conn->prepare($sentencia);
        $registros->execute(array(":parnombres" => $parnombres, ":parid" => $parid));
        return $registros = $registros->fetch(PDO::FETCH_OBJ);
    }

    public static function eliminar($parid)
    {
        global $conn;
        $sentencia = $conn->prepare("DELETE FROM paralelos WHERE parid = ?");
        $sentencia->bindParam(1, $parid);
        $sentencia->execute();
    }
}
