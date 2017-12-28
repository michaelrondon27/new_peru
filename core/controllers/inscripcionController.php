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
		require('core/models/classInscripcion.php');
		$inscripcion=new Inscripcion();
		switch (isset($_GET['mode']) ? $_GET['mode'] : null){

			////////////////////////////////////////////////////////////////////////
			// case para el pdf de la planilla de inscripcion al alumno //
			case 'planillaInscripcion':
				if($isset_id AND array_key_exists($_GET['id'], $_inscripciones)){
					include(HTML_DIR.'inscripcion/planillaInscripcion.php');
				}else{
					?>
						<script>
							window.close();
						</script>
					<?php
				}
				break;
			///////////////////////////////////////////////////////////////////////

			////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			// case para una nueva inscripcion //
			case 'AddInscripcion':
				if($_POST){
					if(!empty($_POST['grado']) && !empty($_POST['seccion']) && !empty($_POST['alumno']) && !empty($_POST['condicion'])){
						$usuario=$_users[$_SESSION['app_id']]['usuario'];
						$nombres=$_alumno[$_POST['alumno']]['nombres']." ".$_alumno[$_POST['alumno']]['apellidos'];
						$inscripcion->AddInscripcion($usuario, $nombres);
					}else{
						header("location: ?view=inscripcion&mode=AddInscripcion&error=1");
					}
				}else{
					include(HTML_DIR.'inscripcion/addInscripcion.php');
				}
				break;
			////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

			////////////////////////////////////////////////////////////////////////
			// case para listar los inscritos //
			case 'AllInscrito':
				include(HTML_DIR.'inscripcion/allInscripcion.php');
				break;
			///////////////////////////////////////////////////////////////////////

			///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			// case para el pdf del listado de alumnos //
			case 'ListadoPdf':
				if(array_key_exists($_GET['escolar'], $_escolar) AND array_key_exists($_GET['grado'], $_grado) AND array_key_exists($_GET['seccion'], $_seccion)){
					include(HTML_DIR."inscripcion/listadoPdf.php");
				}else{
					?>
						<script>
							window.close();
						</script>
					<?php
				}
				break;
			///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

			///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			// case para el excel del listado de alumnos //
			case 'ListadoExcel':
				if(array_key_exists($_GET['escolar'], $_escolar) AND array_key_exists($_GET['grado'], $_grado) AND array_key_exists($_GET['seccion'], $_seccion)){
					include(HTML_DIR."inscripcion/listadoExcel.php");
				}else{
					?>
						<script>
							window.close();
						</script>
					<?php
				}
				break;
			///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

			////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			// case para una nueva inscripcion //
			case 'AddInscripcion':
				if($_POST){
					if(!empty($_POST['grado']) && !empty($_POST['seccion']) && !empty($_POST['alumno']) && !empty($_POST['condicion'])){
						$usuario=$_users[$_SESSION['app_id']]['usuario'];
						$nombres=$_alumno[$_POST['alumno']]['nombres']." ".$_alumno[$_POST['alumno']]['apellidos'];
						$inscripcion->AddInscripcion($usuario, $nombres);
					}else{
						header("location: ?view=inscripcion&mode=AddInscripcion&error=1");
					}
				}else{
					include(HTML_DIR.'inscripcion/addInscripcion.php');
				}
				break;
			////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

			////////////////////////////////////////////////////////////////////////
			// case para listar a los alumnos con notas //
			case 'AllNotas':
				include(HTML_DIR.'inscripcion/allNotas.php');
				break;
			///////////////////////////////////////////////////////////////////////

			////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			// case para la inscripcion de alumnos regulares //
			case 'AddRegulares':
				if($_POST){
					if(!empty($_POST['escolar'])){
						$usuario=$_users[$_SESSION['app_id']]['usuario'];
						$inscripcion->AddRegulares($usuario);
					}else{
						header("location: ?view=inscripcion&mode=AddRegulares&error=1");
					}
				}else{
					include(HTML_DIR.'inscripcion/addRegulares.php');
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