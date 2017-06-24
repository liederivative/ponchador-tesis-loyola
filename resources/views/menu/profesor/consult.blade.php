@extends('layouts.base')


@section('content')
<h2 class="h2EH">Listado General profesores</h2>    
    
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    $.post('/exe', {
        action: 'ProfList',

    }, (data, status) => {
        $("#tablaListado").html(data);
    });

</script>

<div class="scrollDivTable" id="tablaListado">
</div> 
       
      
       
     
    
       

@endsection