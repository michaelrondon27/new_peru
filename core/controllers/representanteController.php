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
	if(isset($_SESSION['app_id'])){
		$isset_id=isset($_GET['id']) AND is_numeric($_GET['id']) AND $_GET['id']>=1;
		require('core/models/classRepresentante.php');
		$representante=new Representante();
		switch (isset($_GET['mode']) ? $_GET['mode'] : null){

			////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			// case para agregar madre //
			case 'AddMadre':
				if($_POST){
					if(!empty($_POST['apellidos']) && !empty($_POST['nombres']) && !empty($_POST['cedula']) && !empty($_POST['correo']) && !empty($_POST['codtlfhabitacion']) && !empty($_POST['tlfhabitacion']) && !empty($_POST['codtlfcelular']) && !empty($_POST['tlfcelular'])){
						$usuario=$_users[$_SESSION['app_id']]['usuario'];
						$representante->AddMadre($usuario);
					}else{
						header("location: ?view=representante&mode=AddMadre&error=1");	
					}
				}else{
					include(HTML_DIR.'representantes/addMadre.php');
				}
				break;
			///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

			////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			// case para listar las madres //
			case 'AllMadre':
				include(HTML_DIR.'representantes/allMadre.php');
				break;
			///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			
			////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			// case para ver la info de la madre //
			case 'VerMadre':
				if($isset_id AND array_key_exists($_GET['id'], $_madre)){
					include(HTML_DIR.'representantes/verMadre.php');				
				}else{
					header('location: ?view=representantes&mode=AllMadre');
				}
				break;
			///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

			////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			// case para editar madre //
			case 'EditMadre':
				if($_users[$_SESSION['app_id']]['id_tipo_usu']==1 || $_users[$_SESSION['app_id']]['id_tipo_usu']==2){
					if($isset_id AND array_key_exists($_GET['id'], $_madre)){
						if($_POST){
							if(!empty($_POST['apellidos']) && !empty($_POST['nombres']) && !empty($_POST['cedula']) && !empty($_POST['correo']) && !empty($_POST['codtlfhabitacion']) && !empty($_POST['tlfhabitacion']) && !empty($_POST['codtlfcelular']) && !empty($_POST['tlfcelular'])){
								$usuario=$_users[$_SESSION['app_id']]['usuario'];
								$representante->EditMadre($usuario);
							}else{
								header("location: ?view=representante&mode=EditMadre&id=".$_GET['id']."&error=1");	
							}
						}else{
							include(HTML_DIR.'representantes/editMadre.php');
						}
					}else{
						header("location: ?view=representante&mode=AllMadre");
					}
				}else{
					header("location: ?view=representante&mode=AllMadre");
				}
				break;
			///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

			////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			// case para listar los padres //
			case 'AllPadre':
				include(HTML_DIR.'representantes/allPadre.php');
				break;
			///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

			////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			// case para ver la info del padre //
			case 'VerPadre':
				if($isset_id AND array_key_exists($_GET['id'], $_padre)){
					include(HTML_DIR.'representantes/verPadre.php');				
				}else{
					header('location: ?view=representantes&mode=AllPadre');
				}
				break;
			///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

			////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			// case para agregar padre //
			case 'AddPadre':
				if($_POST){
					if(!empty($_POST['apellidos']) && !empty($_POST['nombres']) && !empty($_POST['cedula']) && !empty($_POST['correo']) && !empty($_POST['codtlfhabitacion']) && !empty($_POST['tlfhabitacion']) && !empty($_POST['codtlfcelular']) && !empty($_POST['tlfcelular'])){
						$usuario=$_users[$_SESSION['app_id']]['usuario'];
						$representante->AddPadre($usuario);
					}else{
						header("location: ?view=representante&mode=AddPadre&error=1");	
					}
				}else{
					include(HTML_DIR.'representantes/addPadre.php');
				}
				break;
			///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

			////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			// case para editar padre //
			case 'EditPadre':
				if($_users[$_SESSION['app_id']]['id_tipo_usu']==1 || $_users[$_SESSION['app_id']]['id_tipo_usu']==2){
					if($isset_id AND array_key_exists($_GET['id'], $_padre)){
						if($_POST){
							if(!empty($_POST['apellidos']) && !empty($_POST['nombres']) && !empty($_POST['cedula']) && !empty($_POST['correo']) && !empty($_POST['codtlfhabitacion']) && !empty($_POST['tlfhabitacion']) && !empty($_POST['codtlfcelular']) && !empty($_POST['tlfcelular'])){
								$usuario=$_users[$_SESSION['app_id']]['usuario'];
								$representante->EditPadre($usuario);
							}else{
								header("location: ?view=representante&mode=EditPadre&id=".$_GET['id']."&error=1");	
							}
						}else{
							include(HTML_DIR.'representantes/editPadre.php');
						}
					}else{
						header("location: ?view=representante&mode=AllPadre");
					}
				}else{
					header("location: ?view=representante&mode=AllPadre");
				}
				break;
			///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

			////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			// case para listar los representantes legales //
			case 'AllLegal':
				include(HTML_DIR.'representantes/allLegal.php');
				break;
			///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

			////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			// case para ver la info del representante legal //
			case 'VerLegal':
				if($isset_id AND array_key_exists($_GET['id'], $_legal)){
					include(HTML_DIR.'representantes/verLegal.php');				
				}else{
					header('location: ?view=representantes&mode=AllLegal');
				}
				break;
			///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

			////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			// case para agregar representante legal //
			case 'AddLegal':
				if($_POST){
					if(!empty($_POST['apellidos']) && !empty($_POST['nombres']) && !empty($_POST['cedula'])){
						$usuario=$_users[$_SESSION['app_id']]['usuario'];
						$representante->AddLegal($usuario);
					}else{
						header("location: ?view=representante&mode=AddLegal&error=1");	
					}
				}else{
					include(HTML_DIR.'representantes/addLegal.php');
				}
				break;
			///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

			////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			// case para editar representante legal //
			case 'EditLegal':
				if($_users[$_SESSION['app_id']]['id_tipo_usu']==1 || $_users[$_SESSION['app_id']]['id_tipo_usu']==2){
					if($isset_id AND array_key_exists($_GET['id'], $_legal)){
						if($_POST){
							if(!empty($_POST['apellidos']) && !empty($_POST['nombres']) && !empty($_POST['cedula'])){
								$usuario=$_users[$_SESSION['app_id']]['usuario'];
								$representante->EditLegal($usuario);
							}else{
								header("location: ?view=representante&mode=EditLegal&id=".$_GET['id']."&error=1");	
							}
						}else{
							include(HTML_DIR.'representantes/editLegal.php');
						}
					}else{
						header("location: ?view=representante&mode=AllLegal");
					}
				}else{
					header("location: ?view=representante&mode=AllLegal");
				}
				break;
			///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

			////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			// case para listar los representantes suplentes //
			case 'AllSuplente':
				include(HTML_DIR.'representantes/allSuplente.php');
				break;
			///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

			////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			// case para ver la info del representante suplente //
			case 'VerSuplente':
				if($isset_id AND array_key_exists($_GET['id'], $_suplente)){
					include(HTML_DIR.'representantes/verSuplente.php');				
				}else{
					header('location: ?view=representantes&mode=AllSuplente');
				}
				break;
			///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

			////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			// case para agregar representante suplente //
			case 'AddSuplente':
				if($_POST){
					if(!empty($_POST['apellidos']) && !empty($_POST['nombres']) && !empty($_POST['cedula']) && !empty($_POST['correo']) && !empty($_POST['codtlfhabitacion']) && !empty($_POST['tlfhabitacion']) && !empty($_POST['codtlfcelular']) && !empty($_POST['tlfcelular'])){
						$usuario=$_users[$_SESSION['app_id']]['usuario'];
						$representante->AddSuplente($usuario);
					}else{
						header("location: ?view=representante&mode=AddSuplente&error=1");	
					}
				}else{
					include(HTML_DIR.'representantes/addSuplente.php');
				}
				break;
			///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

			////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			// case para editar representante suplente //
			case 'EditSuplente':
				if($_users[$_SESSION['app_id']]['id_tipo_usu']==1 || $_users[$_SESSION['app_id']]['id_tipo_usu']==2){
					if($isset_id AND array_key_exists($_GET['id'], $_suplente)){
						if($_POST){
							if(!empty($_POST['apellidos']) && !empty($_POST['nombres']) && !empty($_POST['cedula']) && !empty($_POST['correo']) && !empty($_POST['codtlfhabitacion']) && !empty($_POST['tlfhabitacion']) && !empty($_POST['codtlfcelular']) && !empty($_POST['tlfcelular'])){
								$usuario=$_users[$_SESSION['app_id']]['usuario'];
								$representante->EditSuplente($usuario);
							}else{
								header("location: ?view=representante&mode=EditSuplente&id=".$_GET['id']."&error=1");	
							}
						}else{
							include(HTML_DIR.'representantes/editSuplente.php');
						}
					}else{
						header("location: ?view=representante&mode=AllSuplente");
					}
				}else{
					header("location: ?view=representante&mode=AllSuplente");
				}
				break;
			///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

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