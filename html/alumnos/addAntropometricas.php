<!DOCTYPE html>
<html>
	<?php
		include(HTML_DIR."overall/header.php");
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
		<script src="asset/js/antropometricas.js"></script>
		<div id="content">
      <div class="panel box-shadow-none content-header">
        <div class="panel-body">
          <div class="col-md-9">
            <p class="animated fadeInDown">
             	Registrar <span class="fa-angle-right fa"></span> Nuevo Alumno
            </p>
          </div>
        </div>
      </div>
      <div class="col-md-10 col-md-offset-1">
        <div class="col-md-12 panel">
          <div class="col-md-12 panel-heading">
           	<h4>Registrar Medidas Antropometricas del Alumno <?php echo $_alumno[$_GET['id']]['nombres']." ".$_alumno[$_GET['id']]['apellidos']?></h4>
          </div>
          <div class="col-md-12 panel-body" style="padding-bottom:30px;">
           	<p>Los campos con (*) son obligatorios.</p>
           	<br>
           	<div class="col-md-12">
             	<form class="cmxform" method="post" action="?view=alumno&mode=AddAntropometricas&id=<?php echo $_GET['id'];?>" enctype="multipart/form-data">
             		<div class="col-md-12">
             			<div class="form-group form-animate-text col-md-3" style="margin-top: -10px !important;">
               			<input type="text" class="form-text" name="peso" id="peso" onkeypress="return solonumeros2(event)">
               			<span class="bar"></span>
               			<label>Peso (kg):</label>
               		</div>
              		<div class="form-group form-animate-text col-md-3" style="margin-top: -10px !important;">
                    <input type="text" class="form-text" name="parado" id="parado" onkeypress="return solonumeros2(event)">
                    <span class="bar"></span>
                    <label>Talla Parado (cm):</label>
                  </div>
              		<div class="form-group form-animate-text col-md-3" style="margin-top: -10px !important;">
                    <input type="text" class="form-text" name="sentado" id="sentado" onkeypress="return solonumeros2(event)">
                    <span class="bar"></span>
                    <label>Talla Sentado (cm):</label>
                  </div>
              		<div class="form-group form-animate-text col-md-3" style="margin-top: -10px !important;">
                    <input type="text" class="form-text" name="brazada" id="brazada" onkeypress="return solonumeros2(event)">
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
                      <input type="text" class="form-text" name="salto" id="salto" onkeypress="return solonumeros2(event)">
                      <span class="bar"></span>
                      <label for="salto">Salto sin impulso (cm):</label>
                    </div>
                    <div class="form-group form-animate-text col-md-3">
                      <input type="text" class="form-text" name="abdominales" id="abdominales" onkeypress="return solonumeros2(event)">
                      <span class="bar"></span>
                      <label for="abdominales">Abdominales en 30 seg (u):</label>
                    </div>
                    <div class="form-group form-animate-text col-md-3">
                      <input type="text" class="form-text" name="flexiones" id="flexiones" onkeypress="return solonumeros2(event)">
                      <span class="bar"></span>
                      <label for="flexiones">Flexiones de brazo (u):</label>
                    </div>
                    <div class="form-group form-animate-text col-md-3">
                      <input type="text" class="form-text" name="suma" id="suma" onkeypress="return deshabilitarteclas(event)">
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
                      <input type="text" class="form-text" name="velocidad" id="velocidad" onkeypress="return solonumeros2(event)">
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
                      <input type="text" class="form-text" name="flexion" id="flexion" onkeypress="return solonumeros2(event)">
                      <span class="bar"></span>
                      <label for="flexion">Flexión ventral (cm):</label>
                    </div>
                    <div class="form-group form-animate-text col-md-4">
                      <input type="text" class="form-text" name="resistencia" id="resistencia" onkeypress="return solonumeros2(event)">
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
        $(window).on('beforeunload', function(){
          return "You have unsaved changes!";
        });
        $(document).on("submit", "form", function(event){
          $(window).off('beforeunload');
        });
			});
		</script>
	</body>
</html>