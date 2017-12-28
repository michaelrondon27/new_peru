<?php
	function Actitudes(){
		$db=new Conexion();
		$sql=$db->query("SELECT * FROM act_intereses;");
		if($db->rows($sql)>0){
			while($data=$db->recorrer($sql)){
				$_actitudes[$data['id_alum']]=$data;
			}
		}else{
			$_actitudes=false;
		}
		$db->liberar($sql);
		$db->close();
		return $_actitudes;
	}
?>