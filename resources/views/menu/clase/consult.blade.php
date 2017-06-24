@extends('layouts.base')
@section('content')
<div class="title">
        <h1 class="">Listado de clases</h1>
    </div>
    <div class="toCenter">
        <div class="btn-group EditHorarioBlk">
            <div class="input-group">
                <span class="filtroClases">
                            <select class="btn selectCon" name="Campo-tabla" id="CTabla">
                                <option selected hidden disabled>Filtrar por</option>
                                <option value="clases_creadas.Nombre">Clase</option>
                                <option value="asignatura.ANombre">Asignatura</option>
                                <option value="profesores.PNombre">Profesor</option>
                                <option value="clases_creadas.NHorario">Horario</option>
                            </select>
        
                </span>
    
                <input list="dataList" id="CFiltro" class="form-control" name="CampoFiltro" placeholder="Introduzca palabras claves para el filtro" type="text" autofocus required>
    
            </div>
        </div>
    </div>
    <!--    <div class="container">-->
    <div class="todoDetalle" id="todoDetalle">
        <div class="panel panel-primary paneles-reportsR ND" id="d01">
            <div class="panel-heading"><strong>Información Sobre la Asignatura</strong></div>
            <div class="panel-body">
    
                <div id="TableA" class="">
    
                </div>
            </div>
        </div>
        <div class="panel panel-primary paneles-reportsR ND" id="d02">
            <div class="panel-heading"><strong>Información acerca del Docente</strong></div>
            <div class="panel-body">
    
                <div id="TableP" class="">
    
                </div>
            </div>
        </div>
        <div class="panel panel-primary paneles-reportsR ND" id="d03">
            <div class="panel-heading"><strong>Información Extra (Horario)</strong></div>
            <div class="panel-body">
    
                <div id="TableH" class="">
    
                </div>
            </div>
        </div>
    </div>
    
    <div class="panel panel-primary paneles-reportsR" id="d04">
        <div class="panel-heading"><strong></strong></div>
        <div class="panel-body">
    
            <!--                <div id="TableH" class="">-->
    
            <div id="presentacion">
            </div>
            <!--                </div>-->
        </div>
    </div>
    <!--    </div>-->
    
    
    <input type="hidden" id="limite" value="10">
    <script>
        $(document).ready(function() {

            $(window).scroll(function() {
                if ($(document).height() <= $(window).scrollTop() + $(window).height()) {
                    loadmore(0);
                }
            });

            function loadmore(te) {
                var q = Number($('#limite').val()) + 5;
                //                if(te != 1){
                //                var valor = $('#limite').val();  
                //                }else{var valor = $('#limite').val();}
                $('#limite').val(q);
                //                console.log($('#limite').val());
                //alert($('#Campo-tabla').val());
                $.post('/exe', {
                    action: 'ConsultaClaseLimit',
                    limite: q,
                    campo: $('#CTabla').val(),
                    filtro: $('#CFiltro').val(),
                    selector: te
                }, (d, s) => {
                    //se toma el contenido presente y se combina con el futuro
                    if(d==="dt"){
//                        Event.stopPropagation();
                    }else{
                        
                    $('#presentacion').html(d);
                    }
                });

            }
            loadmore(0);

            //this function call the ajax info when ASeccion and then ACodigo select luego input


            $(function() {
                //Carlos if select change => event to Acodigo
                $('#CTabla').change(function() {
                    //                var data = $(this).val();
                    fadeOut('#todoDetalle');
                    //                    $('#d01').hide();
                    //                    $('#d02').hide();
                    //                    $('#d03').hide();

                    console.log("primero columna");
                    $("#CFiltro").on('input', function() {
                        console.log("segundo input");
                        loadmore(1);
                    });

                });
            });

            //this function call the ajax info when ACodigo and then ASeccion input luego select

            $("#CFiltro").on('input', function() {
                console.log("primero input");

                $(function() {
                    //Carlos if select change => event to Acodigo
                    $('#CTabla').change(function() {
                        console.log("segundo columna");

                        loadmore(1);

                    });
                });
            });
        });

    </script>
    <script>
        function verDetalles(data) {

            //                    document.write('data');
                $('#todoDetalle').show();
            $('#limite').val(-100);


            $.post('/exe', {
                action: "verDetalles",
                selector: 1,
                campo: data
                //                filtro: $('#Campo-filtro').val()
            }, (d, s) => {
                //                document.write(d);
                $('#TableA').html(d);
                $('#d01').show();

                $.post('/exe', {
                    action: "verDetalles",
                    selector: 2,
                    campo: data

                }, (d, s) => {
                    $('#TableP').html(d);
                    $('#d02').show();

                    $.post('/exe', {
                        action: "verDetalles",
                        selector: 3,
                        campo: data
                    }, (d, s) => {
                        $('#TableH').html(d);
                        $('#d03').show();

                    });
                });
            });
        }

    </script>
    <script>
        function fadeOut(h) {
            //                document.write(h);
            $(h).fadeTo(1000, 500).slideUp(2000, function() {
                $(h).slideUp(300);
            });
        };

    </script>


@endsection
