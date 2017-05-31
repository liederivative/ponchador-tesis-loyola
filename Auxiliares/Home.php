<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../localStyles.css">
    <script src="../js/Shadows.js"></script>
    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <?php include '../PHP/shadows.php';?>

</head>

<body class="body1">
    <div class="container">
        <?php echo BarNav?>
            <div class="jumbotron">
                <div class="alert alert-info UpdateAlert">
                    <p>Asignatura ha sido actualizada Correstamente</p>
                </div>
            </div>
    </div>
    <!-- Trigger the modal with a button -->
    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>

    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Modal Header</h4>
                </div>
                <div class="modal-body">
                    <p>Some text in the modal.</p>
                </div>
                <div class="modal-footer">
                    <p class="ModalText">Su asignatura ha sido actualizadas correctamente</p>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>

        <!--Alerta que desaparece en un lijero time-->

        <!--
    <div class="alert alert-info container"  id="fadeout">
        <button type="button" class="close" data-dismiss="alert">x</button>
        <p><strong>Testing option</strong> Changed life buddy, that's the point. :-)</p>
    </div>
-->
        <script>
//                    $(document).ready(function () {
//                        $("#fadeout").fadeTo(2000, 500).slideUp(500, function () {
//                            $("#fadeout").slideUp(500);
//                        });
//                    })
        </script>




        <!--
    <div class="col-xs-12 form-group">
        <a href="#SeleccionHorarioLab" class="btn btn-info" id="botonLabHorario" data-toggle="modal"></a>
    </div>
    <div class="modal fade" id="SeleccionHorarioLab">
        <button type="button" class="close" data-dismiss="modal">&times;</button>

        <div class="col-xs-12 ckselechorario1">
            <div class="panel panel-default col-xs-6 ckselechorario">
                <div class="panel-heading ckpanel">Horario Para Laboratorio</div>
                <div class="panel-body">


                    <button type="button" class="btn btn-default" data-dismiss="modal">Continuar</button>
                </div>
            </div>
        </div>

    </div>
-->

    </body>


</html>