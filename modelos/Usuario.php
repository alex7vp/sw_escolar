<?php
class Usuario
{
    private $rolid, $usuusuario, $usupassword, $usunombre, $usuapellido, $ciuid, $usucedula, $usudireccion, $usutelefono, $usuid;

    public function __construct($rolid, $usuusuario,$usupassword, $usunombre, $usuapellido, $ciuid, $usucedula, $usudireccion, $usutelefono, $usuid = null)
    {
        $this->rolid = $rolid;
        $this->usuusuario = $usuusuario;
        $this->usupassword = $usupassword;
        $this->usunombre = $usunombre;
        $this->usuapellido = $usuapellido;
        $this->ciuid = $ciuid;
        $this->usucedula = $usucedula;
        $this->usudireccion = $usudireccion;
        $this->usutelefono = $usutelefono;
        $this->ciuid = $ciuid;
        if ($usuid) {
            $this->usuid = $usuid;
        }        
    }

    public function guardar()
    {
        global $conn;
        $sentencia = $conn->prepare("INSERT INTO usuarios
            (rolid, usuusuario, usupassword, usunombre, usuapellido, ciuid, usucedula, usudireccion, usutelefono)
                VALUES
                (?,?,?,?,?,?,?,?,?)");
        $sentencia->bindParam(1,$this->rolid);
        $sentencia->bindParam(2,$this->usuusuario); 
        $sentencia->bindParam(3,$this->usupassword); 
        $sentencia->bindParam(4,$this->usunombre); 
        $sentencia->bindParam(5,$this->usuapellido);  
        $sentencia->bindParam(6,$this->ciuid);  
        $sentencia->bindParam(7,$this->usucedula); 
        $sentencia->bindParam(8,$this->usudireccion); 
        $sentencia->bindParam(9,$this->usutelefono);       
        $sentencia->execute();
    }

    public static function obtener()
    {
        global $conn;
        $sentencia = $conn->query("SELECT usuid, usuusuario, usunombre, usucedula, usuapellido, usuarios.rolid, rolnombre
        FROM usuarios, roles
        WHERE usuarios.rolid= roles.rolid
        ORDER BY usuarios.rolid");
        return $resultado = $sentencia->fetchAll(PDO::FETCH_OBJ);
        echo "Ok";
    }

    public static function obtenerUno($usuid)
    {
        global $conn;

        $sentencia = 'SELECT * FROM usuarios WHERE usuid=:usuid ';
        $registros = $conn->prepare($sentencia);
        $registros->execute(array(":usuid" => $usuid));
        return $registros = $registros->fetch(PDO::FETCH_OBJ);
    }
    public static function porRoles($rolid)
    {        
        global $conn;
        $sentencia = "SELECT usuid, usuusuario, usunombre, usuapellido, usuarios.rolid, rolnombre, usucedula
        FROM usuarios, roles
        WHERE roles.rolid=usuarios.rolid AND usuarios.rolid= :rolid
        ORDER BY usuarios.rolid";
        $registros = $conn->prepare( $sentencia ); 
        $registros ->execute(array(":rolid" => $rolid));
        return $resultado = $registros->fetchAll(PDO::FETCH_OBJ); 
    }
    public static function porDocentes()
    {        
        global $conn;
        $sentencia = $conn->query("SELECT usuid, usuusuario, usunombre, usucedula, usuapellido, usuarios.rolid, rolnombre
        FROM usuarios, roles
        WHERE usuarios.rolid= roles.rolid AND usuarios.rolid= 2
        ORDER BY usuarios.rolid");
        return $resultado = $sentencia->fetchAll(PDO::FETCH_OBJ);
        echo "Ok";
    }

    public static function porEstudiantes()
    {        
        global $conn;
        $sentencia = $conn->query("SELECT usuid, usuusuario, usunombre, usucedula, usuapellido, usuarios.rolid, rolnombre
        FROM usuarios, roles
        WHERE usuarios.rolid= roles.rolid AND usuarios.rolid= 3
        ORDER BY usuarios.rolid");
        return $resultado = $sentencia->fetchAll(PDO::FETCH_OBJ);
        echo "Ok";
    }
    
    public function actualizar($rolid, $usuusuario, $usupassword, $usunombre, $usuapellido, $ciuid, $usucedula, $usudireccion, $usutelefono, $usuid)
    {
        global $conn;        
        $sentencia = $conn->prepare( 'UPDATE usuarios SET rolid= ?, usuusuario=?, usupassword=?, usunombre=?, usuapellido=?, ciuid=?, usucedula=?, usudireccion=?, usutelefono=?  WHERE usuid=? ');     
        $sentencia->bindParam(1,$this->rolid);
        $sentencia->bindParam(2,$this->usuusuario); 
        $sentencia->bindParam(3,$this->usupassword); 
        $sentencia->bindParam(4,$this->usunombre); 
        $sentencia->bindParam(5,$this->usuapellido);  
        $sentencia->bindParam(6,$this->ciuid);  
        $sentencia->bindParam(7,$this->usucedula); 
        $sentencia->bindParam(8,$this->usudireccion); 
        $sentencia->bindParam(9,$this->usutelefono);  
         
        $sentencia->bindParam(10,$this->usuid);       
        $sentencia->execute();
    }

    public static function eliminar($usuid)
    {
        global $conn;
        $sentencia = $conn->prepare("DELETE FROM usuarios WHERE usuid = ?");
        $sentencia->bindParam(1, $usuid);
        $sentencia->execute();
    }
}