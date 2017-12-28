<?php
	function Escolar(){
		$db=new Conexion();
		$sql=$db->query("SELECT * FROM escolar;");
		if($db->rows($sql)>0){
			while($data=$db->recorrer($sql)){
				$_escolar[$data['id_escolar']]=$data;
			}
		}else{
			$_escolar=false;
		}
		$db->liberar($sql);
		$db->close();
		return $_escolar;
	}
?>