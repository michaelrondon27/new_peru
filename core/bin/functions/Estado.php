<?php
	function Estado(){
		$db=new Conexion();
		$sql=$db->query("SELECT * FROM estado;");
		if($db->rows($sql)>0){
			while($data=$db->recorrer($sql)){
				$_estado[$data['id_estado']]=$data;
			}
		}else{
			$_estado=false;
		}
		$db->liberar($sql);
		$db->close();
		return $_estado;
	}
?>