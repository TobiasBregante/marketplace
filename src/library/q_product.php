<?php
	session_start();
	require_once('../confi.php');
	$aside_navigator = array(
		0 => 'MTB',
		1 => 'Route',
		2 => 'Urban',
		3 => 'Kids',
		4 => 'Products',
		5 => 'Gadgets',
		6 => 'Services',
		7 => 'Suplements',
	);
	if (isset($_SESSION['value_type']) 
		&& is_numeric($_SESSION['value_type']) 
		&& $_SESSION['value_type'] <= count($aside_navigator) 
		&& $_SESSION['value_type'] >= 0 
		&& intval($_SESSION['value_type']) >= 0){
		$value_type = $_SESSION['value_type'];
		$q_prod = mysqli_query($mysqli, "SELECT * FROM product 
			WHERE type LIKE '$aside_navigator[$value_type]'");
		if ($q_prod->num_rows == 0){
		?>
			<h4 class='result_none text-light'>
				No hay resultados para "<span class="text-warning"><?php echo $aside_navigator[$value_type];?></span>"
			</h4>
		<?php
		}
	}else{
		if (isset($_POST['value_limit']) 
			&& $_POST['value_limit'] != ''){ 
			$value_limit = $_POST['value_limit'];
			$limit_query = mysqli_query($mysqli, "SELECT * FROM product");
			$q_prod = mysqli_query($mysqli, "SELECT * FROM product ORDER BY id ASC LIMIT 0, $value_limit");
		}else{
			$value_limit = 12;
			$limit_query = mysqli_query($mysqli, "SELECT * FROM product");
			$q_prod = mysqli_query($mysqli, "SELECT * FROM product ORDER BY id ASC LIMIT 0, $value_limit");
		}
		$limit_q = $limit_query->num_rows;
	}
	if (isset($value_limit)
		&& $value_limit <= $limit_q 
		|| isset($value_limit)
		&& $value_limit <= ($limit_q + 12) 
		|| isset($value_limit)
		&& $value_limit <= ($limit_q + 12)){
		while ($product = mysqli_fetch_array($q_prod)){
			$reset_url = $product['id']."&keyword=".strtolower(str_replace(' ', '+', $product['title']));
		?>
			<article class="box box-<?php echo $product['id'];?> bg-dark">
				<a href="?q=1&p=<?php echo $product['id'];?>&keyword=<?php echo $reset_url;?>">
					<article class="img-content-prod" style="background-image: url('<?php echo $product['img'];?>');"></article>	
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
					&& $_SESSION['credential'] == 'level-2'){
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
				<button type="button" id="?q=1&p=<?php echo $product['id'];?>" class="shared-btn" value="<?php echo $product['id'];?>" onclick="shared(this)">
					<img src="public/img/shared.png" class="shared-img">
				</button>
				<span class="noti_copy noti_copy-<?php echo $product['id'];?> d-none">Copiado!</span>
			</article>		
		<?php
		}
	}else if(!isset($value_limit) || $value_limit == ''){
		while ($product = mysqli_fetch_array($q_prod)){
			?>
			<article class="box box-<?php echo $product['id'];?> bg-dark">
				<a href="?q=1&p=<?php echo $product['id'];?>&keyword=<?php echo $product['title'];?>">
					<article class="img-content-prod" style="background-image: url('<?php echo $product['img'];?>');"></article>	
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
					&& $_SESSION['credential'] == 'level-2'){
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
				<button type="button" id="?q=1&p=<?php echo $product['id'];?>" class="shared-btn" value="<?php echo $product['id'];?>" onclick="shared(this)">
					<img src="public/img/shared.png" class="shared-img">
				</button>
				<span class="noti_copy noti_copy-<?php echo $product['id'];?> d-none">Copiado!</span>
			</article>		
		<?php
		}
	}else{
		echo "false";
	}	
	mysqli_close($mysqli);
?>