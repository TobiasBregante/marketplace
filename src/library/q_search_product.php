<?php
	session_start();
	$query = $_POST['search'];
	function q($query){
		require_once('../confi.php');
		if (isset($query) && $query != ''){
			$query = htmlentities($query, ENT_QUOTES);
			$q_prod = mysqli_query($mysqli, 
				"SELECT * FROM product
				 WHERE title LIKE '%$query%' 
				 OR description LIKE '%$query%' 
				 OR type LIKE '%$query%' 
				 OR price LIKE '%$query%'
				 OR from_client LIKE '%$query%'");	
		}else{
			$q_prod = mysqli_query($mysqli, "SELECT * FROM product");
		}
		if ($q_prod->num_rows == 0) {
			?>
			<h4 class='result_none text-light'>
				No hay resultados para "<span class="text-warning"><?php echo $query;?></span>"
			</h4>
			<?php
		}
		while ($product = mysqli_fetch_array($q_prod)){
		?>
			<article class="box box-<?php echo $product['id'];?>">
				<a href="?q=1&p=<?php echo $product['id'];?>&keyword=<?php echo $product['title'];?>">
					<article class="img-content-prod" style="background-image: url(<?php echo $product['img'];?>);"></article>	
				</a>
				<p>
					<input type="url" class="shared-link-list shared-link-list-<?php echo $product['id'];?> d-none" name="num">
					<?php
					$title = $product['title'];
					if (strlen($title) >= 50){
					 	$title = substr($title, 0, 40);
					 	$title = $title." . . .";
						echo $title;
					 }else{
					 	$title = $product['title'];
					 	echo $title;
					 } 
					?>
				</p>
				<?php
				if (isset($_SESSION['user']) 
					&& isset($_SESSION['credential']) 
					&& $_SESSION['credential'] == 'basic' 
					|| isset($_SESSION['credential']) 
					&& $_SESSION['credential'] == 'admin'){
					$id_product = $product['id'];
					$id_user = $_SESSION['id'];
					$like_count = mysqli_query($mysqli, "SELECT id_publication FROM like_product WHERE id_publication = $id_product");
					$like_counts = $like_count->num_rows;
					$toggle_like = mysqli_query($mysqli, "SELECT id_publication FROM like_product WHERE id_publication = $id_product AND like_now = $id_user");
					$toggle_like = $toggle_like->num_rows;
					if ($toggle_like == 0) {	
				?>
						<button type="button" class="like-btn" onclick="like(this)" value="<?php echo $product['id'];?>">
							<img src="public/img/like.png" class="like-img like-img-<?php echo $product['id'];?>">
						</button>
						<article class="num_like num_like-<?php echo $product['id'];?>">
							<img src="public/img/corazon.png" class="like-img-count">
							<span class="cont-num-like-<?php echo $product['id'];?>">
								<?php echo $like_counts;?>	
							</span>
						</article>
				<?php
					}else{
				?>
						<button type="button" class="like-btn" onclick="like(this)" value="<?php echo $product['id'];?>">
							<img src="public/img/corazon.png" class="like-img like-img-<?php echo $product['id'];?>">
						</button>
						<article class="num_like num_like-<?php echo $product['id'];?>">
							<img src="public/img/corazon.png" class="like-img-count">
							<span class="cont-num-like-<?php echo $product['id'];?>">
								<?php echo $like_counts;?>	
							</span>
						</article>
				<?php		
					}
				}else{
					$id_product = $product['id'];
					$like_count = mysqli_query($mysqli, "SELECT id_publication FROM like_product WHERE id_publication = $id_product");
					$like_counts = $like_count->num_rows;
				?>
					<article class="num_like num_like-<?php echo $product['id'];?>">
						<img src="public/img/corazon.png" class="like-img-count">
						<span class="cont-num-like-<?php echo $product['id'];?>">
							<?php echo $like_counts;?>	
						</span>
					</article>
				<?php	
				}
				?>
				<button type="button" class="shared-btn" value="<?php echo $product['id'];?>" onclick="shared(this)">
					<img src="public/img/shared.png" class="shared-img">
				</button>
				<span class="noti_copy noti_copy-<?php echo $product['id'];?> d-none">Copiado!</span>
			</article>		
		<?php	
		}
		mysqli_close($mysqli);			
	}
	q($query);
?>