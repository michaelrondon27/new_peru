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
		require('core/models/classAlumno.php');
		$alumno=new Alumno();
		switch (isset($_GET['mode']) ? $_GET['mode'] : null){

			/////////////////////////////////////////////////////////////////
			// case para retirar al alumno //
			case 'Retiro':
				if($_users[$_SESSION['app_id']]['id_tipo_usu']==1 || $_users[$_SESSION['app_id']]['id_tipo_usu']==2){
					if($isset_id AND array_key_exists($_GET['id'], $_alumno)){
						$usuario=$_users[$_SESSION['app_id']]['usuario'];
						$editar=$_alumno[$_GET['id']]['nombres']." ".$_alumno[$_GET['id']]['apellidos'];
						$alumno->RetirarAlumno($usuario, $editar);
					}else{
						header('location: ?view=alumno&mode=AllAlumno');
					}
				}else{
					header('location: ?view=index');
				}
				break;
			////////////////////////////////////////////////////////////////

			/////////////////////////////////////////////////////////////////
			// case para reingresar al alumno //
			case 'Reingreso':
				if($_users[$_SESSION['app_id']]['id_tipo_usu']==1 || $_users[$_SESSION['app_id']]['id_tipo_usu']==2){
					if($isset_id AND array_key_exists($_GET['id'], $_alumno)){
						$usuario=$_users[$_SESSION['app_id']]['usuario'];
						$editar=$_alumno[$_GET['id']]['nombres']." ".$_alumno[$_GET['id']]['apellidos'];
						$alumno->ReingresarAlumno($usuario, $editar);
					}else{
						header('location: ?view=alumno&mode=AllAlumno');
					}
				}else{
					header('location: ?view=index');
				}
				break;
			////////////////////////////////////////////////////////////////

			/////////////////////////////////////////////////////////////////
			// case para listar a los alumnos //
			case 'AllAlumno':
				include(HTML_DIR.'alumnos/allAlumno.php');
				break;
			////////////////////////////////////////////////////////////////

			////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			// case para ver la info del alumno //
			case 'VerMadre':
				if($isset_id AND array_key_exists($_GET['id'], $_alumno)){
					include(HTML_DIR.'alumnos/verAlumno.php');				
				}else{
					header('location: ?view=alumno&mode=AllAlumno');
				}
				break;
			///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

			////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			// case para agregar al alumno //
			case 'AddAlumno':
				if($_POST){
					if(!empty($_POST['cedula']) && !empty($_POST['fecha']) && !empty($_POST['apellidos']) && !empty($_POST['nombres']) && !empty($_POST['sexo']) && !empty($_POST['codcelular']) && !empty($_POST['tlfcelular']) && !empty($_POST['correo'])){
						$usuario=$_users[$_SESSION['app_id']]['usuario'];
						$alumno->AddAlumno($usuario);
					}else{
						header("location: ?view=alumno&mode=AddAlumno&error=1");	
					}
				}else{
					include(HTML_DIR.'alumnos/addAlumno.php');
				}
				break;
			////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

			////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			// case para asignar representantes al alumno //
			case 'AddRepresentante':
				if($isset_id AND array_key_exists($_GET['id'], $_alumno)){
					if($_POST){
						if(!empty($_POST['madre']) || !empty($_POST['padre']) || !empty($_POST['legal']) || !empty($_POST['suplente'])){
							$usuario=$_users[$_SESSION['app_id']]['usuario'];
							$nombres=$_alumno[$_GET['id']]['nombres']." ".$_alumno[$_GET['id']]['apellidos'];
							$alumno->AddRepresentante($usuario, $nombres);
						}else{
							header("location: ?view=alumno&mode=AddRepresentante&id=".$_GET['id']."&error=1");	
						}
					}else{
						include(HTML_DIR.'alumnos/addRepresentante.php');
					}
				}else{
					header('location: ?view=alumno&mode=AddAlumno');
				}
				break;
			////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

			////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			// case para agregar los antecedentes medicos del alumno //
			case 'AddMedico':
				if($isset_id AND array_key_exists($_GET['id'], $_alumno)){
					if($_POST){
						$usuario=$_users[$_SESSION['app_id']]['usuario'];
						$nombres=$_alumno[$_GET['id']]['nombres']." ".$_alumno[$_GET['id']]['apellidos'];
						$alumno->AddMedico($usuario, $nombres);
					}else{
						include(HTML_DIR.'alumnos/addMedico.php');
					}
				}else{
					header('location: ?view=alumno&mode=AddAlumno');
				}
				break;
			////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

			////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			// case para agregar los datos generales del alumno //
			case 'AddGenerales':
				if($isset_id AND array_key_exists($_GET['id'], $_alumno)){
					if($_POST){
						$usuario=$_users[$_SESSION['app_id']]['usuario'];
						$nombres=$_alumno[$_GET['id']]['nombres']." ".$_alumno[$_GET['id']]['apellidos'];
						$alumno->AddGenerales($usuario, $nombres);
					}else{
						include(HTML_DIR.'alumnos/addGeneral.php');
					}
				}else{
					header('location: ?view=alumno&mode=AddAlumno');
				}
				break;
			////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

			////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			// case para agregar los datos de las medidas antropometricas del alumno //
			case 'AddAntropometricas':
				if($isset_id AND array_key_exists($_GET['id'], $_alumno)){
					if($_POST){
						$usuario=$_users[$_SESSION['app_id']]['usuario'];
						$nombres=$_alumno[$_GET['id']]['nombres']." ".$_alumno[$_GET['id']]['apellidos'];
						$alumno->AddAntropometricas($usuario, $nombres);
					}else{
						include(HTML_DIR.'alumnos/addAntropometricas.php');
					}
				}else{
					header('location: ?view=alumno&mode=AddAlumno');
				}
				break;
			////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

			////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			// case para ver los datos del alumno //
			case 'VerAlumno':
				if($isset_id AND array_key_exists($_GET['id'], $_alumno)){
					include(HTML_DIR.'alumnos/verAlumno.php');
				}else{
					header('location: ?view=alumno&mode=AllAlumno');
				}
				break;
			////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

			////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			// case para ver los datos del alumno para editarlo //
			case 'EditEstudiante':
				if($_users[$_SESSION['app_id']]['id_tipo_usu']==1 || $_users[$_SESSION['app_id']]['id_tipo_usu']==2){
					if($isset_id AND array_key_exists($_GET['id'], $_alumno)){
						include(HTML_DIR.'alumnos/editEstudiante.php');
					}else{
						header('location: ?view=alumno&mode=AllAlumno');
					}
				}else{
					header('location: ?view=alumno&mode=AllAlumno');
				}
				break;
			////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

			////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			// case para editar los datos del alumno //
			case 'EditAlumno':
				if($_users[$_SESSION['app_id']]['id_tipo_usu']==1 || $_users[$_SESSION['app_id']]['id_tipo_usu']==2){
					if($isset_id AND array_key_exists($_GET['id'], $_alumno)){
						if(!empty($_POST['cedula']) && !empty($_POST['fecha']) && !empty($_POST['apellidos']) && !empty($_POST['nombres']) && !empty($_POST['sexo']) && !empty($_POST['codcelular']) && !empty($_POST['tlfcelular']) && !empty($_POST['correo'])){
							$usuario=$_users[$_SESSION['app_id']]['usuario'];
							$alumno->EditAlumno($usuario);
						}else{
							header("location: ?view=alumno&mode=EditEstudiante&id=".$_GET['id']."&error=1");	
						}
					}else{
						header('location: ?view=alumno&mode=AllAlumno');
					}
				}else{
					header('location: ?view=alumno&mode=AllAlumno');
				}
				break;
			////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

			////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			// case para editar los representantes del alumno //
			case 'EditRepresentantes':
				if($_users[$_SESSION['app_id']]['id_tipo_usu']==1 || $_users[$_SESSION['app_id']]['id_tipo_usu']==2){
					if($isset_id AND array_key_exists($_GET['id'], $_alumno)){
						if(!empty($_POST['madre']) || !empty($_POST['padre']) || !empty($_POST['legal']) || !empty($_POST['suplente'])){
							$usuario=$_users[$_SESSION['app_id']]['usuario'];
							$nombres=$_alumno[$_GET['id']]['nombres']." ".$_alumno[$_GET['id']]['apellidos'];
							$alumno->EditRepresentantes($usuario, $nombres);
						}else{
							header("location: ?view=alumno&mode=EditEstudiante&id=".$_GET['id']."&error=3");	
						}
					}else{
						header('location: ?view=alumno&mode=AllAlumno');
					}
				}else{
					header('location: ?view=alumno&mode=AllAlumno');
				}
				break;
			////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

			////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			// case para editar los antecedentes medicos del alumno //
			case 'EditMedico':
				if($_users[$_SESSION['app_id']]['id_tipo_usu']==1 || $_users[$_SESSION['app_id']]['id_tipo_usu']==2){
					if($isset_id AND array_key_exists($_GET['id'], $_alumno)){
						$usuario=$_users[$_SESSION['app_id']]['usuario'];
						$nombres=$_alumno[$_GET['id']]['nombres']." ".$_alumno[$_GET['id']]['apellidos'];
						$alumno->EditMedico($usuario, $nombres);
					}else{
						header('location: ?view=alumno&mode=AllAlumno');
					}
				}else{
					header('location: ?view=alumno&mode=AllAlumno');
				}
				break;
			////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

			////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			// case para editar la informacion general del alumno //
			case 'EditGenerales':
				if($_users[$_SESSION['app_id']]['id_tipo_usu']==1 || $_users[$_SESSION['app_id']]['id_tipo_usu']==2){
					if($isset_id AND array_key_exists($_GET['id'], $_alumno)){
						$usuario=$_users[$_SESSION['app_id']]['usuario'];
						$nombres=$_alumno[$_GET['id']]['nombres']." ".$_alumno[$_GET['id']]['apellidos'];
						$alumno->EditGenerales($usuario, $nombres);
					}else{
						header('location: ?view=alumno&mode=AllAlumno');
					}
				}else{
					header('location: ?view=alumno&mode=AllAlumno');
				}
				break;
			////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

			////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			// case para editar las medidas antropometricas del alumno //
			case 'EditAntropometricas':
				if($_users[$_SESSION['app_id']]['id_tipo_usu']==1 || $_users[$_SESSION['app_id']]['id_tipo_usu']==2){
					if($isset_id AND array_key_exists($_GET['id'], $_alumno)){
						$usuario=$_users[$_SESSION['app_id']]['usuario'];
						$nombres=$_alumno[$_GET['id']]['nombres']." ".$_alumno[$_GET['id']]['apellidos'];
						$alumno->EditAntropometricas($usuario, $nombres);
					}else{
						header('location: ?view=alumno&mode=AllAlumno');
					}
				}else{
					header('location: ?view=alumno&mode=AllAlumno');
				}
				break;
			////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	

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