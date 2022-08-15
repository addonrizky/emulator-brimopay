<?php 
	$status = "SUCCESS";
	switch($status){
		case "TIMEOUT":
			echo "dibikin timout";
			sleep(30);
		break;
		case "SUCCESS":
			echo "success";
		break;
		case "FAILED":
			echo "failed";
		break;
	}
?>
