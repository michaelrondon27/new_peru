<?php
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		
		/////////////////////////////////////////////////////////////////////
		//	// FUNCIONES NATIVAS DE PHP UTILIZADAS EN ESTE CONTROLADOR //  //
		//		// isset -> evalua si la variable existe //                //
		//		// is_numeric -> evalua si la variable es numerica //      //
		//		// empty -> vrifica si la variable esta vacia //           //
		/////////////////////////////////////////////////////////////////////

		/////////////////////////////////////////////////////////////////////
		//	// VARIABLES GLOBALES UTILIZADADS EN ESTE CONTROLADOR //       //
		//		// HTML_DIR -> constante declarada en core/core.php //     //
		/////////////////////////////////////////////////////////////////////

	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	if(isset($_SESSION['app_id']) AND ($_users[$_SESSION['app_id']]['id_tipo_usu']==1 || $_users[$_SESSION['app_id']]['id_tipo_usu']==2)){
		$isset_id=isset($_GET['id']) AND is_numeric($_GET['id']) AND $_GET['id']>=1;
		require('core/models/classConfig.php');
		$configuracion=new Configuracion();
		switch (isset($_GET['mode']) ? $_GET['mode'] : null){

			/////////////////////////////////////////////////////////////////
			// case para editar la barra de navegacion //
			case 'Menu':
				if($_POST){
					if(!empty($_POST['nombre'])){
						$usuario=$_users[$_SESSION['app_id']]['usuario'];
						$configuracion->menu($usuario);
					}else{
						header("location: ?view=config&mode=Menu&error=1");	
					}
				}else{
					include(HTML_DIR.'configuracion/menu.php');
				}
				break;
			////////////////////////////////////////////////////////////////

			/////////////////////////////////////////////////////////////////
			// case para editar el inicio de sesion //
			case 'Inicio':
				if($_POST){
					if(!empty($_POST['nombre'])){
						$usuario=$_users[$_SESSION['app_id']]['usuario'];
						$configuracion->inicio($usuario);
					}else{
						header("location: ?view=config&mode=Inicio&error=1");	
					}
				}else{
					include(HTML_DIR.'configuracion/login.php');
				}
				break;
			/////////////////////////////////////////////////////////////////

			/////////////////////////////////////////////////////////////////
			// case para ver o agregar imagenes al carrusel //
			case 'Carrusel':
				if($_FILES){
					if(!empty($_FILES['imagen'])){
						$usuario=$_users[$_SESSION['app_id']]['usuario'];
						$configuracion->slider($usuario);
					}else{
						header("location: ?view=config&mode=Carrusel&error=1");	
					}
				}else{
					include(HTML_DIR.'configuracion/slider.php');
				}
				break;
			/////////////////////////////////////////////////////////////////

			/////////////////////////////////////////////////////////////////
			// case para eliminar imagenes del carrusel //
			case 'DeleteImagen':
				if($isset_id AND array_key_exists($_GET['id'], $_slider)){
					$usuario=$_users[$_SESSION['app_id']]['usuario'];
					$configuracion->DeleteImagen($usuario);
				}else{
					header('location: ?view=config&mode=Carrusel');
				}
				break;
			/////////////////////////////////////////////////////////////////

			///////////////////////////////////////////////////////////////////////
			// case para ver o agregar el año escolar //
			case 'Escolar':
				if($_POST){
					if(!empty($_POST['escolar'])){
						$usuario=$_users[$_SESSION['app_id']]['usuario'];
						$configuracion->AddEscolar($usuario);
					}else{
						header("location: ?view=config&mode=Escolar&error=1");	
					}
				}else{
					include(HTML_DIR.'configuracion/allEscolar.php');
				}
				break;
			//////////////////////////////////////////////////////////////////////

			///////////////////////////////////////////////////////////////////////////////////////////////////
			// case para editar el año escolar //
			case 'EditEscolar':
				if($isset_id AND array_key_exists($_GET['id'], $_escolar)){
					if($_POST){
						if(!empty($_POST['escolar'])){
							$usuario=$_users[$_SESSION['app_id']]['usuario'];
							$configuracion->EditEscolar($usuario);
						}else{
							header("location: ?view=config&mode=EditEscolar&id=".$_GET['id']."&error=1");	
						}
					}else{
						include(HTML_DIR.'configuracion/editEscolar.php');
					}					
				}else{
					header('location: ?view=config&mode=Escolar');
				}
				break;
			/////////////////////////////////////////////////////////////////////////////////////////////////

			////////////////////////////////////////////////////////////////////////////////
			// case para ver la pantalla para configurar los grados y las secciones //
			case 'GradoSecciones':
				include(HTML_DIR.'configuracion/allGradoSecciones.php');
				break;
			////////////////////////////////////////////////////////////////////////////////

			////////////////////////////////////////////////////////////////////////////////
			// case para agregar los grados //
			case 'AddGrado':
				if(!empty($_POST['grado'])){
					$usuario=$_users[$_SESSION['app_id']]['usuario'];
					$configuracion->AddGrado($usuario);
				}else{
					header("location: ?view=config&mode=GradoSecciones&error=1");	
				}
				break;
			////////////////////////////////////////////////////////////////////////////////

			///////////////////////////////////////////////////////////////////////////////////////////////
			// case para editar los grados //
			case 'EditGrado':
				if($isset_id AND array_key_exists($_GET['id'], $_grado)){
					if($_POST){
						if(!empty($_POST['grado'])){
							$usuario=$_users[$_SESSION['app_id']]['usuario'];
							$configuracion->EditGrado($usuario);
						}else{
							header("location: ?view=config&mode=EditGrado&id=".$_GET['id']."&error=1");	
						}
					}else{
						include(HTML_DIR.'configuracion/editGrado.php');
					}					
				}else{
					header('location: ?config=config&mode=GradoSecciones');
				}
				break;
			//////////////////////////////////////////////////////////////////////////////////////////////

			////////////////////////////////////////////////////////////////////////////////
			// case para agregar las secciones //
			case 'AddSeccion':
				if(!empty($_POST['seccion'])){
					$usuario=$_users[$_SESSION['app_id']]['usuario'];
					$configuracion->AddSeccion($usuario);
				}else{
					header("location: ?view=config&mode=GradoSecciones&error=1");	
				}
				break;
			////////////////////////////////////////////////////////////////////////////////

			///////////////////////////////////////////////////////////////////////////////////////////////
			// case para editar las secciones //
			case 'EditSeccion':
				if($isset_id AND array_key_exists($_GET['id'], $_seccion)){
					if($_POST){
						if(!empty($_POST['seccion'])){
							$usuario=$_users[$_SESSION['app_id']]['usuario'];
							$configuracion->EditSeccion($usuario);
						}else{
							header("location: ?view=config&mode=EditSeccion&id=".$_GET['id']."&error=1");	
						}
					}else{
						include(HTML_DIR.'configuracion/editSeccion.php');
					}					
				}else{
					header('location: ?config=config&mode=GradoSecciones');
				}
				break;
			//////////////////////////////////////////////////////////////////////////////////////////////

			///////////////////////////////////////////////////////////////////////////////////////////////
			// case para asignar las secciones //
			case 'AddAsignar':
				if(!empty($_POST['seccion']) && !empty($_POST['escolar']) && !empty($_POST['grado'])){
					$usuario=$_users[$_SESSION['app_id']]['usuario'];
					$configuracion->AddAsignar($usuario);
				}else{
					header("location: ?view=config&mode=GradoSecciones");	
				}
				break;
			//////////////////////////////////////////////////////////////////////////////////////////////

			///////////////////////////////////////////////////////////////////////////////////////////////
			// case para ver o agregar el grado de instruccion //
			case 'Instruccion':
				if($_POST){
					if(!empty($_POST['instruccion'])){
						$usuario=$_users[$_SESSION['app_id']]['usuario'];
						$configuracion->AddInstruccion($usuario);
					}else{
						header("location: ?view=config&mode=Instruccion&error=1");	
					}
				}else{
					include(HTML_DIR.'configuracion/instruccion.php');
				}
				break;
			//////////////////////////////////////////////////////////////////////////////////////////////

			///////////////////////////////////////////////////////////////////////////////////////////////
			// case para editar el grado de instruccion //
			case 'EditInstruccion':
				if($isset_id AND array_key_exists($_GET['id'], $_instruccion)){
					if($_POST){
						if(!empty($_POST['instruccion'])){
							$usuario=$_users[$_SESSION['app_id']]['usuario'];
							$configuracion->EditInstruccion($usuario);
						}else{
							header("location: ?view=config&mode=EditInstruccion&id=".$_GET['id']."&error=1");	
						}
					}else{
						include(HTML_DIR.'configuracion/editInstruccion.php');
					}					
				}else{
					header('location: ?config=config&mode=Instruccion');
				}
				break;
			//////////////////////////////////////////////////////////////////////////////////////////////

			///////////////////////////////////////////////////////////////////////////////////////////////
			// case para cerrar el año escolar //
			case 'CerrarEscolar':
				if($isset_id AND array_key_exists($_GET['id'], $_escolar)){
					$usuario=$_users[$_SESSION['app_id']]['usuario'];
					$configuracion->CerrarEscolar($usuario);				
				}else{
					header('location: ?config=config&mode=Escolar');
				}
				break;
			//////////////////////////////////////////////////////////////////////////////////////////////

			///////////////////////////////////////////////////////////////////////////////////////////////
			// case para editar el cupo //
			case 'EditCupos':
				if($isset_id AND array_key_exists($_GET['id'], $_cupos)){
					if($_POST){
						if(!empty($_POST['cupo'])){
							$usuario=$_users[$_SESSION['app_id']]['usuario'];
							$configuracion->EditCupos($usuario);
						}else{
							header("location: ?view=config&mode=EditCupos&id=".$_GET['id']."&error=1");	
						}
					}else{
						include(HTML_DIR.'configuracion/editCupos.php');
					}					
				}else{
					header('location: ?config=config&mode=GradoSecciones');
				}
				break;
			//////////////////////////////////////////////////////////////////////////////////////////////

			///////////////////////////////////////////////////////////////////////////////////////////////
			// case para agregar el cupo //
			case 'AddCupos':
				if(!empty($_POST['cupo']) && !empty($_POST['escolar']) && !empty($_POST['grado']) && !empty($_POST['seccion'])){
					$usuario=$_users[$_SESSION['app_id']]['usuario'];
					$configuracion->AddCupos($usuario);
				}else{
					header("location: ?view=config&mode=AddCupos&error=1");	
				}
				break;
			//////////////////////////////////////////////////////////////////////////////////////////////

			///////////////////////////////////////////////////////////////////////////////////////////////
			// case para ver contacto.php //
			case 'Contacto':
				include(HTML_DIR.'configuracion/contacto.php');
				break;
			//////////////////////////////////////////////////////////////////////////////////////////////

			/////////////////////////////////////////////////////////////////
			// case para agregar el manual //
			case 'Manual':
				if($_FILES){
					if(!empty($_FILES['documento'])){
						$usuario=$_users[$_SESSION['app_id']]['usuario'];
						$configuracion->Manual($usuario);
					}else{
						header("location: ?view=config&mode=Manual&error=1");	
					}
				}else{
					include(HTML_DIR.'configuracion/manual.php');
				}
				break;
			////////////////////////////////////////////////////////////////

			/////////////////////////////////////////////////////////////////
			// case para subir las notas //
			case 'Notas':
				if($_FILES){
					if(!empty($_FILES['csv'])){
						$usuario=$_users[$_SESSION['app_id']]['usuario'];
						$configuracion->Notas($usuario);
					}else{
						header("location: ?view=config&mode=Notas&error=1");	
					}
				}else{
					include(HTML_DIR.'configuracion/notas.php');
				}
				break;
			////////////////////////////////////////////////////////////////

			///////////////////////////////////////////////////////////////////////////////////////
			// enviar al usuario al index en caso de no caer en niguno de los case anteriores //
			default:
				header('location: ?view=index');
				break;
			//////////////////////////////////////////////////////////////////////////////////////
		}
	}else{
		header('location: ?view=index');
	}
?>