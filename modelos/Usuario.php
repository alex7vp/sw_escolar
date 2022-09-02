<?php
class Usuario
{
    private $usuusuario, $usunombre, $usuapellido, $rolid, $usuid;

    public function __construct($rolid, $usuusuario, $usunombre, $usuapellido, $usuid = null)
    {
        $this->rolid = $rolid;
        $this->usuusuario = $usuusuario;
        $this->usunombre = $usunombre;
        $this->usuapellido = $usuapellido;
        if ($usuid) {
            $this->usuid = $usuid;
        }        
    }

    public function guardar()
    {
        global $conn;
        $sentencia = $conn->prepare("INSERT INTO usuarios
            (rolid, usunombre, usuapellido)
                VALUES
                (?,?,?)");
        $sentencia->bindParam(1,$this->rolid);
        $sentencia->bindParam(2,$this->usunombre); 
        $sentencia->bindParam(3,$this->usuapellido);         
        $sentencia->execute();
    }

    public static function obtener()
    {
        global $conn;
        $sentencia = $conn->query("SELECT usuid, usuusuario, usunombre, usuapellido, usuarios.rolid, rolnombre 
        FROM usuarios, roles
        WHERE usuarios.rolid= roles.rolid
        ORDER BY usuarios.rolid");
        return $resultado = $sentencia->fetchAll(PDO::FETCH_OBJ);
        echo "Ok";
    }
    public static function obtenerLimite($upset)
    {
        global $conn;
        $sentencia = $conn->query("SELECT * from roles LIMIT 5 OFFSET ".$upset);
        return $resultado = $sentencia->fetchAll(PDO::FETCH_OBJ);
    }
    public static function obtenerUno($usuid)
    {
        global $conn;

        $sentencia = 'SELECT usuid, rolid, usunombre FROM usuarios WHERE usuid=:usuid ';
        $registros = $conn->prepare($sentencia);
        $registros->execute(array(":usuid" => $usuid));
        return $registros = $registros->fetch(PDO::FETCH_OBJ);
    }
    public static function porRoles($rolid)
    {        
        global $conn;
        $sentencia = "SELECT usuid, usuusuario, usunombre, usuapellido, usuarios.rolid, rolnombre 
        FROM usuarios, roles
        WHERE roles.rolid=usuarios.rolid AND usuarios.rolid= :rolid
        ORDER BY usuarios.rolid";
        $registros = $conn->prepare( $sentencia ); 
        $registros ->execute(array(":rolid" => $rolid));
        return $resultado = $registros->fetchAll(PDO::FETCH_OBJ); 
    }
    
    public function actualizar($rolid, $usunombre,$usuid)
    {
        global $conn;        
        $sentencia = 'UPDATE usuarios SET usunombre=:usunombre , rolid=:rolid WHERE usuid=:usuid ';
        $registros = $conn->prepare( $sentencia );     
        $registros->execute( array(":rolid" => $rolid,":usunombre" => $usunombre,":usuid" => $usuid) ); 
        return $registros = $registros->fetch( PDO::FETCH_OBJ );
    }

    public static function eliminar($usuid)
    {
        global $conn;
        $sentencia = $conn->prepare("DELETE FROM usuarios WHERE usuid = ?");
        $sentencia->bindParam(1, $usuid);
        $sentencia->execute();
    }
}