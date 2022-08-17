<?php
class Provincia
{
    private $pronombre, $proid;

    public function __construct($proNombre, $proid = null)
    {
        $this->proNombre = $proNombre;
        if ($proid) {
            $this->id = $proid;
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
        $sentencia = $conn->query("SELECT * from provincias ORDER BY proid ");
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
    public static function obtenerUno($proid)
    {
        global $conn;
        /*$sentencia = $conn->query("SELECT * FROM provincias WHERE proid= ?");
        $sentencia->bindParam("s", $proid);
        $sentencia->execute();
        //$resultado = $sentencia->;
        return $resultado = $sentencia->fetch(PDO::FETCH_OBJ);*/
        
        $sentencia = 'SELECT proid, pronombre FROM provincias WHERE proid=:proid ';
        $registros = $conn->prepare( $sentencia );     
        $registros->execute( array(":proid" => $proid) ); 
        return $registros = $registros->fetch( PDO::FETCH_OBJ );        
    }
    public function actualizar($pronombre,$proid)
    {
        global $conn;        
        $sentencia = 'UPDATE provincias SET pronombre=:pronombre WHERE proid=:proid ';
        $registros = $conn->prepare( $sentencia );     
        $registros->execute( array(":pronombre" => $pronombre, ":proid" => $proid) ); 
        return $registros = $registros->fetch( PDO::FETCH_OBJ );
        /*global $conn;
        try {
            $sentencia = $conn->prepare("update provincias set pronombre = '?' where proid = ?");
            $sentencia->bindParam(1, $this->pronombre);
            $sentencia->bindParam(2, $this->proid);
            $sentencia->execute();
            echo "Hecho...";
        } catch (\Throwable $th) {
            echo "Error";
        }*/
       
    }

    public static function eliminar($proid)
    {
        global $conn;
        $sentencia = $conn->prepare("DELETE FROM provincias WHERE proid = ?");
        $sentencia->bindParam(1, $proid);
        $sentencia->execute();
    }
}