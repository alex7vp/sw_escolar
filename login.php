<?php
	session_start();
    include "conf.php";
    include "modelos/Comprobar.php";
    
	
		
			$usuusuario = $_POST["usuusuario"];
			$usupassword = $_POST["usupassword"];
            try {
                $login = Comprobar::obtenerUno($usuusuario,$usupassword);
                $rol= $login->rolid;
                $usuok= $login->usuusuario;
                $pasok= $login->usupassword;  
                $usuok.$usuusuario;
                $usupassword.$pasok;
                
                if ($usuok==$usuusuario && $pasok==$usupassword) {
                    $_SESSION['rol'] = $rol;
                    $_SESSION['nombre'] = $usuusuario;
                    header("Location: home.php");
                }else{
                    header("Location: index.php");
                }

            } catch (\Throwable $th) {
                header("Location: index.php");
            }
            
            
          
            
 ?>