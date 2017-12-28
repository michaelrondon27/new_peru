<?php
	function Legal(){
		$db=new Conexion();
		$sql=$db->query("SELECT * FROM repre_legal ORDER BY cedula;");
		if($db->rows($sql)>0){
			while($data=$db->recorrer($sql)){
				$_legal[$data['id_repre']]=$data;
			}
		}else{
			$_legal=false;
		}
		$db->liberar($sql);
		$db->close();
		return $_legal;
	}
?>