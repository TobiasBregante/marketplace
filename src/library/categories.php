<?php
	if (isset($_GET['t'])){
		$_SESSION['value_type'] = $_GET['t'];
		$value_type = $_SESSION['value_type'];
	}else{
		unset($_SESSION['value_type']);
		unset($value_type);
	}
	$q = true;
?>
<main class="container-fluid">
	<?php
	include('templates/header.php');
	?>
	<article class="row">
		<article class="portrait"></article>
	</article>
	<section class="row">
		<?php include('templates/aside_navigator.php');?>
		<article class="content-product">
		</article>
	</section>
	<?php
	include('templates/footer.html');
	?>
	<article class="box-shadow d-none"></article>
	<?php include('library/frm_in_prod.php');?>
</main>
