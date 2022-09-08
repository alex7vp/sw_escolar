<?php
class Curso
{
    private $curnombre, $curid;

    public function __construct($curnombre, $curid = null)
    {
        $this->curnombre = $curnombre;
        if ($curid) {
            $this->curid = $curid;
        }        
    }

    public function guardar()
    {        
        global $conn;
        $sentencia = $conn->prepare("INSERT INTO cursos
            (curnombre)
                VALUES
                (?)");
        $sentencia->bindParam(1,$this->curnombre);        
        $sentencia->execute();
    }

    public static function obtener()
    {
        global $conn;
        $sentencia = $conn->query("SELECT curid, curnombre
        FROM cursos
        ORDER BY curnombre");
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

        $sentencia = 'SELECT curid, curnombre FROM cursos WHERE curid=:curid ';
        $registros = $conn->prepare($sentencia);
        $registros->execute(array(":curid" => $curid));
        return $registros = $registros->fetch(PDO::FETCH_OBJ);
    }
   
    public function actualizar($curnombre,$curid)
    {
        global $conn;        
        $sentencia = 'UPDATE cursos SET curnombre=:curnombre WHERE curid=:curid ';
        $registros = $conn->prepare( $sentencia );     
        $registros->execute( array(":curnombre" => $curnombre,":curid" => $curid) ); 
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