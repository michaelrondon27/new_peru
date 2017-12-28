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
								{title:'Representante editado!',
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
								{title:'Ya hay un registro con ese número de cédula!',
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
					<script src="asset/js/representante.js"></script>
					<div id="content">
			            <div class="panel box-shadow-none content-header">
			                <div class="panel-body">
			                    <div class="col-md-9">
			                        <p class="animated fadeInDown">
			                          	Representantes <span class="fa-angle-right fa"></span> Editar Madre <span class="fa-angle-right fa"></span> <?php echo $_madre[$_GET['id']]['nombres']." ".$_madre[$_GET['id']]['apellidos'];?>
			                        </p>
			                    </div>
			                    <div class="col-md-3">
			                        <p class="animated fadeInDown">
			                          <a class="btn btn-teal" href="?view=representante&mode=AllMadre">Consultar Madres <i class="fa fa-sign-in" aria-hidden="true"></i></a>
			                        </p>
			                    </div>
			                </div>
			            </div>
			            <div class="col-md-10 col-md-offset-1">
			                <div class="col-md-12 panel">
			                    <div class="col-md-12 panel-heading">
			                      	<h4>Editar Madre</h4>
			                    </div>
			                    <div class="col-md-12 panel-body" style="padding-bottom:30px;">
			                    	<p>Los campos con (*) son obligatorios.</p>
			                    	<br>
			                      	<div class="col-md-12">
			                        	<form class="cmxform" id="representante" method="post" action="?view=representante&mode=EditMadre&id=<?php echo $_GET['id'];?>">
			                          		<div class="col-md-12">
			                          			<div class="form-group form-animate-text col-md-4" style="margin-top: -10px !important;">
			                              			<input type="text" class="form-text" name="apellidos" id="apellidos" required onkeypress="return sololetras(event)" value="<?php echo $_madre[$_GET['id']]['apellidos'];?>">
			                              			<span class="bar"></span>
			                              			<label>*Apellidos:</label>
			                            		</div>
			                            		<div class="form-group form-animate-text col-md-4" style="margin-top: -10px !important;">
			                              			<input type="text" class="form-text" name="nombres" id="nombres" required onkeypress="return sololetras(event)" value="<?php echo $_madre[$_GET['id']]['nombres'];?>">
			                              			<span class="bar"></span>
			                              			<label>*Nombres:</label>
			                            		</div>
			                            		<div class="form-group form-animate-text col-md-4" style="margin-top: -10px !important;">
			                              			<input type="text" class="form-text" name="cedula" id="cedula" required onkeypress="return solonumeros(event)" maxlength="8" value="<?php echo $_madre[$_GET['id']]['cedula'];?>">
			                              			<span class="bar"></span>
			                              			<label>*Cédula:</label>
			                            		</div>
			                            		<div class="form-group form-animate-text col-md-4" style="margin-top: -10px !important;">
			                              			<input type="text" class="form-text" name="edad" id="edad" onkeypress="return solonumeros(event)" maxlength="2" value="<?php echo $_madre[$_GET['id']]['edad'];?>">
			                              			<span class="bar"></span>
			                              			<label>Edad:</label>
			                            		</div>
			                            		<div class="form-group form-animate-text col-md-4" style="margin-top: -10px !important;">
			                            			<label style="font-size: 14px; margin-top: -21px;">Grado de Instrucción:</label>
			                              			<select class="form-control" name="instruccion" id="instruccion" style="margin-top: 12px; clear: both;">
													    <?php
													        foreach($_instruccion as $instruccion){
													        	if($instruccion['id_instruccion']==$_madre[$_GET['id']]['id_instruccion']){
													        		if($instruccion['id_instruccion']==1){
													        			?>
															        		<option selected value="<?php echo $instruccion['id_instruccion']?>">Seleccione</option>
															        	<?php
													        		}else{
													        			?>
															        		<option selected value="<?php echo $instruccion['id_instruccion']?>"><?php echo $instruccion['instruccion']?></option>
															        	<?php
													        		}														        		
													        	}else if($instruccion['id_instruccion']!=$_madre[$_GET['id']]['id_instruccion']){
														        	if($instruccion['id_instruccion']==1){
													        			?>
															        		<option value="<?php echo $instruccion['id_instruccion']?>">Seleccione</option>
															        	<?php
													        		}else{
													        			?>
															        		<option value="<?php echo $instruccion['id_instruccion']?>"><?php echo $instruccion['instruccion']?></option>
															        	<?php
													        		}	
													        	}
													        }
													    ?>
				                                	</select>                             			
			                            		</div>
			                            		<div class="form-group form-animate-text col-md-4" style="margin-top: -10px !important;">
			                              			<input type="text" class="form-text" name="ocupacion" id="ocupacion" value="<?php echo $_madre[$_GET['id']]['ocupacion'];?>">
			                              			<span class="bar"></span>
			                              			<label>Ocupación:</label>
			                            		</div>
			                            		<div class="form-group form-animate-text col-md-4" style="margin-top: -10px !important;">
			                              			<input type="text" class="form-text" name="dirtrabajo" id="dirtrabajo" value="<?php echo $_madre[$_GET['id']]['dir_empresa'];?>">
			                              			<span class="bar"></span>
			                              			<label>Nombre y Dirección de la Empresa donde trabaja:</label>
			                            		</div>
			                            		<div class="form-group form-animate-text col-md-4" style="margin-top: -10px !important;">
			                              			<input type="text" class="form-text" name="dirhabitacion" id="dirhabitacion" value="<?php echo $_madre[$_GET['id']]['dir_hab'];?>">
			                              			<span class="bar"></span>
			                              			<label>Dirección de Habitación:</label>
			                            		</div>
			                            		<div class="form-group form-animate-text col-md-4" style="margin-top: -10px !important;">
			                              			<input type="text" class="form-text" name="correo" id="correo" required value="<?php echo $_madre[$_GET['id']]['correo'];?>">
			                              			<span class="bar"></span>
			                              			<label>*Correo:</label>
			                            		</div>
			                            		<div class="form-group form-animate-text col-md-4" style="margin-top: -10px !important;">
			                            			<label style="font-size: 14px; margin-top: -21px;">Teléfono de la empresa:</label>
			                            			<div class="form-group form-animate-text col-md-6">
				                              			<select class="form-control" name="codtlftrabajo" id="codtlftrabajo" style="margin-top: 12px;">
				                              				<?php
				                              					if($_madre[$_GET['id']]['cod_emp']==""){
				                              						?>
																		<option selected value="">Seleccione</option>
																	    <option value="212">212</option>
																		<option value="239">239</option>
				                              						<?php
				                              					}else if($_madre[$_GET['id']]['cod_emp']=="212"){
				                              						?>
																		<option value="">Seleccione</option>
																	    <option selected value="212">212</option>
																		<option value="239">239</option>
				                              						<?php
				                              					}else if($_madre[$_GET['id']]['cod_emp']=="239"){
				                              						?>
																		<option value="">Seleccione</option>
																	    <option value="212">212</option>
																		<option selected value="239">239</option>
				                              						<?php
				                              					}
				                              				?>
					                                	</select>
					                                </div>
					                                <div class="form-group form-animate-text col-md-6">
				                                		<input type="text" class="form-text" name="tlftrabajo" id="tlftrabajo" onkeypress="return solonumeros(event)" onchange="CountNumber('tlftrabajo')" maxlength="7" value="<?php echo $_madre[$_GET['id']]['tlf_empresa'];?>">
				                                	</div>                         			
			                            		</div>
			                            		<div class="form-group form-animate-text col-md-4" style="margin-top: -10px !important;">
			                            			<label style="font-size: 14px; margin-top: -21px;">*Teléfono de habitación:</label>
			                            			<div class="form-group form-animate-text col-md-6">
				                              			<select class="form-control" name="codtlfhabitacion" id="codtlfhabitacion" style="margin-top: 12px;">
					                                		<option value="">Seleccione</option>
														    <?php
														    	foreach($_local as $local){
														    		if($local['id_tlf_local']==$_madre[$_GET['id']]['id_tlf_local']){
														    			?>
															    			<option selected value="<?php echo $local['id_tlf_local']?>"><?php echo $local['cod_tlf_local']?></option>
															    		<?php
														    		}else if($local['id_tlf_local']!=$_madre[$_GET['id']]['id_tlf_local']){
														    			?>
															    			<option value="<?php echo $local['id_tlf_local']?>"><?php echo $local['cod_tlf_local']?></option>
															    		<?php
														    		}
														    	}
														    ?>
					                                	</select>
					                                </div>
					                                <div class="form-group form-animate-text col-md-6">
				                                		<input type="text" class="form-text" name="tlfhabitacion" id="tlfhabitacion" onkeypress="return solonumeros(event)" onchange="CountNumber('tlfhabitacion')" maxlength="7" value="<?php echo $_madre[$_GET['id']]['tlf_hab'];?>">
				                                	</div>                         			
			                            		</div>
			                            		<div class="form-group form-animate-text col-md-4" style="margin-top: -10px !important;">
			                            			<label style="font-size: 14px; margin-top: -21px;">*Teléfono celular:</label>
			                            			<div class="form-group form-animate-text col-md-6">
				                              			<select class="form-control" name="codtlfcelular" id="codtlfcelular" style="margin-top: 12px;">
					                                		<option value="">Seleccione</option>
														    <?php
														    	foreach($_celular as $celular){
														    		if($celular['id_tlf_cel']==$_madre[$_GET['id']]['id_tlf_cel']){
														    			?>
															    			<option selected value="<?php echo $celular['id_tlf_cel']?>"><?php echo $celular['cod_tlf_cel']?></option>
															    		<?php
														    		}else if($celular['id_tlf_cel']!=$_madre[$_GET['id']]['id_tlf_cel']){
														    			?>
															    			<option value="<?php echo $celular['id_tlf_cel']?>"><?php echo $celular['cod_tlf_cel']?></option>
															    		<?php
														    		}
														    	}
														    ?>
					                                	</select>
					                                </div>
					                                <div class="form-group form-animate-text col-md-6">
				                                		<input type="text" class="form-text" name="tlfcelular" id="tlfcelular" onkeypress="return solonumeros(event)" onchange="CountNumber('tlfcelular')" maxlength="7" value="<?php echo $_madre[$_GET['id']]['tlf_cel'];?>">
				                                	</div>                         			
			                            		</div>
			                            		<div class="col-md-12">
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
							$("#consulta").addClass("active");
						});
					</script>
				</body>
			<?php
		}else{
			header("location: ?view=representante&mode=AllMadre");
		}
	?>
</html>