@extends('layouts.base')


@section('content')

<?php 
    
        
        function CrearAsignatura($data){
            $data = trim($data);
            $data = stripcslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        
        
    ?>

         <form method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars(" /exe ");?>" class="CrearAsignaturaForm" onsubmit="return validar();">
           {{ csrf_field() }}
            <h2 class="title" >Formulario Asignatura</h2>

            <input type="text" class="hide" name="action" value="asig">
            <div class="col-xs-6 form-group">
                <label for="asignatura" class="">Asignatura<span class="Requerido"> *</span></label>
                <input type="text" class="form-control" name="FAsignatura" placeholder="Nombre de Asignatura" id="asignatura"  maxlength="30" required autofocus />

            </div>

            <div class="col-xs-6 form-group">
                <label for="CodigoAsignatura" class="">C&oacute;digo de Asignatura<span class="Requerido"> *</span></label>
                <input type="text" class="form-control" id="CodigoAsignatura" placeholder="e.g. mkz-224" name="FCodigoAsignatura" maxlength="10" required />

            </div>
            <div class="col-xs-6 form-group">
                <label for="CicloAsignatura" class="">Ciclo de la Asignatura<span class="Requerido"> *</span></label>
                <input type="number" class="form-control" name="FCicloAsignatura" id="CicloAsignatura" placeholder="Ciclo al que pertence la asig." min="1" max="20" required />

            </div>

            <div class="col-xs-6 form-group">
                <label for="CantidadCreditos" class="">Cantidad de Creditos<span class="Requerido"> *</span></label>
                <input type="number" class="form-control" name="FCantidadCreditos" id="CantidadCreditos" placeholder="Creditos de la materia" required min="1" max="10"/>

            </div>

-->
            <div class="col-xs-6 form-group">
                <label for="Carrera" class="">Carrera<span class="Requerido"> *</span></label>
                <select class="form-control" name="FCarrera" id="carrera">
                    <option value="" selected disabled hidden>Escoja una Carrera</option>
                    <option value="1" >R&amp;T</option>
                    <option value="2" >Agroindustrial</option>
                    <option value="3" >Electrica</option>
                    <option value="4" >Industrial</option>
                </select>

            </div>

            <div class="col-xs-6 form-group">
                <label for="Carrera" class="">Sección<span class="RequeridoText"> opcional</span></label>
                <select class="form-control" name="FSeccion" id="FSeccion">
                    <option value="001" selected>Sección 01</option>
                    <option value="002" >Sección 02</option>
                    <option value="003" >Sección 03</option>
                    <option value="004" >Sección 04</option>
                </select>
            </div> 


            <div class="col-xs-12">

                <label for="TieneLab" id="TieneLabLabel">Laboratorio</label>
                <input type="checkbox" name="TieneLab" id="TieneLab" class="">

            </div>


            <div class="col-xs-12 ckbotones">
                <button type="reset" class="btn btn-primary">Limpiar</button>

                <button type="submit" class="btn btn-primary">Enviar</button>

            </div>

        </form>
        <script src="{{ asset('js/validacion.js') }}" ></script>
   
@endsection