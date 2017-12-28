<?php
	function Perfiles(){
		$db=new Conexion();
		$sql=$db->query("SELECT * FROM tipo_usu;");
		if($db->rows($sql)>0){
			while($data=$db->recorrer($sql)){
				$_perfil[$data['id_tipo_usu']]=$data;
			}
		}else{
			$_perfil=false;
		}
		$db->liberar($sql);
		$db->close();
		return $_perfil;
	}
?>