<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <title>Consultar Horario</title>

    <link rel="stylesheet" href="css/bootstrap.css">
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/chartjs/Chart.js"></script>
    <script src="js/Shadows.js"></script>
    <link rel="stylesheet" href="localStyles.css">
    <?php include 'PHP/Shadows.php'?>

</head>

<body class="body-schedule">

    <div class="container">
        <?php echo BarNav?>
    </div>
        <h2 class="h2EH">Consultar Horarios</h2>

    <!--
    <form method="post" action="" class="">
        <div class="container">
-->
    <div class="">
        <input list="dataList" type="text" class="EditAsignaturaForm form-control ckCarrera" placeholder="Introduzca o seleccione un horario" id="AHorarios" name="AHorarios">
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
            $(document).ready(function() {
//  $.ajaxSetup({ cache: false });
                        $.post('PHP/exe.php',{
                            action: 'dataList',
                            select: 'SELECT Nombre, Alias FROM proyecto_ponchador.horarios_creados_linear'
                        }, (d,s)=>{
                            $('#dataList').html(d);
//                          document.write(d);
                                   });
});
            $('#Consultar').click((e) => {

                if(document.getElementById('AHorarios').value.length < 3){
                    location.reload();
                    
                    alert("Suministre más información para su selección")
                    return;
                    
                }
                
                $.post('PHP/exe.php', {
                    action: 'Horarios',
                    AHorarios: $('#AHorarios').val()
                }, (data, status) => {
                    $('#TableH').html(data)
//                    document.write(data);
                        //                            console.log(d);
                })
            });
        </script>
    </div>
    <!--            <input type="text" class="hide" name="action" value="Pensum">-->
    
    <div id="TableH" class="container">

    </div>
 

    <?php 
            //include 'PHP/exe.php';

            //TraerDB();    
        ?>


</body>


</html>