<!DOCTYPE html>
<html>
	<!DOCTYPE html>
<html>
	<?php
		include(HTML_DIR."overall/header.php");
		if(isset($_GET['success'])){
			if($_GET['success']==1){
				?>
					<script>
						swal(
							{title:'Inscripción realizada con éxito!',
							type:'success',
							confirmButtonText:'Aceptar'}
						);
					</script>
				<?php
			}
		}
		if(isset($_GET['error'])){
			if($_GET['error']==1){
				?>
					<script>
						swal(
							{title:'Debe llenar los campos indicados!',
							type:'warning',
							confirmButtonText:'Aceptar'}
						);
					</script>
				<?php
			}else if($_GET['error']==2){
				?>
					<script>
						swal(
							{title:'La sección seleccionada no esta aperturada!',
							type:'warning',
							confirmButtonText:'Aceptar'}
						);
					</script>
				<?php
			}else if($_GET['error']==3){
				?>
					<script>
						swal(
							{title:'Este año escolar se encuentra cerrado!',
							type:'warning',
							confirmButtonText:'Aceptar'}
						);
					</script>
				<?php
			}else if($_GET['error']==4){
				?>
					<script>
						swal(
							{title:'La sección seleccionada no tiene cupos asignados!',
							type:'warning',
							confirmButtonText:'Aceptar'}
						);
					</script>
				<?php
			}else if($_GET['error']==5){
				?>
					<script>
						swal(
							{title:'No quedan cupos disponibles en esta sección!',
							type:'warning',
							confirmButtonText:'Aceptar'}
						);
					</script>
				<?php
			}else if($_GET['error']==6){
				?>
					<script>
						swal(
							{title:'Este alumno ya se encuentra inscrito en este año escolar!',
							type:'warning',
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
		<script src="asset/js/inscripcion.js"></script>
		<div id="content">
            <div class="panel box-shadow-none content-header">
                <div class="panel-body">
                    <div class="col-md-9">
                        <p class="animated fadeInDown">
                          	Inscripciones <span class="fa-angle-right fa"></span> Nueva Inscripción
                        </p>
                    </div>
                    <div class="col-md-3">
	                    <p class="animated fadeInDown">
	                      <a class="btn btn-teal" href="?view=inscripcion&mode=AllInscrito">Consultar Inscritos <i class="fa fa-sign-in" aria-hidden="true"></i></a>
	                    </p>
	                </div>
                </div>
            </div>
            <div class="col-md-10 col-md-offset-1">
                <div class="col-md-12 panel">
                    <div class="col-md-12 panel-heading">
                      	<h4>Inscripción</h4>
                    </div>
                    <div class="col-md-12 panel-body" style="padding-bottom:30px;">
                    	<p>Los campos con (*) son oblogatorios.</p>
                    	<br>
                      	<div class="col-md-12">
                        	<form class="cmxform" method="post" action="?view=inscripcion&mode=AddInscripcion" id="form_inscripcion">
                          		<div class="col-md-12">
                          			<div class="form-group form-animate-text col-md-4">
	                              		<div class="col-md-12">
	                              			<label>Año Escolar: <?php echo date("Y")."-".$year=date("Y")+1;?></label>
	                              			<?php
	                              				$año=date("Y")."-".$year=date("Y")+1;
	                              				foreach($_escolar as $_escolar){
	                              					if($_escolar['escolar']==$año){
	                              						?>
	                              							<input type="hidden" name="escolar" id="escolar" value="<?php echo $escolar=$_escolar['id_escolar'];?>">
	                              						<?php
	                              					}
	                              				}
	                              			?>
	                              		</div>
	                        		</div>
	                        		<div class="form-group form-animate-text col-md-4">
	                              		<div class="col-md-3">
	                              			<label for="grado">*Grado:</label>
	                              		</div>
	                              		<div class="col-md-9" style="top: 8px;">                        	
	                              			<select class="form-control" name="grado" id="grado">
	                              				<option value="">Seleccione</option>
	                              				<?php
		                                			foreach($_grado as $_grado){
	                                					?>
		                                					<option value="<?php echo $_grado['id_grado'];?>"><?php echo $_grado['grado'];?></option>
		                                				<?php
		                                			}
		                                		?>
		                                	</select>
		                                </div>
	                        		</div>
	                        		<div class="form-group form-animate-text col-md-4">
	                              		<div class="col-md-3">
	                              			<label for="seccion">*Sección:</label>
	                              		</div>
	                              		<div class="col-md-9" style="top: 8px;">                        	
	                              			<select class="form-control" name="seccion" id="seccion">
	                              				<option value="">Seleccione</option>
	                              				<?php
		                                			foreach($_seccion as $_seccion){
	                                					?>
		                                					<option value="<?php echo $_seccion['id_seccion'];?>"><?php echo $_seccion['seccion'];?></option>
		                                				<?php
		                                			}
		                                		?>
	                              			</select>
		                                </div>
		                            </div>
		                            <div id="resultados"></div>
		                            <div class="form-group form-animate-text col-md-12">
	                              		<div class="col-md-3">
	                              			<label for="alumno">*Alumno:</label>
	                              		</div>
	                              		<div class="col-md-9" style="top: 8px;">                        	
	                              			<select class="form-control" name="alumno" id="alumno">
	                              				<option value="">Seleccione</option>
	                              				<?php
		                                			foreach($_alumno as $_alumno){
		                                				if($_alumno['estudiante']==0 || $_alumno['estudiante']==4){
		                                					?>
			                                					<option value="<?php echo $_alumno['id_alum'];?>"><?php echo $_alumno['cedula']." ".$_alumno['nombres']." ".$_alumno['apellidos'];?></option>
			                                				<?php
			                                			}
		                                			}
		                                		?>
		                                	</select>
		                                </div>
	                        		</div>
	                        		<div class="form-group form-animate-text col-md-6">
	                              		<div class="col-md-12">
	                              			<label>Fecha de Inscripción: <?php echo date("d-m-Y");?></label>
	                              		</div>
	                              		<input type="hidden" name="fecha" value="<?php echo date("Y-m-d");?>">
	                        		</div>
	                        		<div class="form-group form-animate-text col-md-6">
	                              		<div class="col-md-12">
	                              			<label>Hecha por: <?php echo $_users[$_SESSION['app_id']]['nombre']." ".$_users[$_SESSION['app_id']]['apellido'];?></label>
	                              		</div>
	                              		<input type="hidden" name="profesor" value="<?php echo $_users[$_SESSION['app_id']]['id_usuario'];?>">
	                        		</div>
	                        		<div class="form-group form-animate-text col-md-12">
	                              		<div class="col-md-4">
	                              			<label for="condicion">*Condición de la inscripción:</label>
	                              		</div>
	                              		<div class="col-md-3" style="top: 8px;">                        	
	                              			<select class="form-control" name="condicion" id="condicion">
	                              				<option value="">Seleccione</option>
	                              				<option value="Regular">Regular</option>
												<option value="Regular, pendiente">Regular, con materia pendiente</option>
												<option value="Repitiente">Repitiente</option>
		                                	</select>
		                                </div>
		                                <div class="col-md-1">
	                              			<label for="repitiente">con:</label>
	                              		</div>
	                              		<div class="col-md-4">
	                              			<input type="text" class="form-text" name="repitiente" id="repitiente" disabled>
	                              		</div>
	                        		</div>
                            		<div class="col-md-12">
	                              		<div class="form-group form-animate-checkbox"></div>
	                              		<input class="submit btn btn-teal" type="submit" value="Guardar">
	                        		</div>
	                            </div>
                      		</form>
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
				$("#inscripcion").addClass("active");
			});
		</script>
	</body>
</html>
</html>