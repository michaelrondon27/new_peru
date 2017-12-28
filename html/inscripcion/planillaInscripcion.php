<?php
	error_reporting(E_ERROR | E_WARNING | E_PARSE);
	require("asset/libs/mpdf/mpdf.php");
	$db=new Conexion();
	$usuario=$_users[$_SESSION['app_id']]['usuario'];
	$indicesServer = array('REMOTE_ADDR',);
	$ip=$_SERVER['REMOTE_ADDR'];
	$evento="Reporte de la planilla de inscripcion del alumno ".$_alumno[$_inscripciones[$_GET['id']]['id_alum']]['nombres']." ".$_alumno[$_inscripciones[$_GET['id']]['id_alum']]['apellidos'];
	$db->query("INSERT INTO registro_eventos(ip, usuario, evento, fecha, operacion) VALUES('$ip', '$usuario', '$evento', NOW(), 'SELECT');");
	if($_alumno[$_inscripciones[$_GET['id']]['id_alum']]['fec_lopna']!="0000-00-00"){
		$fec_lopna=date("d-m-Y", strtotime($_alumno[$_inscripciones[$_GET['id']]['id_alum']]['fec_lopna']));
	}else{
		$fec_lopna="";
	}	
	$alum='
		<div class="container">
			<div class="img">
				<img src="asset/images/'.$_menu[1]['logo'].'" width="100" height="100">
			</div>
			<div class="titulos">
				<p>
					Rep&uacute;blica Bolivariana de Venezuela<br>
					Ministerio del Poder Popular para la Edcuaci&oacute;n<br>
					U.E.N. "Per&uacute; de Lacroix"<br>
					L&iacute;dice - Caracas<br>
					Tel&eacute;fono (0212) 8635278
				</p>
			</div>
			<img src=asset/images/'.$_alumno[$_inscripciones[$_GET['id']]['id_alum']]['foto_cedula'].' class="cedula">
			<div class="clear"></div>
			<div class="repres">
				<p>FOTO DEL REPRESENTANTE</p>
			</div>
			<img src=asset/images/'.$_alumno[$_inscripciones[$_GET['id']]['id_alum']]['foto_carnet'].' class="foto" style="margin-left: 285px !important;">
			<img src=asset/images/'.$_alumno[$_inscripciones[$_GET['id']]['id_alum']]['foto_carnet'].' class="foto" style="margin-left: -122px; !important;">
			<div class="clear"></div>
			<img src=asset/images/'.$_alumno[$_inscripciones[$_GET['id']]['id_alum']]['foto_carnet'].' class="foto">
			<img src=asset/images/'.$_alumno[$_inscripciones[$_GET['id']]['id_alum']]['foto_carnet'].' class="foto">
			<img src=asset/images/'.$_alumno[$_inscripciones[$_GET['id']]['id_alum']]['foto_carnet'].' class="foto">
			<div class="clear"></div>
			<h5>A. DATOS PERSONALES DEL ESTUDIANTE</h5>
			<div class="estudiante">
				<div class="ced linea_derecha">C&eacute;dula: '.$_alumno[$_inscripciones[$_GET['id']]['id_alum']]['cedula'].'</div>
				<div class="ced_escolar linea_derecha">C&eacute;dula escolar: '.$_alumno[$_inscripciones[$_GET['id']]['id_alum']]['ced_escolar'].'</div>
				<div class="parto">Posici&oacute;n seg&uacute;n parto(s): '.$_alumno[$_inscripciones[$_GET['id']]['id_alum']]['pos_parto'].'</div>
				<div class="linea"></div>
				<div class="apellidos linea_derecha">Apellidos: '.$_alumno[$_inscripciones[$_GET['id']]['id_alum']]['apellidos'].'</div>
				<div class="nombres linea_derecha">Nombres: '.$_alumno[$_inscripciones[$_GET['id']]['id_alum']]['nombres'].'</div>
				<div class="edad linea_derecha">Edad: '.$_alumno[$_inscripciones[$_GET['id']]['id_alum']]['edad'].'</div>
				<div class="sexo">Sexo: '.$_alumno[$_inscripciones[$_GET['id']]['id_alum']]['sexo'].'</div>
				<div class="linea"></div>
				<div class="lugar_fec linea_derecha">Lugar y Fecha de Nacimiento: '.$_alumno[$_inscripciones[$_GET['id']]['id_alum']]['lugar_nac'].', '.date("d-m-Y", strtotime($_alumno[$_inscripciones[$_GET['id']]['id_alum']]['fec_nac'])).'</div>
				<div class="pais linea_derecha">Pa&iacute;s: '.$_pais[$_alumno[$_inscripciones[$_GET['id']]['id_alum']]['id_pais']]['pais'].'</div>
				<div class="estado">Estado: '.$_estado[$_alumno[$_inscripciones[$_GET['id']]['id_alum']]['id_estado']]['estado'].'</div>
				<div class="linea"></div>
				<div class="correo linea_derecha">Correo: '.$_alumno[$_inscripciones[$_GET['id']]['id_alum']]['correo'].'</div>
				<div class="tlf">Tel&eacute;fono: '.$_celular[$_alumno[$_inscripciones[$_GET['id']]['id_alum']]['id_tlf_cel']]['cod_tlf_cel'].'-'.$_alumno[$_inscripciones[$_GET['id']]['id_alum']]['tlf_cel'].'</div>
				<div class="linea"></div>
				<div class="direccion">Direcci&oacute;n: '.$_alumno[$_inscripciones[$_GET['id']]['id_alum']]['direccion'].'</div>
				<div class="linea"></div>
				<div class="repre linea_derecha">Qui&eacute;n ser&aacute; el representante legal del estudiante: '.$_alumno[$_inscripciones[$_GET['id']]['id_alum']]['repre'].'</div>
				<div class="especifique">Especifique: '.$_alumno[$_inscripciones[$_GET['id']]['id_alum']]['especifique'].'</div>
				<div class="linea"></div>
				<div class="permi_lopna linea_derecha">Tiene permiso de la LOPNA: '.$_alumno[$_inscripciones[$_GET['id']]['id_alum']]['lopna'].'</div>
				<div class="fec_lopna">Fecha de Vencimiento: '.$fec_lopna.'</div>
				<div class="linea"></div>
				<div class="hermanos">Tiene hermanos estudiando en la instituci&oacute;n: '.$_alumno[$_inscripciones[$_GET['id']]['id_alum']]['hermano'].'</div>
			</div>
	';
	$madre='
		<div class="clear"></div>
		<h5>B. DATOS DE LA MADRE</h5>
		<div class="madre">
			<div class="apellidos linea_derecha">Apellidos: '.$_madre[$_alumno[$_inscripciones[$_GET['id']]['id_alum']]['id_madre']]['apellidos'].'</div>
			<div class="nombres linea_derecha">Nombres: '.$_madre[$_alumno[$_inscripciones[$_GET['id']]['id_alum']]['id_madre']]['nombres'].'</div>
			<div class="edad linea_derecha">Edad: '.$_madre[$_alumno[$_inscripciones[$_GET['id']]['id_alum']]['id_madre']]['edad'].'</div>
			<div class="ced">C&eacute;dula: '.$_madre[$_alumno[$_inscripciones[$_GET['id']]['id_alum']]['id_madre']]['cedula'].'</div>
			<div class="linea"></div>
			<div class="correo linea_derecha">Correo: '.$_madre[$_alumno[$_inscripciones[$_GET['id']]['id_alum']]['id_madre']]['correo'].'</div>
			<div class="instruccion linea_derecha">Grado Instrucci&oacute;n: '.$_instruccion[$_madre[$_alumno[$_inscripciones[$_GET['id']]['id_alum']]['id_madre']]['id_instruccion']]['instruccion'].'</div>
			<div class="ocupacion">Ocupaci&oacute;n: '.$_madre[$_alumno[$_inscripciones[$_GET['id']]['id_alum']]['id_madre']]['ocupacion'].'</div>
			<div class="linea"></div>
			<div class="dir">Nombre y direcci&oacute;n de la empresa u oficina donde trabaja: '.$_madre[$_alumno[$_inscripciones[$_GET['id']]['id_alum']]['id_madre']]['dir_empresa'].'</div>
			<div class="linea"></div>
			<div class="dir">Direcci&oacute;n de Habitaci&oacute;n: '.$_madre[$_alumno[$_inscripciones[$_GET['id']]['id_alum']]['id_madre']]['dir_hab'].'</div>
			<div class="linea"></div>
			<div class="tlf linea_derecha">Tlf. Habitaci&oacute;n: '.$_local[$_madre[$_alumno[$_inscripciones[$_GET['id']]['id_alum']]['id_madre']]['id_tlf_local']]['cod_tlf_local'].'-'.$_madre[$_alumno[$_inscripciones[$_GET['id']]['id_alum']]['id_madre']]['tlf_hab'].'</div>
			<div class="tlf linea_derecha">Tlf. Celular: '.$_celular[$_madre[$_alumno[$_inscripciones[$_GET['id']]['id_alum']]['id_madre']]['id_tlf_cel']]['cod_tlf_cel'].'-'.$_madre[$_alumno[$_inscripciones[$_GET['id']]['id_alum']]['id_madre']]['tlf_cel'].'</div>
			<div class="tlf">Tlf. Empresa: '.$_madre[$_alumno[$_inscripciones[$_GET['id']]['id_alum']]['id_madre']]['cod_emp'].'-'.$_madre[$_alumno[$_inscripciones[$_GET['id']]['id_alum']]['id_madre']]['tlf_empresa'].'</div>
		</div>
	';
	$padre='
		<div class="clear"></div>
		<h5>C. DATOS DEL PADRE</h5>
		<div class="padre">
			<div class="apellidos linea_derecha">Apellidos: '.$_padre[$_alumno[$_inscripciones[$_GET['id']]['id_alum']]['id_padre']]['apellidos'].'</div>
			<div class="nombres linea_derecha">Nombres: '.$_padre[$_alumno[$_inscripciones[$_GET['id']]['id_alum']]['id_padre']]['nombres'].'</div>
			<div class="edad linea_derecha">Edad: '.$_padre[$_alumno[$_inscripciones[$_GET['id']]['id_alum']]['id_padre']]['edad'].'</div>
			<div class="ced ">C&eacute;dula: '.$_padre[$_alumno[$_inscripciones[$_GET['id']]['id_alum']]['id_padre']]['cedula'].'</div>
			<div class="linea"></div>
			<div class="correo linea_derecha">Correo: '.$_padre[$_alumno[$_inscripciones[$_GET['id']]['id_alum']]['id_padre']]['correo'].'</div>
			<div class="instruccion linea_derecha">Grado Instrucci&oacute;n: '.$_instruccion[$_padre[$_alumno[$_inscripciones[$_GET['id']]['id_alum']]['id_padre']]['id_instruccion']]['instruccion'].'</div>
			<div class="ocupacion">Ocupaci&oacute;n: '.$_padre[$_alumno[$_inscripciones[$_GET['id']]['id_alum']]['id_padre']]['ocupacion'].'</div>
			<div class="linea"></div>
			<div class="dir">Nombre y direcci&oacute;n de la empresa u oficina donde trabaja: '.$_padre[$_alumno[$_inscripciones[$_GET['id']]['id_alum']]['id_padre']]['dir_empresa'].'</div>
			<div class="linea"></div>
			<div class="dir">Direcci&oacute;n de Habitaci&oacute;n: '.$_padre[$_alumno[$_inscripciones[$_GET['id']]['id_alum']]['id_padre']]['dir_hab'].'</div>
			<div class="linea"></div>
			<div class="tlf linea_derecha">Tlf. Habitaci&oacute;n: '.$_local[$_padre[$_alumno[$_inscripciones[$_GET['id']]['id_alum']]['id_padre']]['id_tlf_local']]['cod_tlf_local'].'-'.$_padre[$_alumno[$_inscripciones[$_GET['id']]['id_alum']]['id_padre']]['tlf_hab'].'</div>
			<div class="tlf linea_derecha">Tlf. Celular: '.$_celular[$_padre[$_alumno[$_inscripciones[$_GET['id']]['id_alum']]['id_padre']]['id_tlf_cel']]['cod_tlf_cel'].'-'.$_padre[$_alumno[$_inscripciones[$_GET['id']]['id_alum']]['id_padre']]['tlf_cel'].'</div>
			<div class="tlf">Tlf. Empresa: '.$_padre[$_alumno[$_inscripciones[$_GET['id']]['id_alum']]['id_padre']]['cod_emp'].'-'.$_padre[$_alumno[$_inscripciones[$_GET['id']]['id_alum']]['id_padre']]['tlf_empresa'].'</div>
		</div>
	';
	$legal='
		<div class="clear"></div>
		<h5>D. DATOS DEL REPRESENTANTE LEGAL</h5>
		<div class="legal">
			<div class="apellidos linea_derecha">Apellidos: '.$_legal[$_alumno[$_inscripciones[$_GET['id']]['id_alum']]['id_repre']]['apellidos'].'</div>
			<div class="nombres linea_derecha">Nombres: '.$_legal[$_alumno[$_inscripciones[$_GET['id']]['id_alum']]['id_repre']]['nombres'].'</div>
			<div class="edad linea_derecha">Edad: '.$_legal[$_alumno[$_inscripciones[$_GET['id']]['id_alum']]['id_repre']]['edad'].'</div>
			<div class="ced">C&eacute;dula: '.$_legal[$_alumno[$_inscripciones[$_GET['id']]['id_alum']]['id_repre']]['cedula'].'</div>
			<div class="linea"></div>
			<div class="nota">En caso de no ser ninguno de los padres, completar los siguientes datos y SOLICITAR el document legal del Consejo de Protecci&oacute;n de Niños, Niñas y Adolescente o la AUTORIZACI&Oacute;N POR ESCRITO DE UNO DE LOS PADRES Y ANEXAR AL LIBRO DE VIDA.</div>
		</div>
	';
	$sup='
		<div class="clear"></div>
		<h5>E. DATOS DEL REPRESENTANTE SUPLENTE (ASUME CORRESPONSABILIDAD EN ASUSENCIA DEL REPRES. LEGAL)</h5>
		<div class="sup">
			<div class="parentesco linea_derecha">Parentesco: '.$_suplente[$_alumno[$_inscripciones[$_GET['id']]['id_alum']]['id_repre_sup']]['parentesco'].'</div>
			<div class="apellidos linea_derecha">Apellidos: '.$_suplente[$_alumno[$_inscripciones[$_GET['id']]['id_alum']]['id_repre_sup']]['apellidos'].'</div>
			<div class="nombres linea_derecha">Nombres: '.$_suplente[$_alumno[$_inscripciones[$_GET['id']]['id_alum']]['id_repre_sup']]['nombres'].'</div>
			<div class="edad ">Edad: '.$_suplente[$_alumno[$_inscripciones[$_GET['id']]['id_alum']]['id_repre_sup']]['edad'].'</div>
			<div class="linea"></div>
			<div class="ced linea_derecha">C&eacute;dula: '.$_suplente[$_alumno[$_inscripciones[$_GET['id']]['id_alum']]['id_repre_sup']]['cedula'].'</div>
			<div class="instruccion linea_derecha">Grado Instrucci&oacute;n: '.$_instruccion[$_suplente[$_alumno[$_inscripciones[$_GET['id']]['id_alum']]['id_repre_sup']]['id_instruccion']]['instruccion'].'</div>
			<div class="ocupacion linea_derecha">Ocupaci&oacute;n: '.$_suplente[$_alumno[$_inscripciones[$_GET['id']]['id_alum']]['id_repre_sup']]['ocupacion'].'</div>
			<div class="correo">Correo: '.$_suplente[$_alumno[$_inscripciones[$_GET['id']]['id_alum']]['id_repre_sup']]['correo'].'</div>
			<div class="linea"></div>
			<div class="dir">Nombre y direcci&oacute;n de la empresa u oficina donde trabaja: '.$_suplente[$_alumno[$_inscripciones[$_GET['id']]['id_alum']]['id_repre_sup']]['dir_emp'].'</div>
			<div class="linea"></div>
			<div class="dir">Direcci&oacute;n de Habitaci&oacute;n: '.$_suplente[$_alumno[$_inscripciones[$_GET['id']]['id_alum']]['id_repre_sup']]['dir_hab'].'</div>
			<div class="linea"></div>
			<div class="tlf linea_derecha">Tlf. Habitaci&oacute;n: '.$_local[$_suplente[$_alumno[$_inscripciones[$_GET['id']]['id_alum']]['id_repre_sup']]['id_tlf_local']]['cod_tlf_local'].'-'.$_suplente[$_alumno[$_inscripciones[$_GET['id']]['id_alum']]['id_repre_sup']]['tlf_hab'].'</div>
			<div class="tlf linea_derecha">Tlf. Celular: '.$_celular[$_suplente[$_alumno[$_inscripciones[$_GET['id']]['id_alum']]['id_repre_sup']]['id_tlf_cel']]['cod_tlf_cel'].'-'.$_suplente[$_alumno[$_inscripciones[$_GET['id']]['id_alum']]['id_repre_sup']]['tlf_cel'].'</div>
			<div class="tlf">Tlf. Empresa: '.$_suplente[$_alumno[$_inscripciones[$_GET['id']]['id_alum']]['id_repre_sup']]['cod_emp'].'-'.$_suplente[$_alumno[$_inscripciones[$_GET['id']]['id_alum']]['id_repre_sup']]['tlf_emp'].'</div>
		</div>
	';
	$medico='
		<div class="clear"></div>
		<h5>F. ANTECEDENTE M&Eacute;DICOS DEL ESTUDIANTE</h5>
		<div class="med">
			<div class="sangre linea_derecha">Grupo Sangu&iacute;neo: '.$_sangre[$_medico[$_inscripciones[$_GET['id']]['id_alum']]['id_tipo_sangre']]['sangre'].'</div>
			<div class="lateralidad linea_derecha">Lateralidad: '.$_medico[$_inscripciones[$_GET['id']]['id_alum']]['lateralidad'].'</div>
			<div class="lentes linea_derecha">Usa lentes: '.$_medico[$_inscripciones[$_GET['id']]['id_alum']]['lentes'].'</div>
			<div class="oido">Oye bien: '.$_medico[$_inscripciones[$_GET['id']]['id_alum']]['oido'].'</div>
			<div class="linea"></div>
			<div class="afecciones">Sufre o tiene antecedentes de algunas de estas afecciones m&eacute;dicas:</div>
			<div class="diabetes">Diabetes: '.$_medico[$_inscripciones[$_GET['id']]['id_alum']]['diabetes'].'</div>
			<div class="hipertension">Hipertensi&oacute;n: '.$_medico[$_inscripciones[$_GET['id']]['id_alum']]['hipertension'].'</div>
			<div class="cardiopatia">Cardiopat&iacute;a: '.$_medico[$_inscripciones[$_GET['id']]['id_alum']]['cardiopatia'].'</div>
			<div class="asma">Asma: '.$_medico[$_inscripciones[$_GET['id']]['id_alum']]['asma'].'</div>
			<div class="alergias">Alergias: '.$_medico[$_inscripciones[$_GET['id']]['id_alum']]['alergias'].'</div>
			<div class="otras">Otras: '.$_medico[$_inscripciones[$_GET['id']]['id_alum']]['descrip_otras'].'</div>
			<div class="linea"></div>
			<div class="sufrido">Ha sufrido:</div>
			<div class="sarampion">Sarampi&oacute;n: '.$_medico[$_inscripciones[$_GET['id']]['id_alum']]['sarampion'].'</div>
			<div class="rubeola">Rub&eacute;ola: '.$_medico[$_inscripciones[$_GET['id']]['id_alum']]['rubeola'].'</div>
			<div class="paperas">Paperas: '.$_medico[$_inscripciones[$_GET['id']]['id_alum']]['paperas'].'</div>
			<div class="linea"></div>
			<div class="diversidad">Presenta alguna diversidad funcional: '.$_medico[$_inscripciones[$_GET['id']]['id_alum']]['diversidad'].'</div>
			<div class="linea"></div>
			<div class="especialistas">Ha sido tratado por alguno de estos especialistas:</div>
			<div class="psicologo">Psic&oacute;logo: '.$_medico[$_inscripciones[$_GET['id']]['id_alum']]['psicolo1'].'</div>
			<div class="lengua">Terapista de Lenguaje: '.$_medico[$_inscripciones[$_GET['id']]['id_alum']]['tera_lengua1'].'</div>
			<div class="psicopedagogia">Psicopedagog&iacute;a: '.$_medico[$_inscripciones[$_GET['id']]['id_alum']]['psicopedagogia1'].'</div>
			<div class="neurologo">Neur&oacute;logo: '.$_medico[$_inscripciones[$_GET['id']]['id_alum']]['neurolo1'].'</div>
			<div class="ocupacional">Terapia Ocupacional: '.$_medico[$_inscripciones[$_GET['id']]['id_alum']]['tera_ocup1'].'</div>
			<div class="psiquiatria">Psiquiatr&iacute;a: '.$_medico[$_inscripciones[$_GET['id']]['id_alum']]['psiquiatria1'].'</div>
			<div class="odontologia">Odontolog&iacute;a: '.$_medico[$_inscripciones[$_GET['id']]['id_alum']]['odontologia1'].'</div>
			<div class="dermatologia">Dermatolog&iacute;a: '.$_medico[$_inscripciones[$_GET['id']]['id_alum']]['dermatologia1'].'</div>
			<div class="fisiatria">Fisiatr&iacute;a: '.$_medico[$_inscripciones[$_GET['id']]['id_alum']]['fisiatria1'].'</div>
			<div class="otros">Otros: '.$_medico[$_inscripciones[$_GET['id']]['id_alum']]['otro_esp1'].'</div>
			<div class="linea"></div>
			<div class="especialista">Est&aacute; siendo tratado por alg&uacute;n especialista:</div>
			<div class="psicologo">Psic&oacute;logo: '.$_medico[$_inscripciones[$_GET['id']]['id_alum']]['psicolo2'].'</div>
			<div class="lengua">Terapista de Lenguaje: '.$_medico[$_inscripciones[$_GET['id']]['id_alum']]['tera_lengua2'].'</div>
			<div class="psicopedagogia">Psicopedagog&iacute;a: '.$_medico[$_inscripciones[$_GET['id']]['id_alum']]['psicopedagogia2'].'</div>
			<div class="neurologo">Neur&oacute;logo: '.$_medico[$_inscripciones[$_GET['id']]['id_alum']]['neurolo2'].'</div>
			<div class="ocupacional">Terapia Ocupacional: '.$_medico[$_inscripciones[$_GET['id']]['id_alum']]['tera_ocup2'].'</div>
			<div class="psiquiatria">Psiquiatr&iacute;a: '.$_medico[$_inscripciones[$_GET['id']]['id_alum']]['psiquiatria2'].'</div>
			<div class="odontologia">Odontolog&iacute;a: '.$_medico[$_inscripciones[$_GET['id']]['id_alum']]['odontologia2'].'</div>
			<div class="dermatologia">Dermatolog&iacute;a: '.$_medico[$_inscripciones[$_GET['id']]['id_alum']]['dermatologia2'].'</div>
			<div class="fisiatria">Fisiatr&iacute;a: '.$_medico[$_inscripciones[$_GET['id']]['id_alum']]['fisiatria2'].'</div>
			<div class="otros1">Otros: '.$_medico[$_inscripciones[$_GET['id']]['id_alum']]['otro_esp2'].'</div>
			<div class="lugar">Indique lugar de tratamiento: '.$_medico[$_inscripciones[$_GET['id']]['id_alum']]['lugar_trata'].'</div>
			<div class="linea"></div>
			<div class="medicado">Se encuentra actualmente medicado: '.$_medico[$_inscripciones[$_GET['id']]['id_alum']]['act_medicado'].'</div>
			<div class="linea"></div>
			<div class="fisico">Tiene alg&uacute;n impedimento para realizar Educaci&oacute;n F&iacute;sica o Deportes: '.$_medico[$_inscripciones[$_GET['id']]['id_alum']]['imp_depor'].'</div>
			<div class="linea"></div>
			<div class="seguro">Goza de seguro m&eacute;dico: '.$_medico[$_inscripciones[$_GET['id']]['id_alum']]['seg_med'].'</div>
		</div>
	';
	$act='
		<div class="clear"></div>
		<h5>G. ACTITUDES E INTERESES ESPECIALES</h5>
		<div class="act">
			<div class="extra">Practica alguna actividad extracurricular: </div>
			<div class="extra">'.$_actitudes[$_inscripciones[$_GET['id']]['id_alum']]['act_extra'].'</div>
			<div class="linea"></div>
			<div class="deporte">Le gustar&iacute;a practicar alguna actividad deportiva y/o recreativa en la instituci&oacute;n:</div>
			<div class="deporte">Voleibol: '.$_actitudes[$_inscripciones[$_GET['id']]['id_alum']]['voleibol'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;B&aacute;squetbol: '.$_actitudes[$_inscripciones[$_GET['id']]['id_alum']]['basquet'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Futbolito: '.$_actitudes[$_inscripciones[$_GET['id']]['id_alum']]['futbolito'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ajedrez: '.$_actitudes[$_inscripciones[$_GET['id']]['id_alum']]['ajedrez'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Danza: '.$_actitudes[$_inscripciones[$_GET['id']]['id_alum']]['danza'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Teatro: '.$_actitudes[$_inscripciones[$_GET['id']]['id_alum']]['teatro'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;M&uacute;sica: '.$_actitudes[$_inscripciones[$_GET['id']]['id_alum']]['musica'].'</div>
			<div class="linea"></div>
			<div class="voluntariados">A cu&aacute;l de los siguientes voluntarios le gustar&iacute;a pertenecer:</div>
			<div class="voluntariados">Sociedad Bolivariana: '.$_actitudes[$_inscripciones[$_GET['id']]['id_alum']]['soc_boliv'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Cruz Roja: '.$_actitudes[$_inscripciones[$_GET['id']]['id_alum']]['cruz_roja'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Biblioteca: '.$_actitudes[$_inscripciones[$_GET['id']]['id_alum']]['biblioteca'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Mantenimiento: '.$_actitudes[$_inscripciones[$_GET['id']]['id_alum']]['mantenimiento'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Conservaci&oacute;n: '.$_actitudes[$_inscripciones[$_GET['id']]['id_alum']]['conservacion'].'</div>
		</div>
		<div class="clear"></div>
		<h5>H. INFORMACI&Oacute;N GENERAL</h5>
		<div class="act">
			<div class="canaima">Posee Canaima (computador): En caso de ser Si, en qu&eacute; condiciones esta: '.$_actitudes[$_inscripciones[$_GET['id']]['id_alum']]['condiciones'].', serial: '.$_actitudes[$_inscripciones[$_GET['id']]['id_alum']]['num_serial'].'</div>
			<div class="canaima">En caso de ser NO, explique el motivo: '.$_actitudes[$_inscripciones[$_GET['id']]['id_alum']]['motivo'].', denuncia: '.$_actitudes[$_inscripciones[$_GET['id']]['id_alum']]['denuncia'].'</div>
		</div>
		<div class="clear"></div>
		<br><br>
		<h5 class="centrar">DOCUMENTOS ANEXOS</h5>
		<div class="left">
			<h5>1. Del estudiante</h5>
			<div>__Original y cuatro (04) copias LEGIBLES de la Partida de Nacimiento del Estudiante.</div>
			<div>__Cuatro (04) copias de la C&eacute;dula de Identidad o Constancia de C&eacute;dula Escolar LEGIBLE del Estudiante.</div>
			<div>__Original y dos (02) copias de la Boleta del A&ntilde;o Anterior.</div>
			<div>__Cinco (05) fotos Tama&ntilde;o Carnet del Estudiante con el uniforme escolar.</div>
		</div>
		<div class="left">
			<h5>2. Del Representante</h5>
			<div>__Dos (02) copias de la C&eacute;dula de Identidad LEGIBLE del Representante.</div>
			<div>__Dos (02) fotos tama&ntilde;o Carnet del Representante.</div>
		</div>
		<div class="left">
			<h5>3. Otros</h5>
			<div>__Dos (02) Carpetas Marrones Tama&ntilde;o Oficio con Gancho.</div>
			<div>__Un (01) sobre de Manila Tama&ntilde;o Oficio.</div>
			<div>__Haber cumplido con la Jornada de Mantenimiento durante el mes de junio.</div>
			<div>__Colaboraci&oacute;n con la Instituci&oacute;n.</div>
		</div>
		<div class="left">
			<h5>4. Estudiantes que van a cursar 5to. A&ntilde;o.</h5>
			<div>__Siete (07) timbres fiscales de 0,1 U.T del Distrito Capital.</div>
			<div>__Dos (02) Carpetas Marrones Tama&ntilde;o Oficio.</div>
		</div>
		<div class="left">
			<h5>5. En caso de Nuevo Ingreso, los requisitos antes mencionados y:</h5>
			<div>__Boleta de Zonificaci&oacute;n.</div>
			<div>__Original y dos (02) copias de la Constancia de Buena Conducta.</div>
			<div>__Original y tres (03) copias LEGIBLE de la Boleta del A&ntilde;o Escolar o Lapso.</div>
			<div>__Original y tres (03) copias de la Certificaci&oacute;n de Calificaciones.</div>
			<div>__Informe M&eacute;dico o Constancia de Ni&ntilde;o Sano (Solo para 1er. A&ntilde;o).</div>
		</div>
	';
	function edad($nac, $ins){
		//Esta funcion toma una fecha de nacimiento 
		//desde una base de datos mysql
		//en formato aaaa/mm/dd y calcula la edad en números enteros
		//descomponer fecha de nacimiento
		$dia_nac=substr($nac, 8, 2);
		$mes_nac=substr($nac, 5, 2);
		$anno_nac=substr($nac, 0, 4);
		//descomponer fecha de inscripcion
		$dia_ins=substr($ins, 8, 2);
		$mes_ins=substr($ins, 5, 2);
		$anno_ins=substr($ins, 0, 4);
 		if($mes_nac>$mes_ins){
			$edad=$anno_ins-$anno_nac-1;
		}else{
			if($mes_ins==$mes_nac AND $dia_nac>$dia_ins){
				$edad= $anno_ins-$anno_nac-1;
			}else{
				$edad=$anno_ins-$anno_nac;
			}
		}
		return $edad;
	}
	if($_inscripciones[$_GET['id']]['condicion']=="Regular"){
		$regular="X";
		$pendiente="";
		$repitiente="";
		$materia="";
	}else if($_inscripciones[$_GET['id']]['condicion']=="Regular, pendiente"){
		$regular="";
		$pendiente="X";
		$repitiente="";
		$materia=$_inscripciones[$_GET['id']]['repitiente'];
	}else if($_inscripciones[$_GET['id']]['condicion']=="Repitiente"){
		$regular="";
		$pendiente="";
		$repitiente="X";
		$materia=$_inscripciones[$_GET['id']]['repitiente'];
	}
	$inscripcion='
		<div class="clear"></div>
		<h5 class="centrar">INSCRIPCI&Oacute;N A&Ntilde;O ESCOLAR '.$_escolar[$_inscripciones[$_GET['id']]['id_escolar']]['escolar'].'</h5>
		<h5 class="centrar">A&Ntilde;O: '.$_grado[$_inscripciones[$_GET['id']]['id_grado']]['grado'].' SECCI&Oacute;N: '.$_seccion[$_inscripciones[$_GET['id']]['id_seccion']]['seccion'].'</h5>
		<div class="clear"></div>
		<div class="ins">
			<div class="estu">Estudiante: '.$_alumno[$_inscripciones[$_GET['id']]['id_alum']]['nombres'].' '.$_alumno[$_inscripciones[$_GET['id']]['id_alum']]['apellidos'].'</div>
			<div class="ed">Edad: '.edad($_alumno[$_inscripciones[$_GET['id']]['id_alum']]['fec_nac'], $_inscripciones[$_GET['id']]['fecha']).'</div>
			<div class="cedu">C&eacute;dula: '.$_alumno[$_inscripciones[$_GET['id']]['id_alum']]['cedula'].'</div>
			<div class="fec_ins">Fecha de Inscripci&oacute;n: '.date("d-m-Y", strtotime($_inscripciones[$_GET['id']]['fecha'])).'</div>
			<div class="usuario">Hecha por el profesor(a): '.$_users[$_inscripciones[$_GET['id']]['id_usuario']]['nombre'].' '.$_users[$_inscripciones[$_GET['id']]['id_usuario']]['apellido'].'</div>
		</div>
		<div class="clear"></div>
		<h5 class="centrar">Condici&oacute;n de la inscripci&oacute;n del alumno:</h5>
		<div class="ins">
			<div class="reg">Regular: <span>'.$regular.'</span></div>
			<div class="pen">Regular, con materia pendiente: <span>'.$pendiente.'</span></div>
			<div class="rep">Repitiente: <span>'.$repitiente.'</span> con: '.$materia.'</div>
		</div>
		<div class="clear"></div>
		<div class="clear"></div>
		<div class="clear"></div>
		<div class="clear"></div>
		<div class="clear"></div>
		<div class="clear"></div>
		<div class="clear"></div>
		<div class="clear"></div>
		<div class="clear"></div>
		<div class="firma"><strong>Estudiante</strong></div>
		<div class="firma"><strong>Firma del Representante</strong></div>
		<div class="firma"><strong>Prof. que hizo la incripci&oacute;n</strong></div>
		</div>
	';
	$mpdf=new mPDF('', 'Letter');
	$mpdf->addPage();
	$css=file_get_contents('asset/css/reporte.css');
	$mpdf->writeHTML($css, 1);
	$mpdf->writeHTML($alum);
	/*if($hermanos>0){
		$mpdf->writeHTML($her);
	}*/
	$mpdf->writeHTML($madre);
	$mpdf->writeHTML($padre);
	$mpdf->writeHTML($legal);
	$mpdf->writeHTML($sup);
	/*if($hermanos==0){
		$mpdf->writeHTML($espacio);
	}*/
	$mpdf->writeHTML($medico);
	$mpdf->writeHTML($act);
	$mpdf->writeHTML($inscripcion);
	$mpdf->setFooter('{PAGENO}');
	$mpdf->SetTitle('Planilla de Inscripción de '.$alumnos[3].' '.$alumnos[4].' '.$i[0]);
	$mpdf->Output('Planilla de Inscripción '.$alumnos[3].' '.$alumnos[4].' '.$i[0].'.pdf', 'I');
?>