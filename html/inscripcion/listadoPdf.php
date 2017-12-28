<?php
	require("asset/libs/mpdf/mpdf.php");
	$db=new Conexion();
	$escolar=$_GET['escolar'];
	$grado=$_GET['grado'];
	$seccion=$_GET['seccion'];
	$usuario=$_users[$_SESSION['app_id']]['usuario'];
	$indicesServer = array('REMOTE_ADDR',);
	$ip=$_SERVER['REMOTE_ADDR'];
	$evento="Reporte del listado de alumnos del Año Escolar ".$_escolar[$escolar]['escolar']." Grado".$_grado[$grado]['grado']." Sección".$_seccion[$seccion]['seccion'];
	$db->query("INSERT INTO registro_eventos(ip, usuario, evento, fecha, operacion) VALUES('$ip', '$usuario', '$evento', NOW(), 'SELECT');");
	$header='
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
			<div class="clear"></div>
			<h3>Listado de Alumnos del A&ntilde;o Escolar '.$_escolar[$escolar]['escolar'].'</h3>
			<br>
			<h3>Grado '.$_grado[$grado]['grado'].' Secci&oacute;n '.$_seccion[$seccion]['seccion'].'</h3>
			<div class="clear"></div>
			<table>
				<tr>
					<th>N°</th>
					<th>Cédula</th>
					<th>Alumno</th>
					<th>Fecha de Inscripción</th>
					<th>Condición</th>
				</tr>
	';
	$mpdf=new mPDF('', 'Letter');
	$mpdf->addPage();
	$css=file_get_contents('asset/css/reporte_listado.css');
	$mpdf->writeHTML($css, 1);
	$mpdf->writeHTML($header);
	$sql=$db->query("SELECT i.fecha, i.condicion, a.cedula, a.apellidos, a.nombres FROM inscripcion i INNER JOIN alumnos a ON i.id_alum=a.id_alum WHERE i.id_escolar=".$escolar." AND i.id_grado=".$grado." AND i.id_seccion=".$seccion." ORDER BY a.cedula;");
	$contador=1;
	while($data=$db->recorrer($sql)){
		$listado='
			<tr>
				<td>'.$contador.'</td>
				<td>'.$data[2].'</td>
				<td>'.$data[3].' '.$data[4].'</td>
				<td>'.date("d-m-Y", strtotime($data[0])).'</td>
				<td>'.$data[1].'</td>
			</tr>
		';
		$contador++;
		$mpdf->writeHTML($listado);
	}
	$footer='
			</table>
		</div>
	';
	$mpdf->writeHTML($footer);
	$mpdf->setFooter('{PAGENO}');
	$mpdf->SetTitle('Listado de Alumnos del Año Escolar '.$_escolar[$escolar]['escolar'].' Grado'.$_grado[$grado]['grado'].' Sección'.$_seccion[$seccion]['seccion']);
	$mpdf->Output('Listado de Alumnos del Año Escolar '.$_escolar[$escolar]['escolar'].' Grado'.$_grado[$grado]['grado'].' Sección'.$_seccion[$seccion]['seccion'].'.pdf', 'I');
?>