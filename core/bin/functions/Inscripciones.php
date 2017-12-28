<?php
	function Inscripciones(){
		$db=new Conexion();
		$sql=$db->query("SELECT * FROM inscripcion;");
		if($db->rows($sql)>0){
			while($data=$db->recorrer($sql)){
				$_inscripciones[$data['id_inscripcion']]=$data;
			}
		}else{
			$_inscripciones=false;
		}
		$db->liberar($sql);
		$db->close();
		return $_inscripciones;
	}
?>