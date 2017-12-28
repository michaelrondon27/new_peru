<?php
	switch (isset($_GET['mode']) ? $_GET['mode'] : null){
		default:
			include(HTML_DIR.'error/404.php');
			break;
	}
?>