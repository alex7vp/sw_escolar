<?php
class Ciudad
{
    private $ciunombre, $proid, $ciuid;

    public function __construct($ciuNombre, $ciuId = null)
    {
        
        $this->ciuNombre = $ciuNombre;
        if ($ciuId) {
            $this->proid = $ciuId;
        }
    }

    public function guardar()
    {
        global $conn;
        $sentencia = $conn->prepare("INSERT INTO ciudades
            (proId, ciuNombre)
                VALUES
                (?,?)");
        $sentencia->bindParam(1,$this->proId);
        $sentencia->bindParam(2,$this->ciuNombre);
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
    public static function obtenerLimite($upset)
    {
        global $conn;
        $sentencia = $conn->query("SELECT * from provincias LIMIT 5 OFFSET ".$upset);
        return $resultado = $sentencia->fetchAll(PDO::FETCH_OBJ);
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
        /*global $conn;
        $sentencia = "SELECT ciuid, ciunombre, provincias.proid 
        FROM ciudades, provincias
        WHERE proid=:proid";
        //$sentencia = 'SELECT proid, pronombre FROM provincias WHERE proid=:proid ';
        $registros = $conn->prepare( $sentencia );     
        $registros->execute( array(":proid" => $proid) ); 
        return $registros = $registros->fetchAll( PDO::FETCH_OBJ );  */   
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