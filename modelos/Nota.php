<?php
class Nota
{
    private  $rmaid, $detmatid,$notparcial1,$notparcial2, $notporcentaje1, $notevaluacion1, $notporcentaje2, $notpromedio1,$notparcial3, $notparcial4, $notporcentaje3, $notevalulacion2, $notporcentaje4, $notpromedio2, $notprofinal ,$notid;

    public function __construct($rmaid, $detmatid,$notparcial1,$notparcial2, $notporcentaje1, $notevaluacion1, $notporcentaje2, $notpromedio1,$notparcial3, $notparcial4, $notporcentaje3, $notevaluacion2, $notporcentaje4, $notpromedio2, $notprofinal, $notid = null)
    {
        $this->rmaid = $rmaid;
        $this->detmatid = $detmatid;
        $this->notparcial1 = $notparcial1;        
        $this->notparcial2 = $notparcial2;
        $this->notporcentaje1 = $notporcentaje1;
        $this->notevaluacion1 = $notevaluacion1;
        $this->notporcentaje2 = $notporcentaje2;
        $this->notpromedio1 = $notpromedio1;
        $this->notparcial3 = $notparcial3;        
        $this->notparcial4 = $notparcial4;        
        $this->notporcentaje3 = $notporcentaje3;
        $this->notevaluacion2 = $notevaluacion2;
        $this->notporcentaje4 = $notporcentaje4;
        $this->notpromedio2 = $notpromedio2;
        $this->notprofinal = $notprofinal;
        if ($notid) {
            $this->notid = $notid;
        }        
    }

    public function guardar()
    {
        global $conn;
        $sentencia = $conn->prepare("INSERT INTO ciudades
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
        $sentencia = $conn->query("SELECT  notas.*, rmatriculacion.*, usuarios.*
        FROM notas, rmatriculacion, usuarios
        WHERE notas.rmaid=rmatriculacion.rmaid AND rmatriculacion.usuid=usuarios.usuid");
        return $resultado = $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    
    public static function obtenerUno($ciuid)
    {
        global $conn;

        $sentencia = 'SELECT ciuid, proid, ciunombre FROM ciudades WHERE ciuid=:ciuid ';
        $registros = $conn->prepare($sentencia);
        $registros->execute(array(":ciuid" => $ciuid));
        return $registros = $registros->fetch(PDO::FETCH_OBJ);
    }
    public static function porMateria($detmatid)
    {        
        global $conn;
        $sentencia = "SELECT  notas.*, rmatriculacion.*, usuarios.*
        FROM notas, rmatriculacion, usuarios
        WHERE notas.rmaid=rmatriculacion.rmaid AND rmatriculacion.usuid=usuarios.usuid AND notas.detmatid=:detmatid";
        $registros = $conn->prepare( $sentencia ); 
        $registros ->execute(array(":detmatid" => $detmatid));
        return $resultado = $registros->fetchAll(PDO::FETCH_OBJ); 
    }
    
    public function actualizar($notparcial1, $notparcial2, $notevaluacion1, $notparcial3, $notparcial4 ,$notevaluacion2,$notid)
    {
        global $conn; 
        $nota1= number_format($notparcial1, 2);  
        $nota2= number_format($notparcial2, 2); 
        $porcentaje1= (($nota1+$nota2)* 0.8/2);
        $evaluacion1= number_format($notevaluacion1, 2); 
        $porcentaje2= ($evaluacion1)*0.2;
        $promedio1= $porcentaje1+$porcentaje2; 
        $nota3= number_format($notparcial3, 2); 
        $nota4= number_format($notparcial4, 2);
        $porcentaje3= (($nota3+$nota4)*0.8/2);
        $evaluacion2= number_format($notevaluacion2, 2); 
        $porcentaje4= ($evaluacion2)*0.2;        
        $promedio2= $porcentaje3+$porcentaje4; 
        try {
            $final= ($promedio1+$promedio2)/2;   
        } catch (\Throwable $th) {
            $final= 0; 
        }  
              
        $sentencia = 'UPDATE notas 
        SET notparcial1=:notparcial1, notparcial2=:notparcial2, notporcentaje1=:porcentaje1, notevaluacion1=:notevaluacion1, notporcentaje2=:notporcentaje2, notpromedio1=:notpromedio1, notparcial3=:notparcial3, notparcial4=:notparcial4, notporcentaje3=:porcentaje3, notevaluacion2=:notevaluacion2, notporcentaje4=:notporcentaje4, notpromedio2=:notpromedio2, notprofinal=:notprofinal WHERE notid=:notid ';
        $registros = $conn->prepare( $sentencia );     
        $registros->execute( array(":notparcial1" => $nota1,":notparcial2" => $nota2,":porcentaje1" => $porcentaje1,":notevaluacion1" => $evaluacion1,":notporcentaje2" => $porcentaje2, ":notpromedio1" => $promedio1, ":notparcial3" => $nota3,":notparcial4" => $nota4,":porcentaje3" => $porcentaje3,":notevaluacion2" => $evaluacion2,":notporcentaje4" => $porcentaje4, ":notpromedio2" => $promedio2, ":notpromedio2" => $promedio2, ":notprofinal" => $final, ":notid" => $notid) ); 
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