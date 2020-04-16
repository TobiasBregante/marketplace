<?php
	require_once('confi.php');
	$n = htmlentities($n, ENT_QUOTES);
	$n = htmlspecialchars($n);
	$n = intval($n);
	$q_open_note = mysqli_query($mysqli, "SELECT * FROM blog WHERE id = $n");
	$q_n = $q_open_note->num_rows;
	
	while ($note_open = mysqli_fetch_array($q_open_note)){
		$title = $note_open['title'];
	?>
	<article class="public-box">
		<ul class="path-location notices">
			<li>
				<a href="?q=0&keyword=Section">
					Home
				</a> >
			</li>
			<li>
				<a href="?q=3&keyword=Noticias">
					Noticias
				</a> >
			</li>
			<li class="active">
				<?php
				if (strlen($title) >= 20){
				 	$title = substr($title, 0, 20);
				 	$title = $title." . . .";
					echo $title;
				 }else{
				 	$title = $note_open['title'];
				 	echo $title;
				 }
				?>
			</li>
		</ul>
		<p class="title-public"><?php echo $note_open['title'];?></p>
		<span class="time-public-box"><?php echo $note_open['time_note'];?></span>
		<span class="author-public-box"><?php echo $note_open['font'];?></span>
		<button type="button" class="shared-btn-public" value="<?php echo $note_open['id'];?>" onclick="shared_open_note(this)">	
			<img src="public/img/shared.png" class="shared-img">
		</button>
		<input type="url" class="shared-link-list shared-link-list-<?php echo $note_open['id'];?> d-none" name="num">
		<article class="shared-title-public">	
			<span>
				Compartilo!
			</span>
		</article>	
		<article class="img-public-box">
			<?php
		if ($note_open['img'] != ''){
		?>
			<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
			  <ol class="carousel-indicators">
			    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
			    <?php
			    if ($note_open['img_2'] != ''){
			    ?>	
			    	<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
			    <?php 
			    }if ($note_open['img_3'] != ''){
			    ?>	
			    	<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
			    <?php
			    }
			    ?>	
			  </ol>
			  <div class="carousel-inner">
			    <div class="carousel-item active">
			      <img src="<?php echo $note_open['img'];?>" class="d-block w-100" alt="1/3">
			    </div>
			    <?php
			    if ($note_open['img_2'] != ''){
			    ?>
				    <div class="carousel-item">
				      <img src="<?php echo $note_open['img_2'];?>" class="d-block w-100" alt="2/3">
				    </div>
			    <?php
			    }
			    ?>
			    <?php
			    if ($note_open['img_3'] != ''){
			    ?>
				    <div class="carousel-item">
				      <img src="<?php echo $note_open['img_3'];?>" class="d-block w-100" alt="3/3">
				    </div>
			    <?php
			    }
			    ?>
			  </div>
			  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
			    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
			    <span class="sr-only">Previous</span>
			  </a>
			  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
			    <span class="carousel-control-next-icon" aria-hidden="true"></span>
			    <span class="sr-only">Next</span>
			  </a>
			</div>
		<?php
		}
		?>
			<p class="text-public">
				<?php echo $note_open['text_content'];?>
			</p><br>
		</article><br>
		<span class="noti_copy noti_copy-<?php echo $note_open['id'];?> d-none">Copiado!</span>
	</article>
	<?php
	}
	mysqli_close($mysqli);
?>