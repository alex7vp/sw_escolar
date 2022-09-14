<?php
class RegistroAsistencia
{
    private  $estasiid, $resasiid,$asifecha,$asiobservacion, $asiid;

    public function __construct( $estasiid, $resasiid,$asifecha,$asiobservacion, $asiid = null)
    {
        $this->estasiid = $estasiid;
        $this->resasiid = $resasiid;
        $this->asifecha = $asifecha;
        $this->asiobservacion = $asiobservacion;
        if ($resasiid) {
            $this->notid = $resasiid;
        }        
    }

    public function guardar()
    {
        global $conn;
        $sentencia = $conn->prepare("INSERT INTO asistencias
            (estasiid, resasiid, asifecha, asiobservacion)
                VALUES
                (?,?,?,?)");
        $sentencia->bindParam(1,$this->estasiid);
        $sentencia->bindParam(2,$this->resasiid);
        $sentencia->bindParam(3,$this->asifecha);
        $sentencia->bindParam(4,$this->asiobservacion);        
        $sentencia->execute();
    }

    public static function obtener()
    {
        global $conn;
        $sentencia = $conn->query("SELECT  *
        FROM asistencias");
        return $resultado = $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    
    public static function contarjus($resasiid)
    {
        global $conn;
        $sentencia = "SELECT *
        FROM asistencias
        WHERE resasiid=:resasiid AND estasiid=2";
        $registros = $conn->prepare( $sentencia ); 
        $registros ->execute(array(":resasiid" => $resasiid));
        return $resultado = $registros->fetch(PDO::FETCH_OBJ); 
    }
    
    public function actualizar($estasiid, $resasiid,$asifecha,$asiobservacion, $asiid)
    {
        global $conn;              
        $sentencia = 'UPDATE asistencias
        SET estasiid=:estasiid, $resasiid=:$resasiid, asifecha=:asifecha, asiobservacion=:asiobservacion WHERE asiid=:asiid ';
        $registros = $conn->prepare( $sentencia );     
        $registros->execute( array(":estasiid" => $estasiid,":$resasiid" => $resasiid,":$asifecha" => $asifecha,":$asiobservacion" => $asiobservacion, ":asiid" => $asiid) ); 
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