<?php
	require("asset/libs/PHPExcel/PHPExcel.php");
	$db=new Conexion();
	//VARIABLES DE PHP
	$objPHPExcel=new PHPExcel();
	$escolar=$_GET['escolar'];
	$grado=$_GET['grado'];
	$seccion=$_GET['seccion'];
	//PROPIEDADES DE ARCHIVO EXCEL
	$objPHPExcel->getProperties()->setCreator("Perú de Lacroix")
	->setLastModifiedBy("Perú de Lacroix")
	->setTitle("Reporte XLS")
	->setSubject("Reporte")
	->setDescription("")
	->setKeywords("")
	->setCategory("");
	//PROPIEDADES DE LA CELDA
	$objPHPExcel->getDefaultStyle()->getFont()->setName('Arial');
	$objPHPExcel->getDefaultStyle()->getFont()->setSize('12');
	$objPHPExcel->getActiveSheet()->getRowDimension('1')->setRowHeight(20);
	$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(10);
	$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
	$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(40);
	$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
	$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
	$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
	$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
	//CABECERA DE LA CONSULTA
	$i=1;
	$objPHPExcel->setActiveSheetIndex(0)
	->setCellValue("A".$i, "ID")
	->setCellValue("B".$i, "CEDULA")
	->setCellValue("C".$i, "APELLIDOS Y NOMBRES")
	->setCellValue("D".$i, "AÑO ESCOLAR")
	->setCellValue("E".$i, "GRADO")
	->setCellValue("F".$i, "SECCION")
	->setCellValue("G".$i, "APROBO");
	$objPHPExcel->getActiveSheet()
				->getStyle('A1:G1')
				->getFill()
				->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
				->getStartColor()->setARGB('FFEEEEEE');
	$borders=array(
		'borders'=>array(
			'allborders'=>array(
				'style'=>PHPExcel_Style_Border::BORDER_THIN,
				'color'=>array('argb'=>'FF000000'),
			)
		),
	);
	$objPHPExcel->getActiveSheet()
				->getStyle('A1:D1')
				->applyFromArray($borders);
	//DETALLE DE LA CONSULTA
	$sql=$db->query("SELECT i.id_alum, a.cedula, a.apellidos, a.nombres FROM inscripcion i INNER JOIN alumnos a ON i.id_alum=a.id_alum WHERE i.id_escolar=$escolar AND i.id_grado=$grado AND i.id_seccion=$seccion ORDER BY a.cedula;");
	while($data=$db->recorrer($sql)){
		$i++;
		//BORDE DE LA CELDA
		$objPHPExcel->setActiveSheetIndex(0)
		->getStyle('A'.$i.':G'.$i)
		->applyFromArray($borders);
		//MOSTRAMOS LOS VALORES
		$objPHPExcel->setActiveSheetIndex(0)
		->setCellValue("A".$i, $data[0])
		->setCellValue("B".$i, $data[1])
		->setCellValue("C".$i, $data[2]." ".$data[3])
		->setCellValue("D".$i, $_escolar[$escolar]['escolar'])
		->setCellValue("E".$i, $_grado[$grado]['grado'])
		->setCellValue("F".$i, $_seccion[$seccion]['seccion']);
	}
	$usuario=$_users[$_SESSION['app_id']]['usuario'];
	$indicesServer = array('REMOTE_ADDR',);
	$ip=$_SERVER['REMOTE_ADDR'];
	$evento="Excel de listado de alumnos del Año Escolar ".$_escolar[$escolar]['escolar']." Grado ".$_grado[$grado]['grado']." Seccion ".$_seccion[$seccion]['seccion'];
	$db->query("INSERT INTO registro_eventos(ip, usuario, evento, fecha, operacion) VALUES('$ip', '$usuario', '$evento', NOW(), 'SELECT');");
	$archivo="Listado De Alumnos ".$_escolar[$escolar]['escolar']." Año ".$_grado[$grado]['grado']." Seccion ".$_seccion[$seccion]['seccion'].".xls";
	header('Content-Type: application/vnd.ms-excel');
	header('Content-Disposition: attachment; filename="'.$archivo.'"');
	header('Cache-Control: max-age=0');
	$objWriter=PHPExcel_IOFACTORY::createWriter($objPHPExcel, 'Excel5');
	$objWriter->save('php://output');
	exit;
?>