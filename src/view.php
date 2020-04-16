<?php
	session_start();
	header("Expires: Tue, 03 Jul 2001 06:00:00 GMT");
	header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
	header("Cache-Control: no-store, no-cache, must-revalidate");
	header("Cache-Control: post-check=0, pre-check=0", false);
	header("Pragma: no-cache");
	/**
	 * This is the verify of the URL.
	 */
	class View{
		function __construct(){
			$path_node_modules = 'library/';
			$modules = array(
				0 => $path_node_modules.'categories.php',
				1 => $path_node_modules.'product.php',
				2 => $path_node_modules.'about.php',
				3 => $path_node_modules.'blog.php',
				4 => $path_node_modules.'class.php',
				5 => $path_node_modules.'login.php',
				6 => $path_node_modules.'register.php',
				7 => $path_node_modules.'logout.php',
				8 => $path_node_modules.'b_note.php'
			);
			if (isset($_GET['q']) 
				&& is_numeric($_GET['q']) 
				&& $_GET['q'] <= count($modules) 
				&& $_GET['q'] >= 0
				&& intval($_GET['q']) >= 0){
				$value_verify_get = $_GET['q'];
				$value_verify_get = intval($value_verify_get);
				include($modules[$value_verify_get]);
			}else{
				include($modules[0]);
			}
		}
	}
?>
<!DOCTYPE html>
<html lang="es-AR">
	<head>
		<meta name="Author" content="Tobías Nazareno Bregante">
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="./public/css/styles.css?<?php echo time();?>">
		<meta name="viewport" content="width=device-width, initial-scale=1"/>
		<meta name="description" content="">
		<link rel="shortcut icon" href="" type="image/x-icon">
		<link rel="stylesheet"
			href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" 
			integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" 
			crossorigin="anonymous"/>
		 <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" 
		 	integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" 
		 	crossorigin="anonymous"></script>	
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" 
			integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" 
			crossorigin="anonymous"></script>
		<link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">		
		<title>Home - WellSporty</title>
	</head>
	<body>	
	<?php
	$view = new View();
	include('library/frm_in_photo_profile.php');
	?>
		<script src="./public/js/App.js?<?php echo time();?>"></script>
	</body>
</html>