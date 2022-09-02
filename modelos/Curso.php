<?php
class Curso
{
    private $curnombre, $parid, $curid;

    public function __construct($parid, $curnombre, $curid = null)
    {
        $this->parid = $parid;
        $this->curnombre = $curnombre;
        if ($curid) {
            $this->curid = $curid;
        }        
    }

    public function guardar()
    {        
        global $conn;
        $sentencia = $conn->prepare("INSERT INTO cursos
            (parid, curnombre)
                VALUES
                (?,?)");
        $sentencia->bindParam(1,$this->parid);
        $sentencia->bindParam(2,$this->curnombre);        
        $sentencia->execute();
    }

    public static function obtener()
    {
        global $conn;
        $sentencia = $conn->query("SELECT curid, curnombre, cursos.parid, parnombres 
        FROM cursos, paralelos
        WHERE cursos.parid= paralelos.parid
        ORDER BY cursos.parid");
        return $resultado = $sentencia->fetchAll(PDO::FETCH_OBJ);
    }
    public static function obtenerLimite($upset)
    {
        global $conn;
        $sentencia = $conn->query("SELECT * from paralelos LIMIT 5 OFFSET ".$upset);
        return $resultado = $sentencia->fetchAll(PDO::FETCH_OBJ);
    }
    public static function obtenerUno($curid)
    {
        global $conn;

        $sentencia = 'SELECT curid, parid, curnombre FROM cursos WHERE curid=:curid ';
        $registros = $conn->prepare($sentencia);
        $registros->execute(array(":curid" => $curid));
        return $registros = $registros->fetch(PDO::FETCH_OBJ);
    }
    public static function porParalelos($parid)
    {        
        global $conn;
        $sentencia = "SELECT curid, curnombre, cursos.parid, parnombres 
        FROM cursos, paralelos
        WHERE paralelos.parid=cursos.parid AND cursos.parid= :parid
        ORDER BY cursos.parid";
        $registros = $conn->prepare( $sentencia ); 
        $registros ->execute(array(":parid" => $parid));
        return $resultado = $registros->fetchAll(PDO::FETCH_OBJ);   
    }
    
    public function actualizar($parid, $curnombre,$curid)
    {
        global $conn;        
        $sentencia = 'UPDATE cursos SET curnombre=:curnombre , parid=:parid WHERE curid=:curid ';
        $registros = $conn->prepare( $sentencia );     
        $registros->execute( array(":parid" => $parid,":curnombre" => $curnombre,":curid" => $curid) ); 
        return $registros = $registros->fetch( PDO::FETCH_OBJ );
    }

    public static function eliminar($curid)
    {
        global $conn;
        $sentencia = $conn->prepare("DELETE FROM cursos WHERE curid = ?");
        $sentencia->bindParam(1, $curid);
        $sentencia->execute();
    }
}