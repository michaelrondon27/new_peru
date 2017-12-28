<?php
	function Menu(){
		$db=new Conexion();
		$sql=$db->query("SELECT * FROM menu;");
		if($db->rows($sql)>0){
			while($data=$db->recorrer($sql)){
				$_menu[$data['id_menu']]=$data;
			}
		}else{
			$_menu=false;
		}
		$db->liberar($sql);
		$db->close();
		return $_menu;
	}
?>