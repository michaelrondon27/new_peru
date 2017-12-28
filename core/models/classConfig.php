<?php
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			
		//////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
		//	// FUNCIONES NATIVAS DE PHP UTILIZADAS EN ESTA CLASE //                                                     //
		//		// trim -> elimina espacios en blancos al comienzo y al final de la variable //                         //
		//		// ucwords -> convierte la primera letra en mayuscula de cada palabra de la variable //                 //
		//		// mysqli_real_escape_string -> evita la inyeccion sql //                                               //
		//		// $_SERVER['REMOTE_ADDR'] -> obtiene la ip de la pc //                                                 //
		//		// $_SERVER['DOCUMENT_ROOT'] -> se coloca en la raiz de la carpeta del sistema //                       //
		//		// $_FILES[variable]['name'] -> obtiene el nombre del archivo a subir al sistema //                     //
		//		// $_FILES[variable]['type'] -> obtiene el tipo del archivo a subir al sistema //                       //
		//		// $_FILES[variable]['size'] -> obtiene el tamaño del archivo a subir al sistema //                     //
		//		// $_FILES[variable]['tmp_name'] -> se encarga de guardar el archivo en un directorio temporalmente //  //
		//		// move_uploaded_file -> mueve el archivo al directorio donde se va a guardar //                        //
		//		// strtoupper -> convierte la variable a mayusculas //                                                  //
		//		// strtolower -> convierte la variable a minusculas //                                                  //
		//////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	class Configuracion{
		private $db;
		private $nombre;
		private $logo;
		private $usuario;
		private $id;
		private $name;
		private $tipo;
		private $tamaño;
		private $escolar;
		private $grado;
		private $seccion;
		private $instruccion;
		private $cupo;
		private $aprobo;

		////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		// metodo para abrir la conexion //
		public function __construct(){
			$this->db=new Conexion();
		}
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		// metodo para editar el logo y el nombre en la barra de navegacion //
		// ruta del archivo que envie los datos: html/configuracion/menu.php //
		// ruta del archivo que se modifica: html/overall/menu.php //
		public function menu($usuario){
			$this->usuario=$usuario;
			$this->nombre=$this->db->real_escape_string($_POST['nombre']);
			$this->nombre=trim(ucwords($this->nombre));
			$this->logo=$_FILES['logo']['name'];
			$indicesServer = array('REMOTE_ADDR',);
			$ip=$_SERVER['REMOTE_ADDR'];
			if($this->logo==""){
				$this->db->query("UPDATE menu SET nombre='$this->nombre' WHERE id_menu=1 LIMIT 1;");
				$evento="Actualizo el nombre de la barra de navegacion a ".$this->nombre;
				$this->db->query("INSERT INTO registro_eventos(ip, usuario, evento, fecha, operacion) VALUES('$ip', '$this->usuario', '$evento', NOW(), 'UPDATE');");
				header("location: ?view=config&mode=Menu&success=1");
			}else{
				$this->name=$_FILES['logo']['name'];
				$this->tipo=$_FILES['logo']['type'];
				$this->tamaño=$_FILES['logo']['size'];
				if($this->tamaño<=1000000){
					if($this->tipo=="image/jpeg" || $this->tipo=="image/jpg" || $this->tipo=="image/png" || $this->tipo=="image/gif"){
						//Ruta de la carpeta destino en servidor
						$carpeta=$_SERVER['DOCUMENT_ROOT'].'/new_peru/asset/images/menu/';
						$ruta="menu/".$this->name;
						//Movemos la imagen del directorio temporal al directorio escogido
						move_uploaded_file($_FILES['logo']['tmp_name'], $carpeta.$this->name);
						$this->db->query("UPDATE menu SET nombre='$this->nombre', logo='$ruta' WHERE id_menu=1 LIMIT 1;");
						$evento="Actualizo el nombre de la barra de navegacion a ".$this->nombre." y el logo ".$ruta;
						$this->db->query("INSERT INTO registro_eventos(ip, usuario, evento, fecha, operacion) VALUES('$ip', '$this->usuario', '$evento', NOW(), 'UPDATE');");
						header("location: ?view=config&mode=Menu&success=1");
					}else{
						header("location: ?view=config&mode=Menu&error=2");
					}
				}else{
					header("location: ?view=config&mode=Menu&error=3");
				}
			}
		}
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

		////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		// metodo para editar el logo y el nombre del sistema en el login //
		// ruta del archivo que envie los datos: html/configuracion/inicio.php //
		// ruta del archivo que se modifica: html/login/index.php //
		public function inicio($usuario){
			$this->usuario=$usuario;
			$this->nombre=$this->db->real_escape_string($_POST['nombre']);
			$this->nombre=trim(ucwords($this->nombre));
			$this->logo=$_FILES['logo']['name'];
			$indicesServer = array('REMOTE_ADDR',);
			$ip=$_SERVER['REMOTE_ADDR'];
			if($this->logo==""){
				$this->db->query("UPDATE menu SET nombre='$this->nombre' WHERE id_menu=2 LIMIT 1;");
				$evento="Actualizo el nombre del inicio de sesión a ".$this->nombre;
				$this->db->query("INSERT INTO registro_eventos(ip, usuario, evento, fecha, operacion) VALUES('$ip', '$this->usuario', '$evento', NOW(), 'UPDATE');");
				header("location: ?view=config&mode=Inicio&success=1");
			}else{
				$this->name=$_FILES['logo']['name'];
				$this->tipo=$_FILES['logo']['type'];
				$this->tamaño=$_FILES['logo']['size'];
				if($this->tamaño<=1000000){
					if($this->tipo=="image/jpeg" || $this->tipo=="image/jpg" || $this->tipo=="image/png" || $this->tipo=="image/gif"){
						//Ruta de la carpeta destino en servidor
						$carpeta=$_SERVER['DOCUMENT_ROOT'].'/new_peru/asset/images/inicio/';
						$ruta="inicio/".$this->name;
						//Movemos la imagen del directorio temporal al directorio escogido
						move_uploaded_file($_FILES['logo']['tmp_name'], $carpeta.$this->name);
						$this->db->query("UPDATE menu SET nombre='$this->nombre', logo='$ruta' WHERE id_menu=2 LIMIT 1;");
						$evento="Actualizo el nombre del inicio de sesión a ".$this->nombre." y el logo ".$ruta;
						$this->db->query("INSERT INTO registro_eventos(ip, usuario, evento, fecha, operacion) VALUES('$ip', '$this->usuario', '$evento', NOW(), 'UPDATE');");
						header("location: ?view=config&mode=Inicio&success=1");
					}else{
						header("location: ?view=config&mode=Inicio&error=2");
					}
				}else{
					header("location: ?view=config&mode=Inicio&error=3");
				}
			}
		}
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		// metodo para agregar imagenes al carrusel //
		// ruta del archivo que envie los datos: html/configuracion/slider.php //
		// ruta del archivo que se modifica: html/index/index.php //
		public function slider($usuario){
			$this->usuario=$usuario;
			$this->name=$_FILES['imagen']['name'];
			$this->tipo=$_FILES['imagen']['type'];
			$this->tamaño=$_FILES['imagen']['size'];
			if($this->tamaño<=1000000){
				if($this->tipo=="image/jpeg" || $this->tipo=="image/jpg" || $this->tipo=="image/png" || $this->tipo=="image/gif"){
					//Ruta de la carpeta destino en servidor
					$carpeta=$_SERVER['DOCUMENT_ROOT'].'/new_peru/asset/images/slider/';
					$ruta="slider/".$this->name;
					//Movemos la imagen del directorio temporal al directorio escogido
					move_uploaded_file($_FILES['imagen']['tmp_name'], $carpeta.$this->name);
					$indicesServer = array('REMOTE_ADDR',);
					$ip=$_SERVER['REMOTE_ADDR'];
					$this->db->query("INSERT INTO slider(imagen) VALUES('$ruta');");
					$evento="Agrego al carrusel la imagen ".$this->name;
					$this->db->query("INSERT INTO registro_eventos(ip, usuario, evento, fecha, operacion) VALUES('$ip', '$this->usuario', '$evento', NOW(), 'INSERT');");
					header("location: ?view=config&mode=Carrusel&success=1");
				}else{
					header("location: ?view=config&mode=Carrusel&error=2");
				}
			}else{
				header("location: ?view=config&mode=Carrusel&error=3");
			}
		}
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

		////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		// metodo para eliminar imagenes del carrusel //
		// ruta del archivo que envie los datos: html/configuracion/slider.php //
		public function DeleteImagen($usuario){
			$this->id=intval($_GET['id']);
			$this->usuario=$usuario;
			$sql=$this->db->query("SELECT imagen FROM slider WHERE id_slider=$this->id LIMIT 1;");
			$data=$this->db->recorrer($sql);
			$indicesServer = array('REMOTE_ADDR',);
			$ip=$_SERVER['REMOTE_ADDR'];
			$evento="Elimino al carrusel la imagen ".$data[0];
			$this->db->query("INSERT INTO registro_eventos(ip, usuario, evento, fecha, operacion) VALUES('$ip', '$this->usuario', '$evento', NOW(), 'DELETE');");
			$this->db->liberar($sql);
			$this->db->query("DELETE FROM slider WHERE id_slider=$this->id LIMIT 1;");
			header("location: ?view=config&mode=Carrusel&success=2");
		}
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

		////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		// metodo para agregar el año escolar //
		// ruta del archivo que envie los datos: html/configuracion/escolar.php //
		public function AddEscolar($usuario){
			$this->usuario=$usuario;
			$this->escolar=$this->db->real_escape_string($_POST['escolar']);
			$this->escolar=trim($this->escolar);
			$sql=$this->db->query("SELECT * FROM escolar WHERE escolar='$this->escolar' LIMIT 1;");
			if($this->db->rows($sql)==0){
				$this->db->query("INSERT INTO escolar(escolar) VALUES('$this->escolar');");
				$indicesServer = array('REMOTE_ADDR',);
				$ip=$_SERVER['REMOTE_ADDR'];
				$evento="Agrego el año escolar ".$this->escolar;
				$this->db->query("INSERT INTO registro_eventos(ip, usuario, evento, fecha, operacion) VALUES('$ip', '$this->usuario', '$evento', NOW(), 'INSERT');");
				$this->db->liberar($sql);
				header("location: ?view=config&mode=Escolar&success=1");
			}else{
				$this->db->liberar($sql);
				header("location: ?view=config&mode=Escolar&error=2");
			}
		}
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

		////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		// metodo para editar el año escolar //
		// ruta del archivo que envie los datos: html/configuracion/escolar.php //
		public function EditEscolar($usuario){
			$this->id=intval($_GET['id']);
			$this->usuario=$usuario;
			$this->escolar=$this->db->real_escape_string($_POST['escolar']);
			$this->escolar=trim($this->escolar);
			$indicesServer = array('REMOTE_ADDR',);
			$ip=$_SERVER['REMOTE_ADDR'];
			$evento="Edito el año escolar ".$this->escolar." con el id ".$this->id;
			$sql=$this->db->query("SELECT * FROM escolar WHERE escolar='$this->escolar';");
			if($this->db->rows($sql)==0){
				$this->db->query("INSERT INTO registro_eventos(ip, usuario, evento, fecha, operacion) VALUES('$ip', '$this->usuario', '$evento', NOW(), 'UPDATE');");
				$this->db->query("UPDATE escolar SET escolar='$this->escolar' WHERE id_escolar=$this->id LIMIT 1;");
				$this->db->liberar($sql);
				header("location: ?view=config&mode=EditEscolar&id=".$this->id."&success=1");
			}else{
				$this->db->liberar($sql);
				$sql=$this->db->query("SELECT * FROM escolar WHERE id_escolar=$this->id AND escolar='$this->escolar' LIMIT 1;");
				if($this->db->rows($sql)==1){
					$this->db->query("INSERT INTO registro_eventos(ip, usuario, evento, fecha, operacion) VALUES('$ip', '$this->usuario', '$evento', NOW(), 'UPDATE');");
					$this->db->query("UPDATE escolar SET escolar='$this->escolar' WHERE id_escolar=$this->id LIMIT 1;");
					$this->db->liberar($sql);
					header("location: ?view=config&mode=EditEscolar&id=".$this->id."&success=1");
				}else{
					header("location: ?view=config&mode=EditEscolar&id=".$this->id."&error=2");
				}
			}
		}
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

		////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		// metodo para agregar el grado //
		// ruta del archivo que envie los datos: html/configuracion/allGradoSecciones.php //
		public function AddGrado($usuario){
			$this->usuario=$usuario;
			$this->grado=$this->db->real_escape_string($_POST['grado']);
			$this->grado=trim(strtolower($this->grado));
			$sql=$this->db->query("SELECT * FROM grado WHERE grado='$this->grado' LIMIT 1;");
			if($this->db->rows($sql)==0){
				$this->db->query("INSERT INTO grado(grado) VALUES('$this->grado');");
				$indicesServer = array('REMOTE_ADDR',);
				$ip=$_SERVER['REMOTE_ADDR'];
				$evento="Agrego el grado ".$this->grado;
				$this->db->query("INSERT INTO registro_eventos(ip, usuario, evento, fecha, operacion) VALUES('$ip', '$this->usuario', '$evento', NOW(), 'INSERT');");
				$this->db->liberar($sql);
				header("location: ?view=config&mode=GradoSecciones&success=1");
			}else{
				$this->db->liberar($sql);
				header("location: ?view=config&mode=GradoSecciones&error=2");
			}
		}
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

		////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		// metodo para editar el grado //
		// ruta del archivo que envie los datos: html/configuracion/editGrado.php //
		public function EditGrado($usuario){
			$this->id=intval($_GET['id']);
			$this->usuario=$usuario;
			$this->grado=$this->db->real_escape_string($_POST['grado']);
			$this->grado=trim($this->grado);
			$indicesServer = array('REMOTE_ADDR',);
			$ip=$_SERVER['REMOTE_ADDR'];
			$evento="Edito el grado ".$this->grado." con el id ".$this->id;
			$sql=$this->db->query("SELECT * FROM grado WHERE grado='$this->grado';");
			if($this->db->rows($sql)==0){
				$this->db->query("INSERT INTO registro_eventos(ip, usuario, evento, fecha, operacion) VALUES('$ip', '$this->usuario', '$evento', NOW(), 'UPDATE');");
				$this->db->query("UPDATE grado SET grado='$this->grado' WHERE id_grado=$this->id LIMIT 1;");
				$this->db->liberar($sql);
				header("location: ?view=config&mode=EditGrado&id=".$this->id."&success=1");
			}else{
				$this->db->liberar($sql);
				$sql=$this->db->query("SELECT * FROM grado WHERE id_grado=$this->id AND grado='$this->grado' LIMIT 1;");
				if($this->db->rows($sql)==1){
					$this->db->query("INSERT INTO registro_eventos(ip, usuario, evento, fecha, operacion) VALUES('$ip', '$this->usuario', '$evento', NOW(), 'UPDATE');");
					$this->db->query("UPDATE grado SET grado='$this->grado' WHERE id_grado=$this->id LIMIT 1;");
					$this->db->liberar($sql);
					header("location: ?view=config&mode=EditGrado&id=".$this->id."&success=1");
				}else{
					header("location: ?view=config&mode=EditGrado&id=".$this->id."&error=2");
				}
			}
		}
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

		////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		// metodo para agregar la seccion //
		// ruta del archivo que envie los datos: html/configuracion/allGradoSecciones.php //
		public function AddSeccion($usuario){
			$this->usuario=$usuario;
			$this->seccion=$this->db->real_escape_string($_POST['seccion']);
			$this->seccion=trim(strtoupper($this->seccion));
			$sql=$this->db->query("SELECT * FROM seccion WHERE seccion='$this->seccion' LIMIT 1;");
			if($this->db->rows($sql)==0){
				$this->db->query("INSERT INTO seccion(seccion) VALUES('$this->seccion');");
				$indicesServer = array('REMOTE_ADDR',);
				$ip=$_SERVER['REMOTE_ADDR'];
				$evento="Agrego la seccion ".$this->seccion;
				$this->db->query("INSERT INTO registro_eventos(ip, usuario, evento, fecha, operacion) VALUES('$ip', '$this->usuario', '$evento', NOW(), 'INSERT');");
				$this->db->liberar($sql);
				header("location: ?view=config&mode=GradoSecciones&success=2");
			}else{
				$this->db->liberar($sql);
				header("location: ?view=config&mode=GradoSecciones&error=3");
			}
		}
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

		////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		// metodo para editar la seccion //
		// ruta del archivo que envie los datos: html/configuracion/editSeccion.php //
		public function EditSeccion($usuario){
			$this->id=intval($_GET['id']);
			$this->usuario=$usuario;
			$this->seccion=$this->db->real_escape_string($_POST['seccion']);
			$this->seccion=trim(strtoupper($this->seccion));
			$indicesServer = array('REMOTE_ADDR',);
			$ip=$_SERVER['REMOTE_ADDR'];
			$evento="Edito el seccion ".$this->seccion." con el id ".$this->id;
			$sql=$this->db->query("SELECT * FROM seccion WHERE seccion='$this->seccion';");
			if($this->db->rows($sql)==0){
				$this->db->query("INSERT INTO registro_eventos(ip, usuario, evento, fecha, operacion) VALUES('$ip', '$this->usuario', '$evento', NOW(), 'UPDATE');");
				$this->db->query("UPDATE seccion SET seccion='$this->seccion' WHERE id_seccion=$this->id LIMIT 1;");
				$this->db->liberar($sql);
				header("location: ?view=config&mode=EditSeccion&id=".$this->id."&success=1");
			}else{
				$this->db->liberar($sql);
				$sql=$this->db->query("SELECT * FROM seccion WHERE id_seccion=$this->id AND seccion='$this->seccion' LIMIT 1;");
				if($this->db->rows($sql)==1){
					$this->db->query("INSERT INTO registro_eventos(ip, usuario, evento, fecha, operacion) VALUES('$ip', '$this->usuario', '$evento', NOW(), 'UPDATE');");
					$this->db->query("UPDATE seccion SET seccion='$this->seccion' WHERE id_seccion=$this->id LIMIT 1;");
					$this->db->liberar($sql);
					header("location: ?view=config&mode=EditSeccion&id=".$this->id."&success=1");
				}else{
					header("location: ?view=config&mode=EditSeccion&id=".$this->id."&error=2");
				}
			}
		}
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

		///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		// metodo para asignar las secciones //
		// ruta del archivo que envie los datos: html/configuracion/allGradoSecciones.php //
		public function AddAsignar($usuario){
			$this->usuario=$usuario;
			$this->seccion=$this->db->real_escape_string($_POST['seccion']);
			$this->escolar=$this->db->real_escape_string($_POST['escolar']);
			$this->grado=$this->db->real_escape_string($_POST['grado']);
			$sql=$this->db->query("SELECT * FROM cupos WHERE id_seccion='$this->seccion' AND id_escolar='$this->escolar' AND id_grado='$this->grado' LIMIT 1;");
			if($this->db->rows($sql)==0){
				$this->db->liberar($sql);
				$this->db->query("INSERT INTO cupos(id_escolar, id_grado, id_seccion) VALUES($this->escolar, $this->grado, $this->seccion);");
				$sql1=$this->db->query("SELECT escolar FROM escolar WHERE id_escolar=$this->escolar LIMIT 1;");
				$escolar=$this->db->recorrer($sql1);
				$sql2=$this->db->query("SELECT grado FROM grado WHERE id_grado=$this->grado LIMIT 1;");
				$grado=$this->db->recorrer($sql2);
				$sql3=$this->db->query("SELECT seccion FROM seccion WHERE id_seccion=$this->seccion LIMIT 1;");
				$seccion=$this->db->recorrer($sql3);
				$indicesServer = array('REMOTE_ADDR',);
				$ip=$_SERVER['REMOTE_ADDR'];
				$evento="Asigno la seccion ".$seccion[0]." al grado ".$grado[0]." del año escolar ".$escolar[0];
				$this->db->query("INSERT INTO registro_eventos(ip, usuario, evento, fecha, operacion) VALUES('$ip', '$this->usuario', '$evento', NOW(), 'INSERT');");
				$this->db->liberar($sql1);
				$this->db->liberar($sql2);
				$this->db->liberar($sql3);
				header("location: ?view=config&mode=GradoSecciones&success=3");
			}else{
				$this->db->liberar($sql);
				header("location: ?view=config&mode=GradoSecciones&error=4");
			}
		}
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

		////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		// metodo para agregar el grado de instruccion //
		// ruta del archivo que envie los datos: html/configuracion/instruccion.php //
		public function AddInstruccion($usuario){
			$this->usuario=$usuario;
			$this->instruccion=$this->db->real_escape_string($_POST['instruccion']);
			$this->instruccion=trim(strtolower($this->instruccion));
			$this->instruccion=ucwords($this->instruccion);
			$sql=$this->db->query("SELECT * FROM grado_instruccion WHERE instruccion='$this->instruccion' LIMIT 1;");
			if($this->db->rows($sql)==0){
				$this->db->query("INSERT INTO grado_instruccion(instruccion) VALUES('$this->instruccion');");
				$indicesServer = array('REMOTE_ADDR',);
				$ip=$_SERVER['REMOTE_ADDR'];
				$evento="Agrego el grado de isntrucción ".$this->instruccion;
				$this->db->query("INSERT INTO registro_eventos(ip, usuario, evento, fecha, operacion) VALUES('$ip', '$this->usuario', '$evento', NOW(), 'INSERT');");
				$this->db->liberar($sql);
				header("location: ?view=config&mode=Instruccion&success=1");
			}else{
				$this->db->liberar($sql);
				header("location: ?view=config&mode=Instruccion&error=2");
			}
		}
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

		////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		// metodo para editar el grado de instruccion //
		// ruta del archivo que envie los datos: html/configuracion/editInstruccion.php //
		public function EditInstruccion($usuario){
			$this->id=intval($_GET['id']);
			$this->usuario=$usuario;
			$this->instruccion=$this->db->real_escape_string($_POST['instruccion']);
			$this->instruccion=trim(strtolower($this->instruccion));
			$this->instruccion=ucwords($this->instruccion);
			$indicesServer = array('REMOTE_ADDR',);
			$ip=$_SERVER['REMOTE_ADDR'];
			$evento="Edito el grado de instruccion ".$this->instruccion." con el id ".$this->id;
			$sql=$this->db->query("SELECT * FROM grado_instruccion WHERE instruccion='$this->instruccion';");
			if($this->db->rows($sql)==0){
				$this->db->query("INSERT INTO registro_eventos(ip, usuario, evento, fecha, operacion) VALUES('$ip', '$this->usuario', '$evento', NOW(), 'UPDATE');");
				$this->db->query("UPDATE grado_instruccion SET instruccion='$this->instruccion' WHERE id_instruccion=$this->id LIMIT 1;");
				$this->db->liberar($sql);
				header("location: ?view=config&mode=EditInstruccion&id=".$this->id."&success=1");
			}else{
				$this->db->liberar($sql);
				$sql=$this->db->query("SELECT * FROM grado_instruccion WHERE id_instruccion=$this->id AND instruccion='$this->instruccion' LIMIT 1;");
				if($this->db->rows($sql)==1){
					$this->db->query("INSERT INTO registro_eventos(ip, usuario, evento, fecha, operacion) VALUES('$ip', '$this->usuario', '$evento', NOW(), 'UPDATE');");
					$this->db->query("UPDATE grado_instruccion SET instruccion='$this->instruccion' WHERE id_instruccion=$this->id LIMIT 1;");
					$this->db->liberar($sql);
					header("location: ?view=config&mode=EditInstruccion&id=".$this->id."&success=1");
				}else{
					header("location: ?view=config&mode=EditInstruccion&id=".$this->id."&error=2");
				}
			}
		}
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

		////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		// metodo para cerrar el año escolar //
		// ruta del archivo que envie los datos: html/configuracion/allEscolar.php //
		public function CerrarEscolar($usuario){
			$this->id=intval($_GET['id']);
			$this->usuario=$usuario;
			$sql="UPDATE escolar SET cerrado=1 WHERE id_escolar=$this->id LIMIT 1;";
			$sql.="UPDATE cupos SET cerrado=1 WHERE id_escolar=$this->id;";
			$this->db->multi_query($sql);
			$this->db->liberar($sql);
			$indicesServer = array('REMOTE_ADDR',);
			$ip=$_SERVER['REMOTE_ADDR'];
			$evento="Cerro el año escolar con el id ".$this->id;
			$this->db->query("INSERT INTO registro_eventos(ip, usuario, evento, fecha, operacion) VALUES('$ip', '$this->usuario', '$evento', NOW(), 'UPDATE');");
			header("location: ?view=config&mode=Escolar&success=2");
		}
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

		////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		// metodo para editar el cupo //
		// ruta del archivo que envie los datos: html/configuracion/editCupos.php //
		public function EditCupos($usuario){
			$this->id=intval($_GET['id']);
			$this->usuario=$usuario;
			$this->cupo=$this->db->real_escape_string($_POST['cupo']);
			$this->cupo=trim($this->cupo);
			$this->db->query("UPDATE cupos SET cupos=$this->cupo WHERE id_cupo=$this->id LIMIT 1;");
			$indicesServer = array('REMOTE_ADDR',);
			$ip=$_SERVER['REMOTE_ADDR'];
			$evento="Edito el cupo con id: ".$this->id.", le asigno ".$this->cupo." cupos";
			$this->db->query("INSERT INTO registro_eventos(ip, usuario, evento, fecha, operacion) VALUES('$ip', '$this->usuario', '$evento', NOW(), 'UPDATE');");
			header("location: ?view=config&mode=EditCupos&id=".$this->id."&success=1");
		}
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

		////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		// metodo para agregar el cupo //
		// ruta del archivo que envie los datos: html/configuracion/allGradoSecciones.php //
		public function AddCupos($usuario){
			$this->id=intval($_GET['id']);
			$this->usuario=$usuario;
			$this->cupo=$this->db->real_escape_string($_POST['cupo']);
			$this->cupo=trim($this->cupo);
			$this->escolar=$this->db->real_escape_string($_POST['escolar']);
			$this->escolar=trim($this->escolar);
			$this->grado=$this->db->real_escape_string($_POST['grado']);
			$this->grado=trim($this->grado);
			$this->seccion=$this->db->real_escape_string($_POST['seccion']);
			$this->seccion=trim($this->seccion);
			$this->db->query("UPDATE cupos SET cupos=$this->cupo WHERE id_escolar=$this->escolar AND id_grado=$this->grado AND id_seccion=$this->seccion LIMIT 1");
			$indicesServer = array('REMOTE_ADDR',);
			$ip=$_SERVER['REMOTE_ADDR'];
			$evento="Asigno ".$this->cupo." cupos a la seccion ".$this->seccion.", grado ".$this->grado." y el año escolar ".$this->escolar;
			$this->db->query("INSERT INTO registro_eventos(ip, usuario, evento, fecha, operacion) VALUES('$ip', '$this->usuario', '$evento', NOW(), 'UPDATE');");
			header("location: ?view=config&mode=AddCupos&success=4");
		}
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

		////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		// metodo para agregar el manual //
		// ruta del archivo que envie los datos: html/configuracion/manual.php //
		public function Manual($usuario){
			$this->usuario=$usuario;
			$this->name=$_FILES['documento']['name'];
			$this->tipo=$_FILES['documento']['type'];
			if($this->tipo=="application/pdf"){
				//Ruta de la carpeta destino en servidor
				$carpeta=$_SERVER['DOCUMENT_ROOT'].'/new_peru/asset/documento/';
				$ruta="documento/".$this->name;
				//Movemos la imagen del directorio temporal al directorio escogido
				move_uploaded_file($_FILES['documento']['tmp_name'], $carpeta.$this->name);
				$indicesServer = array('REMOTE_ADDR',);
				$ip=$_SERVER['REMOTE_ADDR'];
				$this->db->query("UPDATE menu SET logo='$ruta' WHERE id_menu=3 LIMIT 1;");
				$evento="Subio el Manual ".$this->name;
				$this->db->query("INSERT INTO registro_eventos(ip, usuario, evento, fecha, operacion) VALUES('$ip', '$this->usuario', '$evento', NOW(), 'INSERT');");
				header("location: ?view=config&mode=Manual&success=1");
			}else{
				header("location: ?view=config&mode=Manual&error=2");
			}
		}
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

		////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		// metodo para subir las notas //
		// ruta del archivo que envie los datos: html/configuracion/notas.php //
		public function Notas($usuario){
			if($_FILES['csv']['size']>0){
				$this->usuario=$usuario;
				$csv=$_FILES['csv']['tmp_name'];
				$handle=fopen($csv, 'r');
				while($data=fgetcsv($handle, 1000, ";", "'")){
					$sql=$this->db->query("SELECT id_escolar FROM escolar WHERE escolar='$data[3]' LIMIT 1;");
					$escolar=$this->db->recorrer($sql);
					$this->db->liberar($sql);
					$sql=$this->db->query("SELECT id_grado FROM grado WHERE grado='$data[4]' LIMIT 1;");
					$grado=$this->db->recorrer($sql);
					$this->db->liberar($sql);
					$sql=$this->db->query("SELECT id_seccion FROM seccion WHERE seccion='$data[5]' LIMIT 1;");
					$seccion=$this->db->recorrer($sql);
					$this->db->liberar($sql);
					$sql=$this->db->query("SELECT * FROM notas WHERE id_alum=$data[0] AND escolar=$escolar[0] AND grado=$grado[0] AND seccion=$seccion[0] LIMIT 1;");
					if($this->db->rows($sql)==0){
						$this->aprobo=strtolower($data[6]);
						$this->db->liberar($sql);
						$this->db->query("INSERT INTO notas(id_alum, escolar, grado, seccion, aprobo) VALUES($data[0], $escolar[0], $grado[0], $seccion[0], '$this->aprobo');");
					}
				}
				$indicesServer = array('REMOTE_ADDR',);
				$ip=$_SERVER['REMOTE_ADDR'];
				$evento="Subio notas";
				$this->db->query("INSERT INTO registro_eventos(ip, usuario, evento, fecha, operacion) VALUES('$ip', '$this->usuario', '$evento', NOW(), 'INSERT');");
				echo 'OK';
			}else{
				header('location: ?view=config&mode=Notas&error=2');
			}
		}
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

		////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		// metodo para cerrar la conexion //
		public function __destruct(){
			$this->db->close();
		}
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	}
?>