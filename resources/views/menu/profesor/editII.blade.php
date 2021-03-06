@extends('layouts.base')


@section('content')
<?php    
        function CrearAsignatura($data){
            $data = trim($data);
            $data = stripcslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
    if($_GET['action'] == 'EP'){
        $fill['PNombre'] = urldecode($_GET['PNombre']);
         $fill['PApellido'] = urldecode($_GET['PApellido']);
        $fill['PCedula'] = urldecode($_GET['PCedula']);
        $fill['PMatricula'] = urldecode($_GET['PMatricula']);        
        $fill['PCelular'] = urldecode($_GET['PCelular']);
        
        $PTelefono = (isset($_GET['PTelefono'])?urldecode($_GET['PTelefono']):null);
        $PDireccion = (isset($_GET['PDireccion'])?urldecode($_GET['PDireccion']):null);
    }
?>

<form class="CrearProfesoresForm1" method="post" action="<?php echo htmlspecialchars("/exe ");?>">
           {{ csrf_field() }}
            <h2>Formulario Profesores</h2>
            <input type="text" hidden value="UpdateProfesor" name="action">
            <div class="col-xs-6 form-group">
                <label for="nombre" class="">Nombre</label>
                <input type="text" class="form-control" name="PNombre" placeholder="Nombre del profesor" value="<?php echo $fill['PNombre'];?>">
            </div>
            <div class="col-xs-6 form-group">
                <label for="apellido" class=" labelc1">Apellido</label>
                <input type="text" name="PApellido" placeholder="Apellido del profesor" class="form-control" value="<?php echo $fill['PApellido'];?>">
            </div>

            <div class="col-xs-6 form-group">
                <label for="PCedula" class="labelc1">Cédula</label>
                <input type="text" name="PCedula" placeholder="Cédula" class="form-control" value="<?php echo $fill['PCedula'];?>">
            </div>
            <div class="col-xs-6 form-group">
                <label for="PMatricula" class="labelc1">Identificaci&oacute;n del Profesor</label>
                <input type="text" name="PMatricula" placeholder="Matr&iacute;cula del profesor" class="form-control" value="<?php echo $fill['PMatricula'];?>">
            </div>
            <div class="col-xs-6 form-group">
                <label for="PTelefono" class="labelc1">Teléfono</label>
                <input type="tel" name="PTelefono" placeholder="Teléfono del profesor" class="form-control" value="<?php echo $PTelefono;?>">
            </div>
            <div class="col-xs-6 form-group">
                <label for="PCelular" class="labelc1">Celular</label>
                <input type="tel" name="PCelular" placeholder="Celular del profesor" class="form-control" value="<?php echo $fill['PCelular'];?>">
            </div>

            <div class="col-xs-12 form-group">
                <label for="direccion">Dirección</label>
                <textarea name="PDireccion" placeholder="Dirección del profesor" id="direccion" class="col-xs-12"><?php echo $PDireccion;?></textarea>
            </div>
            <!--
            <div class="col-xs-6">
                <label for="diponibilidad" class="cklabel">Disponibilidad</label>
                  <div class="ckblock">
                    <div class="col-xs-6">
                       <label for="lunes">Lunes</label>
                        <input type="checkbox" id="lunes" name="lunes" checked class="ckinputl">
                    </div>
                    <div class="col-xs-6">
                       <label for="martes">Martes</label>
                        <input type="checkbox" id="martes" name="martes" checked  class="ckinputm">
                    </div>
                    <div class="col-xs-6">
                       <label for="miercoles">Miercoles</label>
                        <input type="checkbox" id="miercoles" name="miercoles" checked class="ckinputmm">
                    </div>
                    <div class="col-xs-6">
                       <label for="jueves">Jueves</label>
                        <input type="checkbox" id="jueves" name="jueves" checked class="ckinputj">
                    </div>
                    <div class="col-xs-6">
                       <label for="viernes">Viernes</label>
                        <input type="checkbox" id="viernes" name="viernes" checked class="ckinputv">
                    </div>
                    <div class="col-xs-6">
                       <label for="sabado">Sabado</label>
                        <input type="checkbox" id="sabado" name="Sabados" checked class="ckinputs">
                    </div>
                  </div>
            </div>
-->
            <div class="col-xs-12 col-md-6 col-sm-6">
                <div class="panel panel-default">
                    <div class="panel-heading ckpanel">Disponibilidad</div>
                    <div class="panel-body">

                        <div class="ckblock">
                            <div class="col-xs-6">
                                <label for="lunes">Lunes</label>
                                <input type="checkbox" id="lunes" class="ckinputl" name="PL" <?php if($_GET[ 'DisponibilidadLunes']==1) {echo "checked";} ?> >
                            </div>
                            <div class="col-xs-6">
                                <label for="martes">Martes</label>
                                <input type="checkbox" id="martes" class="ckinputm" name="PM" <?php if($_GET[ 'DisponibilidadMartes']==1) {echo "checked";} ?> >
                            </div>
                            <div class="col-xs-6">
                                <label for="miercoles">Miercoles</label>
                                <input type="checkbox" id="miercoles" class="ckinputmm" name="PMM" <?php if($_GET[ 'DisponibilidadMiercoles']==1) {echo "checked";} ?> >
                            </div>
                            <div class="col-xs-6">
                                <label for="jueves">Jueves</label>
                                <input type="checkbox" id="jueves" class="ckinputj" name="PJ" <?php if($_GET[ 'DisponibilidadJueves']==1) {echo "checked";} ?> >
                            </div>
                            <div class="col-xs-6">
                                <label for="viernes">Viernes</label>
                                <input type="checkbox" id="viernes" class="ckinputv" name="PV" <?php if($_GET[ 'DisponibilidadViernes']==1) {echo "checked";} ?> >
                            </div>
                            <div class="col-xs-6">
                                <label for="sabado">Sabado</label>
                                <input type="checkbox" id="sabado" class="ckinputs" name="PS" <?php if($_GET[ 'DisponibilidadSabado']==1) {echo "checked";} ?> >
                            </div>
                        </div>



                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-md-6 col-sm-6">
                <div class="panel panel-default">
                    <div class="panel-heading ckpanel">Horario Disponible</div>
                    <div class="panel-body ckpanelbody">

                        <div class="ckblock">
                            <div class="col-xs-6">
                                <label for="diurno">Diurno</label>
                                <input type="checkbox" id="diurno" class="ckinputDD" name="PDD" <?php if($_GET[ 'HorarioDiurno']==1) {echo "checked";} ?> >
                            </div>
                            <div class="col-xs-6">
                                <label for="vespertino">Vespertino</label>
                                <input type="checkbox" id="vespertino" class="ckinputm" name="PDV" <?php if($_GET[ 'HorarioVespertino']==1) {echo "checked";} ?> >
                            </div>
                            <div class="col-xs-6">
                                <label for="nocturno">Nocturno</label>
                                <input type="checkbox" id="nocturno" class="ckinputmm" name="PDN" <?php if($_GET[ 'HorarioNocturno']==1) {echo "checked";} ?> >
                            </div>

                        </div>




                    </div>
                </div>
            </div>


            <div class="col-xs-12 ckbotonesE">

                <button type="submit" class="btn btn-primary">Actualizar</button>
                
                <a href="/home" class="btn btn-primary">Cancelar</a>
            </div>



        </form>





@endsection