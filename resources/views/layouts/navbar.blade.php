<nav class="navbar navbar-default">
        <div class="container-fluit">
            <div class="navbar-header">
                <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target="#menuNav">
                    <span class="sr-only">Bot&oacute;n de navegaci&oacute;n</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="/home" class="navbar-brand"><span class="glyphicon glyphicon-home Sicon1"></span> SIDACOE</a>

            </div>
            
            <div class="collapse navbar-collapse" id="menuNav">
                <ul class="nav navbar-nav">
                   
                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">Asignatura<span class="caret"></span></a>
                    
                        <ul class="dropdown-menu">
                            @permission('create')
                            <li><a href="/asignatura/create">Crear</a></li>
                            @endpermission
                            
                            @permission('edit')
                            <li><a href="/asignatura/edit" >Editar</a></li>
                            @endpermission
                            
                            @permission('delete')
                            <li><a href="/asignatura/delete" >Eliminar</a></li>
                            @endpermission
                            
                            @permission('consult')
                            <li><a href="/asignatura/consult" >Consultar Asignaturas</a></li>
                            @endpermission
                        </ul>
                    </li>  
                    
                    <li class="drodown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">Profesor<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                           @permission('create')
                            <li><a href="/profesor/create">Agregar</a></li>
                            @endpermission
                            
                            @permission('edit')
                            <li><a href="/profesor/edit">Editar</a></li>
                            @endpermission
                            
                            @permission('consult')
                            <li><a href="/profesor/consult" >Listado General</a></li>
                            @endpermission
                        </ul>
                    </li>
<!--  ***********************************************  ***************************************************** -->
                    <li class="drodown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">Horario<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                           @permission('create')
                            <li><a href="/horario/create" >Crear</a></li>
                            @endpermission
                            
                            @permission('edit')
                            <li><a href="/horario/edit" >Editar</a></li>
                            @endpermission
                            
                            @permission('delete')
                            <li><a href="/horario/delete" >Eliminar</a></li>
                            @endpermission
                            
                            @permission('consult')
                            <li><a href="/horario/consult" >Consultar</a></li>
                            @endpermission
                            
                        </ul>
                    </li>
                    <li class="drodown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">Clases<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                           @permission('retake')
                            <li><a href="/clase/retake" >Reposicion</a></li>
                            @endpermission
                            
                            @permission('create')
                            <li><a href="/clase/create">Crear Clase</a></li>
                            @endpermission
                            
                            @permission('edit')
                            <li><a href="/clase/edit">Editar Clase</a></li>
                            @endpermission
                            
                            @permission('delete')
                            <li><a href="/clase/delete">Eliminar Clase</a></li>
                            @endpermission
                            
                            @permission('consult')
                            <li><a href="/clase/consult">Consultar Clases</a></li>
                            @endpermission
                        </ul>
                    </li>
<!--  ***********************************************  ***************************************************** -->
                    
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">Reportes<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Total</a></li>
                                <li><a href="#">Semi-Total</a></li>
                                @permission('univerity@endpermission')
                                <li><a href="/report/university">Universidad</a></li>
                                @endpermission
                            </ul>
                    </li>
                    @role(['admin','root'])
                    <li class="dropdown">
                        <a href="/admin/#/" class="dropdown-toggle" role="button">Admin Console</a>
                    </li>
                    @endrole
                    
                </ul>
                
                <ul class="nav navbar-right navbar-nav">
                   <li class="dropdown">
                    <a href="#">{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</a>
                   </li>
                    <li class="dropdown">
                       
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"><span class="glyphicon glyphicon-cog Sicon"></span></a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    
                                </li>
                            </ul>
                    </li>
                </ul>
            </div>
            
        </div>
    </nav>