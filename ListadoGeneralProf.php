<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Teachers General List</title>
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
               <h2 class="h2EH">Listado General profesores</h2>

            
            
            
            
            
            
            
<!--********************************************************un boton sin mas**********************************-->
<!--
            <div class="col-xs-12 ckSLboton">

                <button type="button" class="btn ckEditPensum" id="listado">
                    <span class="glyphicon glyphicon-edit"></span> Listado General
                </button>

            </div>
-->
 <!--********************************************************Ejecución del listado**********************************-->           

            <script type="text/javascript">
//                $('#listado').click((e) => {
                        $.post('PHP/exe.php', {
                            action: 'ProfList',
                           
                        }, (data, status) => {
                            $("#tablaListado").html(data);
                        });
//                    });
            </script>

            <div class="scrollDivTable" id="tablaListado">
            </div> 
           
           
           
           
           
           
           
           
           <!--
            
<div id="all_row">
    
</div>
           
-->
           
            
<!--**********************************************script para integracion al exe.php**************************************-->
            <script>
////                ('#listado').click((e) => {
//                $(document).ready(function(){
////                    document.write("hola");
//                            $.post('PHP/exe.php', {
//                                        action: 'ProfList',
////                                        InputEditAsig: $('#InputEditAsig').val()
//                                    }, (data, status) => {
////                                        document.write(data);
//                                            $("#all_row").html(data);
////                                        if (data === "vacio") {
////
////                                        } else {
////
////                                        }
//                            });
//                });
            </script>

            <!--
    <table class="table table-condensed table-bordered table-reports">
            <thead>
                <tr>
                    <th>C&oacute;digo</th>
                    <th>Nombre de Asignatura</th>
                    <th>Ciclo</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><input type="text" placeholder="Codigo de la materia" class="inputtd"></td>
                    <td>mta-20</td>
                    <td>13:16</td>
                </tr>
                <tr>
                    <td>jose feliciano</td>
                    <td>mta-33</td>
                    <td>15:05</td>
                </tr>
                <tr>
                    <td>carlos Doce</td>
                    <td>gcm-46</td>
                    <td>8:00</td>

                </tr>
                <tr>
                    <td>pedro acosta</td>
                    <td>MTA-98</td>
                    <td>12:03</td>

                </tr>
               
            </tbody>
       </table>
-->
    </div>

</body>

</html>