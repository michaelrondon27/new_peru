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
								{title:'Año escolar guardado!',
								type:'success',
								confirmButtonText:'Aceptar'}
							);
						</script>
					<?php
				}else if($_GET['success']==2){
					?>
						<script>
							swal(
								{title:'Año escolar cerrado!',
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
								{title:'Este año escolar ya está registrado!',
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
			                          	Configuración <span class="fa-angle-right fa"></span> Año Escolar
			                        </p>
			                    </div>
			                </div>
			            </div>
			            <div class="col-md-12 top-20 padding-0">
			                <div class="col-md-12">
			                    <div class="panel">
			                    	<div class="panel-heading"><h3>Agregar Año Escolar</h3></div>
			                   		<div class="panel-body">
			                    		<div class="responsive-table">
			                    			<table class="table table-striped table-bordered" width="100%" cellspacing="0">
			                    				<tbody>
			                      					<tr>
														<td>
															<form class="cmxform" id="esc" method="post" action="?view=config&mode=Escolar">
																<div class="form-group form-animate-text col-md-2 col-sm-2 col-xs-2" style="margin-top:0px !important;">
							                              			<label>Año Escolar:</label>
							                            		</div>
							                            		<div class="form-group form-animate-text col-md-8 col-sm-8 col-xs-8" style="margin-top:0px !important;">
							                              			<input type="text" class="form-text" id="escolar" name="escolar" required onkeypress="return solonumeros2(event)" maxlength="9">
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
			                    	<div class="panel-heading"><h3>Años Escolares</h3></div>
			                   		<div class="panel-body">
			                    		<div class="responsive-table">
			                    			<table id="datatables-example" class="table table-striped table-bordered" width="100%" cellspacing="0">
			                    				<thead>
			                      					<tr>
			                      						<th style="width: 10%; text-align: center;">N°</th> 
														<th style="text-align: center;">Año Escolar</th>
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
														if($_escolar>0){
															$contador=1;
															foreach ($_escolar as $escolar) {
																?>
																	<tr>
																		<td style="width: 10%; text-align: center;"><?php echo $contador;?></td>
																		<td style="text-align: center;"><?php echo $escolar['escolar'];?></td>
																		<?php
																			if($_users[$_SESSION['app_id']]['id_tipo_usu']==1){
														  						if($escolar['cerrado']==0){
																					?>
																						<td style="width: 20%; text-align: center;">
																							<div class="dropdown">
														  										<button class="btn btn-teal dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
														    										Acciones
														    										<span class="caret"></span>
														  										</button>
														  										<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
															  										<li><a href="?view=config&mode=EditEscolar&id=<?php echo $escolar['id_escolar'];?>">Editar <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></li>
															  										<li><a onclick="Cerrar('¿Está seguro de cerrar este año escolar?','?view=config&mode=CerrarEscolar&id=<?php echo $escolar['id_escolar']?>')">Cerrar <i class="fa fa-lock" aria-hidden="true"></i></a></li>
														  										</ul>
																							</div>
																						</td>
																					<?php
																				}
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
				</body>
			<?php
		}else{
			header('location: ?view=index');
		}
	?>
</html>