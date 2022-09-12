<?php
class Ciudad
{
    private $ciunombre, $proid, $ciuid;

    public function __construct($proid, $ciunombre, $ciuid = null)
    {
        $this->proid = $proid;
        $this->ciunombre = $ciunombre;
        if ($ciuid) {
            $this->ciuid = $ciuid;
        }        
    }

    public function guardar()
    {
        global $conn;
        $sentencia = $conn->prepare("INSERT INTO ciudades
            (proid, ciunombre)
                VALUES
                (?,?)");
        $sentencia->bindParam(1,$this->proid);
        $sentencia->bindParam(2,$this->ciunombre);        
        $sentencia->execute();
    }

    public static function obtener()
    {
        global $conn;
        $sentencia = $conn->query("SELECT ciuid, ciunombre, ciudades.proid, pronombre 
        FROM ciudades, provincias
        WHERE ciudades.proid= provincias.proid
        ORDER BY ciudades.proid");
        return $resultado = $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    
    public static function obtenerUno($ciuid)
    {
        global $conn;

        $sentencia = 'SELECT ciuid, proid, ciunombre FROM ciudades WHERE ciuid=:ciuid ';
        $registros = $conn->prepare($sentencia);
        $registros->execute(array(":ciuid" => $ciuid));
        return $registros = $registros->fetch(PDO::FETCH_OBJ);
    }
    public static function porProvincias($proid)
    {        
        global $conn;
        $sentencia = "SELECT ciuid, ciunombre, ciudades.proid, pronombre 
        FROM ciudades, provincias
        WHERE provincias.proid=ciudades.proid AND ciudades.proid= :proid
        ORDER BY ciudades.proid";
        $registros = $conn->prepare( $sentencia ); 
        $registros ->execute(array(":proid" => $proid));
        return $resultado = $registros->fetchAll(PDO::FETCH_OBJ); 
    }
    
    public function actualizar($proid, $ciunombre,$ciuid)
    {
        global $conn;        
        $sentencia = 'UPDATE ciudades SET ciunombre=:ciunombre , proid=:proid WHERE ciuid=:ciuid ';
        $registros = $conn->prepare( $sentencia );     
        $registros->execute( array(":proid" => $proid,":ciunombre" => $ciunombre,":ciuid" => $ciuid) ); 
        return $registros = $registros->fetch( PDO::FETCH_OBJ );       
    }

    public static function eliminar($ciuid)
    {
        global $conn;
        $sentencia = $conn->prepare("DELETE FROM ciudades WHERE ciuid = ?");
        $sentencia->bindParam(1, $ciuid);
        $sentencia->execute();
    }
}