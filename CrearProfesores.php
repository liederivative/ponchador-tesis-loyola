<!DOCTYPE html>
<html>

<head>
    <title>Agregar Profesor</title>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">



    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="localStyles.css">

    <?php include 'PHP/Shadows.php'?>
</head>

<body class="body1">
    <div class="container">
        <?php echo BarNav;?>
    </div>
    <form class="CrearProfesoresForm" method="post" action="<?php echo htmlspecialchars(" PHP/exe.php ");?>">
        <h2>Formulario Profesores</h2>
        <input type="text" hidden value="addProf" name="action">
        <div class="col-xs-6 form-group">
            <label for="nombre" class="">Nombre</label>
            <input type="text" class="form-control" name="PNombre" placeholder="Nombre del profesor" maxlength="25" required autofocus>
        </div>
        <div class="col-xs-6 form-group">
            <label for="apellido" class=" labelc1">Apellido</label>
            <input type="text" name="PApellido" placeholder="Apellido del profesor" class="form-control" maxlength="25" required>
        </div>

        <div class="col-xs-6 form-group">
            <label for="cedula" class="labelc1">Cédula</label>
            <input  pattern="[0-9]{3}-[0-9]{7}-[0-9]{1}" title="eg. 012-3456789-0" type="text" name="PCedula" placeholder="Cédula" class="form-control" required >
        </div>
        <div class="col-xs-6 form-group">
            <label for="telefono" class="labelc1">Identificaci&oacute;n del Profesor</label>
            <input type="text" name="PMatricula" placeholder="ID para sistema de control tiempo" class="form-control" required pattern="[0-9]{5}" title="eg. 0001">
        </div>
        <div class="col-xs-6 form-group">
            <label for="telefono" class="labelc1">Teléfono</label>
            <input type="tel" name="PTelefono" placeholder="Teléfono del profesor" class="form-control" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}|[0-9]{1}-[0-9]{3}-[0-9]{3}-[0-9]{4}" title="eg. 000-000-0000 &oacute; 0-000-000-0000">
        </div>
        <div class="col-xs-6 form-group">
            <label for="celular" class="labelc1">Celular</label>
            <input type="tel" name="PCelular" placeholder="Celular del profesor" class="form-control" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}|[0-9]{1}-[0-9]{3}-[0-9]{3}-[0-9]{4}" title="e.g. 000-000-0000" required>
        </div>

        <div class="col-xs-12 form-group">
            <label for="direccion">Dirección</label>
            <textarea name="PDireccion" placeholder="Dirección del profesor" id="direccion" class="col-xs-12" maxlength="100"></textarea>
        </div>

        <div class="col-xs-12 col-md-6 col-sm-6">
            <div class="panel panel-default">
                <div class="panel-heading ckpanel">Disponibilidad</div>
                <div class="panel-body">

                    <div class="ckblock">
                        <div class="col-xs-6">
                            <label for="lunes">Lunes</label>
                            <input type="checkbox" id="lunes" class="ckinputl" name="PL">
                        </div>
                        <div class="col-xs-6">
                            <label for="martes">Martes</label>
                            <input type="checkbox" id="martes"  class="ckinputm" name="PM">
                        </div>
                        <div class="col-xs-6">
                            <label for="miercoles">Miercoles</label>
                            <input type="checkbox" id="miercoles"  class="ckinputmm" name="PMM">
                        </div>
                        <div class="col-xs-6">
                            <label for="jueves">Jueves</label>
                            <input type="checkbox" id="jueves"  class="ckinputj" name="PJ">
                        </div>
                        <div class="col-xs-6">
                            <label for="viernes">Viernes</label>
                            <input type="checkbox" id="viernes"  class="ckinputv" name="PV">
                        </div>
                        <div class="col-xs-6">
                            <label for="sabado">Sabado</label>
                            <input type="checkbox" id="sabado"  class="ckinputs" name="PS">
                        </div>
                    </div>



                </div>
            </div>
        </div>

        <div class="col-xs-12 col-md-6 col-sm-6">
            <div class="panel panel-default">
                <div class="panel-heading ckpanel">Horario Disponible</div>
                <div class="panel-body ckpanelbody">

                    <div class="ckblock">
                        <div class="col-xs-6">
                            <label for="diurno">Diurno</label>
                            <input type="checkbox" id="diurno" class="ckinputDD" name="PDD">
                        </div>
                        <div class="col-xs-6">
                            <label for="vespertino">Vespertino</label>
                            <input type="checkbox" id="vespertino" class="ckinputm" name="PDV">
                        </div>
                        <div class="col-xs-6">
                            <label for="nocturno">Nocturno</label>
                            <input type="checkbox" id="nocturno" class="ckinputmm" name="PDN">
                        </div>

                    </div>




                </div>
            </div>
        </div>


        <div class="col-xs-12 ckbotones">
            <button type="reset" class="btn btn-primary">Limpiar</button>

            <button type="submit" class="btn btn-primary">Enviar</button>

            <a href="index.php" class="btn btn-primary">Cancelar</a>

        </div>



    </form>

    
    <script  src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>