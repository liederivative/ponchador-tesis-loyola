@extends('layouts.base')
@section('content')
    <h2 class="h2EH">Editar Horarios</h2>

<!--            <div class="container">-->
                <div class="Editar-Materia-Glyphicon">
                    <span class="glyphicon glyphicon-time"></span>
                </div>

                <input type="text" value="EditarAsignatura" name="action" class="hide">

                <div class="col-xs-12">
                    <div action="" class="EditHorarioBlk">

                        <div class="btn-group">
                            <div class="input-group">
                                <span class="input-group-addon"><a id="EyesConsulta"><span class="glyphicon glyphicon-eye-open" data-toggle="tooltip" title="" data-original-title="Inserte solo iniciales y consulte pulsando aquí"><script>$(document).ready(function(){$('[data-toggle="tooltip"]').tooltip();});</script></span>

                                </a>
                                </span>

                                <input list="dataList" id="InputEditAsig" class="form-control" name="InputEditAsig" placeholder="Introduzca el nombre que asigno al horarios" type="text" autofocus required>

                            </div>
                            <datalist id="dataList">
                                
                            </datalist>


                            <script>
                                $(document).ready(function () {
                                    $.post('/exe',{
                                       action: 'dataList',
                                       select: 'SELECT Nombre FROM horarios_creados_linear'
                                   }, (d,s)=>{
                                       $('#dataList').html(d);
//                                       document.write(d);
                                   });


                                        });

                            </script>
                        </div>
                        
                    </div>
                </div>
                
                <div id="IP">

                </div>


                <div class="col-xs-12 ckSLboton">

                    <button type="button" class="btn ckEditPensum" id="Editar">
                        <span class="glyphicon glyphicon-edit"></span> Editar
                    </button>

                </div>

<!--            </div>-->

    </div>

    <script>
//                $(document).ready(){
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
                action: 'EditarHorario',
                InputEditAsig: $('#InputEditAsig').val()
            }, (data, status) => {
//                    document.write(data); 
                if (data === "vacio") {
//poner aqui las comprobaciones de lugar en caso de que no se encuentre el horario etc. 
                    $('#alertVacio').show();
                    $('#alertVacio').fadeTo(5000, 500).slideUp(3000, function () {
                        $('#alertVacio').slideUp(500);
                    });
                    
                    return;
                    
                }else if(data === 'nocoincidencia'){
                    $('#alertNC').show();
                    $('#alertNC').fadeTo(5000, 500).slideUp(3000, function () {
                        $('#alertNC').slideUp(500);
                    });
                    
                    return;
                    
                }else{
//                    document.write(data); return;
                    f = JSONtoUrl(data[0]);
//                    console.log(f);
                    window.location.href = '/horario/editII?action=editar&' + 'InputEditAsig=' + $('#InputEditAsig').val() + "&" + encodeURI(f);

                }
            });
        });
//                    };
    </script>
    <div class='alert alert-warning alertCondi3 container' id='alertVacio'>
        <button type='button' class='close' data-dismiss='alert'>x</button>
        <p><strong>Campo se encuentra vac&iacute;o para su petici&oacute;n, favor verificar eh intentar nuevamente.</strong></p>
    </div>
    <div class='alert alert-warning alertCondi3 container' id='alertNC'>
        <button type='button' class='close' data-dismiss='alert'>x</button>
        <p>No existe ning&uacute;n horario que cumpla con su petici&oacute;n</p>
    </div>


@endsection