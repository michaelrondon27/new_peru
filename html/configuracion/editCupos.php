<!DOCTYPE html>
<html>
	<?php
		if($_users[$_SESSION['app_id']]['id_tipo_usu']==1 || $_users[$_SESSION['app_id']]['id_tipo_usu']==2){
			include(HTML_DIR."overall/header.php");
			if(isset($_GET['success'])){
				if($_GET['success']==1){
					?>
						<script>
							swal(
								{title:'Cupo editado!',
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
			                          	Configuración <span class="fa-angle-right fa"></span> Editar Cupo del Año Escolar <?php echo $_escolar[$_cupos[$_GET['id']]['id_escolar']]['escolar'];?> Grado <?php echo $_grado[$_cupos[$_GET['id']]['id_grado']]['grado'];?> Sección <?php echo $_seccion[$_cupos[$_GET['id']]['id_seccion']]['seccion'];?>
			                        </p>
			                    </div>
			                    <div class="col-md-3">
			                        <p class="animated fadeInDown">
			                          <a class="btn btn-teal" href="?view=config&mode=GradoSecciones">Consultar Cupos <i class="fa fa-sign-in" aria-hidden="true"></i></a>
			                        </p>
			                    </div>
			                </div>
			            </div>
			            <div class="col-md-6 col-md-offset-2">
			                <div class="col-md-12 panel">
			                    <div class="col-md-12 panel-heading">
			                      	<h4>Editar Cupo del Año Escolar <?php echo $_escolar[$_cupos[$_GET['id']]['id_escolar']]['escolar'];?> Grado <?php echo $_grado[$_cupos[$_GET['id']]['id_grado']]['grado'];?> Sección <?php echo $_seccion[$_cupos[$_GET['id']]['id_seccion']]['seccion'];?></h4>
			                    </div>
			                    <div class="col-md-12 panel-body" style="padding-bottom:30px;">
			                    	<p>Los campos con (*) son obligatorios.</p>
			                    	<br>
			                      	<div class="col-md-12">
			                        	<form class="cmxform" id="form_cupos" method="post" action="?view=config&mode=EditCupos&id=<?php echo $_GET['id'];?>">
			                          		<div class="col-md-12">
			                            		<div class="form-group form-animate-text col-md-12" style="margin-top: -10px !important;">
			                              			<input type="text" class="form-text" name="cupo" id="cupo" required value="<?php echo $_cupos[$_GET['id']]['cupos'];?>" onkeypress="return solonumeros(event)">
			                              			<span class="bar"></span>
			                              			<label>*Cupo:</label>
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
				</body>
			<?php
		}else{
			header('location: ?view=index');
		}
	?>
</html>