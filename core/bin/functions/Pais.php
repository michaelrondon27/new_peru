<?php
	function Pais(){
		$db=new Conexion();
		$sql=$db->query("SELECT * FROM pais;");
		if($db->rows($sql)>0){
			while($data=$db->recorrer($sql)){
				$_pais[$data['id_pais']]=$data;
			}
		}else{
			$_pais=false;
		}
		$db->liberar($sql);
		$db->close();
		return $_pais;
	}
?>