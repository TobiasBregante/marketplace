<?php
	if (isset($_GET['p'])){
		$p = $_GET['p'];
	}
?>
<main class="container-fluid">
	<?php
	include('templates/header.php');
	?>
	<section class="row">
		<article class="open-prod">
			<?php include('library/q_open_product.php');?>
		</article>
	</section>
	<?php
	include('templates/footer.html');
	?>
	<article class="login-register bg-dark d-none">
		<form class="frm-login-register">
			<input type="text" name="us" placeholder="Username"><br>
			<input type="password" name="pdw" placeholder="Password"><br>
			<button type="button" class="btn btn-success">
				Submit
			</button>
		</form>
	</article>
	<article class="query d-none">
		<ul>
			<li>
				Lunes a Viernes de 8:00 a.m./17:00 p.m. - Sabados de 8:00 a.m./13:00 p.m.
			</li>
			<li>
				5198-0739
			</li>
			<li>
				Buenos Aires - CABA - Argentina
			</li>
		</ul>
	</article>
	<article class="box-shadow d-none"></article>
</main>