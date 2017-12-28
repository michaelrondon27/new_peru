<!DOCTYPE html>
<html>
	<?php
		if($_users[$_SESSION['app_id']]['id_tipo_usu']==1 || $_users[$_SESSION['app_id']]['id_tipo_usu']==2){
			include(HTML_DIR."overall/header.php");
			?>
				<script>
					$(document).ready(function(){
						$("#form_instruccion").validate({
							errorElement: "em",
					      	errorPlacement: function(error, element) {
					        	$(element.parent("div").addClass("form-animate-error"));
					       		error.appendTo(element.parent("div"));
					      	},
					      	success: function(label) {
					        	$(label.parent("div").removeClass("form-animate-error"));
					      	},
					      	rules: {
						        instruccion: "required"
					      	},
					      	messages: {
					        	instruccion: "Rellene el campo, por favor"
					      	}
						});
					});
				</script>
			<?php
				if(isset($_GET['success'])){
					if($_GET['success']==1){
						?>
							<script>
								swal(
									{title:'Grado de instrucción editado!',
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
									{title:'Este grado de instrucción ya se encuentra agregado en el sistema!',
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
					<div id="content">
						<div class="panel box-shadow-none content-header">
			                <div class="panel-body">
			                    <div class="col-md-9">
			                        <p class="animated fadeInDown">
			                          	Configuración <span class="fa-angle-right fa"></span> Editar Grado de Instrucción <span class="fa-angle-right fa"></span> <?php echo $_instruccion[$_GET['id']]['instruccion'];?>
			                        </p>
			                    </div>
			                    <div class="col-md-3">
			                        <p class="animated fadeInDown">
			                          <a class="btn btn-teal" href="?view=config&mode=Instruccion">Consultar Grados de Instrucción <i class="fa fa-sign-in" aria-hidden="true"></i></a>
			                        </p>
			                    </div>
			                </div>
			            </div>
			            <div class="col-md-6 col-md-offset-2">
			                <div class="col-md-12 panel">
			                    <div class="col-md-12 panel-heading">
			                      	<h4>Editar Grado de Instrucción</h4>
			                    </div>
			                    <div class="col-md-12 panel-body" style="padding-bottom:30px;">
			                    	<p>Los campos con (*) son obligatorios.</p>
			                    	<br>
			                      	<div class="col-md-12">
			                        	<form class="cmxform" id="form_instruccion" method="post" action="?view=config&mode=EditInstruccion&id=<?php echo $_GET['id'];?>">
			                          		<div class="col-md-12">
			                            		<div class="form-group form-animate-text col-md-12" style="margin-top: -10px !important;">
			                              			<input type="text" class="form-text" name="instruccion" id="instruccion" required value="<?php echo $_instruccion[$_GET['id']]['instruccion'];?>">
			                              			<span class="bar"></span>
			                              			<label>*Grado de Instrucción:</label>
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
							$("#configuracion").addClass("active");
						});
					</script>
				</body>
			<?php
		}else{
			header('location: ?view=index');
		}
	?>
</html>