<?php
	$_SESSION['q'] = 3;
?>
<main class="container-fluid">
	<?php include('templates/header.php');?>
	<section class="row">
		<article class="contain-public-aside">
			<article class="publicitary-teambike-new">
				<a href="?q=6&keyword=Sign+in" class="suscribe-btn-link btn btn-warning">
					Suscribe
				</a>				
			</article>
			<article class="contain-net">
				<img src="public/img/netflix.gif" class="publi-net">
			</article>
		</article>
		<article class="contain-public">
		</article>	
	</section>
	<?php include('templates/footer.html');?>	
</main>
<article class="box-shadow d-none"></article>
<?php include('frm_in_note.php');?>