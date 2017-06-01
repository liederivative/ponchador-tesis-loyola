<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="localStyles.css">
    <script src="js/Shadows.js"></script>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <?php include 'PHP/Shadows.php';?>

</head>

<body class="body1">


        <div class="container">
            <?php echo BarNav;
   
//        $GLOBALS['ok']=null;   
            
        if(isset($_GET['action'])){            
            switch($_GET['action']){        
                case "ok":
                    
                echo " 
            <div class='alert alert-success alertCondi2'  id='fadeout'>
        <button type='button' class='close' data-dismiss='alert'>x</button>
        <p><strong>Exito!!!</strong> Asignatura guardada correctamente</p>
    </div>
    
        <script>
                    $(document).ready(function () {
                        //$('#fadeout').animate({
                        //top: 300
                        //});
                        
                        $('#fadeout').fadeTo(5000, 500).slideUp(3000, function () {
                            $('#fadeout').slideUp(500);
                        });
                    })
        </script>
        ";         
                break;
                case "HE":
                    
                echo " 
            <div class='alert alert-success alertCondi2'  id='fadeout'>
        <button type='button' class='close' data-dismiss='alert'>x</button>
        <p><strong>Exito!!!</strong> Horario editado correctamente</p>
    </div>
    
        <script>
                    $(document).ready(function () {
                        //$('#fadeout').animate({
                        //top: 300
                        //});
                        
                        $('#fadeout').fadeTo(5000, 500).slideUp(3000, function () {
                            $('#fadeout').slideUp(500);
                        });
                    })
        </script>
        ";         
                break;
                    
                case "*-*":
                
                echo " 
            <div class='alert alert-success alertCondi2'  id='fadeout'>
        <button type='button' class='close' data-dismiss='alert'>x</button>
        <p><strong>Actualizaci&oacute;n:</strong> Asignatura actualizada de manera correcta</p>
    </div>
    
        <script>
                    $(document).ready(function () {
                        //$('#fadeout').animate({
                        //top: 300
                        //});
                        
                        $('#fadeout').fadeTo(5000, 500).slideUp(3000, function () {
                            $('#fadeout').slideUp(500);
                        });
                    })
        </script>
        ";
                break;
                case "e":
                
                echo " 
            <div class='alert alert-success alertCondi2'  id='fadeout'>
        <button type='button' class='close' data-dismiss='alert'>x</button>
        <p><strong></strong> La asignatura ha sido eliminada</p>
    </div>
    
        <script>
                    $(document).ready(function () {
                        //$('#fadeout').animate({
                        //top: 300
                        //});
                        
                        $('#fadeout').fadeTo(5000, 500).slideUp(3000, function () {
                            $('#fadeout').slideUp(500);
                        });
                    })
        </script>
        ";
                    break;
                case "CE":
                
                echo " 
            <div class='alert alert-success alertCondi2'  id='fadeout'>
        <button type='button' class='close' data-dismiss='alert'>x</button>
        <p><strong></strong> La Clase ha sido eliminada</p>
    </div>
    
        <script>
                    $(document).ready(function () {
                        //$('#fadeout').animate({
                        //top: 300
                        //});
                        
                        $('#fadeout').fadeTo(5000, 500).slideUp(3000, function () {
                            $('#fadeout').slideUp(500);
                        });
                    })
        </script>
        ";
                break;                    
                case "EH":
                
                echo " 
            <div class='alert alert-success alertCondi2'  id='fadeout'>
        <button type='button' class='close' data-dismiss='alert'>x</button>
        <p><strong></strong> El horario ha sido eliminado correctamente</p>
    </div>
    
        <script>
                    $(document).ready(function () {
                        //$('#fadeout').animate({
                        //top: 300
                        //});
                        
                        $('#fadeout').fadeTo(5000, 500).slideUp(3000, function () {
                            $('#fadeout').slideUp(500);
                        });
                    })
        </script>
        ";
                break;                    
                case "addedProf":
                
                echo " 
            <div class='alert alert-success alertCondi2'  id='fadeout'>
        <button type='button' class='close' data-dismiss='alert'>x</button>
        <p>Profesor agregado correctamente a la curricula docente <strong>Gracias!!!</strong></p>
    </div>
    
        <script>
                    $(document).ready(function () {
                        //$('#fadeout').animate({
                        //top: 300
                        //});
                        
                        $('#fadeout').fadeTo(5000, 500).slideUp(3000, function () {
                            $('#fadeout').slideUp(500);
                        });
                    })
        </script>
        ";
                break;                    
                case "UPP":
                
                echo " 
            <div class='alert alert-success alertCondi2'  id='fadeout'>
        <button type='button' class='close' data-dismiss='alert'>x</button>
        <p>Datos para docente actualizados de manera correcta <strong>Gracias!!!</strong></p>
    </div>
    
        <script>
                    $(document).ready(function () {
                        //$('#fadeout').animate({
                        //top: 300
                        //});
                        
                        $('#fadeout').fadeTo(5000, 500).slideUp(3000, function () {
                            $('#fadeout').slideUp(500);
                        });
                    })
        </script>
        ";
                break;                    
                    
            } 
        } 
            ?>




                <div class="jumbotron">
                    <h1 class="text-center">Proyecto Ponchador</h1>
                    <p class="text-center">Pensando en La Mejora Continua</p>
                </div>
        </div>

        <!--************Prueba del metodo gettto*****************-->
        <!--
        <div class="col-lg-12">
            <input type="text" name="action" id="action" class="lolazo" placeholder="testing" value="<?php echo $ok;?>">
        </div>
-->

        <!--Alerta que desaparece en un lijero time-->

        <!--
    <div class="alert alert-info container"  id="fadeout">
        <button type="button" class="close" data-dismiss="alert">x</button>
        <p><strong>Testing option</strong> Changed life buddy, that's the point. :-)</p>
    </div>
-->

        <script>
            //        $(document).ready(function () {
            //            $("#fadeout").fadeTo(2000, 500).slideUp(500, function () {
            //                $("#fadeout").slideUp(500);
            //            });
            //        })
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