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
		require('core/models/classUser.php');
		$user=new User();
		switch (isset($_GET['mode']) ? $_GET['mode'] : null){

			/////////////////////////////////////////////////////////////////
			// case para consultar los usuarios //
			case 'allUsuarios':
				if($_users[$_SESSION['app_id']]['id_tipo_usu']==1){
					include(HTML_DIR.'usuario/allUsuario.php');
				}
				break;
			////////////////////////////////////////////////////////////////

			/////////////////////////////////////////////////////////////////
			// case para bloquear el usuario //
			case 'Bloquear':
				if($_users[$_SESSION['app_id']]['id_tipo_usu']==1){
					if($isset_id AND array_key_exists($_GET['id'], $_users)){
						$usuario=$_users[$_SESSION['app_id']]['usuario'];
						$editar=$_users[$_GET['id']]['usuario'];
						$user->BloquearUsuario($usuario, $editar);
					}else{
						header('location: ?view=user&mode=allUsuarios');
					}
				}else{
					header('location: ?view=index');
				}
				break;
			/////////////////////////////////////////////////////////////////

			/////////////////////////////////////////////////////////////////
			// case para desbloquear el usuario //
			case 'Desbloquear':
				if($_users[$_SESSION['app_id']]['id_tipo_usu']==1){
					if($isset_id AND array_key_exists($_GET['id'], $_users)){
						$usuario=$_users[$_SESSION['app_id']]['usuario'];
						$editar=$_users[$_GET['id']]['usuario'];
						$user->DesbloquearUsuario($usuario, $editar);
					}else{
						header('location: ?view=user&mode=allUsuarios');
					}
				}else{
					header('location: ?view=index');
				}
				break;
			/////////////////////////////////////////////////////////////////

			////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			// case para agregar usuarios //
			case 'addUsuario':
				if($_users[$_SESSION['app_id']]['id_tipo_usu']==1){
					if($_POST){
						if(!empty($_POST['usuario']) && !empty($_POST['nombre']) && !empty($_POST['apellido']) && !empty($_POST['perfil']) && !empty($_POST['pass']) && !empty($_POST['repeat'])){
							$usuario=$_users[$_SESSION['app_id']]['usuario'];
							$user->AddUsuario($usuario);						
						}else{
							header('location: ?view=user&mode=addUsuario&error=1');	
						}						
					}else{
						include(HTML_DIR.'usuario/addUsuario.php');
					}
				}else{
					header('location: ?view=index');
				}
				break;
			////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

			/////////////////////////////////////////////////////////////////////////////////////////////////////////////
			// case para editar usuarios //
			case 'EditUsuario':
				if($_users[$_SESSION['app_id']]['id_tipo_usu']==1){
					if($isset_id AND array_key_exists($_GET['id'], $_users)){
						if($_POST){
							if(!empty($_POST['nombre']) && !empty($_POST['apellido']) && !empty($_POST['perfil'])){
								$usuario=$_users[$_SESSION['app_id']]['usuario'];
								$editar=$_users[$_GET['id']]['usuario'];
								$user->EditUsuario($usuario, $editar);						
							}else{
								header('location: ?view=user&mode=EditUsuario&id='.$_GET['id'].'&error=1');	
							}						
						}else{
							include(HTML_DIR.'usuario/editUsuario.php');
						}
					}else{
						header('location: ?view=user&mode=allUsuarios');
					}
				}else{
					header('location: ?view=index');
				}
				break;
			///////////////////////////////////////////////////////////////////////////////////////////////////////////

			/////////////////////////////////////////////////////////////////
			// case para cambiar la contraseña de un usuario //
			case 'AdminPassword':
				if($_users[$_SESSION['app_id']]['id_tipo_usu']==1){
					if($isset_id AND array_key_exists($_GET['id'], $_users)){
						if($_POST){
							if(!empty($_POST['pass']) && !empty($_POST['repeat'])){
								$usuario=$_users[$_SESSION['app_id']]['usuario'];
								$editar=$_users[$_GET['id']]['usuario'];
								$user->AdminPassword($usuario, $editar);						
							}else{
								header('location: ?view=user&mode=adminPassword&id='.$_GET['id'].'&error=1');	
							}						
						}else{
							include(HTML_DIR.'usuario/adminPassword.php');
						}
					}else{
						header('location: ?view=user&mode=allUsuarios');
					}
				}else{
					header('location: ?view=index');
				}
				break;
			/////////////////////////////////////////////////////////////////

			/////////////////////////////////////////////////////////////////
			// case para ver perfil //
			case 'MiPerfil':
				if($isset_id AND array_key_exists($_GET['id'], $_users)){
					include(HTML_DIR.'usuario/miPerfil.php');
				}else{
					header('location: ?view=index');
				}
				break;
			/////////////////////////////////////////////////////////////////

			/////////////////////////////////////////////////////////////////
			// case para cambiar foto de perfil //
			case 'CambiarFoto':
				if($isset_id AND array_key_exists($_GET['id'], $_users)){
					if(!empty($_FILES['foto'])){
						$usuario=$_users[$_SESSION['app_id']]['usuario'];
						$user->CambiarFoto($usuario);						
					}else{
						header('location: ?view=user&mode=MiPerfil&id='.$_GET['id'].'&error=1');	
					}
				}else{
					header('location: ?view=index');
				}
				break;
			/////////////////////////////////////////////////////////////////

			/////////////////////////////////////////////////////////////////
			// case para cambiar contraseña //
			case 'CambiarPassword':
				if($isset_id AND array_key_exists($_GET['id'], $_users)){
					if(!empty($_POST['pass']) && !empty($_POST['repeat'])){
						$usuario=$_users[$_SESSION['app_id']]['usuario'];
						$user->CambiarPassword($usuario);						
					}else{
						header('location: ?view=user&mode=MiPerfil&id='.$_GET['id'].'&error=1');	
					}
				}else{
					header('location: ?view=index');
				}
				break;
			/////////////////////////////////////////////////////////////////

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