<?php
	function Antropometricas(){
		$db=new Conexion();
		$sql=$db->query("SELECT * FROM antropometricas;");
		if($db->rows($sql)>0){
			while($data=$db->recorrer($sql)){
				$_antropometricas[$data['id_alum']]=$data;
			}
		}else{
			$_antropometricas=false;
		}
		$db->liberar($sql);
		$db->close();
		return $_antropometricas;
	}
?>