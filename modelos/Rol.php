<?php
class Rol
{
    private $rolnombre, $rolid;

    public function __construct($rolnombre, $rolid = null)
    {
        $this->rolnombre = $rolnombre;
        if ($rolid) {
            $this->id = $rolid;
        }
    }

    public function guardar()
    {
        global $conn;
        $sentencia = $conn->prepare("INSERT INTO roles
            (rolnombre)
                VALUES
                (?)");
        $sentencia->bindParam(1, $this->rolnombre);
        $sentencia->execute();
    }

    public static function obtener()
    {
        global $conn;
        $sentencia = $conn->query("SELECT * from roles ORDER BY rolid ");
        return $resultado = $sentencia->fetchAll(PDO::FETCH_OBJ);
    }
    public static function obtenerLimite($upset)
    {
        global $conn;
        $sentencia = $conn->query("SELECT * from roles LIMIT 5 OFFSET " . $upset);
        return $resultado = $sentencia->fetchAll(PDO::FETCH_OBJ);
    }
    public static function obtenerUno($rolid)
    {
        global $conn;

        $sentencia = 'SELECT rolid, rolnombre FROM roles WHERE rolid=:rolid ';
        $registros = $conn->prepare($sentencia);
        $registros->execute(array(":rolid" => $rolid));
        return $registros = $registros->fetch(PDO::FETCH_OBJ);
    }
    public function actualizar($rolnombre, $rolid)
    {
        global $conn;
        $sentencia = 'UPDATE roles SET rolnombre=:rolnombre WHERE rolid=:rolid ';
        $registros = $conn->prepare($sentencia);
        $registros->execute(array(":rolnombre" => $rolnombre, ":rolid" => $rolid));
        return $registros = $registros->fetch(PDO::FETCH_OBJ);
    }

    public static function eliminar($rolid)
    {
        global $conn;
        $sentencia = $conn->prepare("DELETE FROM roles WHERE rolid = ?");
        $sentencia->bindParam(1, $rolid);
        $sentencia->execute();
    }
}
