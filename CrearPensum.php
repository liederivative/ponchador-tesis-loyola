<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <title>Pensum</title>

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

    <div class="container">
        <!--
        <div class="col-xs-12">
            <button type="button" class="btn btn-danger ck-editarPensum">Editar Pensum</button>
        </div>
-->

        <div col-xs-12>
            <input type="text" class="form-control ckCarrera" placeholder="Introduzca el nombre de la carrera" name="ACarrera">
        </div>

        <!--     <div class="panel panel-default">       -->
        <table class="table table-condensed table-bordered table-reports">
            <thead>
                <tr>
                    <th>C&oacute;digo</th>
                    <th>Nombre de Asignatura</th>
                    <th>Cuatrimestre</th>
                    <th>Creditos</th>
<!--                    <th>Carrera</th>-->
                    <th>Requesitos</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <input type="text" placeholder="Codigo de la materia" class="inputtd">
                    </td>
                    <td>mta-20</td>
                    <td>13:16</td>
                    <td>4</td>
                    <td>mta-21, mta-22</td>
                    
                    
                </tr>
                <tr>
                    <td>jose feliciano</td>
                    <td>mta-33</td>
                    <td>15:05</td>
                    <td>5</td>
                    <td>mbk-8,mbk-90</td>
                </tr>
                <tr>
                    <td>carlos Doce</td>
                    <td>gcm-46</td>
                    <td>8:00</td>
                    <td>2</td>
                    <td>mta-207, mta-365</td>

                </tr>
                <tr>
                    <td>pedro acosta</td>
                    <td>MTA-98</td>
                    <td>12:03</td>
                    <td>2</td>
                    <td>mta-101, mta-456, <br>mta-850</td>
                    <td>@</td>
                    

                </tr>
                <p>la @ indica que en ese punto debe aparecer algun boton que agregue una linea m&aacute;s, con sus devidas variable</p>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>

            </tbody>
        </table>
        <!--     </div>-->

    </div>



</body>


</html>