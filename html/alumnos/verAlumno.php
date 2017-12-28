<!DOCTYPE html>
<html>
	<?php
		include(HTML_DIR."overall/header.php");
		error_reporting(E_ERROR | E_WARNING | E_PARSE);
		?>
		<body>
			<?php
		      	include(HTML_DIR."overall/menu.php");
		      	include(HTML_DIR."overall/scripts.php");
		    ?>
			<div id="content">
				<div class="panel box-shadow-none content-header">
	                <div class="panel-body">
	                    <div class="col-md-9">
	                        <p class="animated fadeInDown">
	                          	Alumnos <span class="fa-angle-right fa"></span> Información del Alumno <span class="fa-angle-right fa"></span> <?php echo $_alumno[$_GET['id']]['nombres']." ".$_alumno[$_GET['id']]['apellidos'];?>
	                        </p>
	                    </div>
	                    <div class="col-md-3">
	                        <p class="animated fadeInDown">
	                          <a class="btn btn-teal" href="?view=alumno&mode=AllAlumno">Consultar Alumnos <i class="fa fa-sign-in" aria-hidden="true"></i></a>
	                        </p>
	                    </div>
	                </div>
	            </div>
	            <div class="col-md-12">
          			<div class="col-md-12">
                        <div class="col-md-12 tabs-area">
			                <ul id="tabs-demo6" class="nav nav-tabs nav-tabs-v6" role="tablist">
              					<li role="presentation" class="active" style="width: 100px;">
                					<a style="margin-left: -30px;" href="#tabs-demo7-area1" id="tabs-demo6-1" role="tab" data-toggle="tab" aria-expanded="true">Personal</a>
              					</li>
              					<li role="presentation" style="width: 100px;">
                					<a style="margin-left: -40px;" href="#tabs-demo7-area2" role="tab" id="tabs-demo6-2" data-toggle="tab" aria-expanded="false">Representantes</a>
              					</li>
              					<li role="presentation">
                					<a href="#tabs-demo7-area3" id="tabs-demo6-3" role="tab" data-toggle="tab" aria-expanded="false">Antecedentes Médicos</a>
              					</li>
              					<li role="presentation" >
                					<a href="#tabs-demo7-area4" role="tab" id="tabs-demo6-4" data-toggle="tab" aria-expanded="false">Actitudes e Intereses</a>
              					</li>
              					<li role="presentation">
                					<a href="#tabs-demo7-area5" role="tab" id="tabs-demo6-5" data-toggle="tab" aria-expanded="false">Medidas Antropometricas</a>
              					</li>
              					<li role="presentation" style="width: 100px;">
                					<a style="margin-left: -40px;" href="#tabs-demo7-area6" role="tab" id="tabs-demo6-6" data-toggle="tab" aria-expanded="false">Inscripciones</a>
              					</li>
            				</ul>
            				<div id="tabsDemo6Content" class="tab-content tab-content-v6 col-md-12">
              					<div role="tabpanel" class="tab-pane fade active in" id="tabs-demo7-area1" aria-labelledby="tabs-demo7-area1">
						            <div class="col-md-12 top-20 padding-0">
						                <div class="col-md-12">
						                    <div class="panel">
						                   		<div class="panel-body">
						                    		<div class="responsive-table" style="color: #000; font-size: 16px;">
						                    			<div class="col-md-4">
						                    				Cédula: <?php echo $_alumno[$_GET['id']]['cedula'];?>
						                    			</div>
						                    			<div class="col-md-4">
						                    				Cédula Escolar: <?php echo $_alumno[$_GET['id']]['ced_escolar'];?>
						                    			</div>
						                    			<div class="col-md-4">
						                    				Posición según parto(s): <?php echo $_alumno[$_GET['id']]['pos_parto'];?>
						                    			</div>
						                    			<br><br>
						                    			<div class="col-md-4">
						                    				Nombres: <?php echo $_alumno[$_GET['id']]['nombres'];?>
						                    			</div>
						                    			<div class="col-md-4">
						                    				Apellidos: <?php echo $_alumno[$_GET['id']]['apellidos'];?>
						                    			</div>
						                    			<div class="col-md-4">
						                    				Fecha de Nacimiento: <?php echo date("d-m-Y", strtotime($_alumno[$_GET['id']]['fec_nac']));?>
						                    			</div>
						                    			<br><br>
						                    			<div class="col-md-4">
						                    				Edad: <?php echo $_alumno[$_GET['id']]['edad'];?>
						                    			</div>
						                    			<div class="col-md-4">
						                    				Sexo: <?php echo $_alumno[$_GET['id']]['sexo'];?>
						                    			</div>
						                    			<div class="col-md-4">
						                    				País: <?php echo $_pais[$_alumno[$_GET['id']]['id_pais']]['pais'];?>
						                    			</div>
						                    			<br><br>
						                    			<div class="col-md-4">
						                    				Estado: <?php echo $_estado[$_alumno[$_GET['id']]['id_estado']]['estado'];?>
						                    			</div>
						                    			<div class="col-md-4">
						                    				Lugar de Nacimiento: <?php echo $_alumno[$_GET['id']]['lugar_nac'];?>
						                    			</div>
						                    			<div class="col-md-4">
						                    				Tlf. Celular: <?php echo $_celular[$_alumno[$_GET['id']]['id_tlf_cel']]['cod_tlf_cel']."-".$_alumno[$_GET['id']]['tlf_cel'];?>
						                    			</div>
						                    			<br><br>
						                    			<div class="col-md-6">
						                    				Correo: <?php echo $_alumno[$_GET['id']]['correo'];?>
						                    			</div>
						                    			<div class="col-md-6">
						                    				Dirección: <?php echo $_alumno[$_GET['id']]['direccion'];?>
						                    			</div>
						                    			<br><br>
						                    			<div class="col-md-6">
						                    				¿Tiene Hermanos en la institución?: <?php echo $_alumno[$_GET['id']]['hermano'];?>
						                    			</div>
						                    			<div class="col-md-6">
						                    				Representante legal del estudiante: <?php echo $_alumno[$_GET['id']]['repre'];?>
						                    			</div>
						                    			<br><br>
						                    			<?php
						                    				if($_alumno[$_GET['id']]['repre']=="Otro"){
						                    					?>
						                    						<div class="col-md-4">
									                    				Especifique: <?php echo $_alumno[$_GET['id']]['especifique'];?>
									                    			</div>
									                    			<div class="col-md-4">
									                    				¿Tiene permiso de la lopnap?: 
									                    				<?php 
									                    					if($_alumno[$_GET['id']]['fec_lopna']=="0000-00-00"){
									                    						echo "No";
									                    					}else{
									                    						echo "Si";
									                    					}
									                    				?>
									                    			</div>
									                    			<div class="col-md-4">
									                    				Fecha de Vencimiento: 
									                    				<?php 
									                    					if($_alumno[$_GET['id']]['fec_lopna']=="0000-00-00"){
									                    						echo "";
									                    					}else{
									                    						echo $_alumno[$_GET['id']]['fec_lopna'];
									                    					}
									                    				?>
									                    			</div>
									                    			<br><br>
						                    					<?php
						                    				}
						                    			?>
						                    			<div class="col-md-4">
						                    				Foto Carnet: <img style="width: 40%;" src="<?php echo RUTA_IMAGENES.$_alumno[$_GET['id']]['foto_carnet']?>">
						                    			</div>
						                    			<div class="col-md-8">
						                    				Foto Cédula: <img style="width: 40%;" src="<?php echo RUTA_IMAGENES.$_alumno[$_GET['id']]['foto_cedula']?>">
						                    			</div>
						                    		</div>
						                  		</div>
						                	</div>
						              	</div>  
						            </div>
              					</div>
              					<div role="tabpanel" class="tab-pane fade" id="tabs-demo7-area2" aria-labelledby="tabs-demo7-area2">
                					<div class="col-md-12 top-20 padding-0">
	                					<div class="col-md-12">
	                    					<div class="panel">
	                   							<div class="panel-body">
	                    							<div class="responsive-table" style="color: #000; font-size: 16px;">
	                    								<p class="col-md-12"><strong>Click sobre la cédula para ver la información completa.</strong></p>
						                    			<div class="responsive-table" style="color: #000; font-size: 16px; clear: both;">
						                    			<table id="datatables-example" class="table table-striped table-bordered" width="100%" cellspacing="0">
						                    				<thead>
						                    					<th style="text-align: center;">Cédula</th>
						                    					<th style="text-align: center;">Nombre y Apellido</th>
																<th style="text-align: center;">Tlf. Celular</th>
						                    				</thead>
															<tbody>
																<?php
																	if($_alumno[$_GET['id']]['id_madre']!=""){
																		?>
																			<tr>
																				<td><a href="?view=representante&mode=VerMadre&id=<?php echo $_alumno[$_GET['id']]['id_madre'];?>"><?php echo $_madre[$_alumno[$_GET['id']]['id_madre']]['cedula'];?></a></td>
																				<td><?php echo $_madre[$_alumno[$_GET['id']]['id_madre']]['nombres']." ".$_madre[$_alumno[$_GET['id']]['id_madre']]['apellidos'];?></td>
																				<td><?php echo $_celular[$_madre[$_alumno[$_GET['id']]['id_madre']]['id_tlf_cel']]['cod_tlf_cel']."-".$_madre[$_alumno[$_GET['id']]['id_madre']]['tlf_cel'];?></td>
																			</tr>
																		<?php
																	}
																?>
																<?php
																	if($_alumno[$_GET['id']]['id_padre']!=""){
																		?>
																			<tr>
																				<td><a href="?view=representante&mode=VerPadre&id=<?php echo $_alumno[$_GET['id']]['id_padre'];?>"><?php echo $_padre[$_alumno[$_GET['id']]['id_padre']]['cedula'];?></a></td>
																				<td><?php echo $_padre[$_alumno[$_GET['id']]['id_padre']]['nombres']." ".$_padre[$_alumno[$_GET['id']]['id_padre']]['apellidos'];?></td>
																				<td><?php echo $_celular[$_padre[$_alumno[$_GET['id']]['id_padre']]['id_tlf_cel']]['cod_tlf_cel']."-".$_padre[$_alumno[$_GET['id']]['id_padre']]['tlf_cel'];?></td>
																			</tr>
																		<?php
																	}
																?>
																<?php
																	if($_alumno[$_GET['id']]['id_repre']!=""){
																		?>
																			<tr>
																				<td><a href="?view=representante&mode=VerLegal&id=<?php echo $_alumno[$_GET['id']]['id_repre'];?>"><?php echo $_legal[$_alumno[$_GET['id']]['id_repre']]['cedula'];?></a></td>
																				<td><?php echo $_legal[$_alumno[$_GET['id']]['id_repre']]['nombres']." ".$_legal[$_alumno[$_GET['id']]['id_repre']]['apellidos'];?></td>
																				<td></td>
																			</tr>
																		<?php
																	}
																?>
																<?php
																	if($_alumno[$_GET['id']]['id_repre_sup']!=""){
																		?>
																			<tr>
																				<td><a href="?view=representante&mode=VerSuplente&id=<?php echo $_alumno[$_GET['id']]['id_repre_sup'];?>"><?php echo $_suplente[$_alumno[$_GET['id']]['id_repre_sup']]['cedula'];?></a></td>
																				<td><?php echo $_suplente[$_alumno[$_GET['id']]['id_repre_sup']]['nombres']." ".$_suplente[$_alumno[$_GET['id']]['id_repre_sup']]['apellidos'];?></td>
																				<td><?php echo $_celular[$_suplente[$_alumno[$_GET['id']]['id_repre_sup']]['id_tlf_cel']]['cod_tlf_cel']."-".$_suplente[$_alumno[$_GET['id']]['id_repre_sup']]['tlf_cel'];?></td>
																			</tr>
																		<?php
																	}
																?>
															</tbody>
						                    			</table>
						                    		</div>
						                    		</div>
	                  							</div>
	                						</div>
	              						</div>  
	            					</div>
              					</div>
              					<div role="tabpanel" class="tab-pane fade" id="tabs-demo7-area3" aria-labelledby="tabs-demo7-area3">
                					<div class="col-md-12 top-20 padding-0">
	                					<div class="col-md-12">
	                    					<div class="panel">
	                   							<div class="panel-body">
	                   								<div class="responsive-table" style="color: #000; font-size: 16px;">
		                   								<div class="col-md-3" style="margin-top: 10px;">
									                        Tipo de Sangre: <?php echo $_sangre[$_medico[$_GET['id']]['id_tipo_sangre']]['sangre'];?>
									                    </div>
									                    <div class="col-md-3" style="margin-top: 10px;">
									                        Lateralidad: <?php echo $_medico[$_GET['id']]['lateralidad'];?>
									                    </div>
									                    <div class="col-md-3" style="margin-top: 10px;">
									                        Usa Lentes: <?php echo $_medico[$_GET['id']]['lentes'];?>
									                    </div>
									                    <div class="col-md-3" style="margin-top: 10px;">
									                        Oye bien: <?php echo $_medico[$_GET['id']]['oido'];?>
									                    </div>
									                    <br><br>
									                    <div class="col-md-12">
										                    <p style="border-top: 1px solid #999C9E !important;"></p>
										                </div>
									                    <div class="col-md-3">
									                      Ha sufrido:
									                    </div>
									                    <div class="col-md-3" style="margin-top: 10px;">
									                        Sarampión: <?php echo $_medico[$_GET['id']]['sarampion'];?>
									                    </div>
									                    <div class="col-md-3" style="margin-top: 10px;">
									                        Rubéola: <?php echo $_medico[$_GET['id']]['rubeola'];?>
									                    </div>
									                    <div class="col-md-3" style="margin-top: 10px;">
									                        Paperas: <?php echo $_medico[$_GET['id']]['paperas'];?>
									                    </div>
									                    <div class="col-md-12">
										                    <p style="border-top: 1px solid #999C9E !important;"></p>
										                </div>
									                    <div class="col-md-12" style="margin-top: 10px;">
									                      Tiene antecedentes de algunas de estas afecciones:
									                    </div>
									                    <div class="col-md-3" style="margin-top: 10px;">
									                        Diabetes: <?php echo $_medico[$_GET['id']]['diabetes'];?>
									                    </div>
									                    <div class="col-md-3" style="margin-top: 10px;">
									                        Hipertensión: <?php echo $_medico[$_GET['id']]['hipertension'];?>
									                    </div>
									                    <div class="col-md-3" style="margin-top: 10px;">
									                        Cardipatía: <?php echo $_medico[$_GET['id']]['cardiopatia'];?>
									                    </div>
									                    <div class="col-md-3" style="margin-top: 10px;">
									                        Asma: <?php echo $_medico[$_GET['id']]['asma'];?>
									                    </div>
									                    <div class="col-md-3" style="margin-top: 10px;">
									                        Alergías: <?php echo $_medico[$_GET['id']]['alergias'];?>
									                    </div>
									                    <div class="col-md-9" style="margin-top: 10px;">
									                        Otras: <?php echo $_medico[$_GET['id']]['descrip_otras'];?>
									                    </div>
									                    <div class="col-md-12">
										                    <p style="border-top: 1px solid #999C9E !important;"></p>
										                </div>
										                <div class="col-md-12">
									                      Presenta alguna diversidad funcional: <?php echo $_medico[$_GET['id']]['diversidad'];?>
									                    </div>
									                    <div class="col-md-12">
										                    <p style="border-top: 1px solid #999C9E !important;"></p>
										                </div>
										                <div class="col-md-12" style="margin-top: 10px;">
									                      Ha sido tratado por algunos de estos especialistas:
									                    </div>
									                    <div class="col-md-3" style="margin-top: 10px;">
									                        Psicólogo: <?php echo $_medico[$_GET['id']]['psicolo1'];?>
									                    </div>
									                    <div class="col-md-3" style="margin-top: 10px;">
									                        Terapista de Lenguaje: <?php echo $_medico[$_GET['id']]['tera_lengua1'];?>
									                    </div>
									                    <div class="col-md-3" style="margin-top: 10px;">
									                        Neurólogo: <?php echo $_medico[$_GET['id']]['neurolo1'];?>
									                    </div>
									                    <div class="col-md-3" style="margin-top: 10px;">
									                        Terapia Ocupacional: <?php echo $_medico[$_GET['id']]['tera_ocup1'];?>
									                    </div>
									                    <div class="col-md-3" style="margin-top: 10px;">
									                        Psiquiatría: <?php echo $_medico[$_GET['id']]['psiquiatria1'];?>
									                    </div>
									                    <div class="col-md-3" style="margin-top: 10px;">
									                        Odontología: <?php echo $_medico[$_GET['id']]['odontologia1'];?>
									                    </div>
									                    <div class="col-md-3" style="margin-top: 10px;">
									                        Dermatología: <?php echo $_medico[$_GET['id']]['dermatologia1'];?>
									                    </div>
									                    <div class="col-md-3" style="margin-top: 10px;">
									                        Fisiatría: <?php echo $_medico[$_GET['id']]['fisiatria1'];?>
									                    </div>
									                    <div class="col-md-3" style="margin-top: 10px;">
									                        Psicopedagodía: <?php echo $_medico[$_GET['id']]['psicopedagogia1'];?>
									                    </div>
									                    <div class="col-md-9" style="margin-top: 10px;">
									                        Otro(s): <?php echo $_medico[$_GET['id']]['otro_esp1'];?>
									                    </div>
									                    <div class="col-md-12">
										                    <p style="border-top: 1px solid #999C9E !important;"></p>
										                </div>
										                <div class="col-md-12" style="margin-top: 10px;">
									                      Está siendo tratado por algún especialistas:
									                    </div>
									                    <div class="col-md-3" style="margin-top: 10px;">
									                        Psicólogo: <?php echo $_medico[$_GET['id']]['psicolo2'];?>
									                    </div>
									                    <div class="col-md-3" style="margin-top: 10px;">
									                        Terapista de Lenguaje: <?php echo $_medico[$_GET['id']]['tera_lengua2'];?>
									                    </div>
									                    <div class="col-md-3" style="margin-top: 10px;">
									                        Neurólogo: <?php echo $_medico[$_GET['id']]['neurolo2'];?>
									                    </div>
									                    <div class="col-md-3" style="margin-top: 10px;">
									                        Terapia Ocupacional: <?php echo $_medico[$_GET['id']]['tera_ocup2'];?>
									                    </div>
									                    <div class="col-md-3" style="margin-top: 10px;">
									                        Psiquiatría: <?php echo $_medico[$_GET['id']]['psiquiatria2'];?>
									                    </div>
									                    <div class="col-md-3" style="margin-top: 10px;">
									                        Odontología: <?php echo $_medico[$_GET['id']]['odontologia2'];?>
									                    </div>
									                    <div class="col-md-3" style="margin-top: 10px;">
									                        Dermatología: <?php echo $_medico[$_GET['id']]['dermatologia2'];?>
									                    </div>
									                    <div class="col-md-3" style="margin-top: 10px;">
									                        Fisiatría: <?php echo $_medico[$_GET['id']]['fisiatria2'];?>
									                    </div>
									                    <div class="col-md-3" style="margin-top: 10px;">
									                        Psicopedagodía: <?php echo $_medico[$_GET['id']]['psicopedagogia2'];?>
									                    </div>
									                    <div class="col-md-9" style="margin-top: 10px;">
									                        Otro(s): <?php echo $_medico[$_GET['id']]['otro_esp2'];?>
									                    </div>
									                    <div class="col-md-12" style="margin-top: 10px;">
									                        Lugar de Tratamiento: <?php echo $_medico[$_GET['id']]['lugar_trata'];?>
									                    </div>
									                    <div class="col-md-12">
										                    <p style="border-top: 1px solid #999C9E !important;"></p>
										                </div>
										                <div class="col-md-12" style="margin-top: 10px;">
									                        Actualmente medicado: <?php echo $_medico[$_GET['id']]['act_medicado'];?>
									                    </div>
									                    <div class="col-md-12" style="margin-top: 10px;">
									                        Impedimiento para realizar Educación Física y Deportes: <?php echo $_medico[$_GET['id']]['imp_depor'];?>
									                    </div>
									                    <div class="col-md-12" style="margin-top: 10px;">
									                        Seguro médico: <?php echo $_medico[$_GET['id']]['seg_med'];?>
									                    </div>
									                </div>
	                  							</div>
	                						</div>
	              						</div>  
	            					</div>
              					</div>
              					<div role="tabpanel" class="tab-pane fade" id="tabs-demo7-area4" aria-labelledby="tabs-demo7-area4">
                					<div class="col-md-12 top-20 padding-0">
	                					<div class="col-md-12">
	                    					<div class="panel">
	                   							<div class="panel-body">
	                   								<div class="responsive-table" style="color: #000; font-size: 16px;">
		                   								<div class="col-md-12" style="margin-top: 10px;">
									                        Práctica alguna actividad extracurricular: <?php echo $_actitudes[$_GET['id']]['act_extra'];?>
									                    </div>
									                    <div class="col-md-12">
										                    <p style="border-top: 1px solid #999C9E !important;"></p>
										                </div>
									                    <div class="col-md-12" style="margin-top: 10px;">
									                        Actividades deportivas y/o recreativas en la institución:
									                    </div>
									                    <div class="col-md-3" style="margin-top: 10px;">
									                        Voleibol: <?php echo $_actitudes[$_GET['id']]['voleibol'];?>
									                    </div>
									                    <div class="col-md-3" style="margin-top: 10px;">
									                        Básquetbol: <?php echo $_actitudes[$_GET['id']]['basquet'];?>
									                    </div>
									                    <div class="col-md-3" style="margin-top: 10px;">
									                        Futbolito: <?php echo $_actitudes[$_GET['id']]['futbolito'];?>
									                    </div>
									                    <div class="col-md-3" style="margin-top: 10px;">
									                        Ajedrez: <?php echo $_actitudes[$_GET['id']]['ajedrez'];?>
									                    </div>
									                    <div class="col-md-3" style="margin-top: 10px;">
									                        Danza: <?php echo $_actitudes[$_GET['id']]['danza'];?>
									                    </div>
									                    <div class="col-md-3" style="margin-top: 10px;">
									                        Teatro: <?php echo $_actitudes[$_GET['id']]['teatro'];?>
									                    </div>
									                    <div class="col-md-3" style="margin-top: 10px;">
									                        Música: <?php echo $_actitudes[$_GET['id']]['musica'];?>
									                    </div>
									                    <div class="col-md-12">
										                    <p style="border-top: 1px solid #999C9E !important;"></p>
										                </div>
										                <div class="col-md-12">
									                      Voluntariados a los que pertenece:
									                    </div>
									                    <div class="col-md-3" style="margin-top: 10px;">
									                        Sociedad Bolivariana: <?php echo $_actitudes[$_GET['id']]['soc_boliv'];?>
									                    </div>
									                    <div class="col-md-3" style="margin-top: 10px;">
									                        Cruz Roja: <?php echo $_actitudes[$_GET['id']]['cruz_roja'];?>
									                    </div>
									                    <div class="col-md-3" style="margin-top: 10px;">
									                        Biblioteca: <?php echo $_actitudes[$_GET['id']]['biblioteca'];?>
									                    </div>
									                    <div class="col-md-3" style="margin-top: 10px;">
									                        Mantenimiento: <?php echo $_actitudes[$_GET['id']]['mantenimiento'];?>
									                    </div>
									                    <div class="col-md-3" style="margin-top: 10px;">
									                        Conservación: <?php echo $_actitudes[$_GET['id']]['conservacion'];?>
									                    </div>
									                    <div class="col-md-12">
										                    <p style="border-top: 1px solid #999C9E !important;"></p>
										                </div>
									                    <?php
									                    	if($_actitudes[$_GET['id']]['condiciones']!="" && $_actitudes[$_GET['id']]['num_serial']!=""){
									                    		?>
									                    			<div class="col-md-12" style="margin-top: 10px;">
												                      	Posee Canaima (computador): Sí
												                    </div>
												                    <div class="col-md-6" style="margin-top: 10px;">
												                        Condiciones: <?php echo $_actitudes[$_GET['id']]['condiciones'];?>
												                    </div>
												                    <div class="col-md-6" style="margin-top: 10px;">
												                        Serial: <?php echo $_actitudes[$_GET['id']]['num_serial'];?>
												                    </div>
									                    		<?php
									                    	}else if($_actitudes[$_GET['id']]['motivo']!="" && $_actitudes[$_GET['id']]['denuncia']!=""){
									                    		?>
									                    			<div class="col-md-12" style="margin-top: 10px;">
												                      	Posee Canaima (computador): No
												                    </div>
												                    <div class="col-md-6" style="margin-top: 10px;">
												                        Motivo: <?php echo $_actitudes[$_GET['id']]['motivo'];?>
												                    </div>
												                    <div class="col-md-6" style="margin-top: 10px;">
												                        Denuncia: <?php echo $_actitudes[$_GET['id']]['denuncia'];?>
												                    </div>
									                    		<?php
									                    	}else{
									                    		?>
									                    			<div class="col-md-12" style="margin-top: 10px;">
												                      	Posee Canaima (computador): Sin definir
												                    </div>
												                    <div class="col-md-3" style="margin-top: 10px;">
												                        Condiciones: <?php echo $_actitudes[$_GET['id']]['motivo'];?>
												                    </div>
												                    <div class="col-md-3" style="margin-top: 10px;">
												                        Serial: <?php echo $_actitudes[$_GET['id']]['denuncia'];?>
												                    </div>
												                    <div class="col-md-3" style="margin-top: 10px;">
												                        Motivo: <?php echo $_actitudes[$_GET['id']]['motivo'];?>
												                    </div>
												                    <div class="col-md-3" style="margin-top: 10px;">
												                        Denuncia: <?php echo $_actitudes[$_GET['id']]['denuncia'];?>
												                    </div>
									                    		<?php
									                    	}
									                    ?>
									                </div>
	                  							</div>
	                						</div>
	              						</div>  
	            					</div>
              					</div>
              					<div role="tabpanel" class="tab-pane fade" id="tabs-demo7-area5" aria-labelledby="tabs-demo7-area5">
                					<div class="col-md-12 top-20 padding-0">
	                					<div class="col-md-12">
	                    					<div class="panel">
	                   							<div class="panel-body">
	                   								<div class="responsive-table" style="color: #000; font-size: 16px;">
		                   								 <div class="col-md-3" style="margin-top: 10px;">
									                        Peso: <?php echo $_antropometricas[$_GET['id']]['peso'];?> kg.
									                    </div>
									                    <div class="col-md-3" style="margin-top: 10px;">
									                        Talla Parado: <?php echo $_antropometricas[$_GET['id']]['parado'];?> cm
									                    </div>
									                    <div class="col-md-3" style="margin-top: 10px;">
									                        Talla Sentado: <?php echo $_antropometricas[$_GET['id']]['sentado'];?> cm
									                    </div>
									                    <div class="col-md-3" style="margin-top: 10px;">
									                        Brazada: <?php echo $_antropometricas[$_GET['id']]['brazada'];?> cm
									                    </div>
									                    <div class="col-md-12">
										                    <p style="border-top: 1px solid #999C9E !important;"></p>
										                </div>
										                <div class="col-md-12">
									                      	Pruebas de Fuerzas:
									                    </div>
									                    <div class="col-md-3" style="margin-top: 10px;">
									                        Salto sin impulso: <?php echo $_antropometricas[$_GET['id']]['salto'];?> cm
									                    </div>
									                    <div class="col-md-3" style="margin-top: 10px;">
									                        Abdominales en 30 seg: <?php echo $_antropometricas[$_GET['id']]['abdominales'];?> u
									                    </div>
									                    <div class="col-md-3" style="margin-top: 10px;">
									                        Flexiones de brazo: <?php echo $_antropometricas[$_GET['id']]['flexiones'];?> u
									                    </div>
									                    <div class="col-md-3" style="margin-top: 10px;">
									                        Sumatoria de las fuerzas: <?php echo $_antropometricas[$_GET['id']]['suma_fuerzas'];?>
									                    </div>
									                    <div class="col-md-12">
										                    <p style="border-top: 1px solid #999C9E !important;"></p>
										                </div>
										                <div class="col-md-12">
									                      	Pruebas de Velocidad, Flexibilidad y Resistencia
									                    </div>
									                    <div class="col-md-4" style="margin-top: 10px;">
									                        Velocidad en 
									                         <?php
									                          	if($_alumno[$_GET['id']]['edad']>=9 && $_alumno[$_GET['id']]['edad']<=10){
									                            	?>
									                              		30 mts.:
									                            	<?php
									                          	}else if($_alumno[$_GET['id']]['edad']>=11 && $_alumno[$_GET['id']]['edad']<=12){
									                            	?>
									                              		40 mts.:
									                            	<?php
									                          	}else if($_alumno[$_GET['id']]['edad']>=13 && $_alumno[$_GET['id']]['edad']<=14){
									                            	?>
									                              		50 mts.:
									                            	<?php
									                          	}else if($_alumno[$_GET['id']]['edad']>=15){
									                            	?>
									                              		60 mts.:
									                            	<?php
									                          	}
									                        ?>
									                        <?php echo $_antropometricas[$_GET['id']]['velocidad'];?> seg.
									                    </div>
									                    <div class="col-md-4" style="margin-top: 10px;">
									                        Flexión ventral: <?php echo $_antropometricas[$_GET['id']]['flexibilidad'];?> cm
									                    </div>
									                    <div class="col-md-4" style="margin-top: 10px;">
									                        Resistencia en 
									                         <?php
									                          	if($_alumno[$_GET['id']]['edad']>=9 && $_alumno[$_GET['id']]['edad']<=10){
									                            	?>
									                              		600 mts.:
									                            	<?php
									                          	}else if($_alumno[$_GET['id']]['edad']>=11 && $_alumno[$_GET['id']]['edad']<=12){
									                            	if($_alumno[$_GET['id']]['sexo']=="Femenino"){
									                              		?>
									                                		800 mts.:
									                              		<?php
									                            	}else if($_alumno[$_GET['id']]['sexo']=="Masculino" && $_alumno[$_GET['id']]['edad']==11){
									                              		?>
									                                		800 mts.:
									                              		<?php
									                            	}else if($_alumno[$_GET['id']]['sexo']=="Masculino" && $_alumno[$_GET['id']]['edad']==12){
									                              		?>
									                                		1000 mts.:
									                              		<?php
									                            	}
									                          	}else if($_alumno[$_GET['id']]['edad']>=13 && $_alumno[$_GET['id']]['edad']<=14){
									                            	?>
									                              		1000 mts.:
									                            	<?php
									                          	}else if($_alumno[$_GET['id']]['edad']>=15){
									                            	if($_alumno[$_GET['id']]['sexo']=="Masculino"){
									                              		?>
									                                		1500 mts.:
									                              		<?php
									                            	}else if($_alumno[$_GET['id']]['sexo']=="Femenino"){
									                              		?>
									                                		1000 mts.:
									                              		<?php
									                            	}
									                          	}
									                        ?>
									                        <?php echo $_antropometricas[$_GET['id']]['resistencia'];?> min.
									                    </div>
									                </div>
	                  							</div>
	                						</div>
	              						</div>  
	            					</div>
              					</div>
              					<div role="tabpanel" class="tab-pane fade" id="tabs-demo7-area6" aria-labelledby="tabs-demo7-area6">
                					<div class="col-md-12 top-20 padding-0">
	                					<div class="col-md-12">
	                    					<div class="panel">
	                   							<div class="panel-body">
	                   								<div class="responsive-table" style="color: #000; font-size: 16px;">
		                   								<table id="datatables-example" class="table table-striped table-bordered" width="100%" cellspacing="0">
						                    				<thead>
						                      					<tr>
						                      						<th style="width: 20px; text-align: center;">N°</th>
																	<th style="text-align: center;">Fecha</th>
																	<th style="text-align: center;">Año Escolar</th>
																	<th style="text-align: center;">Grado</th>
																	<th style="text-align: center;">Sección</th>
																	<th style="text-align: center;">Condicion</th>
																	<th style="text-align: center;">Repitiente</th>
																	<th style="text-align: center;">Inscrito por</th>
																	<th style="text-align: center;">Imprimir</th>
																</tr>
						                    				</thead>
						                    				<tbody>
						                    				<?php
						                    					$db=new Conexion();
						                    					$id=$_GET['id'];
						                    					$sql=$db->query("SELECT i.fecha, e.escolar, g.grado, s.seccion, i.condicion, i.repitiente, u.nombre, u.apellido, i.id_inscripcion FROM inscripcion i INNER JOIN escolar e ON i.id_escolar=e.id_escolar INNER JOIN grado g ON i.id_grado=g.id_grado INNER JOIN seccion s ON i.id_seccion=s.id_seccion INNER JOIN usuario u ON i.id_usuario=u.id_usuario WHERE i.id_alum=$id");
						                    					if($db->rows($sql)>0){
						                    						$contador=1;
						                    						while($data=$db->recorrer($sql)){
						                    							?>
						                    								<tr>
									                      						<td style="width: 20px; text-align: center;"><?php echo $contador;?></td>
									                      						<td style="text-align: center;"><?php echo date("d-m-Y", strtotime($data[0]));?></td>
									                      						<td style="text-align: center;"><?php echo $data[1];?></td>
									                      						<td style="text-align: center;"><?php echo $data[2];?></td>
									                      						<td style="text-align: center;"><?php echo $data[3];?></td>
									                      						<td style="text-align: center;"><?php echo $data[4];?></td>
									                      						<td style="text-align: center;">
									                      							<?php 
									                      								if($data[4]=="Regular, pendiente" || $data[4]=="Repitiente"){
									                      									echo $data[5];
									                      								}else{
									                      									echo "";
									                      								}
									                      							?>								                      							
									                      						</td>
									                      						<td style="text-align: center;"><?php echo $data[6]." ".$data[7];?></td>
									                      						<td style="text-align: center;"><a href="?view=inscripcion&mode=planillaInscripcion&id=<?php echo $data[8];?>" target="_blank"><i class="fa fa-print" aria-hidden="true"></i></a></td>
																			</tr>
						                    							<?php
						                    							$contador++;
						                    						}
						                    					}else{
						                    						?>
						                    							<tr>
								                      						<td colspan="8" style="text-align: center;">No hay información.</td>
																		</tr>
						                    						<?php
						                    					}
						                    				?>
						                    				</tbody>
						                      			</table>
		                   							</div>
	                  							</div>
	                						</div>
	              						</div>  
	            					</div>
              					</div>
            				</div>
          				</div>
          			</div>
      			</div>
			</div>
			<?php
				//include(HTML_DIR."overall/footer.php");
			?>
			<script>
				$(document).ready(function(){
					$('#datatables-example').DataTable();
					$("#consulta").addClass("active");
				});
			</script>
		</body>
</html>