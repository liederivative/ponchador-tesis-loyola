<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Clases</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="localStyles.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/Shadows.js"></script>
    <?php include 'PHP/Shadows.php'?>
    <script>
        //            Horario();

    </script>


</head>

<body class="body1">
    <div class="container">
        <?php echo BarNav?>
        <h2>Creando Clase</h2>
        <div class="alert alert-info" id="default">
            <p><strong>Info Extra!</strong> Recuerde que esta a punto de crear un regla de horario para un profesor (bajo esta regla el profesor quedara asignado a un horario para impartir la materia elejida en el block en el horario selecionado.</p>
        </div>

        <div class="alert alert-success ND" id="alertTodoBien">
            <p><strong>Acceso: </strong>Se ha creado sastifactoriamente la clase en la secci&oacute;n correspondiente bajo la pestaña: <strong> Clases</strong> ><strong><a href="ConsultarClase.php"><span class="glyphicon glyphicon-send"></span> Consultar Clase</a></strong></p>
        </div>
        <div class="alert alert-warning ND" id="alertNU">
            <p><strong>Error en Nombre: </strong> Este nombre ya ha sido utilizado para otra clase.</p>
        </div>
        <div class="alert alert-warning ND" id="alertNHorario">
            <p><strong>Error: </strong> No se encontro ninguna coincidencia con el <strong>horario</strong> utilizado.</p>
        </div>
        <div class="alert alert-warning ND" id="alertNP">
            <p><strong></strong> No Existe ninguna coincidencia con el campo <strong>profesor</strong>.</p>
        </div>

        <div class="ND" id="alertClaseDupli">
            <div class="alert alert-warning ND1">
                <p><strong>Denegado: </strong>Ya existe una clase asignada bajo estos criterios.</p>
            </div>

        </div>



        <form action="la-vida" id="form">
            <input type="text" value='crearClase' class="hide" name="action">
            <!--******************** Nombre **********************-->
            <div class="blacked-04">
                <label for="inputProf2">Nombre de la clase</label>
                <input list="" id="NombreClase" name="NombreClase" type="text" class="form-control" placeholder="Introduzca un Nombre para la Clase" autofocus>
            </div>

            <!--******************** Nombre **********************-->

            <!--******************** Profesor **********************-->
            <div action="" class="col-md-4 col-xs-12 col-lg-4 col-sm-4 SHFater">
                <div class="SeccionesHorarios">
                    <h4 class="title"><strong>Seleccione Profesor</strong></h4>
                    <!--                        <div class="">-->
                    <img src="img/icono-profesor.png" class="Img-Del-Asig">
                    <!--                        </div>-->
                    <input list="dataListP" id="inputProf2" name="inputProf2" type="text" class="form-control" placeholder="Introduzca o seleccione matr&iacute;cula">
                    <datalist id="dataListP">
                        
                        </datalist>
                </div>
                <!--                    <p>un datalist</p>-->
            </div>
            <!--******************** Profesor **********************-->

            <!--******************** asignatura **********************-->

            <div action="" class="col-md-4 col-xs-12 col-lg-4 col-sm-4 SHFater">

                <div class="SeccionesHorarios">
                    <h4 class="title CCT"><strong>Seleccione Asignatura</strong></h4>
                    <!--                        <div class="class">-->
                    <span class="glyphicon glyphicon-list-alt Glyphicon-Clases"></span>
                    <!--                        </div>-->
                    <!--                        <div action="" class="EAFL col-lg-12 col-md-12 col-xs-12">-->
                    <input list="dataListA" id="inputA" name="inputA" type="text" class="form-control" placeholder="C&oacute;digo de Asignatura eg. MTA-043">
                    <datalist id="dataListA">
                        
                            </datalist>
                    <!--                        </div>-->
                    <!--                    <input type="text" name="seccion" id="seccion" class="form-control" placeholder="Secci&oacute;n. Ej. Sec. 01">-->

                    <select class="form-control selectHorarios" name="FSeccion" id="seccion">
                            <!--                                <option value="" selected disabled hidden>Seleccione una sección</option>-->
                            <option value="001" selected>Sección 01</option>
                            <option value="002">Sección 02</option>
                            <option value="003">Sección 03</option>
                            <option value="004">Sección 04</option>
                        </select>
                </div>

                <!--
                    <div class="col-xs-12 form-group">
                        <a href="#SeleccionHorarioLab" class="btn btn-info" id="botonLabHorario" data-toggle="modal">Horario Asignatura</a>
                    </div>
-->
                <!--
                    <div class="modal fade" id="SeleccionHorarioLab">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>

                        <div class="col-xs-12 ckselechorario1">
                            <div class="panel panel-default col-xs-6 ckselechorario">
                                <div class="panel-heading ckpanel">Horario Para Laboratorio</div>
                                <div class="panel-body">

                                    <div class="">
                                        <label for="lunes">Lunes</label>
                                        <input type="checkbox" id="lunes" class="">
                                        <div class="input-group form-group">
                                            <span class="input-group-addon">De</span>
                                            <select class="form-control" id="lunesDe" name="lunesDe" disabled>
                                                <option>7:00</option>
                                                <option>8:00</option>
                                                <option>9:00</option>
                                                <option>10:00</option>
                                                <option>11:00</option>
                                                <option>12:00</option>
                                                <option>13:00</option>
                                                <option>14:00</option>
                                                <option>15:00</option>
                                                <option>16:00</option>
                                                <option>17:00</option>
                                                <option>18:00</option>
                                                <option>19:00</option>
                                                <option>20:00</option>
                                                <option>21:00</option>
                                                <option>22:00</option>
                                                <option>23:00</option>
                                            </select>

                                            <span class="input-group-addon">Hasta</span>
                                            <select class="form-control" name="lunesHasta" id="lunesHasta" disabled>
                                                <option>7:00</option>
                                                <option>8:00</option>
                                                <option>9:00</option>
                                                <option>10:00</option>
                                                <option>11:00</option>
                                                <option>12:00</option>
                                                <option>13:00</option>
                                                <option>14:00</option>
                                                <option>15:00</option>
                                                <option>16:00</option>
                                                <option>17:00</option>
                                                <option>18:00</option>
                                                <option>19:00</option>
                                                <option>20:00</option>
                                                <option>21:00</option>
                                                <option>22:00</option>
                                                <option>23:00</option>
                                            </select>
                                        </div>

                                        <label for="martes">Martes</label>
                                        <input type="checkbox" id="martes">
                                        <div class="input-group form-group">

                                            <span class="input-group-addon">De</span>
                                            <select class="form-control" name="martesDe" id="martesDe" disabled>
                                                <option>7:00</option>
                                                <option>8:00</option>
                                                <option>9:00</option>
                                                <option>10:00</option>
                                                <option>11:00</option>
                                                <option>12:00</option>
                                                <option>13:00</option>
                                                <option>14:00</option>
                                                <option>15:00</option>
                                                <option>16:00</option>
                                                <option>17:00</option>
                                                <option>18:00</option>
                                                <option>19:00</option>
                                                <option>20:00</option>
                                                <option>21:00</option>
                                                <option>22:00</option>
                                                <option>23:00</option>
                                            </select>

                                            <span class="input-group-addon">Hasta</span>
                                            <select class="form-control" name="martesHasta" id="martesHasta" disabled>
                                                <option>7:00</option>
                                                <option>8:00</option>
                                                <option>9:00</option>
                                                <option>10:00</option>
                                                <option>11:00</option>
                                                <option>12:00</option>
                                                <option>13:00</option>
                                                <option>14:00</option>
                                                <option>15:00</option>
                                                <option>16:00</option>
                                                <option>17:00</option>
                                                <option>18:00</option>
                                                <option>19:00</option>
                                                <option>20:00</option>
                                                <option>21:00</option>
                                                <option>22:00</option>
                                                <option>23:00</option>
                                            </select>
                                        </div>

                                        <label for="miercoles">Miercoles</label>
                                        <input type="checkbox" id="miercoles">
                                        <div class="input-group form-group">
                                            <span class="input-group-addon">De</span>
                                            <select class="form-control" name="miercolesDe" id="miercolesDe" disabled>
                                                <option>7:00</option>
                                                <option>8:00</option>
                                                <option>9:00</option>
                                                <option>10:00</option>
                                                <option>11:00</option>
                                                <option>12:00</option>
                                                <option>13:00</option>
                                                <option>14:00</option>
                                                <option>15:00</option>
                                                <option>16:00</option>
                                                <option>17:00</option>
                                                <option>18:00</option>
                                                <option>19:00</option>
                                                <option>20:00</option>
                                                <option>21:00</option>
                                                <option>22:00</option>
                                                <option>23:00</option>
                                            </select>

                                            <span class="input-group-addon">Hasta</span>
                                            <select class="form-control" name="miercolesHasta" id="miercolesHasta" disabled>
                                                <option>7:00</option>
                                                <option>8:00</option>
                                                <option>9:00</option>
                                                <option>10:00</option>
                                                <option>11:00</option>
                                                <option>12:00</option>
                                                <option>13:00</option>
                                                <option>14:00</option>
                                                <option>15:00</option>
                                                <option>16:00</option>
                                                <option>17:00</option>
                                                <option>18:00</option>
                                                <option>19:00</option>
                                                <option>20:00</option>
                                                <option>21:00</option>
                                                <option>22:00</option>
                                                <option>23:00</option>
                                            </select>
                                        </div>

                                        <label for="jueves">Jueves</label>
                                        <input type="checkbox" id="jueves">
                                        <div class="input-group form-group">
                                            <span class="input-group-addon">De</span>
                                            <select class="form-control" name="juevesDe" id="juevesDe" disabled>
                                                <option>7:00</option>
                                                <option>8:00</option>
                                                <option>9:00</option>
                                                <option>10:00</option>
                                                <option>11:00</option>
                                                <option>12:00</option>
                                                <option>13:00</option>
                                                <option>14:00</option>
                                                <option>15:00</option>
                                                <option>16:00</option>
                                                <option>17:00</option>
                                                <option>18:00</option>
                                                <option>19:00</option>
                                                <option>20:00</option>
                                                <option>21:00</option>
                                                <option>22:00</option>
                                                <option>23:00</option>
                                            </select>

                                            <span class="input-group-addon">Hasta</span>
                                            <select class="form-control" name="juevesHasta" id="juevesHasta" disabled>
                                                <option>7:00</option>
                                                <option>8:00</option>
                                                <option>9:00</option>
                                                <option>10:00</option>
                                                <option>11:00</option>
                                                <option>12:00</option>
                                                <option>13:00</option>
                                                <option>14:00</option>
                                                <option>15:00</option>
                                                <option>16:00</option>
                                                <option>17:00</option>
                                                <option>18:00</option>
                                                <option>19:00</option>
                                                <option>20:00</option>
                                                <option>21:00</option>
                                                <option>22:00</option>
                                                <option>23:00</option>
                                            </select>
                                        </div>

                                        <label for="viernes">Viernes</label>
                                        <input type="checkbox" id="viernes">
                                        <div class="input-group form-group">
                                            <span class="input-group-addon">De</span>
                                            <select class="form-control" name="viernesDe" id="viernesDe" disabled>
                                                <option>7:00</option>
                                                <option>8:00</option>
                                                <option>9:00</option>
                                                <option>10:00</option>
                                                <option>11:00</option>
                                                <option>12:00</option>
                                                <option>13:00</option>
                                                <option>14:00</option>
                                                <option>15:00</option>
                                                <option>16:00</option>
                                                <option>17:00</option>
                                                <option>18:00</option>
                                                <option>19:00</option>
                                                <option>20:00</option>
                                                <option>21:00</option>
                                                <option>22:00</option>
                                                <option>23:00</option>
                                            </select>

                                            <span class="input-group-addon">Hasta</span>
                                            <select class="form-control" name="viernesHasta" id="viernesHasta" disabled>
                                                <option>7:00</option>
                                                <option>8:00</option>
                                                <option>9:00</option>
                                                <option>10:00</option>
                                                <option>11:00</option>
                                                <option>12:00</option>
                                                <option>13:00</option>
                                                <option>14:00</option>
                                                <option>15:00</option>
                                                <option>16:00</option>
                                                <option>17:00</option>
                                                <option>18:00</option>
                                                <option>19:00</option>
                                                <option>20:00</option>
                                                <option>21:00</option>
                                                <option>22:00</option>
                                                <option>23:00</option>
                                            </select>
                                        </div>

                                        <label for="sabado">Sabado</label>
                                        <input type="checkbox" id="sabado">
                                        <div class="input-group form-group">
                                            <span class="input-group-addon">De</span>
                                            <select class="form-control" name="sabadoDe" id="sabadoDe" disabled>
                                                <option>7:00</option>
                                                <option>8:00</option>
                                                <option>9:00</option>
                                                <option>10:00</option>
                                                <option>11:00</option>
                                                <option>12:00</option>
                                                <option>13:00</option>
                                                <option>14:00</option>
                                                <option>15:00</option>
                                                <option>16:00</option>
                                                <option>17:00</option>
                                                <option>18:00</option>
                                                <option>19:00</option>
                                                <option>20:00</option>
                                                <option>21:00</option>
                                                <option>22:00</option>
                                                <option>23:00</option>
                                            </select>

                                            <span class="input-group-addon">Hasta</span>
                                            <select class="form-control" name="sabadoHasta" id="sabadoHasta" disabled>
                                                <option>7:00</option>
                                                <option>8:00</option>
                                                <option>9:00</option>
                                                <option>10:00</option>
                                                <option>11:00</option>
                                                <option>12:00</option>
                                                <option>13:00</option>
                                                <option>14:00</option>
                                                <option>15:00</option>
                                                <option>16:00</option>
                                                <option>17:00</option>
                                                <option>18:00</option>
                                                <option>19:00</option>
                                                <option>20:00</option>
                                                <option>21:00</option>
                                                <option>22:00</option>
                                                <option>23:00</option>
                                            </select>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Continuar</button>
                                </div>
                            </div>
                        </div>

                    </div>
-->

            </div>
            <!--******************** Asignatura **********************-->
            <!--******************** Horario **********************-->

            <div class="col-md-4 col-xs-4 col-lg-4 col-sm-4 SHFater">

                <div class="SeccionesHorarios">
                    <h4 class="title"><strong>Seleccione Horarios</strong></h4>
                    <!--                        <div class="Glyphicon-Clases col-xs-6">-->
                    <span class="glyphicon glyphicon-list-alt Glyphicon-Clases"></span>
                    <!--                        </div>-->

                    <input list="dataListH" id="inputHorario" name="inputHorario" type="text" class="form-control" placeholder="Introduzca o seleccione Horario">

                    <datalist id="dataListH">
                        
                        </datalist>
                </div>
                <!--                    <p>un datalist</p> -->
            </div>

            <!--******************** Horario **********************-->


        </form>

        <!--******************** Button **********************-->

        <div class="col-xs-12 ckbotones" id="btnCH">
            <button class="btn btn-primary" id="crearClase"><span class="glyphicon glyphicon-floppy-save"></span> Crear Clase</button>
        </div>
        <!--******************** Button **********************-->

        <!--************************** Alerts ****************************-->


        <!--
        <div class="col-xs-12 ckbotones ND" id="btnAH">
            <button class="btn btn-success clause" id="ActualizarHorario"><span class="glyphicon glyphicon-edit"></span> Actualizar Horario</button>
        </div>
-->
    </div>

    <div class='alert alert-warning alertCondi3  ND' id='alertNN'>
        <button type='button' class='close' data-dismiss='alert'>x</button>
        <p>No Existe ninguna coincidencia en los siguientes campos <strong>profesor</strong> y <strong>Asignatura</strong></p>
    </div>


    <div class='alert alert-warning alertCondi3  ND alertAAP' id='alertNA'>
        <button type='button' class='close' data-dismiss='alert'>x</button>
        <p>No Existe ninguna coincidencia con el campo <strong>Asignatura</strong></p>
    </div>

    <div class='alert alert-warning alertCondi31  alertAAP ND' id='alertAAP01'>
        <button type='button' class='close' data-dismiss='alert'>x</button>
        <p>Tiene uno o m&aacute;s campos vacio/s</p>
    </div>

    <div class='alert alert-warning alertCondi31 alertAAP ND' id='alertNS'>
        <button type='button' class='close' data-dismiss='alert'>x</button>
        <p>Verifique inconvenientes en la <strong>secci&oacute;n</strong> digitada</p>
    </div>
<!--
    <div class='alert alert-warning alertCondi31 alertAAP ND' id='alertNH'>
        <button type='button' class='close' data-dismiss='alert'>x</button>
        <p>Debe elejir un horario antes para la regla docente</p>
    </div>
-->
    <!--    <p class="ND" id="lll">estoy aqui</p>-->
    <!--**************************End of Alerts ****************************-->


    <!--************************** Devp ****************************-->

    <script>
        /********************** Access to Datalist *************************/

        //NoteFor:Albert-*_*-Datalist option it's a nices help but remember we can't style them. Answer:yes we already talk about it.

        //Return data list for fields prediction
        $(document).ready(function() {
            $.post('PHP/exe.php', {
                action: 'dataList',
                select: 'SELECT PMatricula, PNombre FROM proyecto_ponchador.Profesores'
            }, (l, k) => {
//                                                                document.write(l);
                $('#dataListP').html(l);
            });
            $.post('PHP/exe.php', {
                action: 'dataList',
                select: 'select ACodigo, ANombre from   proyecto_ponchador.asignatura'
            }, (d, s) => {
                $('#dataListA').html(d);
                //                          document.write(d);
            });
            $.post('PHP/exe.php', {
                action: 'dataList',
                select: 'select Nombre, Alias from   proyecto_ponchador.horarios_creados_linear'
            }, (d, s) => {
                $('#dataListH').html(d);
                //                          document.write(d);
            });
            /**********************End of Access to Datalist *************************/

            /********************** Aciton to make the class *************************/

            $('#crearClase').click((e) => {
                $('#alertClaseDupli').hide();
                $('#default').hide();
                $('#alertNU').hide();
                $('#alertNHorario').hide();
                $('#alertNP').hide();


                if ($('#inputProf2').val() === "" || $('#inputHorario').val() === "" || $('#inputA').val() === "") {

                    $('#alertAAP01').show();

                } else {
                    //                    document.write($("#form").serialize());

                    $.post('PHP/exe.php',
                        $("#form").serialize(), (d, s) => {

                            //                    $('#lll').show();
//                            document.write(d);

                            if (d === "claseDupli") {
                                $('#alertClaseDupli').show();
                                return false;
                                //                    document.write("cool");

                            } else if (d === "ok") {
                                $('#alertTodoBien').show((e) => {
                                    $('#form')[0].reset();
//                                    console.log("right here")
                                });

                                $('#default').hide();
                                    fadeOut('#alertTodoBien');


                            } else if (d === "NombreUsado") {
                                $('#alertNU').show();

                            
                            } else if (d === "NH") {
                                $('#alertNHorario').show();

                            } else if (d === "NP") {
                                $('#alertNP').show();

                            }



                        });
                }
            });
            /*******************End of Aciton to make the class **********************/




            //            $('#').click((e) => {
            //                $.post('PHP/exe.php', {
            //                    action: ''
            //                }, (d, s) => {
            //
            //                });
            //            });

        });
        function fadeOut(h) {
            $(h).fadeTo(5000, 500).slideUp(2000, function() {
                $(h).slideUp(300);
            });
        };
    </script>
    <!--**************************End of Devp ****************************-->


</body>

</html>
