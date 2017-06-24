@extends('layouts.base')

@section('content')

<link charset="UTF8" src="/js/jquery-ui/jquery-ui.min.css"></link>
<link type="text/css" rel="stylesheet" href="/js/jquery-ui/jquery-ui.css">
<script charset="UTF8" src="/js/jquery-ui/jquery-ui.js"></script>
<!--date time picker option    -->
<script charset="UTF8" src="/js/timepicker/js/hr.timePicker.min.js"></script>
<link type="text/css" rel="stylesheet" href="/js/timepicker/css/hr-timePicker.min.css">
    
    
<form id="formReposicion" class="">
        <h2>Formulario de Reposición</h2>
    
        <div class="alert alert-success alertFR1" id='AlertTB'>
            <button type="button" class="close" data-dismiss="alert">x</button>
            <p><strong> Horario de reposici&oacute;n creado exitosamente</strong></p>
        </div>
    
        <div class="alert alert-danger alertFR1" id='AlertIE'>
            <button type="button" class="close" data-dismiss="alert">x</button>
            <p>Ah ocurrido un error al insertar los datos, favor contactar al administrador</p>
        </div>
        <div class="alert alert-danger alertFR1" id='AlertCV'>
            <button type="button" class="close" data-dismiss="alert">x</button>
            <p><strong>No deben existir campos vacio</strong></p>
        </div>
        <div class="alert alert-danger alertFR1" id='AlertHE'>
            <button type="button" class="close" data-dismiss="alert">x</button>
            <p><strong>El horario seleccionado contiene un error</strong></p>
        </div>
        <div class="alert alert-danger alertFR1" id='AlertD'>
            <button type="button" class="close" data-dismiss="alert">x</button>
            <p><strong>Ya existe una reposici&oacute;n bajo un horario parecido, verifique no este cometiendo un error de duplicaci&oacute;n</strong></p>
        </div>
        <div class="alert alert-danger alertFR1" id='AlertNEC'>
            <button type="button" class="close" data-dismiss="alert">x</button>
            <p><strong>La clase seleccionada no existe</strong></p>
        </div>
    
    
    
        <input type="text" name="action" value="horarioReposicion" hidden="">
        <div class="blacked-reposicion">
    
            <input list="dataListA" type="text" class="form-control" id="nombreClase" placeholder="Nombre de la clase" name="nombreClase" autofocus="">
            <datalist id="dataListA"></datalist>
    
            <input type="text" name="diaDeReposicion" id="date2" class="form-control" placeholder="D&iacute;a para reposición">
    
            <script>
                $(function() {
                    $("#date2").datepicker();
                    //                        $("#date2").datepicker();
                });
    
            </script>
    
            <div class="diasHorario">
                <div class="input-group form-group reposicion">
                    <span class="input-group-addon">Hora de Entrada</span>
    
                    <select class="form-control" id="Entrada" name="Inicio">
                                                    <option selected disabled hidden=""></option>
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
    
                <div class="input-group form-group reposicion">
                    <span class="input-group-addon">Hora de Salida</span>
                    <select class="form-control" name="Salida" id="lunesHasta">
                                                    <option selected disabled hidden=""></option>
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
        <div>
            <div class="col-xs-12 ckbotones">
                <button type="reset" class="btn btn-primary">Limpiar</button>
    
                <button type="button" id="ButtonSend" class="btn btn-primary">Enviar</button>
            </div>
        </div>
    </form>


    <script>
        $(document).ready((e) => {

            $.post('/exe', {
                action: 'dataList',
                select: 'select Nombre FROM clases_creadas'
            }, (d, s) => {
                $('#dataListA').html(d);
                //                          document.write(d);
            });

            $('#ButtonSend').click((e) => {
                if ($("#nombreClase").val() === "" || $("#date2").val() === "") {
                    alert("No debe haber campos vacios");

                } else {
                    $.post('/exe',
                        $("#formReposicion").serialize()

                        , (d, s) => {
//                                                        document.write(d);


                            if (d === "insertError") {
                                $('#AlertIE').show();
                                FadeOut('#AlertIE');
                            } else if (d === "todobien") {
                                $('#AlertTB').show();
                                FadeOut('#AlertTB');
                                resetFields();

                            } else if (d === "camposVacios") {
                                $('#AlertCV').show();
                                FadeOut('#AlertCV');

                            } else if (d === "HE") {
                                $('#AlertHE').show();
                                FadeOut('#AlertHE');

                            } else if (d === "YaExiste") {
                                $('#AlertD').show();
                                FadeOut('#AlertD');

                            } else if (d === "noExisteClase") {
                                $('#AlertNEC').show();
                                FadeOut('#AlertNEC');

                            }
                        });
                }
            });

        })

    </script>
    <script>
        //                    h = "#AlertFR1";
        //                    document.write(h);
        FadeOut('#AlertFR1');

        function FadeOut(h) {
            $(h).fadeTo(8000, 500).slideUp(2000, function() {
                $(h).slideUp(300);
            });
        };

        function resetFields() {
            $('#formReposicion').find('input:text, input:password, input:file, select, textarea').val('');
            $('#formReposicion').find('input:radio, input:checkbox')
                .removeAttr('checked').removeAttr('selected');
        }

    </script>


@endsection