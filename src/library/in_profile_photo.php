<?php
	session_start();
	$profile = $_FILES['profile']['tmp_name'];
	$id_user = $_SESSION['id'];
	function profile_photo($profile, $id){
		if (isset($profile) 
			&& $profile != '' 
			&& is_uploaded_file($profile)){
			$path = '../../public/img/profile/';
			require_once('../confi.php');
			$_FILES['profile'] = str_replace(' ', '', $_FILES['profile']);
			$profile = $_FILES['profile']['tmp_name'];
			$rand = rand();
			move_uploaded_file($profile, $path.$rand.$_FILES['profile']['name']);
			$path = 'public/img/profile/';
			$profile_name = $path.$rand.$_FILES['profile']['name'];
			$profile_name = $mysqli->real_escape_string(htmlentities($profile_name, ENT_QUOTES));
			$q_verify_status = mysqli_query($mysqli, "SELECT * FROM profile WHERE id = $id");
			if ($q_verify_status->num_rows == 0) {
				mysqli_query($mysqli, "INSERT INTO profile (id, img) VALUES ('$id', '$profile_name')");
			}else{
				mysqli_query($mysqli, "UPDATE profile SET id = $id, img = '$profile_name' WHERE id = $id");
			}
			echo $profile_name;
			mysqli_close($mysqli);
		}
	}
	if (isset($profile) && isset($id_user)){
		profile_photo($profile, $id_user);
	}
?>