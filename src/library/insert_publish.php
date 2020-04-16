<?php
	session_start();
	$transmitter = $_POST['transmitter'];
	$title = $_POST['title'];
	$text_content = $_POST['description'];
	$img1 = $_FILES['img1']['tmp_name'];
	$img2 = $_FILES['img2']['tmp_name'];
	$img3 = $_FILES['img3']['tmp_name'];
	$publish = false;

	if (isset($transmitter)
		&& isset($title)
		&& isset($description)){
		$publish = true;
	}

	function insert_publish($publish){
		require_once('../confi.php');
		$rand = rand();
		$title = $_POST['title'];
		$text_content = $_POST['description'];
		$transmitter = $_POST['transmitter'];
		$id_user = $_SESSION['id'];
		date_default_timezone_set('America/Argentina/Buenos_Aires');
		$since = date("F j, Y, g:i a");
 		if ($transmitter == ''){
 			$transmitter = $_SESSION['user'];
 		}else{
 			$transmitter = $transmitter." (".$_SESSION['user'].")";
 		}
		$ruta = "../../public/img/blog/";	
		$img_name1 = $ruta.$_FILES['img1']['name'];
		$img_name3 = $ruta.$_FILES['img3']['name'];
		$img_name2 = $ruta.$_FILES['img2']['name'];

		$_FILES['img1'] = str_replace(" ", "", $_FILES['img1']);
		$_FILES['img2'] = str_replace(" ", "", $_FILES['img2']);
		$_FILES['img3'] = str_replace(" ", "", $_FILES['img3']);
		$img1 = $_FILES['img1']['tmp_name'];
		$img2 = $_FILES['img2']['tmp_name'];
		$img3 = $_FILES['img3']['tmp_name'];
		move_uploaded_file($img1, $ruta.$rand.$_FILES['img1']['name']);
		move_uploaded_file($img2, $ruta.$rand.$_FILES['img2']['name']);
		move_uploaded_file($img3, $ruta.$rand.$_FILES['img3']['name']);
		$ruta ="public/img/blog/";
		$img_name1 = $ruta.$rand.$_FILES['img1']['name'];
		$img_name2 = $ruta.$rand.$_FILES['img2']['name'];
		$img_name3 = $ruta.$rand.$_FILES['img3']['name'];
		$img_name1 = $mysqli->real_escape_string(htmlentities($img_name1, ENT_QUOTES));
		$img_name2 = $mysqli->real_escape_string(htmlentities($img_name2, ENT_QUOTES));
		$img_name3 = $mysqli->real_escape_string(htmlentities($img_name3, ENT_QUOTES));
		if ($img_name1 == 'public/img/blog/'.$rand){
			$img_name1 = '';	
		}if ($img_name2 == 'public/img/blog/'.$rand){
			$img_name2 = '';
		}if ($img_name3 == 'public/img/blog/'.$rand){
			$img_name3 = '';	
		}	
		$title = $mysqli->real_escape_string(htmlentities($title, ENT_QUOTES));
		$text_content = $mysqli->real_escape_string(htmlentities($text_content, ENT_QUOTES));
		$transmitter = $mysqli->real_escape_string(htmlentities($transmitter, ENT_QUOTES));
		mysqli_query($mysqli, "INSERT INTO blog (title, text_content, font, img, img_2, img_3, id_user, time_note) VALUES ('$title', '$text_content', '$transmitter', '$img_name1', '$img_name2', '$img_name3', '$id_user', '$since')");
		mysqli_close($mysqli);
	}
	insert_publish($publish);	
?>
