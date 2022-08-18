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
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/estilo.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="screen">
            <div class="screen__content">
            <img src="img/logo2.svg" style="margin-top:20px ;margin-left: 20px;" class="login_icon">
                <form class="login" action="login.php" method="post">
                    <legend><h1 class="txt">Inicio de Sesión</h1></legend>
                    <div class="login__field">
                        <i class="login__icon fas fa-user"></i>
                        <input type="text" id="usuusuario" name="usuusuario" class="login__input" placeholder="Usuario">
                    </div>
                    <div class="login__field">
                        <i class="login__icon fas fa-lock"></i>
                        <input type="password" id="usupassword" name="usupassword" class="login__input" placeholder="Password">
                    </div>
                    <button class="button login__submit" type="submit" name="enviar">
                        <span class="button__text">Ingresa ahora</span>
                        <i class="button__icon fas fa-chevron-right"></i>
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
</body>

</html>