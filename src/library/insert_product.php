<?php
	session_start();
	$title = $_POST['title'];
	$description = $_POST['description'];
	$type = $_POST['type'];
	$img = $_FILES['img']['tmp_name'];
	$img_2 = $_FILES['img_2']['tmp_name'];
	$img_3 = $_FILES['img_3']['tmp_name'];
	$price = $_POST['price'];
	$button = $_POST['button'];
	if (isset($title) 
		&& isset($description) 
		&& isset($type) 
		&& is_uploaded_file($img)
		&& is_uploaded_file($img_2)
		&& is_uploaded_file($img_3)
		&& isset($img)
		&& isset($img_2)
		&& isset($img_3)
		&& isset($price) 
		&& isset($button)){
		$product = true;
	}
	function insert_product($product){
		require_once('../confi.php');
		$title = $_POST['title'];
		$id_user = $_SESSION['id'];
		$description = $_POST['description'];
		$type = $_POST['type'];
		$_FILES['img'] = str_replace(" ", "", $_FILES['img']);
		$_FILES['img_2'] = str_replace(" ", "", $_FILES['img_2']);
		$_FILES['img_3'] = str_replace(" ", "", $_FILES['img_3']);
		$img = $_FILES['img']['tmp_name'];
		$img_2 = $_FILES['img_2']['tmp_name'];
		$img_3 = $_FILES['img_3']['tmp_name'];
		$price = $_POST['price'];
		$button = $_POST['button'];
		$ruta = "../../public/img/product/";	
		$img_name = $ruta.$_FILES['img']['name'];
		$img_name_2 = $ruta.$_FILES['img_2']['name'];
		$img_name_3 = $ruta.$_FILES['img_3']['name'];
		$from_client = $_SESSION['user'];
		$rand = rand();
		move_uploaded_file($img, $ruta.$rand.$_FILES['img']['name']);
		move_uploaded_file($img_2, $ruta.$rand.$_FILES['img_2']['name']);
		move_uploaded_file($img_3, $ruta.$rand.$_FILES['img_3']['name']);
		$ruta ="public/img/product/";
		$img_name = $ruta.$rand.$_FILES['img']['name'];
		$img_name_2 = $ruta.$rand.$_FILES['img_2']['name'];
		$img_name_3 = $ruta.$rand.$_FILES['img_3']['name'];
		$verify_img = $ruta.$_FILES['img']['name'];
		$verify_img_2 = $ruta.$_FILES['img_2']['name'];
		$verify_img_3 = $ruta.$_FILES['img_3']['name'];
		if ($verify_img == $ruta){
			$img_name = 'public/img/err_img_no_exist.jpg';
		}if ($verify_img_2 == $ruta){
			$verify_img_2 = 'public/img/err_img_no_exist.jpg';
		}if ($verify_img_3 == $ruta){
			$verify_img_2 = 'public/img/err_img_no_exist.jpg';
		}
		$title = $mysqli->real_escape_string(htmlentities($title, ENT_QUOTES));
		$description = $mysqli->real_escape_string(htmlentities($description, ENT_QUOTES));
		$type = $mysqli->real_escape_string(htmlentities($type, ENT_QUOTES));
		$price = $mysqli->real_escape_string(htmlentities($price, ENT_QUOTES));
		$button = $mysqli->real_escape_string(htmlentities($button, ENT_QUOTES));
		$img_name = $mysqli->real_escape_string(htmlentities($img_name, ENT_QUOTES));
		$img_name_2 = $mysqli->real_escape_string(htmlentities($img_name_2, ENT_QUOTES));
		$img_name_3 = $mysqli->real_escape_string(htmlentities($img_name_3, ENT_QUOTES));
		$from_client = $mysqli->real_escape_string(htmlentities($from_client, ENT_QUOTES));
		mysqli_query($mysqli, "INSERT INTO product (title, description, type, price, button, img, img_2, img_3, from_client, id_user) VALUES ('$title', '$description', '$type', '$price', '$button', '$img_name', '$img_name_2', '$img_name_3', '$from_client', '$id_user')");
		mysqli_close($mysqli);
	}
	insert_product($product);
?>