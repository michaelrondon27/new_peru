<?php
	function Medicos(){
		$db=new Conexion();
		$sql=$db->query("SELECT * FROM ante_medicos;");
		if($db->rows($sql)>0){
			while($data=$db->recorrer($sql)){
				$_medico[$data['id_alum']]=$data;
			}
		}else{
			$_medico=false;
		}
		$db->liberar($sql);
		$db->close();
		return $_medico;
	}
?>