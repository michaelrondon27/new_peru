<?php
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			
		//////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
		//	// FUNCIONES NATIVAS DE PHP UTILIZADAS EN ESTA CLASE //                                                     //
		//		// trim -> elimina espacios en blancos al comienzo y al final de la variable //                         //
		//		// ucwords -> convierte la primera letra en mayuscula de cada palabra de la variable //                 //
		//		// mysqli_real_escape_string -> evita la inyeccion sql //                                               //
		//		// strtolower -> convierte en minusculas la variable //                                                 //
		//		// $_SERVER['REMOTE_ADDR'] -> obtiene la ip de la pc //                                                 //
		//		// $_SERVER['DOCUMENT_ROOT'] -> se coloca en la raiz de la carpeta del sistema //                       //
		//		// $_FILES[variable]['name'] -> obtiene el nombre del archivo a subir al sistema //                     //
		//		// $_FILES[variable]['type'] -> obtiene el tipo del archivo a subir al sistema //                       //
		//		// $_FILES[variable]['size'] -> obtiene el tamaño del archivo a subir al sistema //                     //
		//		// $_FILES[variable]['tmp_name'] -> se encarga de guardar el archivo en un directorio temporalmente //  //
		//		// move_uploaded_file -> mueve el archivo al directorio donde se va a guardar //                        //
		//////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	class Alumno{
		private $db;
		private $usuario;
		private $id;
		private $editar;
		private $cedula;
		private $cedulaEscolar;
		private $posicionParto;
		private $fechaNacimiento;
		private $apellidos;
		private $nombres;
		private $edad;
		private $lugarNacimiento;
		private $sexo;
		private $pais;
		private $estado;
		private $codTlfCelular;
		private $tlfCelular;
		private $correo;
		private $direccion;
		private $hermanos;
		private $representante;
		private $especifique;
		private $lopna;
		private $fechaVencimiento;
		private $fotoCarnet;
		private $fotoCedula;
		private $nombreCarnet;
		private $nombreCedula;
		private $madre;
		private $padre;
		private $legal;
		private $suplente;
		private $sangre;
		private $lateralidad;
		private $lentes;
		private $oido;
		private $sarampion;
		private $rubeola;
		private $paperas;
		private $diabetes;
		private $hipertension;
		private $cardiopatia;
		private $asma;
		private $alergias;
		private $otras;
		private $diversidad;
		private $psicologo1;
		private $tera_lenguaje1;
		private $neurologo1;
		private $tera_ocupacional1;
		private $psiquiatria1;
		private $odontologia1;
		private $dermatologia1;
		private $fisiatria1;
		private $psicopedagogia1;
		private $otros1;
		private $psicologo2;
		private $tera_lenguaje2;
		private $neurologo2;
		private $tera_ocupacional2;
		private $psiquiatria2;
		private $odontologia2;
		private $dermatologia2;
		private $fisiatria2;
		private $psicopedagogia2;
		private $otros2;
		private $tratamiento;
		private $medicado;
		private $impedimiento;
		private $seguro;
		private $extracurricular;
		private $voleibol;
		private $basquetbol;
		private $futbolito;
		private $ajedrez;
		private $danza;
		private $teatro;
		private $musica;
		private $bolivariana;
		private $cruz;
		private $biblioteca;
		private $mantenimiento;
		private $conservacion;
		private $condiciones;
		private $serial;
		private $motivo;
		private $denuncia;
		private $peso;
		private $parado;
		private $sentado;
		private $brazada;
		private $salto;
		private $abdominales;
		private $flexiones;
		private $suma;
		private $velocidad;
		private $flexion;
		private $resistencia;

		///////////////////////////////////////////
		// metodo para abrir la conexion //
		public function __construct(){
			$this->db=new Conexion();
		}
		//////////////////////////////////////////
		
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		// metodo para retirar a los alumnos de la institucion //
		// ruta del archivo que envia los datos html/alumnos/allAlumno.php //
		public function RetirarAlumno($usuario, $editar){
			$this->id=intval($_GET['id']);
			$this->usuario=$usuario;
			$this->editar=$editar;
			$this->db->query("UPDATE alumnos SET estudiante=3 WHERE id_alum=$this->id LIMIT 1;");
			$indicesServer = array('REMOTE_ADDR',);
			$ip=$_SERVER['REMOTE_ADDR'];
			$evento="Se retiro del plantel al alumno ".$this->editar;
			$this->db->query("INSERT INTO registro_eventos(ip, usuario, evento, fecha, operacion) VALUES('$ip', '$this->usuario', '$evento', NOW(), 'UPDATE');");
			header('location: ?view=alumno&mode=AllAlumno&success=1');
		}
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

		////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		// metodo para reingresar a los alumnos de la institucion //
		// ruta del archivo que envia los datos html/alumnos/allAlumno.php //
		public function ReingresarAlumno($usuario, $editar){
			$this->id=intval($_GET['id']);
			$this->usuario=$usuario;
			$this->editar=$editar;
			$this->db->query("UPDATE alumnos SET estudiante=4 WHERE id_alum=$this->id LIMIT 1;");
			$indicesServer = array('REMOTE_ADDR',);
			$ip=$_SERVER['REMOTE_ADDR'];
			$evento="Se reingreso al plantel al alumno ".$this->editar;
			$this->db->query("INSERT INTO registro_eventos(ip, usuario, evento, fecha, operacion) VALUES('$ip', '$this->usuario', '$evento', NOW(), 'UPDATE');");
			header('location: ?view=alumno&mode=AllAlumno&success=2');
		}
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

		////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		// metodo para agregar a los alumnos //
		// ruta del archivo que envia los datos html/alumnos/addAlumno.php //
		public function AddAlumno($usuario){
			$this->usuario=$usuario;
			$this->nombreCarnet=$_FILES['foto_carnet']['name'];
			$this->nombreCedula=$_FILES['foto_cedula']['name'];
			$this->cedula=$this->db->real_escape_string($_POST['cedula']);
			$sql=$this->db->query("SELECT * FROM alumnos WHERE id_alum=$this->cedula LIMIT 1;");
			if($this->db->rows($sql)==0){
				$this->cedulaEscolar=$this->db->real_escape_string($_POST['ced_esc']);
				$this->posicionParto=$this->db->real_escape_string($_POST['parto']);
				$this->posicionParto=trim(strtolower($this->posicionParto));
				$this->posicionParto=ucwords($this->posicionParto);
				$this->fechaNacimiento=$this->db->real_escape_string($_POST['fecha']);
				$this->fechaNacimiento=date("Y-m-d", strtotime($this->fechaNacimiento));
				$this->apellidos=$this->db->real_escape_string($_POST['apellidos']);
				$this->apellidos=trim(strtolower($this->apellidos));
				$this->apellidos=ucwords($this->apellidos);
				$this->nombres=$this->db->real_escape_string($_POST['nombres']);
				$this->nombres=trim(strtolower($this->nombres));
				$this->nombres=ucwords($this->nombres);
				$this->edad=$this->db->real_escape_string($_POST['edad']);
				$this->lugarNacimiento=$this->db->real_escape_string($_POST['lugar']);
				$this->lugarNacimiento=trim(strtolower($this->lugarNacimiento));
				$this->lugarNacimiento=ucwords($this->lugarNacimiento);
				$this->sexo=$this->db->real_escape_string($_POST['sexo']);
				$this->pais=$this->db->real_escape_string($_POST['pais']);
				$this->estado=$this->db->real_escape_string($_POST['estado']);
				$this->codTlfCelular=$this->db->real_escape_string($_POST['codcelular']);
				$this->tlfCelular=$this->db->real_escape_string($_POST['tlfcelular']);
				$this->correo=$this->db->real_escape_string($_POST['correo']);
				$this->correo=trim($this->correo);
				$this->direccion=$this->db->real_escape_string($_POST['direccion']);
				$this->direccion=trim(strtolower($this->direccion));
				$this->direccion=ucwords($this->direccion);
				if(isset($_POST['hermano'])){
					$this->hermanos=$this->db->real_escape_string($_POST['hermano']);
				}else{
					$this->hermanos="";
				}
				if(isset($_POST['representante'])){
					$this->representante=$this->db->real_escape_string($_POST['representante']);
					if($this->representante=="Madre" || $this->representante=="Padre"){
						$this->especifique="";
						$this->lopna="";
						$this->fechaVencimiento="";
					}else if($this->representante=="Otro"){
						$this->especifique=$_POST['especifique'];
						if(isset($_POST['lopna'])){
							$this->lopna=$_POST['lopna'];
							if($this->lopna=="Si"){
								$this->fechaVencimiento=$_POST['vencimiento'];
								if($this->fechaVencimiento!=""){
									$this->fechaVencimiento=date("Y-m-d", strtotime($this->fechaVencimiento));
								}else{
									$this->fechaVencimiento="";
								}
							}else if($this->lopna=="No"){
								$this->fechaVencimiento="";
							}
						}else{
							$this->lopna="";
							$this->fechaVencimiento="";
						}
					}
				}else{
					$this->representante="";
					$this->especifique="";
					$this->lopna="";
					$this->fechaVencimiento="";
				}
				$this->db->query("INSERT INTO alumnos(cedula, ced_escolar, pos_parto, apellidos, nombres, lugar_nac, fec_nac, edad, direccion, hermano, repre, especifique, fec_lopna, sexo, id_estado, id_status, id_pais, correo, id_tlf_cel, tlf_cel, lopna, estudiante) VALUES($this->cedula, '$this->cedulaEscolar', '$this->posicionParto', '$this->apellidos', '$this->nombres', '$this->lugarNacimiento', '$this->fechaNacimiento', '$this->edad', '$this->direccion', '$this->hermanos', '$this->representante', '$this->especifique', '$this->fechaVencimiento', '$this->sexo', $this->estado, 1, $this->pais, '$this->correo', $this->codTlfCelular, $this->tlfCelular, '$this->lopna', 0);");
				$this->id=$this->db->insert_id;
				//Ruta de la carpeta destino en servidor
				$carpeta=$_SERVER['DOCUMENT_ROOT'].'/new_peru/asset/images/alumnos/'.$this->id;
				if(!file_exists($carpeta)){
					mkdir($carpeta, 0777, true);
				}
				if($this->nombreCarnet==""){
					$rutaCarnet="default.png";
				}else{
					$rutaCarnet="/alumnos/".$this->id."/".$this->nombreCarnet;
					//Movemos la imagen del directorio temporal al directorio escogido
					move_uploaded_file($_FILES['foto_carnet']['tmp_name'], $carpeta."/".$this->nombreCarnet);
				}
				if($this->nombreCedula==""){
					$rutaCedula=$this->nombreCedula="default.png";
				}else{
					$rutaCedula="/alumnos/".$this->id."/".$this->nombreCedula;
					//Movemos la imagen del directorio temporal al directorio escogido
					move_uploaded_file($_FILES['foto_cedula']['tmp_name'], $carpeta."/".$this->nombreCedula);
				}
				$this->db->query("UPDATE alumnos SET foto_carnet='$rutaCarnet', foto_cedula='$rutaCedula' WHERE id_alum=$this->id LIMIT 1;");
				$indicesServer = array('REMOTE_ADDR',);
				$ip=$_SERVER['REMOTE_ADDR'];
				$evento="Registro al alumno ".$this->nombres." ".$this->apellidos." con la cedula ".$this->cedula;
				$this->db->query("INSERT INTO registro_eventos(ip, usuario, evento, fecha, operacion) VALUES('$ip', '$this->usuario', '$evento', NOW(), 'INSERT');");
				header('location: ?view=alumno&mode=AddRepresentante&id='.$this->id.'&success=1');
			}else{
				$this->db->liberar($sql);
				header('location: ?view=alumno&mode=AddAlumno&error=2');
			}
		}
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

		////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		// metodo para asignar los representantes //
		// ruta del archivo que envia los datos html/alumnos/addRepresentante.php //
		public function AddRepresentante($usuario, $nombres){
			$this->usuario=$usuario;
			$this->id=intval($_GET['id']);
			if($_POST['madre']!=""){
				$this->madre=$this->db->real_escape_string($_POST['madre']);
				$this->db->query("UPDATE alumnos SET id_madre=$this->madre WHERE id_alum=$this->id LIMIT 1;");
			}
			if($_POST['padre']!=""){
				$this->padre=$this->db->real_escape_string($_POST['padre']);
				$this->db->query("UPDATE alumnos SET id_padre=$this->padre WHERE id_alum=$this->id LIMIT 1;");
			}
			if($_POST['legal']!=""){
				$this->legal=$this->db->real_escape_string($_POST['legal']);
				$this->db->query("UPDATE alumnos SET id_repre=$this->legal WHERE id_alum=$this->id LIMIT 1;");
			}
			if($_POST['suplente']!=""){
				$this->suplente=$this->db->real_escape_string($_POST['suplente']);
				$this->db->query("UPDATE alumnos SET id_repre_sup=$this->suplente WHERE id_alum=$this->id LIMIT 1;");
			}
			$this->nombres=$nombres;
			$indicesServer = array('REMOTE_ADDR',);
			$ip=$_SERVER['REMOTE_ADDR'];
			$evento="Le asigno los representantes al alumno ".$this->nombres;
			$this->db->query("INSERT INTO registro_eventos(ip, usuario, evento, fecha, operacion) VALUES('$ip', '$this->usuario', '$evento', NOW(), 'INSERT');");
			header('location: ?view=alumno&mode=AddMedico&id='.$this->id.'&success=1');
		}
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

		////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		// metodo para agregar los antecedentes medicos //
		// ruta del archivo que envia los datos html/alumnos/addMedico.php //
		public function AddMedico($usuario, $nombres){
			$this->usuario=$usuario;
			$this->id=intval($_GET['id']);
			$this->sangre=$this->db->real_escape_string($_POST['sangre']);
			$this->lateralidad=$this->db->real_escape_string($_POST['lateralidad']);
			if(isset($_POST['lentes'])){
				$this->lentes=$this->db->real_escape_string($_POST['lentes']);
			}else{
				$this->lentes="";
			}
			if(isset($_POST['oido'])){
				$this->oido=$this->db->real_escape_string($_POST['oido']);
			}else{
				$this->oido="";
			}
			if(isset($_POST['sarampion'])){
				$this->sarampion=$this->db->real_escape_string($_POST['sarampion']);
			}else{
				$this->sarampion="No";
			}
			if(isset($_POST['rubeola'])){
				$this->rubeola=$this->db->real_escape_string($_POST['rubeola']);
			}else{
				$this->rubeola="No";
			}
			if(isset($_POST['paperas'])){
				$this->paperas=$this->db->real_escape_string($_POST['paperas']);
			}else{
				$this->paperas="No";
			}
			if(isset($_POST['diabetes'])){
				$this->diabetes=$this->db->real_escape_string($_POST['diabetes']);
			}else{
				$this->diabetes="No";
			}
			if(isset($_POST['hipertension'])){
				$this->hipertension=$this->db->real_escape_string($_POST['hipertension']);
			}else{
				$this->hipertension="No";
			}
			if(isset($_POST['cardiopatia'])){
				$this->cardiopatia=$this->db->real_escape_string($_POST['cardiopatia']);
			}else{
				$this->cardiopatia="No";
			}
			if(isset($_POST['asma'])){
				$this->asma=$this->db->real_escape_string($_POST['asma']);
			}else{
				$this->asma="No";
			}
			if(isset($_POST['alergias'])){
				$this->alergias=$this->db->real_escape_string($_POST['alergias']);
			}else{
				$this->alergias="No";
			}
			$this->otras=$this->db->real_escape_string($_POST['otras']);
			$this->otras=trim($this->otras);
			$this->diversidad=$this->db->real_escape_string($_POST['diversidad']);
			$this->diversidad=trim($this->diversidad);
			if(isset($_POST['psicologo1'])){
				$this->psicologo1=$this->db->real_escape_string($_POST['psicologo1']);
			}else{
				$this->psicologo1="No";
			}
			if(isset($_POST['tera_lenguaje1'])){
				$this->tera_lenguaje1=$this->db->real_escape_string($_POST['tera_lenguaje1']);
			}else{
				$this->tera_lenguaje1="No";
			}
			if(isset($_POST['neurologo1'])){
				$this->neurologo1=$this->db->real_escape_string($_POST['neurologo1']);
			}else{
				$this->neurologo1="No";
			}
			if(isset($_POST['tera_ocupacional1'])){
				$this->tera_ocupacional1=$this->db->real_escape_string($_POST['tera_ocupacional1']);
			}else{
				$this->tera_ocupacional1="No";
			}
			if(isset($_POST['psiquiatria1'])){
				$this->psiquiatria1=$this->db->real_escape_string($_POST['psiquiatria1']);
			}else{
				$this->psiquiatria1="No";
			}
			if(isset($_POST['odontologia1'])){
				$this->odontologia1=$this->db->real_escape_string($_POST['odontologia1']);
			}else{
				$this->odontologia1="No";
			}
			if(isset($_POST['dermatologia1'])){
				$this->dermatologia1=$this->db->real_escape_string($_POST['dermatologia1']);
			}else{
				$this->dermatologia1="No";
			}
			if(isset($_POST['fisiatria1'])){
				$this->fisiatria1=$this->db->real_escape_string($_POST['fisiatria1']);
			}else{
				$this->fisiatria1="No";
			}
			if(isset($_POST['psicopedagogia1'])){
				$this->psicopedagogia1=$this->db->real_escape_string($_POST['psicopedagogia1']);
			}else{
				$this->psicopedagogia1="No";
			}
			$this->otros1=$this->db->real_escape_string($_POST['otros1']);
			$this->otros1=trim($this->otros1);
			if(isset($_POST['psicologo2'])){
				$this->psicologo2=$this->db->real_escape_string($_POST['psicologo2']);
			}else{
				$this->psicologo2="No";
			}
			if(isset($_POST['tera_lenguaje2'])){
				$this->tera_lenguaje2=$this->db->real_escape_string($_POST['tera_lenguaje2']);
			}else{
				$this->tera_lenguaje2="No";
			}
			if(isset($_POST['neurologo2'])){
				$this->neurologo2=$this->db->real_escape_string($_POST['neurologo2']);
			}else{
				$this->neurologo2="No";
			}
			if(isset($_POST['tera_ocupacional2'])){
				$this->tera_ocupacional2=$this->db->real_escape_string($_POST['tera_ocupacional2']);
			}else{
				$this->tera_ocupacional2="No";
			}
			if(isset($_POST['psiquiatria2'])){
				$this->psiquiatria2=$this->db->real_escape_string($_POST['psiquiatria2']);
			}else{
				$this->psiquiatria2="No";
			}
			if(isset($_POST['odontologia2'])){
				$this->odontologia2=$this->db->real_escape_string($_POST['odontologia2']);
			}else{
				$this->odontologia2="No";
			}
			if(isset($_POST['dermatologia2'])){
				$this->dermatologia2=$this->db->real_escape_string($_POST['dermatologia2']);
			}else{
				$this->dermatologia2="No";
			}
			if(isset($_POST['fisiatria2'])){
				$this->fisiatria2=$this->db->real_escape_string($_POST['fisiatria2']);
			}else{
				$this->fisiatria2="No";
			}
			if(isset($_POST['psicopedagogia2'])){
				$this->psicopedagogia2=$this->db->real_escape_string($_POST['psicopedagogia2']);
			}else{
				$this->psicopedagogia2="No";
			}
			$this->otros2=$this->db->real_escape_string($_POST['otros2']);
			$this->otros2=trim($this->otros2);
			$this->tratamiento=$this->db->real_escape_string($_POST['tratamiento']);
			$this->tratamiento=trim($this->tratamiento);
			$this->medicado=$this->db->real_escape_string($_POST['medicado']);
			$this->medicado=trim($this->medicado);
			$this->impedimiento=$this->db->real_escape_string($_POST['impedimiento']);
			$this->impedimiento=trim($this->impedimiento);
			$this->seguro=$this->db->real_escape_string($_POST['seguro']);
			$this->seguro=trim($this->seguro);
			$this->db->query("INSERT INTO ante_medicos(id_tipo_sangre, lateralidad, lentes, oido, sarampion, rubeola, paperas, diabetes, hipertension, cardiopatia, asma, alergias, descrip_otras, diversidad, psicolo1, tera_lengua1, psicopedagogia1, neurolo1, tera_ocup1, psiquiatria1, odontologia1, dermatologia1, fisiatria1, otro_esp1, psicolo2, tera_lengua2, psicopedagogia2, neurolo2, tera_ocup2, psiquiatria2, odontologia2, dermatologia2, fisiatria2, otro_esp2, lugar_trata, act_medicado, imp_depor, seg_med, id_alum) VALUES($this->sangre, '$this->lateralidad', '$this->lentes', '$this->oido', '$this->sarampion', '$this->rubeola', '$this->paperas', '$this->diabetes', '$this->hipertension', '$this->cardiopatia', '$this->asma', '$this->alergias', '$this->otras', '$this->diversidad', '$this->psicologo1', '$this->tera_lenguaje1', '$this->psicopedagogia1', '$this->neurologo1', '$this->tera_ocupacional1', '$this->psiquiatria1', '$this->odontologia1', '$this->dermatologia1', '$this->fisiatria1', '$this->otros1', '$this->psicologo2', '$this->tera_lenguaje2', '$this->psicopedagogia2', '$this->neurologo2', '$this->tera_ocupacional2', '$this->psiquiatria2', '$this->odontologia2', '$this->dermatologia2', '$this->fisiatria2', '$this->otros2', '$this->tratamiento', '$this->medicado', '$this->impedimiento', '$this->seguro', $this->id);");
			$this->nombres=$nombres;
			$indicesServer = array('REMOTE_ADDR',);
			$ip=$_SERVER['REMOTE_ADDR'];
			$evento="Le asigno los antecedentes medicos al alumno ".$this->nombres;
			$this->db->query("INSERT INTO registro_eventos(ip, usuario, evento, fecha, operacion) VALUES('$ip', '$this->usuario', '$evento', NOW(), 'INSERT');");
			header('location: ?view=alumno&mode=AddGenerales&id='.$this->id.'&success=1');
		}
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


		////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		// metodo para agregar la informacion general //
		// ruta del archivo que envia los datos html/alumnos/addGenerales.php //
		public function AddGenerales($usuario, $nombres){
			$this->usuario=$usuario;
			$this->id=intval($_GET['id']);
			$this->extracurricular=$this->db->real_escape_string($_POST['extracurricular']);
			$this->extracurricular=trim($this->extracurricular);
			if(isset($_POST['voleibol'])){
				$this->voleibol=$this->db->real_escape_string($_POST['voleibol']);
			}else{
				$this->voleibol="No";
			}
			if(isset($_POST['basquetbol'])){
				$this->basquetbol=$this->db->real_escape_string($_POST['basquetbol']);
			}else{
				$this->basquetbol="No";
			}
			if(isset($_POST['futbolito'])){
				$this->futbolito=$this->db->real_escape_string($_POST['futbolito']);
			}else{
				$this->futbolito="No";
			}
			if(isset($_POST['ajedrez'])){
				$this->ajedrez=$this->db->real_escape_string($_POST['ajedrez']);
			}else{
				$this->ajedrez="No";
			}
			if(isset($_POST['danza'])){
				$this->danza=$this->db->real_escape_string($_POST['danza']);
			}else{
				$this->danza="No";
			}
			if(isset($_POST['teatro'])){
				$this->teatro=$this->db->real_escape_string($_POST['teatro']);
			}else{
				$this->teatro="No";
			}
			if(isset($_POST['musica'])){
				$this->musica=$this->db->real_escape_string($_POST['musica']);
			}else{
				$this->musica="No";
			}
			if(isset($_POST['bolivariana'])){
				$this->bolivariana=$this->db->real_escape_string($_POST['bolivariana']);
			}else{
				$this->bolivariana="No";
			}
			if(isset($_POST['cruz'])){
				$this->cruz=$this->db->real_escape_string($_POST['cruz']);
			}else{
				$this->cruz="No";
			}
			if(isset($_POST['biblioteca'])){
				$this->biblioteca=$this->db->real_escape_string($_POST['biblioteca']);
			}else{
				$this->biblioteca="No";
			}
			if(isset($_POST['mantenimiento'])){
				$this->mantenimiento=$this->db->real_escape_string($_POST['mantenimiento']);
			}else{
				$this->mantenimiento="No";
			}
			if(isset($_POST['conservacion'])){
				$this->conservacion=$this->db->real_escape_string($_POST['conservacion']);
			}else{
				$this->conservacion="No";
			}
			if(isset($_POST['canaima'])){
				if($_POST['canaima']=="Si"){
					$this->condiciones=$this->db->real_escape_string($_POST['condiciones']);
					$this->condiciones=trim($this->condiciones);
					$this->serial=$this->db->real_escape_string($_POST['serial']);
					$this->serial=trim($this->serial);
					$this->motivo="";
					$this->denuncia="";
				}else if($_POST['canaima']=="No"){
					$this->motivo=$this->db->real_escape_string($_POST['motivo']);
					$this->motivo=trim($this->motivo);
					$this->denuncia=$this->db->real_escape_string($_POST['denuncia']);
					$this->denuncia=trim($this->denuncia);
					$this->condiciones="";
					$this->serial="";
				}else{
					$this->condiciones="";
					$this->serial="";
					$this->motivo="";
					$this->denuncia="";
				}
			}else{
				$this->condiciones="";
				$this->serial="";
				$this->motivo="";
				$this->denuncia="";
			}
			$this->db->query("INSERT INTO act_intereses(act_extra, voleibol, basquet, futbolito, ajedrez, danza, teatro, musica, soc_boliv, cruz_roja, biblioteca, mantenimiento, conservacion, condiciones, motivo, num_serial, denuncia, id_alum) VALUES('$this->extracurricular', '$this->voleibol', '$this->basquetbol', '$this->futbolito', '$this->ajedrez', '$this->danza', '$this->teatro', '$this->musica', '$this->bolivariana', '$this->cruz', '$this->biblioteca', '$this->mantenimiento', '$this->conservacion', '$this->condiciones', '$this->motivo', '$this->serial', '$this->denuncia', $this->id);");
			$this->nombres=$nombres;
			$indicesServer = array('REMOTE_ADDR',);
			$ip=$_SERVER['REMOTE_ADDR'];
			$evento="Le asigno la informacion general al alumno ".$this->nombres;
			$this->db->query("INSERT INTO registro_eventos(ip, usuario, evento, fecha, operacion) VALUES('$ip', '$this->usuario', '$evento', NOW(), 'INSERT');");
			header('location: ?view=alumno&mode=AddAntrometricas&id='.$this->id.'&success=1');
		}
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

		////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		// metodo para agregar las medidas antropometricas //
		// ruta del archivo que envia los datos html/alumnos/addGenerales.php //
		public function AddAntropometricas($usuario, $nombres){
			$this->usuario=$usuario;
			$this->id=intval($_GET['id']);
			$this->peso=$this->db->real_escape_string($_POST['peso']);
			$this->peso=trim($this->peso);
			$this->parado=$this->db->real_escape_string($_POST['parado']);
			$this->parado=trim($this->parado);
			$this->sentado=$this->db->real_escape_string($_POST['sentado']);
			$this->sentado=trim($this->sentado);
			$this->brazada=$this->db->real_escape_string($_POST['brazada']);
			$this->brazada=trim($this->brazada);
			$this->salto=$this->db->real_escape_string($_POST['salto']);
			$this->salto=trim($this->salto);
			$this->abdominales=$this->db->real_escape_string($_POST['abdominales']);
			$this->abdominales=trim($this->abdominales);
			$this->flexiones=$this->db->real_escape_string($_POST['flexiones']);
			$this->flexiones=trim($this->flexiones);
			$this->suma=$this->db->real_escape_string($_POST['suma']);
			$this->suma=trim($this->suma);
			$this->velocidad=$this->db->real_escape_string($_POST['velocidad']);
			$this->velocidad=trim($this->velocidad);
			$this->flexion=$this->db->real_escape_string($_POST['flexion']);
			$this->flexion=trim($this->flexion);
			$this->resistencia=$this->db->real_escape_string($_POST['resistencia']);
			$this->resistencia=trim($this->resistencia);
			$this->db->query("INSERT INTO antropometricas(peso, parado, sentado, brazada, salto, abdominales, flexiones, suma_fuerzas, velocidad, flexibilidad, resistencia, id_alum) VALUES('$this->peso', '$this->parado', '$this->sentado', '$this->brazada', '$this->salto', '$this->abdominales', '$this->flexiones', '$this->suma', '$this->velocidad', '$this->flexion', '$this->resistencia', $this->id);");
			$this->nombres=$nombres;
			$indicesServer = array('REMOTE_ADDR',);
			$ip=$_SERVER['REMOTE_ADDR'];
			$evento="Le asigno las medidas antropometricas al alumno ".$this->nombres;
			$this->db->query("INSERT INTO registro_eventos(ip, usuario, evento, fecha, operacion) VALUES('$ip', '$this->usuario', '$evento', NOW(), 'INSERT');");
			header('location: ?view=alumno&mode=AddAlumno&success=1');
		}
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

		////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		// metodo para editar los personales del alumno //
		// ruta del archivo que envia los datos html/alumnos/editEstudiante.php //
		public function EditAlumno($usuario){
			$this->usuario=$usuario;
			$this->id=intval($_GET['id']);
			$this->nombreCarnet=$_FILES['foto_carnet']['name'];
			$this->nombreCedula=$_FILES['foto_cedula']['name'];
			$this->cedula=$this->db->real_escape_string($_POST['cedula']);
			$this->cedulaEscolar=$this->db->real_escape_string($_POST['ced_esc']);
			$this->posicionParto=$this->db->real_escape_string($_POST['parto']);
			$this->posicionParto=trim(strtolower($this->posicionParto));
			$this->posicionParto=ucwords($this->posicionParto);
			$this->fechaNacimiento=$this->db->real_escape_string($_POST['fecha']);
			$this->fechaNacimiento=date("Y-m-d", strtotime($this->fechaNacimiento));
			$this->apellidos=$this->db->real_escape_string($_POST['apellidos']);
			$this->apellidos=trim(strtolower($this->apellidos));
			$this->apellidos=ucwords($this->apellidos);
			$this->nombres=$this->db->real_escape_string($_POST['nombres']);
			$this->nombres=trim(strtolower($this->nombres));
			$this->nombres=ucwords($this->nombres);
			$this->edad=$this->db->real_escape_string($_POST['edad']);
			$this->lugarNacimiento=$this->db->real_escape_string($_POST['lugar']);
			$this->lugarNacimiento=trim(strtolower($this->lugarNacimiento));
			$this->lugarNacimiento=ucwords($this->lugarNacimiento);
			$this->sexo=$this->db->real_escape_string($_POST['sexo']);
			$this->pais=$this->db->real_escape_string($_POST['pais']);
			$this->estado=$this->db->real_escape_string($_POST['estado']);
			$this->codTlfCelular=$this->db->real_escape_string($_POST['codcelular']);
			$this->tlfCelular=$this->db->real_escape_string($_POST['tlfcelular']);
			$this->correo=$this->db->real_escape_string($_POST['correo']);
			$this->correo=trim($this->correo);
			$this->direccion=$this->db->real_escape_string($_POST['direccion']);
			$this->direccion=trim(strtolower($this->direccion));
			$this->direccion=ucwords($this->direccion);
			if(isset($_POST['hermano'])){
				$this->hermanos=$this->db->real_escape_string($_POST['hermano']);
			}else{
				$this->hermanos="";
			}
			if(isset($_POST['representante'])){
				$this->representante=$this->db->real_escape_string($_POST['representante']);
				if($this->representante=="Madre" || $this->representante=="Padre"){
					$this->especifique="";
					$this->lopna="";
					$this->fechaVencimiento="";
				}else if($this->representante=="Otro"){
					$this->especifique=$_POST['especifique'];
					if(isset($_POST['lopna'])){
						$this->lopna=$_POST['lopna'];
						if($this->lopna=="Si"){
							$this->fechaVencimiento=$_POST['vencimiento'];
							if($this->fechaVencimiento!=""){
								$this->fechaVencimiento=date("Y-m-d", strtotime($this->fechaVencimiento));
							}else{
								$this->fechaVencimiento="";
							}
						}else if($this->lopna=="No"){
							$this->fechaVencimiento="";
						}
					}else{
						$this->lopna="";
						$this->fechaVencimiento="";
					}
				}
			}else{
				$this->representante="";
				$this->especifique="";
				$this->lopna="";
				$this->fechaVencimiento="";
			}
			$sql=$this->db->query("SELECT * FROM alumnos WHERE cedula=$this->cedula;");
			if($this->db->rows($sql)==0){
				$this->db->query("UPDATE alumnos SET cedula=$this->cedula, ced_escolar='$this->cedulaEscolar', pos_parto='$this->posicionParto', apellidos='$this->apellidos', nombres='$this->nombres', lugar_nac='$this->lugarNacimiento', fec_nac='$this->fechaNacimiento', edad='$this->edad', direccion='$this->direccion', hermano='$this->hermanos', repre='$this->representante', especifique='$this->especifique', fec_lopna='$this->fechaVencimiento', sexo='$this->sexo', id_estado=$this->estado, id_pais=$this->pais, correo='$this->correo', id_tlf_cel=$this->codTlfCelular, tlf_cel=$this->tlfCelular, lopna='$this->lopna' WHERE id_alum=$this->id LIMIT 1;");
				//Ruta de la carpeta destino en servidor
				$carpeta=$_SERVER['DOCUMENT_ROOT'].'/new_peru/asset/images/alumnos/'.$this->id;
				if(!file_exists($carpeta)){
					mkdir($carpeta, 0777, true);
				}
				if($this->nombreCarnet==""){
					$rutaCarnet="default.png";
				}else{
					$rutaCarnet="/alumnos/".$this->id."/".$this->nombreCarnet;
					//Movemos la imagen del directorio temporal al directorio escogido
					move_uploaded_file($_FILES['foto_carnet']['tmp_name'], $carpeta."/".$this->nombreCarnet);
					$this->db->query("UPDATE alumnos SET foto_carnet='$rutaCarnet' WHERE id_alum=$this->id LIMIT 1;");
				}
				if($this->nombreCedula==""){
					$rutaCedula=$this->nombreCedula="default.png";
				}else{
					$rutaCedula="/alumnos/".$this->id."/".$this->nombreCedula;
					//Movemos la imagen del directorio temporal al directorio escogido
					move_uploaded_file($_FILES['foto_cedula']['tmp_name'], $carpeta."/".$this->nombreCedula);
					$this->db->query("UPDATE alumnos SET foto_cedula='$rutaCedula' WHERE id_alum=$this->id LIMIT 1;");
				}
				$indicesServer = array('REMOTE_ADDR',);
				$ip=$_SERVER['REMOTE_ADDR'];
				$evento="Edito los datos del alumno ".$this->nombres." ".$this->apellidos." con la cedula ".$this->cedula;
				$this->db->query("INSERT INTO registro_eventos(ip, usuario, evento, fecha, operacion) VALUES('$ip', '$this->usuario', '$evento', NOW(), 'UPDATE');");
				$this->db->liberar($sql);
				header('location: ?view=alumno&mode=EditEstudiante&id='.$this->id.'&success=1');
			}else{
				$this->db->liberar($sql);
				$sql=$this->db->query("SELECT * FROM alumnos WHERE cedula=$this->cedula AND id_alum=$this->id LIMIT 1;");
				if($this->db->rows($sql)>0){
					$this->db->query("UPDATE alumnos SET cedula=$this->cedula, ced_escolar='$this->cedulaEscolar', pos_parto='$this->posicionParto', apellidos='$this->apellidos', nombres='$this->nombres', lugar_nac='$this->lugarNacimiento', fec_nac='$this->fechaNacimiento', edad='$this->edad', direccion='$this->direccion', hermano='$this->hermanos', repre='$this->representante', especifique='$this->especifique', fec_lopna='$this->fechaVencimiento', sexo='$this->sexo', id_estado=$this->estado, id_pais=$this->pais, correo='$this->correo', id_tlf_cel=$this->codTlfCelular, tlf_cel=$this->tlfCelular, lopna='$this->lopna' WHERE id_alum=$this->id LIMIT 1;");
					//Ruta de la carpeta destino en servidor
					$carpeta=$_SERVER['DOCUMENT_ROOT'].'/new_peru/asset/images/alumnos/'.$this->id;
					if(!file_exists($carpeta)){
						mkdir($carpeta, 0777, true);
					}
					if($this->nombreCarnet==""){
						$rutaCarnet="default.png";
					}else{
						$rutaCarnet="/alumnos/".$this->id."/".$this->nombreCarnet;
						//Movemos la imagen del directorio temporal al directorio escogido
						move_uploaded_file($_FILES['foto_carnet']['tmp_name'], $carpeta."/".$this->nombreCarnet);
						$this->db->query("UPDATE alumnos SET foto_carnet='$rutaCarnet' WHERE id_alum=$this->id LIMIT 1;");
					}
					if($this->nombreCedula==""){
						$rutaCedula=$this->nombreCedula="default.png";
					}else{
						$rutaCedula="/alumnos/".$this->id."/".$this->nombreCedula;
						//Movemos la imagen del directorio temporal al directorio escogido
						move_uploaded_file($_FILES['foto_cedula']['tmp_name'], $carpeta."/".$this->nombreCedula);
						$this->db->query("UPDATE alumnos SET foto_cedula='$rutaCedula' WHERE id_alum=$this->id LIMIT 1;");
					}
					$indicesServer = array('REMOTE_ADDR',);
					$ip=$_SERVER['REMOTE_ADDR'];
					$evento="Edito los datos del alumno ".$this->nombres." ".$this->apellidos." con la cedula ".$this->cedula;
					$this->db->query("INSERT INTO registro_eventos(ip, usuario, evento, fecha, operacion) VALUES('$ip', '$this->usuario', '$evento', NOW(), 'UPDATE');");
					$this->db->liberar($sql);
					header('location: ?view=alumno&mode=EditEstudiante&id='.$this->id.'&success=1');
				}else{
					$this->db->liberar($sql);
					header('location: ?view=alumno&mode=EditEstudiante&id='.$this->id.'&error=2');
				}
			}
		}
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

		////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		// metodo para editar los representantes //
		// ruta del archivo que envia los datos html/alumnos/editEstudiante.php //
		public function EditRepresentantes($usuario, $nombres){
			$this->usuario=$usuario;
			$this->id=intval($_GET['id']);
			if($_POST['madre']!=""){
				$this->madre=$this->db->real_escape_string($_POST['madre']);
				$this->db->query("UPDATE alumnos SET id_madre=$this->madre WHERE id_alum=$this->id LIMIT 1;");
			}
			if($_POST['padre']!=""){
				$this->padre=$this->db->real_escape_string($_POST['padre']);
				$this->db->query("UPDATE alumnos SET id_padre=$this->padre WHERE id_alum=$this->id LIMIT 1;");
			}
			if($_POST['legal']!=""){
				$this->legal=$this->db->real_escape_string($_POST['legal']);
				$this->db->query("UPDATE alumnos SET id_repre=$this->legal WHERE id_alum=$this->id LIMIT 1;");
			}
			if($_POST['suplente']!=""){
				$this->suplente=$this->db->real_escape_string($_POST['suplente']);
				$this->db->query("UPDATE alumnos SET id_repre_sup=$this->suplente WHERE id_alum=$this->id LIMIT 1;");
			}
			$this->nombres=$nombres;
			$indicesServer = array('REMOTE_ADDR',);
			$ip=$_SERVER['REMOTE_ADDR'];
			$evento="Edito los representantes al alumno ".$this->nombres;
			$this->db->query("INSERT INTO registro_eventos(ip, usuario, evento, fecha, operacion) VALUES('$ip', '$this->usuario', '$evento', NOW(), 'UPDATE');");
			header('location: ?view=alumno&mode=EditEstudiante&id='.$this->id.'&success=1');
		}
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

		////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		// metodo para editar los antecedentes medicos //
		// ruta del archivo que envia los datos html/alumnos/editEstudiante.php //
		public function EditMedico($usuario, $nombres){
			$this->usuario=$usuario;
			$this->id=intval($_GET['id']);
			$this->sangre=$this->db->real_escape_string($_POST['sangre']);
			$this->lateralidad=$this->db->real_escape_string($_POST['lateralidad']);
			if(isset($_POST['lentes'])){
				$this->lentes=$this->db->real_escape_string($_POST['lentes']);
			}else{
				$this->lentes="";
			}
			if(isset($_POST['oido'])){
				$this->oido=$this->db->real_escape_string($_POST['oido']);
			}else{
				$this->oido="";
			}
			if(isset($_POST['sarampion'])){
				$this->sarampion=$this->db->real_escape_string($_POST['sarampion']);
			}else{
				$this->sarampion="No";
			}
			if(isset($_POST['rubeola'])){
				$this->rubeola=$this->db->real_escape_string($_POST['rubeola']);
			}else{
				$this->rubeola="No";
			}
			if(isset($_POST['paperas'])){
				$this->paperas=$this->db->real_escape_string($_POST['paperas']);
			}else{
				$this->paperas="No";
			}
			if(isset($_POST['diabetes'])){
				$this->diabetes=$this->db->real_escape_string($_POST['diabetes']);
			}else{
				$this->diabetes="No";
			}
			if(isset($_POST['hipertension'])){
				$this->hipertension=$this->db->real_escape_string($_POST['hipertension']);
			}else{
				$this->hipertension="No";
			}
			if(isset($_POST['cardiopatia'])){
				$this->cardiopatia=$this->db->real_escape_string($_POST['cardiopatia']);
			}else{
				$this->cardiopatia="No";
			}
			if(isset($_POST['asma'])){
				$this->asma=$this->db->real_escape_string($_POST['asma']);
			}else{
				$this->asma="No";
			}
			if(isset($_POST['alergias'])){
				$this->alergias=$this->db->real_escape_string($_POST['alergias']);
			}else{
				$this->alergias="No";
			}
			$this->otras=$this->db->real_escape_string($_POST['otras']);
			$this->otras=trim($this->otras);
			$this->diversidad=$this->db->real_escape_string($_POST['diversidad']);
			$this->diversidad=trim($this->diversidad);
			if(isset($_POST['psicologo1'])){
				$this->psicologo1=$this->db->real_escape_string($_POST['psicologo1']);
			}else{
				$this->psicologo1="No";
			}
			if(isset($_POST['tera_lenguaje1'])){
				$this->tera_lenguaje1=$this->db->real_escape_string($_POST['tera_lenguaje1']);
			}else{
				$this->tera_lenguaje1="No";
			}
			if(isset($_POST['neurologo1'])){
				$this->neurologo1=$this->db->real_escape_string($_POST['neurologo1']);
			}else{
				$this->neurologo1="No";
			}
			if(isset($_POST['tera_ocupacional1'])){
				$this->tera_ocupacional1=$this->db->real_escape_string($_POST['tera_ocupacional1']);
			}else{
				$this->tera_ocupacional1="No";
			}
			if(isset($_POST['psiquiatria1'])){
				$this->psiquiatria1=$this->db->real_escape_string($_POST['psiquiatria1']);
			}else{
				$this->psiquiatria1="No";
			}
			if(isset($_POST['odontologia1'])){
				$this->odontologia1=$this->db->real_escape_string($_POST['odontologia1']);
			}else{
				$this->odontologia1="No";
			}
			if(isset($_POST['dermatologia1'])){
				$this->dermatologia1=$this->db->real_escape_string($_POST['dermatologia1']);
			}else{
				$this->dermatologia1="No";
			}
			if(isset($_POST['fisiatria1'])){
				$this->fisiatria1=$this->db->real_escape_string($_POST['fisiatria1']);
			}else{
				$this->fisiatria1="No";
			}
			if(isset($_POST['psicopedagogia1'])){
				$this->psicopedagogia1=$this->db->real_escape_string($_POST['psicopedagogia1']);
			}else{
				$this->psicopedagogia1="No";
			}
			$this->otros1=$this->db->real_escape_string($_POST['otros1']);
			$this->otros1=trim($this->otros1);
			if(isset($_POST['psicologo2'])){
				$this->psicologo2=$this->db->real_escape_string($_POST['psicologo2']);
			}else{
				$this->psicologo2="No";
			}
			if(isset($_POST['tera_lenguaje2'])){
				$this->tera_lenguaje2=$this->db->real_escape_string($_POST['tera_lenguaje2']);
			}else{
				$this->tera_lenguaje2="No";
			}
			if(isset($_POST['neurologo2'])){
				$this->neurologo2=$this->db->real_escape_string($_POST['neurologo2']);
			}else{
				$this->neurologo2="No";
			}
			if(isset($_POST['tera_ocupacional2'])){
				$this->tera_ocupacional2=$this->db->real_escape_string($_POST['tera_ocupacional2']);
			}else{
				$this->tera_ocupacional2="No";
			}
			if(isset($_POST['psiquiatria2'])){
				$this->psiquiatria2=$this->db->real_escape_string($_POST['psiquiatria2']);
			}else{
				$this->psiquiatria2="No";
			}
			if(isset($_POST['odontologia2'])){
				$this->odontologia2=$this->db->real_escape_string($_POST['odontologia2']);
			}else{
				$this->odontologia2="No";
			}
			if(isset($_POST['dermatologia2'])){
				$this->dermatologia2=$this->db->real_escape_string($_POST['dermatologia2']);
			}else{
				$this->dermatologia2="No";
			}
			if(isset($_POST['fisiatria2'])){
				$this->fisiatria2=$this->db->real_escape_string($_POST['fisiatria2']);
			}else{
				$this->fisiatria2="No";
			}
			if(isset($_POST['psicopedagogia2'])){
				$this->psicopedagogia2=$this->db->real_escape_string($_POST['psicopedagogia2']);
			}else{
				$this->psicopedagogia2="No";
			}
			$this->otros2=$this->db->real_escape_string($_POST['otros2']);
			$this->otros2=trim($this->otros2);
			$this->tratamiento=$this->db->real_escape_string($_POST['tratamiento']);
			$this->tratamiento=trim($this->tratamiento);
			$this->medicado=$this->db->real_escape_string($_POST['medicado']);
			$this->medicado=trim($this->medicado);
			$this->impedimiento=$this->db->real_escape_string($_POST['impedimiento']);
			$this->impedimiento=trim($this->impedimiento);
			$this->seguro=$this->db->real_escape_string($_POST['seguro']);
			$this->seguro=trim($this->seguro);
			$this->db->query("UPDATE ante_medicos SET id_tipo_sangre=$this->sangre, lateralidad='$this->lateralidad', lentes='$this->lentes', oido='$this->oido', sarampion='$this->sarampion', rubeola='$this->rubeola', paperas='$this->paperas', diabetes='$this->diabetes', hipertension='$this->hipertension', cardiopatia='$this->cardiopatia', asma='$this->asma', alergias='$this->alergias', descrip_otras='$this->otras', diversidad='$this->diversidad', psicolo1='$this->psicologo1', tera_lengua1='$this->tera_lenguaje1', psicopedagogia1='$this->psicopedagogia1', neurolo1='$this->neurologo1', tera_ocup1='$this->tera_ocupacional1', psiquiatria1='$this->psiquiatria1', odontologia1='$this->odontologia1', dermatologia1='$this->dermatologia1', fisiatria1='$this->fisiatria1', otro_esp1='$this->otros1', psicolo2='$this->psicologo2', tera_lengua2='$this->tera_lenguaje2', psicopedagogia2='$this->psicopedagogia2', neurolo2='$this->neurologo2', tera_ocup2='$this->tera_ocupacional2', psiquiatria2='$this->psiquiatria2', odontologia2='$this->odontologia2', dermatologia2='$this->dermatologia2', fisiatria2='$this->fisiatria2', otro_esp2='$this->otros2', lugar_trata='$this->tratamiento', act_medicado='$this->medicado', imp_depor='$this->impedimiento', seg_med='$this->seguro' WHERE id_alum=$this->id LIMIT 1;");
			$this->nombres=$nombres;
			$indicesServer = array('REMOTE_ADDR',);
			$ip=$_SERVER['REMOTE_ADDR'];
			$evento="Edito los antecedentes medicos al alumno ".$this->nombres;
			$this->db->query("INSERT INTO registro_eventos(ip, usuario, evento, fecha, operacion) VALUES('$ip', '$this->usuario', '$evento', NOW(), 'UPDATE');");
			header('location: ?view=alumno&mode=EditEstudiante&id='.$this->id.'&success=1');
		}
		///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

		///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		// metodo para editar la informacion general //
		// ruta del archivo que envia los datos html/alumnos/editEstudiante.php //
		public function EditGenerales($usuario, $nombres){
			$this->usuario=$usuario;
			$this->id=intval($_GET['id']);
			$this->extracurricular=$this->db->real_escape_string($_POST['extracurricular']);
			$this->extracurricular=trim($this->extracurricular);
			if(isset($_POST['voleibol'])){
				$this->voleibol=$this->db->real_escape_string($_POST['voleibol']);
			}else{
				$this->voleibol="No";
			}
			if(isset($_POST['basquetbol'])){
				$this->basquetbol=$this->db->real_escape_string($_POST['basquetbol']);
			}else{
				$this->basquetbol="No";
			}
			if(isset($_POST['futbolito'])){
				$this->futbolito=$this->db->real_escape_string($_POST['futbolito']);
			}else{
				$this->futbolito="No";
			}
			if(isset($_POST['ajedrez'])){
				$this->ajedrez=$this->db->real_escape_string($_POST['ajedrez']);
			}else{
				$this->ajedrez="No";
			}
			if(isset($_POST['danza'])){
				$this->danza=$this->db->real_escape_string($_POST['danza']);
			}else{
				$this->danza="No";
			}
			if(isset($_POST['teatro'])){
				$this->teatro=$this->db->real_escape_string($_POST['teatro']);
			}else{
				$this->teatro="No";
			}
			if(isset($_POST['musica'])){
				$this->musica=$this->db->real_escape_string($_POST['musica']);
			}else{
				$this->musica="No";
			}
			if(isset($_POST['bolivariana'])){
				$this->bolivariana=$this->db->real_escape_string($_POST['bolivariana']);
			}else{
				$this->bolivariana="No";
			}
			if(isset($_POST['cruz'])){
				$this->cruz=$this->db->real_escape_string($_POST['cruz']);
			}else{
				$this->cruz="No";
			}
			if(isset($_POST['biblioteca'])){
				$this->biblioteca=$this->db->real_escape_string($_POST['biblioteca']);
			}else{
				$this->biblioteca="No";
			}
			if(isset($_POST['mantenimiento'])){
				$this->mantenimiento=$this->db->real_escape_string($_POST['mantenimiento']);
			}else{
				$this->mantenimiento="No";
			}
			if(isset($_POST['conservacion'])){
				$this->conservacion=$this->db->real_escape_string($_POST['conservacion']);
			}else{
				$this->conservacion="No";
			}
			if(isset($_POST['canaima'])){
				if($_POST['canaima']=="Si"){
					$this->condiciones=$this->db->real_escape_string($_POST['condiciones']);
					$this->condiciones=trim($this->condiciones);
					$this->serial=$this->db->real_escape_string($_POST['serial']);
					$this->serial=trim($this->serial);
					$this->motivo="";
					$this->denuncia="";
				}else if($_POST['canaima']=="No"){
					$this->motivo=$this->db->real_escape_string($_POST['motivo']);
					$this->motivo=trim($this->motivo);
					$this->denuncia=$this->db->real_escape_string($_POST['denuncia']);
					$this->denuncia=trim($this->denuncia);
					$this->condiciones="";
					$this->serial="";
				}else{
					$this->condiciones="";
					$this->serial="";
					$this->motivo="";
					$this->denuncia="";
				}
			}else{
				$this->condiciones="";
				$this->serial="";
				$this->motivo="";
				$this->denuncia="";
			}
			$this->db->query("UPDATE act_intereses SET act_extra='$this->extracurricular', voleibol='$this->voleibol', basquet='$this->basquetbol', futbolito='$this->futbolito', ajedrez='$this->ajedrez', danza='$this->danza', teatro='$this->teatro', musica='$this->musica', soc_boliv='$this->bolivariana', cruz_roja='$this->cruz', biblioteca='$this->biblioteca', mantenimiento='$this->mantenimiento', conservacion='$this->conservacion', condiciones='$this->condiciones', motivo='$this->motivo', num_serial='$this->serial', denuncia='$this->denuncia' WHERE id_alum=$this->id LIMIT 1;");
			$this->nombres=$nombres;
			$indicesServer = array('REMOTE_ADDR',);
			$ip=$_SERVER['REMOTE_ADDR'];
			$evento="Edito la informacion general al alumno ".$this->nombres;
			$this->db->query("INSERT INTO registro_eventos(ip, usuario, evento, fecha, operacion) VALUES('$ip', '$this->usuario', '$evento', NOW(), 'UPDATE');");
			header('location: ?view=alumno&mode=EditEstudiante&id='.$this->id.'&success=1');
		}
		///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

		////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		// metodo para agregar las medidas antropometricas //
		// ruta del archivo que envia los datos html/alumnos/editEstudiante.php //
		public function EditAntropometricas($usuario, $nombres){
			$this->usuario=$usuario;
			$this->id=intval($_GET['id']);
			$this->peso=$this->db->real_escape_string($_POST['peso']);
			$this->peso=trim($this->peso);
			$this->parado=$this->db->real_escape_string($_POST['parado']);
			$this->parado=trim($this->parado);
			$this->sentado=$this->db->real_escape_string($_POST['sentado']);
			$this->sentado=trim($this->sentado);
			$this->brazada=$this->db->real_escape_string($_POST['brazada']);
			$this->brazada=trim($this->brazada);
			$this->salto=$this->db->real_escape_string($_POST['salto']);
			$this->salto=trim($this->salto);
			$this->abdominales=$this->db->real_escape_string($_POST['abdominales']);
			$this->abdominales=trim($this->abdominales);
			$this->flexiones=$this->db->real_escape_string($_POST['flexiones']);
			$this->flexiones=trim($this->flexiones);
			$this->suma=$this->db->real_escape_string($_POST['suma']);
			$this->suma=trim($this->suma);
			$this->velocidad=$this->db->real_escape_string($_POST['velocidad']);
			$this->velocidad=trim($this->velocidad);
			$this->flexion=$this->db->real_escape_string($_POST['flexion']);
			$this->flexion=trim($this->flexion);
			$this->resistencia=$this->db->real_escape_string($_POST['resistencia']);
			$this->resistencia=trim($this->resistencia);
			$this->db->query("UPDATE antropometricas SET peso='$this->peso', parado='$this->parado', sentado='$this->sentado', brazada='$this->brazada', salto='$this->salto', abdominales='$this->abdominales', flexiones='$this->flexiones', suma_fuerzas='$this->suma', velocidad='$this->velocidad', flexibilidad='$this->flexion', resistencia='$this->resistencia' WHERE id_alum=$this->id LIMIT 1;");
			$this->nombres=$nombres;
			$indicesServer = array('REMOTE_ADDR',);
			$ip=$_SERVER['REMOTE_ADDR'];
			$evento="Edito las medidas antropometricas al alumno ".$this->nombres;
			$this->db->query("INSERT INTO registro_eventos(ip, usuario, evento, fecha, operacion) VALUES('$ip', '$this->usuario', '$evento', NOW(), 'UPDATE');");
			header('location: ?view=alumno&mode=EditEstudiante&id='.$this->id.'&success=1');
		}
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

		/////////////////////////////////////////
		// metodo para cerrar la conexion //
		public function __destruct(){
			$this->db->close();
		}
		////////////////////////////////////////
	}
?>