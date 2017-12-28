<?php
	function Alumno(){
		$db=new Conexion();
		$sql=$db->query("SELECT * FROM alumnos ORDER BY cedula;");
		if($db->rows($sql)>0){
			while($data=$db->recorrer($sql)){
				$_alumno[$data['id_alum']]=$data;
			}
		}else{
			$_alumno=false;
		}
		$db->liberar($sql);
		$db->close();
		return $_alumno;
	}
?>