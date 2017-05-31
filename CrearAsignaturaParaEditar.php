<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <title>Ponchador</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">


    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="localStyles.css">


    <?php include 'PHP/Shadows.php'?>

</head>

<?php    
        function CrearAsignatura($data){
            $data = trim($data);
            $data = stripcslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
    if($_GET['action'] == 'editar'){
        $fill['asign'] = urldecode($_GET['ANombre']);
         $fill['codigo'] = urldecode($_GET['ACodigo']);
        $fill['carrera'] = urldecode($_GET['CNombre']);
        $fill['Cuatrimestre'] = urldecode($_GET['ACuatrimestre']);
        $fill['creditos'] = urldecode($_GET['ACreditos']);
        $fill['InputEditAsig'] = urldecode($_GET['InputEditAsig']);
        $fill['ASeccion'] = urldecode($_GET['ASeccion']);
        
        
    }
//   print_r($_GET); 
    ?>



    <body class="body1">

        <div class="container">
            <?php echo BarNav?>
                <script>
                    $(document).ready(function () {
                        $("#vbvb option[value='2']").prop('selected', true);
                        // you need to specify id of combo to set right combo, if more than one combo
                    });
                </script>

                <form method="post" action="<?php echo htmlspecialchars("PHP/exe.php");?>" class="CrearAsignaturaForm">
                    <h2>Editando Asignatura</h2>

                    <input type="text" class="hide" name="action" value="UpdateAsignatura">
                    <div class="col-xs-6 form-group">
                        <label for="asignatura" class="">Asignatura<span class="Requerido"> *</span></label>
                        <input type="text" class="form-control" name="FAsignatura" placeholder="Nombre de Asignatura" value="<?php echo $fill['asign']; ?>" required/>

                    </div>

                    <div class="col-xs-6 form-group">
                        <label for="CodigoAsignatura" class="">C&oacute;digo de Asignatura<span class="Requerido"> *</span></label>
                        <input type="tex" class="form-control" id="CodigoAsignatura" placeholder="e.g. mkz-224" value="<?php echo $fill['codigo']; ?>" name="FCodigoAsignatura" required />

                    </div>
                    <div class="col-xs-6 form-group">
                        <label for="CicloAsignatura" class="">Ciclo de la Asignatura<span class="Requerido"> *</span></label>
                        <input type="tex" class="form-control" name="FCicloAsignatura" value="<?php echo $fill['Cuatrimestre']; ?>" id="CicloAsignatura" placeholder="Ciclo al que pertence la asig." required />

                    </div>

                    <div class="col-xs-6 form-group">
                        <label for="CantidadCreditos" class="">Cantidad de Creditos<span class="Requerido"> *</span></label>
                        <input type="text" class="form-control" name="FCantidadCreditos" value="<?php echo $fill['creditos']; ?>" id="CantidadCreditos" placeholder="Creditos de la materia" required />

                    </div>

                    <div class="col-xs-6 form-group hide">
                        <input type="text" class="form-control" name="InputEditAsig" value="<?php echo $fill['InputEditAsig']; ?>" id="CantidadCreditos" placeholder="Creditos de la materia" required />

                    </div>

                    <!--
                    <div class="col-xs-6 form-group">
                        <label for="FRequisitosAsignatura" class="">Requisitos de la Asignatura<span class="Requerido"> </span></label>
                        <input type="tex" class="form-control" name="FRequisitosAsignatura" id="FRequisitosAsignatura" placeholder="e.g. mta-05, mta-20, mta-ob5" />
                    </div>
-->

                    <div class="col-xs-6 form-group">
                        <label for="Carrera" class="">Carrera<span class="Requerido"> *</span></label>
                        <select class="form-control" name="FCarrera" id="vbvb" option="3" required>
                            <option value="1" <?php if ($fill[ 'carrera']==1) echo "selected";?> >R&amp;T</option>
                            <option value="2" <?php if ($fill[ 'carrera']==2) echo "selected";?> >Agroindustrial</option>
                            <option value="3" <?php if ($fill[ 'carrera']==3) echo "selected";?> >Electrica</option>
                            <option value="4" <?php if ($fill[ 'carrera']==4) echo "selected";?> >Industrial</option>
                        </select>

                    </div>

                        <div class="col-xs-6 form-group">
                            <label for="Carrera" class="">Sección<span class="RequeridoText"> opcional</span></label>
                            <select class="form-control" name="FSeccion" required>
                                <option <?php if ($fill['ASeccion']==001 && $fill['ASeccion']==000) echo "selected";?> value="001" >Sección 01</option>
                                <option <?php if ($fill['ASeccion']==002) echo "selected";?> value="002" >Sección 02</option>
                                <option <?php if ($fill['ASeccion']==003) echo "selected";?> value="003" >Sección 03</option>
                                <option <?php if ($fill['ASeccion']==004) echo "selected";?> value="004" >Sección 04</option>
                            </select>
                        </div>

                    <div class="col-xs-12">

                        <label for="TieneLab" id="TieneLabLabel">Laboratorio</label>
                        <input type="checkbox" name="TieneLab" id="TieneLab" class="" <?php if($_GET['Laboratorio']==1) {echo "checked";} ?>>
                        

                    </div>
                    
<!--
                    <div class="" id="BlockStaticLab">
                        <div class="BlockLab" id="BlockLab">
                            <div class="col-xs-6 form-group">
                                <label for="AulaAsignatura">Aula Laboratorio</label>
                                <select class="form-control" id="SiTieneLab">
                                    <option>DeLaDB1</option>
                                    <option>DeLaDB</option>
                                    <option>DeLaDB</option>
                                    <option>DeLaDB</option>
                                </select>
                            </div>


                        </div>
                    </div>
-->

                    <div class="col-xs-12 ckbotonesE">
                        
                        <button type="submit" class="btn btn-primary">Actualizar</button>

                        <button type="button" class="btn btn-primary">Cancelar</button>
                    </div>
                    <!--        <button type="button" class="" id="as">test</button>-->

                </form>
        </div>

        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <!--            <script src="js/chartjs/Chart.min.js"></script>-->
        <script src="js/Shadows.js"></script>

    </body>

</html>