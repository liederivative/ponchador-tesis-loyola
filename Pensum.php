<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <title>Cosulta de Asignaturas</title>

    <link rel="stylesheet" href="css/bootstrap.css">
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/chartjs/Chart.js"></script>
    <script src="js/Shadows.js"></script>
    <link rel="stylesheet" href="localStyles.css">
    <?php include 'PHP/Shadows.php'?>

</head>

<body class="body-dashBoard">

    <div class="container">
        <?php echo BarNav?>
    </div>
    <h2 class="h2EH">Consultar Asignaturas</h2>

    <!--
    <form method="post" action="" class="">
        <div class="container">
-->
    <div class="alert alert-success ND" id="alertE">
        <p><strong>Error:</strong> Favor verificar los datos introducidos.</p>
    </div>

    <div class="">
        <input type="text" class="EditAsignaturaForm form-control ckCarrera" placeholder="Introduzca el nombre de la carrera" id="ACarreraPensum" name="ACarrera" autofocus list="carreras">
        <datalist id="carreras">
            <option value="Agroindustrial">
            <option value="Electrica">
            <option value="Industrial">
            <option value="RyT">
<!--
            <option>Electrica</option>
            <option>Industrial</option>
            <option>RyT</option>
-->
            
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
            $('#Consultar').click((e) => {
                $.post('PHP/exe.php', {
                    action: 'Pensum',
                    ACarrera: $('#ACarreraPensum').val()
                }, (data, status) => {
                    //                    document.write(data);
                    if (data === "error") {
                        $('#alertE').show();
                        $('#TableG').hide()


                    } else {
                        $('#TableG').show()
                        $('#alertE').hide();
                        $('#TableG').html(data)
                    }

                    //                            console.log(d);
                })
            });

        </script>
    </div>
    <!--            <input type="text" class="hide" name="action" value="Pensum">-->

    <div id="TableG" class="container">

    </div>


    <?php 
            //include 'PHP/exe.php';

            //TraerDB();    
        ?>


</body>


</html>
