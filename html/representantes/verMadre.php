<!DOCTYPE html>
<html>
	<?php
		include(HTML_DIR."overall/header.php");
		error_reporting(E_ERROR | E_WARNING | E_PARSE);
		?>
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
	                          	Representantes <span class="fa-angle-right fa"></span> Información de la Madre <span class="fa-angle-right fa"></span> <?php echo $_madre[$_GET['id']]['nombres']." ".$_madre[$_GET['id']]['apellidos'];?>
	                        </p>
	                    </div>
	                    <div class="col-md-3">
	                        <p class="animated fadeInDown">
	                          <a class="btn btn-teal" href="?view=representante&mode=AllMadre">Consultar Madres <i class="fa fa-sign-in" aria-hidden="true"></i></a>
	                        </p>
	                    </div>
	                </div>
	            </div>
	            <div class="col-md-12">
          			<div class="col-md-12">
                        <div class="col-md-12 tabs-area">
			                <ul id="tabs-demo6" class="nav nav-tabs nav-tabs-v6" role="tablist">
              					<li role="presentation" class="active">
                					<a href="#tabs-demo7-area1" id="tabs-demo6-1" role="tab" data-toggle="tab" aria-expanded="true">Personal</a>
              					</li>
              					<li role="presentation" class="">
                					<a href="#tabs-demo7-area2" role="tab" id="tabs-demo6-2" data-toggle="tab" aria-expanded="false">Trabajo</a>
              					</li>
              					<li role="presentation">
                					<a href="#tabs-demo7-area3" id="tabs-demo6-3" role="tab" data-toggle="tab" aria-expanded="false">Hijo(s)</a>
              					</li>
              					<!--<li role="presentation" class="">
                					<a href="#tabs-demo7-area4" role="tab" id="tabs-demo6-4" data-toggle="tab" aria-expanded="false">Menu 4</a>
              					</li>-->
            				</ul>
            				<div id="tabsDemo6Content" class="tab-content tab-content-v6 col-md-12">
              					<div role="tabpanel" class="tab-pane fade active in" id="tabs-demo7-area1" aria-labelledby="tabs-demo7-area1">
						            <div class="col-md-12 top-20 padding-0">
						                <div class="col-md-12">
						                    <div class="panel">
						                   		<div class="panel-body">
						                    		<div class="responsive-table" style="color: #000; font-size: 16px;">
						                    			<div class="col-md-3">
						                    				Nombres: <?php echo $_madre[$_GET['id']]['nombres'];?>
						                    			</div>
						                    			<div class="col-md-3">
						                    				Apellidos: <?php echo $_madre[$_GET['id']]['apellidos'];?>
						                    			</div>
						                    			<div class="col-md-3">
						                    				Cédula: <?php echo $_madre[$_GET['id']]['cedula'];?>
						                    			</div>
						                    			<div class="col-md-3">
						                    				Edad: <?php echo $_madre[$_GET['id']]['edad'];?>
						                    			</div>
						                    			<br><br>
						                    			<div class="col-md-3">
						                    				Ocupación: <?php echo $_madre[$_GET['id']]['ocupacion'];?>
						                    			</div>
						                    			<div class="col-md-3">
						                    				Grado de Instrucción: <?php echo $_instruccion[$_madre[$_GET['id']]['id_instruccion']]['instruccion'];?>
						                    			</div>
						                    			<div class="col-md-3">
						                    				Tlf. Local: <?php echo $_local[$_madre[$_GET['id']]['id_tlf_local']]['cod_tlf_local']."-".$_madre[$_GET['id']]['tlf_hab'];?>
						                    			</div>
						                    			<div class="col-md-3">
						                    				Tlf. Celular: <?php echo $_celular[$_madre[$_GET['id']]['id_tlf_cel']]['cod_tlf_cel']."-".$_madre[$_GET['id']]['tlf_cel'];?>
						                    			</div>
						                    			<br><br>
						                    			<div class="col-md-3">
						                    				Correo: <?php echo $_madre[$_GET['id']]['correo'];?>
						                    			</div>
						                    			<div class="col-md-9">
						                    				Direccion: <?php echo $_madre[$_GET['id']]['dir_hab'];?>
						                    			</div>
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
	                   							<div class="panel-body">
	                    							<div class="responsive-table" style="color: #000; font-size: 16px;">
						                    			<div class="col-md-12">
						                    				Nombre y Dirección: <?php echo $_madre[$_GET['id']]['dir_empresa'];?>
						                    			</div>
						                    			<br><br>
						                    			<div class="col-md-12">
						                    				Teléfono de la empresa: <?php echo $_madre[$_GET['id']]['cod_emp']."-".$_madre[$_GET['id']]['tlf_empresa'];?>
						                    			</div>
						                    		</div>
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
	                   								<p class="col-md-12"><strong>Click sobre la cédula para ver la información completa.</strong></p>
                    								<p class="col-md-4">Sin Color: Estudiante Cursando.</p>
													<p class="col-md-4" style="background-color: #FFFECD;">Amarillo: Nuevo Ingreso.</p>
													<p class="col-md-4" style="background-color: #CCFFD4;">Verde: Estudiante Graduado.</p>
													<p class="col-md-4" style="background-color: #FFCCCC;">Rojo: Estudiante Retirado.</p>
													<p class="col-md-4" style="background-color: #CDD5FF;">Azul: Reingreso.</p>
	                    							<div class="responsive-table" style="color: #000; font-size: 16px; clear: both;">
						                    			<table id="datatables-example" class="table table-striped table-bordered" width="100%" cellspacing="0">
						                    				<thead>
						                    					<th style="text-align: center;">Cédula</th>
						                    					<th style="text-align: center;">Nombre y Apellido</th>
																<th style="text-align: center;">Fecha de Nacimiento</th>
						                    				</thead>
						                    					<?php
							                    					$db=new Conexion();
							                    					$id=$_GET['id'];
							                    					$sql=$db->query("SELECT cedula, nombres, apellidos, fec_nac, estudiante, id_alum FROM alumnos WHERE id_madre=$id ORDER BY cedula;");
							                    					if($db->rows($sql)>0){
							                    						?>
																			<tbody>
							                    								<?php
										                    						while($data=$db->recorrer($sql)){
										                    							$fecha=date("d-m-Y", strtotime($data[3]));
												                    					if($data[4]==0){
												                    						$color="#FFFECD";
												                    					}else if($data[4]==1){
												                    						$color="#FFf";
												                    					}else if($data[4]==2){
												                    						$color="#CCFFD4";
												                    					}else if($data[4]==3){
												                    						$color="#FFCCCC";
												                    					}else if($data[4]==4){
												                    						$color="#CDD5FF";
												                    					}
											                    						?>
																							<tr style="background-color: <?php echo $color;?>;">
																								<td><a href="?view=alumnomode=VerAlumno&id=<?php echo $data[5];?>"><?php echo $data[0];?></a></td>
																								<td><?php echo $data[1]." ".$data[2];?></td>
																								<td><?php echo $fecha;?></td>
																							</tr>
											                    						<?php
										                    						}
							                    								?>
																			</tbody>
							                    						<?php
							                    					}else{
							                    						?>
							                    							<tbody>
								                    							<tr>
																					<td colspan='3'>No hay registros asociados.</td>
																				</tr>
																			</tbody>
							                    						<?php
							                    					}
							                    					$db->liberar($sql);
							                    				?>
						                    			</table>
						                    		</div>
	                  							</div>
	                						</div>
	              						</div>  
	            					</div>
              					</div>
              					<!--<div role="tabpanel" class="tab-pane fade" id="tabs-demo7-area4" aria-labelledby="tabs-demo7-area4">
                					<p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terry richardson ex squid. Aliquip placeat salvia cillum iphone. Seitan aliquip quis cardigan american apparel, butcher voluptate nisi qui.</p>
              					</div>-->
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