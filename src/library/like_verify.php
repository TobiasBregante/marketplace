<?php
	session_start();
	$id_product = $_POST['id_product'];
	$id_user = $_SESSION['id'];
	if (isset($id_product) && isset($id_user)){
		function verify_like($id_product, $id_user){
			require_once('../confi.php');
			$id_product = htmlentities($id_product, ENT_QUOTES);
			$id_user = htmlentities($id_user, ENT_QUOTES);
			$like_count = mysqli_query($mysqli, "SELECT * FROM like_product WHERE id_publication = $id_product AND like_now = $id_user");
			$like_counts = $like_count->num_rows;
			if ($like_counts == 0){
				mysqli_query($mysqli, "INSERT INTO like_product (id_publication, like_now) VALUES ($id_product, $id_user)");
				$like = mysqli_query($mysqli, "SELECT id_publication FROM like_product WHERE id_publication = $id_product");
				$like = $like->num_rows;
				echo $like;			
			}else{
				mysqli_query($mysqli, "DELETE FROM like_product WHERE id_publication = $id_product AND like_now = $id_user");
				$like = mysqli_query($mysqli, "SELECT id_publication FROM like_product WHERE id_publication = $id_product");
				$like = $like->num_rows;
				echo $like;
			}
			mysqli_close($mysqli);	
		}
		verify_like($id_product, $id_user);		
	}
?>