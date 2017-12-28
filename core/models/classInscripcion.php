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
	class Inscripcion{
		private $db;
		private $usuario;
		private $id;
		private $escolar;
		private $grado;
		private $seccion;
		private $alumno;
		private $condicion;
		private $profesor;
		private $repitiente;
		private $fecha;
		private $nombres;

		///////////////////////////////////////////
		// metodo para abrir la conexion //
		public function __construct(){
			$this->db=new Conexion();
		}
		//////////////////////////////////////////

		////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		// metodo para agregar la inscripcion //
		public function AddInscripcion($usuario, $nombres){
			$this->escolar=$this->db->real_escape_string($_POST['escolar']);
			$this->grado=$this->db->real_escape_string($_POST['grado']);
			$this->seccion=$this->db->real_escape_string($_POST['seccion']);
			$this->alumno=$this->db->real_escape_string($_POST['alumno']);
			$this->condicion=$this->db->real_escape_string($_POST['condicion']);
			$this->profesor=$this->db->real_escape_string($_POST['profesor']);
			$this->repitiente=$this->db->real_escape_string($_POST['repitiente']);
			if($this->repitiente!=""){
				$this->repitiente=trim(strtolower($this->repitiente));
				$this->repitiente=ucwords($this->repitiente);
			}else{
				$this->repitiente="";
			}
			$this->fecha=$this->db->real_escape_string($_POST['fecha']);
			$this->usuario=$usuario;
			$this->nombres=$nombres;
			$sql=$this->db->query("SELECT cupos, cerrado FROM cupos WHERE id_escolar=$this->escolar AND id_grado=$this->grado AND id_seccion=$this->seccion LIMIT 1;");
			if($this->db->rows($sql)>0){
				$data=$this->db->recorrer($sql);
				$sql1=$this->db->query("SELECT * FROM inscripcion WHERE id_escolar=$this->escolar AND id_grado=$this->grado AND id_seccion=$this->seccion;");
				$num=$this->db->rows($sql1);
				if($data[1]==0){
					if($data[0]>0){
						$disponible=$data[0]-$num;
						if($disponible>0){
							$sql2=$this->db->query("SELECT * FROM inscripcion WHERE id_escolar=$this->escolar AND id_alum=$this->alumno LIMIT 1;");
							if($this->db->rows($sql2)==0){
								$this->db->query("INSERT INTO inscripcion(id_escolar, fecha, condicion, repitiente, id_alum, id_grado, id_seccion, id_usuario) VALUES($this->escolar, '$this->fecha', '$this->condicion', '$this->repitiente', $this->alumno, $this->grado, $this->seccion, $this->profesor);");
								$this->db->query("UPDATE alumnos SET estudiante=1 WHERE id_alum=$this->alumno LIMIT 1;");
								$indicesServer = array('REMOTE_ADDR',);
								$ip=$_SERVER['REMOTE_ADDR'];
								$evento="Se inscribio al alumno ".$this->nombres." para el año escolar con id ".$this->escolar.", al grado con id ".$this->grado." y a la seccion con id ".$this->seccion;
								$this->db->query("INSERT INTO registro_eventos(ip, usuario, evento, fecha, operacion) VALUES('$ip', '$this->usuario', '$evento', NOW(), 'INSERT');");
								header("location: ?view=inscripcion&mode=AddInscripcion&success=1");
							}else{
								header("location: ?view=inscripcion&mode=AddInscripcion&error=6");
							}
							$this->db->liberar($sql2);
						}else{
							header("location: ?view=inscripcion&mode=AddInscripcion&error=5");
						}
					}else{
						header("location: ?view=inscripcion&mode=AddInscripcion&error=4");
					}
				}else{
					header("location: ?view=inscripcion&mode=AddInscripcion&error=3");
				}
				$this->db->liberar($sql1);
			}else{
				header("location: ?view=inscripcion&mode=AddInscripcion&error=2");
			}
			$this->db->liberar($sql);
		}
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

		////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		// metodo para inscribir a los alumnos regulares //
		// ruta del archivo que envie los datos: html/inscripcion/addRegulares.php //
		public function AddRegulares($usuario){
			$this->usuario=$usuario;
			$this->fecha=date("Y-m-d");
			$this->escolar=$_POST['escolar'];
			$this->grado=$_POST['grado'];
			$this->seccion=$_POST['seccion'];
			$sql=$this->db->query("SELECT COUNT(*) FROM escolar;");
			$countEscolar=$this->db->recorrer($sql);
			echo $countEscolar[0];
			echo $nextEscolar=$this->escolar+1;
			if($countEscolar>$nextEscolar){

			}else if($countEscolar=$nextEscolar || $countEscolar<$nextEscolar){
				header("location: ?view=inscripcion&mode=AddInscripcion&error=2");
			}
			/*if(!empty($this->escolar) && empty($this->grado) && empty($this->seccion)){
				$sql=$this->db->query("SELECT id_alum, id_escolar, id_grado, id_seccion FROM inscripcion WHERE id_escolar=$this->escolar AND procesado=0;");
			}else if(!empty($this->escolar) && !empty($this->grado) && empty($this->seccion)){
				$sql=$this->db->query("SELECT id_alum, id_escolar, id_grado, id_seccion FROM inscripcion WHERE id_escolar=$this->escolar AND id_grado=$this->grado AND procesado=0;");
			}else if(!empty($this->escolar) && !empty($this->grado) && !empty($this->seccion)){
				$sql=$this->db->query("SELECT id_alum, id_escolar, id_grado, id_seccion FROM inscripcion WHERE id_escolar=$this->escolar AND id_grado=$this->grado AND id_seccion=$this->seccion AND procesado=0;");
			}
			$aprobado=0;
			$aplazado=0;
			$sinProcesar=0;
			while($data=$this->db->recorrer($sql)){
				$this->db->liberar($sql);
				$sql=$this->db->query("SELECT aprobo FROM notas WHERE id_alum=$data[0] AND escolar=$data[1] AND grado=$data[2] AND seccion=$data[3] LIMIT 1;");
				if($this->db->rows($sql)>0){
					$data1=$this->db->recorrer($sql);
					$this->db->liberar($sql);
					$sql=$this->db->query("SELECT ");
					/*if($data1[0]=='si'){

						$this->db->query("INSERT INTO inscripcion(id_escolar, fecha, condicion, id_alum, id_grado, ) VALUES();");
					}else if($data1[0]=='no'){

					}
				}else{
					$sinProcesar++;
				}
			}*/
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