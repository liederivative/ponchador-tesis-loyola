@extends('layouts.base')
@section('content')

 <h2 class="h2EH">Formulario Para editar Asignatura</h2>
    
        <div class="alert alert-info" id="alert01">
            <p>
                <button type='button' class='close closeA' data-dismiss='alert'>x</button>
                <strong>Info Extra!</strong> Para traer la asignatura deseada introduzca el c&oacute;digo/nombre o parte de uno de los dos en el cuadro de texto debajo</p>
        </div>
    
        <div class="alert alert-warning" id="alert02">
    
            <button type='button' class='close closeA' data-dismiss='alert'>x</button>
            <p><strong id="animeted01">Info Extra!</strong> Para la elección de la materia a editar, debe ser el c&oacute;digo de la materia el debe digitar en el cuadro de texto; a diferencia de la consulta la cual puede ser tanto con parte del nombre como com parte del c&oacute;digo de la asignatura</p>
        </div>
    
    
        <div class="container">
            <div class="Editar-Materia-Glyphicon">
                <span class="glyphicon glyphicon-edit"></span>
            </div>
    
            <input type="text" value="EditarAsignatura" name="action" class="hide">
    
            <div class="col-xs-12">
                <div action="" class="EditAsignaturaForm">
    
                    <div class="btn-group">
                        <div class="input-group">
                            <span class="input-group-addon"><a id="EyesConsulta"><span class="glyphicon glyphicon-eye-open" data-toggle="tooltip" title="" data-original-title="Inserte solo iniciales y consulte pulsando aquí">
                            
                            </span>
    
                            </a>
                            </span>
    
                            <input list="dataList" id="InputEditAsig" class="form-control" name="InputEditAsig" placeholder="Introduzca aquí Código. ej. MTA-043" type="text" autofocus required>
    
                        </div>
                        <datalist id="dataList">
                            
                        </datalist>
    
    
            
                    </div>
                    
                </div>
            </div>
            
            <div id="IP">
    
            </div>
            <div id="IP2" class="vacio01">
                <table class="table table-condensed table-bordered table-reports table-obd"><tr><th>No se encontraron coincidencias</th></tr></table>
            </div>
    
            <div class="col-xs-12 ckSLboton">
    
                <button type="button" class="btn ckEditPensum" id="Editar">
                    <span class="glyphicon glyphicon-edit"></span> Editar
                </button>
    
            </div>
    
            <!--                </form>-->
        </div>
        <script>
            $(document).ready(function () {
                $('#alert01').fadeTo(5000, 500).slideUp(3000, function () {
                    $('#alert01').slideUp(500);
                });
                
                $('#alert02').fadeTo(10000, 500).slideUp(3000, function () {
                    $('#alert02').slideUp(500);
                });
            })
        </script>
        <script>
            $(document).ready(function () {
                $.post('/exe',{
                   action: 'dataList',
                   select: 'select ACodigo, ANombre from asignatura'
               }, (d,s)=>{
                   $('#dataList').html(d);
//                                       document.write(d);
               });

                var tabla = [];
                $('#EyesConsulta').click((e) => {
                    $.post('/exe', {
                        action: 'ConsultaEditarAsignatura',
                        InputEditAsig: $('#InputEditAsig').val()
                    }, (data, status) => {
                                        
                                        //                    document.write(data); 
            if (data === "vacio") {
                $('#alertEA1').show();
                $('#IP2').hide();
                $('#IP').hide();
                    $('#alertEA1').fadeTo(8000, 500).slideUp(2000, function () {
                        $('#alertEA1').slideUp(300);
                });
                return false;
            }else if(data=== "objetoVacio"){
    //                    document.write("la vida esta");
                $('#IP2').show();
                $('#IP').hide();
                $('#alertEA1').hide();
    
                
            }else{
                      $('#IP2').hide();
                    $('#alertEA1').hide();
                                    $('#IP').show();
    
    
                  
                                        
                                        table = data;
                                        $('#IP').html(data)
                                            //                                console.log(d);
                                    }
                                    });
                                });
                            });
    </script>
    <script>
        function JSONtoUrl(json) {
            var query = "";
            for (key in json) {
                console.log(key);
                query += encodeURIComponent(key) + "=" + encodeURIComponent(json[key]) + "&";
            }
            return query;
        }

        $('#Editar').click((e) => {
            //            console.log('soy un elemento')
            $.post('/exe', {
                action: 'EditarAsignatura',
                InputEditAsig: $('#InputEditAsig').val()
            }, (d, status) => {
//                    document.write(data); 
                if (d === "vacio") {
                    $('#alertEA1').show();
                        $('#alertEA1').fadeTo(8000, 500).slideUp(2000, function () {
                            $('#alertEA1').slideUp(300);
                    });
                } else if(d === "nocoincidencia"){
                    $('#alertEA2').show();
                        $('#alertEA2').fadeTo(8000, 500).slideUp(2000, function () {
                            $('#alertEA2').slideUp(300);
                    });
                    
                }else{ 
                    
                    f = JSONtoUrl(d[0]);
//                    console.log(f);
                    window.location.href = '/asignatura/createII?action=editar&' + 'InputEditAsig=' + $('#InputEditAsig').val() + "&" + encodeURI(f);

                }
            });
        });

    </script>
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
            $('.dropdown-toggle').dropdown();
        });
    </script>
    <div class='alert alert-warning alertCondi3 container' id='alertEA1'>
        <button type='button' class='close' data-dismiss='alert'>x</button>
        <p><strong>Campo se encuentra vac&iacute;o para su petici&oacute;n, favor verificar eh intentar nuevamente.</strong></p>
    </div>
    <div class='alert alert-warning alertCondi3 container' id='alertEA2'>
        <button type='button' class='close' data-dismiss='alert'>x</button>
        <p>No se encontro ninguna conincidencia con su peticio, Para realizar la edici&oacute;n.</p>
    </div>


@endsection