@extends('layouts.base')


@section('content')
<h2 class="h2EH">Listado General profesores</h2>    


<div class="scrollDivTable" id="tablaListado">
</div> 
       
      
       
     
    
<script type="text/javascript">
    function trimText(keyword,item,t){
        var text = [];
        for(var x = 0; x < t.length;x++){
            var index = t[x];
            if(item[index]){
                text.push( index.replace(keyword,'') );
            }
        }
        return text; 
    }
    function diasSemana(item){
        t = ['DisponibilidadLunes','DisponibilidadMartes','DisponibilidadMiercoles','DisponibilidadJueves','DisponibilidadViernes','DisponibilidadSabado'];
        return trimText('Disponibilidad',item,t);
    }
    function horario(item){
        t = ['HorarioDiurno','HorarioVespertino','HorarioNocturno'];
        return trimText('Horario',item,t);
    }
    $('document').ready(()=>{
        
        $.ajaxSetup({
        headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    $.post('/exe', {
        action: 'ProfList',

    }, (data, status) => {
        console.log(data);
        $table = $('<table/>');
        $table.addClass('table table-condensed table-bordered table-reports table-profList');
        $table.append('<thead><tr>'+
                      '<th> Nombre</th>'+
                      '<th> Apellido</th>'+
                      '<th> Celular</th>'+
                      '<th> Direccion</th>'+
                      '<th> Estado</th>'+
                      '<th> Matricula</th>'+
                      '<th> Telefono</th>'+
                      '<th> Disponibilidad</th>'+
                      '<th> Horario</th>'+
                      '</tr></thead>'
                     )
        $table.append(
            $.map(data, function (item, index) {
                console.log(item);
                var start = '<tbody><tr>';
                start += '<td>'+ item.Nombre +'</td>';
                start += '<td>'+ item.Apellido +'</td>';
                start += '<td>'+ item.Celular +'</td>';
                start += '<td>'+ item.Direccion +'</td>';
                start += '<td>'+ item.Estado +'</td>';
                start += '<td>'+ item.Matricula +'</td>';
                start += '<td>'+ item.Telefono +'</td>';
                start += '<td>'+ diasSemana(item).join(',') +'</td>';
                start += '<td>'+ horario(item).join(',') +'</td>';
                start += '</tr></tbody>'
                return start;
        }).join());
//        for(var x=0; x<data.length;x++){
//            $tableRow = $('<tr></tr>');
//            
//            $tableData = 
//        }
        $("#tablaListado").append($table);
//            .html(data);
    });

    })
    
</script>
       

@endsection