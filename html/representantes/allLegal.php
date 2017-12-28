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
                          	Representantes <span class="fa-angle-right fa"></span> Consulta <span class="fa-angle-right fa"></span> Representante Legal
                        </p>
                    </div>
        			<div class="col-md-3">
                        <p class="animated fadeInDown">
                          <a class="btn btn-teal" href="?view=representante&mode=AddLegal">Registrar Representante Legal <i class="fa fa-sign-in" aria-hidden="true"></i></a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-12 top-20 padding-0">
                <div class="col-md-12">
                    <div class="panel">
                    	<div class="panel-heading"><h3>Representantes Legales</h3></div>
                   		<div class="panel-body">
                    		<div class="responsive-table">
                    			<p><strong>Click sobre el número de la cédula para ver los datos completos.</strong></p>
                    			<table id="datatables-example" class="table table-striped table-bordered" width="100%" cellspacing="0">
                    				<thead>
                      					<tr>
                      						<th style="width: 20px; text-align: center;">N°</th> 
											<th style="text-align: center;">Cédula</th>
											<th style="text-align: center;">Nombres y Apellidos</th>
											<th style="text-align: center;">Edad</th>
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
											if($_legal>0){
												$contador=1;
												foreach ($_legal as $legal) {
													?>
														<tr>
															<td style="width: 20px; text-align: center;"><?php echo $contador;?></td>
															<td style="text-align: center;"><a href="?view=representante&mode=VerLegal&id=<?php echo $legal['id_repre'];?>"><?php echo $legal['cedula'];?></a></td>
															<td style="text-align: center;"><?php echo $legal['nombres']." ".$legal['apellidos'];?></td>
															<td style="text-align: center;"><?php echo $legal['edad']?></td>
															<?php
																if($_users[$_SESSION['app_id']]['id_tipo_usu']==1 || $_users[$_SESSION['app_id']]['id_tipo_usu']==2){
																	?>
																		<td style="width: 10%; text-align: center;">
																			<a href="?view=representante&mode=EditLegal&id=<?php echo $legal['id_repre'];?>">
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