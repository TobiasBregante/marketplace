<?php
	session_start();
	$id = $_SESSION['id'];
	function q_profile_photo($id){
		require_once('../confi.php');
		$query = mysqli_query($mysqli, "SELECT * FROM profile WHERE id = $id");
		if ($query->num_rows == 1) {
			while ($photo = mysqli_fetch_array($query)){
				echo $photo['img'];
			}
		}else{
			echo 'public/img/user.png';
		}
	}
	if (isset($id)){
		q_profile_photo($id);
	}
?>