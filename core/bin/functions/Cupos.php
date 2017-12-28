<?php
	function Cupos(){
		$db=new Conexion();
		$sql=$db->query("SELECT * FROM cupos;");
		if($db->rows($sql)>0){
			while($data=$db->recorrer($sql)){
				$_cupos[$data['id_cupo']]=$data;
			}
		}else{
			$_cupos=false;
		}
		$db->liberar($sql);
		$db->close();
		return $_cupos;
	}
?>