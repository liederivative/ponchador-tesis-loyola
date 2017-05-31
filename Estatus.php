<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Editar Asignatura</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
<!--    <script src="js/Shadows.js"></script>-->
    <link rel="stylesheet" href="localStyles.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <?php include 'PHP/Shadows.php'?>

</head>

<body class="body1">
    <div class="container">
        <?php echo BarNav?>


            <div class="Editar-estatus-Glyphicon">
               <button type="button" class="botonDataList" id="botonDataList" title="Pulse aqui y aparecer&aacute;n la ayuda r&aacute;pida para seleccionar profesor">
                <span class="glyphicon glyphicon-off"></span></button>
            </div>


            <div action="" class="EditAsignaturaForm2">

<!--                <div class="">-->

                    <input list="dataList" id="InputEditAsig" class="rounded col-xs-12" name="InputEditAsig" placeholder="Introduzca aqu&iacute; matr&iacute;cula. eg. 0058-8954" type="text">
                    <datalist id="dataList">

                    </datalist>

<!--                </div>-->

            </div>
<!--
                    <p id="tested01">
                        esto
                    </p>
-->
            <div class="col-xs-12 ckSLboton">

                <button type="button" class="btn ckEditPensum" id="consultar">
                    <span class="glyphicon glyphicon-edit"></span> consultar
                </button>

            </div>
            <div class="bloque col-xs-12">
                <div class='alert alert-success vacio01' id='ProfA'>
                    <button type='button' class='close' data-dismiss='alert'>x</button>
                    <p><strong>Profesor Activado</strong></p>

                </div>
            </div>

            <div class="bloque col-xs-12">
                <div class='alert alert-success vacio01' id='ProfNA'>
                    <button type='button' class='close' data-dismiss='alert'>x</button>
                    <p><strong>Profesor Inactivado</strong></p>
                </div>
            </div>
            <script>
                var tabla = [];
                //********datalist**********///.
//                     $(document).ready(function () {
                            //                        document.write("hola mundo");
                
//                        $('#dataList').click((e) => {
//                            $.post('PHP/exe.php', {
//                                action: 'dataList'
//                            }, (l, k) => {
                                
//                $('#botonDataList').click((e) => {
//                    document.write("hola mundo");


                    $.post('PHP/exe.php', {
                        action: 'dataList',
                        select: 'SELECT PMatricula, PNombre FROM proyecto_ponchador.Profesores'
                    }, (l, k) => {
//                                document.write(l);
                        $('#dataList').html(l);
                            });
//                                                    });
//                        });
                
                //**************//
                $('#consultar').click((e) => {
                    $('#IP').show();
                    $('#ProfNA').hide();
                    $('#ProfA').hide();
                    $('#div-botonInactivar').hide();

                    $('#div-buttonActive').hide();



                    $.post('PHP/exe.php', {
                        action: 'ConsultaEditarProfesor',
                        InputEditAsig: $('#InputEditAsig').val()
                    }, (data, status) => {
                        //                            document.write(data);
                        if (data === "vacio") {
                            //                                $('#IP').hide();
                            $('#alert-noCoincidencia').show();
                            $('#div-botonInactivar').hide();
                            $('#div-buttonActive').hide();
                            $('#IP').html("");
                        } else {
                            $.post('PHP/exe.php', {
                                action: 'UpdateEstatus',
                                InputEditAsig: $('#InputEditAsig').val()
                            }, (da, st) => {
                                //                                    document.write(da);
                                if (da === "1") {
                                    //                                     document.write("inactivo");
                                    $('#div-buttonActive').show();

                                    ///acción de activar profesor///     
                                    $('#botonActivar').click((e) => {
                                        $.post('PHP/exe.php', {
                                            action: 'ActivarProfesor',
                                            InputEditAsig: $('#InputEditAsig').val()

                                        }, (d, s) => {
                                            //                            document.write(s);
                                            if (s === "success") {
                                                $('#ProfA').show();
                                                $('#div-buttonActive').hide();
                                                $('#IP').hide();
                                                $('#ProfNA').hide();

                                                $('#ProfA').fadeTo(5000, 500).slideUp(2000, function () {
                                                    $('#ProfA').slideUp(500);
                                                });


                                            }
                                            //                            if(data==="inactivado"){
                                            //                                
                                            //                            }
                                        });
                                    });
                                    //                                     $('#botonActivar').show();

                                } else {
                                    $('#div-botonInactivar').show();
                                    ///acción de inactivar profesor///     
                                    $('#botonInactivar').click((e) => {
                                        $.post('PHP/exe.php', {
                                            action: 'InactivarProfesor',
                                            InputEditAsig: $('#InputEditAsig').val()

                                        }, (d, s) => {
                                            if (s === "success") {
                                                $('#ProfNA').show();
                                                $('#IP').hide();
                                                $('#div-botonInactivar').hide();
                                                $('#ProfA').hide();
                                                $('#ProfNA').fadeTo(5000, 500).slideUp(2000, function () {
                                                    $('#ProfNA').slideUp(500);
                                                });


                                            }
                                            //                            document.write(d);
                                            //                            if(data==="inactivado"){
                                            //                                
                                            //                            }
                                        });
                                    });

                                }
                            });


                            $('#alert-noCoincidencia').hide();
                            $('#IP').html(data);


                        }
                    })
                });
            </script>


            <div class="ip" id="IP">

            </div>

            <div class="col-xs-12 ckSLboton NoShow" id="div-botonInactivar">
                <button type="button" class="btn btn-primary" id="botonInactivar">Inactivar Profesor</button>

            </div>
            <div class="col-xs-12 ckSLboton NoShow" id="div-buttonActive">
                <button type="button" class="btn btnEstatus" id="botonActivar">Activar Profesor</button>


            </div>
            <div class="bloque col-xs-12">
                <div class="alert alert-success NoShow alertProfesor" id="alert-noCoincidencia">
                    <button type="button" class="close" data-dismiss="alert">x</button>
                    <p>No se encontro ninguna conincidencia con su peticio, favor verifique que existe este profesor en el listado general</p>
                </div>

            </div>

            <div class="bloque col-xs-12">
                <div class='alert alert-danger alertCondi3' id='fadeout'>
                    <button type='button' class='close' data-dismiss='alert'>x</button>
                    <p>No se encontro ninguna conincidencia con su peticio, favor verifique que existe este profesor en el listado general</p>
                </div>

            </div>


            <script>
                function desa() {
                    $('#fadeout').fadeTo(8000, 500).slideUp(2000, function () {
                        $('#fadeout').slideUp(300);
                    });
                }
            </script>
    </div>
</body>

</html>