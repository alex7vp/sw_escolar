<?php
class Rol
{
    private $nombre, $id;

    public function __construct($nombre, $id = null)
    {
        $this->nombre = $nombre;
        if ($id) {
            $this->id = $id;
        }
    }

    public function guardar()
    {
        global $mysqli;
        $sentencia = $mysqli->prepare("INSERT INTO provincias
            (nombre)
                VALUES
                (?)");
        $sentencia->bind_param("ss", $this->nombre);
        $sentencia->execute();
    }

    public static function obtener()
    {
        global $conn;
        $sentencia = $conn->query("SELECT * from roles");
        return $resultado = $sentencia->fetchAll(PDO::FETCH_OBJ);
        //$resultado = $mysqli->query("SELECT id, nombre FROM provincias");
        //return $resultado->fetch_all(MYSQLI_ASSOC);
    }
    public static function obtenerLimite($upset)
    {
        global $conn;
        $sentencia = $conn->query("SELECT * from roles LIMIT 5 OFFSET ".$upset);
        return $resultado = $sentencia->fetchAll(PDO::FETCH_OBJ);
        //$resultado = $mysqli->query("SELECT id, nombre FROM provincias");
        //return $resultado->fetch_all(MYSQLI_ASSOC);
    }
    public static function obtenerUno($rolid)
    {
        global $conn;        
        $sentencia = 'SELECT rolid, rolnombre FROM roles WHERE rolid=:rolid ';
        $registros = $conn->prepare( $sentencia );     
        $registros->execute( array(":rolid" => $rolid) ); 
        return $registros = $registros->fetch( PDO::FETCH_OBJ );        
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