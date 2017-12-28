<!DOCTYPE html>
<html>
	<?php
		include(HTML_DIR."overall/header.php");
		if(isset($_GET['success'])){
			if($_GET['success']==1){
				?>
					<script>
						swal(
							{title:'Alumno retirado del plantel!',
							type:'success',
							confirmButtonText:'Aceptar'}
						);
					</script>
				<?php
			}else if($_GET['success']==2){
				?>
					<script>
						swal(
							{title:'Alumno reingresado al plantel!',
							type:'success',
							confirmButtonText:'Aceptar'}
						);
					</script>
				<?php
			}
		}
	?>
	<body>
		<?php
      		include(HTML_DIR."overall/menu.php");
      		include(HTML_DIR."overall/scripts.php");
    	?>
		<script src="asset/js/alumno.js"></script>
		<div id="content">
			<div class="panel box-shadow-none content-header">
                <div class="panel-body">
                    <div class="col-md-9">
                        <p class="animated fadeInDown">
                          	Alumnos <span class="fa-angle-right fa"></span> Consulta
                        </p>
                    </div>
        			<div class="col-md-3">
                        <p class="animated fadeInDown">
                          <a class="btn btn-teal" href="?view=alumno&mode=AddAlumno">Registrar Alumno <i class="fa fa-sign-in" aria-hidden="true"></i></a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-12 top-20 padding-0">
                <div class="col-md-12">
                    <div class="panel">
                    	<div class="panel-heading"><h3>Alumnos</h3></div>
                   		<div class="panel-body">
                   			<p class="col-md-12"><strong>Click sobre la cédula para ver la información completa.</strong></p>
							<p class="col-md-4">Sin Color: Estudiante Cursando.</p>
							<p class="col-md-4" style="background-color: #FFFECD;">Amarillo: Nuevo Ingreso.</p>
							<p class="col-md-4" style="background-color: #CCFFD4;">Verde: Estudiante Graduado.</p>
							<p class="col-md-4" style="background-color: #FFCCCC;">Rojo: Estudiante Retirado.</p>
							<p class="col-md-4" style="background-color: #CDD5FF;">Azul: Reingreso.</p>
                    		<div class="responsive-table" style="clear: both;">
                    			<table id="datatables-example" class="table table-striped table-bordered" width="100%" cellspacing="0">
                    				<thead>
                      					<tr>
                      						<th style="width: 20px; text-align: center;">N°</th>
                      						<?php
												if($_users[$_SESSION['app_id']]['id_tipo_usu']==1){
													?>
														<th style="width: 10%; text-align: center;">Acción</th>
													<?php
												}
											?> 
											<th style="text-align: center;">Foto</th>
											<th style="text-align: center;">Cédula</th>
											<th style="text-align: center;">Nombres y Apellidos</th>
											<th style="text-align: center;">Fecha de Nacimiento</th>
											<th style="text-align: center;">Sexo</th>
											<th style="text-align: center;">Teléfono Celular</th>		
										</tr>
                    				</thead>
                    				<tbody>
                      					<?php
											if($_alumno>0){
												$contador=1;
												foreach ($_alumno as $alumno) {
													if($alumno['estudiante']==0){
			                    						$color="#FFFECD";
			                    					}else if($alumno['estudiante']==1){
			                    						$color="#FFF";
			                    					}else if($alumno['estudiante']==2){
			                    						$color="#CCFFD4";
			                    					}else if($alumno['estudiante']==3){
			                    						$color="#FFCCCC";
			                    					}else if($alumno['estudiante']==4){
			                    						$color="#CDD5FF";
			                    					}
													?>
														<tr style="background-color: <?php echo $color;?>;">
															<td style="width: 20px; text-align: center;"><?php echo $contador;?></td>
															<?php
																if($_users[$_SESSION['app_id']]['id_tipo_usu']==1 || $_users[$_SESSION['app_id']]['id_tipo_usu']==2){
																	?>
																		<td style="width: 10%; text-align: center;">
																			<div class="dropdown">
										  										<button class="btn btn-teal dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
										    										Acciones
										    										<span class="caret"></span>
										  										</button>
										  										<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
											  										<li><a href="?view=alumno&mode=EditEstudiante&id=<?php echo $alumno['id_alum'];?>">Editar <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></li>
											  										<?php
											  											if($alumno['estudiante']==1){
											  												?>
											  													<li><a onclick="RetiroItem('¿Está seguro de retirar a este alumno?','?view=alumno&mode=Retiro&id=<?php echo $alumno['id_alum']?>')">Retiro <i class="fa fa-thumbs-o-down" aria-hidden="true"></i></a></li>
											  												<?php
											  											}elseif($alumno['estudiante']==3){
											  												?>
											  													<li><a onclick="ReingresoItem('¿Está seguro de reingresar a este alumno?','?view=alumno&mode=Reingreso&id=<?php echo $alumno['id_alum']?>')">Reingreso <i class="fa fa-thumbs-o-up" aria-hidden="true"></i></a></li>
											  												<?php
											  											}
											  										?>
										  										</ul>
																			</div>
																		</td>
																	<?php
																}
															?> 
															<td align="center"><img src="asset/images/<?php echo $alumno['foto_carnet'];?>" class="img-circle avatar" alt="user name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"/></td>
															<td style="text-align: center;"><a href="?view=alumno&mode=VerAlumno&id=<?php echo $alumno['id_alum'];?>"><?php echo $alumno['cedula'];?></a></td>
															<td style="text-align: center;"><?php echo $alumno['nombres']." ".$alumno['apellidos'];?></td>
															<td style="text-align: center;"><?php echo date("d-m-Y", strtotime($alumno['fec_nac']));?></td>
															<td style="text-align: center;">
																<?php 
																	if($alumno['sexo']=='Masculino'){
																		?>
																			<i class="fa fa-male fa-2x" aria-hidden="true">
																		<?php
																	}else if($alumno['sexo']=='Femenino'){
																		?>
																			<i class="fa fa-female fa-2x" aria-hidden="true">
																		<?php
																	}
																?>
															</td>
															<td style="text-align: center;"><?php echo $_celular[$alumno['id_tlf_cel']]['cod_tlf_cel']."-".$alumno['tlf_cel'];?></td>
														</tr>
													<?php
													$contador++;
												}
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
		<?php
			//include(HTML_DIR."overall/footer.php");
		?>
		<script>
			$(document).ready(function(){
				$("#consulta").addClass("active");
			});
		</script>
	</body>
</html>