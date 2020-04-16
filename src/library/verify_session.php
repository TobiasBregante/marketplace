<?php
	session_start();
	function verify_session_login($us_l, $pdw_l){
		if ($us_l != ''
			&& trim($us_l) == $us_l 
			&& $pdw_l != ''){
			require_once('../confi.php');
			$us_l = $mysqli->real_escape_string(strval(htmlentities($us_l, ENT_QUOTES)));
			$pdw_l = $mysqli->real_escape_string(strval(htmlentities($pdw_l, ENT_QUOTES)));
			
			$q_us_exist = mysqli_query($mysqli, "SELECT * FROM user WHERE username LIKE '$us_l'");
			while ($q_session_verify = mysqli_fetch_array($q_us_exist)){
				if (password_verify($pdw_l, $q_session_verify['pdw'])) {
					$_SESSION['id'] = $q_session_verify['id'];	
					$_SESSION['user'] = $q_session_verify['username'];
					$_SESSION['credential'] = $q_session_verify['credential'];
					echo "ha iniciado sesión. Bienvenido $us_l";
				}else{
					echo "false";
				}
			}
			mysqli_close($mysqli);	
		}else{
			echo "error"; 
		}
	}
	function verify_session_register($us_r, $pdw_r, $pdw_r_r, $first_name, $last_name, $street, $height, $cp, $city, $tel, $sex, $dni, $country){
		if ($us_r != '' 
			&& trim($us_r) == $us_r
			&& $first_name != ''
			&& trim($first_name) == $first_name
			&& $last_name != ''
			&& trim($last_name) == $last_name
			&& $street != ''
			&& trim($street) == $street
			&& $height != ''
			&& trim($height) == $height
			&& $cp != ''
			&& trim($cp) == $cp
			&& $city != ''
			&& trim($city) == $city 
			&& $pdw_r != '' 
			&& $pdw_r_r != ''
			&& $tel != ''
			&& trim($tel) == $tel
			&& $sex != ''
			&& trim($sex) == $sex
			&& $dni != ''
			&& trim($dni) == $dni
			&& $country != ''
			&& trim($country) == $country){
			require_once('../confi.php');
			if ($pdw_r != $pdw_r_r){
				echo "error";
			}else if(preg_replace('/([^A-Za-z0-9])/', '', $us_r) == $us_r
				&& strlen($us_r) > 2
				&& strlen($first_name) > 2
				&& strlen($last_name) > 2
				&& strlen($street) > 2
				&& strlen($height) >= 0
				&& strlen($cp) == 4
				&& strlen($city) > 2
				&& strlen($tel) >= 8
				&& strlen($sex) >= 4
				&& strlen($dni) == 8
				&& strlen($country) > 2
				&& htmlentities($us_r, ENT_QUOTES) == $us_r
				&& htmlentities($pdw_r, ENT_QUOTES) == $pdw_r
				&& htmlentities($pdw_r_r, ENT_QUOTES) == $pdw_r_r
				&& htmlentities($first_name, ENT_QUOTES) == $first_name
				&& htmlentities($last_name, ENT_QUOTES) == $last_name
				&& htmlentities($street, ENT_QUOTES) == $street
				&& htmlentities($height, ENT_QUOTES) == $height
				&& htmlentities($cp, ENT_QUOTES) == $cp
				&& htmlentities($city, ENT_QUOTES) == $city
				&& htmlentities($tel, ENT_QUOTES) == $tel
				&& htmlentities($sex, ENT_QUOTES) == $sex
				&& htmlentities($dni, ENT_QUOTES) == $dni
				&& htmlentities($country, ENT_QUOTES == $country)){
				$us_r = $mysqli->real_escape_string(strval(htmlentities($us_r, ENT_QUOTES)));
				$pdw_r = $mysqli->real_escape_string(strval(htmlentities($pdw_r, ENT_QUOTES)));
				$pdw_r_r = $mysqli->real_escape_string(strval(htmlentities($pdw_r_r, ENT_QUOTES)));
				$first_name = $mysqli->real_escape_string(strval(htmlentities($first_name, ENT_QUOTES)));
				$last_name = $mysqli->real_escape_string(strval(htmlentities($last_name, ENT_QUOTES)));
				$street = $mysqli->real_escape_string(strval(htmlentities($street, ENT_QUOTES)));
				$height = $mysqli->real_escape_string(htmlentities($height, ENT_QUOTES));
				$cp = $mysqli->real_escape_string(htmlentities($cp, ENT_QUOTES));
				$city = $mysqli->real_escape_string(strval(htmlentities($city, ENT_QUOTES)));
				$tel = $mysqli->real_escape_string(htmlentities($tel, ENT_QUOTES));
				$sex = $mysqli->real_escape_string(strval(htmlentities($sex, ENT_QUOTES))); 
				$dni = $mysqli->real_escape_string(htmlentities($dni, ENT_QUOTES));
				$country = $mysqli->real_escape_string(strval(htmlentities($country, ENT_QUOTES)));
				$q_us_exist = mysqli_query($mysqli, "SELECT * FROM user WHERE username LIKE '$us_r'");
				$q_exist = $q_us_exist->num_rows;
				if ($q_exist == 0){
					$dates_user = [];
					$dates_user['street'] = $street;
					$dates_user['height'] = $height;
					$dates_user['cp'] = "C".$cp;
					$dates_user['city'] = $city;
					$dates_user['street'] = str_replace(" ", "+", $dates_user['street']);
					$location = "https://www.google.com.ar/maps/place/".$dates_user['street']."+".$dates_user['height'].",+".$dates_user['city'];
					$basic = 'level-1';
					date_default_timezone_set('America/Argentina/Buenos_Aires');
					$since = date("F j, Y, g:i a");
					$pdw_r = password_hash($pdw_r, PASSWORD_DEFAULT);
					mysqli_query($mysqli, "INSERT INTO user (username, pdw, credential, first_name, last_name, street, height, cp, city, tel, sex, dni, country, geolocation, since) VALUES ('$us_r', '$pdw_r', '$basic', '$first_name', '$last_name', '$street', '$height', '$cp', '$city', '$tel', '$sex', '$dni', '$country', '$location', '$since')");
					echo "ha creado un usuario con éxito.|user : $us_r | password : $pdw_r";
				}else{
					echo "false";
				}
			}else{
				echo "str_false";
			}
			mysqli_close($mysqli);
		}else{
			echo "error";
		}
	}
	if (isset($_POST['us_l']) && isset($_POST['pdw_l'])){
		$us_l = $_POST['us_l'];
		$pdw_l = $_POST['pdw_l'];
		verify_session_login($us_l, $pdw_l);
	}else if (isset($_POST['us_r']) 
		&& isset($_POST['pdw_r']) 
		&& isset($_POST['pdw_r_r'])
		&& isset($_POST['f_name'])
		&& isset($_POST['l_name'])
		&& isset($_POST['street'])
		&& isset($_POST['height'])
		&& isset($_POST['cp'])
		&& isset($_POST['city'])
		&& isset($_POST['tel'])
		&& isset($_POST['sex'])
		&& isset($_POST['dni'])){
		$us_r = $_POST['us_r'];
		$pdw_r = $_POST['pdw_r'];
		$pdw_r_r = $_POST['pdw_r_r'];
		$first_name = $_POST['f_name'];
		$last_name = $_POST['l_name'];
		$street = $_POST['street'];
		$height = $_POST['height'];
		$cp = $_POST['cp'];
		$city = $_POST['city'];
		$tel = $_POST['tel'];
		$sex = $_POST['sex'];
		$dni = $_POST['dni']; 
		$country = $_POST['country'];
		verify_session_register($us_r, $pdw_r, $pdw_r_r, $first_name, $last_name, $street, $height, $cp, $city, $tel, $sex, $dni, $country);
	}
?>