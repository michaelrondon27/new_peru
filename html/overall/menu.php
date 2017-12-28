<!-- start: Header -->
<nav class="navbar navbar-default header navbar-fixed-top">
    <div class="col-md-12 nav-wrapper">
        <div class="navbar-header" style="width:100%;">
            <div class="opener-left-menu is-open">
                <span class="top"></span>
                <span class="middle"></span>
                <span class="bottom"></span>
            </div>
            <a href="?view=index" class="navbar-brand"> 
                <b><?php echo $_menu[1]['nombre'];?></b>
            </a>
            <ul class="nav navbar-nav navbar-right user-nav">
                <li class="user-name"><span><i class="fa fa-user" aria-hidden="true"></i> <?php echo $_users[$_SESSION['app_id']]['nombre']." ".$_users[$_SESSION['app_id']]['apellido'];?></span></li>
                <li class="dropdown avatar-dropdown" style="margin-right: 10px;">
                	<img src="asset/images/<?php echo $_users[$_SESSION['app_id']]['foto'];?>" class="img-circle avatar" alt="user name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"/>
                	<ul class="dropdown-menu user-dropdown">
                   		<li><a href="?view=user&mode=MiPerfil&id=<?php echo $_users[$_SESSION['app_id']]['id_usuario'];?>"><span class="fa fa-user"></span> Mi Perfil</a></li>
                   		<li><a href="?view=logout"><span class="fa fa-power-off"></span> Cerrar Sesión</a></li>
                   		<!--<li role="separator" class="divider"></li>
                   		<li class="more">
                   			<ul>
                      			<li><a href=""><span class="fa fa-cogs"></span></a></li>
                       			<li><a href=""><span class="fa fa-lock"></span></a></li>
                       			<li><a href=""><span class="fa fa-power-off "></span></a></li>
                   			</ul>
                   		</li>-->
                	</ul>
                </li>
                <!--<li ><a href="#" class="opener-right-menu"><span class="fa fa-coffee"></span></a></li>-->
            </ul>
        </div>
    </div>
