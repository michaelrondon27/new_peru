<!DOCTYPE html>
<html>
	<?php
		include(HTML_DIR."overall/header.php");
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
			}
		}
	?>
	<body onload="deshabilitaRetroceso()">
    <?php
      include(HTML_DIR."overall/menu.php");
      include(HTML_DIR."overall/scripts.php");
    ?>
		<script src="asset/js/general.js"></script>
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
           	<h4>Información General del Alumno <?php echo $_alumno[$_GET['id']]['nombres']." ".$_alumno[$_GET['id']]['apellidos'];?></h4>
          </div>
          <div class="col-md-12 panel-body" style="padding-bottom:30px;">
           	<br>
           	<div class="col-md-12">
             	<form class="cmxform" method="post" action="?view=alumno&mode=AddGenerales&id=<?php echo $_GET['id'];?>" enctype="multipart/form-data" id="medicos">
             		<div class="col-md-12">
                  <div class="col-md-12">
                    <label style="font-size: 18px;color: #999C9E; text-align: justify;">Actitudes e Intereses Especiales</label>
                  </div>
                  <br><br><br>
             			<div class="form-group form-animate-text col-md-12" style="margin-top: -10px !important;">
                    <input type="text" class="form-text" name="extracurricular" id="extracurricular">
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
                        <input type="checkbox" class="checkbox" name="voleibol" id="voleibol" value="Si">
                        <label for="voleibol" class="personal_radio">Voleibol</label>
                      </div>
                      <div class="form-group col-md-3">
                        <input type="checkbox" class="checkbox" name="basquetbol" id="basquetbol" value="Si">
                        <label for="basquetbol" class="personal_radio">Básquetbol</label>
                      </div>
                      <div class="form-group col-md-3">
                        <input type="checkbox" class="checkbox" name="futbolito" id="futbolito" value="Si">
                        <label for="futbolito" class="personal_radio">Futbolito</label>
                      </div>
                      <div class="form-group col-md-3">
                        <input type="checkbox" class="checkbox" name="ajedrez" id="ajedrez" value="Si">
                        <label for="ajedrez" class="personal_radio">Ajedrez</label>
                      </div>
                      <div class="form-group col-md-3">
                        <input type="checkbox" class="checkbox" name="danza" id="danza" value="Si">
                        <label for="danza" class="personal_radio">Danza</label>
                      </div>
                      <div class="form-group col-md-3">
                        <input type="checkbox" class="checkbox" name="teatro" id="teatro" value="Si">
                        <label for="teatro" class="personal_radio">Teatro</label>
                      </div>
                      <div class="form-group col-md-3">
                        <input type="checkbox" class="checkbox" name="musica" id="musica" value="Si">
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
                        <input type="checkbox" class="checkbox" name="bolivariana" id="bolivariana" value="Si">
                        <label for="bolivariana" class="personal_radio">Sociedad Bolivariana</label>
                      </div>
                      <div class="form-group col-md-4">
                        <input type="checkbox" class="checkbox" name="cruz" id="cruz" value="Si">
                        <label for="cruz" class="personal_radio">Cruz Roja</label>
                      </div>
                      <div class="form-group col-md-4">
                        <input type="checkbox" class="checkbox" name="biblioteca" id="biblioteca" value="Si">
                        <label for="biblioteca" class="personal_radio">Biblioteca</label>
                      </div>
                      <div class="form-group col-md-4">
                        <input type="checkbox" class="checkbox" name="mantenimiento" id="mantenimiento" value="Si">
                        <label for="mantenimiento" class="personal_radio">Mantenimiento</label>
                      </div>
                      <div class="form-group col-md-4">
                        <input type="checkbox" class="checkbox" name="conservacion" id="conservacion" value="Si">
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
                        <div class="form-group col-md-2">
                          <input type="radio" class="radio" name="canaima" id="canaima_si" value="Si">
                          <label for="canaima_si" class="personal_radio">Sí</label>
                        </div>
                        <div class="form-group col-md-2">
                          <input type="radio" class="radio" name="canaima" id="canaima_no" value="No">
                          <label for="canaima_no" class="personal_radio">No</label>
                        </div>
                      </div>
                    </div>
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