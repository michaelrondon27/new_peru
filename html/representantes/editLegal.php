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
			                          	Representantes <span class="fa-angle-right fa"></span> Editar Representante Legal <span class="fa-angle-right fa"></span> <?php echo $_legal[$_GET['id']]['nombres']." ".$_legal[$_GET['id']]['apellidos'];?>
			                        </p>
			                    </div>
			                    <div class="col-md-3">
			                        <p class="animated fadeInDown">
			                          <a class="btn btn-teal" href="?view=representante&mode=AllLegal">Consultar Representante Legal <i class="fa fa-sign-in" aria-hidden="true"></i></a>
			                        </p>
			                    </div>
			                </div>
			            </div>
			            <div class="col-md-10 col-md-offset-1">
			                <div class="col-md-12 panel">
			                    <div class="col-md-12 panel-heading">
			                      	<h4>Editar Representante Legal</h4>
			                    </div>
			                    <div class="col-md-12 panel-body" style="padding-bottom:30px;">
			                    	<p>Los campos con (*) son obligatorios.</p>
			                    	<br>
			                      	<div class="col-md-12">
			                        	<form class="cmxform" id="representante" method="post" action="?view=representante&mode=EditLegal&id=<?php echo $_GET['id'];?>">
			                          		<div class="col-md-12">
			                          			<div class="form-group form-animate-text col-md-3" style="margin-top: -10px !important;">
			                              			<input type="text" class="form-text" name="apellidos" id="apellidos" required onkeypress="return sololetras(event)" value="<?php echo $_legal[$_GET['id']]['apellidos'];?>">
			                              			<span class="bar"></span>
			                              			<label>*Apellidos:</label>
			                            		</div>
			                            		<div class="form-group form-animate-text col-md-3" style="margin-top: -10px !important;">
			                              			<input type="text" class="form-text" name="nombres" id="nombres" required onkeypress="return sololetras(event)" value="<?php echo $_legal[$_GET['id']]['nombres'];?>">
			                              			<span class="bar"></span>
			                              			<label>*Nombres:</label>
			                            		</div>
			                            		<div class="form-group form-animate-text col-md-3" style="margin-top: -10px !important;">
			                              			<input type="text" class="form-text" name="cedula" id="cedula" required onkeypress="return solonumeros(event)" maxlength="8" value="<?php echo $_legal[$_GET['id']]['cedula'];?>">
			                              			<span class="bar"></span>
			                              			<label>*Cédula:</label>
			                            		</div>
			                            		<div class="form-group form-animate-text col-md-3" style="margin-top: -10px !important;">
			                              			<input type="text" class="form-text" name="edad" id="edad" onkeypress="return solonumeros(event)" maxlength="2" value="<?php echo $_legal[$_GET['id']]['edad'];?>">
			                              			<span class="bar"></span>
			                              			<label>Edad:</label>
			                            		</div>
			                            		<div class="form-group form-animate-text col-md-12" style="margin-top: -10px !important;">
			                              			<p><strong>Nota: En caso de no ser ninguno de los padres, completar los siguientes datos y SOLICITAR el document legal del Consejo de Protección de Niños, Niñas y Adolescente o la AUTORIZACIÓN POR ESCRITO DE UNO DE LOS PADRES Y ANEXAR AL LIBRO DE VIDA.</strong></p>
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
			header("location: ?view=representante&mode=AllLegal");
		}
	?>
</html>