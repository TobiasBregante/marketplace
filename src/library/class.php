<?php
	$_SESSION['q'] = 4;
?>

<main class="container-fluid">
	<?php
		include('templates/header.php');
	?>
	<section class="row">
		<h4 class="text-light" style="position: absolute; bottom: 0; margin: auto; text-align: center; right: 0; left: 0; margin-bottom: 25%;">Ups! Esta sección está en desarrollo. Disculpe las molestias!<br><a href="?q=0" class="text-primary">Volver al inicio</a>
		<audio autoplay>
			<source src="public/img/audio.mp3" type="audio/mpeg">
		</audio>
		</h4>
	</section>
	<?php
	include('templates/footer.html');
	?>	
</main>