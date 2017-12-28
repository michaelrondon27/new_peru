<?php
	function GrupoSanguineo(){
		$db=new Conexion();
		$sql=$db->query("SELECT * FROM tipo_sangre;");
		if($db->rows($sql)>0){
			while($data=$db->recorrer($sql)){
				$_sangre[$data['id_tipo_sangre']]=$data;
			}
		}else{
			$_sangre=false;
		}
		$db->liberar($sql);
		$db->close();
		return $_sangre;
	}
?>