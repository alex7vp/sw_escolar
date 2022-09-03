<?php
class Comprobar
{
    private $usuusuario, $usupassword;

    public function __construct($usuusuario, $usupassword)
    {
        $this->usuusuario = $usuusuario;
        if ($usupassword) {
            $this->usupassword = $usupassword;
        }
    }

    public static function obtener($usuusuario, $usupassword)
    {
        global $conn;    
        $sentencia = 'SELECT * FROM usuarios WHERE usuusuario=:usuusuario AND usupassword=:usupassword ';
        $registros = $conn->prepare( $sentencia );     
        $registros->execute( array(":usuusuario" => $usuusuario, ":usupassword" => $usupassword) ); 
        return $registros = $registros->fetch( PDO::FETCH_OBJ );        
    }
    public static function obtenerDocente($usuusuario, $usupassword)
    {
        global $conn;        
        $sentencia = 'SELECT * FROM usuarios WHERE usuusuario=:usuusuario AND usupassword=:usupassword ';
        $registros = $conn->prepare( $sentencia );     
        $registros->execute( array(":usuusuario" => $usuusuario, ":usupassword" => $usupassword) ); 
        return $registros = $registros->fetch( PDO::FETCH_OBJ );        
    }
    public static function obtenerEstudiante($usuusuario, $usupassword)
    {
        global $conn;        
        $sentencia = 'SELECT * FROM usuarios WHERE usuusuario=:usuusuario AND usupassword=:usupassword ';
        $registros = $conn->prepare( $sentencia );     
        $registros->execute( array(":usuusuario" => $usuusuario, ":usupassword" => $usupassword) ); 
        return $registros = $registros->fetch( PDO::FETCH_OBJ );        
    }
}