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
                                <option hidden disabled>Filtrar por</option>
<!--                                <option value="clases_creadas.Nombre">Clase</option>-->
                                <option selected value="ANombre">Asignatura</option>
                                <option value="PNombre">Profesor</option>
                                <option value="NHorario">Horario</option>
                            </select>
        
                </span>
    
                <input list="dataList" id="CFiltro" class="form-control" name="CampoFiltro" placeholder="Introduzca palabras claves para el filtro" type="text" autofocus required>
    
            </div>
        </div>
        <datalist id="dataList">
            
        </datalist>
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
        //****************************************************************************************
//load datalist depending of the option selected
//                            console.log('i am goot');
                function dataList(){
                    $.post('/exe',{
                        action: 'dataList',
                        select: $('#CTabla').val(),
                    }, (d,s)=>{
                            $('#dataList').html(d);
                        });
                }

$(document).ready(function() {
            
//****************************************************************************************
// when the data is too much the limit depend of the input id='limite'         
            $(window).scroll(function() {
                if ($(document).height() <= $(window).scrollTop() + $(window).height()) {
                    loadmore(0);
                }
            });
//****************************************************************************************

            function loadmore(te) {
                var q = Number($('#limite').val()) + 5;
                
                $('#limite').val(q);
                
                    console.log('i am goot');
                
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

//****************************************************************************************
// Triggers for dataList
            $(function() {
                //Carlos if select change => event to Acodigo
                $('#CTabla').change(function() {

                    fadeOut('#todoDetalle');
                    $('#CFiltro').val('');
                    dataList();
//****************************************************************************************
//trigger focus on search bar                     
                    $("#CFiltro").on('input', function() {
                        loadmore(1);
                    });

                });
            });
//****************************************************************************************
//initial datalist data
                    $.post('/exe',{
                        action: 'dataList',
                        select: $('#CTabla').val(),
                    }, (d,s)=>{
                            $('#dataList').html(d);
                        });
//****************************************************************************************
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
//****************************************************************************************
//Load data about every classes; in the first time we can't see the function trigger beacuese it come with the initial data load from database and formatted with the /exe.php. used a devtool to see what i load or go diretly to /exe.php and analize the code.
        
        function verDetalles(data) {

//                                document.write(data);
                $('#todoDetalle').show();
            $('#limite').val(-100);


            $.post('/exe', {
                action: "verDetalles",
                selector: 1,
                campo: data,

                //                filtro: $('#Campo-filtro').val()
            }, (d, s) => {
                //                document.write(d);
                $('#TableA').html(d);
                $('#d01').show();

                $.post('/exe', {
                    action: "verDetalles",
                    selector: 2,
                    campo: data,


                }, (d, s) => {
                    $('#TableP').html(d);
                    $('#d02').show();

                    $.post('/exe', {
                        action: "verDetalles",
                        selector: 3,
                        campo: data,

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
