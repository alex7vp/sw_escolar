<?php
class Materia
{
    private $matnombre, $areid, $matid;

    public function __construct($areid, $matnombre, $matid = null)
    {
        $this->areid = $areid;
        $this->matnombre = $matnombre;
        if ($matid) {
            $this->matid = $matid;
        }        
    }

    public function guardar()
    {
        global $conn;
        $sentencia = $conn->prepare("INSERT INTO materias
            (areid, matnombre)
                VALUES
                (?,?)");
        $sentencia->bindParam(1,$this->areid);
        $sentencia->bindParam(2,$this->matnombre);        
        $sentencia->execute();
    }

    public static function obtener()
    {
        global $conn;
        $sentencia = $conn->query("SELECT matid, matnombre, materias.areid, arenombre 
        FROM materias, areas
        WHERE materias.areid= areas.areid
        ORDER BY materias.areid");
        return $resultado = $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    public static function obtenerUno($matid)
    {
        global $conn;

        $sentencia = 'SELECT matid, areid, matnombre FROM materias WHERE matid=:matid ';
        $registros = $conn->prepare($sentencia);
        $registros->execute(array(":matid" => $matid));
        return $registros = $registros->fetch(PDO::FETCH_OBJ);
    }
    public static function porAreas($areid)
    {        
        global $conn;
        $sentencia = "SELECT matid, matnombre, materias.areid, arenombre 
        FROM materias, areas
        WHERE areas.areid=materias.areid AND materias.areid= :areid
        ORDER BY materias.areid";
        $registros = $conn->prepare( $sentencia ); 
        $registros ->execute(array(":areid" => $areid));
        return $resultado = $registros->fetchAll(PDO::FETCH_OBJ);  
    }
    
    public function actualizar($areid, $matnombre,$matid)
    {
        global $conn;        
        $sentencia = 'UPDATE materias SET matnombre=:matnombre , areid=:areid WHERE matid=:matid ';
        $registros = $conn->prepare( $sentencia );     
        $registros->execute( array(":areid" => $areid,":matnombre" => $matnombre,":matid" => $matid) ); 
        return $registros = $registros->fetch( PDO::FETCH_OBJ );
    }

    public static function eliminar($matid)
    {
        global $conn;
        $sentencia = $conn->prepare("DELETE FROM materias WHERE matid = ?");
        $sentencia->bindParam(1, $matid);
        $sentencia->execute();
    }
}