<?php
	function Seccion(){
		$db=new Conexion();
		$sql=$db->query("SELECT * FROM seccion;");
		if($db->rows($sql)>0){
			while($data=$db->recorrer($sql)){
				$_seccion[$data['id_seccion']]=$data;
			}
		}else{
			$_seccion=false;
		}
		$db->liberar($sql);
		$db->close();
		return $_seccion;
	}
?>