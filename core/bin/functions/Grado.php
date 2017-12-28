<?php
	function Grado(){
		$db=new Conexion();
		$sql=$db->query("SELECT * FROM grado;");
		if($db->rows($sql)>0){
			while($data=$db->recorrer($sql)){
				$_grado[$data['id_grado']]=$data;
			}
		}else{
			$_grado=false;
		}
		$db->liberar($sql);
		$db->close();
		return $_grado;
	}
?>