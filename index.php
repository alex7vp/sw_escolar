<?php
session_start();
if (isset($_SESSION['rol'])) {
    header("Location: home.php");
}
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="shortcut icon" href="img/logo.svg">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Ingreso SAC</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/estilo.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


</head>

<body>
    <div class="container">
        <div class="screen">
            <div class="screen__content">
                <img src="img/logo2.svg" style="margin-top:20px ;margin-left: 20px;" class="login_icon">
                <form class="login" action="login.php" method="post">
                    <legend>
                        <h1 class="txt">Inicio de Sesión</h1>
                    </legend>
                    <div class="login__field">                        
                        <input type="text" id="usuusuario" name="usuusuario" class="login__input" placeholder="Usuario" required>
                    </div>
                    <div class="login__field">
                        <input type="password" id="txtPassword" name="usupassword" class="login__input" placeholder="Password" required>
                        <button id="show_password" style="background-color: transparent; border-width: 0px" type="button" onclick="mostrarPassword()"> <span class="fa fa-eye-slash icon"></span> </button>                        
                    </div>
                    <button class="button login__submit" type="submit" name="enviar">
                        <span class="button__text">Ingresa ahora  <font size=+2>&nbsp &nbsp »</font> </span>
                    </button>
                </form>
                <div class="social-login">
                    <h3>Sistema de notas y calificaciones</h3>
                </div>
            </div>
            <div class="screen__background">
                <span class="screen__background__shape screen__background__shape4"></span>
                <span class="screen__background__shape screen__background__shape3"></span>
                <span class="screen__background__shape screen__background__shape2"></span>
                <span class="screen__background__shape screen__background__shape1"></span>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function mostrarPassword() {
            var cambio = document.getElementById("txtPassword");
            if (cambio.type == "password") {
                cambio.type = "text";
                $('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
            } else {
                cambio.type = "password";
                $('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
            }
        }
    </script>
</body>

</html>