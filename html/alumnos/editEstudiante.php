<!DOCTYPE html>
<html>
	<?php
		include(HTML_DIR."overall/header.php");
		error_reporting(E_ERROR | E_WARNING | E_PARSE);
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
							{title:'Ya hay un alumno registrado con este número de cédula!',
							type:'error',
							confirmButtonText:'Aceptar'}
						);
					</script>
				<?php
			}else if($_GET['error']==3){
				?>
					<script>
						swal(
							{title:'Debe seleccionar al menos un representante',
							type:'error',
							confirmButtonText:'Aceptar'}
						);
					</script>
				<?php
			}
		}
		function edad($fecha){

		    $fecha = str_replace("/","-",$fecha);

		    $fecha = date('Y/m/d',strtotime($fecha));

		    $hoy = date('Y/m/d');

		    $edad = $hoy - $fecha;

		    return $edad;

		}
	?>
	<style>
		.personalizado [type="radio"],
      	.personalizado [type="checkbox"]{
			display: none !important;
		}
		.personalizado .personal_radio{
			padding-left: 1.3em !important;
			position: relative !important;
			left: 0px !important;
	  		top: 0px !important;
		}
		.personalizado .personal_radio:before{
			content: '';
			border: solid 1px #9e9e9e;
			border-radius: 3px;
			width: 0.8em;
			height: 0.8em;
			position: absolute;
			left: 0px;
			top: 4px;
			transition: all 0.2s;
			transform: rotate(0deg);
		}
		.personalizado [type="radio"]:checked + .personal_radio:before,
      	.personalizado [type="checkbox"]:checked + .personal_radio:before{
			border: solid 1px #fff;
			color: #00796b;
			content: '\f00c';
			font-family: FontAwesome;
			top: -3px;
			transform: rotate(360deg);
		}
	</style>
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
                          	Alumnos <span class="fa-angle-right fa"></span> Información del Alumno <span class="fa-angle-right fa"></span> <?php echo $_alumno[$_GET['id']]['nombres']." ".$_alumno[$_GET['id']]['apellidos'];?>
                        </p>
                    </div>
                    <div class="col-md-3">
                        <p class="animated fadeInDown">
                          <a class="btn btn-teal" href="?view=alumno&mode=AllAlumno">Consultar Alumnos <i class="fa fa-sign-in" aria-hidden="true"></i></a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
      			<div class="col-md-12">
                    <div class="col-md-12 tabs-area">
		                <ul id="tabs-demo6" class="nav nav-tabs nav-tabs-v6" role="tablist">
          					<li role="presentation" class="active" style="width: 100px;">
            					<a style="margin-left: -30px;" href="#tabs-demo7-area1" id="tabs-demo6-1" role="tab" data-toggle="tab" aria-expanded="true">Personal</a>
          					</li>
          					<li role="presentation">
            					<a href="#tabs-demo7-area2" role="tab" id="tabs-demo6-2" data-toggle="tab" aria-expanded="false">Representantes</a>
          					</li>
          					<li role="presentation">
            					<a href="#tabs-demo7-area3" id="tabs-demo6-3" role="tab" data-toggle="tab" aria-expanded="false">Antecedentes Médicos</a>
          					</li>
          					<li role="presentation" >
            					<a href="#tabs-demo7-area4" role="tab" id="tabs-demo6-4" data-toggle="tab" aria-expanded="false">Actitudes e Intereses</a>
          					</li>
          					<li role="presentation">
            					<a href="#tabs-demo7-area5" role="tab" id="tabs-demo6-5" data-toggle="tab" aria-expanded="false">Medidas Antropometricas</a>
          					</li>
        				</ul>
        				<div id="tabsDemo6Content" class="tab-content tab-content-v6 col-md-12">
          					<div role="tabpanel" class="tab-pane fade active in" id="tabs-demo7-area1" aria-labelledby="tabs-demo7-area1">
					            <div class="col-md-12 top-20 padding-0">
					                <div class="col-md-12">
					                    <div class="panel">
					                   		<div class="panel-body">
					                   			<script src="asset/js/alumno.js"></script>
					                   			<form class="cmxform" method="post" action="?view=alumno&mode=EditAlumno&id=<?php echo $_GET['id']?>" enctype="multipart/form-data" id="alumno">
						                    		<div class="responsive-table" style="color: #000; font-size: 16px;">
						                    			<div class="form-group form-animate-text col-md-3" style="margin-top: -10px !important;">
					                              			<input type="text" class="form-text" name="cedula" id="cedula" required onkeypress="return solonumeros(event)" maxlength="8" value="<?php echo $_alumno[$_GET['id']]['cedula']?>">
					                              			<span class="bar"></span>
					                              			<label>*Cédula:</label>
					                            		</div>
					                            		<div class="form-group form-animate-text col-md-3" style="margin-top: -10px !important;">
					                              			<input type="text" class="form-text" name="ced_esc" id="ced_esc" required onkeypress="return deshabilitarteclas(event)" value="<?php echo $_alumno[$_GET['id']]['ced_escolar']?>">
					                              			<span class="bar"></span>
					                              			<label>*Cédula Escolar:</label>
					                            		</div>
					                            		<div class="form-group form-animate-text col-md-3" style="margin-top: -10px !important;">
					                              			<input type="text" class="form-text" name="parto" id="parto" value="<?php echo $_alumno[$_GET['id']]['pos_parto']?>">
					                              			<span class="bar"></span>
					                              			<label>Posición según parto(s):</label>
					                            		</div>
					                            		<div class="form-group form-animate-text col-md-3" style="margin-top: -10px !important;">
					                              			<input type="text" class="form-text dateAnimate" name="fecha" id="fecha" required autocomplete="off" onkeypress="return deshabilitarteclas(event)" value="<?php echo date("d-m-Y", strtotime($_alumno[$_GET['id']]['fec_nac']));?>">
					                              			<span class="bar"></span>
					                              			<label>*Fecha de Nacimiento:</label>
					                            		</div>
					                            		<div class="form-group form-animate-text col-md-3" style="margin-top: -10px !important;">
					                              			<input type="text" class="form-text" name="apellidos" id="apellidos" required onkeypress="return sololetras(event)" value="<?php echo $_alumno[$_GET['id']]['apellidos']?>">
					                              			<span class="bar"></span>
					                              			<label>*Apellidos:</label>
					                            		</div>
					                            		<div class="form-group form-animate-text col-md-3" style="margin-top: -10px !important;">
					                              			<input type="text" class="form-text" name="nombres" id="nombres" required onkeypress="return sololetras(event)" value="<?php echo $_alumno[$_GET['id']]['nombres']?>">
					                              			<span class="bar"></span>
					                              			<label>*Nombres:</label>
					                            		</div>
					                            		<div class="form-group form-animate-text col-md-3" style="margin-top: -10px !important;">
					                              			<input type="text" class="form-text" name="edad" id="edad" onkeypress="return deshabilitarteclas(event)" maxlength="2" value="<?php echo edad($_alumno[$_GET['id']]['fec_nac']);?>">
					                              			<span class="bar"></span>
					                              			<label>Edad:</label>
					                            		</div>
					                            		<div class="form-group form-animate-text col-md-3" style="margin-top: -10px !important;">
					                            			<input type="text" class="form-text" name="lugar" id="lugar" value="<?php echo $_alumno[$_GET['id']]['lugar_nac']?>">
					                            			<span class="bar"></span>
					                            			<label>Lugar de Nacimiento:</label>
						                          		</div>
					                            		<div class="form-group form-animate-text col-md-4" style="margin-top: -10px !important;">
						                          			<select class="form-control" name="sexo" id="sexo" required>
						                          				<?php
						                          					if($_alumno[$_GET['id']]['sexo']=="Masculino"){
						                          						?>
						                          							<option value="">Seleccione</option>
									            							<option selected value="Masculino">Masculino</option>
									            							<option value="Femenino">Femenino</option>
						                          						<?php
						                          					}else if($_alumno[$_GET['id']]['sexo']=="Femenino"){
						                          						?>
						                          							<option value="">Seleccione</option>
									            							<option value="Masculino">Masculino</option>
									            							<option selected value="Femenino">Femenino</option>
						                          						<?php
						                          					}else{
						                          						?>
						                          							<option selected value="">Seleccione</option>
									            							<option value="Masculino">Masculino</option>
									            							<option value="Femenino">Femenino</option>
						                          						<?php
						                          					}
						                          				?>
						                              			
						                              		</select>
						                              		<span class="bar"></span>
						                          			<label style="top: -18px;font-size: 14px;color: #999C9E;">*Sexo:</label>
						                             	</div>
						                             	<div class="form-group form-animate-text col-md-4" style="margin-top: -10px !important;">     	
						                          			<select class="form-control" name="pais" id="pais">
							                              		<?php
							                              			foreach($_pais as $pais){
							                              				if($pais['id_pais']==$_alumno[$_GET['id']]['id_pais']){
							                              					if($pais['id_pais']==1){
							                              						?>
								                                					<option selected value="<?php echo $pais['id_pais'];?>">Seleccione</option>
							    	                            				<?php
							                              					}else{
							                              						?>
								                                					<option selected value="<?php echo $pais['id_pais'];?>"><?php echo $pais['pais'];?></option>
							    	                            				<?php
							                              					}
						        	                      				}else if($pais['id_pais']!=$_alumno[$_GET['id']]['id_pais']){
						            	                  					if($pais['id_pais']==1){
							                              						?>
								                                					<option value="<?php echo $pais['id_pais'];?>">Seleccione</option>
							    	                            				<?php
							                              					}else{
							                              						?>
								                                					<option value="<?php echo $pais['id_pais'];?>"><?php echo $pais['pais'];?></option>
							    	                            				<?php
							                              					}
						                        	      				}
						                            	  			}
						                              			?>
					                              			</select>
					                              			<span class="bar"></span>
					                          				<label style="top: -18px;font-size: 14px;color: #999C9E;">Pais:</label>
					                             	 	</div>
					                             	 	<div class="form-group form-animate-text col-md-4" style="margin-top: -10px !important;">               	
						                            		<select class="form-control" name="estado" id="estado">
							                               		<?php
							                               			foreach($_estado as $estado){
							                               				if($estado['id_estado']==$_alumno[$_GET['id']]['id_estado']){
							                              					if($estado['id_estado']==1){
							                              						?>
								                                					<option selected value="<?php echo $estado['id_estado'];?>">Seleccione</option>
							    	                            				<?php
							                              					}else{
							                              						?>
								                                					<option selected value="<?php echo $estado['id_estado'];?>"><?php echo $estado['estado'];?></option>
							    	                            				<?php
							                              					}
						        	                      				}else if($estado['id_estado']!=$_alumno[$_GET['id']]['id_estado']){
						            	                  					if($estado['id_estado']==1){
							                              						?>
								                                					<option value="<?php echo $estado['id_estado'];?>">Seleccione</option>
							    	                            				<?php
							                              					}else{
							                              						?>
								                                					<option value="<?php echo $estado['id_estado'];?>"><?php echo $estado['estado'];?></option>
							    	                            				<?php
							                              					}
						                        	      				}
							                               			}
							                               		?>
							                               	</select>
							                               	<span class="bar"></span>
						                            		<label style="top: -18px;font-size: 14px;color: #999C9E;">Estado:</label>
						                              	</div>
						                              	<div class="form-group form-animate-text col-md-4" style="margin-top: -10px !important;">
							                               	<div class="col-md-6" style="top: 12px;">                        	
							                              		<select class="form-control col-md-6" name="codcelular" id="codcelular" required>
								                                	<?php
								                                		foreach($_celular as $celular){
							                                				if($celular['id_cod_tlf']==$_alumno[$_GET['id']]['id_cod_tlf']){
							                                					?>
							                                						<option selected value="<?php echo $celular['id_tlf_cel'];?>"><?php echo $celular['cod_tlf_cel'];?></option>
							                                					<?php
							                                				}else if($celular['id_cod_tlf']!=$_alumno[$_GET['id']]['id_cod_tlf']){
							                                					?>
							                                						<option value="<?php echo $celular['id_tlf_cel'];?>"><?php echo $celular['cod_tlf_cel'];?></option>
							                                					<?php
							                                				}
								                                		}
								                                	?>
								                                </select>
								                            </div>
								                            <div class="col-md-6">
							                                	<input type="text" class="form-text col-md-6" name="tlfcelular" id="tlfcelular" maxlength="7" onkeypress="return solonumeros(event)" required value="<?php echo $_alumno[$_GET['id']]['tlf_cel']?>">
							                                </div> 
							                                <span class="bar"></span>
							                            	<label style="top: -18px;font-size: 14px;color: #999C9E;">*Teléfono Celular:</label>
							                            </div>
							                            <div class="form-group form-animate-text col-md-4" style="margin-top: -10px !important;">
						                            		<input type="text" class="form-text" name="correo" id="correo" required value="<?php echo $_alumno[$_GET['id']]['correo']?>">
						                            		<span class="bar"></span>
						                            		<label>*Correo:</label>
						                          		</div>
						                          		<div class="form-group form-animate-text col-md-4" style="margin-top: -10px !important;">
						                            		<input type="text" class="form-text" name="direccion" id="direccion" value="<?php echo $_alumno[$_GET['id']]['direccion']?>">
						                            		<span class="bar"></span>
						                            		<label>Dirección:</label>
						                          		</div>
						                          		<div class="col-md-12 personalizado" style="margin-top: -10px !important;">
						                          			<div class="form-group col-md-5">
						                          				¿Tiene hermanos estudiando en la institución?
						                          			</div>
						                          			<div class="form-group col-md-7">
						                          				<?php
						                          					if($_alumno[$_GET['id']]['hermano']=="Si"){
						                          						?>
						                          							<div class="col-md-2">
									                          					<input type="radio" name="hermano" id="h_si" value="Si" checked>
									                              				<label for="h_si" class="personal_radio">Sí</label>
									                          				</div>
									                          				<div class="col-md-2">
									                          					<input type="radio" name="hermano" id="h_no" value="No">
									                              				<label for="h_no" class="personal_radio">No</label>
									                          				</div>
						                          						<?php
						                          					}else if($_alumno[$_GET['id']]['hermano']=="No"){
						                          						?>
						                          							<div class="col-md-2">
									                          					<input type="radio" name="hermano" id="h_si" value="Si">
									                              				<label for="h_si" class="personal_radio">Sí</label>
									                          				</div>
									                          				<div class="col-md-2">
									                          					<input type="radio" name="hermano" id="h_no" value="No" checked>
									                              				<label for="h_no" class="personal_radio">No</label>
									                          				</div>
						                          						<?php
						                          					}else{
						                          						?>
						                          							<div class="col-md-2">
									                          					<input type="radio" name="hermano" id="h_si" value="Si">
									                              				<label for="h_si" class="personal_radio">Sí</label>
									                          				</div>
									                          				<div class="col-md-2">
									                          					<input type="radio" name="hermano" id="h_no" value="No">
									                              				<label for="h_no" class="personal_radio">No</label>
									                          				</div>
						                          						<?php
						                          					}
						                          				?>
						                          			</div>
						                          		</div>
						                          		<div class="col-md-12 personalizado" style="margin-top: -10px !important;">
						                          			<div class="form-group col-md-5">
						                          				¿Quién será el representante legal del estudiante?
						                          			</div>
						                          			<div class="col-md-7">
							                          			<?php
							                          				if($_alumno[$_GET['id']]['repre']=="Madre"){
							                          					?>
							                          						<div class="form-group col-md-3">
									                          					<input type="radio" class="radio" name="representante" id="madre" value="Madre" checked>
									                              				<label for="madre" class="personal_radio">Madre</label>
									                          				</div>
									                          				<div class="form-group col-md-3">
									                          					<input type="radio" class="radio" name="representante" id="padre" value="Padre">
									                              				<label for="padre" class="personal_radio">Padre</label>
									                          				</div>
									                          				<div class="form-group col-md-3">
									                          					<input type="radio" class="radio" name="representante" id="otro" value="Sí">
									                              				<label for="otro" class="personal_radio">Otro</label>
									                          				</div>
							                          					<?php
							                          				}else if($_alumno[$_GET['id']]['repre']=="Padre"){
							                          					?>
							                          						<div class="form-group col-md-3">
									                          					<input type="radio" class="radio" name="representante" id="madre" value="Madre">
									                              				<label for="madre" class="personal_radio">Madre</label>
									                          				</div>
									                          				<div class="form-group col-md-3">
									                          					<input type="radio" class="radio" name="representante" id="padre" value="Padre" checked>
									                              				<label for="padre" class="personal_radio">Padre</label>
									                          				</div>
									                          				<div class="form-group col-md-3">
									                          					<input type="radio" class="radio" name="representante" id="otro" value="Sí">
									                              				<label for="otro" class="personal_radio">Otro</label>
									                          				</div>
							                          					<?php
							                          				}else if($_alumno[$_GET['id']]['repre']=="Otro"){
							                          					?>
							                          						<div class="form-group col-md-3">
									                          					<input type="radio" class="radio" name="representante" id="madre" value="Madre">
									                              				<label for="madre" class="personal_radio">Madre</label>
									                          				</div>
									                          				<div class="form-group col-md-3">
									                          					<input type="radio" class="radio" name="representante" id="padre" value="Padre">
									                              				<label for="padre" class="personal_radio">Padre</label>
									                          				</div>
									                          				<div class="form-group col-md-3">
									                          					<input type="radio" class="radio" name="representante" id="otro" value="Sí" checked>
									                              				<label for="otro" class="personal_radio">Otro</label>
									                          				</div>
							                          					<?php
							                          				}else{
							                          					?>
							                          						<div class="form-group col-md-3">
									                          					<input type="radio" class="radio" name="representante" id="madre" value="Madre">
									                              				<label for="madre" class="personal_radio">Madre</label>
									                          				</div>
									                          				<div class="form-group col-md-3">
									                          					<input type="radio" class="radio" name="representante" id="padre" value="Padre">
									                              				<label for="padre" class="personal_radio">Padre</label>
									                          				</div>
									                          				<div class="form-group col-md-3">
									                          					<input type="radio" class="radio" name="representante" id="otro" value="Sí">
									                              				<label for="otro" class="personal_radio">Otro</label>
									                          				</div>
							                          					<?php
							                          				}
							                          			?>
						                          			</div>
						                          		</div>
						                          		<?php
						                          			if($_alumno[$_GET['id']]['repre']=="Madre" || $_alumno[$_GET['id']]['repre']=="Padre"){
						                          				?>
						                          					<div class="form-group form-animate-text col-md-2">
								                            			<input type="text" class="form-text" name="especifique" id="especifique" disabled>
								                            			<span class="bar"></span>
								                            			<label>Especifique:</label>
									                          		</div>
									                          		<div class="col-md-6 personalizado" style="margin-top: 10px !important;">
									                          			<div class="form-group col-md-7">
									                          				¿Tiene permiso de la LOPNA?
									                          			</div>
									                          			<div class="form-group col-md-5">
									                          				<div class="col-md-6">
									                          					<input type="radio" name="lopna" id="lopna_si" value="Si" disabled>
									                              				<label for="lopna_si" class="personal_radio">Sí</label>
									                          				</div>
									                          				<div class="col-md-6">
									                          					<input type="radio" name="lopna" id="lopna_no" value="No" disabled>
									                              				<label for="lopna_no" class="personal_radio">No</label>
									                          				</div>
									                          			</div>
									                          		</div>
									                          		<div class="form-group form-animate-text col-md-3">
								                            			<input type="text" class="form-text dateAnimate" name="vencimiento" id="vencimiento" required autocomplete="off" onkeypress="return deshabilitarteclas(event)" disabled>
								                            			<span class="bar"></span>
								                            			<label>Fecha de Vencimiento:</label>
									                          		</div>
						                          				<?php
						                          			}else if($_alumno[$_GET['id']]['repre']=="Otro"){
						                          				?>
						                          					<div class="form-group form-animate-text col-md-2">
								                            			<input type="text" class="form-text" name="especifique" id="especifique" value="<?php echo $_alumno[$_GET['id']]['especifique'];?>">
								                            			<span class="bar"></span>
								                            			<label>Especifique:</label>
									                          		</div>
									                          		<?php
							                          					if($_alumno[$_GET['id']]['fec_lopna']!="0000-00-00"){
							                          						?>
							                          							<div class="col-md-6 personalizado" style="margin-top: 10px !important;">
												                          			<div class="form-group col-md-7">
												                          				¿Tiene permiso de la LOPNA?
												                          			</div>
												                          			<div class="form-group col-md-5">
												                          				<div class="col-md-6">
												                          					<input type="radio" name="lopna" id="lopna_si" value="Si" checked>
												                              				<label for="lopna_si" class="personal_radio">Sí</label>
												                          				</div>
												                          				<div class="col-md-6">
												                          					<input type="radio" name="lopna" id="lopna_no" value="No">
												                              				<label for="lopna_no" class="personal_radio">No</label>
												                          				</div>
												                          			</div>
												                          		</div>
												                          		<div class="form-group form-animate-text col-md-3">
											                            			<input type="text" class="form-text dateAnimate" name="vencimiento" id="vencimiento" required autocomplete="off" onkeypress="return deshabilitarteclas(event)" value="<?php echo date("d-m-Y", strtotime($_alumno[$_GET['id']]['fec_lopna']));?>">
											                            			<span class="bar"></span>
											                            			<label>Fecha de Vencimiento:</label>
												                          		</div>
							                          						<?php
							                          					}else{
							                          						?>
							                          							<div class="col-md-6 personalizado" style="margin-top: 10px !important;">
												                          			<div class="form-group col-md-7">
												                          				¿Tiene permiso de la LOPNA?
												                          			</div>
												                          			<div class="form-group col-md-5">
												                          				<div class="col-md-6">
												                          					<input type="radio" name="lopna" id="lopna_si" value="Si">
												                              				<label for="lopna_si" class="personal_radio">Sí</label>
												                          				</div>
												                          				<div class="col-md-6">
												                          					<input type="radio" name="lopna" id="lopna_no" value="No" checked>
												                              				<label for="lopna_no" class="personal_radio">No</label>
												                          				</div>
												                          			</div>
												                          		</div>
												                          		<div class="form-group form-animate-text col-md-3">
											                            			<input type="text" class="form-text dateAnimate" name="vencimiento" id="vencimiento" required autocomplete="off" onkeypress="return deshabilitarteclas(event)" disabled>
											                            			<span class="bar"></span>
											                            			<label>Fecha de Vencimiento:</label>
												                          		</div>
							                          						<?php
							                          					}
							                          				?>
						                          				<?php
						                          			}
						                          		?>
						                          		<div class="form-group form-animate-text col-md-12" style="margin-top: -10px !important;">
						                          			<div class="col-md-2">
						                            			<img style="width: 40%;" src="<?php echo RUTA_IMAGENES.$_alumno[$_GET['id']]['foto_carnet']?>">
						                          			</div>
						                          			<div class="col-md-2">
						                            			<label>Foto Carnet:</label>
						  									</div>
						  									<div class="col-md-8">
						                            			<input type="file" class="form-text" name="foto_carnet" id="foto_carnet">
						                          			</div>
						                          		</div>
						                          		<div class="form-group form-animate-text col-md-12" style="margin-top: -10px !important;">
						                          			<div class="col-md-2">
						                            			<img style="width: 40%;" src="<?php echo RUTA_IMAGENES.$_alumno[$_GET['id']]['foto_cedula']?>">
						                          			</div>
						                          			<div class="col-md-2">
						                            			<label>Foto de la Cédula:</label>
						  									</div>
						  									<div class="col-md-8">
						                            			<input type="file" class="form-text" name="foto_cedula" id="foto_cedula">
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
          					<div role="tabpanel" class="tab-pane fade" id="tabs-demo7-area2" aria-labelledby="tabs-demo7-area2">
            					<div class="col-md-12 top-20 padding-0">
                					<div class="col-md-12">
                    					<div class="panel">
                   							<div class="panel-body">
                    							<form class="cmxform" method="post" action="?view=alumno&mode=EditRepresentantes&id=<?php echo $_GET['id']?>">
                    								<div class="form-group form-animate-text col-md-12" style="margin-top: -10px !important;">               	
					                            		<select class="form-control" name="madre" id="madre">
						                               		<?php
						                               			foreach($_madre as $_madre){
						                               				if($_madre['id_madre']==$_alumno[$_GET['id']]['id_madre']){
						                              					if($_madre['id_madre']==""){
						                              						?>
							                                					<option selected value="">Seleccione</option>
						    	                            				<?php
						                              					}else{
						                              						?>
							                                					<option selected value="<?php echo $_madre['id_madre'];?>"><?php echo $_madre['cedula']." ".$_madre['nombres']." ".$_madre['apellidos'];?></option>
						    	                            				<?php
						                              					}
					        	                      				}else if($_madre['id_madre']!=$_alumno[$_GET['id']]['id_madre']){
					            	                  					if($_madre['id_madre']==""){
						                              						?>
							                                					<option value="">Seleccione</option>
						    	                            				<?php
						                              					}else{
						                              						?>
							                                					<option value="<?php echo $_madre['id_madre'];?>"><?php echo $_madre['cedula']." ".$_madre['nombres']." ".$_madre['apellidos'];?></option>
						    	                            				<?php
						                              					}
					                        	      				}
						                               			}
						                               		?>
						                               	</select>
						                               	<span class="bar"></span>
					                            		<label style="top: -18px;font-size: 14px;color: #999C9E;">Madre:</label>
					                              	</div>
					                              	<div class="form-group form-animate-text col-md-12" style="margin-top: -10px !important;">               	
					                            		<select class="form-control" name="padre" id="padre">
						                               		<?php
						                               			foreach($_padre as $_padre){
						                               				if($_padre['id_padre']==$_alumno[$_GET['id']]['id_padre']){
						                              					if($_padre['id_padre']==""){
						                              						?>
							                                					<option selected value="">Seleccione</option>
						    	                            				<?php
						                              					}else{
						                              						?>
							                                					<option selected value="<?php echo $_padre['id_padre'];?>"><?php echo $_padre['cedula']." ".$_padre['nombres']." ".$_padre['apellidos'];?></option>
						    	                            				<?php
						                              					}
					        	                      				}else if($_padre['id_padre']!=$_alumno[$_GET['id']]['id_padre']){
					            	                  					if($_padre['id_padre']==""){
						                              						?>
							                                					<option value="">Seleccione</option>
						    	                            				<?php
						                              					}else{
						                              						?>
							                                					<option value="<?php echo $_padre['id_padre'];?>"><?php echo $_padre['cedula']." ".$_padre['nombres']." ".$_padre['apellidos'];?></option>
						    	                            				<?php
						                              					}
					                        	      				}
						                               			}
						                               		?>
						                               	</select>
						                               	<span class="bar"></span>
					                            		<label style="top: -18px;font-size: 14px;color: #999C9E;">Padre:</label>
					                              	</div>
					                              	<div class="form-group form-animate-text col-md-12" style="margin-top: -10px !important;">               	
					                            		<select class="form-control" name="legal" id="legal">
						                               		<?php
						                               			foreach($_legal as $_legal){
						                               				if($_legal['id_repre']==$_alumno[$_GET['id']]['id_repre']){
						                              					if($_legal['id_repre']==""){
						                              						?>
							                                					<option selected value="">Seleccione</option>
						    	                            				<?php
						                              					}else{
						                              						?>
							                                					<option selected value="<?php echo $_legal['id_repre'];?>"><?php echo $_legal['cedula']." ".$_legal['nombres']." ".$_legal['apellidos'];?></option>
						    	                            				<?php
						                              					}
					        	                      				}else if($_legal['id_repre']!=$_alumno[$_GET['id']]['id_repre']){
					            	                  					if($_legal['id_repre']==""){
						                              						?>
							                                					<option value="">Seleccione</option>
						    	                            				<?php
						                              					}else{
						                              						?>
							                                					<option value="<?php echo $_legal['id_repre'];?>"><?php echo $_legal['cedula']." ".$_legal['nombres']." ".$_legal['apellidos'];?></option>
						    	                            				<?php
						                              					}
					                        	      				}
						                               			}
						                               		?>
						                               	</select>
						                               	<span class="bar"></span>
					                            		<label style="top: -18px;font-size: 14px;color: #999C9E;">Representante Legal:</label>
					                              	</div>
					                              	<div class="form-group form-animate-text col-md-12" style="margin-top: -10px !important;">               	
					                            		<select class="form-control" name="suplente" id="suplente">
						                               		<?php
						                               			foreach($_suplente as $_suplente){
						                               				if($_suplente['id_repre_sup']==$_alumno[$_GET['id']]['id_repre_sup']){
						                              					if($_suplente['id_repre_sup']==""){
						                              						?>
							                                					<option selected value="">Seleccione</option>
						    	                            				<?php
						                              					}else{
						                              						?>
							                                					<option selected value="<?php echo $_suplente['id_repre_sup'];?>"><?php echo $_suplente['cedula']." ".$_suplente['nombres']." ".$_suplente['apellidos'];?></option>
						    	                            				<?php
						                              					}
					        	                      				}else if($_suplente['id_repre_sup']!=$_alumno[$_GET['id']]['id_repre_sup']){
					            	                  					if($_suplente['id_repre_sup']==""){
						                              						?>
							                                					<option value="">Seleccione</option>
						    	                            				<?php
						                              					}else{
						                              						?>
							                                					<option value="<?php echo $_suplente['id_repre_sup'];?>"><?php echo $_suplente['cedula']." ".$_suplente['nombres']." ".$_suplente['apellidos'];?></option>
						    	                            				<?php
						                              					}
					                        	      				}
						                               			}
						                               		?>
						                               	</select>
						                               	<span class="bar"></span>
					                            		<label style="top: -18px;font-size: 14px;color: #999C9E;">Representante Legal:</label>
					                              	</div>
					                              	<div class="col-md-12">
					                              		<div class="form-group form-animate-checkbox"></div>
					                                	<input class="submit btn btn-teal" type="submit" value="Guardar">
					                        		</div>
					                    		</form>
                  							</div>
                						</div>
              						</div>  
            					</div>
          					</div>
          					<div role="tabpanel" class="tab-pane fade" id="tabs-demo7-area3" aria-labelledby="tabs-demo7-area3">
            					<div class="col-md-12 top-20 padding-0">
                					<div class="col-md-12">
                    					<div class="panel">
                   							<div class="panel-body">
                   								<form class="cmxform" method="post" action="?view=alumno&mode=EditMedico&id=<?php echo $_GET['id']?>" id="medicos">
                   									<div class="form-group form-animate-text col-md-4" >                            
									                    <select class="form-control" name="sangre" id="sangre">
									                      <?php
									                        foreach($_sangre as $sangre){
									                        	if($sangre['id_tipo_sangre']==$_medico[$_GET['id']]['id_tipo_sangre']){
									                        		if($sangre['id_tipo_sangre']==1){
											                            ?>
											                              	<option selected value="<?php echo $sangre['id_tipo_sangre'];?>">Seleccione</option>
											                            <?php
											                        }else{
											                            ?>
											                              	<option selected value="<?php echo $sangre['id_tipo_sangre'];?>"><?php echo $sangre['sangre'];?></option>
											                            <?php
											                        }
									                        	}else{
									                        		if($sangre['id_tipo_sangre']==1){
											                            ?>
											                              	<option value="<?php echo $sangre['id_tipo_sangre'];?>">Seleccione</option>
											                            <?php
											                        }else{
											                            ?>
											                              	<option value="<?php echo $sangre['id_tipo_sangre'];?>"><?php echo $sangre['sangre'];?></option>
											                            <?php
											                        }
									                        	}
									                        }
									                      ?>
									                    </select>
									                    <span class="bar"></span>
									                    <label for="sangre" style="top: -18px;font-size: 14px;color: #999C9E;">Grupo Sanguíneo:</label>
									                 </div>
									                 <div class="form-group form-animate-text col-md-4" >                            
									                    <select class="form-control" name="lateralidad" id="lateralidad">
									                      	<?php
									                        	if($_medico[$_GET['id']]['lateralidad']=='Diestro'){
									                        		?>
									                        			<option value="">Seleccione</option>
													                    <option selected value="Diestro">Diestro</option>
													                    <option value="Zurdo">Zurdo</option>
													                    <option value="Ambidiestro">Ambidiestro</option>
									                        		<?php
									                        	}else if($_medico[$_GET['id']]['lateralidad']=='Zurdo'){
									                        		?>
									                        			<option value="">Seleccione</option>
													                    <option value="Diestro">Diestro</option>
													                    <option selected value="Zurdo">Zurdo</option>
													                    <option value="Ambidiestro">Ambidiestro</option>
									                        		<?php
									                        	}else if($_medico[$_GET['id']]['lateralidad']=='Ambidiestro'){
									                        		?>
									                        			<option value="">Seleccione</option>
													                    <option value="Diestro">Diestro</option>
													                    <option value="Zurdo">Zurdo</option>
													                    <option selected value="Ambidiestro">Ambidiestro</option>
									                        		<?php
									                        	}else{
									                        		?>
									                        			<option selected value="">Seleccione</option>
													                    <option value="Diestro">Diestro</option>
													                    <option value="Zurdo">Zurdo</option>
													                    <option value="Ambidiestro">Ambidiestro</option>
									                        		<?php
									                        	}
									                      	?>
									                    </select>
									                    <span class="bar"></span>
									                    <label for="lateralidad" style="top: -18px;font-size: 14px;color: #999C9E;">Lateralidad:</label>
									                </div>
									                <div class="col-md-4 personalizado">
                    									<div class="col-md-5">
                     										<label style="font-size: 14px;color: #999C9E;">Usa Lentes:</label>
                    									</div>
                    									<div class="col-md-7">
                    										<?php
                    											if($_medico[$_GET['id']]['lentes']=='Si'){
                    												?>
                    													<div class="form-group col-md-6">
			                        										<input type="radio" class="radio" name="lentes" id="lentes_si" checked value="Si">
			                        										<label for="lentes_si" class="personal_radio">Sí</label>
													                    </div>
													                    <div class="form-group col-md-6">
													                        <input type="radio" class="radio" name="lentes" id="lentes_no" value="No">
													                        <label for="lentes_no" class="personal_radio">No</label>
													                    </div>
                    												<?php
                    											}else if($_medico[$_GET['id']]['lentes']=='No'){
                    												?>
                    													<div class="form-group col-md-6">
			                        										<input type="radio" class="radio" name="lentes" id="lentes_si" value="Si">
			                        										<label for="lentes_si" class="personal_radio">Sí</label>
													                    </div>
													                    <div class="form-group col-md-6">
													                        <input type="radio" class="radio" name="lentes" id="lentes_no" checked value="No">
													                        <label for="lentes_no" class="personal_radio">No</label>
													                    </div>
                    												<?php
                    											}else{
                    												?>
                    													<div class="form-group col-md-6">
			                        										<input type="radio" class="radio" name="lentes" id="lentes_si" value="Si">
			                        										<label for="lentes_si" class="personal_radio">Sí</label>
													                    </div>
													                    <div class="form-group col-md-6">
													                        <input type="radio" class="radio" name="lentes" id="lentes_no" value="No">
													                        <label for="lentes_no" class="personal_radio">No</label>
													                    </div>
                    												<?php
                    											}
                    										?>
										                </div>
										            </div>
										            <div class="col-md-12" style="top: -20px;">
								                    	<p style="border-top: 1px solid #999C9E !important;"></p>
								                  	</div>
								                  	<div class="col-md-4 personalizado" style="clear: both;">
								                    	<div class="col-md-5">
								                      		<label style="font-size: 14px;color: #999C9E;">Oye Bien:</label>
								                    	</div>
								                    	<div class="col-md-7">
								                    		<?php
								                    			if($_medico[$_GET['id']]['oido']=='Si'){
								                    				?>
								                    					<div class="form-group col-md-6">
											                        		<input type="radio" class="radio" name="oido" id="oido_si" checked value="Si">
											                        		<label for="oido_si" class="personal_radio">Sí</label>
											                      		</div>
											                      		<div class="form-group col-md-6">
											                        		<input type="radio" class="radio" name="oido" id="oido_no" value="No">
											                        		<label for="oido_no" class="personal_radio">No</label>
											                      		</div>
								                    				<?php
								                    			}else if($_medico[$_GET['id']]['oido']=='No'){
								                    				?>
								                    					<div class="form-group col-md-6">
											                        		<input type="radio" class="radio" name="oido" id="oido_si" value="Si">
											                        		<label for="oido_si" class="personal_radio">Sí</label>
											                      		</div>
											                      		<div class="form-group col-md-6">
											                        		<input type="radio" class="radio" name="oido" id="oido_no" checked value="No">
											                        		<label for="oido_no" class="personal_radio">No</label>
											                      		</div>
								                    				<?php
								                    			}else{
								                    				?>
								                    					<div class="form-group col-md-6">
											                        		<input type="radio" class="radio" name="oido" id="oido_si" value="Si">
											                        		<label for="oido_si" class="personal_radio">Sí</label>
											                      		</div>
											                      		<div class="form-group col-md-6">
											                        		<input type="radio" class="radio" name="oido" id="oido_no" value="No">
											                        		<label for="oido_no" class="personal_radio">No</label>
											                      		</div>
								                    				<?php
								                    			}
								                    		?>
								                    	</div>
								                  	</div>
								                  	<div class="col-md-8 personalizado">
								                    	<div class="col-md-4">
								                      		<label style="font-size: 14px;color: #999C9E;">Seleccione si ha sufrido:</label>
								                    	</div>
								                    	<div class="col-md-8">
								                      		<div class="form-group col-md-4">
								                      			<?php
								                      				if($_medico[$_GET['id']]['sarampion']=="Si"){
								                      					?>
								                      						<input type="checkbox" class="checkbox" name="sarampion" id="sarampion" checked value="Si">
								                      					<?php
								                      				}else{
								                      					?>
								                      						<input type="checkbox" class="checkbox" name="sarampion" id="sarampion" value="Si">
								                      					<?php
								                      				}
								                      			?>
								                        		<label for="sarampion" class="personal_radio">Sarampión</label>
								                      		</div>
								                      		<div class="form-group col-md-4">
								                      			<?php
								                      				if($_medico[$_GET['id']]['rubeola']=="Si"){
								                      					?>
								                      						<input type="checkbox" class="checkbox" name="rubeola" id="rubeola" checked value="Si">
								                      					<?php
								                      				}else{
								                      					?>
								                      						<input type="checkbox" class="checkbox" name="rubeola" id="rubeola" value="Si">
								                      					<?php
								                      				}
								                      			?>
										                        <label for="rubeola" class="personal_radio">Rubéola</label>
								                      		</div>
								                      		<div class="form-group col-md-4">
								                      			<?php
								                      				if($_medico[$_GET['id']]['paperas']=="Si"){
								                      					?>
								                      						<input type="checkbox" class="checkbox" name="paperas" id="paperas" checked value="Si">
								                      					<?php
								                      				}else{
								                      					?>
								                      						<input type="checkbox" class="checkbox" name="paperas" id="paperas" value="Si">
								                      					<?php
								                      				}
								                      			?>
										                        <label for="paperas" class="personal_radio">Paperas</label>
								                      		</div>
								                    	</div>
								                  	</div>
								                  	<div class="col-md-12">
								                    	<p style="border-top: 1px solid #999C9E !important;"></p>
								                  	</div>
								                  	<div class="col-md-12 personalizado">
									                    <div class="col-md-12">
									                      	<label style="font-size: 14px;color: #999C9E; text-align: justify;">Seleccione si sufre o tiene antecedentes de algunas de estas afecciones médicas:</label>
									                    </div>
									                    <div class="col-md-12">
									                      	<div class="form-group col-md-4">
									                      		<?php
									                      			if($_medico[$_GET['id']]['diabetes']=="Si"){
									                      				?>
									                      					<input type="checkbox" class="checkbox" name="diabetes" id="diabetes" checked value="Si">
									                      				<?php
									                      			}else{
									                      				?>
									                      					<input type="checkbox" class="checkbox" name="diabetes" id="diabetes" value="Si">
									                      				<?php
									                      			}
									                      		?>
									                        	<label for="diabetes" class="personal_radio">Diabetes</label>
									                      	</div>
									                      	<div class="form-group col-md-4">
									                      		<?php
									                      			if($_medico[$_GET['id']]['hipertension']=="Si"){
									                      				?>
									                      					<input type="checkbox" class="checkbox" name="hipertension" id="hipertension" checked value="Si">
									                      				<?php
									                      			}else{
									                      				?>
									                      					<input type="checkbox" class="checkbox" name="hipertension" id="hipertension" value="Si">
									                      				<?php
									                      			}
									                      		?>
										                        <label for="hipertension" class="personal_radio">Hipertensión</label>
									                      	</div>
									                      	<div class="form-group col-md-4">
									                      		<?php
									                      			if($_medico[$_GET['id']]['cardiopatia']=="Si"){
									                      				?>
									                      					<input type="checkbox" class="checkbox" name="cardiopatia" id="cardiopatia" checked value="Si">
									                      				<?php
									                      			}else{
									                      				?>
									                      					<input type="checkbox" class="checkbox" name="cardiopatia" id="cardiopatia" value="Si">
									                      				<?php
									                      			}
									                      		?>
										                        <label for="cardiopatia" class="personal_radio">Cardipatía</label>
									                      	</div>
									                      	<div class="form-group col-md-4">
									                      		<?php
									                      			if($_medico[$_GET['id']]['asma']=="Si"){
									                      				?>
									                      					<input type="checkbox" class="checkbox" name="asma" id="asma" checked value="Si">
									                      				<?php
									                      			}else{
									                      				?>
									                      					<input type="checkbox" class="checkbox" name="asma" id="asma" value="Si">
									                      				<?php
									                      			}
									                      		?>
										                        <label for="asma" class="personal_radio">Asma</label>
									                      	</div>
									                      	<div class="form-group col-md-4">
									                      		<?php
									                      			if($_medico[$_GET['id']]['alergias']=="Si"){
									                      				?>
									                      					<input type="checkbox" class="checkbox" name="alergias" id="alergias" checked value="Si">
									                      				<?php
									                      			}else{
									                      				?>
									                      					<input type="checkbox" class="checkbox" name="alergias" id="alergias" value="Si">
									                      				<?php
									                      			}
									                      		?>
										                        <label for="alergias" class="personal_radio">Alergías</label>
									                      	</div>
									                      	<div class="form-group form-animate-text col-md-4" style="margin-top: -10px !important;">
										                        <input type="text" class="form-text" name="otras" id="otras" value="<?php echo $_medico[$_GET['id']]['descrip_otras'];?>">
										                        <span class="bar"></span>
									                        	<label for="otras">Otras:</label>
									                      	</div>
									                    </div>
									                </div>
									                <div class="col-md-12" style="top: -10px;">
								                    	<p style="border-top: 1px solid #999C9E !important;"></p>
								                  	</div>
								                  	<div class="col-md-12 personalizado">
								                    	<div class="col-md-12">
								                      		<div class="col-md-4" style="top: 15px;">
								                        		<label for="diversidad" style="font-size: 14px;color: #999C9E; text-align: justify;">Presenta alguna diversidad funcional:</label>
								                      		</div>
								                      		<div class="form-group form-animate-text col-md-8">
										                        <input type="text" class="form-text" name="diversidad" id="diversidad" value="<?php echo $_medico[$_GET['id']]['diversidad'];?>">
										                        <span class="bar"></span>
								                      		</div>
								                    	</div>
								                  	</div>
								                  	<div class="col-md-12" style="top: -10px;">
								                    	<p style="border-top: 1px solid #999C9E !important;"></p>
								                  	</div>
								                  	<div class="col-md-12 personalizado">
								                    	<div class="col-md-12">
								                      		<label style="font-size: 14px;color: #999C9E; text-align: justify;">Ha sido tratado por algunos de estos especialistas:</label>
								                    	</div>
								                    	<div class="col-md-12">
								                      		<div class="form-group col-md-3">
								                      			<?php
								                      				if($_medico[$_GET['id']]['psicolo1']=="Si"){
								                      					?>
								                      						<input type="checkbox" class="checkbox" name="psicologo1" id="psicologo1" checked value="Si">
								                      					<?php
								                      				}else{
								                      					?>
								                      						<input type="checkbox" class="checkbox" name="psicologo1" id="psicologo1" value="Si">
								                      					<?php
								                      				}
								                      			?>
										                        <label for="psicologo1" class="personal_radio">Psicólogo</label>
								                      		</div>
								                      		<div class="form-group col-md-3">
								                      			<?php
								                      				if($_medico[$_GET['id']]['tera_lengua1']=="Si"){
								                      					?>
								                      						<input type="checkbox" class="checkbox" name="tera_lenguaje1" id="tera_lenguaje1" checked value="Si">
								                      					<?php
								                      				}else{
								                      					?>
								                      						<input type="checkbox" class="checkbox" name="tera_lenguaje1" id="tera_lenguaje1" value="Si">
								                      					<?php
								                      				}
								                      			?>
										                        <label for="tera_lenguaje1" class="personal_radio">Terapista de Lenguaje</label>
								                      		</div>
								                      		<div class="form-group col-md-3">
								                      			<?php
								                      				if($_medico[$_GET['id']]['neurolo1']=="Si"){
								                      					?>
								                      						<input type="checkbox" class="checkbox" name="neurologo1" id="neurologo1" checked value="Si">
								                      					<?php
								                      				}else{
								                      					?>
								                      						<input type="checkbox" class="checkbox" name="neurologo1" id="neurologo1" value="Si">
								                      					<?php
								                      				}
								                      			?>
										                        <label for="neurologo1" class="personal_radio">Neurólogo</label>
								                      		</div>
								                      		<div class="form-group col-md-3">
								                      			<?php
								                      				if($_medico[$_GET['id']]['tera_ocup1']=="Si"){
								                      					?>
								                      						<input type="checkbox" class="checkbox" name="tera_ocupacional1" id="tera_ocupacional1" checked value="Si">
								                      					<?php
								                      				}else{
								                      					?>
								                      						<input type="checkbox" class="checkbox" name="tera_ocupacional1" id="tera_ocupacional1" value="Si">
								                      					<?php
								                      				}
								                      			?>
										                        <label for="tera_ocupacional1" class="personal_radio">Terapia Ocupacional</label>
								                      		</div>
								                      		<div class="form-group col-md-3">
								                      			<?php
								                      				if($_medico[$_GET['id']]['psiquiatria1']=="Si"){
								                      					?>
								                      						<input type="checkbox" class="checkbox" name="psiquiatria1" id="psiquiatria1" checked value="Si">
								                      					<?php
								                      				}else{
								                      					?>
								                      						<input type="checkbox" class="checkbox" name="psiquiatria1" id="psiquiatria1" value="Si">
								                      					<?php
								                      				}
								                      			?>
										                        <label for="psiquiatria1" class="personal_radio">Psiquiatría</label>
								                      		</div>
								                      		<div class="form-group col-md-3">
								                      			<?php
								                      				if($_medico[$_GET['id']]['odontologia1']=="Si"){
								                      					?>
								                      						<input type="checkbox" class="checkbox" name="odontologia1" id="odontologia1" checked value="Si">
								                      					<?php
								                      				}else{
								                      					?>
								                      						<input type="checkbox" class="checkbox" name="odontologia1" id="odontologia1" value="Si">
								                      					<?php
								                      				}
								                      			?>
										                        <label for="odontologia1" class="personal_radio">Odontología</label>
								                      		</div>
								                      		<div class="form-group col-md-2">
								                      			<?php
								                      				if($_medico[$_GET['id']]['dermatologia1']=="Si"){
								                      					?>
								                      						<input type="checkbox" class="checkbox" name="dermatologia1" id="dermatologia1" checked value="Si">
								                      					<?php
								                      				}else{
								                      					?>
								                      						<input type="checkbox" class="checkbox" name="dermatologia1" id="dermatologia1" value="Si">
								                      					<?php
								                      				}
								                      			?>
										                        <label for="dermatologia1" class="personal_radio">Dermatología</label>
								                      		</div>
								                      		<div class="form-group col-md-2">
								                      			<?php
								                      				if($_medico[$_GET['id']]['fisiatria1']=="Si"){
								                      					?>
								                      						<input type="checkbox" class="checkbox" name="fisiatria1" id="fisiatria1" checked value="Si">
								                      					<?php
								                      				}else{
								                      					?>
								                      						<input type="checkbox" class="checkbox" name="fisiatria1" id="fisiatria1" value="Si">
								                      					<?php
								                      				}
								                      			?>
										                        <label for="fisiatria1" class="personal_radio">Fisiatría</label>
								                      		</div>
								                      		<div class="form-group col-md-2">
								                      			<?php
								                      				if($_medico[$_GET['id']]['psicopedagogia1']=="Si"){
								                      					?>
								                      						<input type="checkbox" class="checkbox" name="psicopedagogia1" id="psicopedagogia1" checked value="Si">
								                      					<?php
								                      				}else{
								                      					?>
								                      						<input type="checkbox" class="checkbox" name="psicopedagogia1" id="psicopedagogia1" value="Si">
								                      					<?php
								                      				}
								                      			?>
										                        <label for="psicopedagogia1" class="personal_radio">Psicopedagodía</label>
								                      		</div>
								                      		<div class="form-group form-animate-text col-md-12">
										                        <input type="text" class="form-text" name="otros1" id="otros1" value="<?php echo $_medico[$_GET['id']]['otro_esp1'];?>">
										                        <span class="bar"></span>
										                        <label for="otros1">Otro(s):</label>
								                      		</div>
								                    	</div>
								                  	</div>
								                  	<div class="col-md-12" style="top: -10px;">
								                    	<p style="border-top: 1px solid #999C9E !important;"></p>
								                  	</div>
								                  	<div class="col-md-12 personalizado">
								                    	<div class="col-md-12">
								                      		<label style="font-size: 14px;color: #999C9E; text-align: justify;">Está siendo tratado por algún especialistas:</label>
								                    	</div>
								                    	<div class="col-md-12">
								                      		<div class="form-group col-md-3">
								                      			<?php
								                      				if($_medico[$_GET['id']]['psicolo2']=="Si"){
								                      					?>
								                      						<input type="checkbox" class="checkbox" name="psicologo2" id="psicologo2" checked value="Si">
								                      					<?php
								                      				}else{
								                      					?>
								                      						<input type="checkbox" class="checkbox" name="psicologo2" id="psicologo2" value="Si">
								                      					<?php
								                      				}
								                      			?>
										                        <label for="psicologo2" class="personal_radio">Psicólogo</label>
								                      		</div>
								                      		<div class="form-group col-md-3">
								                      			<?php
								                      				if($_medico[$_GET['id']]['tera_lengua2']=="Si"){
								                      					?>
								                      						<input type="checkbox" class="checkbox" name="tera_lenguaje2" id="tera_lenguaje2" checked value="Si">
								                      					<?php
								                      				}else{
								                      					?>
								                      						<input type="checkbox" class="checkbox" name="tera_lenguaje2" id="tera_lenguaje2" value="Si">
								                      					<?php
								                      				}
								                      			?>
										                        <label for="tera_lenguaje2" class="personal_radio">Terapista de Lenguaje</label>
								                      		</div>
								                      		<div class="form-group col-md-3">
								                      			<?php
								                      				if($_medico[$_GET['id']]['neurolo2']=="Si"){
								                      					?>
								                      						<input type="checkbox" class="checkbox" name="neurologo2" id="neurologo2" checked value="Si">
								                      					<?php
								                      				}else{
								                      					?>
								                      						<input type="checkbox" class="checkbox" name="neurologo2" id="neurologo2" value="Si">
								                      					<?php
								                      				}
								                      			?>
										                        <label for="neurologo2" class="personal_radio">Neurólogo</label>
								                      		</div>
								                      		<div class="form-group col-md-3">
								                      			<?php
								                      				if($_medico[$_GET['id']]['tera_ocup2']=="Si"){
								                      					?>
								                      						<input type="checkbox" class="checkbox" name="tera_ocupacional2" id="tera_ocupacional2" checked value="Si">
								                      					<?php
								                      				}else{
								                      					?>
								                      						<input type="checkbox" class="checkbox" name="tera_ocupacional2" id="tera_ocupacional2" value="Si">
								                      					<?php
								                      				}
								                      			?>
										                        <label for="tera_ocupacional2" class="personal_radio">Terapia Ocupacional</label>
								                      		</div>
								                      		<div class="form-group col-md-3">
								                      			<?php
								                      				if($_medico[$_GET['id']]['psiquiatria2']=="Si"){
								                      					?>
								                      						<input type="checkbox" class="checkbox" name="psiquiatria2" id="psiquiatria2" checked value="Si">
								                      					<?php
								                      				}else{
								                      					?>
								                      						<input type="checkbox" class="checkbox" name="psiquiatria2" id="psiquiatria2" value="Si">
								                      					<?php
								                      				}
								                      			?>
										                        <label for="psiquiatria2" class="personal_radio">Psiquiatría</label>
								                      		</div>
								                      		<div class="form-group col-md-3">
								                      			<?php
								                      				if($_medico[$_GET['id']]['odontologia2']=="Si"){
								                      					?>
								                      						<input type="checkbox" class="checkbox" name="odontologia2" id="odontologia2" checked value="Si">
								                      					<?php
								                      				}else{
								                      					?>
								                      						<input type="checkbox" class="checkbox" name="odontologia2" id="odontologia2" value="Si">
								                      					<?php
								                      				}
								                      			?>
										                        <label for="odontologia2" class="personal_radio">Odontología</label>
								                      		</div>
								                      		<div class="form-group col-md-2">
								                      			<?php
								                      				if($_medico[$_GET['id']]['dermatologia2']=="Si"){
								                      					?>
								                      						<input type="checkbox" class="checkbox" name="dermatologia2" id="dermatologia2" checked value="Si">
								                      					<?php
								                      				}else{
								                      					?>
								                      						<input type="checkbox" class="checkbox" name="dermatologia2" id="dermatologia2" value="Si">
								                      					<?php
								                      				}
								                      			?>
										                        <label for="dermatologia2" class="personal_radio">Dermatología</label>
								                      		</div>
								                      		<div class="form-group col-md-2">
								                      			<?php
								                      				if($_medico[$_GET['id']]['fisiatria2']=="Si"){
								                      					?>
								                      						<input type="checkbox" class="checkbox" name="fisiatria2" id="fisiatria2" checked value="Si">
								                      					<?php
								                      				}else{
								                      					?>
								                      						<input type="checkbox" class="checkbox" name="fisiatria2" id="fisiatria2" value="Si">
								                      					<?php
								                      				}
								                      			?>
										                        <label for="fisiatria2" class="personal_radio">Fisiatría</label>
								                      		</div>
								                      		<div class="form-group col-md-2">
								                      			<?php
								                      				if($_medico[$_GET['id']]['psicopedagogia2']=="Si"){
								                      					?>
								                      						<input type="checkbox" class="checkbox" name="psicopedagogia2" id="psicopedagogia2" checked value="Si">
								                      					<?php
								                      				}else{
								                      					?>
								                      						<input type="checkbox" class="checkbox" name="psicopedagogia2" id="psicopedagogia2" value="Si">
								                      					<?php
								                      				}
								                      			?>
										                        <label for="psicopedagogia2" class="personal_radio">Psicopedagodía</label>
								                      		</div>
								                      		<div class="form-group form-animate-text col-md-6">
										                        <input type="text" class="form-text" name="otros2" id="otros2" value="<?php echo $_medico[$_GET['id']]['otro_esp2'];?>">
										                        <span class="bar"></span>
										                        <label for="otros2">Otro(s):</label>
								                      		</div>
								                      		<div class="form-group form-animate-text col-md-6">
										                        <input type="text" class="form-text" name="tratamiento" id="tratamiento" value="<?php echo $_medico[$_GET['id']]['lugar_trata'];?>">
										                        <span class="bar"></span>
										                        <label for="tratamiento">Lugar de Tratamiento:</label>
								                      		</div>
								                    	</div>
								                  	</div>
								                  	<div class="col-md-12" style="top: -10px;">
								                   		<p style="border-top: 1px solid #999C9E !important;"></p>
								                  	</div>
								                  	<div class="form-group form-animate-text col-md-12">
								                    	<input type="text" class="form-text" name="medicado" id="medicado" value="<?php echo $_medico[$_GET['id']]['act_medicado'];?>">
								                    	<span class="bar"></span>
								                    	<label for="medicado">Se encuentra actualmente medicado:</label>
								                  	</div>
								                  	<div class="form-group form-animate-text col-md-12">
									                    <input type="text" class="form-text" name="impedimiento" id="impedimiento" value="<?php echo $_medico[$_GET['id']]['imp_depor'];?>">
									                    <span class="bar"></span>
									                    <label for="impedimiento">Tiene algún impedimiento para realizar Educación Física y Deportes:</label>
								                  	</div>
								                  	<div class="form-group form-animate-text col-md-12">
									                    <input type="text" class="form-text" name="seguro" id="seguro" value="<?php echo $_medico[$_GET['id']]['seg_med'];?>">
									                    <span class="bar"></span>
									                    <label for="seguro">Goza de seguro médico, indique cuál:</label>
								                  	</div>
								                	<div class="col-md-12">
								                    	<div class="form-group form-animate-checkbox"></div>
								                    	<input class="submit btn btn-teal" type="submit" value="Guardar">
								              		</div>
                   								</form>
                  							</div>
                						</div>
              						</div>  
            					</div>
          					</div>
          					<div role="tabpanel" class="tab-pane fade" id="tabs-demo7-area4" aria-labelledby="tabs-demo7-area4">
            					<div class="col-md-12 top-20 padding-0">
                					<div class="col-md-12">
                    					<div class="panel">
                   							<div class="panel-body">
                   								<script src="asset/js/general.js"></script>
                   								<form class="cmxform" method="post" action="?view=alumno&mode=EditGenerales&id=<?php echo $_GET['id'];?>">
                   									<div class="form-group form-animate-text col-md-12" style="margin-top: -10px !important;">
									                    <input type="text" class="form-text" name="extracurricular" id="extracurricular" value="<?php echo $_actitudes[$_GET['id']]['act_extra'];?>">
									                    <span class="bar"></span>
									                    <label for="extracurricular">Práctica alguna actividad extracurricular:</label>
									                </div>
									                <div class="col-md-12" style="top: -20px;">
								                    	<p style="border-top: 1px solid #999C9E !important;"></p>
								                  	</div>
								                  	<div class="col-md-12 personalizado">
									                    <div class="col-md-12">
									                      	<label style="font-size: 14px;color: #999C9E; text-align: justify;">Le gustaría practicar algunas de estas actividades deportivas y/o recreativas en la institución:</label>
									                    </div>
									                    <div class="col-md-12">
									                      	<div class="form-group col-md-3">
									                      		<?php
									                      			if($_actitudes[$_GET['id']]['voleibol']=='Si'){
									                      				?>
									                      					<input type="checkbox" class="checkbox" name="voleibol" id="voleibol" checked value="Si">
									                      				<?php
									                      			}else{
										                      			?>
										                      				<input type="checkbox" class="checkbox" name="voleibol" id="voleibol" value="Si">
										                      			<?php
									                      			}
									                      		?>
									                      		<label for="voleibol" class="personal_radio">Voleibol</label>
									                      	</div>
									                      	<div class="form-group col-md-3">
									                      		<?php
									                      			if($_actitudes[$_GET['id']]['basquet']=='Si'){
									                      				?>
									                      					<input type="checkbox" class="checkbox" name="basquetbol" id="basquetbol" checked value="Si">
									                      				<?php
									                      			}else{
										                      			?>
										                      				<input type="checkbox" class="checkbox" name="basquetbol" id="basquetbol" value="Si">
										                      			<?php
									                      			}
									                      		?>
									                      		<label for="basquetbol" class="personal_radio">Básquetbol</label>
									                      	</div>
									                      	<div class="form-group col-md-3">
									                      		<?php
									                      			if($_actitudes[$_GET['id']]['futbolito']=='Si'){
									                      				?>
									                      					<input type="checkbox" class="checkbox" name="futbolito" id="futbolito" checked value="Si">
									                      				<?php
									                      			}else{
										                      			?>
										                      				<input type="checkbox" class="checkbox" name="futbolito" id="futbolito" value="Si">
										                      			<?php
									                      			}
									                      		?>
									                      		<label for="futbolito" class="personal_radio">Futbolito</label>
									                      	</div>
									                      	<div class="form-group col-md-3">
									                      		<?php
									                      			if($_actitudes[$_GET['id']]['ajedrez']=='Si'){
									                      				?>
									                      					<input type="checkbox" class="checkbox" name="ajedrez" id="ajedrez" checked value="Si">
									                      				<?php
									                      			}else{
										                      			?>
										                      				<input type="checkbox" class="checkbox" name="ajedrez" id="ajedrez" value="Si">
										                      			<?php
									                      			}
									                      		?>
										                        <label for="ajedrez" class="personal_radio">Ajedrez</label>
									                      	</div>
									                      	<div class="form-group col-md-3">
									                      		<?php
									                      			if($_actitudes[$_GET['id']]['danza']=='Si'){
									                      				?>
									                      					<input type="checkbox" class="checkbox" name="danza" id="danza" checked value="Si">
									                      				<?php
									                      			}else{
										                      			?>
										                      				<input type="checkbox" class="checkbox" name="danza" id="danza" value="Si">
										                      			<?php
									                      			}
									                      		?>
										                        <label for="danza" class="personal_radio">Danza</label>
									                      	</div>
									                      	<div class="form-group col-md-3">
									                      		<?php
									                      			if($_actitudes[$_GET['id']]['teatro']=='Si'){
									                      				?>
									                      					<input type="checkbox" class="checkbox" name="teatro" id="teatro" checked value="Si">
									                      				<?php
									                      			}else{
										                      			?>
										                      				<input type="checkbox" class="checkbox" name="teatro" id="teatro" value="Si">
										                      			<?php
									                      			}
									                      		?>
										                        <label for="teatro" class="personal_radio">Teatro</label>
									                      	</div>
									                      	<div class="form-group col-md-3">
									                      		<?php
									                      			if($_actitudes[$_GET['id']]['musica']=='Si'){
									                      				?>
									                      					<input type="checkbox" class="checkbox" name="musica" id="musica" checked value="Si">
									                      				<?php
									                      			}else{
										                      			?>
										                      				<input type="checkbox" class="checkbox" name="musica" id="musica" value="Si">
										                      			<?php
									                      			}
									                      		?>
										                        <label for="musica" class="personal_radio">Música</label>
									                      	</div>
									                    </div>
									                </div>
									                <div class="col-md-12" style="top: -10px;">
								                    	<p style="border-top: 1px solid #999C9E !important;"></p>
								                  	</div>
								                  	<div class="col-md-12 personalizado">
								                    	<div class="col-md-12">
								                      		<label style="font-size: 14px;color: #999C9E; text-align: justify;">A cuál de  los siguientes voluntariados le gustaría pertenecer:</label>
								                    	</div>
								                    	<div class="col-md-12">
									                      	<div class="form-group col-md-4">
									                      		<?php
									                      			if($_actitudes[$_GET['id']]['soc_boliv']=='Si'){
									                      				?>
									                      					<input type="checkbox" class="checkbox" name="bolivariana" id="bolivariana" checked value="Si">
									                      				<?php
									                      			}else{
										                      			?>
										                      				<input type="checkbox" class="checkbox" name="bolivariana" id="bolivariana" value="Si">
										                      			<?php
									                      			}
									                      		?>
										                        <label for="bolivariana" class="personal_radio">Sociedad Bolivariana</label>
									                      	</div>
									                      	<div class="form-group col-md-4">
									                      		<?php
									                      			if($_actitudes[$_GET['id']]['cruz_roja']=='Si'){
									                      				?>
									                      					<input type="checkbox" class="checkbox" name="cruz" id="cruz" checked value="Si">
									                      				<?php
									                      			}else{
										                      			?>
										                      				<input type="checkbox" class="checkbox" name="cruz" id="cruz" value="Si">
										                      			<?php
									                      			}
									                      		?>
										                        <label for="cruz" class="personal_radio">Cruz Roja</label>
									                      	</div>
									                      	<div class="form-group col-md-4">
									                      		<?php
									                      			if($_actitudes[$_GET['id']]['biblioteca']=='Si'){
									                      				?>
									                      					<input type="checkbox" class="checkbox" name="biblioteca" id="biblioteca" checked value="Si">
									                      				<?php
									                      			}else{
										                      			?>
										                      				<input type="checkbox" class="checkbox" name="biblioteca" id="biblioteca" value="Si">
										                      			<?php
									                      			}
									                      		?>
										                        <label for="biblioteca" class="personal_radio">Biblioteca</label>
									                      	</div>
									                      	<div class="form-group col-md-4">
									                      		<?php
									                      			if($_actitudes[$_GET['id']]['mantenimiento']=='Si'){
									                      				?>
									                      					<input type="checkbox" class="checkbox" name="mantenimiento" id="mantenimiento" checked value="Si">
									                      				<?php
									                      			}else{
										                      			?>
										                      				<input type="checkbox" class="checkbox" name="mantenimiento" id="mantenimiento" value="Si">
										                      			<?php
									                      			}
									                      		?>
										                        <label for="mantenimiento" class="personal_radio">Mantenimiento</label>
									                      	</div>
									                      	<div class="form-group col-md-4">
									                      		<?php
									                      			if($_actitudes[$_GET['id']]['conservacion']=='Si'){
									                      				?>
									                      					<input type="checkbox" class="checkbox" name="conservacion" id="conservacion" checked value="Si">
									                      				<?php
									                      			}else{
										                      			?>
										                      				<input type="checkbox" class="checkbox" name="conservacion" id="conservacion" value="Si">
										                      			<?php
									                      			}
									                      		?>
										                        <label for="conservacion" class="personal_radio">Conservación</label>
									                      	</div>
								                    	</div>
								                  	</div>
								                  	<div class="col-md-12" style="top: -10px;">
								                    	<p style="border-top: 1px solid #999C9E !important;"></p>
								                  	</div>
								                  	<div class="col-md-12 personalizado">
								                    	<div class="col-md-12">
								                      		<label style="font-size: 18px;color: #999C9E; text-align: justify;">Información General:</label>
								                    	</div>
								                    	<br><br><br>
								                    	<div class="col-md-12 personalizado">
								                      		<div class="col-md-4">
								                        		<label style="font-size: 14px;color: #999C9E;">Posee Canaima (computador):</label>
								                      		</div>
									                      	<div class="col-md-8">
									                      		<?php
									                      			if($_actitudes[$_GET['id']]['condiciones']!="" && $_actitudes[$_GET['id']]['motivo']==""){
									                      				?>
									                      					<div class="form-group col-md-2">
													                          	<input type="radio" class="radio" name="canaima" id="canaima_si" checked value="Si">
													                          	<label for="canaima_si" class="personal_radio">Sí</label>
												                        	</div>
												                        	<div class="form-group col-md-2">
												                          		<input type="radio" class="radio" name="canaima" id="canaima_no" value="No">
												                          		<label for="canaima_no" class="personal_radio">No</label>
												                        	</div>
									                      				<?php
									                      			}else if($_actitudes[$_GET['id']]['condiciones']=="" && $_actitudes[$_GET['id']]['motivo']!=""){
									                      				?>
									                      					<div class="form-group col-md-2">
													                          	<input type="radio" class="radio" name="canaima" id="canaima_si" value="Si">
													                          	<label for="canaima_si" class="personal_radio">Sí</label>
												                        	</div>
												                        	<div class="form-group col-md-2">
												                          		<input type="radio" class="radio" name="canaima" id="canaima_no" checked value="No">
												                          		<label for="canaima_no" class="personal_radio">No</label>
												                        	</div>
									                      				<?php									                      				
									                      			}else{
									                      				?>
									                      					<div class="form-group col-md-2">
													                          	<input type="radio" class="radio" name="canaima" id="canaima_si" value="Si">
													                          	<label for="canaima_si" class="personal_radio">Sí</label>
												                        	</div>
												                        	<div class="form-group col-md-2">
												                          		<input type="radio" class="radio" name="canaima" id="canaima_no" value="No">
												                          		<label for="canaima_no" class="personal_radio">No</label>
												                        	</div>
									                      				<?php
									                      			}
									                      		?>
									                      	</div>
								                    	</div>
								                    	<?php
								                    		if($_actitudes[$_GET['id']]['condiciones']!="" && $_actitudes[$_GET['id']]['motivo']==""){
						                      				?>
						                      					<div class="form-group form-animate-text col-md-6">
										                      		<input type="text" class="form-text" name="condiciones" id="condiciones" value="<?php echo $_actitudes[$_GET['id']]['condiciones'];?>">
										                      		<span class="bar"></span>
										                      		<label for="condiciones">En caso de ser Sí, en qué condiciones esta:</label>
										                    	</div>
										                    	<div class="form-group form-animate-text col-md-6">
										                      		<input type="text" class="form-text" name="serial" id="serial" value="<?php echo $_actitudes[$_GET['id']]['num_serial'];?>">
										                      		<span class="bar"></span>
										                      		<label for="serial">Número de serial:</label>
										                    	</div>
										                    	<div class="form-group form-animate-text col-md-6">
										                      		<input type="text" class="form-text" name="motivo" id="motivo" disabled>
										                      		<span class="bar"></span>
										                      		<label for="motivo">En caso de ser No, explique el motivo:</label>
										                    	</div>
										                    	<div class="form-group form-animate-text col-md-6">
										                      		<input type="text" class="form-text" name="denuncia" id="denuncia" disabled>
										                      		<span class="bar"></span>
										                      		<label for="denuncia">Número de denuncia:</label>
										                    	</div>
						                      				<?php
						                      			}else if($_actitudes[$_GET['id']]['condiciones']=="" && $_actitudes[$_GET['id']]['motivo']!=""){
						                      				?>
						                      					<div class="form-group form-animate-text col-md-6">
										                      		<input type="text" class="form-text" name="condiciones" id="condiciones" disabled>
										                      		<span class="bar"></span>
										                      		<label for="condiciones">En caso de ser Sí, en qué condiciones esta:</label>
										                    	</div>
										                    	<div class="form-group form-animate-text col-md-6">
										                      		<input type="text" class="form-text" name="serial" id="serial" disabled>
										                      		<span class="bar"></span>
										                      		<label for="serial">Número de serial:</label>
										                    	</div>
										                    	<div class="form-group form-animate-text col-md-6">
										                      		<input type="text" class="form-text" name="motivo" id="motivo" value="<?php echo $_actitudes[$_GET['id']]['motivo'];?>">
										                      		<span class="bar"></span>
										                      		<label for="motivo">En caso de ser No, explique el motivo:</label>
										                    	</div>
										                    	<div class="form-group form-animate-text col-md-6">
										                      		<input type="text" class="form-text" name="denuncia" id="denuncia" value="<?php echo $_actitudes[$_GET['id']]['denuncia'];?>">
										                      		<span class="bar"></span>
										                      		<label for="denuncia">Número de denuncia:</label>
										                    	</div>
						                      				<?php									                      				
						                      			}else{
						                      				?>
						                      					<div class="form-group form-animate-text col-md-6">
										                      		<input type="text" class="form-text" name="condiciones" id="condiciones" disabled>
										                      		<span class="bar"></span>
										                      		<label for="condiciones">En caso de ser Sí, en qué condiciones esta:</label>
										                    	</div>
										                    	<div class="form-group form-animate-text col-md-6">
										                      		<input type="text" class="form-text" name="serial" id="serial" disabled>
										                      		<span class="bar"></span>
										                      		<label for="serial">Número de serial:</label>
										                    	</div>
										                    	<div class="form-group form-animate-text col-md-6">
										                      		<input type="text" class="form-text" name="motivo" id="motivo" disabled>
										                      		<span class="bar"></span>
										                      		<label for="motivo">En caso de ser No, explique el motivo:</label>
										                    	</div>
										                    	<div class="form-group form-animate-text col-md-6">
										                      		<input type="text" class="form-text" name="denuncia" id="denuncia" disabled>
										                      		<span class="bar"></span>
										                      		<label for="denuncia">Número de denuncia:</label>
										                    	</div>
						                      				<?php
						                      			}
						                      		?>
								                  	</div>
								                	<div class="col-md-12">
								                    	<div class="form-group form-animate-checkbox"></div>
								                    	<input class="submit btn btn-teal" type="submit" value="Guardar">
								              		</div>
                   								</form>
                  							</div>
                						</div>
              						</div>  
            					</div>
          					</div>
          					<div role="tabpanel" class="tab-pane fade" id="tabs-demo7-area5" aria-labelledby="tabs-demo7-area5">
            					<div class="col-md-12 top-20 padding-0">
                					<div class="col-md-12">
                    					<div class="panel">
                   							<div class="panel-body">
                   								<script src="asset/js/antropometricas.js"></script>
                   								<form class="cmxform" method="post" action="?view=alumno&mode=EditAntropometricas&id=<?php echo $_GET['id'];?>">
                   									<div class="form-group form-animate-text col-md-3" style="margin-top: -10px !important;">
								               			<input type="text" class="form-text" name="peso" id="peso" onkeypress="return solonumeros2(event)" value="<?php echo $_antropometricas[$_GET['id']]['peso'];?>">
								               			<span class="bar"></span>
								               			<label>Peso (kg):</label>
								               		</div>
								               		<div class="form-group form-animate-text col-md-3" style="margin-top: -10px !important;">
									                    <input type="text" class="form-text" name="parado" id="parado" onkeypress="return solonumeros2(event)" value="<?php echo $_antropometricas[$_GET['id']]['parado'];?>">
									                    <span class="bar"></span>
									                    <label>Talla Parado (cm):</label>
									                </div>
									                <div class="form-group form-animate-text col-md-3" style="margin-top: -10px !important;">
									                    <input type="text" class="form-text" name="sentado" id="sentado" onkeypress="return solonumeros2(event)" value="<?php echo $_antropometricas[$_GET['id']]['sentado'];?>">
									                    <span class="bar"></span>
									                    <label>Talla Sentado (cm):</label>
									                </div>
									                <div class="form-group form-animate-text col-md-3" style="margin-top: -10px !important;">
									                    <input type="text" class="form-text" name="brazada" id="brazada" onkeypress="return solonumeros2(event)" value="<?php echo $_antropometricas[$_GET['id']]['brazada'];?>">
									                    <span class="bar"></span>
									                    <label>Brazada (cm):</label>
								                  	</div>
								                  	<div class="col-md-12" style="top: -10px;">
								                    	<p style="border-top: 1px solid #999C9E !important;"></p>
								                  	</div>
								                  	<div class="col-md-12">
								                    	<div class="col-md-12">
								                      		<label style="font-size: 18px;color: #999C9E; text-align: justify;">Pruebas de Fuerzas</label>
								                    	</div>
								                    	<br><br><br>
								                    	<div class="form-group form-animate-text col-md-3">
									                      	<input type="text" class="form-text" name="salto" id="salto" onkeypress="return solonumeros2(event)" value="<?php echo $_antropometricas[$_GET['id']]['salto'];?>">
									                      	<span class="bar"></span>
									                      	<label for="salto">Salto sin impulso (cm):</label>
								                    	</div>
								                    	<div class="form-group form-animate-text col-md-3">
								                      		<input type="text" class="form-text" name="abdominales" id="abdominales" onkeypress="return solonumeros2(event)" value="<?php echo $_antropometricas[$_GET['id']]['abdominales'];?>">
								                      		<span class="bar"></span>
								                      		<label for="abdominales">Abdominales en 30 seg (u):</label>
								                    	</div>
								                    	<div class="form-group form-animate-text col-md-3">
								                      		<input type="text" class="form-text" name="flexiones" id="flexiones" onkeypress="return solonumeros2(event)" value="<?php echo $_antropometricas[$_GET['id']]['flexiones'];?>">
								                      		<span class="bar"></span>
								                      		<label for="flexiones">Flexiones de brazo (u):</label>
								                    	</div>
								                    	<div class="form-group form-animate-text col-md-3">
								                      		<input type="text" class="form-text" name="suma" id="suma" onkeypress="return deshabilitarteclas(event)" value="<?php echo $_antropometricas[$_GET['id']]['suma_fuerzas'];?>">
								                      		<span class="bar"></span>
								                      		<label for="suma">Sumatoria de las fuerzas:</label>
								                    	</div>
								                  	</div>
								                  	<div class="col-md-12" style="top: -10px;">
									                    <p style="border-top: 1px solid #999C9E !important;"></p>
									                </div>
                  									<div class="col-md-12">
                    									<div class="col-md-12">
                      										<label style="font-size: 18px;color: #999C9E; text-align: justify;">Pruebas de Velocidad, Flexibilidad y Resistencia</label>
									                    </div>
									                    <br><br><br>
                    									<div class="form-group form-animate-text col-md-4">
									                      	<input type="text" class="form-text" name="velocidad" id="velocidad" onkeypress="return solonumeros2(event)" value="<?php echo $_antropometricas[$_GET['id']]['velocidad'];?>">
									                      	<span class="bar"></span>
									                      	<label for="velocidad">Velocidad en 
									                        	<?php
									                          		if($_alumno[$_GET['id']]['edad']>=9 && $_alumno[$_GET['id']]['edad']<=10){
									                            		?>
									                              			30 mts. (seg):
									                            		<?php
									                          		}else if($_alumno[$_GET['id']]['edad']>=11 && $_alumno[$_GET['id']]['edad']<=12){
									                            		?>
									                              			40 mts. (seg):
									                            		<?php
									                          		}else if($_alumno[$_GET['id']]['edad']>=13 && $_alumno[$_GET['id']]['edad']<=14){
									                            		?>
									                              			50 mts. (seg):
									                            		<?php
									                          		}else if($_alumno[$_GET['id']]['edad']>=15){
									                            		?>
									                              			60 mts. (seg):
									                            		<?php
									                          		}
									                        	?>
								                      		</label>
								                    	</div>
                    									<div class="form-group form-animate-text col-md-4">
									                      	<input type="text" class="form-text" name="flexion" id="flexion" onkeypress="return solonumeros2(event)" value="<?php echo $_antropometricas[$_GET['id']]['flexibilidad'];?>">
									                      	<span class="bar"></span>
									                      	<label for="flexion">Flexión ventral (cm):</label>
									                    </div>
									                    <div class="form-group form-animate-text col-md-4">
									                      	<input type="text" class="form-text" name="resistencia" id="resistencia" onkeypress="return solonumeros2(event)" value="<?php echo $_antropometricas[$_GET['id']]['resistencia'];?>">
									                      	<span class="bar"></span>
									                      	<label for="resistencia">Resistencia en
									                        	<?php
									                          		if($_alumno[$_GET['id']]['edad']>=9 && $_alumno[$_GET['id']]['edad']<=10){
									                            		?>
									                              			600 mts. (min):
									                            		<?php
									                          		}else if($_alumno[$_GET['id']]['edad']>=11 && $_alumno[$_GET['id']]['edad']<=12){
									                            		if($_alumno[$_GET['id']]['sexo']=="Femenino"){
									                              			?>
									                                			800 mts. (min):
									                              			<?php
									                            		}else if($_alumno[$_GET['id']]['sexo']=="Masculino" && $_alumno[$_GET['id']]['edad']==11){
									                              			?>
									                                			800 mts. (min):
									                              			<?php
									                           			}else if($_alumno[$_GET['id']]['sexo']=="Masculino" && $_alumno[$_GET['id']]['edad']==12){
									                              			?>
									                                			1000 mts. (min):
									                              			<?php
									                            		}
									                          		}else if($_alumno[$_GET['id']]['edad']>=13 && $_alumno[$_GET['id']]['edad']<=14){
									                            		?>
									                              			1000 mts. (min):
									                            		<?php
									                          		}else if($_alumno[$_GET['id']]['edad']>=15){
									                            		if($_alumno[$_GET['id']]['sexo']=="Masculino"){
									                              			?>
									                                			1500 mts. (min):
									                              			<?php
									                            		}else if($_alumno[$_GET['id']]['sexo']=="Femenino"){
									                              			?>
									                               				1000 mts. (min):
									                              			<?php
									                           			}
									                          		}
									                        	?>
									                      	</label>
									                    </div>
									                </div>
									                <div class="col-md-12">
									                    <div class="form-group form-animate-checkbox"></div>
									                    <input class="submit btn btn-teal" type="submit" value="Guardar">
									                </div>
                   								</form>
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
		<script>
			$(document).ready(function(){
				$('#datatables-example').DataTable();
				$("#consulta").addClass("active");
			});
		</script>
	</body>
</html>