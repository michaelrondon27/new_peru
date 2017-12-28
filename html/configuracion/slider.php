<!DOCTYPE html>
<html>
	<?php
		if($_users[$_SESSION['app_id']]['id_tipo_usu']==1){
			include(HTML_DIR."overall/header.php");
			?>
				<script>
					$(document).ready(function(){
						$("#slider").validate({
							errorElement: "em",
					      	errorPlacement: function(error, element) {
					        	$(element.parent("div").addClass("form-animate-error"));
					       		error.appendTo(element.parent("div"));
					      	},
					      	success: function(label) {
					        	$(label.parent("div").removeClass("form-animate-error"));
					      	},
					      	rules: {
						        imagen: "required"
					      	},
					      	messages: {
					        	imagen: "Seleccione un archivo, por favor"
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
									{title:'Imagen guardado!',
									type:'success',
									confirmButtonText:'Aceptar'}
								);
							</script>
						<?php
					}else if($_GET['success']==2){
						?>
							<script>
								swal(
									{title:'Imagen eliminada!',
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
									{title:'Solo se aceptan imagenes con las siguientes extensiones: jpg, jpeg, png y gif!',
									type:'warning',
									confirmButtonText:'Aceptar'}
								);
							</script>
						<?php
					}else if($_GET['error']==3){
						?>
							<script>
								swal(
									{title:'La imagen es muy pesada!',
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
					<div id="content">
						<div class="panel box-shadow-none content-header">
			                <div class="panel-body">
			                    <div class="col-md-9">
			                        <p class="animated fadeInDown">
			                          	Configuración <span class="fa-angle-right fa"></span> Editar Carrusel de Imagenes
			                        </p>
			                    </div>
			                </div>
			            </div>
			            <div class="col-md-12 top-20 padding-0">
			                <div class="col-md-12">
			                    <div class="panel">
			                    	<div class="panel-heading"><h3>Agregar Imagen</h3></div>
			                   		<div class="panel-body">
			                    		<div class="responsive-table">
			                    			<table class="table table-striped table-bordered" width="100%" cellspacing="0">
			                    				<tbody>
			                      					<tr>
														<td>
															<form class="cmxform" id="slider" method="post" action="?view=config&mode=Carrusel" enctype="multipart/form-data">
																<div class="form-group form-animate-text col-md-1 col-sm-1 col-xs-1" style="margin-top:0px !important;">
							                              			<label>Imagen:</label>
							                            		</div>
							                            		<div class="form-group form-animate-text col-md-9 col-sm-9 col-xs-9" style="margin-top:0px !important;">
							                              			<input type="file" class="form-text" id="imagen" name="imagen" required>
							                            		</div>
							                            		<div class="col-md-2 col-sm-2 col-xs-2">
								                              	<div class="form-group form-animate-checkbox"></div>
								                              		<input class="submit btn btn-teal" type="submit" value="Guardar">
								                        		</div>
															</form>
														</td>
													</tr>
			                    				</tbody>
			                      			</table>
			                    		</div>
			                  		</div>
			                	</div>
			              	</div>  
			            </div>
			            <div class="col-md-12 top-20 padding-0">
			                <div class="col-md-12">
			                    <div class="panel">
			                    	<div class="panel-heading"><h3>Carrusel de Imagenes</h3></div>
			                   		<div class="panel-body">
			                    		<div class="responsive-table">
			                    			<table id="datatables-example" class="table table-striped table-bordered" width="100%" cellspacing="0">
			                    				<thead>
			                      					<tr>
			                      						<th style="width: 10%; text-align: center;">N°</th> 
														<th style="text-align: center;">Imagen</th>
														<?php
															if($_users[$_SESSION['app_id']]['id_tipo_usu']==1){
																?>
																	<th style="width: 20%; text-align: center;">Acción</th>
																<?php
															}
														?>  					
													</tr>
			                    				</thead>
			                    				<tbody>
			                      					<?php
														if($_slider>0){
															$contador=1;
															foreach ($_slider as $slider) {
																?>
																	<tr>
																		<td style="width: 10%; text-align: center;"><?php echo $contador;?></td>
																		<td style="text-align: center;"><img src="asset/images/<?php echo $slider['imagen'];?>" style="width: 20%;"></td>
																		<?php
																			if($_users[$_SESSION['app_id']]['id_tipo_usu']==1){
																				?>
																					<td style="width: 20%; text-align: center;">
																						<button class="btn btn-teal" type="button" aria-haspopup="true" onclick="DeleteItem('¿Está seguro de eliminar esta imagen?','?view=config&mode=DeleteImagen&id=<?php echo $slider['id_slider'];?>')">
													    									Eliminar
													  									</button>
																					</td>
																				<?php
																			}
																		?> 
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
							$('#datatables-example').DataTable();
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