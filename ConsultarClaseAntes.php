<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <title>Cosulta de Clase</title>

    <link rel="stylesheet" href="css/bootstrap.css">
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/chartjs/Chart.js"></script>
    <script src="js/Shadows.js"></script>
    <link rel="stylesheet" href="localStyles.css">
    <?php include 'PHP/Shadows.php'?>

</head>

<body class="body1">

    <div class="container">
        <?php echo BarNav?>
    </div>
    <h2 class="h2EH">Consultar Clase</h2>

    <!--
    <form method="post" action="" class="">
        <div class="container">
-->
    <div class="alert alert-success ND" id="alertE">
        <p><strong>Error:</strong> Favor verificar los datos introducidos.</p>
    </div>

    <div class="">
        <input type="text" list="dataList" class="EditAsignaturaForm form-control ckCarrera" placeholder="Introduzca el nombre de la clase" id="ACarreraClase" name="ACarrera2" autofocus>
        <datalist id="dataList">
       
        </datalist>


        <!--
        <a href="#">
            <span class="glyphicon glyphicon-eye-open GF"></span>
        </a>
-->
    </div>



    <div class="col-xs-12 ckSLboton">
        <button class="btn btn-default btn-sm ckEditPensum" id="Consultar" name="Consultar">
            <span class="glyphicon glyphicon-eye-open"></span> Consultar
        </button>
        <br><br>
        <script>
            $.post('PHP/exe.php', {
                action: 'dataList',
                select: 'SELECT Nombre FROM proyecto_ponchador.clases_creadas INNER JOIN proyecto_ponchador.asignatura on (proyecto_ponchador.asignatura.ACodigo = proyecto_ponchador.clases_creadas.ACodigo)'
            }, (l, k) => {
                //              document.write(l);
                $('#dataList').html(l);
            });

            $('#Consultar').click((e) => {
                $.post('PHP/exe.php', {
                    action: 'ConsultarClase',
                    selector: '1',
                    ACarrera: $('#ACarreraClase').val()
                }, (data, status) => {
//                    document.write(data);
                    if (data === "error") {
                        $('#alertE').show();
                        $('#TableG').hide()

                    } else {
                        $('#d01').show()
                        $('#d02').show()
                        $('#alertE').hide();
                        $('#TableG').html(data)
                        
                        $.post('PHP/exe.php', {
                        action: 'ConsultarClase',
                        selector: '0',
                        ACarrera: $('#ACarreraClase').val()
                        }, (data, status) => {
//                    document.write(data);

                            $('#TableF').html(data)
   
                        });
                        
                    }

                    //                            console.log(d);
                })
            });

        </script>
    </div>
    <!--            <input type="text" class="hide" name="action" value="Pensum">-->
    <div id="TableGa" class="container">

    </div>

    <div class="container">
        <div class="panel panel-primary paneles-reportsR ND" id="d02">
            <div class="panel-heading"><strong>Información Sobre la clase</strong></div>
            <div class="panel-body">

                <div id="TableG" class="">

                </div>
            </div>
        </div>
        <div class="panel panel-primary paneles-reportsR ND" id="d01">
            <div class="panel-heading"><strong>Información Extra (Horario)</strong></div>
            <div class="panel-body">

                <div id="TableF" class="">

                </div>
            </div>
        </div>
    </div>


    <?php 
            //include 'PHP/exe.php';

            //TraerDB();    
        ?>


</body>


</html>
