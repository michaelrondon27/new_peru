<?php
	class Buscar{
		private $db;
		private $escolar;
		private $grado;

		////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		// metodo para abrir la conexion //
		public function __construct(){
			$this->db=new Conexion();
		}
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

		////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		// metodo para buscar secciones asignadas por año escolar //
		// ruta del archivo que envie los datos: html/configuracion/allGadoSecciones.php //
		public function SeccionnesAsignadasPorAñoEscolar(){
			$this->escolar=$_POST['escolar'];
			$sql=$this->db->query("SELECT e.escolar, g.grado, s.seccion FROM cupos c INNER JOIN escolar e ON c.id_escolar=e.id_escolar INNER JOIN grado g ON c.id_grado=g.id_grado INNER JOIN seccion s ON c.id_seccion=s.id_seccion WHERE c.id_escolar=$this->escolar;");
			$contador=1;
			?>
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
	          					<?php
	          						while($data=$this->db->recorrer($sql)){
										?>
											<tr>
												<td><?php echo $contador;?></td>
												<td><?php echo $data[0];?></td>
												<td><?php echo $data[1];?></td>
												<td><?php echo $data[2];?></td>
											</tr>
										<?php
										$contador++;
									}
	          					?>
	        				</tbody>
	          			</table>
	        		</div>
	      		</div>
	      		<script>
					$(document).ready(function(){
						$('#datatables-asignar').DataTable();
					});
				</script>
			<?php
		}
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

		////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		// metodo para buscar secciones asignadas por año escolar y por grado //
		// ruta del archivo que envie los datos: html/configuracion/allGadoSecciones.php //
		public function SeccionnesAsignadasPorAñoEscolarGrado(){
			$this->escolar=$_POST['escolar'];
			$this->grado=$_POST['grado'];
			$sql=$this->db->query("SELECT e.escolar, g.grado, s.seccion FROM cupos c INNER JOIN escolar e ON c.id_escolar=e.id_escolar INNER JOIN grado g ON c.id_grado=g.id_grado INNER JOIN seccion s ON c.id_seccion=s.id_seccion WHERE c.id_escolar=$this->escolar AND c.id_grado=$this->grado;");
			$contador=1;
			?>
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
	          					<?php
	          						while($data=$this->db->recorrer($sql)){
										?>
											<tr>
												<td><?php echo $contador;?></td>
												<td><?php echo $data[0];?></td>
												<td><?php echo $data[1];?></td>
												<td><?php echo $data[2];?></td>
											</tr>
										<?php
										$contador++;
									}
	          					?>
	        				</tbody>
	          			</table>
	        		</div>
	      		</div>
	      		<script>
					$(document).ready(function(){
						$('#datatables-asignar').DataTable();
					});
				</script>
			<?php
		}
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

		////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		// case para saber cuantos cupos hay disponible para la inscripcion //
		// ruta del archivo que envia los datos html/configuracio/addInscripcion.php //
		public function Cupos(){
			$this->escolar=$_POST['escolar'];
			$this->grado=$_POST['grado'];
			$this->seccion=$_POST['seccion'];
			$sql=$this->db->query("SELECT cupos, cerrado FROM cupos WHERE id_escolar=$this->escolar AND id_grado=$this->grado AND id_seccion=$this->seccion LIMIT 1;");
			if($this->db->rows($sql)>0){
				$data=$this->db->recorrer($sql);
				$sql1=$this->db->query("SELECT * FROM inscripcion WHERE id_escolar=$this->escolar AND id_grado=$this->grado AND id_seccion=$this->seccion;");
				$num=$this->db->rows($sql1);
				if($data[1]==0){
					if($data[0]>0){
						$disponible=$data[0]-$num;
						if($disponible>0){
							$sql2=$this->db->query("SELECT i.id_inscripcion FROM inscripcion i INNER JOIN alumnos a ON i.id_alum=a.id_alum WHERE i.id_escolar=$this->escolar AND i.id_grado=$this->grado AND i.id_seccion=$this->seccion AND a.sexo='Masculino';");
							$masculino=$this->db->rows($sql2);
							$sql3=$this->db->query("SELECT i.id_inscripcion FROM inscripcion i INNER JOIN alumnos a ON i.id_alum=a.id_alum WHERE i.id_escolar=$this->escolar AND i.id_grado=$this->grado AND i.id_seccion=$this->seccion AND a.sexo='Femenino';");
							$femenino=$this->db->rows($sql3);
							?>
								<div class="col-md-12 text-success">Cupos en esta sección: <?php echo $data[0];?>, Cupos disponibles: <?php echo $disponible;?>, Masculino: <?php echo $masculino;?> y Femenino: <?php echo $femenino;?></div>
							<?php
							$this->db->liberar($sql2);
							$this->db->liberar($sql3);
						}else{
							?>
								<div class="col-md-12 text-danger">No quedan cupos disponibles para esta sección.</div>
							<?php
						}
					}else{
						?>
							<div class="text-warning col-md-12">La sección seleccionada no tiene cupos asignados.</div>
						<?php
					}
				}else{
					?>
						<div class="text-warning col-md-12">Este año escolar se encuentra cerrado.</div>
					<?php
				}	
			}else{
				?>
					<div class="text-warning col-md-12">La sección seleccionada no esta aperturada.</div>
				<?php
			}
			$this->db->liberar($sql);
			$this->db->liberar($sql1);
		}
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

		////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		// metodo para buscar por año escolar los cupos asignados //
		// ruta del archivo que envie los datos: html/configuracion/allGadoSecciones.php //
		public function CuposAsignadosPorAñoEscolar(){
			$this->escolar=$_POST['escolar'];
			$sql=$this->db->query("SELECT e.escolar, g.grado, s.seccion, c.cupos, c.id_cupo, c.cerrado FROM cupos c INNER JOIN escolar e ON c.id_escolar=e.id_escolar INNER JOIN grado g ON c.id_grado=g.id_grado INNER JOIN seccion s ON c.id_seccion=s.id_seccion WHERE c.id_escolar=$this->escolar;");
			$contador=1;
			?>
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
	          					<?php
	          						while($data=$this->db->recorrer($sql)){
	          							if($data[3]>0){
	          								?>
												<tr>
													<td><?php echo $contador;?></td>
													<td><?php echo $data[0];?></td>
													<td><?php echo $data[1];?></td>
													<td><?php echo $data[2];?></td>
													<td><?php echo $data[3];?></td>
													<?php
														if($data[5]==0){
															?>
																<td>
																	<a href="?view=config&mode=EditCupos&id=<?php echo $data[4];?>">
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
	      		<script>
					$(document).ready(function(){
						$('#datatables-cupos').DataTable();
					});
				</script>
			<?php
		}
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

		////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		// metodo para buscar secciones asignadas por año escolar y por grado //
		// ruta del archivo que envie los datos: html/configuracion/allGadoSecciones.php //
		public function SeccionesAsignadosParaCupos(){
			$this->escolar=$_POST['escolar'];
			$this->grado=$_POST['grado'];
			$this->seccion=$_POST['seccion'];
			$sql=$this->db->query("SELECT cupos FROM cupos WHERE id_escolar=$this->escolar AND id_grado=$this->grado AND id_seccion=$this->seccion LIMIT 1;");
			if($this->db->rows($sql)>0){
				$data=$this->db->recorrer($sql);
				if($data[0]==0){
					?>
						<div class="form-group form-animate-text col-md-1 col-sm-1 col-xs-1" style="margin-top:0px !important;">
							<label>Cupo:</label>
						</div>
						<div class="form-group form-animate-text col-md-9 col-sm-9 col-xs-9" style="margin-top:0px !important;">
							<input type="text" class="form-text" id="cupo" name="cupo" required onkeypress="return solonumeros(event)">
						</div>
					<?php
				}else{
					?>
						<div class="col-md-12">La sección seleccionada ya tiene los cupos asignados, si desea editarlo en la parte de abajo lo puede hacer.</div>
					<?php
				}				
			}else{
				?>
					<div class="col-md-12">La sección seleccionada no esta aperturada.</div>
				<?php
			}
			$this->db->liberar($sql);
		}
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

		////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		// metodo para buscar a los alumnos inscritos y listarlos //
		// ruta del archivo que envie los datos: html/inscripcion/allInscripcion.php //
		public function ListarInscritos(){
			$this->escolar=$_POST['escolar'];
			$this->grado=$_POST['grado'];
			$this->seccion=$_POST['seccion'];
			if(!empty($this->escolar) && empty($this->grado) && empty($this->seccion)){
				$sql=$this->db->query("SELECT a.id_alum, a.foto_carnet, a.cedula, a.nombres, a.apellidos, i.fecha, e.escolar, g.grado, s.seccion, i.condicion, i.id_inscripcion FROM inscripcion i INNER JOIN alumnos a ON i.id_alum=a.id_alum INNER JOIN escolar e ON i.id_escolar=e.id_escolar INNER JOIN grado g ON i.id_grado=g.id_grado INNER JOIN seccion s ON i.id_seccion=s.id_seccion WHERE i.id_escolar=$this->escolar ORDER BY a.cedula;");
			}else if(!empty($this->escolar) && !empty($this->grado) && empty($this->seccion)){
				$sql=$this->db->query("SELECT a.id_alum, a.foto_carnet, a.cedula, a.nombres, a.apellidos, i.fecha, e.escolar, g.grado, s.seccion, i.condicion, i.id_inscripcion FROM inscripcion i INNER JOIN alumnos a ON i.id_alum=a.id_alum INNER JOIN escolar e ON i.id_escolar=e.id_escolar INNER JOIN grado g ON i.id_grado=g.id_grado INNER JOIN seccion s ON i.id_seccion=s.id_seccion WHERE i.id_escolar=$this->escolar AND i.id_grado=$this->grado ORDER BY a.cedula;");
			}else if(!empty($this->escolar) && !empty($this->grado) && !empty($this->seccion)){
				$sql=$this->db->query("SELECT a.id_alum, a.foto_carnet, a.cedula, a.nombres, a.apellidos, i.fecha, e.escolar, g.grado, s.seccion, i.condicion, i.id_inscripcion FROM inscripcion i INNER JOIN alumnos a ON i.id_alum=a.id_alum INNER JOIN escolar e ON i.id_escolar=e.id_escolar INNER JOIN grado g ON i.id_grado=g.id_grado INNER JOIN seccion s ON i.id_seccion=s.id_seccion WHERE i.id_escolar=$this->escolar AND i.id_grado=$this->grado AND i.id_seccion=$this->seccion ORDER BY a.cedula;");
			}
			if($this->db->rows($sql)>0){
				if($this->seccion!=""){
					?>
						<div class="col-md-12">
							<div class="col-md-2">
					            <p class="animated fadeInLeft">
					             	<a class="btn btn-teal" href="?view=inscripcion&mode=ListadoPdf&escolar=<?php echo $this->escolar;?>&grado=<?php echo $this->grado;?>&seccion=<?php echo $this->seccion;?>" target="_blank">Listado PDF <i class="fa fa-file-pdf-o" aria-hidden="true"></i></a>
					            </p>
					        </div>
					        <div class="col-md-2">
					            <p class="animated fadeInLeft">
					             	<a class="btn btn-teal" href="?view=inscripcion&mode=ListadoExcel&escolar=<?php echo $this->escolar;?>&grado=<?php echo $this->grado;?>&seccion=<?php echo $this->seccion;?>" target="_blank">Listado Excel <i class="fa fa-file-excel-o" aria-hidden="true"></i></a>
					            </p>
					        </div>
						</div>
					<?php
				}
				?>
					<table id="datatables-example" class="table table-striped table-bordered" width="100%" cellspacing="0">
                  		<thead>
                  			<tr>
                    			<th style="width: 20px; text-align: center;">N°</th>
    							<th style="text-align: center;">Foto</th>
    							<th style="text-align: center;">Cédula</th>
    							<th style="text-align: center;">Nombres y Apellidos</th>
    							<th style="text-align: center;">Fecha de Inscripción</th>
    							<th style="text-align: center;">Año escolar</th>
    							<th style="text-align: center;">Grado</th>
    							<th style="text-align: center;">Sección</th>
    							<th style="text-align: center;">Condición</th>
                        		<th style="text-align: center;">Planilla</th>		
    						</tr>
                    	</thead>
                    	<tbody>
                    		<?php
                    			$contador=1;
                    			while($data=$this->db->recorrer($sql)){
                    				?>
                    					<tr>
		                					<td style="width: 20px; text-align: center;"><?php echo $contador;?></td>
		                					<td style="text-align: center;"><img src="asset/images/<?php echo $data[1];?>" class="img-circle avatar" alt="user name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"/></td>
		                					<td style="text-align: center;"><a href="?view=alumno&mode=VerAlumno&id=<?php echo $data[0];?>"><?php echo $data[2];?></a></td>
		                					<td style="text-align: center;"><?php echo $data[3]." ".$data[4];?></td>
		                					<td style="text-align: center;"><?php echo date("d-m-Y", strtotime($data[5]));?></td>
		                					<td style="text-align: center;"><?php echo $data[6];?></td>
		                					<td style="text-align: center;"><?php echo $data[7];?></td>
		                					<td style="text-align: center;"><?php echo $data[8];?></td>
		                					<td style="text-align: center;"><?php echo $data[9];?></td>
		                					<td style="text-align: center;"><a href="?view=inscripcion&mode=planillaInscripcion&id=<?php echo $data[10];?>" target="_blank"><i class="fa fa-file-pdf-o color-teal" aria-hidden="true"></i></a></td>
		                				</tr>
                    				<?php
                    				$contador++;
                    			}
                    		?>
                    	</tbody>
                  	</table>
				<?php
			}else{
				?>
					<table id="datatables-example" class="table table-striped table-bordered" width="100%" cellspacing="0">
                  		<thead>
                  			<tr>
                    			<th style="width: 20px; text-align: center;">N°</th>
    							<th style="text-align: center;">Foto</th>
    							<th style="text-align: center;">Cédula</th>
    							<th style="text-align: center;">Nombres y Apellidos</th>
    							<th style="text-align: center;">Fecha de Inscripción</th>
    							<th style="text-align: center;">Año escolar</th>
    							<th style="text-align: center;">Grado</th>
    							<th style="text-align: center;">Sección</th>
    							<th style="text-align: center;">Condición</th>
                        		<th style="text-align: center;">Planilla</th>		
    						</tr>
                    	</thead>
                    	<tbody>
                    		<td colspan="10" style="text-align: center;">No hay registros.</td>
                    	</tbody>
                  	</table>
				<?php
			}
		}
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

		////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		// metodo para buscar las notas de los alumnos //
		// ruta del archivo que envie los datos: html/inscripcion/allNotas.php //
		public function ListarNotas(){
			$this->escolar=$_POST['escolar'];
			$this->grado=$_POST['grado'];
			$this->seccion=$_POST['seccion'];
			if(!empty($this->escolar) && empty($this->grado) && empty($this->seccion)){
				$sql=$this->db->query("SELECT a.foto_carnet, a.cedula, a.nombres, a.apellidos, e.escolar, g.grado, s.seccion, n.aprobo FROM notas n INNER JOIN alumnos a ON n.id_alum=a.id_alum INNER JOIN escolar e ON n.escolar=e.id_escolar INNER JOIN grado g ON n.grado=g.id_grado INNER JOIN seccion s ON n.seccion=s.id_seccion WHERE n.escolar=$this->escolar ORDER BY a.cedula;");
			}else if(!empty($this->escolar) && !empty($this->grado) && empty($this->seccion)){
				$sql=$this->db->query("SELECT a.foto_carnet, a.cedula, a.nombres, a.apellidos, e.escolar, g.grado, s.seccion, n.aprobo FROM notas n INNER JOIN alumnos a ON n.id_alum=a.id_alum INNER JOIN escolar e ON n.escolar=e.id_escolar INNER JOIN grado g ON n.grado=g.id_grado INNER JOIN seccion s ON n.seccion=s.id_seccion WHERE n.escolar=$this->escolar AND n.grado=$this->grado ORDER BY a.cedula;");
			}else if(!empty($this->escolar) && !empty($this->grado) && !empty($this->seccion)){
				$sql=$this->db->query("SELECT a.foto_carnet, a.cedula, a.nombres, a.apellidos, e.escolar, g.grado, s.seccion, n.aprobo FROM notas n INNER JOIN alumnos a ON n.id_alum=a.id_alum INNER JOIN escolar e ON n.escolar=e.id_escolar INNER JOIN grado g ON n.grado=g.id_grado INNER JOIN seccion s ON n.seccion=s.id_seccion WHERE n.escolar=$this->escolar AND n.grado=$this->grado AND n.seccion=$this->seccion ORDER BY a.cedula;");
			}
			if($this->db->rows($sql)>0){
				?>
					<table id="datatables-example" class="table table-striped table-bordered" width="100%" cellspacing="0">
                  		<thead>
                  			<tr>
                    			<th style="width: 20px; text-align: center;">N°</th>
							    <th style="text-align: center;">Foto</th>
							    <th style="text-align: center;">Cédula</th>
							    <th style="text-align: center;">Nombres y Apellidos</th>
							    <th style="text-align: center;">Año escolar</th>
							    <th style="text-align: center;">Grado</th>
							    <th style="text-align: center;">Sección</th>
							    <th style="text-align: center;">Aprobado</th>			
    						</tr>
                    	</thead>
                    	<tbody>
                    		<?php
                    			$contador=1;
                    			while($data=$this->db->recorrer($sql)){
                    				?>
                    					<tr>
		                					<td style="width: 20px; text-align: center;"><?php echo $contador;?></td>
		                					<td style="text-align: center;"><img src="asset/images/<?php echo $data[0];?>" class="img-circle avatar" alt="user name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"/></td>
		                					<td style="text-align: center;"><a href="?view=alumno&mode=VerAlumno&id=<?php echo $data[1];?>"><?php echo $data[2];?></a></td>
		                					<td style="text-align: center;"><?php echo $data[2]." ".$data[3];?></td>
		                					<td style="text-align: center;"><?php echo $data[4];?></td>
		                					<td style="text-align: center;"><?php echo $data[5];?></td>
		                					<td style="text-align: center;"><?php echo $data[6];?></td>
		                					<td style="text-align: center;"><?php echo strtoupper($data[7]);?></td>
		                				</tr>
                    				<?php
                    				$contador++;
                    			}
                    		?>
                    	</tbody>
                  	</table>
				<?php
			}else{
				?>
					<table id="datatables-example" class="table table-striped table-bordered" width="100%" cellspacing="0">
                  		<thead>
                  			<tr>
                    			<th style="width: 20px; text-align: center;">N°</th>
							    <th style="text-align: center;">Foto</th>
							    <th style="text-align: center;">Cédula</th>
							    <th style="text-align: center;">Nombres y Apellidos</th>
							    <th style="text-align: center;">Año escolar</th>
							    <th style="text-align: center;">Grado</th>
							    <th style="text-align: center;">Sección</th>
							    <th style="text-align: center;">Aprobado</th>		
    						</tr>
                    	</thead>
                    	<tbody>
                    		<td colspan="10" style="text-align: center;">No hay registros.</td>
                    	</tbody>
                  	</table>
				<?php
			}
		}
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

		////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		// metodo para listar a los alumnos regulares //
		// ruta del archivo que envia los datos html/inscripcion/addRegulares.php //
		public function ListarRegulares(){
			$this->escolar=$_POST['escolar'];
			$this->grado=$_POST['grado'];
			$this->seccion=$_POST['seccion'];
			if(!empty($this->escolar) && empty($this->grado) && empty($this->seccion)){
				$sql=$this->db->query("SELECT a.foto_carnet, a.cedula, a.nombres, a.apellidos, e.escolar, g.grado, s.seccion FROM inscripcion i INNER JOIN alumnos a ON i.id_alum=a.id_alum INNER JOIN escolar e ON i.id_escolar=e.id_escolar INNER JOIN grado g ON i.id_grado=g.id_grado INNER JOIN seccion s ON i.id_seccion=s.id_seccion WHERE i.id_escolar=$this->escolar AND procesado=0 ORDER BY a.cedula;");
			}else if(!empty($this->escolar) && !empty($this->grado) && empty($this->seccion)){
				$sql=$this->db->query("SELECT a.foto_carnet, a.cedula, a.nombres, a.apellidos, e.escolar, g.grado, s.seccion FROM inscripcion i INNER JOIN alumnos a ON i.id_alum=a.id_alum INNER JOIN escolar e ON i.id_escolar=e.id_escolar INNER JOIN grado g ON i.id_grado=g.id_grado INNER JOIN seccion s ON i.id_seccion=s.id_seccion WHERE i.id_escolar=$this->escolar AND i.id_grado=$this->grado AND procesado=0 ORDER BY a.cedula;");
			}else if(!empty($this->escolar) && !empty($this->grado) && !empty($this->seccion)){
				$sql=$this->db->query("SELECT a.foto_carnet, a.cedula, a.nombres, a.apellidos, e.escolar, g.grado, s.seccion FROM inscripcion i INNER JOIN alumnos a ON i.id_alum=a.id_alum INNER JOIN escolar e ON i.id_escolar=e.id_escolar INNER JOIN grado g ON i.id_grado=g.id_grado INNER JOIN seccion s ON i.id_seccion=s.id_seccion WHERE i.id_escolar=$this->escolar AND i.id_grado=$this->grado AND i.id_seccion=$this->seccion AND procesado=0 ORDER BY a.cedula;");
			}
			if($this->db->rows($sql)>0){
				?>
					<div class="col-md-12">
						<div class="col-md-2">
				            <p class="animated fadeInLeft">
				            	<form action="?view=inscripcion&mode=AddRegulares" method="POST">
				            		<input type="hidden" name="escolar" value="<?php echo $this->escolar;?>">
				            		<input type="hidden" name="grado" value="<?php echo $this->grado;?>">
				            		<input type="hidden" name="seccion" value="<?php echo $this->seccion;?>">
				            		<button class="submit btn btn-teal">Procesar <i class="fa fa-refresh" aria-hidden="true"></i></button>
				            	</form>
				            </p>
				        </div>
					</div>
					<table id="datatables-example" class="table table-striped table-bordered" width="100%" cellspacing="0">
                  		<thead>
                  			<tr>
                    			<th style="width: 20px; text-align: center;">N°</th>
							    <th style="text-align: center;">Foto</th>
							    <th style="text-align: center;">Cédula</th>
							    <th style="text-align: center;">Nombres y Apellidos</th>
							    <th style="text-align: center;">Año escolar</th>
							    <th style="text-align: center;">Grado</th>
							    <th style="text-align: center;">Sección</th>			
    						</tr>
                    	</thead>
                    	<tbody>
                    		<?php
                    			$contador=1;
                    			while($data=$this->db->recorrer($sql)){
                    				?>
                    					<tr>
		                					<td style="width: 20px; text-align: center;"><?php echo $contador;?></td>
		                					<td style="text-align: center;"><img src="asset/images/<?php echo $data[0];?>" class="img-circle avatar" alt="user name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"/></td>
		                					<td style="text-align: center;"><a href="?view=alumno&mode=VerAlumno&id=<?php echo $data[1];?>"><?php echo $data[2];?></a></td>
		                					<td style="text-align: center;"><?php echo $data[2]." ".$data[3];?></td>
		                					<td style="text-align: center;"><?php echo $data[4];?></td>
		                					<td style="text-align: center;"><?php echo $data[5];?></td>
		                					<td style="text-align: center;"><?php echo $data[6];?></td>
		                				</tr>
                    				<?php
                    				$contador++;
                    			}
                    		?>
                    	</tbody>
                  	</table>
				<?php
			}else{
				?>
					<table id="datatables-example" class="table table-striped table-bordered" width="100%" cellspacing="0">
                  		<thead>
                  			<tr>
                    			<th style="width: 20px; text-align: center;">N°</th>
							    <th style="text-align: center;">Foto</th>
							    <th style="text-align: center;">Cédula</th>
							    <th style="text-align: center;">Nombres y Apellidos</th>
							    <th style="text-align: center;">Año escolar</th>
							    <th style="text-align: center;">Grado</th>
							    <th style="text-align: center;">Sección</th>
							    <th style="text-align: center;">Aprobado</th>		
    						</tr>
                    	</thead>
                    	<tbody>
                    		<td colspan="10" style="text-align: center;">No hay registros para procesar.</td>
                    	</tbody>
                  	</table>
				<?php
			}
		}
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

		////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		// metodo para cerrar la conexion //
		public function __destruct(){
			$this->db->close();
		}
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	}
?>