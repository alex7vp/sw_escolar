<?php
class Asistencia
{
    private  $rmaid, $detmatid,$resasijustificadas,$resasiinjustificadas, $resasiatrasos, $resasiid;

    public function __construct($rmaid, $detmatid,$resasijustificadas,$resasiinjustificadas, $resasiatrasos, $resasiid = null)
    {
        $this->rmaid = $rmaid;
        $this->detmatid = $detmatid;
        $this->notparcial1 = $resasijustificadas;        
        $this->notparcial2 = $resasiinjustificadas;
        $this->notporcentaje1 = $resasiatrasos;
        if ($resasiid) {
            $this->notid = $resasiid;
        }        
    }

    public function guardar()
    {
        global $conn;
        $sentencia = $conn->prepare("INSERT INTO resasistencias
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
        $sentencia = $conn->query("SELECT  resasistencia.*, rmatriculacion.*, usuarios.*
        FROM resasistencia, rmatriculacion, usuarios
        WHERE resasistencia.rmaid=rmatriculacion.rmaid AND rmatriculacion.usuid=usuarios.usuid");
        return $resultado = $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    
    public static function obtenerUno($resasiid)
    {
        global $conn;
        $sentencia = "SELECT  resasistencia.*, rmatriculacion.*, usuarios.*
        FROM resasistencia, rmatriculacion, usuarios
        WHERE resasistencia.rmaid=rmatriculacion.rmaid AND rmatriculacion.usuid=usuarios.usuid AND resasistencia.resasiid=:resasiid";
        $registros = $conn->prepare( $sentencia ); 
        $registros ->execute(array(":resasiid" => $resasiid));
        return $resultado = $registros->fetchAll(PDO::FETCH_OBJ); 
    }
    public static function porMateria($detmatid)
    {        
        global $conn;
        $sentencia = "SELECT  resasistencia.*, rmatriculacion.*, usuarios.*, materias.matnombre
        FROM resasistencia, rmatriculacion, usuarios, detallematerias, materias
        WHERE resasistencia.rmaid=rmatriculacion.rmaid AND rmatriculacion.usuid=usuarios.usuid  AND detallematerias.detmatid=resasistencia.detmatid  AND detallematerias.matid=materias.matid AND resasistencia.detmatid=:detmatid 
        ORDER BY usuarios.usuapellido";
        $registros = $conn->prepare( $sentencia ); 
        $registros ->execute(array(":detmatid" => $detmatid));
        return $resultado = $registros->fetchAll(PDO::FETCH_OBJ); 
    }
    public static function Materia($detmatid)
    {        
        global $conn;
        $sentencia = "SELECT  resasistencia.*, rmatriculacion.*, usuarios.*, materias.matnombre
        FROM resasistencia, rmatriculacion, usuarios, detallematerias, materias
        WHERE resasistencia.rmaid=rmatriculacion.rmaid AND rmatriculacion.usuid=usuarios.usuid  AND detallematerias.detmatid=resasistencia.detmatid  AND detallematerias.matid=materias.matid AND resasistencia.detmatid=:detmatid";
        $registros = $conn->prepare( $sentencia ); 
        $registros ->execute(array(":detmatid" => $detmatid));
        return $resultado = $registros->fetch(PDO::FETCH_OBJ); 
    }
    public static function porUsuario($usuid)
    {        
        global $conn;
        $sentencia = "SELECT  resasistencia.*, rmatriculacion.*, usuarios.*, materias.matnombre
        FROM resasistencia, rmatriculacion, usuarios, detallematerias, materias
        WHERE resasistencia.rmaid=rmatriculacion.rmaid AND rmatriculacion.usuid=usuarios.usuid  AND detallematerias.detmatid=resasistencia.detmatid  AND detallematerias.matid=materias.matid AND usuarios.usuid=:usuid";
        $registros = $conn->prepare( $sentencia ); 
        $registros ->execute(array(":usuid" => $usuid));
        return $resultado = $registros->fetchAll(PDO::FETCH_OBJ); 
    }
    
    public function actualizar($resasijustificadas, $resasiinjustificadas, $resasiatrasos, $resasiid)
    {
        global $conn; 
              
        $sentencia = 'UPDATE resasistencia
        SET resasijustificadas=:resasijustificadas, resasiinjustificadas=:resasiinjustificadas,  resasiatrasos=:resasiatrasos
        WHERE resasiid=:resasiid ';
        $registros = $conn->prepare( $sentencia );     
        $registros->execute( array(":resasijustificadas" => $resasijustificadas,":resasiinjustificadas" => $resasiinjustificadas,":resasiatrasos" => $resasiatrasos,":resasiid" => $resasiid) ); 
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