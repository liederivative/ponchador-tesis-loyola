<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Editar Profesor</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/Shadows.js"></script>
    <link rel="stylesheet" href="localStyles.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <?php include 'PHP/Shadows.php'?>

</head>

<body class="body1">
    <div class="container">
        <?php echo BarNav?>
               <h2 class="h2EH">Editar Profesor</h2>

            <div class="alert alert-info">
                <p><strong>Info Extra!</strong> Para traer el <b>Profesor</b> deseada introduzca <b>La matr&iacute;cula</b> en el cuadro de texto debajo</p>
            </div>


            <div class="container">
                <div class="Editar-Materia-Glyphicon">
                    <img src="img/icono-profesor.png" class="Img-Del-Asig">
                </div>

                <div action="" class="EditAsignaturaForm">
                    <div class="input-group">
                        <span class="input-group-addon"><a id="EyesConsulta"><span class="glyphicon glyphicon-eye-open" data-toggle="tooltip" title="" data-original-title="Inserte solo iniciales y consulte pulsando aquí">
<!--                        <script>$(document).ready(function(){$('[data-toggle="tooltip"]').tooltip();});</script>-->
                        </span>
                        </a>
                        </span>

                        <input list="dataList" id="InputEditAsig" class="form-control DFG" name="InputEditAsig" placeholder="Introduzca aqu&iacute; matr&iacute;cula. eg. 0058-8954" type="text" required autofocus>

                    </div> 
                    <datalist id="dataList">
                        
                    </datalist>
<!--                    en este deberia haber un autotext para prediccion w3s-->

                </div>
                <div class="col-xs-12 ckSLboton">

                    <button type="button" class="btn ckEditPensum" id="Editar">
                        <span class="glyphicon glyphicon-edit"></span> Editar
                    </button>

                </div>
                
                <script>
                    $.post('PHP/exe.php', {
                        action: 'dataList',
                        select: 'SELECT PMatricula, PNombre FROM proyecto_ponchador.Profesores'
                    }, (l, k) => {
//                                document.write(l);
                        $('#dataList').html(l);
                            });
                    
                    var tabla = [];
                    $('#EyesConsulta').click((e) => {
//                        $('#vacio01').hide();

                        $.post('PHP/exe.php', {
                            action: 'ConsultaEditarProfesor',
                            InputEditAsig: $('#InputEditAsig').val()
                        }, (data, status) => {
                            if(data==="vacio"){
                                
                                $('#vacio01').show();
                                $('#IP').hide();
                                vacioFadeOut();
                                return false;
                            }else{
                                $('#IP').show();
//                                $('#vacio').hide();
                                table = data;
                                $('#IP').html(data)}
                                //                                console.log(d);
                        })
                    });
                </script>
            </div>
            <div class="" id="IP">

            </div>

    
    <script>
        function JSONtoUrl(json) {
            var query = "";
            for (key in json) {
                console.log(key);
                query += encodeURIComponent(key) + "=" + encodeURIComponent(json[key]) + "&";
            }
            return query;
        }

        $('#Editar').click((e) => {
            
            if($('#InputEditAsig').val()===""){
                alert("El campo se encuentra vacio");
                return;
            }
//            console.log('soy un elemento')
            $.post('PHP/exe.php', {
                action: 'EditarProfesor',
                InputEditAsig: $('#InputEditAsig').val()
            }, (data, status) => {
                if (data === "nocoincidencia") {
                    //                        window.alert("No se encontro ninguna conincidencia con su peticio, favor verifique que existe este profesor en el listado general");
                    //                        document.write("la vida");
                    $('#fadeout').show();
                    desa();

                } else {
//                                            document.write(data);
//                    console.log(data);

                    f = JSONtoUrl(data[0]);
//                    //                console.log(f);
                    window.location.href = 'CrearProfesoresParaEditar.php?action=EP&' + 'PMatricula=' + $('#InputEditAsig').val() + "&" + encodeURI(f);
                }
            })
        });
    </script>
    <div class='alert alert-warning alertCondi3' id='fadeout'>
        <button type='button' class='close' data-dismiss='alert'>x</button>
        <p>No se encontro ninguna conincidencia con su peticio, favor verifique que <strong>existe este profesor</strong> en el listado general &oacute; que <strong>est&aacute; ingresando correctamente la matr&iacute;cula</strong></p>
    </div>
    
    <div class='alert alert-warning alertCondi3' id='vacio01'>
        <button type='button' class='close' data-dismiss='alert'>x</button>
        <p id="vacioIp">No se encontro ninguna conincidencia con su peticio, Para realizar la consulta</p>
    </div>

    <script>
        function desa() {
                $('#fadeout').fadeTo(8000, 500).slideUp(2000, function () {
                    $('#fadeout').slideUp(300);
                });
        };
        function vacioFadeOut(){
                $('#vacio01').fadeTo(8000, 500).slideUp(2000, function () {
                    $('#vacio01').slideUp(300);
                });
        };
    </script>
</div>
</body>

</html>