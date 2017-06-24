@extends('layouts.base')
@section('content')
<div class='alert alert-danger ND alertsHorarios' id='alertNH'>
    <button type='button' class='close' data-dismiss='alert'>x</button>
    <p><strong></strong>No ha sido elegido ning&uacute;n horario</p>
</div>
            
<div class='alert alert-danger ND' id='alertDupli'>
    <button type='button' class='close' data-dismiss='alert'>x</button>
    <p>Ya existe un horario con este nombre</p>
</div>

<div class='alert ND alert-success' id='alertOk'>
    <button type='button' class='close' data-dismiss='alert'>x</button>
    <p>EL horario a sido creado</p>
</div>


<form class="CrearAsignaturaForm" onsubmit="return validar();" id="form">
    {{ csrf_field() }}
    <h2>Crear Horario</h2>
    <input type="text" hidden name="action" value="guardarHorario"> 

    <div action="" class="EAFR col-md-6 col-xs-6 col-lg-6">
        <!--                            <div class="col-xs-6">-->
        <label for="nombreHorario">Nombre Para Horario</label>
        <input id="nombreHorario" name="nombreHorario" type="text" class="form-control" placeholder="Eg. Autocad-01 o Fisica L8:30" autofocus required>
        <!--                            </div>-->
    </div>
    <div action="" class="EAFR col-md-6 col-xs-6 col-lg-6">
        <!--                            <div class="col-xs-6">-->
        <label for="aliasHorario">Alias Para Horario</label>
        <input id="aliasHorario" name="aliasHorario" type="text" class="form-control" placeholder="Eg. L8:30 M7:30" autofocus required>
        <!--                            </div>-->
    </div>


    <div class="diasHorarios">
        <div class="col-xs-6">
            <label for="lunes">Lunes</label>
            <input type="checkbox" id="lunes" class="">
            <div class="input-group col-xs-12">
                <span class="input-group-addon">De</span>
                <select class="form-control" id="lunesDe" name="lunesDe" disabled>
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

                <span class="input-group-addon">Hasta</span>
                <select class="form-control" name="lunesHasta" id="lunesHasta" disabled>
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

        <div class="col-xs-6">
            <label for="martes">Martes</label>
            <input type="checkbox" id="martes">
            <div class="input-group col-xs-12">

                <span class="input-group-addon">De</span>
                <select class="form-control" name="martesDe" id="martesDe" disabled>
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

                <span class="input-group-addon">Hasta</span>
                <select class="form-control" name="martesHasta" id="martesHasta" disabled>
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

        <div class="col-xs-6">
            <label for="miercoles">Miercoles</label>
            <input type="checkbox" id="miercoles">
            <div class="input-group col-xs-12">

                <span class="input-group-addon">De</span>
                <select class="form-control" name="miercolesDe" id="miercolesDe" disabled>
                    <option>7:00</option>
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

                <span class="input-group-addon">Hasta</span>
                <select class="form-control" name="miercolesHasta" id="miercolesHasta" disabled>
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

        <div class="col-xs-6">
            <label for="jueves">Jueves</label>
            <input type="checkbox" id="jueves">
            <div class="input-group col-xs-12">
                <span class="input-group-addon">De</span>
                <select class="form-control" name="juevesDe" id="juevesDe" disabled>
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

                <span class="input-group-addon">Hasta</span>
                <select class="form-control" name="juevesHasta" id="juevesHasta" disabled>
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

        <div class="col-xs-6">
            <label for="viernes">Viernes</label>

            <input type="checkbox" id="viernes">
            <div class="input-group col-xs-12">
                <span class="input-group-addon">De</span>
                <select class="form-control" name="viernesDe" id="viernesDe" disabled>
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

                <span class="input-group-addon">Hasta</span>
                <select class="form-control" name="viernesHasta" id="viernesHasta" disabled>
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

        <div class="col-xs-6">
            <label for="sabado">Sabado</label>
            <input type="checkbox" id="sabado">
            <div class="input-group col-xs-12">
                <span class="input-group-addon">De</span>
                <select class="form-control" name="sabadoDe" id="sabadoDe" disabled>
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

                <span class="input-group-addon">Hasta</span>
                <select class="form-control" name="sabadoHasta" id="sabadoHasta" disabled>
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

    <div class="col-xs-12 ckbotones" id="btnGH">
        <button type="button" class="btn btn-primary" id="guardarHorario"><span class="glyphicon glyphicon-floppy-save"></span> Guardar</button>
    </div>

</form>
<script>
    $(document).ready(function () {
        $('#btnGH').click((e) => {
            $.post('/exe', $("#form").serialize(), (l, k) => {
//                            document.write(l);
                if (l === 'NH') {
                    $('#alertNH').show();
                    $('#alertNH').fadeTo(3000, 500).slideUp(3000, function () {
                        $('#alertNH').slideUp(500);
                    });
                } else if (l === 'Dupli') {
                    $('#alertDupli').show();
                    $('#alertDupli').fadeTo(3000, 500).slideUp(3000, function () {
                        $('#alertDupli').slideUp(500);
                    });

                } else if(l='ok') {
//                                document.write("y klk");
                    $('#alertDupli').hide();
                    $('#alertNH').hide();
                    $('#alertOk').show();

                    $('#alertOk').fadeTo(1000, 500).slideUp(2000, function () {
                        $('#alertOk').slideUp(500, location.reload());
                    });

                }
            });

        });
    });
</script>

<script src="{{ asset('js/validacion.js') }}" ></script>

@endsection