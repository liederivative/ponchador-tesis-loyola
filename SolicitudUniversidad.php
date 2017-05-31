<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Consultar Clase</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="localStyles.css">

    <?php include 'PHP/Shadows.php'?>


    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>

</head>

<body class="newLogin">

    <div class="backSpace2">
        <form>
            <h2 class="form_titulo">Solicitud de Universidad</h2>
            <div class="dataContainer" id="dataContainer">
                <input type="text" class="space50" name="Nombre" id="Nombre" placeholder="Nombre">
                <input type="text" class="space50" name="apellido" id="apellido" placeholder="Apellido">
                <input type="email" class="space100" name="email" id="email" placeholder="Correo Electrónico">
                <input type="text" class="space50" name="usr" id="usr" placeholder="Nombre de Super Admin">
                <input type="password" class="space50" name="passwd" id="passwd" placeholder="Contraseña">
                <textarea name="emailText" id="emailText" class="col-xs-12" rows="3" placeholder="Comunique al administrador información acerca de recinto educativo. E.G. nombre, Codigo del recinto suministrados por el MESCYT. y otros datos que agilicen la comprobacion legitima"></textarea>
                <input type="tel" class="space50" name="tel" id="tel" placeholder="Teléfono Super Admin">
                <input type="tel" class="space50" name="tel" id="tel" placeholder="Teléfono de la Universidad">

                <button type="button" class="btn btn-solicituU" id="sendButton">Enviar Solicitud</button>
            </div>
        </form>
        <script>
            $(document).ready(function() {
                $('#sendButton').click(function() {
                   console.log('estoy aqui'); $('#dataContainer').html("<p>Ah sido enviado un email al administrador asignado por el Ministerio de Educación Superior Ciencia y Tecnología</p><p>La información enviada será evaluada y se le estará contactanto al numero telefónico suministrado en el anterior formulario.</p><p>Debe saber que si la información suministrada no es admitida como veraz, será declinada la solicitud, por el contrario se emitirá un comunicado a la universidad con los datos importantes concernientes</p><button type='button' class='btn btn-solicituU' id='sendButtonOk'>Entiendo</button>");
                })

            });

        </script>

    </div>






</body>

</html>
