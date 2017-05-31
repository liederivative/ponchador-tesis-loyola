<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Consultar Clase</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="localStyles.css">

    <?php include 'PHP/Shadows.php'?>

<!--
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
-->
</head>

<body class="newLogin">

    <div class="container">
        <?php// echo BarNav?>
            <a href="SolicitudUniversidad.php" class="botonSpace">Solicitar registro de Universidad</a>
            <div class="backSpace">
                <div class="newLoginDatos">
                    <h3>Login In</h3>
                    <!--                    <label class="" for="usrName">Nombre de Usuario</label>-->
                    <input type="text" class="login-form" placeholder="Nombre de usuario">
                    <!--                    <label class="" for="usrName">Digite su Contraseña</label>-->
                    <input type="password" class="login-form" placeholder="Contraseña">
                    <div class="ckbParent">
                        <div class="ckbRecord">
                            <input type="checkbox" id="ckb" name="ckb">
                            <label for="ckb" id="ckbIn"></label>
                            <label for="ckb" id="ckbOut"></label>
                        </div>
                        <label for="ckb" class="col-xs-9" id="labelOrigen">Recordar nombre de usuario</label>
                    </div>
                    <button class="login-form">
                            Sign In
                        </button>
                    <a href="#">Olvide Contraseña</a>
                </div>
            </div>
    </div>
</body>


</html>
