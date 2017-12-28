<!DOCTYPE html>
<html>
	<?php
		include(HTML_DIR."overall/header.php");
	?>
		<style>
			.personalizado [type="radio"]{
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
			.personalizado [type="radio"]:checked + .personal_radio:before{
				border: solid 1px #fff;
				color: #00796b;
				content: '\f00c';
				font-family: FontAwesome;
				top: -3px;
				transform: rotate(360deg);
			}
		</style>
	<?php
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
			}
		}
	?>
	<body onload="deshabilitaRetroceso()">
    <?php
      include(HTML_DIR."overall/menu.php");
      include(HTML_DIR."overall/scripts.php");
    ?>
		<script src="asset/js/alumno.js"></script>
		<div id="content">
            <div class="panel box-shadow-none content-header">
                <div class="panel-body">
                    <div class="col-md-9">
                        <p class="animated fadeInDown">
                          	Registrar <span class="fa-angle-right fa"></span> Nuevo Alumno
                        </p>
                    </div>
                    <div class="col-md-3">
                        <p class="animated fadeInDown">
                          <a class="btn btn-teal" href="?view=alumno&mode=AllAlumno">Consultar Alumnos <i class="fa fa-sign-in" aria-hidden="true"></i></a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-10 col-md-offset-1">
                <div class="col-md-12 panel">
                    <div class="col-md-12 panel-heading">
                      	<h4>Registrar Alumno</h4>
                    </div>
                    <div class="col-md-12 panel-body" style="padding-bottom:30px;">
                    	<p>Los campos con (*) son obligatorios.</p>
                    	<br>
                    	<div class="col-md-12">
                      	<form class="cmxform" method="post" action="?view=alumno&mode=AddAlumno" enctype="multipart/form-data" id="alumno">
                        		<div class="col-md-12">
                        			<div class="form-group form-animate-text col-md-3" style="margin-top: -10px !important;">
                            			<input type="text" class="form-text" name="cedula" id="cedula" required onkeypress="return solonumeros(event)" maxlength="8">
                            			<span class="bar"></span>
                            			<label>*Cédula:</label>
                          		</div>
                          		<div class="form-group form-animate-text col-md-3" style="margin-top: -10px !important;">
                            			<input type="text" class="form-text" name="ced_esc" id="ced_esc" required onkeypress="return deshabilitarteclas(event)">
                            			<span class="bar"></span>
                            			<label>*Cédula Escolar:</label>
                          		</div>
                          		<div class="form-group form-animate-text col-md-3" style="margin-top: -10px !important;">
                            			<input type="text" class="form-text" name="parto" id="parto">
                            			<span class="bar"></span>
                            			<label>Posición según parto(s):</label>
                          		</div>
                          		<div class="form-group form-animate-text col-md-3" style="margin-top: -10px !important;">
                            			<input type="text" class="form-text dateAnimate" name="fecha" id="fecha" required autocomplete="off" onkeypress="return deshabilitarteclas(event)">
                            			<span class="bar"></span>
                            			<label>*Fecha de Nacimiento:</label>
                          		</div>
                          		<div class="form-group form-animate-text col-md-3" style="margin-top: -10px !important;">
                            			<input type="text" class="form-text" name="apellidos" id="apellidos" required onkeypress="return sololetras(event)">
                            			<span class="bar"></span>
                            			<label>*Apellidos:</label>
                          		</div>
                          		<div class="form-group form-animate-text col-md-3" style="margin-top: -10px !important;">
                            			<input type="text" class="form-text" name="nombres" id="nombres" required onkeypress="return sololetras(event)">
                            			<span class="bar"></span>
                            			<label>*Nombres:</label>
                          		</div>
                          		<div class="form-group form-animate-text col-md-3" style="margin-top: -10px !important;">
                            			<input type="text" class="form-text" name="edad" id="edad" onkeypress="return deshabilitarteclas(event)" maxlength="2">
                            			<span class="bar"></span>
                            			<label>Edad:</label>
                          		</div>
                          		<div class="form-group form-animate-text col-md-3" style="margin-top: -10px !important;">
                            			<input type="text" class="form-text" name="lugar" id="lugar">
                            			<span class="bar"></span>
                            			<label>Lugar de Nacimiento:</label>
                          		</div>
                          		<div class="form-group form-animate-text col-md-4" style="margin-top: -10px !important;">                          	
                          			<select class="form-control" name="sexo" id="sexo" required>
                              		<option value="">Seleccione</option>
            										  <option value="Masculino">Masculino</option>
            											<option value="Femenino">Femenino</option>
                              	</select>
                              	<span class="bar"></span>
                          			<label style="top: -18px;font-size: 14px;color: #999C9E;">*Sexo:</label>
                              </div>
                              <div class="form-group form-animate-text col-md-4" style="margin-top: -10px !important;">                          	
                          			<select class="form-control" name="pais" id="pais">
                              		<?php
                              			foreach($_pais as $pais){
                              				if($pais['id_pais']==1){
                              					?>
                                					<option selected value="<?php echo $pais['id_pais'];?>">Seleccione</option>
                                				<?php
                              				}else{
                              					?>
                                					<option value="<?php echo $pais['id_pais'];?>"><?php echo $pais['pais'];?></option>
                                				<?php
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
                               				if($estado['id_estado']==1){
                               					?>
	                               					<option selected value="<?php echo $estado['id_estado'];?>">Seleccione</option>
	                               				<?php
                               				}else{
                               					?>
	                               					<option value="<?php echo $estado['id_estado'];?>"><?php echo $estado['estado'];?></option>
	                               				<?php
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
                              			<option value="">Seleccione</option>
	                                	<?php
	                                		foreach($_celular as $celular){
                                				?>
	                                				<option value="<?php echo $celular['id_tlf_cel'];?>"><?php echo $celular['cod_tlf_cel'];?></option>
	                                			<?php
	                                		}
	                                	?>
	                                </select>
	                              </div>
	                              <div class="col-md-6">
                                	<input type="text" class="form-text col-md-6" name="tlfcelular" id="tlfcelular" maxlength="7" onkeypress="return solonumeros(event)" required>
                                </div> 
                                <span class="bar"></span>
                            		<label style="top: -18px;font-size: 14px;color: #999C9E;">*Teléfono Celular:</label>
                              </div>
                              <div class="form-group form-animate-text col-md-4" style="margin-top: -10px !important;">
                            		<input type="text" class="form-text" name="correo" id="correo" required>
                            		<span class="bar"></span>
                            		<label>*Correo:</label>
                          		</div>
                          		<div class="form-group form-animate-text col-md-4" style="margin-top: -10px !important;">
                            		<input type="text" class="form-text" name="direccion" id="direccion">
                            		<span class="bar"></span>
                            		<label>Dirección:</label>
                          		</div>
                          		<div class="col-md-12 personalizado" style="margin-top: -10px !important;">
                          			<div class="form-group col-md-5">
                          				¿Tiene hermanos estudiando en la institución?
                          			</div>
                          			<div class="form-group col-md-7">
                          				<div class="col-md-2">
                          					<input type="radio" name="hermano" id="h_si" value="Si">
                              				<label for="h_si" class="personal_radio">Sí</label>
                          				</div>
                          				<div class="col-md-2">
                          					<input type="radio" name="hermano" id="h_no" value="No">
                              				<label for="h_no" class="personal_radio">No</label>
                          				</div>
                          			</div>
                          		</div>
                          		<div class="col-md-12 personalizado" style="margin-top: -10px !important;">
                          			<div class="form-group col-md-5">
                          				¿Quién será el representante legal del estudiante?
                          			</div>
                          			<div class="col-md-7">
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
                          			</div>
                          		</div>
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
                          		<div class="form-group form-animate-text col-md-12" style="margin-top: -10px !important;">
                          			<div class="col-md-2">
                            			<label>Foto Carnet:</label>
  									            </div>
  									            <div class="col-md-10">
                            			<input type="file" class="form-text" name="foto_carnet" id="foto_carnet">
                          			</div>
                          		</div>
                        		  <div class="form-group form-animate-text col-md-12" style="margin-top: -10px !important;">
                          		  <div class="col-md-3">
                            		  <label>Foto de la Cédula:</label>
  									            </div>
  									            <div class="col-md-9">
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
		<?php
			//include(HTML_DIR."overall/footer.php");
		?>
		<script>
			$(document).ready(function(){
				$("#registro").addClass("active");
			});
		</script>
	</body>
</html>