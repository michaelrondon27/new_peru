<?php
	//EL NUCLEO DE LA APLICACION
	session_start();
	#CONSTATNTES DE CONEXTION
	define('DB_HOST', 'localhost');
	define('DB_USER', 'root');
	define('DB_PASS', '');
	define('DB_NAME', 'db_peru');
	#CONSTANTES DE LA APP
	define('HTML_DIR','html/');
	define('APP_TITLE','Perú De Lacroix');
	define('APP_URL','http://localhost/new_peru/');
	define('ICON','asset/images/peru.ico');
	define('RUTA_IMAGENES','asset/images/');

	#CONEXION
	require('core/models/classConexion.php');
	require('core/bin/functions/Encrypt.php');
	require('core/bin/functions/Users.php');
	require('core/bin/functions/Menu.php');
	$_users=Users();
	$_menu=Menu();
	if(isset($_SESSION['app_id'])){
		require('core/bin/functions/Slider.php');
		require('core/bin/functions/Status.php');
		require('core/bin/functions/Perfiles.php');
		require('core/bin/functions/Escolar.php');
		require('core/bin/functions/Grado.php');
		require('core/bin/functions/Seccion.php');
		require('core/bin/functions/Instruccion.php');
		require('core/bin/functions/Local.php');
		require('core/bin/functions/Celular.php');
		require('core/bin/functions/Madre.php');
		require('core/bin/functions/Padre.php');
		require('core/bin/functions/Legal.php');
		require('core/bin/functions/Suplente.php');
		require('core/bin/functions/Alumno.php');
		require('core/bin/functions/Pais.php');
		require('core/bin/functions/Estado.php');
		require('core/bin/functions/GrupoSanguineo.php');
		require('core/bin/functions/Medicos.php');
		require('core/bin/functions/Actitudes.php');
		require('core/bin/functions/Antropometricas.php');
		require('core/bin/functions/Inscripciones.php');
		require('core/bin/functions/Cupos.php');
		$_slider=Slider();
		$_status=Status();
		$_perfil=Perfiles();
		$_escolar=Escolar();
		$_grado=Grado();
		$_seccion=Seccion();
		$_instruccion=Instruccion();
		$_local=Local();
		$_celular=Celular();
		$_madre=Madre();
		$_padre=Padre();
		$_legal=Legal();
		$_suplente=Suplente();
		$_alumno=Alumno();
		$_pais=Pais();
		$_estado=Estado();
		$_sangre=GrupoSanguineo();
		$_medico=Medicos();
		$_actitudes=Actitudes();
		$_antropometricas=Antropometricas();
		$_inscripciones=Inscripciones();
		$_cupos=Cupos();
	}
?>