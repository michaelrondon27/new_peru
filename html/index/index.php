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
		<div id="content">
			<?php
				if($_slider>0){
					?>
						<div class="col-md-12 col-sm-12 col-xs-12">
					        <div class="panel" style="width: 100%; height: 750px;">
					            <div class="panel-body">
					                <div class="col-md-12 col-sm-12 col-xs-12">
					                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
					                      	<ol class="carousel-indicators">
					                      		<?php
					                      			$contador=0;
					                      			foreach($_slider as $slider){
					                      				if($contador==0){
					                      					?>
					                      						<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
					                      					<?php
					                      				}else{
					                      					?>
					                      						<li data-target="#carousel-example-generic" data-slide-to="<?php echo $contador;?>" class=""></li>
					                      					<?php
					                      				}
					                      				$contador++;
					                      			}
					                      		?>
					                      	</ol>
					                      	<div class="carousel-inner" style="width: 100%; height: 700px;">
					                      		<?php
					                      			$contador=0;
					                      			foreach($_slider as $slider){
					                      				if($contador==0){
					                      					?>
						                      					<div class="item active">
									                          		<img class="img-responsive" src="asset/images/<?php echo $slider['imagen'];?>">
									                        	</div>
						                      				<?php
					                      				}else{
					                      					?>
						                      					<div class="item">
									                          		<img class="img-responsive" src="asset/images/<?php echo $slider['imagen'];?>">
									                        	</div>
						                      				<?php
					                      				}
					                      				$contador++;
					                      			}
					                      		?>
					                      	</div>
					                      	<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
					                        	<span class="glyphicon glyphicon-chevron-left"></span>
					                      	</a>
					                      	<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
					                        	<span class="glyphicon glyphicon-chevron-right"></span>
					                      	</a>
					                    </div>
					                </div>
					            </div>
					        </div>
					    </div>
					<?php
				}
			?>
		</div>
		<?php 
			//include(HTML_DIR."overall/footer.php");
		?>
		<script>
			$(document).ready(function(){
				$("#inicio").addClass("active")
			});
		</script>
	</body>
</html>