<?php
	session_start();
	if (isset($_GET['n'])){
		$n = $_GET['n'];
	}
?>
<main class="container-fluid">
	<?php include('templates/header.php');?>
	<section class="row">
		<article class="content-note">
		<?php include('library/b_open_note.php');?>
		</article>
	</section>
	<?php include('templates/footer.html');?>
</main>
<article class="box-shadow d-none"></article>
