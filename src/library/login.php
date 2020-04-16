<?php
	$_SESSION['q'] = 5;
	if (isset($_SESSION['user'])) {
		header('Location: ?q=0');
	}
?>
<main class="container-fluid bg-dark">
	<?php
	include('templates/header.php');
	?>
	<section class="row">
		<article class="content-login col-8 col-sm-8 col-lg-8 col-xl-8 p-0">
			<img src="public/img/proteger.png" class="secure">
			<span class="secure-text">You are safe</span>
			<img src="https://affiliate.iqoption.com/api/promo/files/files.iqoption.com/storage/public/5b/34/f0130989c.png?<?php echo rand();?>">
			<form id="frm-login" method="POST">
				<article class="bg-danger err d-none">
					<p class="text-err"></p>
				</article>
				<input id="us_l" type="text" name="us_l" placeholder="User" required>
				<input id="pdw_l" type="password" name="pdw_l" placeholder="Password" required><br>
				<button type="submit" class="btn-login btn btn-primary">
					Login
				</button>
				<a href="?q=6&keyword=Sign+in">Or register</a>
			</form>
		</article>
	</section>
	<?php
	include('templates/footer.html');
	?>
</main>
