@extends('layouts.base')
@section('content')

<h2 class="h2EH">Editar Clase</h2>
    <?php if(isset($_GET['A'])){
    if($_GET['A']==='$s%p%'){
        echo "
                <div class='alert alert-success ND' id='alertTodoBien' >
        <p><strong>Acceso: </strong>Se ha Actualizado la clase de manera correcta.</p>
    </div>
        
    <script>
                $(document).ready(function () {
                    //$('#alertTodoBien').animate({
                    //top: 300
                    //});
                    
                    $('#alertTodoBien').fadeTo(5000, 500).slideUp(3000, function () {
                        $('#alertTodoBien').slideUp(500);
                    });
                })
    </script>
        ";
    }
    }
    ?>        
    
    <div class="alert alert-success ND" id="alertTodoBien" >
        <p><strong>Acceso: </strong>Se ha Actualizado la clase de manera correcta.</p>
    </div>
    <!--
        <div class="alert alert-danger" id="infosE">
            <button type='button' class='close closeA' data-dismiss='alert'>x</button>
            <p><strong>Info Extra!</strong> Esta a punto de entrar al formulario de una asignatura con el fin de eliminarle. </p>
        </div>
    -->
    <script>
        //                $('#infosE').fadeTo(5000, 500).slideUp(3000, function () {
        //                    $('#infosE').slideUp(500);
        //                });
    
    </script>
    
    
    <!--
        <div>
            <p>Esta pagina debe traer el mismo form utilizado para crear una materia pero desde ser desde la db para un UPDATE</p>
        </div>
    -->
    
    <!--            <div class="">-->
    <!--
        <div class="img-clase">
            <img src="img/schedule.ico" class="Img-Del-Asig">
        </div>
    -->
    
    <div action="" class="EditAsignaturaForm">
        <input list="claseDataList" type="text" id="InputEditHorario" class="form-control" placeholder="Introduzca el Nombre de la clase" required autofocus>
    </div>
    <datalist id="claseDataList">
    
            </datalist>
    
    <div class="col-xs-12 ckSLboton">
    
        <button type="button" class="btn ckEditPensum2" data-toggle="modal" data-target="#myModal" id="editar">
                    <span class="glyphicon glyphicon-edit"></span> Editar
                </button>
    
    </div>
    
    <!--            </div>-->

    <!-- Trigger the modal with a button -->
    <!--    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>-->

    <!-- Modal -->
<!--
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

             Modal content
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" color="red">Esta a Punto de eliminar la asinatura siguiente</h4>
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
-->

    <script>
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }

        });
        function JSONtoUrl(json) {
            var query = "";
            for (key in json) {
                console.log(key);
                query += encodeURIComponent(key) + "=" + encodeURIComponent(json[key]) + "&";
            }
            return query;
        }
        $.post('/exe', {
            action: 'dataList',
            select: 'SELECT Nombre FROM clases_creadas'
        }, (d, s) => {
            $('#claseDataList').html(d);
            //           document.write(d);
        });

        $('#editar').click((e) => {
//            alert("estoy aqui");
            if ($('#InputEditHorario').val() == "") {

                alert("Debe introducir el nombre de un horario");
                event.stopPropagation();

            } else {
//                var tabla = [];
//                alert("dd");
                //                $('#editar').click((e) => {
                //                window.location.href = '/exe';
                $.post('/exe', {
                    action: 'EditarClase',
                    InputEditHorario: $('#InputEditHorario').val()
                }, (d, s) => {
//                alert(d);  
//                    document.write(d); 
//                    event.stopPropagation();
                    
                    if (d === "nocoincidencia") {
                        alert("No existen coincidencias con el nombre ingresado");
                    } 
                    else {
//alert(d);
                        f = JSONtoUrl(d[0]);
                        //                    console.log(f);
                        window.location.href = '/clase/editII?action=editarClase&' + 'InputEditHorario=' + $('#InputEditHorario').val() + "&" + encodeURI(f);
                    }

       
                });
            }
        });

    </script>

@endsection