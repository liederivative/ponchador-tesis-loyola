<?php


//Barra de navegacion Principal del proyecto//
define('BarNav','
    <nav class="navbar navbar-default">
        <div class="container-fluit">
            <div class="navbar-header">
                <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target="#menuNav">
                    <span class="sr-only">Bot&oacute;n de navegaci&oacute;n</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="home.php" class="navbar-brand"><span class="glyphicon glyphicon-home Sicon1"></span> PosibleLogo</a>

            </div>
            
            <div class="collapse navbar-collapse" id="menuNav">
                <ul class="nav navbar-nav">
                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">Asignatura<span class="caret"></span></a>
                    
                        <ul class="dropdown-menu">
                            
                            <li><a href="CrearAsignatura.php">Crear</a></li>
                            <li><a href="EditarAsignatura.php">Editar</a></li>
                            <li><a href="EliminarAsignatura.php">Eliminar</a></li>
                            <li><a href="Pensum.php">Consultar Asignaturas</a></li>
                        </ul>
                    </li>  
                    
                    <li class="drodown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">Profesor<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="CrearProfesores.php">Agregar</a></li>
                            <li><a href="EditarProfesores.php">Editar</a></li>
                        <!--    <li><a href="Estatus.php">Estatus</a></li> -->
                            <li><a href="ListadoGeneralProf.php">Listado General</a></li>
                        </ul>
                    </li>
<!--  ***********************************************  ***************************************************** -->
                    <li class="drodown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">Horario<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="CrearHorarios.php">Crear</a></li>
                            <li><a href="EditarHorarios.php">Editar</a></li>
                            <li><a href="EliminarHorario.php">Eliminar</a></li>
                            <li><a href="Horarios.php">Consultar</a></li>
                        </ul>
                    </li>
                    <li class="drodown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">Clases<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="Formularioreposicion.php">Reposicion</a></li>
                            <li><a href="../CrearClases.php">Crear Clase</a></li>
                            <li><a href="EditarClases.php">Editar Clase</a></li>
                            <li><a href="EliminarClase.php">Eliminar Clase</a></li>
                            <li><a href="ConsultarClase.php">Consultar Clases</a></li>
                        </ul>
                    </li>
<!--  ***********************************************  ***************************************************** -->
                    
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">Reportes<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Total</a></li>
                                <li><a href="#">Semi-Total</a></li>
                                <li><a href="Reports.php">Universidad</a></li>
                            </ul>
                    </li>
                </ul>
                <ul class="nav navbar-right navbar-nav">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"><span class="glyphicon glyphicon-cog Sicon"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Log-history</a></li>
                                <li><a href="#">Registrar Usuario</a></li>
                                <li><a href="#">Log Out</a></li>
                            </ul>
                    </li>
                </ul>
            </div>
            
        </div>
    </nav>');
/*
//seccion crear asignatura


//esta function deberia cambiar para un procesamiento exterson (sin server[php_self]).

function CrearAsignatura($data){
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

//validadion no requeridad en html5 el atributo required nos facilita la vida. ;p

    
//Comienzo de esta vaina
//formulario para crear asignatura, declaraciones y manejo
$FAsignatura = $FCodigoAsignatura = $FCicloAsignatura = $FCantidadCreditos = $FCarrera = $FAulaAsignatura = $FAsignaturaRequerido = $FCodigoAsignaturaRequerido = $FCicloAsignaturaRequerido = $FCantidadCreditosRequerido = $FCarreraRequerido = $FAulaAsignaturaRequerido = "";






if ($_SERVER["REQUEST_METHOD"]=="POST"){

    if (empty($_POST["FAsignatura"])){
        }else{$FAsignatura = CrearAsignatura.php($_POST["FAsignatura"]);}
    
     if (empty($_POST["FCodigoAsignatura"])) {
         $FCodigoAsignaturaRequerido = "EL campo C&oacute;digo Asignatura es requirido para guardar";
         } else {$FCodigoAsignatura = CrearAsignatura.php($_POST["FCodigoAsignatura"]);}
    
     if (empty($_POST["FCicloAsignatura"])) {
         $FCicloAsignaturaRequerido = "El ciclo al que pertenece la asignatura es requirido para guardar";
         }else{$FCicloAsignatura = CrearAsignatura.php($_POST["FCicloAsignatura"]);}
    
     if (empty($_POST["FCantidadCreditos"])) {
         $FCantidadCreditosRequerido = "Debe indicar la Cantidad de creditos de esta Asignatura";
         }else{$FCantidadCreditos = CrearAsignatura.php($_POST["FCantidadCreditos"]);}
    
     if (empty($_POST["FCarrera"])) {
         $FCarreraRequerido = "Los campos con (*) son requeridos para continuar";
         }else{$FCarrera = CrearAsignatura.php($_POST["FCarrera"]);}
}


*/
