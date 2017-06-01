<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <title>Crear Horario</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">


    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="localStyles.css">


    <?php include 'PHP/Shadows.php'?>
        <script src="js/jquery.js"></script>


<?php    
        function CrearAsignatura($data){
            $data = trim($data);
            $data = stripcslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
    
    if($_GET['action'] == 'editar'){
        $Nombre = urldecode($_GET['Nombre']);
//        echo $Nombre;
        
        if(urldecode($_GET['LunesDe'])==='00:00:00'){$LunesDe="";$LunesHasta="";}else{
            $LunesDe = urldecode($_GET['LunesDe']);
            $LunesHasta = urldecode($_GET['LunesHasta']);
        }
        
        if(urldecode($_GET['MartesDe'])==='00:00:00'){$MartesDe="";$MartesHasta="";}else{
            $MartesDe = urldecode($_GET['MartesDe']);
            $MartesHasta = urldecode($_GET['MartesHasta']);
        }
        if(urldecode($_GET['MiercolesDe'])==='00:00:00'){$MiercolesDe="";$MiercolesHasta="";}else{
            $MiercolesDe = urldecode($_GET['MiercolesDe']);
            $MiercolesHasta = urldecode($_GET['MiercolesHasta']);
        }
        if(urldecode($_GET['JuevesDe'])==='00:00:00'){$JuevesDe="";$JuevesHasta="";}else{
            $JuevesDe = urldecode($_GET['JuevesDe']);
            $JuevesHasta = urldecode($_GET['JuevesHasta']);
        }
        if(urldecode($_GET['ViernesDe'])==='00:00:00'){$ViernesDe="";$ViernesHasta="";}else{
            $ViernesDe = urldecode($_GET['ViernesDe']);
            $ViernesHasta = urldecode($_GET['ViernesHasta']);
        }
        if(urldecode($_GET['SabadoDe'])==='00:00:00'){$SabadoDe="";$SabadoHasta="";}else{
            $SabadoDe = urldecode($_GET['SabadoDe']);
            $SabadoHasta = urldecode($_GET['SabadoHasta']);
        }

        

        

        
        
    }
//    $dg = string urldecode(($_GET))
//   print_r($dg);
//    echo $MiercolesDe;
    ?>

</head>



        <body class="body1">

            <div class="container">
                <?php echo BarNav?>
                    

                    <div class='alert alert-danger ND alertsHorarios' id='alertPH'>
                        <button type='button' class='close' data-dismiss='alert'>x</button>
                        <p><strong></strong>El horario Seleccionado contiene errores, favor verifique he intentelo nuevamente.</p>
                    </div>

                    <div class='alert alert-danger ND' id='alertEMS'>
                        <button type='button' class='close' data-dismiss='alert'>x</button>
                        <p>La <strong>Hora de entrada</strong> no puede ser <strong>mayor</strong> a la <strong>hora de salida</strong>.</p>
                    </div>

                    <div class='alert ND alert-success' id='alertOk'>
                        <button type='button' class='close' data-dismiss='alert'>x</button>
                        <p>EL horario a sido actualizado correctamente</p>
                    </div>




                    <form class="CrearAsignaturaForm" onsubmit="return validar();" id="form">

                        <h2>Crear Horario</h2>
                        <input type="text" name="oldName" hidden value="<?php echo $Nombre; ?>">
                        <input type="text" hidden name="action" value="ActualizarHorario">

                        <div action="" class="EAFR col-md-12 col-xs-12 col-lg-12">
                            <!--                            <div class="col-xs-6">-->
                            <input id="nombreHorario" name="nombreHorario" type="text" class="form-control" placeholder=" Nombre eg. L8:30 o Autocad-01" value="<?php echo urldecode($_GET['Nombre']);?>" autofocus required>
                            <!--                            </div>-->
                        </div>
                        <!--
                        <div action="" class="EAFR col-md-6 col-xs-6 col-lg-6">
                            <input id="IDH" name="IDH" type="number" class="form-control" placeholder="ID para este horario eg. 123456" pattern=".{6}">
                        </div>
-->

                        <!--
                        <div class="col-xs-6">
                            <select class="form-control" name="FCarrera" required1>
                                <option value="1">Lunes</option>
                                <option value="2">Martesa</option>
                                <option value="3">Miercos</option>
                                <option value="4">Agroindustrial</option>
                            </select>
                        </div>
-->

                        <div class="diasHorarios">
                            <div class="col-xs-6">
                                <label for="lunes">Lunes</label>
                                <input type="checkbox" id="lunes" class="" <?php if($LunesDe !=""){ echo "checked"; } ?> >
                                <div class="input-group col-xs-12">
                                    <span class="input-group-addon">De</span>
                                    <select class="form-control" id="lunesDe" name="lunesDe" <?php if($LunesDe === ""){echo 'disabled'; } ?> >
                                        <option selected disabled hidden=""></option>
                                        <?php echo "<option selected hidden>$LunesDe</option>"; ?>
                                        <option>7:00</option>
                                        <option>7:30</option>
                                        <option>8:00</option>
                                        <option>8:30</option>
                                        <option>9:00</option>
                                        <option>9:30</option>
                                        <option>10:00</option>
                                        <option>10:30</option>
                                        <option>11:00</option>
                                        <option>11:30</option>
                                        <option>12:00</option>
                                        <option>12:30</option>
                                        <option>13:00</option>
                                        <option>13:30</option>
                                        <option>14:00</option>
                                        <option>14:30</option>
                                        <option>15:00</option>
                                        <option>15:30</option>
                                        <option>16:00</option>
                                        <option>16:30</option>
                                        <option>17:00</option>
                                        <option>17:30</option>
                                        <option>18:00</option>
                                        <option>18:30</option>
                                        <option>19:00</option>
                                        <option>19:30</option>
                                        <option>20:00</option>
                                        <option>20:30</option>
                                        <option>21:00</option>
                                        <option>21:30</option>
                                        <option>22:00</option>
                                        <option>22:30</option>
                                        <option>23:00</option>
                                        <option>23:30</option>
                                    </select>

                                    <span class="input-group-addon">Hasta</span>
                                    <select class="form-control" name="lunesHasta" id="lunesHasta" <?php if($LunesHasta === ""){echo 'disabled'; } ?> >
                                        <option selected disabled hidden=""></option>
                                        <?php echo "<option selected hidden>$LunesHasta</option>"; ?>
                                        <option>7:00</option>
                                        <option>7:30</option>
                                        <option>8:00</option>
                                        <option>8:30</option>
                                        <option>9:00</option>
                                        <option>9:30</option>
                                        <option>10:00</option>
                                        <option>10:30</option>
                                        <option>11:00</option>
                                        <option>11:30</option>
                                        <option>12:00</option>
                                        <option>12:30</option>
                                        <option>13:00</option>
                                        <option>13:30</option>
                                        <option>14:00</option>
                                        <option>14:30</option>
                                        <option>15:00</option>
                                        <option>15:30</option>
                                        <option>16:00</option>
                                        <option>16:30</option>
                                        <option>17:00</option>
                                        <option>17:30</option>
                                        <option>18:00</option>
                                        <option>18:30</option>
                                        <option>19:00</option>
                                        <option>19:30</option>
                                        <option>20:00</option>
                                        <option>20:30</option>
                                        <option>21:00</option>
                                        <option>21:30</option>
                                        <option>22:00</option>
                                        <option>22:30</option>
                                        <option>23:00</option>
                                        <option>23:30</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-xs-6">
                                <label for="martes">Martes</label>
                                <input type="checkbox" id="martes" <?php if($MartesDe!=""){echo "checked";} ?>>
                                <div class="input-group col-xs-12">

                                    <span class="input-group-addon">De</span>
                                    <select class="form-control" name="martesDe" id="martesDe" <?php if($MartesDe === ""){echo 'disabled'; } ?> >
                                        <option selected disabled hidden=""></option>
                                        <?php echo "<option selected hidden>$MartesDe</option>"; ?>
                                        <option>7:00</option>
                                        <option>7:30</option>
                                        <option>8:00</option>
                                        <option>8:30</option>
                                        <option>9:00</option>
                                        <option>9:30</option>
                                        <option>10:00</option>
                                        <option>10:30</option>
                                        <option>11:00</option>
                                        <option>11:30</option>
                                        <option>12:00</option>
                                        <option>12:30</option>
                                        <option>13:00</option>
                                        <option>13:30</option>
                                        <option>14:00</option>
                                        <option>14:30</option>
                                        <option>15:00</option>
                                        <option>15:30</option>
                                        <option>16:00</option>
                                        <option>16:30</option>
                                        <option>17:00</option>
                                        <option>17:30</option>
                                        <option>18:00</option>
                                        <option>18:30</option>
                                        <option>19:00</option>
                                        <option>19:30</option>
                                        <option>20:00</option>
                                        <option>20:30</option>
                                        <option>21:00</option>
                                        <option>21:30</option>
                                        <option>22:00</option>
                                        <option>22:30</option>
                                        <option>23:00</option>
                                        <option>23:30</option>
                                    </select>

                                    <span class="input-group-addon">Hasta</span>
                                    <select class="form-control" name="martesHasta" id="martesHasta" <?php if($MartesHasta === ""){echo 'disabled'; } ?> >
                                        <option selected disabled hidden=""></option>
                                        <?php echo "<option selected hidden>$MartesHasta</option>"; ?>
                                        <option>7:00</option>
                                        <option>7:30</option>
                                        <option>8:00</option>
                                        <option>8:30</option>
                                        <option>9:00</option>
                                        <option>9:30</option>
                                        <option>10:00</option>
                                        <option>10:30</option>
                                        <option>11:00</option>
                                        <option>11:30</option>
                                        <option>12:00</option>
                                        <option>12:30</option>
                                        <option>13:00</option>
                                        <option>13:30</option>
                                        <option>14:00</option>
                                        <option>14:30</option>
                                        <option>15:00</option>
                                        <option>15:30</option>
                                        <option>16:00</option>
                                        <option>16:30</option>
                                        <option>17:00</option>
                                        <option>17:30</option>
                                        <option>18:00</option>
                                        <option>18:30</option>
                                        <option>19:00</option>
                                        <option>19:30</option>
                                        <option>20:00</option>
                                        <option>20:30</option>
                                        <option>21:00</option>
                                        <option>21:30</option>
                                        <option>22:00</option>
                                        <option>22:30</option>
                                        <option>23:00</option>
                                        <option>23:30</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-xs-6">
                                <label for="miercoles">Miercoles</label>
                                <input type="checkbox" id="miercoles" <?php if($MiercolesDe!=""){echo "checked";} ?>>
                                <div class="input-group col-xs-12">

                                    <span class="input-group-addon">De</span>
                                    <select class="form-control" name="miercolesDe" id="miercolesDe" <?php if($MiercolesDe === ""){echo 'disabled'; } ?> >
                                        <option>7:00</option>
                                        <option selected disabled hidden=""></option>
                                        <?php echo "<option selected hidden>$MiercolesDe</option>"; ?>
                                        <option>7:00</option>
                                        <option>7:30</option>
                                        <option>8:00</option>
                                        <option>8:30</option>
                                        <option>9:00</option>
                                        <option>9:30</option>
                                        <option>10:00</option>
                                        <option>10:30</option>
                                        <option>11:00</option>
                                        <option>11:30</option>
                                        <option>12:00</option>
                                        <option>12:30</option>
                                        <option>13:00</option>
                                        <option>13:30</option>
                                        <option>14:00</option>
                                        <option>14:30</option>
                                        <option>15:00</option>
                                        <option>15:30</option>
                                        <option>16:00</option>
                                        <option>16:30</option>
                                        <option>17:00</option>
                                        <option>17:30</option>
                                        <option>18:00</option>
                                        <option>18:30</option>
                                        <option>19:00</option>
                                        <option>19:30</option>
                                        <option>20:00</option>
                                        <option>20:30</option>
                                        <option>21:00</option>
                                        <option>21:30</option>
                                        <option>22:00</option>
                                        <option>22:30</option>
                                        <option>23:00</option>
                                        <option>23:30</option>
                                    </select>

                                    <span class="input-group-addon">Hasta</span>
                                    <select class="form-control" name="miercolesHasta" id="miercolesHasta" <?php if($MiercolesHasta === ""){echo 'disabled'; } ?> >
                                        <option selected disabled hidden=""></option>
                                        <?php echo "<option selected hidden>$MiercolesHasta</option>"; ?>
                                        <option>7:00</option>
                                        <option>7:30</option>
                                        <option>8:00</option>
                                        <option>8:30</option>
                                        <option>9:00</option>
                                        <option>9:30</option>
                                        <option>10:00</option>
                                        <option>10:30</option>
                                        <option>11:00</option>
                                        <option>11:30</option>
                                        <option>12:00</option>
                                        <option>12:30</option>
                                        <option>13:00</option>
                                        <option>13:30</option>
                                        <option>14:00</option>
                                        <option>14:30</option>
                                        <option>15:00</option>
                                        <option>15:30</option>
                                        <option>16:00</option>
                                        <option>16:30</option>
                                        <option>17:00</option>
                                        <option>17:30</option>
                                        <option>18:00</option>
                                        <option>18:30</option>
                                        <option>19:00</option>
                                        <option>19:30</option>
                                        <option>20:00</option>
                                        <option>20:30</option>
                                        <option>21:00</option>
                                        <option>21:30</option>
                                        <option>22:00</option>
                                        <option>22:30</option>
                                        <option>23:00</option>
                                        <option>23:30</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-xs-6">
                                <label for="jueves">Jueves</label>
                                <input type="checkbox" id="jueves" <?php if($JuevesDe!=""){echo "checked";} ?> >
                                <div class="input-group col-xs-12">
                                    <span class="input-group-addon">De</span>
                                    <select class="form-control" name="juevesDe" id="juevesDe" <?php if($JuevesDe === ""){echo 'disabled'; } ?> >
                                        <option selected disabled hidden=""></option>
                                        <?php echo "<option selected hidden>$JuevesDe</option>"; ?>
                                        <option>7:00</option>
                                        <option>7:30</option>
                                        <option>8:00</option>
                                        <option>8:30</option>
                                        <option>9:00</option>
                                        <option>9:30</option>
                                        <option>10:00</option>
                                        <option>10:30</option>
                                        <option>11:00</option>
                                        <option>11:30</option>
                                        <option>12:00</option>
                                        <option>12:30</option>
                                        <option>13:00</option>
                                        <option>13:30</option>
                                        <option>14:00</option>
                                        <option>14:30</option>
                                        <option>15:00</option>
                                        <option>15:30</option>
                                        <option>16:00</option>
                                        <option>16:30</option>
                                        <option>17:00</option>
                                        <option>17:30</option>
                                        <option>18:00</option>
                                        <option>18:30</option>
                                        <option>19:00</option>
                                        <option>19:30</option>
                                        <option>20:00</option>
                                        <option>20:30</option>
                                        <option>21:00</option>
                                        <option>21:30</option>
                                        <option>22:00</option>
                                        <option>22:30</option>
                                        <option>23:00</option>
                                        <option>23:30</option>
                                    </select>

                                    <span class="input-group-addon">Hasta</span>
                                    <select class="form-control" name="juevesHasta" id="juevesHasta" <?php if($JuevesHasta === ""){echo 'disabled'; } ?> >
                                        <option selected disabled hidden=""></option>
                                        <?php echo "<option selected hidden>$JuevesHasta</option>"; ?>
                                        <option>7:00</option>
                                        <option>7:30</option>
                                        <option>8:00</option>
                                        <option>8:30</option>
                                        <option>9:00</option>
                                        <option>9:30</option>
                                        <option>10:00</option>
                                        <option>10:30</option>
                                        <option>11:00</option>
                                        <option>11:30</option>
                                        <option>12:00</option>
                                        <option>12:30</option>
                                        <option>13:00</option>
                                        <option>13:30</option>
                                        <option>14:00</option>
                                        <option>14:30</option>
                                        <option>15:00</option>
                                        <option>15:30</option>
                                        <option>16:00</option>
                                        <option>16:30</option>
                                        <option>17:00</option>
                                        <option>17:30</option>
                                        <option>18:00</option>
                                        <option>18:30</option>
                                        <option>19:00</option>
                                        <option>19:30</option>
                                        <option>20:00</option>
                                        <option>20:30</option>
                                        <option>21:00</option>
                                        <option>21:30</option>
                                        <option>22:00</option>
                                        <option>22:30</option>
                                        <option>23:00</option>
                                        <option>23:30</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-xs-6">
                                <label for="viernes">Viernes</label>

                                <input type="checkbox" id="viernes" <?php if($ViernesDe!=""){echo "checked";} ?> >
                                <div class="input-group col-xs-12">
                                    <span class="input-group-addon">De</span>
                                    <select class="form-control" name="viernesDe" id="viernesDe" <?php if($ViernesDe === ""){echo 'disabled'; } ?> >
                                        <option selected disabled hidden=""></option>
                                        <?php echo "<option selected hidden>$ViernesDe</option>"; ?>
                                        <option>7:00</option>
                                        <option>7:30</option>
                                        <option>8:00</option>
                                        <option>8:30</option>
                                        <option>9:00</option>
                                        <option>9:30</option>
                                        <option>10:00</option>
                                        <option>10:30</option>
                                        <option>11:00</option>
                                        <option>11:30</option>
                                        <option>12:00</option>
                                        <option>12:30</option>
                                        <option>13:00</option>
                                        <option>13:30</option>
                                        <option>14:00</option>
                                        <option>14:30</option>
                                        <option>15:00</option>
                                        <option>15:30</option>
                                        <option>16:00</option>
                                        <option>16:30</option>
                                        <option>17:00</option>
                                        <option>17:30</option>
                                        <option>18:00</option>
                                        <option>18:30</option>
                                        <option>19:00</option>
                                        <option>19:30</option>
                                        <option>20:00</option>
                                        <option>20:30</option>
                                        <option>21:00</option>
                                        <option>21:30</option>
                                        <option>22:00</option>
                                        <option>22:30</option>
                                        <option>23:00</option>
                                        <option>23:30</option>
                                    </select>

                                    <span class="input-group-addon">Hasta</span>
                                    <select class="form-control" name="viernesHasta" id="viernesHasta" <?php if($ViernesHasta === ""){echo 'disabled'; } ?> >
                                        <option selected disabled hidden=""></option>
                                        <?php echo "<option selected hidden>$ViernesHasta</option>"; ?>
                                        <option>7:00</option>
                                        <option>7:30</option>
                                        <option>8:00</option>
                                        <option>8:30</option>
                                        <option>9:00</option>
                                        <option>9:30</option>
                                        <option>10:00</option>
                                        <option>10:30</option>
                                        <option>11:00</option>
                                        <option>11:30</option>
                                        <option>12:00</option>
                                        <option>12:30</option>
                                        <option>13:00</option>
                                        <option>13:30</option>
                                        <option>14:00</option>
                                        <option>14:30</option>
                                        <option>15:00</option>
                                        <option>15:30</option>
                                        <option>16:00</option>
                                        <option>16:30</option>
                                        <option>17:00</option>
                                        <option>17:30</option>
                                        <option>18:00</option>
                                        <option>18:30</option>
                                        <option>19:00</option>
                                        <option>19:30</option>
                                        <option>20:00</option>
                                        <option>20:30</option>
                                        <option>21:00</option>
                                        <option>21:30</option>
                                        <option>22:00</option>
                                        <option>22:30</option>
                                        <option>23:00</option>
                                        <option>23:30</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-xs-6">
                                <label for="sabado">Sabado</label>
                                <input type="checkbox" id="sabado" <?php if($SabadoDe!=""){echo "checked";} ?> >
                                <div class="input-group col-xs-12">
                                    <span class="input-group-addon">De</span>
                                    <select class="form-control" name="sabadoDe" id="sabadoDe" <?php if($SabadoDe === ""){echo 'disabled'; } ?> >
                                        <option selected disabled hidden=""></option>
                                        <?php echo "<option selected hidden>$SabadoDe</option>"; ?>
                                        <option>7:00</option>
                                        <option>7:30</option>
                                        <option>8:00</option>
                                        <option>8:30</option>
                                        <option>9:00</option>
                                        <option>9:30</option>
                                        <option>10:00</option>
                                        <option>10:30</option>
                                        <option>11:00</option>
                                        <option>11:30</option>
                                        <option>12:00</option>
                                        <option>12:30</option>
                                        <option>13:00</option>
                                        <option>13:30</option>
                                        <option>14:00</option>
                                        <option>14:30</option>
                                        <option>15:00</option>
                                        <option>15:30</option>
                                        <option>16:00</option>
                                        <option>16:30</option>
                                        <option>17:00</option>
                                        <option>17:30</option>
                                        <option>18:00</option>
                                        <option>18:30</option>
                                        <option>19:00</option>
                                        <option>19:30</option>
                                        <option>20:00</option>
                                        <option>20:30</option>
                                        <option>21:00</option>
                                        <option>21:30</option>
                                        <option>22:00</option>
                                        <option>22:30</option>
                                        <option>23:00</option>
                                        <option>23:30</option>
                                    </select>

                                    <span class="input-group-addon">Hasta</span>
                                    <select class="form-control" name="sabadoHasta" id="sabadoHasta" <?php if($SabadoHasta === ""){echo 'disabled'; } ?> >
                                        <option selected disabled hidden=""></option>
                                        <?php echo "<option selected hidden>$SabadoHasta</option>"; ?>
                                        <option>7:00</option>
                                        <option>7:30</option>
                                        <option>8:00</option>
                                        <option>8:30</option>
                                        <option>9:00</option>
                                        <option>9:30</option>
                                        <option>10:00</option>
                                        <option>10:30</option>
                                        <option>11:00</option>
                                        <option>11:30</option>
                                        <option>12:00</option>
                                        <option>12:30</option>
                                        <option>13:00</option>
                                        <option>13:30</option>
                                        <option>14:00</option>
                                        <option>14:30</option>
                                        <option>15:00</option>
                                        <option>15:30</option>
                                        <option>16:00</option>
                                        <option>16:30</option>
                                        <option>17:00</option>
                                        <option>17:30</option>
                                        <option>18:00</option>
                                        <option>18:30</option>
                                        <option>19:00</option>
                                        <option>19:30</option>
                                        <option>20:00</option>
                                        <option>20:30</option>
                                        <option>21:00</option>
                                        <option>21:30</option>
                                        <option>22:00</option>
                                        <option>22:30</option>
                                        <option>23:00</option>
                                        <option>23:30</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-12 ckbotones" id="btnGH">
                            <button type="button" class="btn btn-primary" id="guardarHorario"><span class="glyphicon glyphicon-floppy-save"></span> Actualizar</button>
                        </div>

                    </form>
            </div>
            <script>
                $(document).ready(function () {
                    $('#btnGH').click((e) => {
                        $.post('PHP/exe.php', $("#form").serialize(), (l, k) => {
//                            document.write(l);
                            if (l === 'PH') {
                                $('#alertPH').show();
                                $('#alertEMS').hide();
                                $('#alertPH').fadeTo(3000, 500).slideUp(3000, function () {
                                    $('#alertPH').slideUp(500);
                                });
                            } else if (l === 'EMS') {
                                $('#alertEMS').show();
                                $('#alertPH').hide();
                                $('#alertEMS').fadeTo(3000, 500).slideUp(3000, function () {
                                    $('#alertEMS').slideUp(500);
                                });

                            } else {
                                $('#alertPH').hide();
                                $('#alertEMS').hide();
//                                document.write("y klk");
                                $('#alertOk').show();
                                
                                $('#alertOk').fadeTo(5000, 500).slideUp(3000, function () {
                                    $('#alertOk').slideUp(500, window.location.href='home.php?action=HE');
                                });

                            }
                        });

                    });
                });
            </script>


            <script src="js/validacion.js"></script>
            <script src="js/bootstrap.min.js"></script>
            <!--            <script src="js/chartjs/Chart.min.js"></script>-->
            <script src="js/Shadows.js"></script>

        </body>
        <script>
            //**************Testiando*******************
            //                       $("#13").click(function(){
            //                        $("#45").attr("disabled", false)
            //                            
            //                        });
        </script>

</html>