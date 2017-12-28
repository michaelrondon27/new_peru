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
								{title:'Grado de instrucción guardado!',
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
								{title:'Este grado de instrucción ya está registrado!',
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
			                          	Configuración <span class="fa-angle-right fa"></span> Grado de Instrucción
			                        </p>
			                    </div>
			                </div>
			            </div>
			            <div class="col-md-12 top-20 padding-0">
			                <div class="col-md-12">
			                    <div class="panel">
			                    	<div class="panel-heading"><h3>Agregar Grado de Instrucción</h3></div>
			                   		<div class="panel-body">
			                    		<div class="responsive-table">
			                    			<table class="table table-striped table-bordered" width="100%" cellspacing="0">
			                    				<tbody>
			                      					<tr>
														<td>
															<form class="cmxform" id="form_instruccion" method="post" action="?view=config&mode=Instruccion">
																<div class="form-group form-animate-text col-md-2 col-sm-2 col-xs-2" style="margin-top:0px !important;">
							                              			<label>Grado de Instrucción:</label>
							                            		</div>
							                            		<div class="form-group form-animate-text col-md-8 col-sm-8 col-xs-8" style="margin-top:0px !important;">
							                              			<input type="text" class="form-text" id="instruccion" name="instruccion" required>
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
			                    	<div class="panel-heading"><h3>Grados de Instrucción</h3></div>
			                   		<div class="panel-body">
			                    		<div class="responsive-table">
			                    			<table id="datatables-example" class="table table-striped table-bordered" width="100%" cellspacing="0">
			                    				<thead>
			                      					<tr>
			                      						<th style="width: 10%; text-align: center;">N°</th> 
														<th style="text-align: center;">Grado de Instrucción</th>
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
														if($_instruccion>0){
															$contador=1;
															foreach ($_instruccion as $instruccion) {
																if($instruccion['id_instruccion']!=1){
																	?>
																		<tr>
																			<td style="width: 10%; text-align: center;"><?php echo $contador;?></td>
																			<td style="text-align: center;"><?php echo $instruccion['instruccion'];?></td>
																			<?php
																				if($_users[$_SESSION['app_id']]['id_tipo_usu']==1){
																					?>
																						<td style="width: 20%; text-align: center;">
																							<a href="?view=config&mode=EditInstruccion&id=<?php echo $instruccion['id_instruccion'];?>">
																								<button class="btn btn-teal" type="button" aria-haspopup="true">
														    										Editar <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
														  										</button>
														  									</a>
																						</td>
																					<?php
																				}
																			?> 
																		</tr>
																	<?php
																	$contador++;
																}																
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
				</body>
			<?php
		}else{
			header('location: ?view=index');
		}
	?>
</html>