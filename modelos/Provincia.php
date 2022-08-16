<?php
class Provincia
{
    private $proNombre, $id;

    public function __construct($proNombre, $id = null)
    {
        $this->proNombre = $proNombre;
        if ($id) {
            $this->id = $id;
        }
    }

    public function guardar()
    {
        global $conn;
        $sentencia = $conn->prepare("INSERT INTO provincias
            (proNombre)
                VALUES
                (?)");
        $sentencia->bindParam(1,$this->proNombre);
        $sentencia->execute();
    }

    public static function obtener()
    {
        global $conn;
        $sentencia = $conn->query("SELECT * from provincias");
        return $resultado = $sentencia->fetchAll(PDO::FETCH_OBJ);
        //$resultado = $mysqli->query("SELECT id, nombre FROM provincias");
        //return $resultado->fetch_all(MYSQLI_ASSOC);
    }
    public static function obtenerLimite($upset)
    {
        global $conn;
        $sentencia = $conn->query("SELECT * from provincias LIMIT 5 OFFSET ".$upset);
        return $resultado = $sentencia->fetchAll(PDO::FETCH_OBJ);
        //$resultado = $mysqli->query("SELECT id, nombre FROM provincias");
        //return $resultado->fetch_all(MYSQLI_ASSOC);
    }
    public static function obtenerUno($id)
    {
        global $mysqli;
        $sentencia = $mysqli->prepare("SELECT id, nombre FROM provincias WHERE id = ?");
        $sentencia->bind_param("i", $id);
        $sentencia->execute();
        $resultado = $sentencia->get_result();
        return $resultado->fetch_object();
    }
    public function actualizar()
    {
        global $mysqli;
        $sentencia = $mysqli->prepare("update provincias set nombre = ?, grupo = ? where id = ?");
        $sentencia->bind_param("ssi", $this->nombre, $this->id);
        $sentencia->execute();
    }

    public static function eliminar($id)
    {
        global $mysqli;
        $sentencia = $mysqli->prepare("DELETE FROM provincias WHERE id = ?");
        $sentencia->bind_param("i", $id);
        $sentencia->execute();
    }
}