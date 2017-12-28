<?php
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			
		//////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
		//	// FUNCIONES NATIVAS DE PHP UTILIZADAS EN ESTA CLASE //                                                     //
		//		// trim -> elimina espacios en blancos al comienzo y al final de la variable //                         //
		//		// ucwords -> convierte la primera letra en mayuscula de cada palabra de la variable //                 //
		//		// mysqli_real_escape_string -> evita la inyeccion sql //                                               //
		//		// strtolower -> convierte en minusculas la variable //                                                 //
		//////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	class Representante{
		private $db;
		private $usuario;
		private $id;
		private $apellidos;
		private $nombres;
		private $cedula;
		private $edad;
		private $instruccion;
		private $ocupacion;
		private $direccionTrabajo;
		private $direccionHabitacion;
		private $correo;
		private $codTlfTrabajo;
		private $tlfTrabajo;
		private $codTlfHabitacion;
		private $tlfHabitacion;
		private $codTlfCelular;
		private $tlfCelular;
		private $parentesco;

		///////////////////////////////////////////
		// metodo para abrir la conexion //
		public function __construct(){
			$this->db=new Conexion();
		}
		//////////////////////////////////////////
		
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		// metodo para agregar a las madres //
		// ruta del archivo que envia los datos: html/representantes/addMadre.php //
		public function AddMadre($usuario){
			$this->cedula=$this->db->real_escape_string($_POST['cedula']);
			$this->cedula=trim($this->cedula);
			$sql=$this->db->query("SELECT * FROM madre WHERE cedula=$this->cedula LIMIT 1;");
			if($this->db->rows($sql)==0){
				$this->usuario=$usuario;
				$this->apellidos=$this->db->real_escape_string($_POST['apellidos']);
				$this->apellidos=trim(strtolower($this->apellidos));
				$this->apellidos=ucwords($this->apellidos);
				$this->nombres=$this->db->real_escape_string($_POST['nombres']);
				$this->nombres=trim(strtolower($this->nombres));
				$this->nombres=ucwords($this->nombres);
				$this->edad=$this->db->real_escape_string($_POST['edad']);
				$this->edad=trim($this->edad);
				$this->instruccion=$this->db->real_escape_string($_POST['instruccion']);
				$this->ocupacion=$this->db->real_escape_string($_POST['ocupacion']);
				$this->ocupacion=trim(strtolower($this->ocupacion));
				$this->ocupacion=ucwords($this->ocupacion);
				$this->direccionTrabajo=$this->db->real_escape_string($_POST['dirtrabajo']);
				$this->direccionTrabajo=trim(strtolower($this->direccionTrabajo));
				$this->direccionTrabajo=ucwords($this->direccionTrabajo);
				$this->direccionHabitacion=$this->db->real_escape_string($_POST['dirhabitacion']);
				$this->direccionHabitacion=trim(strtolower($this->direccionHabitacion));
				$this->direccionHabitacion=ucwords($this->direccionHabitacion);
				$this->correo=$this->db->real_escape_string($_POST['correo']);
				$this->correo=trim($this->correo);
				$this->codTlfTrabajo=$this->db->real_escape_string($_POST['codtlftrabajo']);
				$this->tlfTrabajo=$this->db->real_escape_string($_POST['tlftrabajo']);
				$this->tlfTrabajo=trim($this->tlfTrabajo);
				$this->codTlfHabitacion=$this->db->real_escape_string($_POST['codtlfhabitacion']);
				$this->tlfHabitacion=$this->db->real_escape_string($_POST['tlfhabitacion']);
				$this->tlfHabitacion=trim($this->tlfHabitacion);
				$this->codTlfCelular=$this->db->real_escape_string($_POST['codtlfcelular']);
				$this->tlfCelular=$this->db->real_escape_string($_POST['tlfcelular']);
				$this->tlfCelular=trim($this->tlfCelular);
				$this->db->query("INSERT INTO madre(apellidos, nombres, edad, cedula, ocupacion, dir_empresa, tlf_empresa, dir_hab, tlf_hab, tlf_cel, id_tlf_cel, id_tlf_local, id_status, id_instruccion, cod_emp, correo) VALUES('$this->apellidos', '$this->nombres', '$this->edad', $this->cedula, '$this->ocupacion', '$this->direccionTrabajo', '$this->tlfTrabajo', '$this->direccionHabitacion', '$this->tlfHabitacion', '$this->tlfCelular', $this->codTlfCelular, $this->codTlfHabitacion, 1, $this->instruccion, '$this->codTlfTrabajo', '$this->correo');");
				$indicesServer = array('REMOTE_ADDR',);
				$ip=$_SERVER['REMOTE_ADDR'];
				$evento="Agrego a la madre ".$this->cedula." ".$this->nombres." ".$this->apellidos;
				$this->db->query("INSERT INTO registro_eventos(ip, usuario, evento, fecha, operacion) VALUES('$ip', '$this->usuario', '$evento', NOW(), 'INSERT');");
				$this->db->liberar($sql);
				header('location: ?view=representante&mode=AddMadre&success=1');
			}else{
				$this->db->liberar($sql);
				header('location: ?view=representante&mode=AddMadre&error=2');
			}			
		}
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

		////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		// metodo para editar a las madres //
		// ruta del archivo que envia los datos: html/representantes/editMadre.php //
		public function EditMadre($usuario){
			$this->id=intval($_GET['id']);
			$this->cedula=$this->db->real_escape_string($_POST['cedula']);
			$this->cedula=trim($this->cedula);
			$this->usuario=$usuario;
			$this->apellidos=$this->db->real_escape_string($_POST['apellidos']);
			$this->apellidos=trim(strtolower($this->apellidos));
			$this->apellidos=ucwords($this->apellidos);
			$this->nombres=$this->db->real_escape_string($_POST['nombres']);
			$this->nombres=trim(strtolower($this->nombres));
			$this->nombres=ucwords($this->nombres);
			$this->edad=$this->db->real_escape_string($_POST['edad']);
			$this->edad=trim($this->edad);
			$this->instruccion=$this->db->real_escape_string($_POST['instruccion']);
			$this->ocupacion=$this->db->real_escape_string($_POST['ocupacion']);
			$this->ocupacion=trim(strtolower($this->ocupacion));
			$this->ocupacion=ucwords($this->ocupacion);
			$this->direccionTrabajo=$this->db->real_escape_string($_POST['dirtrabajo']);
			$this->direccionTrabajo=trim(strtolower($this->direccionTrabajo));
			$this->direccionTrabajo=ucwords($this->direccionTrabajo);
			$this->direccionHabitacion=$this->db->real_escape_string($_POST['dirhabitacion']);
			$this->direccionHabitacion=trim(strtolower($this->direccionHabitacion));
			$this->direccionHabitacion=ucwords($this->direccionHabitacion);
			$this->correo=$this->db->real_escape_string($_POST['correo']);
			$this->correo=trim($this->correo);
			$this->codTlfTrabajo=$this->db->real_escape_string($_POST['codtlftrabajo']);
			$this->tlfTrabajo=$this->db->real_escape_string($_POST['tlftrabajo']);
			$this->tlfTrabajo=trim($this->tlfTrabajo);
			$this->codTlfHabitacion=$this->db->real_escape_string($_POST['codtlfhabitacion']);
			$this->tlfHabitacion=$this->db->real_escape_string($_POST['tlfhabitacion']);
			$this->tlfHabitacion=trim($this->tlfHabitacion);
			$this->codTlfCelular=$this->db->real_escape_string($_POST['codtlfcelular']);
			$this->tlfCelular=$this->db->real_escape_string($_POST['tlfcelular']);
			$this->tlfCelular=trim($this->tlfCelular);
			$indicesServer = array('REMOTE_ADDR',);
			$ip=$_SERVER['REMOTE_ADDR'];
			$evento="Edito a la madre ".$this->cedula." ".$this->nombres." ".$this->apellidos." con el id ".$this->id;
			$sql=$this->db->query("SELECT * FROM madre WHERE cedula=$this->cedula;");
			if($this->db->rows($sql)==0){
				$this->db->query("UPDATE madre SET apellidos='$this->apellidos', nombres='$this->nombres', edad='$this->edad', cedula=$this->cedula, ocupacion='$this->ocupacion', dir_empresa='$this->direccionTrabajo', tlf_empresa='$this->tlfTrabajo', dir_hab='$this->direccionHabitacion', tlf_hab='$this->tlfHabitacion', tlf_cel='$this->tlfCelular', id_tlf_cel=$this->codTlfCelular, id_tlf_local=$this->codTlfHabitacion, id_instruccion=$this->instruccion, cod_emp='$this->codTlfTrabajo', correo='$this->correo' WHERE id_madre=$this->id LIMIT 1;");
				$this->db->query("INSERT INTO registro_eventos(ip, usuario, evento, fecha, operacion) VALUES('$ip', '$this->usuario', '$evento', NOW(), 'UPDATE');");
				$this->db->liberar($sql);
				header('location: ?view=representante&mode=EditMadre&id='.$this->id.'&success=1');
			}else{
				$this->db->liberar($sql);
				$sql=$this->db->query("SELECT * FROM madre WHERE cedula=$this->cedula AND id_madre=$this->id LIMIT 1;");
				if($this->db->rows($sql)==1){
					$this->db->query("UPDATE madre SET apellidos='$this->apellidos', nombres='$this->nombres', edad='$this->edad', cedula=$this->cedula, ocupacion='$this->ocupacion', dir_empresa='$this->direccionTrabajo', tlf_empresa='$this->tlfTrabajo', dir_hab='$this->direccionHabitacion', tlf_hab='$this->tlfHabitacion', tlf_cel='$this->tlfCelular', id_tlf_cel=$this->codTlfCelular, id_tlf_local=$this->codTlfHabitacion, id_instruccion=$this->instruccion, cod_emp='$this->codTlfTrabajo', correo='$this->correo' WHERE id_madre=$this->id LIMIT 1;");
					$this->db->query("INSERT INTO registro_eventos(ip, usuario, evento, fecha, operacion) VALUES('$ip', '$this->usuario', '$evento', NOW(), 'UPDATE');");
					$this->db->liberar($sql);
					header('location: ?view=representante&mode=EditMadre&id='.$this->id.'&success=1');
				}else{
					$this->db->liberar($sql);
					header('location: ?view=representante&mode=EditMadre&id='.$this->id.'&error=2');
				}
			}			
		}
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

		////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		// metodo para agregar a los padres //
		// ruta del archivo que envia los datos: html/representantes/addPadre.php //
		public function AddPadre($usuario){
			$this->cedula=$this->db->real_escape_string($_POST['cedula']);
			$this->cedula=trim($this->cedula);
			$sql=$this->db->query("SELECT * FROM padre WHERE cedula=$this->cedula LIMIT 1;");
			if($this->db->rows($sql)==0){
				$this->usuario=$usuario;
				$this->apellidos=$this->db->real_escape_string($_POST['apellidos']);
				$this->apellidos=trim(strtolower($this->apellidos));
				$this->apellidos=ucwords($this->apellidos);
				$this->nombres=$this->db->real_escape_string($_POST['nombres']);
				$this->nombres=trim(strtolower($this->nombres));
				$this->nombres=ucwords($this->nombres);
				$this->edad=$this->db->real_escape_string($_POST['edad']);
				$this->edad=trim($this->edad);
				$this->instruccion=$this->db->real_escape_string($_POST['instruccion']);
				$this->ocupacion=$this->db->real_escape_string($_POST['ocupacion']);
				$this->ocupacion=trim(strtolower($this->ocupacion));
				$this->ocupacion=ucwords($this->ocupacion);
				$this->direccionTrabajo=$this->db->real_escape_string($_POST['dirtrabajo']);
				$this->direccionTrabajo=trim(strtolower($this->direccionTrabajo));
				$this->direccionTrabajo=ucwords($this->direccionTrabajo);
				$this->direccionHabitacion=$this->db->real_escape_string($_POST['dirhabitacion']);
				$this->direccionHabitacion=trim(strtolower($this->direccionHabitacion));
				$this->direccionHabitacion=ucwords($this->direccionHabitacion);
				$this->correo=$this->db->real_escape_string($_POST['correo']);
				$this->correo=trim($this->correo);
				$this->codTlfTrabajo=$this->db->real_escape_string($_POST['codtlftrabajo']);
				$this->tlfTrabajo=$this->db->real_escape_string($_POST['tlftrabajo']);
				$this->tlfTrabajo=trim($this->tlfTrabajo);
				$this->codTlfHabitacion=$this->db->real_escape_string($_POST['codtlfhabitacion']);
				$this->tlfHabitacion=$this->db->real_escape_string($_POST['tlfhabitacion']);
				$this->tlfHabitacion=trim($this->tlfHabitacion);
				$this->codTlfCelular=$this->db->real_escape_string($_POST['codtlfcelular']);
				$this->tlfCelular=$this->db->real_escape_string($_POST['tlfcelular']);
				$this->tlfCelular=trim($this->tlfCelular);
				$this->db->query("INSERT INTO padre(apellidos, nombres, edad, cedula, ocupacion, dir_empresa, tlf_empresa, dir_hab, tlf_hab, tlf_cel, id_tlf_cel, id_tlf_local, id_status, id_instruccion, cod_emp, correo) VALUES('$this->apellidos', '$this->nombres', '$this->edad', $this->cedula, '$this->ocupacion', '$this->direccionTrabajo', '$this->tlfTrabajo', '$this->direccionHabitacion', '$this->tlfHabitacion', '$this->tlfCelular', $this->codTlfCelular, $this->codTlfHabitacion, 1, $this->instruccion, '$this->codTlfTrabajo', '$this->correo');");
				$indicesServer = array('REMOTE_ADDR',);
				$ip=$_SERVER['REMOTE_ADDR'];
				$evento="Agrego al padre ".$this->cedula." ".$this->nombres." ".$this->apellidos;
				$this->db->query("INSERT INTO registro_eventos(ip, usuario, evento, fecha, operacion) VALUES('$ip', '$this->usuario', '$evento', NOW(), 'INSERT');");
				$this->db->liberar($sql);
				header('location: ?view=representante&mode=AddPadre&success=1');
			}else{
				$this->db->liberar($sql);
				header('location: ?view=representante&mode=AddPadre&error=2');
			}			
		}
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

		////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		// metodo para editar a los padres //
		// ruta del archivo que envia los datos: html/representantes/editPadre.php //
		public function EditPadre($usuario){
			$this->id=intval($_GET['id']);
			$this->cedula=$this->db->real_escape_string($_POST['cedula']);
			$this->cedula=trim($this->cedula);
			$this->usuario=$usuario;
			$this->apellidos=$this->db->real_escape_string($_POST['apellidos']);
			$this->apellidos=trim(strtolower($this->apellidos));
			$this->apellidos=ucwords($this->apellidos);
			$this->nombres=$this->db->real_escape_string($_POST['nombres']);
			$this->nombres=trim(strtolower($this->nombres));
			$this->nombres=ucwords($this->nombres);
			$this->edad=$this->db->real_escape_string($_POST['edad']);
			$this->edad=trim($this->edad);
			$this->instruccion=$this->db->real_escape_string($_POST['instruccion']);
			$this->ocupacion=$this->db->real_escape_string($_POST['ocupacion']);
			$this->ocupacion=trim(strtolower($this->ocupacion));
			$this->ocupacion=ucwords($this->ocupacion);
			$this->direccionTrabajo=$this->db->real_escape_string($_POST['dirtrabajo']);
			$this->direccionTrabajo=trim(strtolower($this->direccionTrabajo));
			$this->direccionTrabajo=ucwords($this->direccionTrabajo);
			$this->direccionHabitacion=$this->db->real_escape_string($_POST['dirhabitacion']);
			$this->direccionHabitacion=trim(strtolower($this->direccionHabitacion));
			$this->direccionHabitacion=ucwords($this->direccionHabitacion);
			$this->correo=$this->db->real_escape_string($_POST['correo']);
			$this->correo=trim($this->correo);
			$this->codTlfTrabajo=$this->db->real_escape_string($_POST['codtlftrabajo']);
			$this->tlfTrabajo=$this->db->real_escape_string($_POST['tlftrabajo']);
			$this->tlfTrabajo=trim($this->tlfTrabajo);
			$this->codTlfHabitacion=$this->db->real_escape_string($_POST['codtlfhabitacion']);
			$this->tlfHabitacion=$this->db->real_escape_string($_POST['tlfhabitacion']);
			$this->tlfHabitacion=trim($this->tlfHabitacion);
			$this->codTlfCelular=$this->db->real_escape_string($_POST['codtlfcelular']);
			$this->tlfCelular=$this->db->real_escape_string($_POST['tlfcelular']);
			$this->tlfCelular=trim($this->tlfCelular);
			$indicesServer = array('REMOTE_ADDR',);
			$ip=$_SERVER['REMOTE_ADDR'];
			$evento="Edito al padre ".$this->cedula." ".$this->nombres." ".$this->apellidos." con el id ".$this->id;
			$sql=$this->db->query("SELECT * FROM padre WHERE cedula=$this->cedula;");
			if($this->db->rows($sql)==0){
				$this->db->query("UPDATE padre SET apellidos='$this->apellidos', nombres='$this->nombres', edad='$this->edad', cedula=$this->cedula, ocupacion='$this->ocupacion', dir_empresa='$this->direccionTrabajo', tlf_empresa='$this->tlfTrabajo', dir_hab='$this->direccionHabitacion', tlf_hab='$this->tlfHabitacion', tlf_cel='$this->tlfCelular', id_tlf_cel=$this->codTlfCelular, id_tlf_local=$this->codTlfHabitacion, id_instruccion=$this->instruccion, cod_emp='$this->codTlfTrabajo', correo='$this->correo' WHERE id_padre=$this->id LIMIT 1;");
				$this->db->query("INSERT INTO registro_eventos(ip, usuario, evento, fecha, operacion) VALUES('$ip', '$this->usuario', '$evento', NOW(), 'UPDATE');");
				$this->db->liberar($sql);
				header('location: ?view=representante&mode=EditPadre&id='.$this->id.'&success=1');
			}else{
				$this->db->liberar($sql);
				$sql=$this->db->query("SELECT * FROM padre WHERE cedula=$this->cedula AND id_padre=$this->id LIMIT 1;");
				if($this->db->rows($sql)==1){
					$this->db->query("UPDATE padre SET apellidos='$this->apellidos', nombres='$this->nombres', edad='$this->edad', cedula=$this->cedula, ocupacion='$this->ocupacion', dir_empresa='$this->direccionTrabajo', tlf_empresa='$this->tlfTrabajo', dir_hab='$this->direccionHabitacion', tlf_hab='$this->tlfHabitacion', tlf_cel='$this->tlfCelular', id_tlf_cel=$this->codTlfCelular, id_tlf_local=$this->codTlfHabitacion, id_instruccion=$this->instruccion, cod_emp='$this->codTlfTrabajo', correo='$this->correo' WHERE id_padre=$this->id LIMIT 1;");
					$this->db->query("INSERT INTO registro_eventos(ip, usuario, evento, fecha, operacion) VALUES('$ip', '$this->usuario', '$evento', NOW(), 'UPDATE');");
					$this->db->liberar($sql);
					header('location: ?view=representante&mode=EditPadre&id='.$this->id.'&success=1');
				}else{
					$this->db->liberar($sql);
					header('location: ?view=representante&mode=EditPadre&id='.$this->id.'&error=2');
				}
			}			
		}
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

		////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		// metodo para agregar a los representantes legales //
		// ruta del archivo que envia los datos: html/representantes/addLegal.php //
		public function AddLegal($usuario){
			$this->cedula=$this->db->real_escape_string($_POST['cedula']);
			$this->cedula=trim($this->cedula);
			$sql=$this->db->query("SELECT * FROM repre_legal WHERE cedula=$this->cedula LIMIT 1;");
			if($this->db->rows($sql)==0){
				$this->usuario=$usuario;
				$this->apellidos=$this->db->real_escape_string($_POST['apellidos']);
				$this->apellidos=trim(strtolower($this->apellidos));
				$this->apellidos=ucwords($this->apellidos);
				$this->nombres=$this->db->real_escape_string($_POST['nombres']);
				$this->nombres=trim(strtolower($this->nombres));
				$this->nombres=ucwords($this->nombres);
				$this->edad=$this->db->real_escape_string($_POST['edad']);
				$this->edad=trim($this->edad);
				$this->db->query("INSERT INTO repre_legal(apellidos, nombres, edad, cedula, id_status) VALUES('$this->apellidos', '$this->nombres', '$this->edad', $this->cedula, 1);");
				$indicesServer = array('REMOTE_ADDR',);
				$ip=$_SERVER['REMOTE_ADDR'];
				$evento="Agrego al representante legal ".$this->cedula." ".$this->nombres." ".$this->apellidos;
				$this->db->query("INSERT INTO registro_eventos(ip, usuario, evento, fecha, operacion) VALUES('$ip', '$this->usuario', '$evento', NOW(), 'INSERT');");
				$this->db->liberar($sql);
				header('location: ?view=representante&mode=AddLegal&success=1');
			}else{
				$this->db->liberar($sql);
				header('location: ?view=representante&mode=AddLegal&error=2');
			}			
		}
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

		////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		// metodo para editar a los representantes legales //
		// ruta del archivo que envia los datos: html/representantes/editLegal.php //
		public function EditLegal($usuario){
			$this->id=intval($_GET['id']);
			$this->cedula=$this->db->real_escape_string($_POST['cedula']);
			$this->cedula=trim($this->cedula);
			$this->usuario=$usuario;
			$this->apellidos=$this->db->real_escape_string($_POST['apellidos']);
			$this->apellidos=trim(strtolower($this->apellidos));
			$this->apellidos=ucwords($this->apellidos);
			$this->nombres=$this->db->real_escape_string($_POST['nombres']);
			$this->nombres=trim(strtolower($this->nombres));
			$this->nombres=ucwords($this->nombres);
			$this->edad=$this->db->real_escape_string($_POST['edad']);
			$this->edad=trim($this->edad);
			$indicesServer = array('REMOTE_ADDR',);
			$ip=$_SERVER['REMOTE_ADDR'];
			$evento="Edito al representante legal ".$this->cedula." ".$this->nombres." ".$this->apellidos." con el id ".$this->id;
			$sql=$this->db->query("SELECT * FROM repre_legal WHERE cedula=$this->cedula;");
			if($this->db->rows($sql)==0){
				$this->db->query("UPDATE repre_legal SET apellidos='$this->apellidos', nombres='$this->nombres', edad='$this->edad', cedula=$this->cedula WHERE id_repre=$this->id LIMIT 1;");
				$this->db->query("INSERT INTO registro_eventos(ip, usuario, evento, fecha, operacion) VALUES('$ip', '$this->usuario', '$evento', NOW(), 'UPDATE');");
				$this->db->liberar($sql);
				header('location: ?view=representante&mode=EditLegal&id='.$this->id.'&success=1');
			}else{
				$this->db->liberar($sql);
				$sql=$this->db->query("SELECT * FROM repre_legal WHERE cedula=$this->cedula AND id_repre=$this->id LIMIT 1;");
				if($this->db->rows($sql)==1){
					$this->db->query("UPDATE repre_legal SET apellidos='$this->apellidos', nombres='$this->nombres', edad='$this->edad', cedula=$this->cedula WHERE id_repre=$this->id LIMIT 1;");
					$this->db->query("INSERT INTO registro_eventos(ip, usuario, evento, fecha, operacion) VALUES('$ip', '$this->usuario', '$evento', NOW(), 'UPDATE');");
					$this->db->liberar($sql);
					header('location: ?view=representante&mode=EditLegal&id='.$this->id.'&success=1');
				}else{
					$this->db->liberar($sql);
					header('location: ?view=representante&mode=EditLegal&id='.$this->id.'&error=2');
				}
			}			
		}
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

		////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		// metodo para agregar a los representantes suplentes //
		// ruta del archivo que envia los datos: html/representantes/addSuplente.php //
		public function AddSuplente($usuario){
			$this->cedula=$this->db->real_escape_string($_POST['cedula']);
			$this->cedula=trim($this->cedula);
			$sql=$this->db->query("SELECT * FROM repre_sup WHERE cedula=$this->cedula LIMIT 1;");
			if($this->db->rows($sql)==0){
				$this->usuario=$usuario;
				$this->parentesco=$this->db->real_escape_string($_POST['parentesco']);
				$this->parentesco=trim(strtolower($this->parentesco));
				$this->parentesco=ucwords($this->parentesco);
				$this->apellidos=$this->db->real_escape_string($_POST['apellidos']);
				$this->apellidos=trim(strtolower($this->apellidos));
				$this->apellidos=ucwords($this->apellidos);
				$this->nombres=$this->db->real_escape_string($_POST['nombres']);
				$this->nombres=trim(strtolower($this->nombres));
				$this->nombres=ucwords($this->nombres);
				$this->edad=$this->db->real_escape_string($_POST['edad']);
				$this->edad=trim($this->edad);
				$this->instruccion=$this->db->real_escape_string($_POST['instruccion']);
				$this->ocupacion=$this->db->real_escape_string($_POST['ocupacion']);
				$this->ocupacion=trim(strtolower($this->ocupacion));
				$this->ocupacion=ucwords($this->ocupacion);
				$this->direccionTrabajo=$this->db->real_escape_string($_POST['dirtrabajo']);
				$this->direccionTrabajo=trim(strtolower($this->direccionTrabajo));
				$this->direccionTrabajo=ucwords($this->direccionTrabajo);
				$this->direccionHabitacion=$this->db->real_escape_string($_POST['dirhabitacion']);
				$this->direccionHabitacion=trim(strtolower($this->direccionHabitacion));
				$this->direccionHabitacion=ucwords($this->direccionHabitacion);
				$this->correo=$this->db->real_escape_string($_POST['correo']);
				$this->correo=trim($this->correo);
				$this->codTlfTrabajo=$this->db->real_escape_string($_POST['codtlftrabajo']);
				$this->tlfTrabajo=$this->db->real_escape_string($_POST['tlftrabajo']);
				$this->tlfTrabajo=trim($this->tlfTrabajo);
				$this->codTlfHabitacion=$this->db->real_escape_string($_POST['codtlfhabitacion']);
				$this->tlfHabitacion=$this->db->real_escape_string($_POST['tlfhabitacion']);
				$this->tlfHabitacion=trim($this->tlfHabitacion);
				$this->codTlfCelular=$this->db->real_escape_string($_POST['codtlfcelular']);
				$this->tlfCelular=$this->db->real_escape_string($_POST['tlfcelular']);
				$this->tlfCelular=trim($this->tlfCelular);
				$this->db->query("INSERT INTO repre_sup(parentesco, apellidos, nombres, edad, cedula, ocupacion, dir_emp, tlf_emp, dir_hab, tlf_hab, tlf_cel, id_tlf_cel, id_tlf_local, id_status, id_instruccion, cod_emp, correo) VALUES('$this->parentesco', '$this->apellidos', '$this->nombres', '$this->edad', $this->cedula, '$this->ocupacion', '$this->direccionTrabajo', '$this->tlfTrabajo', '$this->direccionHabitacion', '$this->tlfHabitacion', '$this->tlfCelular', $this->codTlfCelular, $this->codTlfHabitacion, 1, $this->instruccion, '$this->codTlfTrabajo', '$this->correo');");
				$indicesServer = array('REMOTE_ADDR',);
				$ip=$_SERVER['REMOTE_ADDR'];
				$evento="Agrego al representante suplente ".$this->cedula." ".$this->nombres." ".$this->apellidos;
				$this->db->query("INSERT INTO registro_eventos(ip, usuario, evento, fecha, operacion) VALUES('$ip', '$this->usuario', '$evento', NOW(), 'INSERT');");
				$this->db->liberar($sql);
				header('location: ?view=representante&mode=AddSuplente&success=1');
			}else{
				$this->db->liberar($sql);
				header('location: ?view=representante&mode=AddSuplente&error=2');
			}			
		}
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

		////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		// metodo para editar a los padres //
		// ruta del archivo que envia los datos: html/representantes/editPadre.php //
		public function EditSuplente($usuario){
			$this->id=intval($_GET['id']);
			$this->cedula=$this->db->real_escape_string($_POST['cedula']);
			$this->cedula=trim($this->cedula);
			$this->usuario=$usuario;
			$this->parentesco=$this->db->real_escape_string($_POST['parentesco']);
			$this->parentesco=trim(strtolower($this->parentesco));
			$this->parentesco=ucwords($this->parentesco);
			$this->apellidos=$this->db->real_escape_string($_POST['apellidos']);
			$this->apellidos=trim(strtolower($this->apellidos));
			$this->apellidos=ucwords($this->apellidos);
			$this->nombres=$this->db->real_escape_string($_POST['nombres']);
			$this->nombres=trim(strtolower($this->nombres));
			$this->nombres=ucwords($this->nombres);
			$this->edad=$this->db->real_escape_string($_POST['edad']);
			$this->edad=trim($this->edad);
			$this->instruccion=$this->db->real_escape_string($_POST['instruccion']);
			$this->ocupacion=$this->db->real_escape_string($_POST['ocupacion']);
			$this->ocupacion=trim(strtolower($this->ocupacion));
			$this->ocupacion=ucwords($this->ocupacion);
			$this->direccionTrabajo=$this->db->real_escape_string($_POST['dirtrabajo']);
			$this->direccionTrabajo=trim(strtolower($this->direccionTrabajo));
			$this->direccionTrabajo=ucwords($this->direccionTrabajo);
			$this->direccionHabitacion=$this->db->real_escape_string($_POST['dirhabitacion']);
			$this->direccionHabitacion=trim(strtolower($this->direccionHabitacion));
			$this->direccionHabitacion=ucwords($this->direccionHabitacion);
			$this->correo=$this->db->real_escape_string($_POST['correo']);
			$this->correo=trim($this->correo);
			$this->codTlfTrabajo=$this->db->real_escape_string($_POST['codtlftrabajo']);
			$this->tlfTrabajo=$this->db->real_escape_string($_POST['tlftrabajo']);
			$this->tlfTrabajo=trim($this->tlfTrabajo);
			$this->codTlfHabitacion=$this->db->real_escape_string($_POST['codtlfhabitacion']);
			$this->tlfHabitacion=$this->db->real_escape_string($_POST['tlfhabitacion']);
			$this->tlfHabitacion=trim($this->tlfHabitacion);
			$this->codTlfCelular=$this->db->real_escape_string($_POST['codtlfcelular']);
			$this->tlfCelular=$this->db->real_escape_string($_POST['tlfcelular']);
			$this->tlfCelular=trim($this->tlfCelular);
			$indicesServer = array('REMOTE_ADDR',);
			$ip=$_SERVER['REMOTE_ADDR'];
			$evento="Edito al representante suplente ".$this->cedula." ".$this->nombres." ".$this->apellidos." con el id ".$this->id;
			$sql=$this->db->query("SELECT * FROM repre_sup WHERE cedula=$this->cedula;");
			if($this->db->rows($sql)==0){
				$this->db->query("UPDATE repre_sup SET parentesco='$this->parentesco', apellidos='$this->apellidos', nombres='$this->nombres', edad='$this->edad', cedula=$this->cedula, ocupacion='$this->ocupacion', dir_emp='$this->direccionTrabajo', tlf_emp='$this->tlfTrabajo', dir_hab='$this->direccionHabitacion', tlf_hab='$this->tlfHabitacion', tlf_cel='$this->tlfCelular', id_tlf_cel=$this->codTlfCelular, id_tlf_local=$this->codTlfHabitacion, id_instruccion=$this->instruccion, cod_emp='$this->codTlfTrabajo', correo='$this->correo' WHERE id_repre_Sup=$this->id LIMIT 1;");
				$this->db->query("INSERT INTO registro_eventos(ip, usuario, evento, fecha, operacion) VALUES('$ip', '$this->usuario', '$evento', NOW(), 'UPDATE');");
				$this->db->liberar($sql);
				header('location: ?view=representante&mode=EditSuplente&id='.$this->id.'&success=1');
			}else{
				$this->db->liberar($sql);
				$sql=$this->db->query("SELECT * FROM repre_sup WHERE cedula=$this->cedula AND id_repre_Sup=$this->id LIMIT 1;");
				if($this->db->rows($sql)==1){
					$this->db->query("UPDATE repre_sup SET parentesco='$this->parentesco', apellidos='$this->apellidos', nombres='$this->nombres', edad='$this->edad', cedula=$this->cedula, ocupacion='$this->ocupacion', dir_emp='$this->direccionTrabajo', tlf_emp='$this->tlfTrabajo', dir_hab='$this->direccionHabitacion', tlf_hab='$this->tlfHabitacion', tlf_cel='$this->tlfCelular', id_tlf_cel=$this->codTlfCelular, id_tlf_local=$this->codTlfHabitacion, id_instruccion=$this->instruccion, cod_emp='$this->codTlfTrabajo', correo='$this->correo' WHERE id_repre_Sup=$this->id LIMIT 1;");
					$this->db->query("INSERT INTO registro_eventos(ip, usuario, evento, fecha, operacion) VALUES('$ip', '$this->usuario', '$evento', NOW(), 'UPDATE');");
					$this->db->liberar($sql);
					header('location: ?view=representante&mode=EditSuplente&id='.$this->id.'&success=1');
				}else{
					$this->db->liberar($sql);
					header('location: ?view=representante&mode=EditSuplente&id='.$this->id.'&error=2');
				}
			}			
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