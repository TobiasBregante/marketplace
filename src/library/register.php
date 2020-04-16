<?php
	$_SESSION['q'] = 6;
	if (isset($_SESSION['user'])) {
		header('Location: ?q=0');
	}
?>
<main class="container-fluid bg-dark">
	<?php
	include('templates/header.php');
	?>
	<section class="row">
		<article class="content-register col-8 col-sm-8 col-lg-8 col-xl-8 p-0">
			<img src="public/img/proteger.png" class="secure">
			<span class="secure-text">You are safe</span>
			<aside class="info-register">
				<h2>
					User 
				</h2>
				<p>
					Not insert the next simbols into form: (<span class="text-danger">!"#$%&'()*+,-./, etc.</span>) 
				</p><br>
			</aside>
			<img src="https://affiliate.iqoption.com/api/promo/files/files.iqoption.com/storage/public/5b/34/f0130989c.png?<?php echo rand();?>">
			<form id="frm-register" method="POST">
				<article class="bg-danger err d-none">
					<p class="text-err"></p>
				</article>
				<span class="requi">*</span>
				<input id="us_r" type="text" name="us_r" placeholder="User" required>
				<span class="requi">*</span>
				<input id="pdw_r" type="password" name="pdw_r" placeholder="Password" required>
				<span class="requi">*</span>
				<input id="pdw_r_r" type="password" name="pdw_r_r" placeholder="Repeat password" required><br>
				<span class="requi">*</span>
				<input id="f_d" type="text" name="f_name" placeholder="First name" required>
				<span class="requi">*</span>
				<input id="l_n" type="text" name="l_name" placeholder="Last name" required>
				<span class="requi">*</span>
				<input id="st" type="text" name="street" placeholder="Street" required>
				<span class="requi">*</span>
				<input id="ht" type="number" name="height" placeholder="Height street" required>
				<span class="requi">*</span>
				<input id="cp" type="number" name="cp" placeholder="Postal code" required>
				<span class="requi">*</span>
				<input id="ct" type="text" name="city" placeholder="City" required>
				<span class="requi">*</span>
				<input id="tl" type="number" name="tel" placeholder="Phone" required>
				<span class="requi">*</span>
				<select name="sex" required>
					<option>
						Sex
					</option>
					<option>
						Male
					</option>
					<option>
						Female
					</option>
					<option>
						Other
					</option>
				</select>
				<span class="requi">*</span>
				<input id="dn" type="numeric" name="dni" placeholder="DNI/Passport" required>
				<span class="requi">*</span>
				<input id="cy" type="text" name="country" placeholder="Country" required><br>
				<button type="submit" class="btn-register btn btn-primary">
					Register
				</button>
				<a href="?q=5&keyword=Login">Or login</a>
			</form>
		</article>
	</section>
	<?php
	include('templates/footer.html');
	?>
</main>
