<?php
	if (isset($_SESSION['user']) && $_SESSION['user'] != ''){
	?>
		<article class="content-frm-photo-profile bg-dark d-none">
			<form id="frm-photo-profile" class="frm-photo-profile">
				<article class="circle-content-photo" style="background-image: url('public/img/user.png');">
					<input id="prof_img" type="file" name="profile" accept="image/*" required>
				</article>
				<p>	
					<?php echo $_SESSION['user'];?>
				</p>
				<button type="submit" class="btn btn-primary">
					Guardar
				</button>
				<button type="button" class="cancel btn btn-danger">
					Cancelar
				</button>
			</form>
		</article>
	<?php
	}
?>