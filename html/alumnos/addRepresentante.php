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
							{title:'Datos Guardados!',
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
							{title:'Debe seleccionar al menos un representante!',
							type:'warning',
							confirmButtonText:'Aceptar'}
						);
					</script>
				<?php
			}
		}
	?>
	<body onload="deshabilitaRetroceso()">
		<?php
      		include(HTML_DIR."overall/menu.php");
      		include(HTML_DIR."overall/scripts.php");
    	?>
		<div id="content">
            <div class="panel box-shadow-none content-header">
                <div class="panel-body">
                    <div class="col-md-9">
                        <p class="animated fadeInDown">
                          	Registrar <span class="fa-angle-right fa"></span> Nuevo Alumno
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-10 col-md-offset-1">
                <div class="col-md-12 panel">
                    <div class="col-md-12 panel-heading">
                      	<h4>Asignar Representantes al alumno <?php echo $_alumno[$_GET['id']]['nombres']." ".$_alumno[$_GET['id']]['apellidos'];?></h4>
                    </div>
                    <div class="col-md-12 panel-body" style="padding-bottom:30px;">
                    	<p>Debe asignar al menos un representante.</p>
                    	<br>
                      	<div class="col-md-12">
                        	<form class="cmxform" method="post" action="?view=alumno&mode=AddRepresentante&id=<?php echo $_GET['id'];?>">
                          		<div class="col-md-12">
                          			<div class="form-group form-animate-text col-md-12">
	                              		<div class="col-md-3">
	                              			<label for="madre">Madre:</label>
	                              		</div>
	                              		<div class="col-md-9" style="top: 8px;">                        	
	                              			<select class="form-control" name="madre" id="madre">
	                              				<option value="">Seleccione</option>
		                                		<?php
		                                			foreach($_madre as $madre){
	                                					?>
		                                					<option value="<?php echo $madre['id_madre'];?>"><?php echo $madre['cedula']." - ".$madre['nombres']." ".$madre['apellidos'];?></option>
		                                				<?php
		                                			}
		                                		?>
		                                	</select>
		                                </div>
	                        		</div>
	                        		<div class="form-group form-animate-text col-md-12">
	                              		<div class="col-md-3">
	                              			<label for="padre">Padre:</label>
	                              		</div>
	                              		<div class="col-md-9" style="top: 8px;">                        	
	                              			<select class="form-control" name="padre" id="padre">
	                              				<option value="">Seleccione</option>
		                                		<?php
		                                			foreach($_padre as $padre){
	                                					?>
		                                					<option value="<?php echo $padre['id_padre'];?>"><?php echo $padre['cedula']." - ".$padre['nombres']." ".$padre['apellidos'];?></option>
		                                				<?php
		                                			}
		                                		?>
		                                	</select>
		                                </div>
	                        		</div>
	                        		<div class="form-group form-animate-text col-md-12">
	                              		<div class="col-md-3">
	                              			<label for="legal">Representante Legal:</label>
	                              		</div>
	                              		<div class="col-md-9" style="top: 8px;">                        	
	                              			<select class="form-control" name="legal" id="legal">
	                              				<option value="">Seleccione</option>
		                                		<?php
		                                			foreach($_legal as $legal){
	                                					?>
		                                					<option value="<?php echo $legal['id_repre'];?>"><?php echo $legal['cedula']." - ".$legal['nombres']." ".$legal['apellidos'];?></option>
		                                				<?php
		                                			}
		                                		?>
		                                	</select>
		                                </div>
	                        		</div>
	                        		<div class="form-group form-animate-text col-md-12">
	                              		<div class="col-md-3">
	                              			<label for="suplente">Representante Suplente:</label>
	                              		</div>
	                              		<div class="col-md-9" style="top: 8px;">                        	
	                              			<select class="form-control" name="suplente" id="suplente">
	                              				<option value="">Seleccione</option>
		                                		<?php
		                                			foreach($_suplente as $suplente){
	                                					?>
		                                					<option value="<?php echo $suplente['id_repre_sup'];?>"><?php echo $suplente['cedula']." - ".$suplente['nombres']." ".$suplente['apellidos'];?></option>
		                                				<?php
		                                			}
		                                		?>
		                                	</select>
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
				$("#registro").addClass("active");
				$(window).on('beforeunload', function(){
			        return "You have unsaved changes!";
			    });
			    $(document).on("submit", "form", function(event){
			        $(window).off('beforeunload');
			    });
			});
		</script>
	</body>
</html>
</html>