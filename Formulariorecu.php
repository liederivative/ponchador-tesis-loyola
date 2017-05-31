<html><head>
   <meta charset="UTF-8">
    <title>Editar Asignatura</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="localStyles.css">
    <!--    <link rel="stylesheet" href="css/bootstrap.min.css">-->
    <link rel="stylesheet" href="css/bootstrap.css">
    <!--    <script src="js/Shadows.js"></script>-->
        <script src="js/jquery-ui/jquery-ui-1.12.1.custom/jquery-ui.min.css"></script>   <link rel="stylesheet" href="js/jquery-ui/jquery-ui-1.12.1.custom/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


<!-- seccion de prueba -->

<!-- aqui termina seccion de prueba-->
    
</head>
<body class="body1">
   <div class="container">
       
    <nav class="navbar navbar-default">
        <div class="container-fluit">
            <div class="navbar-header">
                <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target="#menuNav">
                    <span class="sr-only">Botón de navegación</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="index.php" class="navbar-brand"><span class="glyphicon glyphicon-home Sicon1"></span> PosibleLogo</a>

            </div>
            
            <div class="collapse navbar-collapse" id="menuNav">
                <ul class="nav navbar-nav">
                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">Asignatura<span class="caret"></span></a>
                    
                        <ul class="dropdown-menu">
                            
                            <li><a href="CrearAsignatura.php">Crear</a></li>
                            <li><a href="EditarAsignatura.php">Editar</a></li>
                            <li><a href="EliminarAsignatura.php">Eliminar</a></li>
                            <li><a href="Formularioreposicion.php">Reposicion</a></li>
                            <li><a href="../AsociarAsignatura-Profesor.php">Asocial Profesor</a></li>
                            <li><a href="Pensum.php">Consultar Pensum</a></li>
                            <li><a href="Horarios.php">Consultar Horarios</a></li>
                        </ul>
                    </li>  
                    
                    <li class="drodown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">Profesor<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="CrearProfesores.php">Agregar</a></li>
                            <li><a href="EditarProfesores.php">Editar</a></li>
                            <li><a href="Estatus.php">Estatus</a></li>
                            <li><a href="ListadoGeneralProf.php">Listado General(desde la db table TodosProfesores</a></li>
                        </ul>
                    </li>
                    
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">Reportes<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Total</a></li>
                                <li><a href="#">Semi-Total</a></li>
                                <li><a href="Reports.php">Universidad</a></li>
                            </ul>
                    </li>
                </ul>
                <ul class="nav navbar-right navbar-nav">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"><span class="glyphicon glyphicon-cog Sicon"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Log-history</a></li>
                                <li><a href="#">Últimos Cambios</a></li>
                                <li><a href="#">Universidad</a></li>
                            </ul>
                    </li>
                </ul>
            </div>
            
        </div>
    </nav>    <form id="formReposicion" class="">
<!--       <form method="post" enctype="multipart/form-data" action=" PHP/exe.php " class="" onsubmit="">-->
        <h2>Formulario de Reposición</h2>
                <input type="text" name="action" value="horarioReposicion" hidden=""> 
                <div class="blacked-01">
                    
                <div class="col-xs-6 form-group">
                    <label for="ACodigo" class="">Código de Asignatura</label>
                    <input list="dataListA" type="tex" class="form-control" id="ACodigo" placeholder="e.g. mkz-224" name="ACodigo" autofocus="" value="mks-543">
                    <datalist id="dataListA">Array
(
    [action] =&gt; dataList
    [select] =&gt; select ACodigo, ANombre from   proyecto_ponchador.asignatura
)
<br>
<b>Notice</b>:  Undefined variable: output in <b>C:\xampp\htdocs\PHP\exe.php</b> on line <b>268</b><br>
<option value="mks-543">la vida atomica</option><option value="mta-456">Matematicas</option><option value="MTK-098">Literatura Avanzada</option><option value="mth-123">Matematicas II</option><option value="mta-456">Matematicas</option><option value="XXX-333">Anatomía Sub-Atómica</option><option value="MTA-862">Calculo</option><option value="mgk-873">Geneologia Asbtracta</option><option value="abc-123">Ergonometría</option><option value="mta-002">EstoEstaDificir</option><option value="mta-001">manata</option><option value="mta-003">FedexCurrier</option><option value="mta-004">Desarrollo Op</option><option value="mta-005">Casi Casi</option><option value="mta-006">EstoEstaDificir</option><option value="mta-008">Gravity</option><option value="mta-009">Hellow</option><option value="mta-010">Azotes</option><option value="mta-020">Matematicas III</option><option value="aa">aa</option></datalist>
                    
                </div>
        <script>
//this function call the ajax info when ASeccion and then ACodigo

            $(function(){
                     //Carlos if select change => event to Acodigo
                $('#ASeccion').change(function(){
                    var data= $(this).val();
                    $("#ACodigo").on('input', function () {
                        var val = this.value;
                        if($('#dataListA option').filter(function(){
                            return this.value === val;        
                        }).length) {
                            //send ajax request
//                            alert(this.value);
                            $.post('PHP/exe.php',{
                                    action: 'actionReposition',
                                    ACodigo: $('#ACodigo').val(),
                                    ASeccion: $('#ASeccion').val()
//                            $('#formReposicion').serialize()


                            }, (d, s)=> {
                                a = JSON.parse(d);
//                              document.write(a['ciclo']);
                                $('#CicloAsignatura').val(a['ciclo']);
                                $('#CantidadCreditos').val(a['creditos']);
                                $('#carrera').val(a['carrera']);
                                $('#PNombre').val(a['profesor']);
//                              document.write(d);
//                              document.write(a['ciclo']);
                                           });
                        }
                    });
                    
                });
            });
            
//this function call the ajax info when ACodigo and then ASeccion
            $("#ACodigo").on('input', function () {
                var val = this.value;
                if($('#dataListA option').filter(function(){
                    return this.value === val;        
                }).length) {
                    $(function(){
                             //Carlos if select change => event to Acodigo
                        $('#ASeccion').change(function(){
                            var data= $(this).val();
                    //send ajax request
//                            alert(data);
                            $.post('PHP/exe.php',{
                                    action: 'actionReposition',
                                    ACodigo: $('#ACodigo').val(),
                                    ASeccion: $('#ASeccion').val()
//                            $('#formReposicion').serialize()


                            }, (d, s)=> {
                                a = JSON.parse(d);
//                              document.write(a['ciclo']);
                                $('#CicloAsignatura').val(a['ciclo']);
                                $('#CantidadCreditos').val(a['creditos']);
                                $('#carrera').val(a['carrera']);
                                $('#PNombre').val(a['profesor']);
//                              document.write(d);
//                              document.write(a['ciclo']);

                                           });                            

                        });
                    });
                }
            });

        </script>
                

                <div class="col-xs-6 form-group">
                        <label for="ASeccion" class="">Sección</label>
                <select class="seccion2" name="ASeccion" id="ASeccion">
<!--                    <option value="" selected disabled hidden>Seleccione una sección</option>-->
                    <option value="1" selected="">Sección 01</option>
                    <option value="2">Sección 02</option>
                    <option value="3">Sección 03</option>
                    <option value="4">Sección 04</option>
                </select>

                </div>
                
                </div>   
                <div>
                  <div class="blacked-02"> 
                    
                    <div class="alert alert-info col-xs-12 blackness01">
                        <p><strong>Info Extra!</strong> Varifique los datos de las asignatura en los cuadro de textos debajo</p>
                    </div>
                   
                         <div class="col-xs-6 form-group">
                    
                            <label for="CicloAsignatura" class="">Ciclo de la Asignatura</label>
                            <input type="tex" class="form-control" name="CicloAsignatura" id="CicloAsignatura" placeholder="Ciclo al que pertence la asig." readonly="" value="4">
                        
                        </div>
                        
                        <div class="col-xs-6 form-group">
                            <label for="CantidadCreditos" class="">Cantidad de Creditos </label>
                            <input type="text" class="form-control" name="CantidadCreditos" id="CantidadCreditos" placeholder="Creditos de la materia" value="5" readonly="">
                        
                        </div> 
                        <div class="col-xs-6 form-group">
                            <label for="carrera" class="">Carrera </label>
                            <input type="text" class="form-control" name="carrera" id="carrera" placeholder="Creditos de la materia" value="RyT" readonly="">
                        
                        </div> 
                            <div class="col-xs-6 form-group">
                                <label for="profesor" class="">Profesor Asignado</label>
                            <input type="text" class="form-control" name="PNombre" id="PNombre" placeholder="Profesor Asociado" value="Mateo" readonly="">
                        
                            </div> </div> 


<div class="blacked-03">
                        <div class="col-xs-12 form-group ckSLboton">
                            <a href="#SeleccionHorarioLab" class="btn btn-info" id="botonLabHorario" data-toggle="modal">Horario Reposición</a>
                        </div>
                        
                        
                                        
                        <div class="modal fade" id="SeleccionHorarioLab" style="display: none;">
                            <button type="button" class="close" data-dismiss="modal">×</button>
                        
                            <div class="col-xs-12 ckselechorario1">
                                <div class="panel panel-default col-xs-6 ckselechorario">
                                    <div class="panel-heading ckpanel">Horario Para Laboratorio</div>
                                    <div class="panel-body">
                        
                                            <input type="text" name="diaDeReposicion" id="date2" class="form-control date2" placeholder="Día para reposición">
    <script>
        $('#date').datepicker();
    </script>
                                        <div class="diasHorario">
<!--                                            <label for="lunes">Entrada-Salida</label>-->
                                            <div class="input-group form-group">
                                                <span class="input-group-addon">De</span>
                                                <select class="form-control" id="lunesDe" name="Inicio" disabled="">
                                                    <option>7:00</option>
                                                    <option>8:00</option>
                                                    <option>9:00</option>
                                                    <option>10:00</option>
                                                    <option>11:00</option>
                                                    <option>12:00</option>
                                                    <option>13:00</option>
                                                    <option>14:00</option>
                                                    <option>15:00</option>
                                                    <option>16:00</option>
                                                    <option>17:00</option>
                                                    <option>18:00</option>
                                                    <option>19:00</option>
                                                    <option>20:00</option>
                                                    <option>21:00</option>
                                                    <option>22:00</option>
                                                    <option>23:00</option>
                                                </select>
                        
                                                <span class="input-group-addon">Hasta</span>
                                                <select class="form-control" name="final" id="lunesHasta" disabled="">
                                                    <option>7:00</option>
                                                    <option>8:00</option>
                                                    <option>9:00</option>
                                                    <option>10:00</option>
                                                    <option>11:00</option>
                                                    <option>12:00</option>
                                                    <option>13:00</option>
                                                    <option>14:00</option>
                                                    <option>15:00</option>
                                                    <option>16:00</option>
                                                    <option>17:00</option>
                                                    <option>18:00</option>
                                                    <option>19:00</option>
                                                    <option>20:00</option>
                                                    <option>21:00</option>
                                                    <option>22:00</option>
                                                    <option>23:00</option>
                                                </select>
                                            </div>
                                                                    </div>
                                        </div>
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Continuar</button>
                                    </div>
                                </div>
                            </div>
                        
                        </div>
                          
                        
                           
                            <div class="alert alert-danger col-xs-8" style="display: none;">
                                <p><strong>Info Extra!</strong>Solo debe permitir seleccionar un dia para este caso; ya que es una reposicion.</p>
                            </div>
                                        
                                        <p style="display: none;">"ha decidido establecer una reposicion para la materia xxxxx impartida por el profesor xxxx"</p>
                        
                        
                                
                                <div class="col-xs-12 ckbotones">
                                    <button type="reset" class="btn btn-primary">Limpiar</button>
                                    
                                    <button type="button" id="ButtonSend" class="btn btn-primary">Enviar</button>
                                    
                                    <button type="button" class="btn btn-primary">Cancelar</button>
                                </div>
                    </div>
                                        </form></div>
    
   
   <script>
       $(document).ready((e)=>{

                     $.post('PHP/exe.php',{
                            action: 'dataList',
                            select: 'select ACodigo, ANombre from   proyecto_ponchador.asignatura'
                        }, (d,s)=>{
                            $('#dataListA').html(d);
//                          document.write(d);
                                   });
//                    $('#testButton').click((e)=>{
//                    if($('#ACodigo').val() != ""){
//                    }
//                    });
           
           
            $('#ButtonSend').click((e) => {
                $.post('PHP/exe.php', 
                       $("#formReposicion").serialize()

//                       {
//                    action: 'formReposicion',
//                    inputProf: $('#inputProf').val(),
//                    inputAsig: $('#inputAsig').val(),
//                    seccion: $('#seccion').val()
//            }
                       , (d, s) => {
                    document.write(d);
//                    console.log(d);
                });
            });
                    
       })
    
    
    </script>
    
   
<script src="js/Shadows.js"></script>

<script>

//**************Testiando********************//
    //                        $("#13").click(function(){
//                        $("#45").attr("disabled", false)
//                            
//                        });
</script>

    </body></html>