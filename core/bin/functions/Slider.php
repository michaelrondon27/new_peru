<?php
	function Slider(){
		$db=new Conexion();
		$sql=$db->query("SELECT * FROM slider;");
		if($db->rows($sql)>0){
			while($data=$db->recorrer($sql)){
				$_slider[$data['id_slider']]=$data;
			}
		}else{
			$_slider=false;
		}
		$db->liberar($sql);
		$db->close();
		return $_slider;
	}
?>