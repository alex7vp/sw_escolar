<?php
class Area
{
    private $arenombre, $areid;

    public function __construct($arenombre, $areid = null)
    {
        $this->arenombre = $arenombre;
        if ($areid) {
            $this->id = $areid;
        }
    }

    public function guardar()
    {
        global $conn;
        $sentencia = $conn->prepare("INSERT INTO areas
            (arenombre)
                VALUES
                (?)");
        $sentencia->bindParam(1, $this->arenombre);
        $sentencia->execute();
    }

    public static function obtener()
    {
        global $conn;
        $sentencia = $conn->query("SELECT * from areas ORDER BY areid ");
        return $resultado = $sentencia->fetchAll(PDO::FETCH_OBJ);
        //$resultado = $mysqli->query("SELECT id, nombre FROM areas");
        //return $resultado->fetch_all(MYSQLI_ASSOC);
    }

    public static function obtenerUno($areid)
    {
        global $conn;

        $sentencia = 'SELECT areid, arenombre FROM areas WHERE areid=:areid ';
        $registros = $conn->prepare($sentencia);
        $registros->execute(array(":areid" => $areid));
        return $registros = $registros->fetch(PDO::FETCH_OBJ);
    }
    public function actualizar($arenombre, $areid)
    {
        global $conn;
        $sentencia = 'UPDATE areas SET arenombre=:arenombre WHERE areid=:areid ';
        $registros = $conn->prepare($sentencia);
        $registros->execute(array(":arenombre" => $arenombre, ":areid" => $areid));
        return $registros = $registros->fetch(PDO::FETCH_OBJ);
    }

    public static function eliminar($areid)
    {
        global $conn;
        $sentencia = $conn->prepare("DELETE FROM areas WHERE areid = ?");
        $sentencia->bindParam(1, $areid);
        $sentencia->execute();
    }
}
