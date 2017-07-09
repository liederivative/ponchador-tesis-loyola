@extends('layouts.base')
@section('content')

<h2 class="h2EH">Consultar Horarios</h2>

    <!--
    <form method="post" action="" class="">
        <div class="container">
-->
    <div class="">
        <input list="dataList" type="text" class="EditAsignaturaForm form-control ckCarrera" placeholder="Introduzca o seleccione un horario" id="AHorarios" name="AHorarios">
        <datalist id="dataList">
            
        </datalist>
        

<!--
        <a href="#">
            <span class="glyphicon glyphicon-eye-open GF"></span>
        </a>
-->
    </div>


 
    <div class="col-xs-12 ckSLboton">
        <button class="btn btn-default btn-sm ckEditPensum" id="Consultar" name="Consultar">
            <span class="glyphicon glyphicon-eye-open"></span> Consultar
        </button>
        
        <br><br>
        <script>
            $(document).ready(function() {
//  $.ajaxSetup({ cache: false });
                        $.post('/exe',{
                            action: 'dataList',
                            select: 'SELECT Nombre, Alias FROM horarios_creados_linear'
                        }, (d,s)=>{
                            $('#dataList').html(d);
//                          document.write(d);
                                   });
});
            $('#Consultar').click((e) => {

                if(document.getElementById('AHorarios').value.length < 3){
                    location.reload();
                    
                    alert("Suministre más información para su selección")
                    return;
                    
                }
                
                $.post('/exe', {
                    action: 'Horarios',
                    AHorarios: $('#AHorarios').val()
                }, (data, status) => {
                    
                    $('#TableH').html(data)
//                    document.write(data);
                        //                            console.log(d);
                })
            });
        </script>
    </div>
    <!--            <input type="text" class="hide" name="action" value="Pensum">-->
    
    <div id="TableH" class="container">

    </div>
 


@endsection