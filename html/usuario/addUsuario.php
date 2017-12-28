<!DOCTYPE html>
<html>
	<?php
		if($_users[$_SESSION['app_id']]['id_tipo_usu']==1){
			include(HTML_DIR."overall/header.php");
			if(isset($_GET['success'])){
				if($_GET['success']==1){
					?>
						<script>
							swal(
								{title:'Usuario guardado!',
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
								{title:'Las contraseñas no coinciden!',
								type:'error',
								confirmButtonText:'Aceptar'}
							);
						</script>
					<?php
				}else if($_GET['error']==3){
					?>
						<script>
							swal(
								{title:'Este usuario ya se encuentra registrado en el sistema!',
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
					<script src="asset/js/usuario.js"></script>
					<div id="content">
			            <div class="panel box-shadow-none content-header">
			                <div class="panel-body">
			                    <div class="col-md-9">
			                        <p class="animated fadeInDown">
			                          	Usuarios <span class="fa-angle-right fa"></span> Nuevo Usuario
			                        </p>
			                    </div>
			                    <div class="col-md-3">
			                        <p class="animated fadeInDown">
			                          <a class="btn btn-teal" href="?view=user&mode=allUsuarios">Consultar Usuarios <i class="fa fa-sign-in" aria-hidden="true"></i></a>
			                        </p>
			                    </div>
			                </div>
			            </div>
			            <div class="col-md-6 col-md-offset-2">
			                <div class="col-md-12 panel">
			                    <div class="col-md-12 panel-heading">
			                      	<h4>Registrar Usuario</h4>
			                    </div>
			                    <div class="col-md-12 panel-body" style="padding-bottom:30px;">
			                    	<p>Los campos con (*) son obligatorios.</p>
			                    	<br>
			                      	<div class="col-md-12">
			                        	<form class="cmxform" id="user" method="post" action="?view=user&mode=addUsuario">
			                          		<div class="col-md-12">
			                          			<div class="form-group form-animate-text col-md-12" style="margin-top: -10px !important;">
			                              			<input type="text" class="form-text" name="usuario" id="usuario" required>
			                              			<span class="bar"></span>
			                              			<label>*Usuario:</label>
			                            		</div>
			                            		<div class="form-group form-animate-text col-md-12" style="margin-top: -10px !important;">
			                              			<input type="text" class="form-text" name="nombre" id="nombre" required>
			                              			<span class="bar"></span>
			                              			<label>*Nombre:</label>
			                            		</div>
			                            		<div class="form-group form-animate-text col-md-12" style="margin-top: -10px !important;">
			                              			<input type="text" class="form-text" name="apellido" id="apellido" required>
			                              			<span class="bar"></span>
			                              			<label>*Apellido:</label>
			                            		</div>
						                        <div class="form-group form-animate-text col-md-2" style="margin-top: -10px !important;">
						                          	<span class="bar"></span>
						                          	<label>*Perfil:</label>
						                        </div>
				          						<div class="form-group form-animate-text col-md-10" style="margin-top:0px !important;">
				                                	<select class="form-control" name="perfil" id="perfil">
				                                		<option value="">Seleccione</option>
													    <?php
													        foreach($_perfil as $perfil){
													        	?>
													        		<option value="<?php echo $perfil['id_tipo_usu']?>"><?php echo $perfil['tipo_usu']?></option>
													        	<?php
													        }
													    ?>
				                                	</select>
				                                </div>
				                                <div class="form-group form-animate-text col-md-12" style="margin-top: -10px !important;">
			                              			<input type="password" class="form-text" id="pass" name="pass" required>
			                              			<span class="bar"></span>
			                              			<label>*Contraseña:</label>
			                            		</div>
			                            		<div class="form-group form-animate-text col-md-12" style="margin-top: -10px !important;">
			                              			<input type="password" class="form-text" id="repeat" name="repeat" required>
			                              			<span class="bar"></span>
			                              			<label>*Repetir Contraseña:</label>
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