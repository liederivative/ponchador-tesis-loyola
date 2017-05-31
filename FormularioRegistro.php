<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Formulario de registro</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">


    <link rel="stylesheet" href="localStyles.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    

    <?php include 'PHP/Shadows.php' ?>
    
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>

</head>

<!--
    This partshould get the data from de db college, the college will bbe created under a menu just available when you are loged in like root usr, and at the same time to created a collegue you (in that menu) have to pass throght a cacha test and other root credentials like passwd.
      
     Important to know that while the college still not exist the usr can not be created, and go on using the same info for all the other users. example: usr from the docs of gols:  -->


<body class="registroBody">
    <div class="container">
        <?php echo BarNav ?>

    </div>

    <!--    <h2>Formulario de Registro</h2>-->
    <form action="php/exe.php" method="post" class="form-registro">

        <h2 class="">Registro de usuario</h2>
        <div class="dataContainer">
            <input type="text" class="space50" placeholder="Nombre" name="nombre" />
            <input type="text" class="space50" placeholder="Apellidos" name="apellidos">
            <input type="text" class="space100" placeholder="Correo Electr&oacute;nico" name="correo">
            <input type="text" class="space50" placeholder="Nombre de usuario" name="usrName">
            <input type="password" class="space50" placeholder="Contraseña" name="passwd">
            <input type="tel" class="space100" placeholder="Teléfono" name="telefono">
            
                <label class="labelRec">Permisos</label>
            <div class="space100 permisos">
                <div>
                    <input type="checkbox" name="crear" id="crear" class="RegistroCKB">
                    <label for="crear">Crear</label>
                </div>
                <div>
                    <input type="checkbox" name="editar" id="editar" class="RegistroCKB">
                    <label for="editar">Editar</label>
                </div>
                <div>
                    <input type="checkbox" name="eliminar" id="eliminar" class="RegistroCKB">
                    <label for="eliminar">Eliminar</label>
                </div>
                <div>
                    <input type="checkbox" name="consultar" id="consultar" class="RegistroCKB">
                    <label for="consultar">Consultar</label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-registroUsr">Registrar</button>
        </div>



    </form>

</body>

</html>
