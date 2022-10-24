<?php
class rMatriculacion
{
    private $perid, $usuid, $curid, $rmatestado, $rmaid;

    public function __construct($perid, $usuid, $curid, $rmatestado, $rmaid = null)
    {
        $this->perid = $perid;
        $this->usuid = $usuid;
        $this->curid = $curid;
        $this->rmatestado = $rmatestado;
        if ($rmaid) {
            $this->rmaid = $rmaid;
        }        
    }

    public function guardar()
    {
        global $conn;
        $sentencia = $conn->prepare("INSERT INTO rmatriculacion
            (perid, usuid, curid, rmatestado)
                VALUES
                (?,?,?,?)");
        $sentencia->bindParam(1,$this->perid);
        $sentencia->bindParam(2,$this->usuid);
        $sentencia->bindParam(3,$this->curid);
        $sentencia->bindParam(4,$this->rmatestado);
        $sentencia->execute();
    }

    public static function obtener()
    {
        global $conn;
        $sentencia = $conn->query("SELECT rmatriculacion.*, usuarios.*, periodos.*, cursos.*
        FROM rmatriculacion, usuarios, periodos, cursos
        WHERE rmatriculacion.usuid= usuarios.usuid AND rmatriculacion.perid= periodos.perid AND rmatriculacion.curid=cursos.curid ");
        return $resultado = $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    public static function obtenerUno($rmatid)
    {
        global $conn;

        $sentencia = $conn->query("SELECT rmatriculacion.*, usuarios.*, periodos.*, cursos.*
        FROM rmatriculacion, usuarios, periodos, cursos 
        WHERE rmatriculacion.usuid= usuarios.usuid AND rmatriculacion.perid= periodos.perid AND rmatid=:rmatid AND rmatriculacion.curid=cursos.curid");
        $registros = $conn->prepare($sentencia);
        $registros->execute(array(":rmatid" => $rmatid));
        return $registros = $registros->fetch(PDO::FETCH_OBJ);
    }

    public static function porMateria($curid)
    {        
        global $conn;
        $sentencia = "SELECT rmatriculacion.*, usuarios.*, periodos.*
        FROM rmatriculacion, usuarios, periodos
        WHERE rmatriculacion.usuid=usuarios.usuid AND periodos.perid=rmatriculacion.perid AND curid= :curid";
        $registros = $conn->prepare( $sentencia ); 
        $registros ->execute(array(":curid" => $curid));
        return $resultado = $registros->fetchAll(PDO::FETCH_OBJ); 
    }

    public static function porUsuario($usuid)
    {
        global $conn;

        $sentencia = $conn->query("SELECT rmatriculacion.*, usuarios.*, periodos.*
        FROM rmatriculacion, usuarios, periodos
        WHERE rmatriculacion.usuid= usuarios.usuid AND rmatriculacion.perid= periodos.perid AND rmatriculacion.usuid=:usuid");
        $registros = $conn->prepare($sentencia);
        $registros->execute(array(":usuid" => $usuid));
        return $registros = $registros->fetch(PDO::FETCH_OBJ);
    }

    public static function comprobar($usuid, $perid)
    {        
        global $conn;
        $sentencia = "SELECT rmatriculacion.*, usuarios.*, periodos.*
        FROM rmatriculacion, usuarios, periodos
        WHERE rmatriculacion.usuid=usuarios.usuid AND periodos.perid=rmatriculacion.perid AND rmatriculacion.usuid= :usuid AND rmatriculacion.perid= :perid";
        $registros = $conn->prepare( $sentencia ); 
        $registros ->execute(array(":usuid" => $usuid, ":perid" => $perid));
        return $resultado = $registros->fetchAll(PDO::FETCH_OBJ); 
    }

    public static function porPeriodo($perid)
    {
        global $conn;

        $sentencia = $conn->query("SELECT rmatriculacion.*, usuarios.*, periodos.*
        FROM rmatriculacion, usuarios, periodos
        WHERE rmatriculacion.usuid= usuarios.usuid AND rmatriculacion.perid= periodos.perid AND perid=:perid");
        $registros = $conn->prepare($sentencia);
        $registros->execute(array(":perid" => $perid));
        return $registros = $registros->fetch(PDO::FETCH_OBJ);
    }
    
    public function actualizar($perid, $usuid, $rmatestado, $rmatid)
    {
        global $conn;        
        $sentencia = 'UPDATE rmatriculacion SET perid=:perid,  usuid=:usuid, rmatestado=:rmatestado WHERE rmatid=:rmatid ';
        $registros = $conn->prepare( $sentencia );     
        $registros->execute( array(":perid" => $perid, ":usuid" => $usuid, ":rmatestado"=>$rmatestado ,":rmatid" => $rmatid) ); 
        return $registros = $registros->fetch( PDO::FETCH_OBJ );       
    }

    public static function eliminar($rmatid)
    {
        global $conn;
        $sentencia = $conn->prepare("DELETE FROM rmatriculacion WHERE rmatid = ?");
        $sentencia->bindParam(1, $rmatid);
        $sentencia->execute();
    }
}