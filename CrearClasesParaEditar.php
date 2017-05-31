<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Editar Clase</title>
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

<?php    
        function CrearAsignatura($data){
            $data = trim($data);
            $data = stripcslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
    if($_GET['action'] == 'editar'){
        $fill['asign'] = urldecode($_GET['ANombre']);
         $fill['codigo'] = urldecode($_GET['ACodigo']);
        $fill['carrera'] = urldecode($_GET['CNombre']);
        $fill['Cuatrimestre'] = urldecode($_GET['ACuatrimestre']);
        $fill['creditos'] = urldecode($_GET['ACreditos']);
        $fill['InputEditAsig'] = urldecode($_GET['InputEditAsig']);
        $fill['ASeccion'] = urldecode($_GET['ASeccion']);
        
        
    }
//   print_r($_GET); 
    ?>

<body class="body1">
    <div class="container">
        <?php echo BarNav?>
        <h2>Editando Clase</h2>
        <div class="alert alert-info" id="default">
            <p><strong>Info Extra!</strong> Recuerde que esta a punto de crear un regla de horario para un profesor (bajo esta regla el profesor quedara asignado a un horario para impartir la materia elejida en el block en el horario selecionado.</p>
        </div>

        <div class="alert alert-danger ND" id="alertEHS">
            <p><strong>Error: </strong>Existe un error en el horario seleccionado, favor verifique el mismo antes de continuar.</p>
        </div>

        <div class="alert alert-success ND" id="alertActualizada">
            <p><strong>Horario Actualizado correctamente</strong></p>
        </div>

<!--
        <div class="ND" id="alertDupli">
            <div class="alert alert-warning ND1">
                <p><strong>Denegado: </strong>Ya existe un horarios asignado bajo estos criterios, si desea editar el horarios puede pulsar el boton "Actualizar Horario", &eacute;sto actualizar&aacute; los datos a los actuales; pero, tenga en cuenta que podria crear un error de horario.</p>
            </div>

        </div>
-->


        <form action="la-vida" id="form">
            <input type="text" value='ActualizarClase' class="hide" name="action">
            <input type="text" value='<?php echo urldecode($_GET['Nombre']); ?>' class="hide" name="oldName">
            <!--******************** Nombre **********************-->
            <div class="blacked-04">
                <label for="inputProf2">Nombre de la clase</label>
                <input list="" id="NombreClase" name="NombreClase" type="text" class="form-control" placeholder="Introduzca un Nombre para la Clase" autofocus value="<?php echo urldecode($_GET['InputEditHorario']); ?>">
            </div>

            <!--******************** Nombre **********************-->

            <!--******************** Profesor **********************-->
            <div action="" class="col-md-4 col-xs-12 col-lg-4 col-sm-4 SHFater">
                <div class="SeccionesHorarios">
                    <h4 class="title"><strong>Seleccione Profesor</strong></h4>
                    <!--                        <div class="">-->
                    <img src="img/icono-profesor.png" class="Img-Del-Asig">
                    <!--                        </div>-->
                    <input list="dataListP" id="inputProf2" name="inputProf2" type="text" class="form-control" placeholder="Introduzca o seleccione profesor" value="<?php echo urldecode($_GET['PMatricula']); ?>">
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
                    <input list="dataListA" id="inputA" name="inputA" type="text" class="form-control" placeholder="C&oacute;digo de Asignatura eg. MTA-043" value="<?php echo urldecode($_GET['ACodigo']); ?>">
                    <datalist id="dataListA">
                        
                            </datalist>
                    <!--                        </div>-->
                    <!--                    <input type="text" name="seccion" id="seccion" class="form-control" placeholder="Secci&oacute;n. Eg. Sec. 01">-->

                    <select class="form-control selectHorarios" name="FSeccion" id="seccion">
                            <!--                                <option value="" selected disabled hidden>Seleccione una sección</option>-->
                            <option value="001" <?php if($_GET['ASeccion']===001){echo "selected";} ?> >Sección 01</option>
                            <option value="002" <?php if($_GET['ASeccion']===002){echo "selected";} ?> >Sección 02</option>
                            <option value="003" <?php if($_GET['ASeccion']===003){echo "selected";} ?> >Sección 03</option>
                            <option value="004" <?php if($_GET['ASeccion']===004){echo "selected";} ?> >Sección 04</option>
                        </select>
                </div>
            </div>
            <!--******************** Asignatura **********************-->
            <!--******************** Horario **********************-->

            <div class="col-md-4 col-xs-4 col-lg-4 col-sm-4 SHFater">

                <div class="SeccionesHorarios">
                    <h4 class="title"><strong>Seleccione Horarios</strong></h4>
                    <!--                        <div class="Glyphicon-Clases col-xs-6">-->
                    <span class="glyphicon glyphicon-list-alt Glyphicon-Clases"></span>
                    <!--                        </div>-->

                    <input list="dataListH" id="inputHorario" name="inputHorario" type="text" class="form-control" placeholder="Introduzca o seleccione profesor" value="<?php echo urldecode($_GET['NHorario']) ?>">

                    <datalist id="dataListH">
                        
                        </datalist>
                </div>
                <!--                    <p>un datalist</p>-->
            </div>

            <!--******************** Horario **********************-->


        </form>

        <!--******************** Button **********************-->

        <div class="col-xs-12 ckbotones" id="btnCH">
            <button class="btn btn-success" id="crearClase"><span class="glyphicon glyphicon-floppy-save"></span> Actualizar</button>
        </div>
        <!--******************** Button **********************-->

        <!--************************** Alerts ****************************-->


        <div class="col-xs-12 ckbotones ND" id="btnAH">
            <button class="btn btn-success clause" id="ActualizarHorario"><span class="glyphicon glyphicon-edit"></span> Actualizar Horario</button>
        </div>
    </div>

    <div class='alert alert-warning alertCondi3 container ND' id='alertNN'>
        <button type='button' class='close' data-dismiss='alert'>x</button>
        <p>No Existe ninguna coincidencia en los siguientes campos <strong>profesor</strong> y <strong>Asignatura</strong></p>
    </div>

    <div class='alert alert-warning alertCondi3 container ND alertAAP' id='alertNP'>
        <button type='button' class='close' data-dismiss='alert'>x</button>
        <p>No Existe ninguna coincidencia con el campo <strong>profesor</strong></p>
    </div>

    <div class='alert alert-warning alertCondi3 container ND alertAAP' id='alertNA'>
        <button type='button' class='close' data-dismiss='alert'>x</button>
        <p>No Existe ninguna coincidencia con el campo <strong>Asignatura</strong></p>
    </div>

    <div class='alert alert-warning alertCondi31 container alertAAP ND' id='alertAAP01'>
        <button type='button' class='close' data-dismiss='alert'>x</button>
        <p>Tiene uno o m&aacute;s campos vacio/s</p>
    </div>

    <div class='alert alert-warning alertCondi31 container alertAAP ND' id='alertNS'>
        <button type='button' class='close' data-dismiss='alert'>x</button>
        <p>Verifique inconvenientes en la <strong>secci&oacute;n</strong> digitada</p>
    </div>
    <div class='alert alert-warning alertCondi31 container alertAAP ND' id='alertNH'>
        <button type='button' class='close' data-dismiss='alert'>x</button>
        <p>Debe elejir un horario antes para la regla docente</p>
    </div>
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
                //                                document.write(l);
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
            /*********************** End of Access to Datalist *************************/

            /******************** Aciton to make the update class ***********************/

            $('#crearClase').click((e) => {

                if ($('#inputProf2').val() === "" || $('#inputHorario').val() === "" || $('#inputA').val() === "" || $('#NombreClase').val() === "") {
                    $('#alertAAP01').show();
                } else {
                    //                    document.write($("#form").serialize());
                    $.post('PHP/exe.php',
                        $("#form").serialize(), (d, s) => {
//                                                        document.write(d);
                            if (d === "ok") { window.location.href="EditarClases.php?A=$s%p%";
                               

                            }
                        });
                }
            });
            /*******************End of Aciton to make the class **********************/


        });

    </script>
    <!--**************************End of Devp ****************************-->


</body>

</html>
