<!DOCTYPE html>
<html>
	<?php
		if($_users[$_SESSION['app_id']]['id_tipo_usu']==1){
			include(HTML_DIR."overall/header.php");
			if(isset($_GET['success'])){
				if($_GET['success']==1){
					?>
						<script>
							swal(
								{title:'Datos guardado!',
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
								type:'error',
								confirmButtonText:'Aceptar'}
							);
						</script>
					<?php
				}else if($_GET['error']==2){
					?>
						<script>
							swal(
								{title:'Solo se archivos pdf!',
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
					<script src="asset/js/configuracion.js"></script>
					<div id="content">
						<div class="panel box-shadow-none content-header">
			                <div class="panel-body">
			                    <div class="col-md-9">
			                        <p class="animated fadeInDown">
			                          	Configuración <span class="fa-angle-right fa"></span> Subir Manual del Sistema
			                        </p>
			                    </div>
			                </div>
			            </div>
						<div class="col-md-10">
			                <div class="col-md-10 col-md-offset-2 panel">
			                    <div class="col-md-12 panel-heading">
			                      	<h4>Subir Manual del Sistema</h4>
			                    </div>
			                    <div class="col-md-12 panel-body" style="padding-bottom:30px;">
			                    	<p>Los campos con (*) son obligatorios.</p>
			                    	<br>
			                      	<div class="col-md-12">
			                        	<form class="cmxform" id="manual" name="manual" method="post" action="?view=config&mode=Manual" enctype="multipart/form-data">
			                          		<div class="col-md-12">
			                          			<?php
			                          				if(isset($_menu[3])){
			                          					$documento=$_menu[3]['logo'];
			                          				}else{
			                          					$documento="No hay manual del sistema";
			                          				}
			                          			?>
			                            		<div class="form-group form-animate-text col-md-12 col-sm-12" style="margin-top:0px !important;">
			                              			<input type="text" class="form-text" value="<?php echo $documento?>" onkeypress="return deshabilitarteclas(event)">
			                              			<span class="bar"></span>
			                              			<label>Ruta del Documento</label>
			                            		</div>
			                            		<div class="form-group form-animate-text col-md-2 col-sm-2 col-xs-2" style="margin-top:0px !important;">
			                              			<label>*Documento:</label>
			                            		</div>
				          						<div class="form-group form-animate-text col-md-10 col-sm-10 col-xs-10" style="margin-top:0px !important;">
			                              			<input type="file" class="form-text" id="documento" name="documento" required>
			                            		</div>
			                          		</div>
					                        <div class="col-md-12">
					                        	<div id="barra" class="progress progress-small ">
                        							<div id="progreso" class="progress-bar progress-bar-danger progress-bar-striped active" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                          								<span class="sr-only">0% Complete</span>
                        							</div>
                      							</div>
                    						</div>
			                          		<div class="col-md-12 col-sm-12 col-xs-12">
			                              		<div class="form-group form-animate-checkbox"></div>
			                              		<input class="submit btn btn-teal" type="submit" value="Guardar">
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
				</body>
			<?php
		}else{
			header('location: ?view=index');
		}
	?>
</html>