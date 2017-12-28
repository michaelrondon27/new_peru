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
								{title:'Usuario bloqueado!',
								type:'success',
								confirmButtonText:'Aceptar'}
							);
						</script>
					<?php
				}else if($_GET['success']==2){
					?>
						<script>
							swal(
								{title:'Usuario desbloqueado!',
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
					<script src="asset/js/usuario.js"></script>
					<div id="content">
						<div class="panel box-shadow-none content-header">
			                <div class="panel-body">
			                    <div class="col-md-9">
			                        <p class="animated fadeInDown">
			                          	Usuarios <span class="fa-angle-right fa"></span> Consultar Usuarios
			                        </p>
			                    </div>
			                    <div class="col-md-3">
			                        <p class="animated fadeInDown">
			                          <a class="btn btn-teal" href="?view=user&mode=addUsuario">Nuevo Usuario <i class="fa fa-sign-in" aria-hidden="true"></i></a>
			                        </p>
			                    </div>
			                </div>
			            </div>
			            <div class="col-md-12 top-20 padding-0">
			                <div class="col-md-12">
			                    <div class="panel">
			                    	<div class="panel-heading"><h3>Usuarios</h3></div>
			                   		<div class="panel-body">
			                    		<div class="responsive-table">
			                    			<table id="datatables-example" class="table table-striped table-bordered" width="100%" cellspacing="0">
			                    				<thead>
			                      					<tr>
			                      						<th>N°</th>
			                      						<th>Foto</th>
														<th>usuario</th>
														<th>Nombre</th>
														<th>Perfil</th>
														<th>Estatus</th>
														<th>Acciones</th> 					
													</tr>
			                    				</thead>
			                    				<tbody>
			                      					<?php
			                      						$contador=1;
														foreach($_users as $user){
															if($user['id_status']==1){
																$color="#FFF";
															}else if($user['id_status']==2){
																$color="#FFCCCC";
															}
															?>
																<tr style="background-color: <?php echo $color;?>;">
																	<td><?php echo $contador;?></td>
																	<td align="center"><img src="asset/images/<?php echo $user['foto'];?>" class="img-circle avatar" alt="user name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"/></td>
																	<td><?php echo $user['usuario'];?></td>
																	<td><?php echo $user['nombre']." ".$user['apellido'];?></td>
																	<td><?php echo $_perfil[$user['id_tipo_usu']]['tipo_usu'];?></td>
																	<td><?php echo $_status[$user['id_status']]['status'];?></td>
																	<td>
																		<div class="dropdown">
									  										<button class="btn btn-teal dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
									    										Acciones
									    										<span class="caret"></span>
									  										</button>
									  										<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
										  										<li><a href="?view=user&mode=EditUsuario&id=<?php echo $user['id_usuario'];?>">Editar <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></li>
										  										<li><a href="?view=user&mode=AdminPassword&id=<?php echo $user['id_usuario'];?>">Cambiar Contraseña <i class="fa fa-cog" aria-hidden="true"></i></a></li>
										  										<?php
										  											if($user['id_status']==1){
										  												?>
										  													<li style="cursor: pointer;"><a onclick="BlockItem('¿Está seguro de bloquear este usuario?','?view=user&mode=Bloquear&id=<?php echo $user['id_usuario']?>')">Bloquear <i class="fa fa-lock" aria-hidden="true"></i></a></li>
										  												<?php
										  											}else if($user['id_status']==2){
										  												?>
										  													<li style="cursor: pointer;"><a onclick="UnblockItem('¿Está seguro de desbloquear este usuario?','?view=user&mode=Desbloquear&id=<?php echo $user['id_usuario'];?>')">Desbloquear <i class="fa fa-unlock" aria-hidden="true"></i></a></li>
										  												<?php
										  											}
							  													?>
									  										</ul>
																		</div>
																	</td>
																</tr>
															<?php
															$contador++;
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