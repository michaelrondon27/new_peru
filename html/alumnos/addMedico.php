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
           	<h4>Antecedentes Médicos del Alumno <?php echo $_alumno[$_GET['id']]['nombres']." ".$_alumno[$_GET['id']]['apellidos'];?></h4>
          </div>
          <div class="col-md-12 panel-body" style="padding-bottom:30px;">
           	<br>
           	<div class="col-md-12">
             	<form class="cmxform" method="post" action="?view=alumno&mode=AddMedico&id=<?php echo $_GET['id'];?>" enctype="multipart/form-data" id="medicos">
             		<div class="col-md-12">
             			<div class="form-group form-animate-text col-md-4" >                            
                    <select class="form-control" name="sangre" id="sangre">
                      <?php
                        foreach($_sangre as $sangre){
                          if($sangre['id_tipo_sangre']==1){
                            ?>
                              <option selected value="<?php echo $sangre['id_tipo_sangre'];?>">Seleccione</option>
                            <?php
                          }else{
                            ?>
                              <option value="<?php echo $sangre['id_tipo_sangre'];?>"><?php echo $sangre['sangre'];?></option>
                            <?php
                          }
                        }
                      ?>
                    </select>
                    <span class="bar"></span>
                    <label for="sangre" style="top: -18px;font-size: 14px;color: #999C9E;">Grupo Sanguíneo:</label>
                  </div>
                  <div class="form-group form-animate-text col-md-4" >                            
                    <select class="form-control" name="lateralidad" id="lateralidad">
                      <option value="">Seleccione</option>
                      <option value="Diestro">Diestro</option>
                      <option value="Zurdo">Zurdo</option>
                      <option value="Ambidiestro">Ambidiestro</option>
                    </select>
                    <span class="bar"></span>
                    <label for="lateralidad" style="top: -18px;font-size: 14px;color: #999C9E;">Lateralidad:</label>
                  </div>
                  <div class="col-md-4 personalizado">
                    <div class="col-md-5">
                      <label style="font-size: 14px;color: #999C9E;">Usa Lentes:</label>
                    </div>
                    <div class="col-md-7">
                      <div class="form-group col-md-6">
                        <input type="radio" class="radio" name="lentes" id="lentes_si" value="Si">
                        <label for="lentes_si" class="personal_radio">Sí</label>
                      </div>
                      <div class="form-group col-md-6">
                        <input type="radio" class="radio" name="lentes" id="lentes_no" value="No">
                        <label for="lentes_no" class="personal_radio">No</label>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12" style="top: -20px;">
                    <p style="border-top: 1px solid #999C9E !important;"></p>
                  </div>
                  <div class="col-md-4 personalizado" style="clear: both;">
                    <div class="col-md-5">
                      <label style="font-size: 14px;color: #999C9E;">Oye Bien:</label>
                    </div>
                    <div class="col-md-7">
                      <div class="form-group col-md-6">
                        <input type="radio" class="radio" name="oido" id="oido_si" value="Si">
                        <label for="oido_si" class="personal_radio">Sí</label>
                      </div>
                      <div class="form-group col-md-6">
                        <input type="radio" class="radio" name="oido" id="oido_no" value="No">
                        <label for="oido_no" class="personal_radio">No</label>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-8 personalizado">
                    <div class="col-md-4">
                      <label style="font-size: 14px;color: #999C9E;">Seleccione si ha sufrido:</label>
                    </div>
                    <div class="col-md-8">
                      <div class="form-group col-md-4">
                        <input type="checkbox" class="checkbox" name="sarampion" id="sarampion" value="Si">
                        <label for="sarampion" class="personal_radio">Sarampión</label>
                      </div>
                      <div class="form-group col-md-4">
                        <input type="checkbox" class="checkbox" name="rubeola" id="rubeola" value="Si">
                        <label for="rubeola" class="personal_radio">Rubéola</label>
                      </div>
                      <div class="form-group col-md-4">
                        <input type="checkbox" class="checkbox" name="paperas" id="paperas" value="Si">
                        <label for="paperas" class="personal_radio">Paperas</label>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <p style="border-top: 1px solid #999C9E !important;"></p>
                  </div>
                  <div class="col-md-12 personalizado">
                    <div class="col-md-12">
                      <label style="font-size: 14px;color: #999C9E; text-align: justify;">Seleccione si sufre o tiene antecedentes de algunas de estas afecciones médicas:</label>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group col-md-4">
                        <input type="checkbox" class="checkbox" name="diabetes" id="diabetes" value="Si">
                        <label for="diabetes" class="personal_radio">Diabetes</label>
                      </div>
                      <div class="form-group col-md-4">
                        <input type="checkbox" class="checkbox" name="hipertension" id="hipertension" value="Si">
                        <label for="hipertension" class="personal_radio">Hipertensión</label>
                      </div>
                      <div class="form-group col-md-4">
                        <input type="checkbox" class="checkbox" name="cardiopatia" id="cardiopatia" value="Si">
                        <label for="cardiopatia" class="personal_radio">Cardipatía</label>
                      </div>
                      <div class="form-group col-md-4">
                        <input type="checkbox" class="checkbox" name="asma" id="asma" value="Si">
                        <label for="asma" class="personal_radio">Asma</label>
                      </div>
                      <div class="form-group col-md-4">
                        <input type="checkbox" class="checkbox" name="alergias" id="alergias" value="Si">
                        <label for="alergias" class="personal_radio">Alergías</label>
                      </div>
                      <div class="form-group form-animate-text col-md-4" style="margin-top: -10px !important;">
                        <input type="text" class="form-text" name="otras" id="otras">
                        <span class="bar"></span>
                        <label for="otras">Otras:</label>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12" style="top: -10px;">
                    <p style="border-top: 1px solid #999C9E !important;"></p>
                  </div>
                  <div class="col-md-12 personalizado">
                    <div class="col-md-12">
                      <div class="col-md-4" style="top: 15px;">
                        <label for="diversidad" style="font-size: 14px;color: #999C9E; text-align: justify;">Presenta alguna diversidad funcional:</label>
                      </div>
                      <div class="form-group form-animate-text col-md-8">
                        <input type="text" class="form-text" name="diversidad" id="diversidad">
                        <span class="bar"></span>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12" style="top: -10px;">
                    <p style="border-top: 1px solid #999C9E !important;"></p>
                  </div>
                  <div class="col-md-12 personalizado">
                    <div class="col-md-12">
                      <label style="font-size: 14px;color: #999C9E; text-align: justify;">Ha sido tratado por algunos de estos especialistas:</label>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group col-md-3">
                        <input type="checkbox" class="checkbox" name="psicologo1" id="psicologo1" value="Si">
                        <label for="psicologo1" class="personal_radio">Psicólogo</label>
                      </div>
                      <div class="form-group col-md-3">
                        <input type="checkbox" class="checkbox" name="tera_lenguaje1" id="tera_lenguaje1" value="Si">
                        <label for="tera_lenguaje1" class="personal_radio">Terapista de Lenguaje</label>
                      </div>
                      <div class="form-group col-md-3">
                        <input type="checkbox" class="checkbox" name="neurologo1" id="neurologo1" value="Si">
                        <label for="neurologo1" class="personal_radio">Neurólogo</label>
                      </div>
                      <div class="form-group col-md-3">
                        <input type="checkbox" class="checkbox" name="tera_ocupacional1" id="tera_ocupacional1" value="Si">
                        <label for="tera_ocupacional1" class="personal_radio">Terapia Ocupacional</label>
                      </div>
                      <div class="form-group col-md-3">
                        <input type="checkbox" class="checkbox" name="psiquiatria1" id="psiquiatria1" value="Si">
                        <label for="psiquiatria1" class="personal_radio">Psiquiatría</label>
                      </div>
                      <div class="form-group col-md-3">
                        <input type="checkbox" class="checkbox" name="odontologia1" id="odontologia1" value="Si">
                        <label for="odontologia1" class="personal_radio">Odontología</label>
                      </div>
                      <div class="form-group col-md-2">
                        <input type="checkbox" class="checkbox" name="dermatologia1" id="dermatologia1" value="Si">
                        <label for="dermatologia1" class="personal_radio">Dermatología</label>
                      </div>
                      <div class="form-group col-md-2">
                        <input type="checkbox" class="checkbox" name="fisiatria1" id="fisiatria1" value="Si">
                        <label for="fisiatria1" class="personal_radio">Fisiatría</label>
                      </div>
                      <div class="form-group col-md-2">
                        <input type="checkbox" class="checkbox" name="psicopedagogia1" id="psicopedagogia1" value="Si">
                        <label for="psicopedagogia1" class="personal_radio">Psicopedagodía</label>
                      </div>
                      <div class="form-group form-animate-text col-md-12">
                        <input type="text" class="form-text" name="otros1" id="otros1">
                        <span class="bar"></span>
                        <label for="otros1">Otro(s):</label>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12" style="top: -10px;">
                    <p style="border-top: 1px solid #999C9E !important;"></p>
                  </div>
                  <div class="col-md-12 personalizado">
                    <div class="col-md-12">
                      <label style="font-size: 14px;color: #999C9E; text-align: justify;">Está siendo tratado por algún especialistas:</label>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group col-md-3">
                        <input type="checkbox" class="checkbox" name="psicologo2" id="psicologo2" value="Si">
                        <label for="psicologo2" class="personal_radio">Psicólogo</label>
                      </div>
                      <div class="form-group col-md-3">
                        <input type="checkbox" class="checkbox" name="tera_lenguaje2" id="tera_lenguaje2" value="Si">
                        <label for="tera_lenguaje2" class="personal_radio">Terapista de Lenguaje</label>
                      </div>
                      <div class="form-group col-md-3">
                        <input type="checkbox" class="checkbox" name="neurologo2" id="neurologo2" value="Si">
                        <label for="neurologo2" class="personal_radio">Neurólogo</label>
                      </div>
                      <div class="form-group col-md-3">
                        <input type="checkbox" class="checkbox" name="tera_ocupacional2" id="tera_ocupacional2" value="Si">
                        <label for="tera_ocupacional2" class="personal_radio">Terapia Ocupacional</label>
                      </div>
                      <div class="form-group col-md-3">
                        <input type="checkbox" class="checkbox" name="psiquiatria2" id="psiquiatria2" value="Si">
                        <label for="psiquiatria2" class="personal_radio">Psiquiatría</label>
                      </div>
                      <div class="form-group col-md-3">
                        <input type="checkbox" class="checkbox" name="odontologia2" id="odontologia2" value="Si">
                        <label for="odontologia2" class="personal_radio">Odontología</label>
                      </div>
                      <div class="form-group col-md-2">
                        <input type="checkbox" class="checkbox" name="dermatologia2" id="dermatologia2" value="Si">
                        <label for="dermatologia2" class="personal_radio">Dermatología</label>
                      </div>
                      <div class="form-group col-md-2">
                        <input type="checkbox" class="checkbox" name="fisiatria2" id="fisiatria2" value="Si">
                        <label for="fisiatria2" class="personal_radio">Fisiatría</label>
                      </div>
                      <div class="form-group col-md-2">
                        <input type="checkbox" class="checkbox" name="psicopedagogia2" id="psicopedagogia2" value="Si">
                        <label for="psicopedagogia2" class="personal_radio">Psicopedagodía</label>
                      </div>
                      <div class="form-group form-animate-text col-md-6">
                        <input type="text" class="form-text" name="otros2" id="otros2">
                        <span class="bar"></span>
                        <label for="otros2">Otro(s):</label>
                      </div>
                      <div class="form-group form-animate-text col-md-6">
                        <input type="text" class="form-text" name="tratamiento" id="tratamiento">
                        <span class="bar"></span>
                        <label for="tratamiento">Lugar de Tratamiento:</label>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12" style="top: -10px;">
                    <p style="border-top: 1px solid #999C9E !important;"></p>
                  </div>
                  <div class="form-group form-animate-text col-md-12">
                    <input type="text" class="form-text" name="medicado" id="medicado">
                    <span class="bar"></span>
                    <label for="medicado">Se encuentra actualmente medicado:</label>
                  </div>
                  <div class="form-group form-animate-text col-md-12">
                    <input type="text" class="form-text" name="impedimiento" id="impedimiento">
                    <span class="bar"></span>
                    <label for="impedimiento">Tiene algún impedimiento para realizar Educación Física y Deportes:</label>
                  </div>
                  <div class="form-group form-animate-text col-md-12">
                    <input type="text" class="form-text" name="seguro" id="seguro">
                    <span class="bar"></span>
                    <label for="seguro">Goza de seguro médico, indique cuál:</label>
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