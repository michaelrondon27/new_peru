<?php
	function Local(){
		$db=new Conexion();
		$sql=$db->query("SELECT * FROM cod_tlf_local;");
		if($db->rows($sql)>0){
			while($data=$db->recorrer($sql)){
				$_local[$data['id_tlf_local']]=$data;
			}
		}else{
			$_local=false;
		}
		$db->liberar($sql);
		$db->close();
		return $_local;
	}
?>