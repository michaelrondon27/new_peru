<!DOCTYPE html>
<html>
	<?php
    if($_users[$_SESSION['app_id']]['id_tipo_usu']==1 || $_users[$_SESSION['app_id']]['id_tipo_usu']==2){
  		include(HTML_DIR."overall/header.php");
  	  ?>
	      <body>
          <?php
            include(HTML_DIR."overall/menu.php");
            include(HTML_DIR."overall/scripts.php");
          ?>
		      <script>
			      $(document).ready(function(){
				      $("#escolar").change(function(){
					      var escolar=document.getElementById("escolar").value;
					      var grado=document.getElementById("grado").value="";
                var seccion=document.getElementById("seccion").value="";
                grado=document.getElementById("grado").value;
                seccion=document.getElementById("seccion").value;
                var mode=7;
                if(escolar!=""){
                  $.ajax({
                    type: "POST",
                    url: "core/controllers/buscarController.php",
                    data:{
                      "escolar":escolar,
                      "grado":grado,
                      "seccion":seccion,
                      "mode":mode
                    },
                    success: function(resp){
                      if(resp!=""){
                        $("#resultados").html(resp);
                      }
                    }
                  });
                }
				      });
              $("#grado").change(function(){
                var escolar=document.getElementById("escolar").value;
                var grado=document.getElementById("grado").value;
                var seccion=document.getElementById("seccion").value="";
                seccion=document.getElementById("seccion").value;
                var mode=7;
                if(escolar!=""){
                  if(grado!=""){
                    $.ajax({
                      type: "POST",
                      url: "core/controllers/buscarController.php",
                      data:{
                        "escolar":escolar,
                        "grado":grado,
                        "seccion":seccion,
                        "mode":mode
                      },
                      success: function(resp){
                      if(resp!=""){
                        $("#resultados").html(resp);
                      }
                    }
                  });
                }
              }else{
                document.getElementById("grado").value="";
                swal(
                  {title:'Debe seleccionar un año escolar!',
                  type:'warning',
                  confirmButtonText:'Aceptar'}
                );
              }
            });
            $("#seccion").change(function(){
              var escolar=document.getElementById("escolar").value;
              var grado=document.getElementById("grado").value;
              var seccion=document.getElementById("seccion").value;
              var mode=7;
              if(escolar!=""){
                if(grado!=""){
                  if(seccion!=""){
                    $.ajax({
                      type: "POST",
                      url: "core/controllers/buscarController.php",
                      data:{
                        "escolar":escolar,
                        "grado":grado,
                        "seccion":seccion,
                        "mode":mode
                      },
                      success: function(resp){
                        if(resp!=""){
                          $("#resultados").html(resp);
                        }
                      }
                    });
                  }
                }else{
                  document.getElementById("seccion").value="";
                  swal(
                    {title:'Debe seleccionar un grado!',
                    type:'warning',
                    confirmButtonText:'Aceptar'}
                  );
                }
              }else{
                document.getElementById("grado").value="";
                document.getElementById("seccion").value="";
                swal(
                  {title:'Debe seleccionar un año escolar!',
                  type:'warning',
                  confirmButtonText:'Aceptar'}
                );
              }
            });
			    });
		    </script>
		    <div id="content">
			    <div class="panel box-shadow-none content-header">
            <div class="panel-body">
              <div class="col-md-9">
                <p class="animated fadeInDown">
             	    Notas de los Alumnos <span class="fa-angle-right fa"></span> Consulta
                </p>
              </div>
            </div>
          </div>
          <div class="col-md-12 top-20 padding-0">
            <div class="col-md-12">
              <div class="panel">
           	    <div class="panel-heading"><h3>Notas</h3></div>
         		      <div class="panel-body">
           		      <div class="responsive-table" style="clear: both;">
           			      <div class="form-group form-animate-text col-md-4">
               		      <div class="col-md-5">
               			      <label for="escolar">Años Escolares:</label>
               		      </div>
               		      <div class="col-md-7" style="top: 8px;">                        	
               			      <select class="form-control" name="escolar" id="escolar">
               				      <option value="">Seleccione</option>
               				      <?php
                   			      foreach($_escolar as $_escolar){
             					          ?>
               					          <option value="<?php echo $_escolar['id_escolar'];?>"><?php echo $_escolar['escolar'];?></option>
               				          <?php
                              }
                            ?>
                          </select>
                        </div>
                      </div>
                      <div class="form-group form-animate-text col-md-4">
                	      <div class="col-md-3">
                		      <label for="grado">Grados:</label>
                	      </div>
                	      <div class="col-md-9" style="top: 8px;">                        	
                		      <select class="form-control" name="grado" id="grado">
                			      <option value="">Seleccione</option>
                			      <?php
                   			      foreach($_grado as $_grado){
                 					      ?>
                   					      <option value="<?php echo $_grado['id_grado'];?>"><?php echo $_grado['grado'];?></option>
                   				      <?php
                   			      }
                   		      ?>
                   	      </select>
                        </div>
                      </div>
                      <div class="form-group form-animate-text col-md-4">
                	      <div class="col-md-3">
                		      <label for="seccion">Secciones:</label>
                	      </div>
                	      <div class="col-md-9" style="top: 8px;">                        	
                		      <select class="form-control" name="seccion" id="seccion">
                			      <option value="">Seleccione</option>
                			      <?php
                   			      foreach($_seccion as $_seccion){
                 					      ?>
                   					      <option value="<?php echo $_seccion['id_seccion'];?>"><?php echo $_seccion['seccion'];?></option>
                   				      <?php
                   			      }
                   		      ?>
                   	      </select>
                        </div>
                      </div>
                      <div id="resultados">
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
                    	      <td colspan="8" style="text-align: center;">Seleccione las opciones de arriba.</td>
                          </tbody>
                        </table>
                      </div>
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
      <?php
    }else{
      header('location: ?view=index');
    }
  ?>
</html>