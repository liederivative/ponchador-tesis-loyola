@extends('layouts.base')
@section('content')

<h2 class="h2EH" >Formulario Para eliminar Clase</h2>
    
    <div class="alert alert-success ND" id="AlertSS">
        <p><strong>Asignatura ha sida eliminada</strong></p>
    </div>
    <div class="alert alert-success ND" id="alertE">
        <p><strong>Al parecer algo esta mal, de continuar así comunicarse con su Departamento de TI.</strong></p>
    </div>
    <!-- 
        <div>
            <p>Esta pagina debe traer el mismo form utilizado para crear una materia pero desde ser desde la db para un UPDATE</p>
        </div>
    -->
    
        <div class="container">
            <!--            <div class="Eliminar-Materia-Imagen">-->
            <img src="/img/delete.png" class="Img-Del-Asig">
            <!--            </div>-->
    
            <div action="" class="EditAsignaturaForm">
                <input list="claseList" type="text" id="InputEliminarClase" class="form-control" placeholder="Introduzca el Nombre. eg. 'calculo II, sec 1'" required autofocus >
            </div>
            <datalist id="claseList">
                
            </datalist>
    
            <div class="col-xs-12 ckSLboton">
    
                <button type="button" class="btn btn-danger ckEditPensum2" data-toggle="modal" data-target="#myModal" id="Eliminar">
                    <span class="glyphicon glyphicon-edit"></span> Eliminar Clase
                </button>
    
            </div>
    
        </div>

    <!-- Trigger the modal with a button -->
    <!--    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>-->

    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" color="red">Esta a Punto de eliminar la siguiente clase</h4>
                </div>
                <div class="modal-body jcnevula" id="modal-body">

                </div>
                <div class="modal-footer">
                    <p class="ModalText" id="ES">Está seguro?</p>
                    <button type="button" id="Aceptar" class="btn btn-default aceptar01" data-dismiss="modal">Si estoy seguro</button>

                    <button type="button" id="Cancelar" class="btn btn-default cancelar01" data-dismiss="modal">No lo estoy</button>
                    
                    <button type="button" id="salir" class="btn btn-default cancelar01 hide" data-dismiss="">Salir</button>

                </div>

            </div>

        </div>
    </div>

    <script>
         $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }

        });
       $.post('/exe',{
           action: 'dataList',
           select: 'select Nombre from clases_creadas'
       }, (d,s)=>{
           $('#claseList').html(d);
//           document.write(d);
       });
        
        $('#Eliminar').click((e) => {
//           $('#salir').show();
            if ($('#InputEliminarClase').val() == "") {

                alert("Debe introducir el nombre de una clase");
                event.stopPropagation();

            }else{
                var tabla = [];
                //                $('#Eliminar').click((e) => {
//                window.location.href = '/exe';
                $.post('/exe', {
                        action: 'EliminarClaseConsulta',
                        InputEliminarClase: $('#InputEliminarClase').val()
                    }, (data, status) => {
                        if(data==="fail"){
                            $('#ES').hide();
                            $('#Aceptar').hide();
                            $('#Cancelar').hide();
//                            $('#salir').show();
                         $('#modal-body').html("<strong class='jcnevula'>Datos introducidos no son validos para eliminar Clase</strong>")   
                            
                            
//                            document.write(data);
                        }else{
                            $('#ES').show();
                            $('#Aceptar').show();
                            $('#Cancelar').show();
//                            $('#salir').show();
                            
                        table = data;
                        $('#modal-body').html(data)
                        }
              
                    })
                    //                });
            }
        });

        var tabla = [];
        $('#Aceptar').click((e) => {
            console.log($('#InputEliminarClase').val());
            $.post('/exe', {
                action: 'EliminarClase',
                InputEliminarClase: $('#InputEliminarClase').val()
                
            },(data, status) => {
//                document.write(data);
//                Event.stopPropagation();
                if(data==="ss"){
                    $('#AlertSS').show();
//                    document.write(data);
                    $('#InputEliminarClase').val("");
                    

                    
                } else {
                    
                    $('#alertE').show();
                }
            })
//            location ='/exe';
        });
    </script>

@endsection