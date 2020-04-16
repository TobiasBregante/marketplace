<?php
	require_once('../src/confi.php');
	$p = htmlentities($p, ENT_QUOTES);
	$p = htmlspecialchars($p);
	$p = intval($p);
	$q_open_prod = mysqli_query($mysqli, "SELECT * FROM product WHERE id = $p");
	$q_v = $q_open_prod->num_rows;
	if (!isset($p) || isset($p) && $q_v == 0){
		header('Location: ?q=0');
	}
	while ($product_open = mysqli_fetch_array($q_open_prod)){
	?>
		<article class="prod bg-dark">
			<h2 class="title-prod-open"><?php echo $product_open['title'];?></h2>
			<article class="content-btn-expand">
				<button type="button" class="btn-zoom-prod">
					<img src="public/img/expand.png" class="img-zoom-prod">
				</button>
			</article>
			<ul class="path-location">
				<li>
					<a href="?q=0&keyword=Section">
						Home
					</a> >
				</li>
				<li>
					<a href="?q=1&p=2">
						Shop
					</a> >
				</li>
				<li class="active">
					<?php echo $product_open['type'];?>
				</li>
			</ul>	
			<article class="cont-img-prod-open" style="background-image: url('<?php echo $product_open['img'];?>');">	
			</article>
			<ul class="select-img">
				<li class="select-1" value="<?php echo $product_open['img'];?>" style="background-image: url('<?php echo $product_open['img'];?>');">
					
				</li>
				<li class="select-2" value="<?php echo $product_open['img_2'];?>" style="background-image: url('<?php echo $product_open['img_2'];?>');">
					
				</li>
				<li class="select-3" value="<?php echo $product_open['img_3'];?>" style="background-image: url('<?php echo $product_open['img_3'];?>');">
					
				</li>
			</ul>
			<article class="methods-buy">
				<article class="price">
					<br><p>$<?php echo $product_open['price'];?></p>
				</article>
				<?php
				$id_prod_user = $product_open['id_user'];
				$q_img_profile = mysqli_query($mysqli, "SELECT * FROM profile WHERE id = $id_prod_user");
					while($q_profile = mysqli_fetch_array($q_img_profile)){
					?>
						<article class="cont-img-profile-prod">
							<img class="img-profile-prod" src="<?php echo $q_profile['img'];?>">
						</article>
					<?php
					}
				?>
				<span class="from_client">
					Anunciado por: <span class="client_text_from"><?php echo $product_open['from_client'];?></span>
				</span>
				<span class="desc-img-buy">Pagá al contado con</span><br>
				<img src="public/img/buy.png" class="buy-img"><br>
				<a class="link-btn-buy" href="<?php echo $product_open['button'];?>" target="_blank">
					<button type="button" class="btn btn-buy btn-success">
						Ingresar
					</button>
				</a>
				<button type="button" class="btn btn-query btn-outline-primary">
					Consultar
				</button><br>
				<span class="title-shared">Compartir</span>
				<input type="text" name="numer" class="shared-link"> 
			</article>
			<article class="desc-prod-open">
				<h3>Descripción</h3>
				<p>
					<?php echo $product_open['description'];?>
				</p>
			</article><br>
		</article>		
	<?php
	}
	mysqli_close($mysqli);
?>