<?php
class DetalleMateria
{
    private $curid, $matid, $usuid, $detmatcodigo, $detmatid;

    public function __construct($curid, $matid, $usuid, $detmatcodigo, $detmatid = null)
    {
        $this->curid = $curid;
        $this->matid = $matid;
        $this->usuid = $usuid;
        $this->detmatcodigo = $detmatcodigo;
        if ($detmatid) {
            $this->detmatid = $detmatid;
        }        
    }

    public function guardar()
    {
        global $conn;
        $sentencia = $conn->prepare("INSERT INTO detallematerias
            (curid, matid, usuid, detmatcodigo)
                VALUES
                (?,?,?,?)");
        $sentencia->bindParam(1,$this->curid);
        $sentencia->bindParam(2,$this->matid);
        $sentencia->bindParam(3,$this->usuid);       
        $sentencia->bindParam(4,$this->detmatcodigo);      
        $sentencia->execute();
    }

    public static function obtener()
    {
        global $conn;
        $sentencia = $conn->query("SELECT detallematerias.*, cursos.*, materias.*, areas.*, usuarios.*
        FROM detallematerias, cursos, materias, areas, usuarios
        WHERE detallematerias.curid= cursos.curid AND detallematerias.matid= materias.matid AND materias.areid= areas.areid AND detallematerias.usuid= usuarios.usuid ");
        return $resultado = $sentencia->fetchAll(PDO::FETCH_OBJ);
    }
    public static function obtenerLimite($upset)
    {
        global $conn;
        $sentencia = $conn->query("SELECT * from provincias LIMIT 5 OFFSET ".$upset);
        return $resultado = $sentencia->fetchAll(PDO::FETCH_OBJ);
    }
    public static function obtenerUno($detmatid)
    {
        global $conn;

        $sentencia = 'SELECT * FROM detallematerias WHERE detmatid=:detmatid ';
        $registros = $conn->prepare($sentencia);
        $registros->execute(array(":detmatid" => $detmatid));
        return $registros = $registros->fetch(PDO::FETCH_OBJ);
    }
    public static function porMaterias($curid)
    {        
        global $conn;
        $sentencia = "SELECT detmatid, matid, ciudades.curid, pronombre 
        FROM ciudades, provincias
        WHERE provincias.curid=ciudades.curid AND ciudades.curid= :curid
        ORDER BY ciudades.curid";
        $registros = $conn->prepare( $sentencia ); 
        $registros ->execute(array(":curid" => $curid));
        return $resultado = $registros->fetchAll(PDO::FETCH_OBJ);  
    }
    
    public function actualizar($curid, $matid, $usuid, $detmatcodigo, $detmatid)
    {
        global $conn;        
        $sentencia = 'UPDATE detallematerias SET matid=:matid , curid=:curid,  usuid=:usuid, detmatcodigo=:detmatcodigo WHERE detmatid=:detmatid ';
        $registros = $conn->prepare( $sentencia );     
        $registros->execute( array(":curid" => $curid,":matid" => $matid, ":usuid" => $usuid, ":detmatcodigo"=>$detmatcodigo ,":detmatid" => $detmatid) ); 
        return $registros = $registros->fetch( PDO::FETCH_OBJ );       
    }

    public static function eliminar($detmatid)
    {
        global $conn;
        $sentencia = $conn->prepare("DELETE FROM detallematerias WHERE detmatid = ?");
        $sentencia->bindParam(1, $detmatid);
        $sentencia->execute();
    }
}