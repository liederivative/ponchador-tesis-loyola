<!DOCTYPE html>
<html lang="en">
<head>
   
    <meta charset="UTF-8">
    <title>Reports</title>

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
        <div class="col-sm-12 col-xs-12 canvas-reports">
            <canvas id="patria" width="50" height="25" class="canvas-reports"></canvas>
        </div>
        <div class="row top-items">
           <div class="col-sm-6 col-xs-6">
               <div class="panel panel-info paneles-reportsL">
                   <div class="panel-heading">Asignaturas sin profesor</div>
                   <div class="panel-body">
                       <ul>
                           <li></li>
                           <li></li>
                           <li></li>
                           <li></li>
                           <li></li>
                           <li></li>
                       </ul>
                   </div>
               </div>
           </div>

           <div class="col-sm-6 col-xs-6">
               <div class="panel panel-danger paneles-reportsR">
                    <div class="panel-heading">Ultimos Tarde o Sin Llegar</div>
                    <div class="panel-body">

                        <ul>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                        </ul>
                    </div>
               </div>
           </div>

        </div>
        
<!--     <div class="panel panel-default">       -->
        <table class="table table-condensed table-bordered table-reports">
            <thead>
                <tr>
                    <th>Profesor</th>
                    <th>Asignatura</th>
                    <th>Hora inicio</th>
                    <th>Hora Inicio Esperado</th>
                    <th>Hora Salida</th>
                    <th>Hora Salida Esperada</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>juan Bautista</td>
                    <td>mta-20</td>
                    <td>13:16</td>
                    <td>13:00</td>
                    <td>18:13</td>
                    <td>18:00</td>
                    
                </tr>
                <tr>
                    <td>jose feliciano</td>
                    <td>mta-33</td>
                    <td>15:05</td>
                    <td>15:00</td>
                    <td>18:50</td>
                    <td>19:00</td>
                </tr>
                <tr>
                    <td>carlos Doce</td>
                    <td>gcm-46</td>
                    <td>8:00</td>
                    <td>8:00</td>
                    <td>12:23</td>
                    <td>12:30</td>
                </tr>
                <tr>
                    <td>pedro acosta</td>
                    <td>MTA-98</td>
                    <td>12:03</td>
                    <td>13:00</td>
                    <td>22:50</td>
                    <td>22:50</td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>

                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
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