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
	class User{
		private $db;
		private $usuario;
		private $id;
		private $user;
		private $nombre;
		private $apellido;
		private $id_tipo_usu;
		private $pass;
		private $repeat;
		private $id_status;
		private $editar;
		private $name;
		private $tipo;
		private $tamaño;

		///////////////////////////////////////////
		// metodo para abrir la conexion //
		public function __construct(){
			$this->db=new Conexion();
		}
		//////////////////////////////////////////
		
		///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		// metodo para bloquear a un usuario //
		// ruta del archivo que envia los datos html/usuario/allUsuario.php //
		public function BloquearUsuario($usuario, $editar){
			$this->id=intval($_GET['id']);
			$this->editar=$editar;
			$this->usuario=$usuario;
			$this->db->query("UPDATE usuario SET id_status=2 WHERE id_usuario=$this->id LIMIT 1;");
			$indicesServer = array('REMOTE_ADDR',);
			$ip=$_SERVER['REMOTE_ADDR'];
			$evento="Se bloqueo al usuario ".$this->editar;
			$this->db->query("INSERT INTO registro_eventos(ip, usuario, evento, fecha, operacion) VALUES('$ip', '$this->usuario', '$evento', NOW(), 'UPDATE');");
			header('location: ?view=user&mode=allUsuarios&success=1');
		}
		///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

		///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		// metodo para bloquear a un usuario //
		// ruta del archivo que envia los datos html/usuario/allUsuario.php //
		public function DesbloquearUsuario($usuario, $editar){
			$this->id=intval($_GET['id']);
			$this->editar=$editar;
			$this->usuario=$usuario;
			$this->db->query("UPDATE usuario SET id_status=1 WHERE id_usuario=$this->id LIMIT 1;");
			$indicesServer = array('REMOTE_ADDR',);
			$ip=$_SERVER['REMOTE_ADDR'];
			$evento="Se desbloqueo al usuario ".$this->editar;
			$this->db->query("INSERT INTO registro_eventos(ip, usuario, evento, fecha, operacion) VALUES('$ip', '$this->usuario', '$evento', NOW(), 'UPDATE');");
			header('location: ?view=user&mode=allUsuarios&success=2');
		}
		///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

		////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		// metodo para agraegar a un usuario //
		// ruta del archivo que envia los datos html/usuario/addUsuario.php //
		public function AddUsuario($usuario){
			$this->pass=Encrypt($_POST['pass']);
			$this->repeat=Encrypt($_POST['repeat']);
			if($this->pass==$this->repeat){
				$this->user=$this->db->real_escape_string($_POST['usuario']);
				$this->user=trim(strtolower($this->user));
				$this->nombre=$this->db->real_escape_string($_POST['nombre']);
				$this->nombre=(strtolower($this->nombre));
				$this->nombre=trim(ucwords($this->nombre));
				$this->apellido=$this->db->real_escape_string($_POST['apellido']);
				$this->apellido=(strtolower($this->apellido));
				$this->apellido=trim(ucwords($this->apellido));
				$this->perfil=$this->db->real_escape_string($_POST['perfil']);
				$this->usuario=$usuario;
				$this->id_status=1;
				$sql=$this->db->query("SELECT * FROM usuario WHERE usuario='$this->user' LIMIT 1;");
				if($this->db->rows($sql)==0){
					$this->db->query("INSERT INTO usuario(usuario, clave, nombre, apellido, id_tipo_usu, id_status) VALUES('$this->user', '$this->pass', '$this->nombre', '$this->apellido', $this->perfil, $this->id_status);");
					$carpeta=$_SERVER['DOCUMENT_ROOT'].'/new_peru/asset/images/usuarios/'.$this->user;
					if(!file_exists($carpeta)){
						mkdir($carpeta, 0777, true);
					}
					$indicesServer = array('REMOTE_ADDR',);
					$ip=$_SERVER['REMOTE_ADDR'];
					$evento="Agregado el usuario ".$this->user;
					$this->db->query("INSERT INTO registro_eventos(ip, usuario, evento, fecha, operacion) VALUES('$ip', '$this->usuario', '$evento', NOW(), 'INSERT');");
					header('location: ?view=user&mode=addUsuario&success=1');
				}else{
					header('location: ?view=user&mode=addUsuario&error=3');	
				}
			}else{
				header('location: ?view=user&mode=addUsuario&error=2');	
			}
		}
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

		///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		// metodo para editar a un usuario //
		// ruta del archivo que envia los datos html/usuario/editUsuario.php //
		public function EditUsuario($usuario, $editar){
			$this->id=intval($_GET['id']);
			$this->nombre=$this->db->real_escape_string($_POST['nombre']);
			$this->nombre=(strtolower($this->nombre));
			$this->nombre=trim(ucwords($this->nombre));
			$this->apellido=$this->db->real_escape_string($_POST['apellido']);
			$this->apellido=(strtolower($this->apellido));
			$this->apellido=trim(ucwords($this->apellido));
			$this->perfil=$this->db->real_escape_string($_POST['perfil']);
			$this->usuario=$usuario;
			$this->editar=$editar;
			$this->db->query("UPDATE usuario SET nombre='$this->nombre', apellido='$this->apellido', id_tipo_usu=$this->perfil WHERE id_usuario=$this->id LIMIT 1;");
			$indicesServer = array('REMOTE_ADDR',);
			$ip=$_SERVER['REMOTE_ADDR'];
			$evento="Edito el usuario ".$this->editar. ", nombre: ".$this->nombre.", apellido: ".$this->apellido." y perfil: ".$this->perfil;
			$this->db->query("INSERT INTO registro_eventos(ip, usuario, evento, fecha, operacion) VALUES('$ip', '$this->usuario', '$evento', NOW(), 'UPDATE');");
			header('location: ?view=user&mode=EditUsuario&id='.$this->id.'&success=1');
		}
		///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

		///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		// metodo para cambiar la contrasela a un usuario //
		// ruta del archivo que envia los datos html/usuario/adminPassword.php //
		public function AdminPassword($usuario, $editar){
			$this->id=intval($_GET['id']);
			$this->pass=Encrypt($_POST['pass']);
			$this->repeat=Encrypt($_POST['repeat']);
			if($this->pass==$this->repeat){
				$this->usuario=$usuario;
				$this->editar=$editar;
				$this->db->query("UPDATE usuario SET clave='$this->pass' WHERE id_usuario=$this->id LIMIT 1;");
				$indicesServer = array('REMOTE_ADDR',);
				$ip=$_SERVER['REMOTE_ADDR'];
				$evento="Actualizo la contraseña del usuario ".$this->editar;
				$this->db->query("INSERT INTO registro_eventos(ip, usuario, evento, fecha, operacion) VALUES('$ip', '$this->usuario', '$evento', NOW(), 'UPDATE');");
				header('location: ?view=user&mode=AdminPassword&id='.$this->id.'&success=1');
			}else{
				header('location: ?view=user&mode=AdminPassword&id='.$this->id.'&error=2');	
			}
		}
		///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

		//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		// metodo para cambiar foto de perfil //
		// ruta del archivo que envie los datos: html/usuario/miPerfil.php //
		public function CambiarFoto($usuario){
			$this->id=intval($_GET['id']);
			$this->usuario=$usuario;
			$this->name=$_FILES['foto']['name'];
			$this->tipo=$_FILES['foto']['type'];
			$this->tamaño=$_FILES['foto']['size'];
			if($this->tamaño<=1000000){
				if($this->tipo=="image/jpeg" || $this->tipo=="image/jpg" || $this->tipo=="image/png" || $this->tipo=="image/gif"){
					//Ruta de la carpeta destino en servidor
					$carpeta=$_SERVER['DOCUMENT_ROOT'].'/new_peru/asset/images/usuarios/'.$this->usuario."/";
					$ruta="usuarios/".$this->usuario."/".$this->name;
					//Movemos la imagen del directorio temporal al directorio escogido
					move_uploaded_file($_FILES['foto']['tmp_name'], $carpeta.$this->name);
					$indicesServer = array('REMOTE_ADDR',);
					$ip=$_SERVER['REMOTE_ADDR'];
					$this->db->query("UPDATE usuario SET foto='$ruta' WHERE id_usuario=$this->id;");
					$evento="Actualizo su foto de perfil";
					$this->db->query("INSERT INTO registro_eventos(ip, usuario, evento, fecha, operacion) VALUES('$ip', '$this->usuario', '$evento', NOW(), 'UPDATE');");
					header('location: ?view=user&mode=MiPerfil&id='.$this->id.'&success=2');
				}else{
					header('location: ?view=user&mode=MiPerfil&id='.$this->id.'&error=3');
				}
			}else{
				header('location: ?view=user&mode=MiPerfil&id='.$this->id.'&error=4');
			}
		}
		/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

		//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		// metodo para cambiar contraseña //
		// ruta del archivo que envie los datos: html/usuario/miPerfil.php //
		public function CambiarPassword($usuario){
			$this->id=intval($_GET['id']);
			$this->pass=Encrypt($_POST['pass']);
			$this->repeat=Encrypt($_POST['repeat']);
			if($this->pass==$this->repeat){
				$this->usuario=$usuario;
				$this->db->query("UPDATE usuario SET clave='$this->pass' WHERE id_usuario=$this->id LIMIT 1;");
				$indicesServer = array('REMOTE_ADDR',);
				$ip=$_SERVER['REMOTE_ADDR'];
				$evento="Cambio su contraseña";
				$this->db->query("INSERT INTO registro_eventos(ip, usuario, evento, fecha, operacion) VALUES('$ip', '$this->usuario', '$evento', NOW(), 'UPDATE');");
				header('location: ?view=user&mode=MiPerfil&id='.$this->id.'&success=1');
			}else{
				header('location: ?view=user&mode=MiPerfil&id='.$this->id.'&error=2');	
			}
		}
		/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

		/////////////////////////////////////////
		// metodo para cerrar la conexion //
		public function __destruct(){
			$this->db->close();
		}
		////////////////////////////////////////
	}
?>