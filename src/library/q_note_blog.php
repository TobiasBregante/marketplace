<?php
	require_once('../confi.php');
	$q_note = mysqli_query($mysqli, "SELECT * FROM blog ORDER BY id DESC");
	while ($q_row = mysqli_fetch_array($q_note)){
		?>
		<article class="public-box">
			<p class="title-public"><?php echo $q_row['title'];?></p>
			<span class="time-public-box"><?php echo $q_row['time_note'];?></span>
			<span class="author-public-box"><?php echo $q_row['font'];?></span>
			<article class="img-public-box">
				<span class="noti_copy noti_copy-<?php echo $q_row['id'];?> d-none">Copiado!</span>
				<?php
				if ($q_row['img'] != ''){
				?>
					<div id="carouselExampleIndicators<?php echo $q_row['id'];?>" class="box-img-public carousel slide" data-ride="carousel">
					  <ol class="carousel-indicators">
					    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
					    <?php
					    if ($q_row['img_2'] != ''){
					    ?>	
					    	<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
					    <?php 
					    }if ($q_row['img_3'] != ''){
					    ?>	
					    	<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
					    <?php
					    }
					    ?>	
					  </ol>
					  <div class="carousel-inner">
					    <div class="carousel-item active">
					      <img src="<?php echo $q_row['img'];?>" class="d-block w-100" alt="1/3">
					    </div>
					    <?php
					    if ($q_row['img_2'] != ''){
					    ?>
						    <div class="carousel-item">
						      <img src="<?php echo $q_row['img_2'];?>" class="d-block w-100" alt="2/3">
						    </div>
					    <?php
					    }
					    ?>
					    <?php
					    if ($q_row['img_3'] != ''){
					    ?>
						    <div class="carousel-item">
						      <img src="<?php echo $q_row['img_3'];?>" class="d-block w-100" alt="3/3">
						    </div>
					    <?php
					    }
					    ?>
					  </div>
					  <a class="carousel-control-prev" href="#carouselExampleIndicators<?php echo $q_row['id'];?>" role="button" data-slide="prev">
					    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
					    <span class="sr-only">Previous</span>
					  </a>
					  <a class="carousel-control-next" href="#carouselExampleIndicators<?php echo $q_row['id'];?>" role="button" data-slide="next">
					    <span class="carousel-control-next-icon" aria-hidden="true"></span>
					    <span class="sr-only">Next</span>
					  </a>
					</div>
				<?php
				}
				$reset_url = $q_row['id']."&keyword=".strtolower(str_replace(' ', '-', $q_row['title']))."/".str_replace(',', '', str_replace(' ', '/', $q_row['time_note']));
				?>
				<a href="?q=8&n=<?php echo $reset_url;?>">
					<button class="ver-mas btn btn-primary">
						Ver nota
					</button>
				</a>
				<button type="button" id="?q=8&n=<?php echo $q_row['id'];?>" class="shared-btn-public" value="<?php echo $q_row['id'];?>" onclick="shared(this)">
					<img src="public/img/shared.png" class="shared-img">
				</button>
				<input type="url" class="shared-link-list shared-link-list-<?php echo $q_row['id'];?> d-none" name="num">
				<article class="shared-title-public">	
					<span>
						Compartilo!
					</span>
				</article>	
				<p class="text-public">
					<?php echo $q_row['text_content'];?>
				</p>
			</article>
		</article>
		<?php
	}
?>