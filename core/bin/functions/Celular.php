<?php
	function Celular(){
		$db=new Conexion();
		$sql=$db->query("SELECT * FROM cod_tlf_cel;");
		if($db->rows($sql)>0){
			while($data=$db->recorrer($sql)){
				$_celular[$data['id_tlf_cel']]=$data;
			}
		}else{
			$_celular=false;
		}
		$db->liberar($sql);
		$db->close();
		return $_celular;
	}
?>