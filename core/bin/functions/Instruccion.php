<?php
	function Instruccion(){
		$db=new Conexion();
		$sql=$db->query("SELECT * FROM grado_instruccion;");
		if($db->rows($sql)>0){
			while($data=$db->recorrer($sql)){
				$_instruccion[$data['id_instruccion']]=$data;
			}
		}else{
			$_instruccion=false;
		}
		$db->liberar($sql);
		$db->close();
		return $_instruccion;
	}
?>