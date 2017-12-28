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
								{title:'El archivo seleccionado no contiene ningun dato!',
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
			                          	Configuración <span class="fa-angle-right fa"></span> Subir Notas
			                        </p>
			                    </div>
			                </div>
			            </div>
						<div class="col-md-10">
			                <div class="col-md-10 col-md-offset-2 panel">
			                    <div class="col-md-12 panel-heading">
			                      	<h4>Subir Notas</h4>
			                    </div>
			                    <div class="col-md-12 panel-body" style="padding-bottom:30px;">
			                    	<p>Los campos con (*) son obligatorios.</p>
			                    	<br>
			                      	<div class="col-md-12">
			                        	<form class="cmxform" id="notas" name="notas" method="post" enctype="multipart/form-data">
			                          		<div class="col-md-12">
			                            		<div class="form-group form-animate-text col-md-2 col-sm-2 col-xs-2" style="margin-top:0px !important;">
			                              			<label>*Archivo:</label>
			                            		</div>
				          						<div class="form-group form-animate-text col-md-10 col-sm-10 col-xs-10" style="margin-top:0px !important;">
			                              			<input type="file" class="form-text" id="csv" name="csv">
			                            		</div>
			                          		</div>
			                          		<div class="col-md-12 col-sm-12 col-xs-12">
			                              		<div class="form-group form-animate-checkbox"></div>
			                              		<input class="submit btn btn-teal" type="submit" value="Guardar">
			                        		</div>
			                      		</form>
					                </div>
			                    </div>
			                    <div id="respuesta" class="col-md-12"></div>
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