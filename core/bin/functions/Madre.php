<?php
	function Madre(){
		$db=new Conexion();
		$sql=$db->query("SELECT * FROM madre ORDER BY cedula;");
		if($db->rows($sql)>0){
			while($data=$db->recorrer($sql)){
				$_madre[$data['id_madre']]=$data;
			}
		}else{
			$_madre=false;
		}
		$db->liberar($sql);
		$db->close();
		return $_madre;
	}
?>