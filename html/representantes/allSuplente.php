<!DOCTYPE html>
<html>
	<?php
		include(HTML_DIR."overall/header.php");
	?>
	<body>
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
                          	Representantes <span class="fa-angle-right fa"></span> Consulta <span class="fa-angle-right fa"></span> Representante Suplente
                        </p>
                    </div>
        			<div class="col-md-3">
                        <p class="animated fadeInDown">
                          <a class="btn btn-teal" href="?view=representante&mode=AddSuplente">Registrar Representante Suplente <i class="fa fa-sign-in" aria-hidden="true"></i></a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-12 top-20 padding-0">
                <div class="col-md-12">
                    <div class="panel">
                    	<div class="panel-heading"><h3>Representantes Suplentes</h3></div>
                   		<div class="panel-body">
                   			<p><strong>Click sobre el número de la cédula para ver los datos completos.</strong></p>
                    		<div class="responsive-table">
                    			<table id="datatables-example" class="table table-striped table-bordered" width="100%" cellspacing="0">
                    				<thead>
                      					<tr>
                      						<th style="width: 20px; text-align: center;">N°</th> 
											<th style="text-align: center;">Cédula</th>
											<th style="text-align: center;">Nombres y Apellidos</th>
											<th style="text-align: center;">Dirección</th>
											<th style="text-align: center;">Teléfono Local</th>
											<th style="text-align: center;">Teléfono Celular</th>
											<?php
												if($_users[$_SESSION['app_id']]['id_tipo_usu']==1){
													?>
														<th style="width: 10%; text-align: center;">Acción</th>
													<?php
												}
											?>  					
										</tr>
                    				</thead>
                    				<tbody>
                      					<?php
											if($_suplente>0){
												$contador=1;
												foreach ($_suplente as $suplente) {
													?>
														<tr>
															<td style="width: 20px; text-align: center;"><?php echo $contador;?></td>
															<td style="text-align: center;"><a href="?view=representante&mode=VerSuplente&id=<?php echo $suplente['id_repre_sup'];?>"><?php echo $suplente['cedula'];?></a></td>
															<td style="text-align: center;"><?php echo $suplente['nombres']." ".$suplente['apellidos'];?></td>
															<td style="text-align: center;"><?php echo $suplente['dir_hab']?></td>
															<td style="text-align: center;"><?php echo $_local[$suplente['id_tlf_local']]['cod_tlf_local']."-".$suplente['tlf_hab'];?></td>
															<td style="text-align: center;"><?php echo $_celular[$suplente['id_tlf_cel']]['cod_tlf_cel']."-".$suplente['tlf_cel'];?></td>
															<?php
																if($_users[$_SESSION['app_id']]['id_tipo_usu']==1 || $_users[$_SESSION['app_id']]['id_tipo_usu']==2){
																	?>
																		<td style="width: 10%; text-align: center;">
																			<a href="?view=representante&mode=EditSuplente&id=<?php echo $suplente['id_repre_sup'];?>">
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
		<?php
			//include(HTML_DIR."overall/footer.php");
		?>
		<script>
			$(document).ready(function(){
				$("#consulta").addClass("active");
			});
		</script>
	</body>
</html>