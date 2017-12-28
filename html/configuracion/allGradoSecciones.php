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
								{title:'Grado guardado!',
								type:'success',
								confirmButtonText:'Aceptar'}
							);
						</script>
					<?php
				}else if($_GET['success']==2){
					?>
						<script>
							swal(
								{title:'Seccion guardada!',
								type:'success',
								confirmButtonText:'Aceptar'}
							);
						</script>
					<?php
				}else if($_GET['success']==3){
					?>
						<script>
							swal(
								{title:'Seccion asignada con éxito!',
								type:'success',
								confirmButtonText:'Aceptar'}
							);
						</script>
					<?php
				}else if($_GET['success']==4){
					?>
						<script>
							swal(
								{title:'Cupo asignado con éxito!',
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
								{title:'Este grado ya se encuentra registrado!',
								type:'error',
								confirmButtonText:'Aceptar'}
							);
						</script>
					<?php
				}else if($_GET['error']==3){
					?>
						<script>
							swal(
								{title:'Esta sección ya se encuentra registrada!',
								type:'error',
								confirmButtonText:'Aceptar'}
							);
						</script>
					<?php
				}else if($_GET['error']==4){
					?>
						<script>
							swal(
								{title:'Esta sección ya se encuentra asignada!',
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
			                          	Configuración <span class="fa-angle-right fa"></span> Grado y Secciones
			                        </p>
			                    </div>
			                </div>
			            </div>
			            <div class="col-md-12">
                  			<div class="col-md-12">
                                <div class="col-md-12 tabs-area">
	    			                <ul id="tabs-demo6" class="nav nav-tabs nav-tabs-v6" role="tablist">
                      					<li role="presentation" class="active">
                        					<a href="#tabs-demo7-area1" id="tabs-demo6-1" role="tab" data-toggle="tab" aria-expanded="true">Grados</a>
                      					</li>
                      					<li role="presentation" class="">
                        					<a href="#tabs-demo7-area2" role="tab" id="tabs-demo6-2" data-toggle="tab" aria-expanded="false">Secciones</a>
                      					</li>
                      					<li role="presentation">
                        					<a href="#tabs-demo7-area3" id="tabs-demo6-3" role="tab" data-toggle="tab" aria-expanded="false">Asignar Secciones</a>
                      					</li>
                      					<li role="presentation" class="">
                        					<a href="#tabs-demo7-area4" role="tab" id="tabs-demo6-4" data-toggle="tab" aria-expanded="false">Asignar Cupos</a>
                      					</li>
                    				</ul>
                    				<div id="tabsDemo6Content" class="tab-content tab-content-v6 col-md-12">
                      					<div role="tabpanel" class="tab-pane fade active in" id="tabs-demo7-area1" aria-labelledby="tabs-demo7-area1">
                        					<div class="col-md-12 top-20 padding-0">
			                					<div class="col-md-12">
			                    					<div class="panel">
			                    						<div class="panel-heading"><h3>Agregar Grado</h3></div>
			                   							<div class="panel-body">
			                    							<div class="responsive-table">
			                    								<table class="table table-striped table-bordered" width="100%" cellspacing="0">
			                    									<tbody>
			                      										<tr>
																			<td>
																				<form class="cmxform" id="form_grado" method="post" action="?view=config&mode=AddGrado">
																					<div class="form-group form-animate-text col-md-1 col-sm-1 col-xs-1" style="margin-top:0px !important;">
							                              								<label>Grado:</label>
							                            							</div>
							                            							<div class="form-group form-animate-text col-md-9 col-sm-9 col-xs-9" style="margin-top:0px !important;">
							                              								<input type="text" class="form-text" id="grado" name="grado" required maxlength="10">
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
								                    	<div class="panel-heading"><h3>Grados</h3></div>
								                   		<div class="panel-body">
								                    		<div class="responsive-table">
								                    			<table id="datatables-grado" class="table table-striped table-bordered" width="100%" cellspacing="0">
								                    				<thead>
								                      					<tr>
								                      						<th style="width: 10%; text-align: center;">N°</th> 
																			<th style="text-align: center;">Grado</th>
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
																			if($_grado>0){
																				$contador=1;
																				foreach ($_grado as $grado) {
																					?>
																						<tr>
																							<td style="width: 10%; text-align: center;"><?php echo $contador;?></td>
																							<td style="text-align: center;"><?php echo $grado['grado'];?></td>
																							<?php
																								if($_users[$_SESSION['app_id']]['id_tipo_usu']==1){
																									?>
																										<td style="width: 20%; text-align: center;">
																											<a href="?view=config&mode=EditGrado&id=<?php echo $grado['id_grado'];?>">
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
																		?>
								                    				</tbody>
								                      			</table>
								                    		</div>
								                  		</div>
								                	</div>
								              	</div>  
								            </div>
                      					</div>
                      					<div role="tabpanel" class="tab-pane fade" id="tabs-demo7-area2" aria-labelledby="tabs-demo7-area2">
                        					<div class="col-md-12 top-20 padding-0">
			                					<div class="col-md-12">
			                    					<div class="panel">
			                    						<div class="panel-heading"><h3>Agregar Sección</h3></div>
			                   							<div class="panel-body">
			                    							<div class="responsive-table">
			                    								<table class="table table-striped table-bordered" width="100%" cellspacing="0">
			                    									<tbody>
			                      										<tr>
																			<td>
																				<form class="cmxform" id="form_seccion" method="post" action="?view=config&mode=AddSeccion">
																					<div class="form-group form-animate-text col-md-1 col-sm-1 col-xs-1" style="margin-top:0px !important;">
							                              								<label>Sección:</label>
							                            							</div>
							                            							<div class="form-group form-animate-text col-md-9 col-sm-9 col-xs-9" style="margin-top:0px !important;">
							                              								<input type="text" class="form-text" id="seccion" name="seccion" required maxlength="1" onkeypress="return sololetras(event)">
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
								                    	<div class="panel-heading"><h3>Secciones</h3></div>
								                   		<div class="panel-body">
								                    		<div class="responsive-table">
								                    			<table id="datatables-seccion" class="table table-striped table-bordered" width="100%" cellspacing="0">
								                    				<thead>
								                      					<tr>
								                      						<th style="width: 10%; text-align: center;">N°</th> 
																			<th style="text-align: center;">Sección</th>
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
																			if($_seccion>0){
																				$contador=1;
																				foreach ($_seccion as $seccion) {
																					?>
																						<tr>
																							<td style="width: 10%; text-align: center;"><?php echo $contador;?></td>
																							<td style="text-align: center;"><?php echo $seccion['seccion'];?></td>
																							<?php
																								if($_users[$_SESSION['app_id']]['id_tipo_usu']==1){
																									?>
																										<td style="width: 20%; text-align: center;">
																											<a href="?view=config&mode=EditSeccion&id=<?php echo $seccion['id_seccion'];?>">
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
																		?>
								                    				</tbody>
								                      			</table>
								                    		</div>
								                  		</div>
								                	</div>
								              	</div>  
								            </div>
                      					</div>
                      					<div role="tabpanel" class="tab-pane fade" id="tabs-demo7-area3" aria-labelledby="tabs-demo7-area3">
                        					<div class="col-md-12 top-20 padding-0">
			                					<div class="col-md-8 col-md-offset-2">
									                <div class="col-md-12 panel">
									                    <div class="col-md-12 panel-heading">
									                      	<h4>Asignar Secciones</h4>
									                    </div>
									                    <div class="col-md-12 panel-body" style="padding-bottom:30px;">
									                    	<p>Los campos con (*) son obligatorios.</p>
									                    	<br>
									                      	<div class="col-md-12">
									                        	<form class="cmxform" id="form_asignar" method="post" action="?view=config&mode=AddAsignar">
									                          		<div class="col-md-12">
												                        <div class="form-group form-animate-text col-md-3" style="margin-top: -10px !important;">
												                          	<span class="bar"></span>
												                          	<label>*Año Escolar:</label>
												                        </div>
										          						<div class="form-group form-animate-text col-md-9" style="margin-top:0px !important;">
										                                	<select class="form-control" name="escolar" id="escolar">
										                                		<option value="">Seleccione</option>
																			    <?php
																			        foreach($_escolar as $escolar){
																			        	if($escolar['cerrado']==0){
																			        		?>
																				        		<option value="<?php echo $escolar['id_escolar']?>"><?php echo $escolar['escolar']?></option>
																				        	<?php
																			        	}
																			        }
																			    ?>
										                                	</select>
										                                </div>
										                                <div class="form-group form-animate-text col-md-3" style="margin-top: -10px !important;">
												                          	<span class="bar"></span>
												                          	<label>*Grado:</label>
												                        </div>
										          						<div class="form-group form-animate-text col-md-9" style="margin-top:0px !important;">
										                                	<select class="form-control" name="grado" id="grado">
										                                		<option value="">Seleccione</option>
																			    <?php
																			        foreach($_grado as $grado){
																			        	?>
																			        		<option value="<?php echo $grado['id_grado']?>"><?php echo $grado['grado']?></option>
																			        	<?php
																			        }
																			    ?>
										                                	</select>
										                                </div>
										                                <div class="form-group form-animate-text col-md-3" style="margin-top: -10px !important;">
												                          	<span class="bar"></span>
												                          	<label>*Sección:</label>
												                        </div>
										          						<div class="form-group form-animate-text col-md-9" style="margin-top:0px !important;">
										                                	<select class="form-control" name="seccion" id="seccion">
										                                		<option value="">Seleccione</option>
																			    <?php
																			        foreach($_seccion as $seccion){
																			        	?>
																			        		<option value="<?php echo $seccion['id_seccion']?>"><?php echo $seccion['seccion']?></option>
																			        	<?php
																			        }
																			    ?>
										                                	</select>
										                                </div>
									                            		<div class="col-md-12">
										                              		<div class="form-group form-animate-checkbox"></div>
										                              		<input class="submit btn btn-teal" type="submit" value="Asignar">
										                        		</div>
										                            </div>
									                      		</form>
											                </div>
									                    </div>
									                </div>
									            </div>  
			            					</div>
								            <div class="col-md-12 top-20 padding-0">
								                <div class="col-md-12">
								                    <div class="panel">
								                    	<div class="panel-heading"><h3>Secciones Asignadas</h3></div>
								                    	<br>
								                    	<div class="form-group form-animate-text col-md-2" style="margin-top: -10px !important;">
								                          	<span class="bar"></span>
								                          	<label>Año Escolar:</label>
								                        </div>
								                    	<div class="form-group form-animate-text col-md-4" style="margin-top:0px !important;">
										                    <select class="form-control" name="escolar" id="escolar-search">
						                                		<option value="">Seleccione</option>
															    <?php
															        foreach($_escolar as $escolar){
															        	?>
															        		<option value="<?php echo $escolar['id_escolar']?>"><?php echo $escolar['escolar']?></option>
															        	<?php
															        }
															    ?>
						                                	</select>
						                                </div>
						                                <div class="form-group form-animate-text col-md-1" style="margin-top: -10px !important;">
								                          	<span class="bar"></span>
								                          	<label>Grado:</label>
								                        </div>
						          						<div class="form-group form-animate-text col-md-4 col-md-offse-1" style="margin-top:0px !important;">
						                                	<select class="form-control" name="grado" id="grado-search">
						                                		<option value="">Seleccione</option>
															    <?php
															        foreach($_grado as $grado){
															        	?>
															        		<option value="<?php echo $grado['id_grado']?>"><?php echo $grado['grado']?></option>
															        	<?php
															        }
															    ?>
						                                	</select>
						                                </div>
								                   		<div id="resultados">
								                   			<div class="panel-body">
												        		<div class="responsive-table">
												        			<table id="datatables-asignar" class="table table-striped table-bordered" width="100%" cellspacing="0">
												        				<thead>
												          					<tr>
												          						<th style="width: 10%; text-align: center;">N°</th> 
												          						<th style="text-align: center;">Año Escolar</th>
																				<th style="text-align: center;">Grado</th>
																				<th style="text-align: center;">Sección</th>					
																			</tr>
												        				</thead>
												        				<tbody>
												        				</tbody>
												          			</table>
												        		</div>
												      		</div>
								                   		</div>
								                	</div>
								              	</div>  
								            </div>
                      					</div>
                      					<div role="tabpanel" class="tab-pane fade" id="tabs-demo7-area4" aria-labelledby="tabs-demo7-area4">
                        					<div class="col-md-12 top-20 padding-0">
			                					<div class="col-md-8 col-md-offset-2">
									                <div class="col-md-12 panel">
									                    <div class="col-md-12 panel-heading">
									                      	<h4>Asignar Cupos</h4>
									                    </div>
									                    <div class="col-md-12 panel-body" style="padding-bottom:30px;">
									                    	<p>Los campos con (*) son obligatorios.</p>
									                    	<br>
									                      	<div class="col-md-12">
									                        	<form class="cmxform" id="form_cupos" method="post" action="?view=config&mode=AddCupos">
									                          		<div class="col-md-12">
												                        <div class="form-group form-animate-text col-md-3" style="margin-top: -10px !important;">
												                          	<span class="bar"></span>
												                          	<label>*Año Escolar:</label>
												                        </div>
										          						<div class="form-group form-animate-text col-md-9" style="margin-top:0px !important;">
										                                	<select class="form-control" name="escolar" id="escolar-cupos">
										                                		<option value="">Seleccione</option>
																			    <?php
																			        foreach($_escolar as $escolar){
																			        	if($escolar['cerrado']==0){
																			        		?>
																				        		<option value="<?php echo $escolar['id_escolar']?>"><?php echo $escolar['escolar']?></option>
																				        	<?php
																			        	}
																			        }
																			    ?>
										                                	</select>
										                                </div>
										                                <div class="form-group form-animate-text col-md-3" style="margin-top: -10px !important;">
												                          	<span class="bar"></span>
												                          	<label>*Grado:</label>
												                        </div>
										          						<div class="form-group form-animate-text col-md-9" style="margin-top:0px !important;">
										                                	<select class="form-control" name="grado" id="grado-cupos">
										                                		<option value="">Seleccione</option>
																			    <?php
																			        foreach($_grado as $grado){
																			        	?>
																			        		<option value="<?php echo $grado['id_grado']?>"><?php echo $grado['grado']?></option>
																			        	<?php
																			        }
																			    ?>
										                                	</select>
										                                </div>
										                                <div class="form-group form-animate-text col-md-3" style="margin-top: -10px !important;">
												                          	<span class="bar"></span>
												                          	<label>*Sección:</label>
												                        </div>
										          						<div class="form-group form-animate-text col-md-9" style="margin-top:0px !important;">
										                                	<select class="form-control" name="seccion" id="seccion-cupos">
										                                		<option value="">Seleccione</option>
																			    <?php
																			        foreach($_seccion as $seccion){
																			        	?>
																			        		<option value="<?php echo $seccion['id_seccion']?>"><?php echo $seccion['seccion']?></option>
																			        	<?php
																			        }
																			    ?>
										                                	</select>
										                                </div>
										                                <div id="resultados2"></div>
									                            		<div class="col-md-12">
										                              		<div class="form-group form-animate-checkbox"></div>
										                              		<input class="submit btn btn-teal" type="submit" value="Asignar">
										                        		</div>
										                            </div>
									                      		</form>
											                </div>
									                    </div>
									                </div>
									            </div>  
			            					</div>
								            <div class="col-md-12 top-20 padding-0">
								                <div class="col-md-12">
								                    <div class="panel">
								                    	<div class="panel-heading"><h3>Cupos Asignados</h3></div>
								                    	<br>
								                    	<div class="form-group form-animate-text col-md-2" style="margin-top: -10px !important;">
								                          	<span class="bar"></span>
								                          	<label>Año Escolar:</label>
								                        </div>
								                    	<div class="form-group form-animate-text col-md-4" style="margin-top:0px !important;">
										                    <select class="form-control" name="escolar" id="cupos-search">
						                                		<option value="">Seleccione</option>
															    <?php
															        foreach($_escolar as $escolar){
															        	?>
															        		<option value="<?php echo $escolar['id_escolar']?>"><?php echo $escolar['escolar']?></option>
															        	<?php
															        }
															    ?>
						                                	</select>
						                                </div>
								                   		<div id="resultados1">
								                   			<div class="panel-body">
												        		<div class="responsive-table">
												        			<table id="datatables-cupos" class="table table-striped table-bordered" width="100%" cellspacing="0">
												        				<thead>
												          					<tr>
												          						<th style="width: 10%; text-align: center;">N°</th> 
												          						<th style="text-align: center;">Año Escolar</th>
																				<th style="text-align: center;">Grado</th>
																				<th style="text-align: center;">Sección</th>
																				<th style="text-align: center;">Cupos</th>
																				<th style="text-align: center;">Acción</th>					
																			</tr>
												        				</thead>
												        				<tbody>
												        				</tbody>
												          			</table>
												        		</div>
												      		</div>
								                   		</div>
								                	</div>
								              	</div>  
								            </div>
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