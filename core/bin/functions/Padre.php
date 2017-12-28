<?php
	function Padre(){
		$db=new Conexion();
		$sql=$db->query("SELECT * FROM padre ORDER BY cedula;");
		if($db->rows($sql)>0){
			while($data=$db->recorrer($sql)){
				$_padre[$data['id_padre']]=$data;
			}
		}else{
			$_padre=false;
		}
		$db->liberar($sql);
		$db->close();
		return $_padre;
	}
?>