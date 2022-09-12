<?php
class EstadoAsistencia
{
    private $estasinombre, $estasiid;

    public function __construct($estasinombre, $estasiid = null)
    {
        $this->estasinombre = $estasinombre;
        if ($estasiid) {
            $this->id = $estasiid;
        }
    }

    public function guardar()
    {
        global $conn;
        $sentencia = $conn->prepare("INSERT INTO estasistencias
            (estasinombre)
                VALUES
                (?)");
        $sentencia->bindParam(1, $this->estasinombre);
        $sentencia->execute();
    }

    public static function obtener()
    {
        global $conn;
        $sentencia = $conn->query("SELECT * from estasistencias ORDER BY estasiid ");
        return $resultado = $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    public static function obtenerUno($estasiid)
    {
        global $conn;

        $sentencia = 'SELECT estasiid, estasinombre FROM estasistencias WHERE estasiid=:estasiid ';
        $registros = $conn->prepare($sentencia);
        $registros->execute(array(":estasiid" => $estasiid));
        return $registros = $registros->fetch(PDO::FETCH_OBJ);
    }
    public function actualizar($estasinombre, $estasiid)
    {
        global $conn;
        $sentencia = 'UPDATE estasistencias SET estasinombre=:estasinombre WHERE estasiid=:estasiid ';
        $registros = $conn->prepare($sentencia);
        $registros->execute(array(":estasinombre" => $estasinombre, ":estasiid" => $estasiid));
        return $registros = $registros->fetch(PDO::FETCH_OBJ);
    }

    public static function eliminar($estasiid)
    {
        global $conn;
        $sentencia = $conn->prepare("DELETE FROM estasistencias WHERE estasiid = ?");
        $sentencia->bindParam(1, $estasiid);
        $sentencia->execute();
    }
}
