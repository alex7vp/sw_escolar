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

    public static function obtenerUno($usuusuario, $usupassword)
    {
        global $conn;
        /*$sentencia = $conn->query("SELECT * FROM provincias WHERE proid= ?");
        $sentencia->bindParam("s", $proid);
        $sentencia->execute();
        //$resultado = $sentencia->;
        return $resultado = $sentencia->fetch(PDO::FETCH_OBJ);*/

        global $conn;        
        $sentencia = 'SELECT * FROM usuarios WHERE usuusuario=:usuusuario AND usupassword=:usupassword ';
        $registros = $conn->prepare( $sentencia );     
        $registros->execute( array(":usuusuario" => $usuusuario, ":usupassword" => $usupassword) ); 
        return $registros = $registros->fetch( PDO::FETCH_OBJ );

        
    }
}