</nav>
<!-- end: Header -->
<div class="container-fluid mimin-wrapper">
    <!-- start:Left Menu -->
    <div id="left-menu">
        <div class="sub-left-menu scroll">
            <ul class="nav nav-list">
                <li><div class="left-bg"><img src="asset/images/<?php echo $_menu[1]['logo'];?>"></div></li>
                <!--<li class="time">
                    <h1 class="animated fadeInLeft">21:00</h1>
                    <p class="animated fadeInRight">Sat,October 1st 2029</p>
                </li>-->
                <br><br><br><br><br>
                <li id="inicio" class="ripple"><a href="?view=index" class='navegacion'><span class="fa-home fa color-teal"></span>Inicio</a></li>
                <li class="ripple">
                    <a class="tree-toggle nav-header" id="registro">
    	                <span class="fa fa-id-card-o color-teal"></span> Registrar
                        <span class="fa-angle-right fa right-arrow text-right"></span>
                    </a>
                    <ul class="nav nav-list tree">
                        <li><a href="?view=alumno&mode=AddAlumno">Alumno</a></li>
                        <li><a href="?view=representante&mode=AddMadre">Madre</a></li>
                        <li><a href="?view=representante&mode=AddPadre">Padre</a></li>
                        <li><a href="?view=representante&mode=AddLegal">Representante Legal</a></li>
                        <li><a href="?view=representante&mode=AddSuplente">Representante Suplente</a></li>
                    </ul>
                </li>
                <li class="ripple">
                    <a class="tree-toggle nav-header" id="inscripcion">
                        <span class="fa fa-address-book-o color-teal"></span> Inscripciones
                        <span class="fa-angle-right fa right-arrow text-right"></span>
                    </a>
                    <ul class="nav nav-list tree">
                        <li><a href="?view=inscripcion&mode=AddInscripcion">Nueva Inscripción</a></li>
                        <li><a href="?view=inscripcion&mode=AddRegulares">Inscripción Regulares</a></li>
                    </ul>
                </li>
                <li class="ripple">
                    <a class="tree-toggle nav-header" id="consulta">
        	            <span class="fa fa-search color-teal"></span> Consultar
                        <span class="fa-angle-right fa right-arrow text-right"></span>
                    </a>
                    <ul class="nav nav-list tree">
                        <li><a href="?view=alumno&mode=AllAlumno" class='navegacion'>Alumnos</a></li>
                        <li><a href="?view=inscripcion&mode=AllInscrito" class='navegacion'>Inscritos</a></li>
                        <li><a href="?view=representante&mode=AllMadre" class='navegacion'>Madre</a></li>
                        <?php
                            if($_users[$_SESSION['app_id']]['id_tipo_usu']==1 || $_users[$_SESSION['app_id']]['id_tipo_usu']==2){
                                ?>
                                    <li><a href="?view=inscripcion&mode=AllNotas" class='navegacion'>Notas</a></li>
                                <?php
                            }
                        ?>
                        <li><a href="?view=representante&mode=AllPadre" class='navegacion'>Padre</a></li>
                        <li><a href="?view=representante&mode=AllLegal" class='navegacion'>Representante Legal</a></li>
                        <li><a href="?view=representante&mode=AllSuplente" class='navegacion'>Representante Suplente</a></li>
                    </ul>
                </li>
                <?php
                    if($_users[$_SESSION['app_id']]['id_tipo_usu']==1){
                        ?>
                            <li class="ripple">
                                <a class="tree-toggle nav-header" id="usuario">
                                    <span class="fa fa-users color-teal"></span> Usuarios  
                                    <span class="fa-angle-right fa right-arrow text-right"></span> 
                                </a>
                                <ul class="nav nav-list tree">
                                    <li><a href="?view=user&mode=addUsuario" class='navegacion'>Nuevo Usuario</a></li>
                                    <li><a href="?view=user&mode=allUsuarios" class='navegacion'>Consultar Usuarios</a></li>
                                </ul>
                            </li>
                        <?php
                    }
                    if($_users[$_SESSION['app_id']]['id_tipo_usu']==1 || $_users[$_SESSION['app_id']]['id_tipo_usu']==2){
                        ?>
                            <li class="ripple">
                            	<a class="tree-toggle nav-header" id="configuracion">
                            		<span class="fa fa-cog color-teal"></span>Configuración
                            		<span class="fa-angle-right fa right-arrow text-right"></span> 
                            	</a>
                                <ul class="nav nav-list tree">
                                    <?php
                                        if($_users[$_SESSION['app_id']]['id_tipo_usu']==1){
                                            ?>
                                                <li><a href="?view=config&mode=Menu" class='navegacion'>Barra de Navegación</a></li>
                                                <li><a href="?view=config&mode=Inicio" class='navegacion'>Inicio de Sesión</a></li>
                                                <li><a href="?view=config&mode=Carrusel" class='navegacion'>Carrusel de Imagenes</a></li>
                                                <!--<li><a href="?view=config&mode=Manual" class='navegacion'>Subir Manual</a></li>-->
                                                <li><a href="?view=config&mode=Notas" class='navegacion'>Subir Notas</a></li>
                                            <?php
                                        }
                                    ?>
                                    <li><a href="?view=config&mode=Escolar" class='navegacion'>Año Escolar</a></li>
                                    <li><a href="?view=config&mode=GradoSecciones" class='navegacion'>Grados, Secciones y Cupos</a></li>
                                    <li><a href="?view=config&mode=Instruccion" class='navegacion'>Grados de Instrucción</a></li>
                                </ul>
                            </li>
                        <?php
                    }
                ?>
                <li class="ripple">
                    <a class="tree-toggle nav-header" id="consulta">
                        <span class="fa fa-question-circle-o color-teal"></span> Ayuda
                        <span class="fa-angle-right fa right-arrow text-right"></span>
                    </a>
                    <ul class="nav nav-list tree">
                        <li><a href="?view=config&mode=Contacto" class='navegacion'>Contacto</a></li>
                        <li><a href="asset/<?php echo $_menu[3]['logo'];?>" download="asset/<?php echo $_menu[3]['logo'];?>" class='navegacion'>Manual</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <!-- end: Left Menu -->