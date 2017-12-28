<?php
	function Suplente(){
		$db=new Conexion();
		$sql=$db->query("SELECT * FROM repre_sup ORDER BY cedula;");
		if($db->rows($sql)>0){
			while($data=$db->recorrer($sql)){
				$_suplente[$data['id_repre_sup']]=$data;
			}
		}else{
			$_suplente=false;
		}
		$db->liberar($sql);
		$db->close();
		return $_suplente;
	}
?>