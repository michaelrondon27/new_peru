<?php
	define('DB_HOST', 'localhost');
	define('DB_USER', 'root');
	define('DB_PASS', '');
	define('DB_NAME', 'db_peru');
	require('../models/classConexion.php');
	require('../models/classBuscar.php');
	$buscar=new Buscar();
	switch (isset($_POST['mode']) ? $_POST['mode'] : null){

		///////////////////////////////////////////////////////////////////////////////////////////////
		// case para buscar por año escolar las secciones asignadas //
		// ruta del archivo que envia los datos html/configuracio/allGadoSecciones.php //
		case 1:
			$buscar->SeccionnesAsignadasPorAñoEscolar();
			break;
		//////////////////////////////////////////////////////////////////////////////////////////////

		///////////////////////////////////////////////////////////////////////////////////////////////
		// case para buscar por año escolar y por grado las secciones asignadas //
		// ruta del archivo que envia los datos html/configuracio/allGadoSecciones.php //
		case 2:
			$buscar->SeccionnesAsignadasPorAñoEscolarGrado();
			break;
		//////////////////////////////////////////////////////////////////////////////////////////////

		///////////////////////////////////////////////////////////////////////////////////////////////
		// case para saber cuantos cupos hay disponible para la inscripcion //
		// ruta del archivo que envia los datos html/configuracio/addInscripcion.php //
		case 3:
			$buscar->Cupos();
			break;
		//////////////////////////////////////////////////////////////////////////////////////////////

		///////////////////////////////////////////////////////////////////////////////////////////////
		// case para buscar por año escolar los cupos asignados //
		// ruta del archivo que envia los datos html/configuracio/allGadoSecciones.php //
		case 4:
			$buscar->CuposAsignadosPorAñoEscolar();
			break;
		//////////////////////////////////////////////////////////////////////////////////////////////

		///////////////////////////////////////////////////////////////////////////////////////////////
		// case para verificar las secciones para habilitar los cupos //
		// ruta del archivo que envia los datos html/configuracio/allGadoSecciones.php //
		case 5:
			$buscar->SeccionesAsignadosParaCupos();
			break;
		//////////////////////////////////////////////////////////////////////////////////////////////

		///////////////////////////////////////////////////////////////////////////////////////////////
		// case para listar a los alumnos inscritos //
		// ruta del archivo que envia los datos html/inscripcion/allInscripcion.php //
		case 6:
			$buscar->ListarInscritos();
			break;
		//////////////////////////////////////////////////////////////////////////////////////////////

		///////////////////////////////////////////////////////////////////////////////////////////////
		// case para listar a los alumnos con notas cargadas //
		// ruta del archivo que envia los datos html/inscripcion/allNotas.php //
		case 7:
			$buscar->ListarNotas();
			break;
		//////////////////////////////////////////////////////////////////////////////////////////////

		///////////////////////////////////////////////////////////////////////////////////////////////
		// case para listar a los alumnos regulares //
		// ruta del archivo que envia los datos html/inscripcion/addRegulares.php //
		case 8:
			$buscar->ListarRegulares();
			break;
		//////////////////////////////////////////////////////////////////////////////////////////////

	}
?>